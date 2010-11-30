<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>
	<?=$this->html_head_entries?>
	<title><?= $this->html_title ?></title>
	<?= $this->google_analytics ?>
</head>

<body class="http-error">

	<h1 id="logo"><a href="." title="<?= $this->site_title ?>" accesskey="1"><?= $this->site_title ?></a></h1>

	<div id="body-content">
		<h2 id="page-title"><?= $this->title ?></h2>
		<?= $this->content ?>
	</div>

</body>
</html>
