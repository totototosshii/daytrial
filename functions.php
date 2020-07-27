<?php
/**
 * TF-30 functions and definitions
 *
 * @link https://tokyofreelance.jp/30days-trial-3rd-vol1/
 *
 * @package WordPress
 * @subpackage TF-30
 * @since 1.0.0
 */

/**
 * テーマのセットアップ
 */
function my_setup() {
	// 投稿サムネイル.
	add_theme_support( 'post-thumbnails' );
	// フィードリンク.
	add_theme_support( 'automatic-feed-links' );
	// Title タグ.
	add_theme_support( 'title-tag' );
	// HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

/**
 * CSSとJavaScriptの読み込み
 */
function my_script_init() {
	// fontawesome CDN.
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all' );
	// rainbow.css の読み込み.
	wp_enqueue_style( 'highlight', get_template_directory_uri() . '/css/rainbow.css', array(), '9.15.8', 'all' );
	// CSS の読み込み.
	wp_enqueue_style( 'my', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
	// highlight.pack.js の読み込み.
	wp_enqueue_script( 'highlight', get_template_directory_uri() . '/js/highlight.pack.js', array( 'jquery' ), '9.15.8', true );
	// sns.jsを追記.
	wp_enqueue_script( 'sns', get_template_directory_uri() . '/js/sns.js', array( 'jquery' ), '1.0.0', true );
	// JS の読み込み  jquery を先に読み込む  </body> 終了タグの前に配置.
	wp_enqueue_script( 'my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

/**
 * メニューの登録
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'global' => 'ヘッダーメニュー',
			'drawer' => 'ドロワーメニュー',
			'footer' => 'フッターメニュー',
		)
	);
}
add_action( 'init', 'my_menu_init' );

/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {
	if ( is_category() ) {
		// カテゴリーアーカイブの場合.
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) {
		// タグアーカイブの場合.
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) {
		// 投稿タイプのアーカイブの場合.
		$title = '' . post_typearchive_title( '', false ) . '';
	} elseif ( is_tax() ) {
		// タームアーカイブの場合.
		$title = '' . single_term_title( '', false ) . '';
	} elseif ( is_author() ) {
		// 作者アーカイブの場合.
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) {
		// 日付アーカイブの場合.
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}

	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );

/**
 * カテゴリーを1つだけ表示
 *
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.
 * @return void
 */
function my_the_post_category( $anchor = true, $id = 0 ) {
	global $post;
	// 引数が渡されなければ投稿IDを見るように設定.
	if ( 0 === $id ) {
		$id = $post->ID;
	}

	// カテゴリー一覧を取得.
	$this_categories = get_the_category( $id );
	if ( $this_categories[0] ) {
		if ( $anchor ) {
			// 引数がtrueならリンク付きで出力.
			echo '<a href="' . esc_url( get_category_link( $this_categories[0]->term_id ) ) . '">' . esc_html( $this_categories[0]->cat_name ) . '</a>';
		} else {
			// 引数がfalseならカテゴリー名のみ出力.
			echo esc_html( $this_categories[0]->cat_name );
		}
	}
}

/**
 * タグ一覧を表示
 *
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.].
 * @param string  $class クラス名.
 * @return void
 */
function my_the_tags( $anchor = true, $id = 0, $class = 'entry-tag-item' ) {
	global $post;
	// 引数が渡されなければ投稿IDを見るように設定.
	if ( 0 === $id ) {
		$id = $post->ID;
	}

	// タグ一覧を取得.
	$post_tags = get_the_tags( $id );
	if ( $post_tags ) {
		foreach ( $post_tags as $post_tag ) {
			if ( $anchor ) {
				echo '<div class="' . esc_html( $class ) . '"><a href="' . esc_url( get_tag_link( $post_tag->term_id ) ) . '">' . esc_html( $post_tag->name ) . '</a></div>';
			} else {
				echo '<div class="' . esc_html( $class ) . '">' . esc_html( $post_tag->name ) . '</div>';
			};
		}
	};
}

/**
 * ウィジェットの登録
 */
function my_widget_init() {
	register_sidebar(
		array(
			// 表示するエリア名.
			'name'          => 'サイドバー',
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
	add_action( 'widgets_init', 'my_widget_init' );

/**
 * 検索結果から固定ページを除外する
 *
 * @param string $search SQLのWHERE句の検索条件文.
 * @param object $wp_query WP_Queryのオブジェクト.
 * @return string $search 条件追加後の検索条件文.
 */
function my_posts_search( $search, $wp_query ) {
	// 検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合.
	if ( $wp_query->is_search() && $wp_query->is_main_query() && ! is_admin() ) {
		// 検索結果を投稿タイプに絞る.
		$search .= " AND post_type = 'post' ";
		return $search;
	}

	return $search;
}
add_filter( 'posts_search', 'my_posts_search', 10, 2 );

/**
 * ボタンのショートコード
 *
 * @param array  $atts ショートコードの引数.
 * @param string $content ショートコードのコンテンツ.
 * @return string ボタンのHTMLタグ.
 */
function my_shortcode( $atts, $content = '' ) {
	return '<div class="entry-btn"><a class="btn" href="' . $atts['link'] . '">' . $content . '</a></div><!-- /entry-btn -->';
}
add_shortcode( 'btn', 'my_shortcode' );

/**
 * ハイライトのショートコード
 *
 * @param array  $atts ショートコードの引数.
 * @param string $content ショートコードのコンテンツ.
 * @return string HTMLタグ.
 */
function hljs_shortcode( $atts, $content = '' ) {
	// 改行対策.
	$content = preg_replace( '/\<br \/\>/', '', $content );
	return '<pre><code class="' . $atts['lang'] . '">' . $content . '</code></pre>';
}
add_shortcode( 'hljs', 'hljs_shortcode' );

//こういう使い方もある↓
//functions.php(ボックスを装飾)
function box_func( $atts, $content = null ) {
return '<div class="red-box" style="background-color: green">' . $content . '</div>';}
add_shortcode('red-box', 'box_func');