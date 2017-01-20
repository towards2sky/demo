<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<!-- header starts-->
<div id="header-wrap">
    <div id="header" class="container_16">
        <div id="header-main">
            <h1 id="logo-text"><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>
            <p id="slogan"><?php print $site_slogan; ?></p>
        </div><!-- navigation -->
        <div id="nav">
            <?php print theme('links__system_main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                    'id' => 'main-menu-links',
                    'class' => array('links', 'clearfix'),
                ),
                'heading' => array(
                    'text' => t('Main menu'),
                    'level' => 'h2',
                    'class' => array('element-invisible'),
                ),
            )); ?>
        </div>
        <?php print render($page['header']); ?>
    </div>
</div>
<!-- header ends here -->

<!-- content starts -->
<div id="content-wrapper" class="container_16">

    <div id="breadcrumb" class="grid_16">
        <?php if ($breadcrumb): ?>
            <?php print $breadcrumb; ?>
        <?php endif; ?>
    </div>
    <?php print $messages; ?>

    <!-- main -->
    <div id="main" class="grid_8">
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?>
            <div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
        <!-- /#content-output -->
    </div>

    <!-- main ends here -->
    <div id="sidebars" class="grid_8">
        <!-- sidebars starts here -->
        <?php if ($page['sidebar_first']): ?>
            <div class="grid_4 alpha sidebar-left">
                <?php print render($page['sidebar_first']); ?>
            </div> <!-- /.section, /#sidebar-first -->
        <?php endif; ?>

        <?php if ($page['sidebar_second']): ?>
            <div class="grid_4 omega sidebar-right">
                <?php print render($page['sidebar_second']); ?>
            </div> <!-- /.section, /#sidebar-second -->
        <?php endif; ?>

    </div>

    <!-- sidebars end here -->

</div>
<!-- content ends here -->

<!-- footer starts here -->
<div id="footer-wrapper" class="container_16">

    <!-- footer top starts here -->
    <div id="footer-content">
        <!-- footer left starts here -->
        <?php if ($page['footer_left']): ?>
            <div class="grid_8" id="footer-left">
                <?php print render($page['footer_left']); ?>
            </div> <!-- /.section, /#sidebar-second -->
        <?php endif; ?>
        <!-- footer left ends here -->

        <!-- footer right starts here -->
        <?php if ($page['footer_right']): ?>
            <div class="grid_8" id="footer-right">
                <?php print render($page['footer_right']); ?>
            </div> <!-- /.section, /#sidebar-second -->
        <?php endif; ?>
        <!-- footer right ends here -->

    </div>
    <!-- footer top ends here -->

    <!-- footer bottom starts here -->
    <?php if ($page['footer']): ?>
        <div id="footer-bottom">
            <?php print render($page['footer']); ?>
            <p class="bottom-left"><?php print $footer_message; ?></p>
            <ul class="links secondary-links">
                <li><a href="index.html" title="" class="active">Home</a></li>
                <li><a href="rss.xml" title="">RSS Feed</a></li>
                <li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="">CSS</a></li>
                <li><a href="http://validator.w3.org/check/referer" title="">XHTML</a></li>
            </ul>
        </div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>
    <!-- footer bottom ends here -->

</div>
<!-- footer ends here -->