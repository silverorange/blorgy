<?php

require_once 'Site/SiteThemeModule.php';
require_once 'Site/SiteViewFactory.php';

/**
 * Theme module for Blörgy
 *
 * Automagically registers theme view classes.
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ThemeModule extends SiteThemeModule
{
	// {{{ public function set()

	public function set($shortname)
	{
		parent::set($shortname);
		$this->registerAuthorView();
		$this->registerPostView();
		$this->registerCommentView();
	}

	// }}}
	// {{{ protected function registerAuthorView()

	protected function registerAuthorView()
	{
		$class_name = $this->theme->getShortname(true).'AuthorView';
		$filename   = 'views/'.$class_name.'.php';

		if ($this->theme->fileExists($filename)) {
			require_once $this->theme->getPath().'/'.$filename;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Author view for theme must '.
					'"%s" contain a class named "%s"',
					$this->theme->getShortname(), $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgAuthorView')) {
				throw new SiteException(sprintf('Author view class "%s" must '.
					'be a subclass of BlorgAuthorView.',
					$class_name));
			}

			SiteViewFactory::registerView('author', $class_name);
		}
	}

	// }}}
	// {{{ protected function registerPostView()

	protected function registerPostView()
	{
		$class_name = $this->theme->getShortname(true).'PostView';
		$filename   = 'views/'.$class_name.'.php';

		if ($this->theme->fileExists($filename)) {
			require_once $this->theme->getPath().'/'.$filename;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Post view for theme must '.
					'"%s" contain a class named "%s"',
					$this->theme->getShortname(), $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgPostView')) {
				throw new SiteException(sprintf('Post view class "%s" must '.
					'be a subclass of BlorgPostView.',
					$class_name));
			}

			SiteViewFactory::registerView('post', $class_name);
		}
	}

	// }}}
	// {{{ protected function registerCommentView()

	protected function registerCommentView()
	{
		$class_name = $this->theme->getShortname(true).'CommentView';
		$filename   = 'views/'.$class_name.'.php';

		if ($this->theme->fileExists($filename)) {
			require_once $this->theme->getPath().'/'.$filename;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Comment view for theme must '.
					'"%s" contain a class named "%s"',
					$this->theme->getShortname(), $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgCommentView')) {
				throw new SiteException(sprintf('Comment view class "%s" must '.
					'be a subclass of BlorgCommentView.',
					$class_name));
			}

			SiteViewFactory::registerView('comment', $class_name);
		}
	}

	// }}}
}

?>
