<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RM_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<header class="post__header">
		<p class="post__category"><?php echo get_the_title(); ?></p>
	</header><!-- .entry-header -->
	<div class="row">
		<?php if(has_post_thumbnail()): ?>
			<div class="col-lg-4">
				<?php the_post_thumbnail('post-thumbnail',array( 'class' => 'post__media img-fluid' ) ); ?>
			</div><!-- col -->
		<?php endif; ?>

		<div class="<?php echo (has_post_thumbnail()) ? 'col-lg-7 pull-lg-right' : 'col-xs-12' ?>">
			<div class="post__content">
				<?php
				the_content( sprintf(
				/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rm' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="post__footer">
				<?php rm_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- col -->
	</div><!-- row -->




</article><!-- #post-## -->
