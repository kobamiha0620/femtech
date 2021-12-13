<?php get_header(); ?>

<div class="container" id="archive">
<div class="index__inner"><!-- SP用padding Blc -->


<?php
	$categories = get_the_category();
		$tags = get_the_tags();
	?>


	<p class="archive__ttl"><?php the_archive_title('','の記事');?></p>


	<main id="category_main" <?php post_class();?>>
	<section id="" class="articlesWrapper">
	<ul class="articles__list">

	<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>

		<?php  get_template_part('template_parts/loop-content');?>

		
		<nav id="tag_navigation">	

	<?php if (the_tags()) the_tags('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?>
	</nav>
	</ul>
		<?php endwhile;?>
		<?php get_template_part('template_parts/pager'); ?>

		<?php endif;?>
	</main>



  </div><!--end contents-->
  </div><!--end index__inner-->

  <?php get_sidebar(); ?>
</div><!--end container-->
<?php get_footer(); ?>
