<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the html5now theme.
 */


/**
 * Add body classes if certain regions have content.
 */
function html5now_preprocess_page(&$variables) {
  
  
}



/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function html5now_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  // Always force latest IE rendering engine (even in intranet) & Chrome Frame
  $head_elements['html5now_meta_http_equiv'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge,chrome=1'
    ),
    '#weight' => -500
  );

  // Mobile viewport optimized: j.mp/bplateviewport
  $head_elements['html5now_meta_viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1.0'
    )
  );
  
  
  // Apple Touch Icon
  
  $apple_touch_icon_path = './' . drupal_get_path('theme', $GLOBALS['theme']) . '/apple-touch-icon.png';
  $html5now_apple_touch_icon_path = './' . drupal_get_path('theme', 'html5now') . '/apple-touch-icon.png';
  
  $apple_touch_icon = (file_exists($apple_touch_icon_path)) 
    ? $apple_touch_icon_path 
    : $html5now_apple_touch_icon_path ;
  
  $head_elements['apple_touch_icon'] = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'apple-touch-icon',
      'href' => $apple_touch_icon
    )
  );


}

  
/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function html5now_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}