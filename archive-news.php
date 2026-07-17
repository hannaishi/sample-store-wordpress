<?php get_header(); ?>

    <main>

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
                        $categories = get_categories();
                        $current_category = isset($_GET['news_category']) ? sanitize_text_field($_GET['news_category']) : '';
                    ?>

                    <li class="news-li">
                        <a 
                            href="<?php echo home_url('/news/'); ?>"
                            class="is-active"
                        >
                            すべて
                        </a>
                    </li>

                    <?php foreach ($categories as $category) : ?>
                        <li class="news-li">
                            <a href="<?php echo get_category_link($category->term_id); ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                );

                if (!empty($current_category)) {
                    $args['category_name'] = $current_category;
                }

                    $news_query = new WP_Query($args);
                ?>
                <?php if ($news_query->have_posts()) : ?>
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
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
                                            <img
                                                width="16"
                                                height="16"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/news/calender.svg"
                                                alt="カレンダー"
                                            >
                                            <time datetime="<?php echo get_the_date('c'); ?>" class="c-date">
                                                <?php echo get_the_date('Y/n/j'); ?>
                                            </time>
                                            <?php
                                                $categories = get_the_terms(get_the_ID(), 'category');

                                                if ($categories && !is_wp_error($categories)) :
                                                    $category = $categories[0];
                                            ?>
                                                <span class="news-label news-label--<?php echo esc_attr($category->slug); ?>">
                                                    <?php echo esc_html($category->name); ?>
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

                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'total' => $news_query->max_num_pages,
                            'current' => $paged,
                            'mid_size' => 1,
                            'prev_text' => '←',
                            'next_text' => '→',
                            'add_args' => !empty($current_category) ? array(
                                'news_category' => $current_category,
                            ) : false,
                        ));
                        ?>
                    </div>

                    <?php wp_reset_postdata(); ?>

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

        </section>

    </main>
<?php get_footer(); ?>


