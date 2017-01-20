<?php

/**
 * @file
 * template.php file for saini theme
 * Implement preprocess function and alter hooks in this file.
 *
 */

/**
 * Implement hook_preprocess
 */

function saini_preprocess_page(&$variables)
{
    $variables['site_slogan'] = t('Making Drupal look good');

    if ($variables['logged_in']) {
        $variables['footer_message'] = t('Welcome @username !  I am developing this.', array('@username' => $variables['user']->name));
    } else {
        $variables['footer_message'] = t('All your base are belong to us!');
    }

}

function saini_preprocess_node(&$variables){

    $node =  $variables;
    if($node['type'] == 'article'){
        $day =  format_date($node['created'],'custom','j');
        $month =  format_date($node['created'],'custom', 'M');
        $year =  format_date($node['created'],'custom', 'Y');
        $variables['submitted_day'] = $day;
        $variables['submitted_month']= $month;
        $variables['submitted_year'] = $year;
       //kpr($variables);
    }

    if($node['type'] == 'page'){
        $day =  format_date($node['created'],'custom','l');
        $variables['theme_hook_suggestions'][] = 'node__'.strtolower($day);
        $variables['day_of_week'] = $day;

    }

}

function saini_breadcrumb($variables) {

    $breadcrumb = $variables['breadcrumb'];
    $delimiter =  theme_get_setting('breadcrumb_delimiter');

    if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
        $title = drupal_get_title();
        $output .= '<div class="breadcrumb">' . implode($delimiter, $breadcrumb) . $delimiter . $title.'</div>';
        return $output;
    }
}

function saini_preprocess_username(&$variables){

    $account =  user_load($variables['account']->uid);
    if(isset($account->field_real_name['und'][0]['safe_value'])) {
        $variables['name'] = $account->field_real_name['und'][0]['safe_value'];
    }
}

function saini_field__field_tags($variables)
{
    $output = '';
    $link  =  array();
    foreach($variables['items'] as $key=>$item){
        $link[] = drupal_render($item);
    }
    $output .= implode(' , ', $link);
    return $output;
}

function saini_form_alter(&$form, &$form_state, $form_id){
    //kpr($form_id);
}

function saini_form_search_block_form_alter(&$form, &$form_state, $form_id){
    $form['actions']['submit']['#type'] = 'image_button';
    $form['actions']['submit']['#src'] = drupal_get_path('theme', 'saini').'/images/search.png';
    $form['actions']['submit']['#attributes']['class'][] = 'btn';

}


function saini_form_user_login_alter(&$form, &$form_state, $form_id){
    //debug($form);
    $form['name']['#title'] =  t('Name');
}

function saini_theme($existing, $type, $theme, $path){
    return array(
        'comment_form' => array(
            'render element' => 'form',
            'template'=> 'comment-form',
        )
    );
}


function saini_comment_form($variables){
hide($variables['form']['comment_body']['und']['0']['format']);
    $output = '';
    $output  .= '<div class="grid_3 alpha" >'.drupal_render($variables['form']['author']).'</div>';
    $output  .= '<div class="grid_3" >'.drupal_render($variables['form']['subject']).'</div>';
    $output  .= drupal_render_children($variables['form']);
    return $output;

}

function saini_preprocess_comment_form(&$variables){
    hide($variables['form']['comment_body']['und']['0']['format']);
    $variables['author_field'] = drupal_render($variables['form']['author']);
    $variables['subject_field'] = drupal_render($variables['form']['subject']);
    $variables['anything_else'] = drupal_render_children($variables['form']);
}
