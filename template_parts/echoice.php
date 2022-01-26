<div class="articlesWrapper">
    <h2 class="articles__ttl">
        <span class="articles__ttl--en">RECOMMEND</span>
        <span class="articles__ttl--jp">おすすめ記事</span>
    </h2>
    <ul class="articles__list">

    <!-- サブループ　Ranking -->
    <?php
    $args = new WP_Query(
      array(
        'post_type' => 'post', // 投稿タイプ
        'post_status' => 'publish', //公開済みのページのみ取得
        'posts_per_page' => 8, // 表示件数
        'category_name' => 'echoice', //editor's choiceの記事のみ
        'orderby' => 'rand' // 表示順の基準
      )
    );
    if ( $args->have_posts() ):
    ?>

    <?php while ( $args->have_posts() ) : $args->the_post();?>

    <?php get_template_part('/template_parts/loop-content'); ?>

    <?php endwhile; ?>
    <?php endif; wp_reset_postdata();?>

    </ul>
</div>