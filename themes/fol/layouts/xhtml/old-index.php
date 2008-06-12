<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title><?=$PAGEINFO['title']?></title>
	<base href="<?echo BASEHREF;?>" />
	<style type="text/css" media="screen, print">@import "<?=APP_WWW_LAYOUT?>/styles/reset.css";</style>
	<style type="text/css" media="print">@import "<?=APP_WWW_LAYOUT?>/styles/print.css";</style>
	<style type="text/css" media="screen">@import "<?=APP_WWW_LAYOUT?>/styles/styles.css";</style>
	<link rel="alternate" type="application/rss+xml" title="Weblog in RSS" href="http://blog.focusedonlight.com/rss" />
	<link rel="alternate" type="application/rss+xml" title="Random Links in RSS" href="http://blog.focusedonlight.com/rss/sideblog" />
	<link rel="alternate" type="application/rss+xml" title="Photos in RSS" href="http://www.focusedonlight.com/rss.xml" />
	<meta name="author" content="Stephen DesRoches" />
	<meta name="description" content="A simple and occasionally updated weblog by Stephen DesRoches" />
	<meta name="keywords" content="Stephen DesRoches, silverorange, newrecruit, RPHA, myRPHA, weblog, charlottetown, pei, prince edward island, canada" />
	<meta name="ICBM" content="46.2654,-63.1479" />
	<meta name="DC.title" content="stephendesroches" />
	<meta name="verify-v1" content="jY+fjd12KlRaJACB52Biyv2Wec90s9HfgqZtrWRAnwg=" />
</head>
<body>

<div id="header">
	<?
		if ($PAGEINFO['ishome'] and !isset($_GET['start'])) {
			?><h1>focused on light weblog</h1><?
		} else {
			?><h1><a href="#">focused on light weblog</a></h1><?
		}
	?>
	<ul>
		<li><a href="http://www.focusedonlight.com">photos</a></li>
		<li><a href="archives/">archives</a></li>
		<li><a href="authors/stephen">about</a></li>
		<li><a href="rss">rss</a></li>
	</ul>
</div>

<div id="weblog">
	<? require('referFromSearch.php');?>
	<?
		if (!$PAGEINFO['ishome']) {
			if (referFromSearch()) {
	?>
		<div id="google">
			<script type="text/javascript"><!--
			google_ad_client = "pub-1671801672727065";
			google_ad_width = 728;
			google_ad_height = 90;
			google_ad_format = "728x90_as";
			google_ad_type = "text";
			google_ad_channel ="5313252491";
			google_color_border = "FFFFFF";
			google_color_bg = "FFFFFF";
			google_color_link = "003366";
			google_color_url = "666666";
			google_color_text = "333333";
			//--></script>
			<script type="text/javascript"
			  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
	<?
			}
		}
	?>
	<? require($PAGEINFO['include']);?>
	<? if (isset($PAGEINFO['includefile'])) require($PAGEINFO['includefile']);?>	
</div>

<div id="search">
	<form method="get" action=".">
		<div>
			<input type="hidden" name="search" value="1" />
			<input type="text" name="keywords" value="<?=$keywords?>" class="keywords" accesskey="9" />
			<input type="hidden" name="author" value="" />
			<input type="submit" name="btn" value="Search" class="searchbutton" />
		</div>
	</form>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3504450-3");
pageTracker._initData();
pageTracker._trackPageview();
</script>

</body>
</html>
