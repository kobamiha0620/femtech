<li <?php post_class( 'article-list'); ?> >
    <a href="<?php echo get_permalink(); ?>" class="epick__list--link">

        <!--画像を追加-->
        <div class="epick__img">

                <?php
                  // カスタムフィールドの値を取得
                  $img_field = get_field('product_img');
                  if($img_field){	
                  // 画像・キャプションを出力
                  ?>
                    <img
                    src="<?php echo esc_url($img_field['url']) ?>"
                    alt="<?php echo esc_attr($img_field['alt']) ?>"
                    width="100%" > 
                <?php } ?>

        </div>

        <p class="epick__txt">
            <?php echo get_field('product_midashi')?>
        </p>

    </a>
</li>