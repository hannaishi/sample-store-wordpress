<?php get_header(); ?>

<main class="single-news">

    <div class="l-container-s">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="single-news-article">

                <div class="news-meta">

                    <time datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date('Y/n/j'); ?>
                    </time>

                    <?php
                    $category = get_the_category();
                    if ($category) :
                    ?>
                        <span class="news-label news-label--<?php echo esc_attr($category[0]->slug); ?>">
                            <?php echo esc_html($category[0]->name); ?>
                        </span>
                    <?php endif; ?>

                </div>

                <h1 class="single-news-title">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-news-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="single-news-content">
                    <?php the_content(); ?>
                </div>

                <div class="single-news-back">
                    <a href="<?php echo home_url('/news/'); ?>" class="btn">
                        一覧へ戻る
                    </a>
                </div>

                <div class="single-news-navigation">

                    <div class="single-news-prev">
                        <?php previous_post_link(
                            '%link',
                            '← %title'
                        ); ?>
                    </div>

                    <div class="single-news-next">
                        <?php next_post_link(
                            '%link',
                            '%title →'
                        ); ?>
                    </div>

                </div>

            </article>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
</main>

<?php get_footer(); ?>