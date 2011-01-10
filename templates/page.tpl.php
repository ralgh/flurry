<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
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
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="page">
  <div id="page-wrapper">
    <header id="header" role="banner">
      <div class="section liner clearfix">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
      <?php if ($site_name): ?>
        <div class="site-name">
        <?php if ($title): ?>
          <strong>
        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1>
        <?php endif; ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        <?php if ($title): ?>
          </strong>
        <?php else: /* Use h1 when the content title is empty */ ?>
          </h1>
        <?php endif; ?>
        </div><!-- /.site-name -->
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <div class="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
      <?php endif; ?>

    <?php print render($page['header']); ?>
      </div><!-- /.liner -->
    </header>
    
  <?php if ($navigation): ?>
    <hr />
    <nav id="navigation" role="navigation">
      <?php if ($navigation): ?>
        <div class="main-menu liner clearfix">
        <?php print $navigation; ?>
        </div><!-- /.liner -->
      <?php endif; ?>   
      
      <?php if ($page['subnav']): ?>
          <?php print render($page['subnav']); ?>
      <?php endif; ?>  
    </nav>
  <?php endif; ?>
      
    <div id="main" class="clearfix" role="main">
      <div id="content" class="column">
        <div class="section liner clearfix">
        <hr />
        <?php if ($page['highlighted']): ?>
          <div id="highlighted"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php if ($breadcrumb): ?>
          <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
        <?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
        </div><!-- /.liner -->
      </div><!-- /#content -->


    <?php if ($page['sidebar_first']): ?>
      <hr />
      <aside id="sidebar-first" class="column" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside> <!-- /#sidebar-first -->
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
      <hr />
      <aside id="sidebar-second" class="column" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside> <!-- /#sidebar-second -->
    <?php endif; ?>
    </div><!-- /#main -->
  
  
  
  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): 
    $trip_classes = '';
    $trip_count = 0;
    if ($page['triptych_first']) {$trip_classes .= 'has-first'; $trip_count++;}
    if ($page['triptych_middle']) {$trip_classes .= ' has-middle'; $trip_count++;}
    if ($page['triptych_last']) {$trip_classes .= ' has-last'; $trip_count++;}
    $trip_classes = trim($trip_classes) . ' trip-count-' . $trip_count;
  ?>
    <div id="triptych">
      <div class="section liner clearfix <?php print $trip_classes ?>">
      <?php if ($page['triptych_first']): ?>
      <?php print render($page['triptych_first']); ?>
      <?php endif; ?>
      
      <?php if ($page['triptych_middle']): ?>
      <?php print render($page['triptych_middle']); ?>
      <?php endif; ?>
      
      <?php if ($page['triptych_last']): ?>
      <?php print render($page['triptych_last']); ?>
      <?php endif; ?>
      </div><!-- /.liner -->
    </div> <!-- /#triptych -->
  <?php endif; ?>

    <hr />
    <footer id="footer" role="contentinfo" class="clearfix">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns">
        <div class="section liner clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
        </div><!-- /.liner -->
      </div> <!-- /#footer-columns -->
    <?php endif; ?>
  
    <?php print render($page['footer']); ?>
  
    </footer>

  </div> <!-- /#page-wrapper -->
</div> <!-- /#page -->