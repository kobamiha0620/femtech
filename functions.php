<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );
// タイトルタグ出力
add_theme_support('title-tag');



function register_my_menus() { 
  register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
  //'「メニューの位置」の識別子' => 'メニューの説明の文字列'
  'top'    => __( 'Top Menu', 'top' ),
  'social' => __( 'Social Links Menu', 'SNS' ),
  'drawer' => __( 'my-drawer', 'ドロワーメニュー' )
  ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );
add_theme_support( 'html5', array( 'search-form' ) );
// register_nav_menus()：複数のナビゲーションメニューを登録（及び有効化）


function add_my_scripts() {
  //WordPress 本体の jQuery を登録解除
  wp_deregister_script( 'jquery');


  wp_enqueue_style(
    'my-style',
    get_theme_file_uri( 'style.css' ),
    array(),  //依存関係がない場合
    filemtime( get_theme_file_path( 'style.css' ) )
  );

    //jQuery を CDN から読み込む
    wp_enqueue_script( 'jquery',
    '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
    array(),
    '3.4.1',
    false //</body> 終了タグの前で読み込み
  );


  wp_enqueue_script(
    'slick.min',
    get_template_directory_uri().'/slick/slick.min.js',
    array(),
    false 
  );

	wp_enqueue_style(
     'my-drawer-style',
      'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/css/drawer.min.css',
      array(),
      '3.2.1'
     );
	wp_enqueue_style(
     'my-font-awesome-style',
      'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
      array(),
      '4.7.0'
     );
	wp_enqueue_script(
     'my-scroll-js',
      'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js',
      array( 'jquery' ),
      '5.1.3',
      true
     );
	wp_enqueue_script(
     'my-drawer-js',
      'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js',
      array( 'my-scroll-js' ),
      '3.2.1',
      true
     );
     wp_enqueue_script(
      'menu-script',
      get_theme_file_uri( 'js/menu.js' , __FILE__ ),
      array( 'jquery' ), //依存ファイルは上記の jquery
      filemtime( get_theme_file_path( 'js/menu.js' , __FILE__ ) ),
      array(),
      false
    );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');



function custom_pagination_html( $template ) {
  $template = '
  <nav class="pagination" role="navigation">
      <h2 class="screen-reader-text">%2$s</h2>
      %3$s
  </nav>';
  return $template;
}
add_filter('navigation_markup_template','custom_pagination_html');


//タグ
function custom_wp_tag_cloud($args) {
  $myargs = array(
  'orderby' => 'count', //使用頻度順
  'order' => 'DESC', // 使用の多い順
  'number' => 20 // 表示数
  );
  $args = wp_parse_args($args, $myargs);
  return $args;
 }
 add_filter( 'widget_tag_cloud_args', 'custom_wp_tag_cloud' );
 

//記事のアクセス数を表示

function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
  }
  return $count.' Views';
}

//記事のアクセス数を保存
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


//全体ランキング
function my_wpp_custom_html( $mostpopular, $instance ){ 
	$output = '<ol class="sideConlist">';
    foreach( $mostpopular as $popular ){
     	// リンクを取得
    	$output .= '<li><a href="'. get_the_permalink( $popular->id ) . '"><article>';
      $post_ID = $popular->id;
      $excerpt = mb_substr(get_the_title  ( $post_ID ), 0);
      $excerptPage = mb_substr(get_the_title  ( $post_ID ), 0 , 45);
      $custom_date = $popular->date;
      
      $date = date('Y.n.j', strtotime($custom_date));
      $get_the_category = get_the_category($post_ID);

      // タイトル・アイキャッチ画像・ページビュー数を取得
		$output .= 
    '<div class="sideConlist__inner">'. 
    '<p class="sideConlist__img">'. get_the_post_thumbnail( $popular->id, 'midium' ). '</p>' . 
    '<div class="sideConlist__blc">'. 
    '<div class="sideConlist__blc pageblc">';
    for($i = 0; count($get_the_category) > $i; $i++){
      if( $get_the_category[$i]->slug != 'rssout' && $get_the_category[$i]->slug != 'uncategorized' && $get_the_category[$i]->slug != 'horoscope') { //表示したくないカテゴリ
          $output .= '<span class="cat-data cate-'. $get_the_category[$i]->slug .' categoryw">' . esc_html( $get_the_category[$i]->name) . '</span>' ;
      }
    }
    $output .=   
    '<div class="sideConlist__authors pageblc"><p class="sideConlist__authors--date">' . esc_html( $date ) . '</p>' . 
    '<p class="sideConlist__authors--name">by ' . get_the_author_meta( 'display_name', $popular->uid ). '</p></div>' . 
    '</div>';

    // '<p>' . esc_html( $popular-> title ) . '</p>' . 
    if(mb_strlen($excerpt)>26){
      $title= mb_substr(get_the_title ( $post_ID ), 0 , 28);
      $output .= '<p class="sideConlist__exc">' . esc_html ($title) . '…' . '</p>';
    
    }else{
      $output .= '<p class="sideConlist__exc">' . esc_html ( $excerpt)  . '</p>';
    }

    if(mb_strlen($excerpt)>26){
      $title= mb_substr(get_the_title ( $post_ID ), 0 , 60);
      $output .= '<p class="page_excerpt">' . esc_html ($title) . '…' . '</p>';
    
    }else{
      $output .= '<p class="page_excerpt">' . esc_html ( $excerpt)  . '</p>';
    }



    $output .=   

    '<div class="sideConlist__authors sideblc"><p class="sideConlist__authors--date">' . esc_html( $date ) . '</p>' . 
    '<p class="sideConlist__authors--name">by ' . get_the_author_meta( 'display_name', $popular->uid ). '</p></div>' . 
    '</div>'.

			// '<p>' . esc_html( $popular->pageviews ) . 'views</p>'; 
        // フィールド名「info-field」のカスタムフィールドの値を取得

        $custom_fields = get_post_meta( $popular->id, 'info-field', true ); 
        if($custom_fields) {
        	$output .= '<div>' . esc_html( $custom_fields ) . '</div>';
        }

        $output .= '</div></article></a></li>';   
	}
	$output .= '</ol>';   
	return $output;
}
add_filter( 'wpp_custom_html', 'my_wpp_custom_html', 10, 2 );
//10  : フィルターフックに登録された関数の中で、この関数を実行する順序 
//２  :  関数が受け取る引数の個数。



remove_filter( 'pre_term_description', 'wp_filter_kses' );
//カテゴリのdescription



//ページネーション
add_action( 'parse_query', 'my_parse_query' );
function my_parse_query( $query ) {
  if ( ! isset( $query->query_vars['paged'] ) && isset( $query->query_vars['page'] ) )
    $query->query_vars['paged'] = $query->query_vars['page'];
}


//page.php　bodyタグにクラスを付与
function add_class_page_slug($classes) {
  if( is_page() ) {
      $page = get_post( get_the_ID() );
      $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'add_class_page_slug');

//コメントのオートリンク機能の無効化
remove_filter('comment_text', 'make_clickable', 9);
function invalidate_comment_tags($comment_content) {
  if (get_comment_type() == 'comment') {
      $comment_content = htmlspecialchars($comment_content, ENT_QUOTES);
  }
  return $comment_content;
}
add_filter('comment_text', 'invalidate_comment_tags', 9);
add_filter('comment_text_rss', 'invalidate_comment_tags', 9);
add_filter('comment_excerpt', 'invalidate_comment_tags', 9);


function custom_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment_meta">
            <span class="author">
                <?php echo get_comment_author(); ?>
            </span>
            <span class="post_date">
                <?php echo get_comment_date('Y.m.d') ?> 
            </span>
        </div>
        
        <div class="comment_text">
        <?php comment_text() ?>
        </div>
    </li>
<?php
}

//テキストの変更
add_filter( 'gettext', 'change_comment_cookies_text', 20, 3 );
function change_comment_cookies_text( $translated_text, $text, $domain ){
	switch( $text ){
		case 'Save my name, email, and website in this browser for the next time I comment.' :
		$translated_text = 'ブラウザに名前・メールアドレスを保存する';
		break;
	}
	return $translated_text;
}

// 固定ページの親子関係を判定する関数
function page_is_ancestor_of($slug){
  global $post;
  $page = get_page_by_path($slug);
  $result = false;
  if(isset($page)){
      foreach ((array)$post->ancestors as $ancestor) {
        if($ancestor == $page->ID){ $result = true; }
      }
  }
  return $result;
}




//タイトルとナンバリングの設定。フィルタリング。
add_filter( 'wp_link_pages_args', 'wp_link_pages_args_add_next_and_number' );
function wp_link_pages_args_add_next_and_number( $args ) {
  global $page, $numpages, $more, $pagenow;
  
      // 値が next_and_number でなければスルー
      if ( $args['next_or_number'] !== 'next_and_number' ) {
          return $args;
      }
   
      // 連番ナビゲーションに変更
      $args['next_or_number'] = 'number'; 
      if ( !$more ) {
          return $args;
      }
   
      if($page-1) # there is a previous page
      $args['before'] .= '<div class="prev-page-link">'.  _wp_link_page($page-1)
          . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</div>'
      ;

      

      // 任意のテキストの次ページリンクを連番リンク前に挿入
      if ( $page < $numpages && !empty( $args['nextpagelink'] ) ) {
          // 改行コードで分割し配列化
          $nextpage_text = explode( "\n", $args['nextpagelink'] );
          // 配列からページ番号に対応するテキストを抽出
          $nextpage_text = is_array( $nextpage_text ) && isset( $nextpage_text[ $page - 1 ] ) ? $nextpage_text[ $page - 1 ] : sprintf( __( '次のページ' ), $page + 1 );
          $args['after'] .= '<div class="next-page-link">' . _wp_link_page( $page + 1 ) . '<span class="page-text"><span class="page-nextTxt">NEXT </span>' . $nextpage_text . '<span class="pagenext_arrow"></span></span></a></div>';
      }



      return $args;
   }

   
/*【出力カスタマイズ】SmartNews用のフィードを追加 */
// SmartNews のフィードを追加
// add_action('init', function (){
//   add_feed('smartnews', function () { // SmartNews のフィードを追加
//     get_template_part('temp','smartnews'); // フィードのテンプレートにテーマファイル内の「temp-smartnews.php」を選択
//   });
// });


// SmartNews のフィードの Content-type をカスタマイズ
// add_filter( 'feed_content_type', 'custom_feed_content_type', 10, 2);
// function custom_feed_content_type($content_type, $type){
//   if('smartnews' === $type ){
//     return feed_content_type('rss2');
//   }
//   return $content_type;
// }

//SmartNewsフィード追加
add_action('init', function (){
	add_feed('smartnews', function () {
		get_template_part('smartnews');
	});
});

//SmartNewsのHTTP header for Content-type
add_filter( 'feed_content_type', function ( $content_type, $type ) {
	if ( 'smartnews' === $type ) {
		return feed_content_type( 'rss2' );
	}
	return $content_type;
}, 10, 2 );

//RSS特定カテゴリ除外
function rssfilter($query) {
  if ($query->is_feed) {
    $query->set('cat','-385 -1 -278 -431');
  }
  return $query;
  }
  add_filter('pre_get_posts','rssfilter');
  
  


//サムネイルカラム追加
function custom_columns( $columns ) {
  $columns = array_merge( $columns, array( 'featured_image' => 'Image'));
  return $columns;
}
add_filter('manage_posts_columns' , 'custom_columns');

function custom_columns_data( $column, $post_id ) {
  switch ( $column ) {
  case 'featured_image':
      the_post_thumbnail( array( 100, 100 ));
      break;
  }
}
add_action( 'manage_posts_custom_column' , 'custom_columns_data', 10, 2 );

add_action('admin_head', 'column_width');
function column_width() {
echo '<style type="text/css">
      .column-title { text-align: left; width:200px !important; overflow:hidden }
      .column-author { text-align: left; width:80px !important; overflow:hidden }       
      .column-categories { text-align: left; width:80px !important; overflow:hidden }        
      .column-tags { text-align: left; width:70px !important; overflow:hidden }    
      .column-featured_image {
               text-align: left;
               width:100px !important;
　　　　　　　　　 overflow:hidden
      }
  </style>';
}


//閲覧数の表示
if(function_exists('wpp_get_views')){
        
  add_filter('manage_posts_columns', function($columns){
          $columns['view'] = "View";
          return $columns;
  });
      
  add_action('manage_posts_custom_column',function($column_name, $post_id){
      if($column_name == 'view'){
      echo wpp_get_views($post_id, 'today', true).'｜'.wpp_get_views($post_id, 'all', true);
      }
  },10,2);
      
}


// 管理画面にてphp書き込み
function my_php_Include($params = array()) {
  extract(shortcode_atts(array('file' => 'default'), $params));
  ob_start();
  include(STYLESHEETPATH . "/template_parts/$file.php");
  return ob_get_clean();
  }
  
add_shortcode('call_php', 'my_php_Include');
  

//月星座占いのテンプレート
function template_include_change($template) {
	if( is_single() && in_category('moon') ) {
	  $template = dirname(__FILE__) . '/single-moon.php';
	}else if( is_single() && in_category('horoscope') ) {
	  $template = dirname(__FILE__) . '/single-horoscope.php';
  }
	return $template;
  }
  add_filter('template_include', 'template_include_change', 999);

//Pタグ削除

  add_action('init', function() {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
    });
    add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;
    return $init;
    });
