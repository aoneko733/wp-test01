<?php
//カスタムヘッダー
add_theme_support(
  'custom-header',
  array(
    'width' => 950,
    'height' => 295,
    'header-text' => false,
    'default-image' => '%s/images/top/main_image.png',
  )
);

//カスタムメニュー
register_nav_menus(
  array(
    'place_global' => 'グローバル',
    'place_utility' => 'ユーティリティ',
  )
);

add_theme_support('post-thumbnails');
set_post_thumbnail_size(90, 90, true);
add_image_size('small_thumbnail', 61, 61, true);
add_image_size('large_thumbnail', 120, 120, true);
add_image_size('category_image', 658, 113, true);
add_image_size('pickup_thumbnail', 302, 123, true);

function change_child_pages_shortcode_css() {
  $url = get_template_directory_uri() . '/css/child-pages-shortcode/style.css';
  return $url;
}
add_filter('child-pages-shortcode-stylesheet', 'change_child_pages_shortcode_css');

//ウィジェット
register_sidebar(array(
  'name' => 'サイドバーウイジェットエリア（上）',
  'id' => 'primary-widget-area',
  'description' => 'サイドバー上部のウィジェットエリア',
  'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>',
));

register_sidebar(array(
  'name' => 'サイドバーウイジェットエリア（下）',
  'id' => 'socondaly-widget-area',
  'description' => 'サイドバー下部のウィジェットエリア',
  'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widget-title">',
  'after_title' => '</h1>',
));

//自動生成される抜粋文の末尾に付与される文字列
function cms_excerpt_more() {
  return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

//自動生成される抜粋文の文字数
function cms_excerpt_length() {
  return 120;
}
add_filter('excerpt_mblength', 'cms_excerpt_length');

//固定ページで抜粋分を入力可にする
add_post_type_support('page', 'excerpt');

//30文字表示
function the_short_excerpt() {
  add_filter('excerpt_mblength', 'short_excerpt_length', 11);
  the_excerpt();
  remove_filter('excerpt_mblength', 'short_excerpt_length', 11);
}
function short_excerpt_length() {
  return 30;
}
//50文字表示
function the_pickup_excerpt() {
  add_filter('get_the_excerpt', 'get_pickup_excerpt', 0);
  add_filter('excerpt_mblength', 'picup_excerpt_length', 11);
  the_excerpt();
  remove_filter('get_the_excerpt', 'get_pickup_excerpt', 0);
  remove_filter('excerpt_mblength', 'picup_excerpt_length', 11);
}
//
function get_pickup_excerpt($excerpt) {
  if ($excerpt) {
    $excerpt = strip_tags($excerpt);
    $excerpt_len = mb_strlen($excerpt);
    if($excerpt_len > 50) {
      $excerpt = mb_substr($excerpt, 0, 50).'...';
    }
  }
  return $excerpt;
}
function pickup_excerpt_length() {
  return 50;
}

?>
