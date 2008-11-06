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
				<script type="text/javascript"><!--
					google_ad_client = "pub-8603556777682286";
					/* front-page left banner */
					google_ad_slot = "3052633307";
					google_ad_width = 120;
					google_ad_height = 240;
					//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
			<div id="content">
				<?= $this->navbar ?>
				<?= $this->title ?>
				<?= $this->content ?>
			</div>
			<div id="right_sidebar" class="sidebar">
				<script type="text/javascript"><!--
					google_ad_client = "pub-8603556777682286";
					/* front-page vertical banner */
					google_ad_slot = "0501133756";
					google_ad_width = 160;
					google_ad_height = 600;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
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
