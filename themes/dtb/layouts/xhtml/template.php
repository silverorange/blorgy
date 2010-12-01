<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<base href="<?= $this->basehref ?>"></base>

    <!--[if gte IE 7]><!-->
        <?=$this->html_head_entries?>
	<!--<![endif]-->

    <!--[if lte IE 6]>
        <link rel="stylesheet" type="text/css" href="<?= $this->basehref ?>themes/dtb/styles/ie.css" media="all" />
    <![endif]-->

	<script type="text/javascript" src="<?= $this->basehref ?>themes/dtb/javascript/last.fm.records.js"></script>
	<script type="text/javascript" src="<?= $this->basehref ?>themes/dtb/javascript/jquery-1.3.2.min.js"></script>
	<title><?= $this->html_title ?></title>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<meta name="description" content="<?= $this->meta_description ?>" />
	<?= $this->analytics ?>
</head>

<body>

    <div class="contents"></div>

	<div class="container"><div class="inner-container">

    	<div class="main">

            <div id="header">
            <h1><a href="<?= $this->basehref ?>">Delta Tango Bravo</a></h1>
            <em>Alpha: Whiskey Echo Bravo Lima Oscar Golf</em>
            </div>

            <?= $this->navbar ?>

            <?= $this->title ?>
            <?= $this->content ?>

        </div>

        <div class="extra">
			<?= $this->sidebar ?>
        </div>

    	<br style="clear: both;" />

	</div></div>


    <div class="contents-footer"></div>

    <div class="container container-footer"><div class="inner-container">

        <div class="main">
            <h3><span>Summary</span></h3>
            <p>I'm a web designer living in San Francisco, California. I sometimes get the chance to present lectures and workshops at conferences around the world, where I speak about iterative design strategies, designing for large online communities, and more broadly about interface design for web applications. I've posted many of the slides from past presentations I've done on <a href="http://slideshare.net/dburka">Slideshare</a>.</p>
            <p>Currently, I'm the director of design at a small gaming startup called <a href="http://tinyspeck.com">Tiny Speck</a>. Until October 2009, I was the creative director at <a href="http://digg.com/">Digg</a>. I was also one of the co-founders of the social content-sharing site <a href="http://en.wikipedia.org/wiki/Pownce">Pownce</a>, which is now a part (heh heh) of Six Apart. Back in 1999, I helped found <a href="http://silverorange.com/">silverorange</a>, a stellar web development and design firm based in Prince Edward Island, Canada. I continue to work with silverorange, but as an inactive partner.</p>

            <h2>Contact</h2>
            <p>I'm not currently looking for any kind of work and sometimes I take a long time to respond to email, but if you'd like to contact me please send an email to daniel [at] deltatangobravo [dot] com</p>
            <h2>Elsewhere</h2>
            <p style="padding-top: 1em;">I tweet when the mood strikes at <a href="http://twitter.com/dburka">Twitter</a></p>
            <p>I sometimes review products on <a href="http://stuff.silverorange.com">Silverorange Stuff</a></p>
            <p>I sell my amateur photography on <a href="http://clustershot.com/dburka">Clustershot</a></p>
            <p>I post some of my personal photos on <a href="http://flickr.com/dburka">Flickr</a></p>
            <p>I used to contribute on the <a href="http://blog.digg.com/?author=18">Digg Weblog</a></p>
            <p>I connect with people I actually know in the real world on <a href="http://facebook.com/dburka">Facebook</a></p>
            <h2>This Blog</h2>
            <p>The technology that powers this blog was built by <a href="http://silverorange.com/">silverorange</a> on their <a href="https://code.silverorange.com/wiki/Swat">Swat</a> open-source web application toolkit. I'm no longer working on day-to-day projects at silverorange, but they're available for hire if you're looking for top-notch interface design or web application development.</p>
        </div>

        <div class="extra">

            <h3 class="title-speaking">Speaking</h3>
            <ul class="list">
                <li><em>Nov 16-17, 2010</em> <a href="http://events.carsonified.com/fowd/2009/nyc">NYC / Future of Web Design</a></li>
                <li><em>Feb 15-19, 2010</em> <a href="http://www.webstock.org.nz/talks/events/">Wellington / Webstock</a></li>
                <li><em>Tentative May 2010</em> <a href="http://www.aimconference.com/">Halifax / AIM</a></li>
            </ul>

            <h3 class="title-spoke">Spoke</h3>
            <ul class="list">
                <li><em>Jun 11, 2008</em> <a href="http://2009.incontrolconference.com/">Cincinnati / In Control</a></li>
                <li><em>May 2010</em> <a href="http://www.aimconference.com/Daniel-Burka-Digg.com-Silver-Orange.html">Halifax / AIM</a></li>
                <li><em>Mar 12-16, 2008</em> <a href="http://sxsw.com/">Austin / SXSW Interactive</a></li>
                <li><em>Feb 20, 2009</em> <a href="http://www.slideshare.net/dburka/fowa-miami-2009-workshop">Miami / Future of Web Apps</a></li>
                <li><em>Nov 4, 2008</em> <a href="http://events.carsonified.com/fowd/">NYC / Future of Web Design</a></li>
                <li><em>Sep 27, 2008</em> <a href="http://www.webdirections.org/resources/daniel-burka-interaction-design-case-studies/">Sydney / Web Directions South</a></li>
                <li><em>Sep 4, 2008</em> <a href="http://2008.dconstruct.org/schedule/DanielBurka.php">Brighton / dConstruct</a></li>
                <li><em>Sep 24, 2008</em> <a href="http://www.webdesign-festival.com/2008/">Limoges / WiF</a></li>
                <li><em>May 15, 2008</em> <a href="http://www.meshconference.com/">Toronto / MESH</a></li>
                <li><em>Apr 23, 2008</em> <a href="http://events.carsonified.com/fowd/">London / Future of Web Design</a></li>
                <li><em>Mar 20, 2008</em> <a href="http://sxsw.com/">Austin / SXSW Interactive</a></li>
                <li><em>Jan 29, 2008</em> <a href="http://north08.webdirections.org/">Vancouver / Web Directions North</a></li>
                <li><em>Oct 12, 2007</em> <a href="http://events.carsonified.com/fowa/">London / Future of Web Apps</a></li>
            </ul>

        </div>
        <br style="clear: both;" />
    </div></div>

</body>
</html>
