<?php get_header(); ?>

<main class="news-archive">

<section class="news-main l-container-s">

    <div class="news title-container">
        <h2 class="common-title">
            お知らせ
        </h2>
        <p class="common-subtitle">
            <span>新商品やキャンペーン、地域イベント情報など</span>
            <span>最新のお知らせをお届けします。</span>
        </p>
    </div>

    <div class="news-category">
        <ul class="news-menu">
            <?php
                $current_category = get_queried_object();
            ?>

            <li class="news-li">
                <a
                    href="<?php echo home_url('/news/'); ?>"
                    class="<?php if (!is_category()) echo 'is-active'; ?>"
                >
                    すべて
                </a>
            </li>

            <?php
                $categories = get_categories();
                foreach ($categories as $category) :
            ?>
                <li class="news-li">
                    <a
                        href="<?php echo get_category_link($category->term_id); ?>"
                        class="<?php
                            if (
                                is_category() &&
                                isset($current_category->term_id) &&
                                $current_category->term_id === $category->term_id
                            ) {
                                echo 'is-active';
                            }
                        ?>"
                    >
                        <?php echo esc_html($category->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="news-posts">

        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>

                <article class="post-item news-post-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-card <?php if(!has_post_thumbnail()) echo 'post-card-left'; ?>">
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="post-card-image news-card">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <section class="news-post-card-content">
                                <div class="news-meta">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('Y/n/j'); ?>
                                    </time>
                                    <?php
                                        $category = get_the_category();
                                        if($category) :
                                    ?>
                                        <span class="news-label news-label--<?php echo esc_attr($category[0]->slug); ?>">
                                            <?php echo esc_html($category[0]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <h2 class="news-post-title news-title">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="news-post-text">
                                    <?php the_excerpt(); ?>
                                </p>
                            </section>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        <?php else : ?>

            <div class="news-empty">
                <img
                    width="16"
                    height="16"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/news/bell.png"
                    alt="カレンダー"
                >
                <p>
                    このカテゴリーの投稿はありません
                </p>
            </div>

        <?php endif; ?>
    </div>
</section>

</main>

<?php get_footer(); ?>


