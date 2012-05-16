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
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>
</head>

<body>

<div id="doc">

	<div id="hd" class="clearfix">
		<?= $this->header_title ?>
		<?= $this->tagline ?>
	</div>

	<div id="bd">

		<?= $this->navbar ?>

		<div id="container">
			<div id="content">
				<?= $this->title ?>
				<?= $this->content ?>
			</div>

			<div id="sidebar">
				<?= $this->sidebar ?>
			</div>
		</div>

	</div>

	<div id="ft">
		<p>Copyright &copy; 2004-<?= date('Y') ?> <a href="http://www.silverorange.com">silverorange</a>. All rights reserved.</p>
		<p class="second-line">The more stuff you own, the less happy you will be - so be sure and own good stuff!</p>
	</div>

</div>

</body>
</html>
