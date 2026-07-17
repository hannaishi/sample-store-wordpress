<?php get_header(); ?>

<main class="default-page">
    <div class="l-container-s">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <article class="default-article">
                    <h1 class="default-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="default-content">
                        <?php the_content(); ?>
                    </div>
                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <div class="news-empty">
                <p>
                    投稿が見つかりませんでした。
                </p>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>