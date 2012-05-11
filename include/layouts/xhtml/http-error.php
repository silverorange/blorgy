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
</head>

<body class="http-error">

	<h1 id="logo"><a href="." title="<?= $this->site_title ?>" accesskey="1"><?= $this->site_title ?></a></h1>

	<div id="body-content">
		<h2 id="page-title"><?= $this->title ?></h2>
		<?= $this->content ?>
	</div>

</body>
</html>
