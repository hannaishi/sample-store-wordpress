<?php get_header(); ?>

<main class="error404-page">
    <section class="error404-content l-container-s">
        <p class="error404-code">404</p>

        <h1 class="error404-title">
            ページが見つかりません
        </h1>

        <p class="error404-text">
            お探しのページは削除されたか、URLが変更された可能性があります。
        </p>

        <div class="error404-button">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">
                トップページへ戻る
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>