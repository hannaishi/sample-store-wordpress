<?php get_header(); ?>

<main>
<?php if(is_front_page() ): ?>
    <div class="top-kv"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/top-bg-kv@2x.webp');">
        <div class="top-kv-container">
            <p class="top-kv-title">いつもの朝に、ほっとする場所。</p>
            <p class="top-kv-subtitle">手づくりのお弁当やおにぎりなど、地域のみなさまに寄り添うお店です。</p>
            <ul class="top-kv-button">
                <li><a href="#top-news">お知らせを見る</a></li>
                <li><a href="#top-work">採用情報はこちら</a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>

<section id="top-products" class="top-products l-container">
    <div class="title-container">
        <h2 class="common-title">
            手づくり商品
        </h2>
        <div class="common-subtitle">
            <span>地域のみなさまに喜んでいただけるよう、<span>
            <span>心を込めてお作りしています。</span>
        </div>
    </div>

    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    $products = new WP_Query($args);

    $count = 0;

    if ($products->have_posts()) :
        while ($products->have_posts()) :
        $products->the_post();

        $count++;

        // 偶数なら reverse クラス
        $reverse_class = ($count % 2 === 0) ? 'post-card--reverse' : '';
    ?>

    <div class="product-items l-container-s">
        <article class="post-item">

            <div class="post-card <?php echo $reverse_class; ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-card-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <section class="post-card-content">
                    <h2 class="post-title">
                        <?php the_title(); ?>
                    </h2>
                    <p><?php the_excerpt(); ?></p>
                </section>
            </div>
        </article>
    </div>

    <?php
        endwhile;
            wp_reset_postdata();
        endif;
    ?>
</section>

<section id="top-service" class="top-service">
    <div class="title-container l-container">
        <h2 class="common-title">
            地域に寄り添うサービス
        </h2>
        <div class="common-subtitle">
            <span>お買い物だけでなく、日常生活を</span>
            <span>サポートする様々なサービスをご用意しています。</span>
        </div>
    </div>

    <div class="service-container l-container-s">
        <ul class="service-list">
            <?php
                $args = array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );

                $services = new WP_Query($args);

                if ($services->have_posts()) :
                    while ($services->have_posts()) :
                        $services->the_post();
            ?>
            <li class="service-item">
                <div class="service-box">
                    <span class="service-icon">
                        <?php the_post_thumbnail('medium'); ?>
                    </span>
                    <p><?php the_title(); ?></p>
                    <p class="text-small">
                        <?php echo nl2br(get_field('service_text')); ?>
                    </p>
                </div>
            </li>
            <?php
                endwhile;
                wp_reset_postdata();
                endif;
            ?>
        </ul>
    </div>
</section>


<section id="top-news" class="top-news">
    <div class="title-container">
        <h2 class="common-title">
            お知らせ
        </h2>
        <p class="common-subtitle">
            <span>新商品やキャンペーン、地域イベント情報など</span>
            <span>最新のお知らせをお届けします。</span>
        </p>
    </div>

    <div class="news-item l-container-s">
        <?php
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 6
        );

        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) :
            $news_query->the_post();
        ?>

        <article class="news-post">
            <a href="<?php the_permalink(); ?>">

                <div class="news-meta">

                    <img
                        width="16"
                        height="16"
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/news/calender.svg"
                        alt="カレンダー"
                    >
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

                <h3 class="news-post-title">
                    <?php the_title(); ?>
                </h3>

            </a>
        </article>

        <?php
            endwhile;
                wp_reset_postdata();
            endif;
        ?>
    </div>
    <div class="btn-news">
        <a href="<?php echo home_url('/news/'); ?>" class="btn">
            すべてのお知らせを見る
        </a>
    </div>
    </section>

    <section id="top-work" class="top-work">
        <div class="l-container-s">
            <?php
                $recruit_page = get_page_by_path('recruit');
                $recruit_catch = get_field(
                    'recruit_catch',
                    $recruit_page->ID
                );

                $recruit_description = get_field(
                    'recruit_description',
                    $recruit_page->ID
                );

                $hourly_wage = get_field(
                    'hourly_wage',
                    $recruit_page->ID
                );

                $working_hours = get_field(
                    'working_hours',
                    $recruit_page->ID
                );

                $work_location = get_field(
                    'work_location',
                    $recruit_page->ID
                );

                $benefits = get_field(
                    'benefits',
                    $recruit_page->ID
                );

                $application_method = get_field(
                    'application_method',
                    $recruit_page->ID
                );
                $feature_1 = get_field(
                    'feature_1',
                    $recruit_page->ID
                );

                $feature_2 = get_field(
                    'feature_2',
                    $recruit_page->ID
                );

                $feature_3 = get_field(
                    'feature_3',
                    $recruit_page->ID
                );

                $feature_4 = get_field(
                    'feature_4',
                    $recruit_page->ID
                );
                $schedule_time_1 = get_field(
                    'schedule_time_1',
                    $recruit_page->ID
                );

                $schedule_task_1 = get_field(
                    'schedule_task_1',
                    $recruit_page->ID
                );

                $schedule_time_2 = get_field(
                    'schedule_time_2',
                    $recruit_page->ID
                );

                $schedule_task_2 = get_field(
                    'schedule_task_2',
                    $recruit_page->ID
                );

                $schedule_time_3 = get_field(
                    'schedule_time_3',
                    $recruit_page->ID
                );

                $schedule_task_3 = get_field(
                    'schedule_task_3',
                    $recruit_page->ID
                );

                $schedule_time_4 = get_field(
                    'schedule_time_4',
                    $recruit_page->ID
                );

                $schedule_task_4 = get_field(
                    'schedule_task_4',
                    $recruit_page->ID
                );
            ?>

            <div class="top-work-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/work/top-bg-work@2x.jpg');">
                <div class="work-container">
                    <div class="work-title">
                        <?php echo nl2br(esc_html($recruit_catch)); ?>
                    </div>
                    <div class="work-subtitle">
                        <?php echo nl2br(esc_html($recruit_description)); ?>
                    </div>
                    <div class="btn-work">
                        <a class="btn" href="#top-recruit">採用情報を見る</a>
                    </div>
                </div>
            </div>
            <div class="work-sample">
                <h2 class="sample-title">働くイメージ</h2>
                <ul class="sample-list">
                    <li><?php echo esc_html($feature_1); ?></li>
                    <li><?php echo esc_html($feature_2); ?></li>
                    <li><?php echo esc_html($feature_3); ?></li>
                    <li><?php echo esc_html($feature_4); ?></li>
                </ul>
            </div>
            <div class="work-schedule">
                <div class="schedule-title">
                    <h2>1日の流れ(朝勤務例)</h2>
                </div>
                <ul class="schedule-list">
                    <li>
                        <time><?php echo esc_html($schedule_time_1); ?></time>
                        <?php echo esc_html($schedule_task_1); ?>
                    </li>

                    <li>
                        <time><?php echo esc_html($schedule_time_2); ?></time>
                        <?php echo esc_html($schedule_task_2); ?>
                    </li>

                    <li>
                        <time><?php echo esc_html($schedule_time_3); ?></time>
                        <?php echo esc_html($schedule_task_3); ?>
                    </li>

                    <li>
                        <time><?php echo esc_html($schedule_time_4); ?></time>
                        <?php echo esc_html($schedule_task_4); ?>
                    </li>
                </ul>
            </div>
            <div id="top-recruit" class="work-recruit">
                <div class="recruit-title">
                    <h2>募集要項</h2>
                </div>
                <div class="recruit-container">
                    <dl class="recruit-list">
                        <dt>時給</dt><dd><?php echo esc_html($hourly_wage); ?></dd>
                    </dl>
                    <dl class="recruit-list">
                        <dt>勤務時間</dt><dd><?php echo esc_html($working_hours); ?></dd>
                    </dl>
                    <dl class="recruit-list">
                        <dt>勤務地</dt><dd><?php echo esc_html($work_location); ?></dd>
                    </dl>
                    <dl class="recruit-list">
                        <dt>福利厚生</dt><dd><?php echo esc_html($benefits); ?></dd>
                    </dl>
                    <dl class="recruit-list recruit-list-last">
                        <dt>応募方法</dt><dd><?php echo esc_html($application_method); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <section id="top-access" class="top-access">
        <div class="l-container-s">
            <div class="title-container">
                <h2 class="common-title">
                    店舗案内
                </h2>
                <p class="common-subtitle">
                    お気軽にお立ち寄りください
                </p>
            </div>
            <div class="access-container">
                <ul class="access-list">
                    <li class="access-item">
                        <div class="access-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access/map.svg" width='48' height='48' alt='mapアイコン' decoding='async' />
                        </div>
                        <div class="access-info">
                            <h3 class="access-info-title">住所</h3>
                            <div class="access-info-text">
                                <span>〒000-0000</span>
                                <span>〇〇県〇〇市〇〇町1-2-3</span>
                            </div>
                        </div>
                    </li>
                    <li class="access-item">
                        <div class="access-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access/time.svg" width='48' height='48' alt='時計アイコン' decoding='async' />
                        </div>
                        <div class="access-info">
                            <h3 class="access-info-title">営業時間</h3>
                            <div class="access-info-text">
                                <span>6:00 - 23:00</span>
                                <span>年中無休</span>
                            </div>
                        </div>
                    </li>
                    <li class="access-item">
                        <div class="access-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access/telephone.svg" width='48' height='48' alt='電話アイコン' decoding='async' />
                        </div>
                        <div class="access-info">
                            <h3 class="access-info-title">電話番号</h3>
                            <div class="access-info-text">
                                <span>000-0000-0000</span>
                            </div>
                        </div>
                    </li>
                    <li class="access-item">
                        <div class="access-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access/car.svg" width='48' height='48' alt='車アイコン' decoding='async' />
                        </div>
                        <div class="access-info">
                            <h3 class="access-info-title">駐車場</h3>
                            <div class="access-info-text">
                                <span>30台完備</span>
                                <span>24時間無料</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="access-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.3316555639412!2d139.73344131551892!3d35.693455336908414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c5e40fd8ca9%3A0xe4e83101398f38cf!2z44CSMTYyLTA4NDYg5p2x5Lqs6YO95paw5a6_5Yy65biC6LC35bem5YaF55S677yS77yR4oiS77yR77yTIOaKgOihk-ipleirluekvg!5e0!3m2!1sja!2sjp!4v1678004817731!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>