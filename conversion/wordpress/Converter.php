<?php

/**
 * Converts a Blörgy blog instance to a Wordpress Extended RSS file
 * 
 * This allows you to export your Blörgy blog to Wordpress.
 *
 * PHP version 7.1
 * 
 * @package   Blörgy
 * @copyright 2022 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class Converter
{
    const NAMESPACES = [
        'excerpt' => 'http://wordpress.org/export/1.2/excerpt/',
        'content' => 'http://purl.org/rss/1.0/modules/content/',
        'wfw' => 'http://wellformedweb.org/CommentAPI/',
        'dc' => 'http://purl.org/dc/elements/1.1/',
        'wp' => 'http://wordpress.org/export/1.2/',
    ];

    protected $blorg_name = '';
    protected $instance = null;
    protected $time_zone = null;
    protected $authors = null;
    protected $tags = null;
    protected $wordpress_root_url = '';

    public function __construct(
        \PDO $db,
        \DateTimezone $time_zone,
        string $blorg_name,
        string $wordpress_root_url
    ) {
        $this->blorg_name = $blorg_name;
        $this->db = $db;
        $this->time_zone = $time_zone;
        $this->wordpress_root_url = $wordpress_root_url;
    }

    public function convert()
    {
        $document = $this->getDocument();
        echo $document->saveXML();
    }

    protected function getDocument()
    {
        $document = new \DOMDocument('1.0', 'utf-8');
        $rss = $document->createElement('rss');
        $rss->setAttribute('version', '2');

        foreach (self::NS as $key => $value) {
            $rss->setAttributeNS(
                'http://www.w3.org/2000/xmlns/',
                'xmlns:'.$key,
                $value
            );
        }

        $channel = $document->createElement('channel');
        
        $channel->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:wxr_version',
                '1.2'
            )
        );

        foreach ($this->getAuthors() as $author) {
            $channel->appendChild($this->getAuthorElement($document, $author));
        }

        foreach ($this->getTags() as $tag) {
            $channel->appendChild($this->getTagElement($document, $tag));
        }

        $rss->appendChild($channel);
        $document->appendChild($rss);
        return $document;
    }

    protected function getAuthorElement(\DOMDocument $document, array $author)
    {
        $el = $document->createElementNS(self::NS['wp'], 'wp:wp_author');

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:author_login',
                $author['shortname']
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:author_email',
                $author['email'] ?? ''
            )
        );

        $display_name = $document->createElementNS(
            self::NS['wp'],
            'wp:author_display_name'
        );
        $display_name->appendChild(
            $document->createCDATASection($author['name']);
        );
        $el->appendChild($display_name);

        $first_name = $document->createElementNS(
            self::NS['wp'],
            'wp:author_first_name'
        );
        $first_name->appendChild(
            $document->createCDATASection($author['name']);
        );
        $el->appendChild($first_name);

        return $el;
    }

    protected function getTagElement(\DOMDocument $document, array $tag)
    {
        $el = $document->createElementNS(self::NS['wp'], 'wp:tag');

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:term_id',
                strval($tag['id'])
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:tag_slug',
                $tag['shortname']
            )
        );

        $tag_name = $document->createElementNS(
            self::NS['wp'],
            'wp:tag_name'
        );
        $tag_name->appendChild(
            $document->createCDATASection($tag['title']);
        );
        $el->appendChild($tag_name);

        return $el;
    }

    protected function getCommentElement(\DOMDocument $document, $comment)
    {
        $el = $document->createElementNS(self::NS['wp'], 'wp:comment');

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_id',
                strval($comment['id'])
            )
        );

        $author = $document->createElementNS(
            self::NS['wp'],
            'wp:comment_author'
        );
        $author->appendChild(
            $document->createCDATASection(
                $comment['fullname']
            )
        );
        $el->apppendChild($author);

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_author_email',
                $comment['email']
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_author_url',
                $comment['link']
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_author_IP',
                $comment['ip_address']
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_date',
                $this->getLocalTime(
                    new \DateTime(
                        $comment['createdate'],
                        new \DateTimezone('UTC')
                    )
                )->format('c')
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_date_gmt',
                $comment['createdate']
            )
        );
        
        $content = $document->createElementNS(
            self::NS['wp'],
            'wp:comment_content'
        );
        $content->appendChild(
            $document->createCDATASection(
                str_replace("\r\n", "\n", $comment['bodytext'])
            )
        );
        $el->apppendChild($content);

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_approved',
                $comment['status'] === 1 ? '1' : '0'
            )
        );

        return $el;
    }

    protected function getPostElement(\DOMDocument $document, array $post)
    {
        $el = $document->createElement('item');

        $el->appendChild(
            $document->createElement('title', $post['title'])
        );

        $el->appendChild(
            $document->createElement('link', $this->getPostLink($post))
        );

        $guid = $document->createElement('guid', $this->getPostLink($post))
        $guid->setAttribute('isPermalink', 'false');
        $el->appendChild($guid);

        $content = $document->createElementNS(
            self::NS['content'],
            'content:encoded'
        );
        $content->appendChild(
            $document->createCDATASection(
                $this->getPostBody($post)
            )
        );
        $el->appendChild($content);

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:post_id',
                strval($post['id'])
            )
        );

        $el->appendChild(
            $document->createElement(
                'pubDate',
                new \DateTime(
                    $post['publish_date'],
                    new \DateTimezone('UTC')
                )->format('r')
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:post_date',
                $this->getLocalTime(
                    new \DateTime(
                        $post['createdate'],
                        new \DateTimezone('UTC')
                    )
                )->format('c')
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:post_date_gmt',
                $post['createdate']
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:status',
                'publish'
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:post_type',
                'post'
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:post_name',
                $post['shortname'];
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['wp'],
                'wp:comment_status',
                $post['comment_status'] === 0 ? 'open' : 'closed';
            )
        );

        $el->appendChild(
            $document->createElementNS(
                self::NS['dc'],
                'dc:creator',
                ($this->getAuthors()[$post['author']])['shortname'];
            )
        );

        foreach ($this->getTagsForPost($post['id']) as $tag_id) {
            $tag = $this->getTags()[$tag_id];
            $category = $document->createElement('category');
            $category->appendChild(
                $document->createCDATASection($tag['title'])
            );
            $category->setAttribute('domain', 'post_tag');
            $category->setAttribute('nicename', $tag['shortname']);
            $el->appendChild($category);
        }

        foreach ($this->getCommentsForPost($post['id']) as $comment) {
            $el->appendChild($this->getCommentElement($document, $comment));
        }

        return $el;
    }

    protected function getLocalTime(\DateTime $utc_date)
    {
        $local_date = clone $utc_date;
        $local_date->setTimezone($this->time_zone);
        return $local_date;
    }

    protected function getInstance()
    {
        if ($this->instance === null) {
            $statement = $this->db->prepare(
                'select id from Instance where shortname = :shortname'
            );
            $statement->bindValue(
                'shortname',
                $this->blorg_name,
                \PDO::PARAM_STR
            );
            $statement->execute();
            $row = $statement->fetch(\PDO::FETCH_ASSOC);
            if ($row !== false) {
                $this->instance = $row['id'];
            }
        }

        return $this->instance;
    }

    protected function getAuthors()
    {
        if ($this->authors === null) {
            $statement = $this->db->prepare(
                'select id, name, shortname, email from BlorgAuthor '.
                'where instance = :instance'
            );
            $statement->bindValue(
                'instance',
                $this->getInstance(),
                \PDO::PARAM_INT
            );
            $statement->execute();
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $this->authors = [];
            foreach ($rows as $author) {
                $this->authors[$author['id']] = $author;
            }
        }

        return $this->authors;
    }

    protected function getTags()
    {
        if ($this->tags === null) {
            $statement = $this->db->prepare(
                'select id, shortname, title from BlorgTag '.
                'where instance = :instance'
            );
            $statement->bindValue(
                'instance',
                $this->getInstance(),
                \PDO::PARAM_INT
            );
            $statement->execute();
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $this->tags = [];
            foreach ($rows as $tag) {
                $this->tags[$tag['id']] = $tag;
            }
        }

        return $this->tags;
    }

    protected function getPosts()
    {
        $statement = $this->db->prepare(
            'select id, shortname, title, bodytext, extended_bodytext, '.
                'createdate, modified_date, publish_date, comment_status, '.
                'author, enabled '.
            'from BlorgPost '.
            'where instance = :instance'
        );
        $statement->bindValue(
            'instance',
            $this->getInstance(),
            \PDO::PARAM_INT
        );
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function getCommentsForPost(string $post_id)
    {
        $statement = $this->db->prepare(
            'select id, fullname, link, email, bodytext, '.
                'createdate, ip_address, status '.
            'from BlorgComment '.
            'where post = :post and spam = false'
        );
        $statement->bindValue('post', $post_id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function BlorgPostTagBinding(string $post_id)
    {
        $statement = $this->db->prepare(
            'select tag from BlorgPostTagBinding where post = :post'
        );
        $statement->bindValue('post', $post_id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function getPostBody(array $post)
    {
        return str_replace(
            "\r\n",
            "\n",
            $post['bodytext'] . "\n\n" . $post['extended_bodytext']
        );
    }

    protected function getPostLink(array $post)
    {
        return rtrim($this->wordpress_root_url, '/') . '/?p=' . $post['id'];
    }
}
