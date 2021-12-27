<div class="side__ranking">
  <h2 class="side__ttl">
    <span class="side__ttl--en">RANKING</span>
    <span class="side__ttl--jp">人気の記事</span>
  </h2>

  <section class="carousel" aria-label="Gallery">
    <div class="side__ranking--inner">

      <div class="carousel__viewport--wrapper">
        <ol class="carousel__viewport">

          <li tabindex="0" class="carousel__slide show">
            <!-- 全体ランキング -->
            <?php
              $arg = array (
              'post_type' => 'post',
              'limit' => 5, //表示数
              'range' => 'monthly', //期間
              'stats_date' => true,
              'stats_date_format' => 'Y.m.d',
              'title_length' => 45,
              'order_by' => 'views', 
              'excerpt_by_words'=> 45,
              'stats_category'  => true
              );
              wpp_get_mostpopular($arg);  
            ?>
            <!-- 全体ランキング -->

          </li>

          
          <?php 
            // このカテゴリslug分ランキングを表示する
            $rankingArray = ['pms', 'femtech', 'well', 'serial', 'mens', 'resarch' ];
              for($i = 0; count($rankingArray) > $i; $i++){
                $cate_info = get_category_by_slug($rankingArray[$i]);
                $cate = $cate_info->cat_ID;
                $array = $rankingArray[$i];
            ?>
              <li id="carousel__slide-<?php echo $rankingArray[$i]; ?>" tabindex="0" class="carousel__slide-<?php echo $array; ?>  carousel__slide">
                <div id="slide<?php echo $rankingArray[$i]; ?>">
                  <!-- フェムテック -->
                  <?php

                      $arg = array (
                        'post_type' => 'post',
                        'limit' => 5, //表示数
                        'range' => 'monthly', //期間
                        'stats_date' => true,
                        'stats_date_format' => 'Y.m.d',
                        'title_length' => 45,
                        'cat' =>  $cate, //カテゴリ名
                        'order_by' => 'views', 
                        'stats_category'  => true
                      );

                      wpp_get_mostpopular($arg);  

                      ?>
                  <!-- フェムテック -->
                </div>
              </li>              


            <?php } ?>
        
        </ol>
      </div><!-- carousel__viewport--wrapper -->

      <aside class="carousel__navigation">
        <div class="js-prevscroll carousel__navigation--prevscroll"></div>
        <ol class="js-scrollArea carousel__navigation--list"  >
          <li class="carousel__navigation-item active">ALL</li>
          <li class="carousel__navigation-item carousel__navigation-pms">PMS</li>
          <li class="carousel__navigation-item carousel__navigation-fem">FEMTECH</li>
          <li class="carousel__navigation-item carousel__navigation-sex">SEXUAL</li>
          <li class="carousel__navigation-item carousel__navigation-serial">連載</li>
          <li class="carousel__navigation-item carousel__navigation-mens">for MEN</li>
          <li class="carousel__navigation-item carousel__navigation-resarch">RESEARCH</li>

        </ol>
        <div class="js-nextscroll carousel__navigation--nextscroll"></div>
      </aside>

    </div>
  </section>
</div>

