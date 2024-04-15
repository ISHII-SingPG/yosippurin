<?php

@include_once('constants.php');

function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');

/* CSSとJavaScriptの読み込み */
function my_script_init()
{ 
    // swiper CSS（CDN）
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css', array(), 'false', 'all');
    // font-awesome CSS（CDN）
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), 'false', 'all');
    
    // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1");
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true);
    wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0.1');

    // swiperのスクリプト（CDN）
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', array('jquery'), 'false', true);

    // googleフォントの読み込み
    wp_enqueue_style( 'googlefonts', '//fonts.googleapis.com/css2?family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'my_script_init');

// プリンのアイコンがついた見出しを表示
function get_heading_title($mainTitle, $subTitle, $isSubPage = false){
    $tag = 'h2';

    if($isSubPage){
        $tag = 'h1';
    }
    $html = '';
    $html .= '<' . $tag . ' class="c-title__main">' . $mainTitle . '</' . $tag .'>';
    $html .= '<p class="c-title__sub text-uppercase">' . $subTitle . '</p>';
    return $html;
}

// 前の記事へ、次の記事に遷移するボタンの出力
function get_prev_next_nav($isPrev, $postWord = "記事"){
    $post_link = "";
    if($isPrev)
    {
        $previous_post = get_previous_post();
        if (!empty($previous_post)) {
            $post_link = '<a href="' . get_permalink($previous_post->ID) . '" class="c-button c-button--back">';
            $post_link .= '前の'. $postWord . 'へ';
            $post_link .= '</a>';
        }
    }
    else
    {
        $next_post = get_next_post();
        if (!empty($next_post)) {
            $post_link = '<a href="' . get_permalink($next_post->ID) . '" class="c-button c-button--next">';
            $post_link .= '次の'. $postWord . 'へ';
            $post_link .= '</a>';
        }
    }
    return $post_link;
}

// 関数を定義してアスペクト比を維持した画像を出力する
function custom_the_post_thumbnail($size = 'thumbnail') {
    // アスペクト比を維持した画像を取得する
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
    // 画像がある場合は出力
    if ($image) {
        echo '<img src="' . esc_url($image[0]) . '" alt="' . esc_attr(get_the_title()) . '">';
    }
}

// Breadcrumb NavXTプラグインを使用してパンくずリストを表示する際に、
// 記事タイトルのみ10文字以上の場合は、11文字目から...表示にする
add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    global $post;
    // パンくずリストのタイトルが記事タイトルであり、固定ページでなく、文字数が10文字を超える場合に処理を行う
    if ($type[0] === 'post' && $post->post_type != 'page' && mb_strlen($title) > 10) {

        // 最初から10文字までを取得し、その後に「...」を追加
        $title = mb_substr($title, 0, 20) . '...';
        return $title;
    }

    // それ以外の場合は元のタイトルを返す
    return $title;
}

// 文字数制限した記事タイトルを取得
function get_post_title() {
    // タイトルの取得
    $title = get_the_title();

    // 文字数制限
    $max_length = 28;

    // 制限した文字数に達したかどうかを確認し、必要に応じて省略記号を付けます
    if (mb_strlen($title) > $max_length) {
        $title = mb_substr($title, 0, $max_length) . '…';
    }
    return $title;
}

// カスタム投稿をページに表示する最大投稿数を変更する
add_action( 'pre_get_posts', 'my_custom_query_vars' );
function my_custom_query_vars( $query ) {
    // if ( is_admin() && !$query->is_main_query() ) {
    //     return;
    // }
    if ( is_admin()) {
        return;
    }

    if ( is_post_type_archive('news') ) {
        $query->set( 'posts_per_page' , 5 );
    }
    else if( is_post_type_archive('products') ){
        $query->set( 'posts_per_page' , 6 );
    }

    // タクソノミー一覧ページでのみ適用する条件を指定します
    if ( $query->is_tax() && $query->is_main_query() ) {
        // 表示件数を変更したい場合の値を設定します
        $query->set( 'posts_per_page', 5 ); // ここでは10件に設定していますが、適宜変更してください
    }
}


/*【管理画面】投稿メニューを非表示 */
function remove_menus () {
    global $menu;
    remove_menu_page( 'edit.php' ); // 投稿を非表示
}
add_action('admin_menu', 'remove_menus');

//管理者ユーザーのセキュリティ対策
function disable_author_archive()
{
	if (preg_match('#/author/.+#', $_SERVER['REQUEST_URI'])) {
		wp_redirect(esc_url(home_url('/404.php')));
		exit;
	}
}
add_action('init', 'disable_author_archive');