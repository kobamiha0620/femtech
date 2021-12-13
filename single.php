<?php get_header(); ?>
<div class="container">


  <?php if(have_posts()): the_post(); ?>

  <article <?php post_class( 'article-content' ); ?>>

    <div class="single" id="single">
      <section class="single__topimg">
        <!--アイキャッチ取得-->
        <?php if( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail('large'); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img" />
        <?php endif; ?>
      </section>

      <section class="single__linkto">
        <?php previous_post_link('%link', '&lt; &nbsp;前の記事'); ?>
        <?php next_post_link('%link', '次の記事 &nbsp; &gt;'); ?>
      </section>

      <section class="single__fv">
        <div class="single__fv--index">
          <!--カテゴリ-->
          <?php if (has_category()): ?>
          <?php $postcat = get_the_category(); for($i = 0; count($postcat) > $i; $i++){
					$postName = $postcat[$i]->name;
					$postId = $postcat[$i]->slug;?>
          <p class="cat-data cate-<?php echo $postId; ?>"><?php echo $postName; ?></p> <?php } ?>
          <?php endif; ?>

          <!--投稿日を表示-->
          <span class="cate__date">
            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
              <?php echo get_the_date(); ?>
            </time>
          </span>
          <!--著者を表示-->
          <span class="cate__author">by <?php the_author( ); ?></span>
        </div>

        <!--タイトル-->
        <h2 class="single__fv--ttl"><?php the_title(); ?></h2>

        <ul class="single__fv--cate">
          <?php
        $tags = get_the_tags();
        foreach( $tags as $tag) { 
        echo '<li><a href="'. get_tag_link($tag->term_id) .'">#' . $tag->name . '</a></li>';
        }
        ?>
        </ul>
      </section>


      <div class="single__contents">
        <!--本文取得-->
        <div class="single__contentsinner">
        <?php the_content(); ?>
        </div>
        <!--タグ取得-->
        <section class="single__fv--catewrap">
          <ul class="single__fv--cate">
            <?php
              $tags = get_the_tags();
              foreach( $tags as $tag) { 
              echo '<li><a href="'. get_tag_link($tag->term_id) .'">#' . $tag->name . '</a></li>';
              }
              ?>
          </ul>
        </section>


        <div class="single__linkto">
          <?php previous_post_link('%link', '&lt; &nbsp;前の記事'); ?>
          <?php next_post_link('%link', '次の記事 &nbsp; &gt;'); ?>
        </div>



        <ul class="single__sns">
          <li><a href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank"
              class="single__sns--fb">Facebook</a></li>
          <li><a href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank"
              class="single__sns--tw">Twitter</a></li>
          <li><a href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank"
              class="single__sns--in">LINE</a></li>
        </ul>

        <!-- コメント部分 -->
        <section class="single__come">
          <p class="single__come--ttl" id="js-comment"><span>コメントを書く / 読む</span><span
              class="single__come--ttlicon">&#9660;</span></p>

          <div class="single__come--con" id="js-commCont">
            <?php //comment_form($args, $post_id); ?>




          <?php comments_template(); ?>
          </div>



        </section>
        <!-- コメント部分 -->


        <!-- おすすめ -->
        <section id="recomArticle" class="articlesWrapper">
          <div class="articles" id="articles">
            <h2 class="articles__ttl">今、あなたにおすすめ</h2>
            <ul class="articles__list">
            <?php  get_template_part('template_parts/recommendArticle');?>
            
          
          
          
          </ul>
          </div><!-- articles -->
        </section><!-- recomArticle -->
        <!-- おすすめ -->


        <!-- 著者情報 -->
        <section class="single__author">
          <div class="single__author--img">
            <?php echo get_avatar(get_the_author_meta( 'ID' ), 198 ); ?>
          </div>
          <span><?php the_author_meta("display_name"); ?><span><br><?php the_author_meta("description"); ?></span></span>

        </section><!-- single__author -->
        <!-- 著者情報 -->

      </div><!-- /.single__contents -->
    </div><!-- /#single -->
  </article>

  <?php endif; ?>

  <div class="index__inner"><!-- SP用padding Blc -->


    <!-- 最新記事 -->
    <section id="latestArticle" class="articlesWrapper">
      <div class="articles" id="articles">
        <h2 class="articles__ttl">
          <span class="articles__ttl--en">NEW ARRIVAL</span>
          <span class="articles__ttl--jp">最新記事</span>
        </h2>
        <ul class="articles__list">
          <?php
                //$argsのプロパティを変えていく
                $args = array(
                    'post_type' => 'post', 
                    'post_status'   => 'publish',
                    'posts_per_page' => 5,
                    'no_found_rows' => true,  //ページャーを使う時はfalseに。
                );

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                  while ($the_query->have_posts()) : $the_query->the_post();
                    get_template_part('template_parts/newestArticle');

                  endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </ul>
      </div>
    </section>
    <!-- 最新記事 -->

  </div>  <!--end index__inner-->


  </div><!--end contents-->




  <div class="pc"><?php get_sidebar(); ?></div>

  </div><!--end container-->


  <?php get_footer(); ?>