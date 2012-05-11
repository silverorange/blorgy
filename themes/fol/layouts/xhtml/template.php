<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?=$this->html_head_entries?>
	<title><?= $this->html_title ?></title>
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>
</head>

<body>

<div id="hd">
	<?= $this->header_title ?>

	<ul>
		<li><a href="http://www.focusedonlight.com">photoblog</a></li>
		<li><a href="archive/">archives</a></li>
		<li><a href="author/stephen">about</a></li>
		<li><a href="feed">rss</a></li>
	</ul>
</div>

<div id="weblog">

	<?php
		if ($this->title != '') {
			echo $this->navbar;
			echo $this->title;
		}
	?>

	<div id="content">
		<?= $this->content ?>
	</div>

</div>

<div id="ft">
	<?= $this->sidebar ?>
</div>

</body>
</html>
