<?php if ( is_home() || is_archive() || is_search() ) : ?>
    <div class="u-1of1 u-text-center">

        <?php the_posts_pagination(
            array(
                'prev_text' => esc_html_x( '&larr; Previous', 'posts navigation', 'abraham' ),
                'next_text' => esc_html_x( 'Next &rarr;',     'posts navigation', 'abraham' ),
            )
        ); ?>

    </div>
<?php endif;