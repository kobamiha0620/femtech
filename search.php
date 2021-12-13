<?php get_header(); ?>

<div class="container" id="search">
<div class="index__inner"><!-- SP用padding Blc -->

<div id="result-wrap">


<?php
global $wp_query;
$total_results = $wp_query->found_posts;
$search_query = get_search_query();
?>
<p class="search__ttl">「<?php echo $search_query; ?>」の検索結果<span>（<?php echo $total_results; ?>件）</span></p>

<?php /*?>検索内容に該当するものがあった場合<?php */?>
<?php if( $total_results >0 ): ?>
<div id="result-list">
<section id="" class="articlesWrapper">

<ul class="articles__list">
<?php query_posts($query_string.'&posts_per_page=10'); ?>
<?php if(have_posts()):	while(have_posts()): the_post(); ?>

<?php  get_template_part('template_parts/loop-content');?>


<?php endwhile; ?>
</ul>
		<?php get_template_part('template_parts/pager'); ?>

		<?php endif;?>
</section>
<!-- /#result-list --></div>
<!-- /#result-wrap --></div>

<?php /*?>wp_pagenavi用の記述※不要であれば削除<?php */?>
<?php if(function_exists('wp_pagenavi')){
wp_pagenavi(array('query'=>$wp_query));
}
?>
<?php wp_reset_postdata(); ?>

<?php /*?>検索内容に該当するものがなかった場合<?php */?>
<?php else: ?>
<div id="result-list">
<p><?php echo $search_query; ?> に一致する情報は見つかりませんでした。</p>
<!-- /#result-list --></div>
<!-- /#result-wrap --></div>

<?php endif; ?>




  </div><!--end contents-->
  </div><!--end index__inner-->

  <?php get_sidebar(); ?>
<!-- </div>end container -->
<?php get_footer(); ?>
