<div class="articlesWrapper" id="latestAll">
<h2 class="articles__ttl">
    <span class="articles__ttl--en">POPULAR TAGS</span></span>
    <span class="articles__ttl--jp">人気のタグ記事</span>
</h2>



<?php
// $args = array(
//     'orderby' => 'count',
//     'number' => 20
//   );

//   $tags = get_terms('post_tag', $args);
//   foreach($tags as $value) {
//       $tagId = $value->term_id;
//     echo '<li><a href="'. get_tag_link($tagId) .'">'. $value->name . $tagId.' ('. $value->count .')</a></li>';
//   }
?>


      <ul class="articles__list">



      
<?php 

//人気のタグIDを取得

$args = new WP_Query(
  array(
    'post_type' => 'post', // 投稿タイプ
    'post_status' => 'publish', //公開済みのページのみ取得
    'posts_per_page' => 12, // 表示件数
    'range' => 'monthly', //期間
    'stats_date' => true,
    'orderby' => 'date', // 表示順の基準
    'stats_date_format' => 'Y.m.d',
    'title_length' => 45,
    'excerpt_by_words'=> 45,
    'tag__in' => array( 11, 7, 16 )
  )
);

if ( $args->have_posts()):
  ?>

  <?php while ( $args->have_posts() ) : $args->the_post();?>

  <?php get_template_part('template_parts/loop-content'); ?>


<?php endwhile; ?>
<?php endif; wp_reset_postdata();?>
</ul>


 

      </div>
