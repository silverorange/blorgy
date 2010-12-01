<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?= $this->html_head_entries ?>
	<title><?= $this->html_title ?></title>
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>
</head>

<body>
<div id="wrapper">
	<div id="hd">
		<?= $this->header_title ?>
	</div>

	<div id="sidebar">
		<?= $this->sidebar ?>
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
</div>

</body>
</html>
