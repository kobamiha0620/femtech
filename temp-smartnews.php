


<?php if (!in_category(array('rssout','uncategorized'))) : ?>

<?php
// SmartNews用のFeedを出力
// 基本情報の設定
$site_name = get_bloginfo('name'); // 管理画面「サイトのタイトル」を取得
$site_url = get_bloginfo('url'); // 管理画面「キャッチフレーズ」を取得
$site_desc = get_bloginfo('description'); // 管理画面「キャッチフレーズ」を取得
if(mb_strlen($site_desc)>96){ // エラー回避：キャッチフレーズが100文字超える場合に末尾を省略
$site_desc = mb_substr($site_desc,0,96); // 文字数の制限
$site_desc = str_replace(array("\r", "\n"), '', $site_desc).･･･; // 改行の削除、末尾に「...」を追加
} else {
$site_desc = str_replace(array("\r", "\n"), '', $site_desc); // 改行の削除
}
$site_post_date = mysql2date('D, d M Y H:i:s +0900', get_post_time('Y-m-d H:i:s', true ), false ); // 投稿の公開日時を取得
$site_lang = 'ja'; // サイトの言語設定
$site_copyright = '(c) '. date('Y') .' Femtech.tv'; // コピーライト
$site_logo = get_template_directory_uri().'/images/sitelogo.png'; // サイトロゴ
$site_logo_dm = get_template_directory_uri().'/images/sitelogo_dm.png'; // サイトロゴダークモード
$site_analytics = 'UA-191433876-3'; // GoogleアナリティクスのトラッキングIDを指定
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:snf="http://www.smartnews.be/snf">

<channel>
<title><?php echo $site_name; ?></title>
<link><?php echo $site_url; ?></link>
<description><?php echo $site_desc; ?></description>
<pubDate><?php echo $site_post_date; ?></pubDate>
<language><?php echo $site_lang; ?></language>
<copyright><?php echo $site_copyright; ?></copyright>
<ttl>1</ttl>
<snf:logo><url><?php echo $site_logo; ?></url></snf:logo>
<snf:darkModeLogo><url><?php echo $site_logo_dm; ?></url></snf:darkModeLogo>
<?php // メインループ開始
while (have_posts()) : the_post();
?>
<item>
<title><?php echo get_the_title(); ?></title>
<link><?php the_permalink(); ?></link>
<guid><?php the_permalink(); ?></guid>
<description><![CDATA[
<?php // エラー回避：抜粋の文字数制限
$post_excerpt = strip_tags(get_the_excerpt());
if(mb_strlen($post_excerpt)>96 ) {
$content = mb_substr($post_excerpt,0,96); // 文字数の制限
echo $description = str_replace(array("\r", "\n"), '', $content).･･･; // 改行の削除、末尾に「...」を追加
} else {
echo $description = str_replace(array("\r", "\n"), '', $post_excerpt); // 改行の削除
}
?>
]]></description>
<pubDate><?php echo get_the_date('Y-m-d H:i:s'); ?> GMT</pubDate>
<content:encoded><![CDATA[
<?php // 本文の指定
$post_content = get_the_content();
echo preg_replace('/<a .*?>(.*?)<\/a>/', '$1', $post_content); // エラー回避：本文中のaタグを削除
?>
]]></content:encoded>
<?php // カテゴリの指定
$custom_post_tag = 'blog-tag'; // 投稿に紐づくカテゴリまたはタクソノミースラッグを指定
$custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
if(!empty($custom_post_tag_terms)){
if(!is_wp_error( $custom_post_tag_terms )){
echo '<category>';
foreach($custom_post_tag_terms as $term){
$tag_term_link = get_term_link($term->slug, $custom_post_tag);
$tag_term_name = $term->name;
echo $tag_term_name.',';
}
echo '</category>';
}
}
?>
<dc:creator><?php the_author_nickname(); ?></dc:creator>
<dc:language><?php echo $site_lang; ?></dc:language>
<?php // サムネイル画像の指定
$og_image = get_stylesheet_directory_uri().'/img/ogp.png'; // 標準画像の準備
if (has_post_thumbnail($post_object->ID)) {
$thumbnail_id = get_post_thumbnail_id($post_object->ID); // アタッチメントIDの取得
$image = wp_get_attachment_image_src( $thumbnail_id, 'full' ); // full サイズのアイキャッチの情報を取得
$og_image = $image[0]; // アイキャッチ画像の絶対パスを代入
}
?>
<media:thumbnail url="<?php echo $og_image; ?>" />
<snf:analytics><![CDATA[
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo $site_analytics; ?>', '<?php echo $site_url; ?>');
ga('require', 'displayfeatures');
ga('set', 'referrer', 'http://www.smartnews.com/');
ga('send', 'pageview', '<?php the_permalink(); ?>');
</script>
]]>
</snf:analytics>
</item>
<?php endwhile; ?>
</channel>
</rss>
<?php endif; ?>