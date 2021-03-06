<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the flurry theme.
 */


/**
 * Add body classes if certain regions have content.
 */
function flurry_preprocess_page(&$vars) {
  
  // build main menu
  $navigation_attributes = array(
          'links' => $vars['main_menu'], 
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array(
                'links',
                'clearfix'
                )
             ),
          'heading' => array(
               'text' => t('Main menu'),
               'class' => 'visuallyHidden',
               'level' => 'h2'
               ) 
          );
          
  $vars['navigation'] = theme('links__system_main_menu', $navigation_attributes);
  
}

/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function flurry_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  // Always force latest IE rendering engine (even in intranet) & Chrome Frame
  $head_elements['flurry_meta_http_equiv'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge,chrome=1'
    ),
    '#weight' => -500
  );

  // Mobile viewport optimized: j.mp/bplateviewport
  $head_elements['flurry_meta_viewport'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1.0'
    ),
    '#weight' => -200
  );
  
  
  // Apple Touch Icon
  
  $apple_touch_icon_path = './' . drupal_get_path('theme', $GLOBALS['theme']) . '/apple-touch-icon.png';
  $flurry_apple_touch_icon_path = './' . drupal_get_path('theme', 'flurry') . '/apple-touch-icon.png';
  
  $apple_touch_icon = (file_exists($apple_touch_icon_path)) 
    ? $apple_touch_icon_path 
    : $flurry_apple_touch_icon_path ;
  
  $head_elements['apple_touch_icon'] = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'apple-touch-icon',
      'href' => $apple_touch_icon
    ),
    '#weight' => -100
  );
  

}

  
/**
 * Changes the search form to use the "search" input element of HTML5.
 */
function flurry_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}



/**
 * Override unformated view style
 */
function flurry_preprocess_views_view(&$vars) {
  //kpr($vars);
}




/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function flurry_preprocess_block(&$vars, $hook) {

  
  if ($vars['elements']['#block']->region === 'subnav') {
    // visually hide title in subnav region
    $vars['title_attributes_array'] = array(
        "class" => "visuallyHidden",
    );
    
    $vars['classes_array'][] = "clearfix";
   
  }

}