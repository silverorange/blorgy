<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?= $this->html_head_entries ?>
	<title><?= $this->html_title ?></title>
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>

	<link href="http://fonts.googleapis.com/css?family=Paytone+One|Sorts+Mill+Goudy:400,400italic" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="doc">

	<div id="hd" class="clearfix">
		<?= $this->header_title ?>
		<?= $this->tagline ?>
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

		<div class="clearfix"></div>

	</div>

	<div id="ft">
	</div>

</div>

</body>
</html>
