<li <?php post_class( 'article-list'); ?> >
        <a href="<?php echo get_permalink(); ?>" class="articles__list--link">
            <!--画像を追加-->
            <div class="articles__img">
                <?php if( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('midium'); ?>
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img" width="100%">
                <?php endif; ?>
            </div>


            <div class="articles__txtwrap">
            <div class="articles__blc">

                <!--カテゴリ-->
              
                <?php if (has_category()): ?>
                  <!-- // カテゴリースラッグ下記以外のカテゴリーに属した記事のときの処理を書く -->
       
                  <?php $postcat = get_the_category(); for($i = 0; count($postcat) > $i; $i++){
                      $postName = $postcat[$i]->name;
                      $postId = $postcat[$i]->slug;?>
        
                      <span class="cat-data cate-<?php echo $postId; ?>"><?php echo $postName; ?></span>

                  <?php } ?>

                  <?php endif; ?>
              
                  <div class="articles__ex">
                    <!--投稿日を表示-->
                    <span class="articles__date">
                      <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                        <?php echo get_the_date(); ?>
                      </time>
                    </span>
                    <!--著者を表示-->
                    <span class="articles__author">by  <?php the_author(); ?> </span>
                    </div>
                  </div>

                <!-- タイトル --> 
                <div class="pc">
                  <p class="articles__excerpt">

                  <?php
                    if(mb_strlen($post->post_title)>57){
                      $title = mb_substr($post->post_title, 0, 57);
                      echo $title.'…';
                    }else{
                      echo $post->post_title;
                    }
                  ?>
                  </p>
                </div>
                <div class="sp"><p class="articles__excerpt">
                <?php
                    if(mb_strlen($post->post_title)>33){
                      $title= mb_substr($post->post_title, 0, 33);
                      echo $title.'…';
                    }else{
                      echo $post->post_title;
                    }
                  ?>
                </p></div>




                <div class="sp">
                  <div class="articles__small">
                  <!--投稿日を表示-->
                  <span class="articles__date">
                    <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                      <?php echo get_the_date(); ?>
                    </time>
                  </span>
                  <!--著者を表示-->
                  <span class="articles__author">by  <?php the_author(); ?> </span>
                  </div>
                </div>

                </div><!--end article__txtwrap-->

        </a>
    </li>