#!/usr/bin/python

"""
This scripts allows you to transfer ZenPhoto content to WordPress.

It browse the MySQL database of a ZenPhoto instance and generate an XML file. The XML produced is a WXR file (WordPress eXtended RSS), which mean it can be imported into a WordPress site.

A ZenPhoto album is imported as a post with a [gallery] tag in it.
All images of an album are imported as attachements and tied to the post it belongs to.

The script currently doesn't take care of sub-albums, as I didn't had any to migrate.

The script requires the following python modules:
* lxml
* PyMySQL

These can easely be installed on Debian with the following commands:
$ aptitude install python-pip python-lxml
$ pip install PyMySQL
"""

import lxml
import psycopg2
import sys
import email.utils
import time
from lxml import etree
from datetime import datetime
import pytz

shortname = "aov"
WORDPRESS_ROOT_URL = 'http://mysite.example.com'
XML_FILEPATH = './export.xml'
local_tz = pytz.timezone("America/New_York")


NS_EXCERPT = "http://wordpress.org/export/1.2/excerpt/"
NS_CONTENT = "http://purl.org/rss/1.0/modules/content/"
NS_WFW = "http://wellformedweb.org/CommentAPI/"
NS_DC = "http://purl.org/dc/elements/1.1/"
NS_WP = "http://wordpress.org/export/1.2/"

EXCERPT = "{%s}" % NS_EXCERPT
CONTENT = "{%s}" % NS_CONTENT
WFW = "{%s}" % NS_WFW
DC = "{%s}" % NS_DC
WP = "{%s}" % NS_WP

NSMAP = {
    'excerpt': NS_EXCERPT,
    'content': NS_CONTENT,
    'wfw': NS_WFW,
    'dc': NS_DC,
    'wp': NS_WP,
    }

conn = psycopg2.connect(host='dancy', database='Blorgy', user='blorgy')
cr = conn.cursor()
cr.execute("SELECT id from instance where shortname=%s", (shortname,))
instance = cr.fetchone()

def utc_to_local(utc_dt):
	return utc_dt.replace(tzinfo=pytz.utc).astimezone(local_tz)

def query(table_name, columns, extra=''):
    """
Utility method to query the database
"""
    results = []
    q = "SELECT %s FROM %s %s" % (
        ', '.join(columns),
        table_name,
        extra,
        )
    cr.execute(q)
    for row in cr.fetchall():
        cleaned_row_values = []
        for r in row:
            if isinstance(r, str):
                cleaned_row_values.append(r.decode('UTF-8'))
            else:
                cleaned_row_values.append(r)
        results.append(dict(zip(columns, cleaned_row_values)))
    return results

# Utility method to clean up multi-line HTML text.
#clean_text = lambda s: s.replace('\r\n', '\n').strip().replace('\n', "<br />")
clean_text = lambda s: s.replace('\r\n', '\n')
rfc822_date = lambda d: email.utils.formatdate(time.mktime(d.timetuple()))

items = []

blorg_authors = query('blorgauthor', ['id', 'name', 'shortname','email'], "where instance = %s" % instance)

for blorg_author in blorg_authors:
	author = etree.Element(WP + "wp_author")
	etree.SubElement(author, WP + "author_login").text = str(blorg_author['shortname'])

	email = blorg_author['email']
	if (email):
		etree.SubElement(author, WP + "author_email").text = str(email)
	else:
		etree.SubElement(author, WP + "author_email").text = ''

	etree.SubElement(author, WP + "author_display_name").text = etree.CDATA(blorg_author['name'])
	etree.SubElement(author, WP + "author_first_name").text = etree.CDATA(blorg_author['name'])
	#etree.SubElement(author, WP + "author_first_name").text = etree.CDATA('')
	#etree.SubElement(author, WP + "author_last_name").text = etree.CDATA('')
	items.append(author)

blorg_tags = query('blorgtag', ['id', 'shortname','title'], "where instance = %s" % instance)

for blorg_tag in blorg_tags:
	tag = etree.Element(WP + "tag")
	etree.SubElement(tag, WP + "term_id").text = str(blorg_tag['id'])
	etree.SubElement(tag, WP + "tag_slug").text = str(blorg_tag['shortname'])
	etree.SubElement(tag, WP + "tag_name").text = etree.CDATA(blorg_tag['title'])
	#items.append(tag)


post_columns =  [
	'id', 'shortname', 'title',
	'bodytext', 'extended_bodytext',
	'createdate', 'modified_date', 'publish_date',
	'comment_status', 'author', 'enabled'
]

comment_columns =  [
	'id', 'fullname', 'link', 'email',
	'bodytext', 'createdate',
	'ip_address', 'status'
]

blorg_posts = query('blorgpost', post_columns, "where instance = %s" % instance)
#print posts;

# Shift all IDs to prevent WordPress collisions
# MYSQL_LAST_INCREMENT = 50000
# SELECT Auto_increment
# FROM information_schema.tables
# WHERE table_schema = DATABASE() AND table_name='coolcavepress_posts';
#for row_list in [albums, photos, photo_comments]:
# for row in row_list:
# for column in ['id', 'albumid']:
# if column in row:
# row[column] = row[column] + MYSQL_LAST_INCREMENT



# Create an attachment for each photo
    # Prepare content
#    title = posts['title'].strip()
 #   description = ''
    #if photo.get('desc', None):
    #    description = clean_text(photo['desc'])
#    attachment_url = []
#    attachment_url.append(ZENPHOTO_ALBUM_ROOT_URL)
#    attachment_url.append(album_folder)
#    attachment_url.append(photo['filename'])
#    attachment_url = '/'.join(attachment_url)
    # Build the XML item
#    attachment = etree.Element("item")
#    etree.SubElement(attachment, "title").text = title
#    etree.SubElement(attachment, "pubDate").text = rfc822_date(photo['date'])
#    etree.SubElement(attachment, DC + "creator").text = 'admin'
#    etree.SubElement(attachment, CONTENT + "encoded").text = etree.CDATA(description)
#    etree.SubElement(attachment, WP + "post_id").text = str(photo['id'])
#    etree.SubElement(attachment, WP + "post_date").text = photo['date'].isoformat(' ')
#    etree.SubElement(attachment, WP + "post_date_gmt").text = photo['date'].isoformat(' ')
#    etree.SubElement(attachment, WP + "status").text = "inherit"
#    etree.SubElement(attachment, WP + "post_parent").text = str(photo['albumid'])
#    etree.SubElement(attachment, WP + "menu_order").text = order
#    etree.SubElement(attachment, WP + "post_type").text = "attachment"
#    etree.SubElement(attachment, WP + "attachment_url").text = attachment_url
    # Add photo's comments
#    for comment_data in [c for c in photo_comments if c['ownerid'] == photo['id']]:

for blorg_post in blorg_posts:
	title = blorg_post['title']
	body = "%s\n\n%s" % (blorg_post['bodytext'], blorg_post['extended_bodytext'])
	body = clean_text(body)
#	body = body.replace('="images/files/', '="http://www.example.com/images/files/')
#	body = body.replace('="file/', '="http://www.example.com/file/')
	url = "%s/?p=%s" % (WORDPRESS_ROOT_URL, blorg_post['id'])
	post = etree.Element("item")
	etree.SubElement(post, "title").text = title
	etree.SubElement(post, "link").text = url
	#print(blorg_post['publish_date'])
	#etree.SubElement(post, "pubDate").text = rfc822_date(blorg_post['publish_date'])
	etree.SubElement(post, "guid", attrib={"isPermaLink": "false"}).text = url
	etree.SubElement(post, CONTENT + "encoded").text = etree.CDATA(body)
	etree.SubElement(post, WP + "post_id").text = str(blorg_post['id'])
	etree.SubElement(post, WP + "post_date").text = utc_to_local(blorg_post['createdate']).isoformat(' ')
	etree.SubElement(post, WP + "post_date_gmt").text = blorg_post['createdate'].isoformat(' ')
	etree.SubElement(post, WP + "status").text = "publish"
	etree.SubElement(post, WP + "post_type").text = "post"
	etree.SubElement(post, WP + "post_name").text =  blorg_post['shortname']
	if blorg_post['comment_status'] == 0:
		etree.SubElement(post, WP + "comment_status").text = "open"
	else:
		etree.SubElement(post, WP + "comment_status").text = "closed"

	etree.SubElement(post, "comment_status").text = "closed"

	blorg_authors = query('blorgauthor', ['name', 'shortname'], "where id = %s" % blorg_post['author'])
	for blorg_author in blorg_authors:
		etree.SubElement(post, DC + "creator").text = blorg_author['shortname']

	blorg_tags = query('blorgtag', ['title', 'shortname'], "where id in (select tag from BlorgPostTagBinding where post = %s)" % blorg_post['id'])
	for blorg_tag in blorg_tags:
		etree.SubElement(post, "category", attrib={"domain": "post_tag", "nicename": blorg_tag['shortname']}).text = etree.CDATA(blorg_tag['title'])

	blorg_comments = query('blorgcomment', comment_columns, "where post = %s and spam = false" % blorg_post['id'])
	for blorg_comment in blorg_comments:
		comment = etree.Element(WP + "comment")
		etree.SubElement(comment, WP + "comment_id").text = str(blorg_comment['id'])
		etree.SubElement(comment, WP + "comment_author").text = etree.CDATA(unicode(blorg_comment['fullname']))
		etree.SubElement(comment, WP + "comment_author_email").text = blorg_comment['email']
		etree.SubElement(comment, WP + "comment_author_url").text = blorg_comment['link']
		etree.SubElement(comment, WP + "comment_author_IP").text = blorg_comment['ip_address']
		etree.SubElement(comment, WP + "comment_date").text = utc_to_local(blorg_comment['createdate']).isoformat(' ')
		etree.SubElement(comment, WP + "comment_date_gmt").text = blorg_comment['createdate'].isoformat(' ')
		etree.SubElement(comment, WP + "comment_content").text = etree.CDATA(clean_text(blorg_comment['bodytext']))
		if blorg_comment['status'] == 1:
			etree.SubElement(comment, WP + "comment_approved").text = '1'
		else:
			etree.SubElement(comment, WP + "comment_approved").text = '0'
		post.append(comment)

	items.append(post)

# Generate the final XML document
channel = etree.Element("channel")
etree.SubElement(channel, WP + "wxr_version").text = "1.2"
for item in items:
	channel.append(item)
root = etree.Element("rss", attrib={"version": "2.0"}, nsmap=NSMAP)
root.append(channel)

f = open(XML_FILEPATH, 'w')
f.write(etree.tostring(root, xml_declaration=True, pretty_print=True, encoding='UTF-8'))
f.close()

cr.close()
conn.close()
