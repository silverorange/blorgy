<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?=$this->html_head_entries?>
	<title><?= $this->html_title ?></title>
	<meta name="description" content="<?= $this->meta_description ?>" />
</head>

<body>
<div id="doc">

	<div id="hd" class="clearfix">
		<?= $this->header_title ?>
		<?= $this->tagline ?>
	</div>

	<div id="bd">
		<div id="container">
			<div id="left_sidebar" class="sidebar">
				<?= $this->sidebar ?>
			</div>
			<div id="content">
				<?= $this->navbar ?>
				<?= $this->title ?>
				<?= $this->content ?>
			</div>
			<div id="right_sidebar" class="sidebar">
				A bunch of stuff will be put here including an ad probably.
			</div>
		</div>

	</div>

	<div id="ft">
		<p>copyright &copy; <? echo (date('Y') > 2008) ? '2008 - '.date('Y') : '2008'; ?> annie green productions</p>
	</div>

</div>

<?= $this->google_analytics ?>

</body>
</html>
