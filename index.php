<?php
// Start counting time for the page load
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

// Include SimplePie
// Located in the parent directory
include_once('lib/SimplePie/autoloader.php');
include_once('lib/SimplePie/idn/idna_convert.class.php');

// Create a new instance of the SimplePie object
$feed = new SimplePie();
$feed->set_feed_url('http://pipes.yahoo.com/icanhasweb/posts');

//$feed->force_fsockopen(true);

if (isset($_GET['js']))
{
	SimplePie_Misc::output_javascript();
	die();
}

// Allow us to change the input encoding from the URL string if we want to. (optional)
if (!empty($_GET['input']))
{
	$feed->set_input_encoding($_GET['input']);
}

// Allow us to choose to not re-order the items by date. (optional)
if (!empty($_GET['orderbydate']) && $_GET['orderbydate'] == 'false')
{
	$feed->enable_order_by_date(false);
}

// Trigger force-feed
if (!empty($_GET['force']) && $_GET['force'] == 'true')
{
	$feed->force_feed(true);
}

// Initialize the whole SimplePie object.  Read the feed, process it, parse it, cache it, and
// all that other good stuff.  The feed's information will not be available to SimplePie before
// this is called.
$success = $feed->init();

// We'll make sure that the right content type and character encoding gets set automatically.
// This function will grab the proper character encoding, as well as set the content type to text/html.
$feed->handle_content_type();

// When we end our PHP block, we want to make sure our DOCTYPE is on the top line to make
// sure that the browser snaps into Standards Mode.
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>I can has web - work of Arne Hassel</title>
    <link rel="stylesheet" type="text/css" media="all" href="minimalist/style.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 30em)" href="minimalist/style.medium.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 51em)" href="minimalist/style.large.css" />
</head>

<body>
<div id="MasterContainer" class="block-container">
    <div class="container-inner grid-row">
        <div class="grid-item">
            <header class="grid-row" id="MasterHeader" role="banner">
                <hgroup class="grid-item">
                    <h1>
                        <a href="http://icanhasweb.net/" title="icanhasweb" rel="home">
                            <span class="first">I CAN</span>
                            <span class="second">HAS WEB</span>
                        </a>
                    </h1>
                    <h3 class="site-description">Arne Hassel on the web</h3>
                </hgroup>
                <nav class="grid-item" id="MasterNavigation" role="navigation">
                    <div class="menu-main-container">
                        <ul id="menu-main" class="nav menu">
                            <li>
                                <a href="http://icanhasweb.net/blog/">
                                    Blog
                                    <div class="triangle"></div>
                                </a>
                            </li>
                            <li>
                                <a href="http://icanhasweb.net/megoth/">
                                    [megoth]
                                    <div class="triangle"></div>
                                </a>
                            </li>
                            <li>
                                <a href="http://icanhasweb.net/blog/about/">
                                    About
                                    <div class="triangle"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav><!-- #MasterNavigation -->
            </header><!-- #MasterHeader -->
            <aside class="block-content">
                <p><a href="http://icanhasweb.net">icanhasweb.net</a> is the online home of <a href="mailto:arne.hassel@gmail.com">Arne Hassel</a>, a web developer living and working in Oslo, Norway.</p></p>
            </aside>
        </div>
        <div class="grid-item" id="MasterContent">
            <div id="primary">
                <div class="block-content" id="SplashHeader">
                    <h2>Welcome to icanhasweb.net</h2>
                    <p>Here you'll find my two blogs and <a href="http://icanhasweb.net/graphitethesis/">the thesis I wrote as part of my master degree</a>. I also hope to include some of my projects in the future, so stay tuned (e.g. by <a href="http://twitter.com/icanhasweb">following me on twitter</a>).</p>
                    <p>The first blog, simply named <a href="http://icanhasweb.net/blog/">Blog</a>, is where I write english posts. I intend to write about web technologies and related topics, i.e. topics that are related to my professional life.</p>
                    <p>The second blog is my norwegian blog, named <a href="http://icanhasweb.net/megoth/">[megoth]</a> (a nickname I use in many forums). It will focus on my personal life.</p>
                    <p>Below you'll find the latest 10 posts from the aforementioned blogs, fetched from their respective feeds.</p>
                </div>
                <div id="RssBody" role="main">
                    <?php if ($feed->error()) : ?>
                    <div class="alert">
                        <p><?php echo htmlspecialchars($feed->error()); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if ($success) : ?>
                    <hgroup class="rss-header">
                        <?php if ($feed->get_link()): ?>
                        <h2 class="header">
                            <a href="<?php echo $feed->get_link(); ?>"><?php echo $feed->get_title(); ?></a>
                        </h2>
                        <h4><?php echo $feed->get_description(); ?></h4>
                        <?php endif; ?>
                    </hgroup>
                    <ul id="RssList">
                        <?php foreach($feed->get_items() as $item): ?>
                        <li class="chunk" data-url="<?php echo $item->get_permalink(); ?>">
                            <hgroup>
                                <h3>
                                    <a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a>
                                </h3>
                            </hgroup>
                            <div>
                                <span class="footnote">Written <?php echo $item->get_date(); ?></span>
                            </div>
                            <div class="block-content">
                                <p>
                                    <?php
                                    $content = strip_tags($item->get_content());
                                    $length = 400;
                                    if (strlen($content) > $length) {
                                        $content = substr($content, 0, $length);
                                        preg_replace('/\w+$/', '', $content);
                                        echo $content . "...";
                                    } else {
                                        echo $content;
                                    }
                                    ?>
                                </p>
                                <a href="<?php echo $item->get_permalink(); ?>">&rarr; Read on in blog</a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #MasterContent -->
    </div><!-- .container-inner -->
    <div class="push"></div>
</div>
<footer class="block-container" id="MasterFooter">
    <nav class="grid-item navigation">
        <div class="tabbable tabs-below">
            <ul id="menu-footer" class="nav nav-tabs menu">
                <li>
                    <a href="http://delicious.com/megoth/">delicious</a>
                </li>
                <li>
                    <a href="http://www.facebook.com/arne.hassel">facebook</a>
                </li>
                <li>
                    <a href="https://github.com/megoth/">github</a>
                </li>
                <li>
                    <a href="http://linkedin.com/in/arnehassel">linkedin</a>
                </li>
                <li>
                    <a href="http://twitter.com/megoth/">twitter</a>
                </li>
            </ul>
        </div>
    </nav>
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