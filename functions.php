<?php
/**
 * アイキャッチ画像を使用可能にする
*/
add_theme_support('post-thumbnails');

// アイキャッチ画像がなければ、標準画像を取得する
function get_eyecatch_with_default() {
    if (has_post_thumbnail()):
        $id = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($id, 'large');
    else:
        $img = array(get_template_directory_uri() . '/assets/img/post-bg.jpg');
    endif;

    return $img;
}


/**
 * 投稿タイプが product
*/
function create_product_post_type() {

    register_post_type(
        'product',
        array(
            'label' => '商品',
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'page-attributes'
        ),
        'show_in_rest' => true,
    )
);
}
add_action('init', 'create_product_post_type');


function create_service_post_type() {

    register_post_type(
        'service',
        array(
            'label' => 'サービス',
            'public' => true,
            'has_archive' => true,
            'menu_position' => 6,

            'supports' => array(
                'title',
                'thumbnail',
                'page-attributes'
            ),

            'show_in_rest' => true,
        )
    );

}
add_action('init', 'create_service_post_type');

function create_news_post_type() {

    register_post_type(
        'news',
        array(
            'label' => 'お知らせ',
            'public' => true,
            'has_archive' => true,
            'taxonomies' => array(
                'category'
            ),
            'menu_position' => 5,

            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),

            'show_in_rest' => true,
        )
    );

    register_taxonomy_for_object_type('category', 'news');
}

add_action('init', 'create_news_post_type');


function filter_category_archive_to_news($query) {
    if (!is_admin() && $query->is_main_query() && is_category()) {
        $query->set('post_type', 'news');
    }
}
add_action('pre_get_posts', 'filter_category_archive_to_news');

function my_theme_scripts() {
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');