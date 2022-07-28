<?php
  $current_tags = get_the_tags();
  foreach($current_tags as $tag):
    $current_tag_list[] = $tag->term_id;
endforeach ;

$args = array(
    'post__not_in' => array($post->ID),
    'tag__in' => $current_tag_list,
	'posts_per_page' => 8,
    'tag'    => implode(",", $term_array),
    'post_status'   => 'publish', 
);

$the_query = new WP_Query($args);
if($the_query -> have_posts()) :?>
<?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
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

            <!--抜粋--> 
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

<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>