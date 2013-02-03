<?php
    $file = $_GET["load"];
    $include_file = "welcome.php";
    if ($file == "cv") {
        $include_file = "cv.php";
    }
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>I Can Has Web - Arne Hassel on the web</title>
    <link rel="stylesheet" type="text/css" media="all" href="minimalist/style.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 30em)" href="minimalist/style.medium.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 51em)" href="minimalist/style.large.css" />
</head>

<body>
<div id="SplashContainer" class="block-container">
    <header id="SplashHeaderMobile" role="banner">
        <hgroup class="grid-item">
            <h1>
                <a href="http://icanhasweb.net/" title="icanhasweb" rel="home">I CAN HAS WEB</a>
            </h1>
            <h3 class="site-description">Arne Hassel on the web</h3>
        </hgroup>
        <nav class="grid-item navigation-main" role="navigation">
            <ul id="menu-main" class="nav menu">
                <li>
                    <a href="http://icanhasweb.net/blog/">
                        Blog
                        <div class="triangle"></div>
                    </a>
                </li>
                <li>
                    <a href="http://icanhasweb.net/megoth/">
                        megoth
                        <div class="triangle"></div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container-inner grid-row">
        <?php include($include_file); ?>
    </div><!-- .container-inner -->
    <div class="push"></div>
</div>
<footer class="block-container" id="MasterFooter">
    <div class="grid-item">Work by Arne Hassel</div>
</footer><!-- #MasterFooter -->
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36066954-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>