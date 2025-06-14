<?php get_header(); ?>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="page-title"><?php the_title(); ?></h1>

                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </article>

    <?php
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>

</main>

<?php get_footer(); ?>
