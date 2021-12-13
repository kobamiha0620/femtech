
    <!-- EDITOR'S CHOICE ------------------------------------------------->
    <div class="articlesWrapper" id="editors">
      <h2 class="articles__ttl">
          <span class="articles__ttl--en">EDITOR'S CHOICE</span>
          <span class="articles__ttl--jp">おすすめ記事</span>
      </h2>
      <ul class="articles__list">


      <!-- サブループ　Ranking -->
      
      <?php

      $category = get_category( get_query_var("cat") );

      //現在のページのカテゴリslug
      $catSlug = $category->slug;
      
      //第二階層について一部のカテゴリ
      $cateArray = array('pms', 'femtech', 'well');


      if(in_array($catSlug, $cateArray)) {
          //上記カテゴリがある場合の表示
          $args = new WP_Query(
            array(
              'post_type' => 'post', // 投稿タイプ
              'post_status' => 'publish', //公開済みのページのみ取得
              'posts_per_page' => 5, // 表示件数
              'category_name' =>  "echoice" . "+". $catSlug, //editor's choiceの記事のみ
              'orderby' => 'rand' // 表示順の基準
            )
          );
        }else{
          //上記カテゴリがない場合は全体のeditors'schoiceがある記事のランダム表示です。
          $args = new WP_Query(
            array(
              'post_type' => 'post', // 投稿タイプ
              'post_status' => 'publish', //公開済みのページのみ取得
              'posts_per_page' => 5, // 表示件数
              'category_name' =>  "echoice", //editor's choiceの記事のみ
              'orderby' => 'rand' // 表示順の基準
            )
          );
          
        }



      if ( $args->have_posts() ):
      ?>

      <?php while ( $args->have_posts() ) : $args->the_post();?>

  
      <?php get_template_part('template_parts/loop-content'); ?>


      <?php endwhile; ?>
      <?php endif; wp_reset_postdata();?>
      </ul>
      </div>
    <!-- EDITOR'S CHOICE ------------------------------------------------->
