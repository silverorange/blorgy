<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?= $this->html_head_entries ?>
	<title><?= $this->html_title ?></title>
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>
</head>

<body>

<div id="doc">

	<div id="hd" class="clearfix">
		<div id="hd_content">
			<?= $this->header_title ?>
			<?= $this->tagline ?>
		</div>
	</div>

	<div id="bd">

		<div id="content">
			<?= $this->navbar ?>
			<?= $this->title ?>
			<?= $this->content ?>
		</div>

		<div id="sidebar">
			<?= $this->sidebar ?>
		</div>

	</div>

	<div id="ft">
	</div>

</div>

</body>
</html>
