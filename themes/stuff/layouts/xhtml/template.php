<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?=$this->html_head_entries?>
	<title><?= $this->html_title ?></title>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<meta name="description" content="<?= $this->meta_description ?>" />
	<meta name="keywords" content="<?= $this->meta_keywords ?>" />
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
				<?PHP
					if($this->title) { 
						echo '<h2 id="page_title">'.$this->title.'</h2>'; 
					}
				?>
				<?= $this->content ?>
			</div>

			<div id="sidebar">
				<?= $this->sidebar ?>
			</div>
		</div>

	</div>

	<div id="ft">
		<p>Copyright &copy; 2004-<?=date('Y')?> <a href="http://www.silverorange.com">silverorange</a>. All rights reserved.</p>
		<p class="second-line">The more stuff you own, the less happy you will be - so be sure and own good stuff!</p>
	</div>

</div>

<?= $this->google_analytics ?>

</body>
</html>
