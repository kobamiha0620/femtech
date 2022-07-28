<?php get_header(); ?>

<div class="container">

  <!-- TOPのみ -->
  <section class="slideTop">

    <!-- トップページにだけ表示 -->
    <div class="slide">
      <ul class="slick">

      <!-- 対談記事の指定 -->
      <?php 

        //１件目毎月変更するよー
        $postId01 = 7498;
        $user_id01 = get_post_field( 'post_author', $postId01 );
        $post_date01 = get_the_date( 'Y.m.d', $postId01 );
        
        //②星占いの記事ID（最新１件を表示）

        //③固定ページのデータは手動で表示

      ?>


      <li>
          <div class="slide__wrap">
            <a href="<?php echo get_permalink($postId01); ?>" class="slide__wrap--link">
              <!--画像を追加-->
              <div class="slide__img">
               <?php echo get_the_post_thumbnail( $postId01 ) ?>

              </div><!--  slide__img -->

              <!--whiteを追加-->
              <div class="slide__white"></div>

              <div class="slide__txtblc">
                <div class="slide__txtwrap">

                  <div class="slide__cate">
                  <?php if (has_category()): ?>
                  <?php $postcat = get_the_category($postId01); for($i = 0; count($postcat) > $i; $i++){
                      $postName = $postcat[$i]->name;
                      $postId = $postcat[$i]->slug;
                  ?>
                  <p class="cat-data cate-<?php echo $postId; ?>"><?php echo $postName; ?></p>

                <?php } ?>
                <?php endif; ?>

                  </div><!-- slide__cate -->

                  <!--投稿日を表示-->
                  <span class="cate__date">
                    <time datetime="<?php echo $post_date01; ?>">
                      <?php echo $post_date01; ?>
                    </time>
                  </span>

                  <!--著者を表示-->
                  <span class="cate__author">by <?php echo get_the_author_meta( 'display_name', $user_id01 ); ?></span>

                </div>

                <p class="slide__excerpt"><?php echo get_the_title( $postId01 ); ?></p>
              </div>
            </a>
          </div>
        </li>


        <!-- 星占い -->
        <?php query_posts('post_type=post&posts_per_page=1&cat=431'); ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <li>
      <div class="slide__wrap">
			<a href="<?php the_permalink(); ?>" class="slide__wrap--link">
			<!--画像を追加-->
			<div class="slide__img">
			<?php if( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail('medium'); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img"/>
			<?php endif; ?>
			</div><!--  slide__img -->

			<!--whiteを追加-->
			<div class="slide__white"></div>

			<div class="slide__txtblc">
			<div class="slide__txtwrap">

				<div class="slide__cate">
					<!--カテゴリ-->
				<?php if (has_category()): ?>
					<?php $postcat = get_the_category(); for($i = 0; count($postcat) > $i; $i++){
					$postName = $postcat[$i]->name;
					$postId = $postcat[$i]->slug;
          ?>
				<p class="cat-data cate-<?php echo $postId; ?>"><?php echo $postName; ?></p>

				<?php } ?>
				<?php endif; ?>

				</div><!-- slide__cate -->

				<!--投稿日を表示-->
				<span class="cate__date">
					<time datetime="<?php echo get_the_date(); ?>">
					<?php echo get_the_date(); ?>
					</time>
				</span>

				<!--著者を表示-->
				<span class="cate__author">by <?php the_author(); ?></span>
			</div>

			<p class="slide__excerpt"><?php the_title(); ?></p>
			</div>
		</a>
    </div>
		</li>
        

    
        <?php endwhile; else : ?>
          <?php endif; ?>

            <!-- ③固定ページ -->
            <li>
          <div class="slide__wrap">
            <a href="/consultation/" class="slide__wrap--link">
              <!--画像を追加-->
              <div class="slide__img">
               <img src="https://femtech.tv/wp-content/uploads/2022/07/test.png" alt="">

              </div><!--  slide__img -->

              <!--whiteを追加-->
              <div class="slide__white"></div>

              <div class="slide__txtblc">
                <div class="slide__txtwrap">

                  <div class="slide__cate">

                  <p class="cat-data cate-beauty">お悩み募集</p>
                  </div><!-- slide__cate -->
                </div>

                <p class="slide__excerpt">あなたが日頃感じているお悩みを教えてください</p>
              </div>
            </a>
          </div>
        </li>


        <?php
     $duration = date('Y-m-d', strtotime('-32days'));
      $args = array(
        'post_type' => 'post', // 投稿タイプ
        'post_status' => 'publish', //公開済みのページのみ取得
        'orderby' => 'rand', // 表示順の基準
        'posts_per_page' => 2, // 表示件数の指定
        'cat' => '-278, -430, -431', //EditorsPick・星占いを除外
        'post__not_in' => array($postId01), //除外したい投稿のID
        'date_query' => array(
          'after' => $duration,
          'inclusive' => true //afterとbeforeに指定した日を含めるかどうか
       )
  
      );
		$posts = get_posts( $args );
		foreach ( $posts as $post ): // ループの開始
		setup_postdata( $post ); // 記事データの取得
		?>

		<li>
      <div class="slide__wrap">
			<a href="<?php the_permalink(); ?>" class="slide__wrap--link">
			<!--画像を追加-->
			<div class="slide__img">
			<?php if( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail('medium'); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img"/>
			<?php endif; ?>
			</div><!--  slide__img -->

			<!--whiteを追加-->
			<div class="slide__white"></div>

			<div class="slide__txtblc">
			<div class="slide__txtwrap">

				<div class="slide__cate">
					<!--カテゴリ-->
				<?php if (has_category()): ?>
					<?php $postcat = get_the_category(); for($i = 0; count($postcat) > $i; $i++){
					$postName = $postcat[$i]->name;
					$postId = $postcat[$i]->slug;
          ?>
				<p class="cat-data cate-<?php echo $postId; ?>"><?php echo $postName; ?></p>

				<?php } ?>
				<?php endif; ?>

				</div><!-- slide__cate -->

				<!--投稿日を表示-->
				<span class="cate__date">
					<time datetime="<?php echo get_the_date(); ?>">
					<?php echo get_the_date(); ?>
					</time>
				</span>

				<!--著者を表示-->
				<span class="cate__author">by <?php the_author(); ?></span>
			</div>

			<p class="slide__excerpt"><?php the_title(); ?></p>
			</div>
		</a>
    </div>
		</li>

		<?php
		endforeach; // ループの終了
		wp_reset_postdata(); // 直前のクエリを復元する
		?>

      </ul>
    </div>
  </section>


  <!-- /.TOPのみ ----------------->

  <!-- 1周年記念バナー -->
  <!-- <section class="sp"> 
    <div class="index__inner">

      <a href="https://femtech.tv/news179/" class="sidebar__bnrs">
        <img src="https://femtech.tv/wp-content/uploads/2022/03/bnr_1st.jpg" alt="１周年記念" width="100%">
        <p class="catephp__link">1周年スペシャル対談はこちら</p>
      </a>
    </div>
    </section> -->
  <!-- /.1周年記念バナー -->

  <div class="index__inner">
    <!-- SP用padding Blc -->

    <!-- TOP最新記事 -->
    <section id="toparticles">
      <div class="articles" id="js-newest">
        <h2 class="articles__ttl">
          <span class="articles__ttl--en">NEW ARRIVAL</span>
          <span class="articles__ttl--jp">最新記事</span>
        </h2>

        <ul class="articles__list">
          <!-- //EditorsPickを除外 -->
          <?php query_posts('post_type=post&posts_per_page=5&cat=-278, -430'); ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php get_template_part('template_parts/newestArticle'); ?>

          <?php endwhile; else : ?>
          <?php endif; ?>


        </ul>

        <a href="/latest-all/" class="articles__link">最新の記事を全て見る ＞</a>

      </div> <!-- #js-newest -->

    </section><!-- #toparticles -->
  </div><!-- index__inner -->


  <!-- EDITOR'S PICK ------------------------------------------------->
  <?php get_template_part('/template_parts/epick'); ?>
  <!-- EDITOR'S PICK ------------------------------------------------->


  <div class="sp">
    <!-- KEYWORD -->
    <?php get_template_part('template_parts/keyword'); ?>
    <!-- ランキング記事 -->
    <?php get_template_part('template_parts/ranking'); ?>
    <!-- HOT TAG -->
    <?php get_template_part('template_parts/hottag'); ?>
    <!-- バナー設定 -->
    <?php get_template_part('template_parts/bnrs'); ?>
    <!-- SERIES -->
    <?php get_template_part('template_parts/series'); ?>
  </div>





  <!-- EDITOR'S CHOICE ------------------------------------------------->
  <div class="index__inner">
    <!-- SP用padding Blc -->
    <?php get_template_part('/template_parts/echoice'); ?>
  </div><!-- index__inner -->
  <!-- EDITOR'S CHOICE ------------------------------------------------->


  <!--
  <div class="sp">
  /* get_template_part('template_parts/insta'); */
  </div>
  -->

  <!-- コンタクトフォームの追加 -->

  <!-- コンタクトフォームの追加 -->


  <div class="index__inner">
    <!-- SP用padding Blc -->
    <div class="sp">
      <section class="spbtm">
        <h2 class="spbtm__ttl">フェムテックtv</h2>
        <p class="spbtm__txt">生理、PMS、セクシャルな問題など自分のカラダについて、たった1人で悩んでいる皆さんへ。<br>
          大切なのは、「知る」「共有する」こと。<br>
          このフェムテックtvは、自分のカラダについての“知らなかった”をなくすためのフェムテック情報共有サイトです。<br>
          毎日をイキイキと、自分らしく過ごすために。<br>正しい情報を知って、話して、整える輪を広め、悩める女性がいなくなる世の中を目指します。</p>
      </section>
    </div>
  </div><!-- index__inner -->

  <!-- EDITOR Introduce ------------------------------------------------->
  <div class="index__inner">
    <!-- SP用padding Blc -->
    <div class="sp">
      <?php get_template_part('/template_parts/editorsIntro'); ?>
    </div>

  </div><!-- index__inner -->
  <!-- EDITOR Introduce ------------------------------------------------->


</div>
<!--end contents-->

<div class="pc"><?php get_sidebar(); ?></div>



<?php get_footer(); ?>