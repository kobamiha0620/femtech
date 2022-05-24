<div class="side__series" id="side__series">
    <h2 class="side__ttl">
        <span class="side__ttl--en">SERIES</span>
        <span class="side__ttl--jp">連載</span>
    </h2>

        <div class="side__series--inner">

        <!--------------------
    　　 ----------------------
        青木さんの記事
        ----------------------
        -------------------->
        <div class="side__series--blc">

            <?php
            $categoryName = "aoki"; //slug名の記事を選択
            
            $args = new WP_Query(
                array(
                'post_type' => 'post', // 投稿タイプ
                'post_status' => 'publish', //公開済みのページのみ取得
                'posts_per_page' => 1, // 表示件数
                'category_name' => $categoryName, //
                'orderby' => 'date' // 表示順の基準
                )
            );
            
            if ( $args->have_posts() ):?>
            <?php while ( $args->have_posts() ) : $args->the_post();?>

            <a href="<?php echo get_permalink(); ?>" class="side__series--link">
                <!--画像を追加-->
                <div class="side__series--img">
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>images/no-image.gif" alt="no-img" width="100%">
                    <?php endif; ?>
                </div>

                <div class="side__series--r">
                    <!-- カテゴリslug名からカテゴリ情報の取得 -->
                    <?php $cat = get_category_by_slug( $categoryName );  ?>

                    <span class="cat-data cate-<?php echo $categoryName; ?>"><?php echo $cat -> name; ?></span>
                    <p class="side__series--excerpt"><?php echo mb_substr(get_the_title(), 0, 44); ?></p>

                </div>
            </a>
            <p class="side__series--catelink">
            <a href="/category/<?php echo $categoryName; ?>">view All</a></p>
            
            <?php endwhile; ?>

            <?php endif; wp_reset_postdata();?>
        </div><!--  /.side__series--blc -->


        <!--------------------
    　　 ----------------------
        fさんの記事
        ----------------------
        -------------------->
        <div class="side__series--blc">

            <?php
            $categoryName = "personf"; //slug名の記事を選択
            
            $args = new WP_Query(
                array(
                'post_type' => 'post', // 投稿タイプ
                'post_status' => 'publish', //公開済みのページのみ取得
                'posts_per_page' => 1, // 表示件数
                'category_name' => $categoryName, //
                'orderby' => 'date' // 表示順の基準
                )
            );
            
            if ( $args->have_posts() ):?>
            <?php while ( $args->have_posts() ) : $args->the_post();?>

            <a href="<?php echo get_permalink(); ?>" class="side__series--link">
                <!--画像を追加-->
                <div class="side__series--img">
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>images/no-image.gif" alt="no-img" width="100%">
                    <?php endif; ?>
                </div>

                <div class="side__series--r">
                    <!-- カテゴリslug名からカテゴリ情報の取得 -->
                    <?php $cat = get_category_by_slug( $categoryName );  ?>

                    <span class="cat-data cate-<?php echo $categoryName; ?>"><?php echo $cat -> name; ?></span>

                    <p class="side__series--excerpt">
<?php
  if(mb_strlen($post->post_title)>57){
    $title = mb_substr($post->post_title, 0, 44);
    echo $title.'…';
  }else{
    echo $post->post_title;
  }
?></p>
                </div>
            </a>
            <p class="side__series--catelink">
            <a href="/category/<?php echo $categoryName; ?>">view All</a></p>
            
            <?php endwhile; ?>

            <?php endif; wp_reset_postdata();?>
        </div><!--  /.side__series--blc -->





        <!--------------------
    　　 ----------------------
        やまなさんの記事
        ----------------------
        -------------------->
        <div class="side__series--blc">

            <?php
            $categoryName = "kokoro"; //slug名の記事を選択
            
            $args = new WP_Query(
                array(
                'post_type' => 'post', // 投稿タイプ
                'post_status' => 'publish', //公開済みのページのみ取得
                'posts_per_page' => 1, // 表示件数
                'category_name' => $categoryName, //
                'orderby' => 'date' // 表示順の基準
                )
            );
            
            if ( $args->have_posts() ):?>
            <?php while ( $args->have_posts() ) : $args->the_post();?>

            <a href="<?php echo get_permalink(); ?>" class="side__series--link">
                <!--画像を追加-->
                <div class="side__series--img">
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>images/no-image.gif" alt="no-img" width="100%">
                    <?php endif; ?>
                </div>

                <div class="side__series--r">
                    <!-- カテゴリslug名からカテゴリ情報の取得 -->
                    <?php $cat = get_category_by_slug( $categoryName );  ?>

                    <span class="cat-data cate-<?php echo $categoryName; ?>"><?php echo $cat -> name; ?></span>
                    <p class="side__series--excerpt">
<?php
  if(mb_strlen($post->post_title)>57){
    $title = mb_substr($post->post_title, 0, 44);
    echo $title.'…';
  }else{
    echo $post->post_title;
  }
?></p>
                </div>
            </a>
            <p class="side__series--catelink">
            <a href="/category/<?php echo $categoryName; ?>">view All</a></p>
            
            <?php endwhile; ?>

            <?php endif; wp_reset_postdata();?>
        </div><!--  /.side__series--blc -->


        

    </div>

</div>