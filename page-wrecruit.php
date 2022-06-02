<?php get_header(); ?>
<div class="container">




    <div class="page" id="page">



            <div class="page__contentsinner">
                <!-- コンタクトフォームの追加 -->
                <div id="wrecruit" class="wrecruit">
                    <div class="wrecruit__top">
                        <!-- <h2 class="wrecruit__top--ttl"><span>あなたの体とこころのお悩み募集</span></h2>
                        <p class="wrecruit__top--subttl"><span>あなたが日頃感じている悩みを教えてください。</span></p>
                    <p class="wrecruit__top--txt">採用されたお悩みは、匿名で記事に使用させていただく場合がございます。<br>すべてのお悩みに回答はいたしかねますので、あらかじめご了承ください。</p> -->
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="6876" title="ライター募集"]'); ?>
                </div>
                <!-- コンタクトフォームの追加 -->




            </div>


    </div><!-- /#page -->



    <div class="sp">
        <!-- KEYWORD -->
        <?php get_template_part('template_parts/keyword'); ?>
        <!-- ランキング記事 -->
        <?php get_template_part('template_parts/ranking'); ?>
        <!-- HOT TAG -->
        <?php get_template_part('template_parts/hottag'); ?>
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


</div>
<!--end contents-->




<div class="pc"><?php get_sidebar(); ?></div>


<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/page.js"></script> -->

<?php get_footer(); ?>