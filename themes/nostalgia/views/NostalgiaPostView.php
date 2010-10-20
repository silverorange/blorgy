<?php

require_once 'Blorg/views/BlorgPostView.php';

/**
 * Custom post view for the Nostalgia theme
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class NostalgiaPostView extends BlorgPostView
{
	// general display methods
	// {{{ protected function displayFooter()

	public function display($post)
	{
		parent::display($post);
		echo '<hr class="entry-footer-rule" />';
	}

	// }}}
}

?>
