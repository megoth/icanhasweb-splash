<?php
    $file = $_GET["load"];
    $include_file = "welcome.php";
    if ($file == "cv") {
        $include_file = "cv.php";
    }
    $base_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>I Can Has Web - Arne Hassel on the web</title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $base_url; ?>minimalist/style.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 30em)" href="<?php echo $base_url; ?>minimalist/style.medium.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 51em)" href="<?php echo $base_url; ?>minimalist/style.large.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>minimalist/style.medium.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>minimalist/style.large.css" />
    <![endif]-->
</head>

<body>
<div id="SplashContainer" class="block-container">
    <?php include($include_file); ?>
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