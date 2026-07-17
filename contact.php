<?php
/*
Template Name: お問い合わせページ
*/
?>
<?php get_header(); ?>
    <main>
        <section class="contact-main l-container-s">
            <div class="contact title-container">
                <h2 class="common-title">
                    お問い合わせ
                </h2>

                <p class="common-subtitle">
                    <span>ご質問・ご要望など、お気軽にお問い合わせください。</span>
                    <span>スタッフが丁寧に対応いたします。</span>
                </p>
            </div>

            <div class="box-white">
                <ul class="access-list">
                    <li class="list-title">
                        店舗情報
                    </li>
                    <li class="access-item">
                        <div class="access-icon">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/map.svg"
                                width="48"
                                height="48"
                                alt="mapアイコン"
                                decoding="async"
                            >
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
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/time.svg"
                                width="48"
                                height="48"
                                alt="時計アイコン"
                                decoding="async"
                            >
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
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/telephone.svg"
                                width="48"
                                height="48"
                                alt="電話アイコン"
                                decoding="async"
                            >
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
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/car.svg"
                                width="48"
                                height="48"
                                alt="車アイコン"
                                decoding="async"
                            >
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

                <div class="form-container">
                    <div class="list-title">
                        <h2>お問い合わせフォーム</h2>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="efcd606" title="お問い合わせフォーム"]'); ?>
                </div>
                <!-- / form-wrapper --></div>
            </div>
            <div class="access-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.3316555639412!2d139.73344131551892!3d35.693455336908414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c5e40fd8ca9%3A0xe4e83101398f38cf!2z44CSMTYyLTA4NDYg5p2x5Lqs6YO95paw5a6_5Yy65biC6LC35bem5YaF55S677yS77yR4oiS77yR77yTIOaKgOihk-ipleirluekvg!5e0!3m2!1sja!2sjp!4v1678004817731!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>

<?php get_footer(); ?>