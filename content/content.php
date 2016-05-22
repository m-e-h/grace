<?php
/**
 * General fallback template for post archives.
 *
 * @package abraham
 */

?>
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

		<?php get_template_part( 'components/img', 'hd' ); ?>

		<?php get_template_part( 'components/entry', 'header' ); ?>

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php tha_entry_content_before(); ?>
			<?php the_excerpt(); ?>
			<?php tha_entry_content_after(); ?>
		</div>

		<?php get_template_part( 'components/entry', 'footer' ); ?>

<?php tha_entry_bottom(); ?>

</article>
