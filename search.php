<?php
get_header();
global $wp_query; // Ensure $wp_query is accessible
?>

<div class="inner-banner">
    <div class="container">
        <h3>Search</h3>
    </div><!-- /.container -->
</div>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <div class="search-result-count default-max-width">
            <?php
            printf(
                esc_html(
                    _n(
                        'We found %d result for your search.',
                        'We found %d results for your search.',
                        (int) $wp_query->found_posts,
                        'ikonictheme'
                    )
                ),
                (int) $wp_query->found_posts
            );
            ?>
        </div><!-- .search-result-count -->

        <div class="search-results">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="search-result-item">
                    <!-- Display Featured Image -->
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="search-result-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Display Post Title -->
                    <div class="search-result-content">
                        <h2 class="search-result-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <!-- Display Post Excerpt -->
                        <div class="search-result-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div><!-- .search-result-item -->
            <?php endwhile; ?>
        </div><!-- .search-results -->

    <?php else : ?>
        <!-- If no posts found, show the "No posts found" template -->
		 <div class="not_found_post">
			 <?php get_template_part( 'template-parts/content/content-none' ); ?>
		 </div>
    <?php endif; ?>
</div><!-- /.container -->

<?php get_footer(); ?>
