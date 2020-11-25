<?php
/**
 * ============== Template Name: Mandatory Page
 *
 * @package heritageed
 */
get_header();?>

<section class="mandatory">
	<div class="container">
		<div class="back">
			<div class="sticky">
				<a href="<?php echo home_url( '/' );?>" class="button"><i class="fas fa-chevron-left"></i>Back To Site</a>
			</div>
		</div>
		<div class="content">
			<h1 class="heading heading__3"><?php the_title();?></h1>
			<?php the_field('text');?>
		</div>
	</div>
</section>

<?php get_footer();?>