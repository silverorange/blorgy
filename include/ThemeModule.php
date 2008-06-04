<?php

require_once 'Site/SiteThemeModule.php';
require_once 'Blorg/BlorgViewFactory.php';

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

	public function set($theme)
	{
		parent::set($theme);
		$this->registerAuthorView();
		$this->registerPostView();
		$this->registerReplyView();
	}

	// }}}
	// {{{ protected function registerAuthorView()

	protected function registerAuthorView()
	{
		$class_name = $this->getCamelCaseShortname().'AuthorView';
		$file_name = $this->getFile('views/'.$class_name.'.php');

		if ($file_name !== null) {
			require_once $file_name;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Author view file "%s" must '.
					'contain a class named "%s"',
					$file_name, $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgAuthorView')) {
				throw new SiteException(sprintf('Author view class "%s" must '.
					'be a subclass of BlorgAuthorView.',
					$class_name));
			}

			BlorgViewFactory::registerView('author', $class_name);
		}
	}

	// }}}
	// {{{ protected function registerPostView()

	protected function registerPostView()
	{
		$class_name = $this->getCamelCaseShortname().'PostView';
		$file_name = $this->getFile('views/'.$class_name.'.php');

		if ($file_name !== null) {
			require_once $file_name;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Post view file "%s" must '.
					'contain a class named "%s"',
					$file_name, $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgPostView')) {
				throw new SiteException(sprintf('Post view class "%s" must '.
					'be a subclass of BlorgPostView.',
					$class_name));
			}

			BlorgViewFactory::registerView('post', $class_name);
		}
	}

	// }}}
	// {{{ protected function registerReplyView()

	protected function registerReplyView()
	{
		$class_name = $this->getCamelCaseShortname().'ReplyView';
		$file_name = $this->getFile('views/'.$class_name.'.php');

		if ($file_name !== null) {
			require_once $file_name;

			if (!class_exists($class_name)) {
				throw new SiteException(sprintf('Reply view file "%s" must '.
					'contain a class named "%s"',
					$file_name, $class_name));
			}

			if (!is_subclass_of($class_name, 'BlorgReplyView')) {
				throw new SiteException(sprintf('Reply view class "%s" must '.
					'be a subclass of BlorgReplyView.',
					$class_name));
			}

			BlorgViewFactory::registerView('reply', $class_name);
		}
	}

	// }}}
}

?>
