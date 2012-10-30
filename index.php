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

<html lang="en-US">
<head>
    <title>I can has web - work of Arne Hassel</title>
    <link rel="stylesheet" type="text/css" media="all" href="minimalist/style.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 30em)" href="minimalist/style.medium.css" />
    <link rel="stylesheet" type="text/css" media="all and (min-width: 50em)" href="minimalist/style.large.css" />
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
                    <h3 id="site-description">Arne Hassel on developing for the web</h3>
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
                        </ul>
                    </div>
                </nav><!-- #MasterNavigation -->
            </header><!-- #MasterHeader -->
            <aside class="block-content">
                <p>Welcome to icanhasweb.net, my little spot on the internet. My name is Arne Hassel, and this website is my attempt to present myself and my projects.</p>
                <p>I maintain two blogs here, <a href="/blog/">one in english</a> and <a href="/megoth/">one in norwegian</a>. The former focuses on web technologies and software programming, while the latter is a personal blog.</p>
                <p>On this page you'll find a list of the latest posts from these blogs. There's also a list of links in <a href="#MasterFooter">the footer</a> that may be of interest.</p>
            </aside>
        </div>
        <div class="grid-item" id="MasterContent">
            <div id="primary">
                <div id="content" role="main">
                    <?php if ($feed->error()) : ?>
                    <div class="alert">
                        <p><?php echo htmlspecialchars($feed->error()); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if ($success) : ?>
                    <hgroup>
                        <?php if ($feed->get_link()): ?>
                        <h2 class="header">
                            <a href="<?php echo $feed->get_link(); ?>"><?php echo $feed->get_title(); ?></a>
                        </h2>
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
                    <a href="linkedin.com/in/arnehassel">linkedin</a>
                </li>
                <li>
                    <a href="http://twitter.com/megoth/">twitter</a>
                </li>
            </ul>
        </div>
    </nav>
</footer><!-- #MasterFooter -->
</body>
</html>