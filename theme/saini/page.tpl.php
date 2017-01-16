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
      <h1 id="logo-text">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
      </h1>
      <?php if ($site_slogan): ?>
      <p id="slogan"><?php print $site_slogan; ?></p>
      <?php endif; ?>

    </div><!-- navigation -->
    <div id="nav">
      <?php if($main_menu): ?>
      <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
      <?php endif; ?>
    </div>
    <!--<form action="#" id="search-theme-form">
      <div>
        <div id="search">
          <div class="form-item" id="edit-search-theme-form-1-wrapper">
            <label for="edit-search-theme-form-1">Search this site:</label> <input type="text" maxlength="128" name="search_theme_form" id="edit-search-theme-form-1" size="15" value="" title="Enter the terms you wish to search for." class="form-text" />
          </div><input type="image" src="images/search.png" class="btn" />
        </div>
      </div>
    </form>-->
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
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
    <!-- /#content-output -->
  </div>

  <!-- main ends here -->

  <!-- sidebars starts here -->
  <?php if ($page['sidebar_first']): ?>
  <div id="sidebars" class="grid_8">        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
  <?php endif; ?>



  <div id="sidebars" class="grid_8">

    <!-- left sidebar starts here -->
    <div class="grid_4 alpha sidebar-left">


    </div>
    <!-- left sidebar ends here -->

    <!-- right sidebar starts here -->
    <div class="grid_4 omega sidebar-right">


    </div>
    <!-- right sidebar ends here -->

  </div>
  <!-- sidebars end here -->

</div>
<!-- content ends here -->

<!-- footer starts here -->
<div id="footer-wrapper" class="container_16">

  <!-- footer top starts here -->
  <div id="footer-content">

    <!-- footer left starts here -->
    <div class="grid_8" id="footer-left">
      <div class="block">
        <h3 class="title">Elsewhere on the web</h3>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat.</p>
          <ul class="footer-list">
            <li><a href="#">Lullabot - <span>Makers of fine Drupal products and services.</span></a></li>
            <li><a href="#">The Lullabot Podcast - <span>Listen to Drupal!</span></a></li>
            <li><a href="#">Do It With Drupal - <span>Learn Drupal from the people who wrote it.</span></a></li>
            <li><a href="#">Drupal.org - <span>Everything Drupal.</span></a></li>
            <li><a href="#">Drupal Groups - <span>Find Drupal people near you.</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- footer left ends here -->

    <!-- footer right starts here -->
    <div class="grid_8" id="footer-right">
      <div class="block">
        <h3 class="title">Recent images</h3>
        <table>
          <tr class="row-1 row-first">
            <td><a href="#"><img src="images/thumbs/IMG_5473.jpg" alt="" title="" width="40" height="40" /></a></td>
            <td><a href="#"><img src="images/thumbs/IMG_5487.jpg" alt="" title="" width="40" height="40" /></a></td>
            <td><a href="#"><img src="images/thumbs/IMG_5485.jpg" alt="" title="" width="40" height="40" /></a></td>
            <td><a href="#"><img src="images/thumbs/IMG_5463.jpg" alt="" title="" width="40" height="40" /></a></td>
            <td><a href="#"><img src="images/thumbs/IMG_5494.jpg" alt="" title="" width="40" height="40" /></a></td>
          </tr>
        </table>
      </div>
      <div class="block">
        <h3 class="title">About us</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. <a href="#">more...</a></p>
      </div>
    </div>
    <!-- footer right ends here -->

  </div>
  <!-- footer top ends here -->

  <!-- footer bottom starts here -->
  <div id="footer-bottom">
    <p class="bottom-left">All your base are belong to us!</p>
    <ul class="links secondary-links">
      <li><a href="index.html" title="" class="active">Home</a></li>
      <li><a href="rss.xml" title="">RSS Feed</a></li>
      <li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="">CSS</a></li>
      <li><a href="http://validator.w3.org/check/referer" title="">XHTML</a></li>
    </ul>
  </div>
  <!-- footer bottom ends here -->

</div>
<!-- footer ends here -->