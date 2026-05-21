<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>地域のコンビニ</title>
    <meta name="description" content="地域のコンビニ -手作り商品と、地域のみなさまに寄り添うお店です。-" />
    <meta name="format-detection" content="telephone=no" />

    <!-- favicon/webclipicon -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" href="webclip.png" />

    <!-- ogp -->
    <meta property="og:site_name" content="Orange Heart" />
    <meta property="og:url" content="https://verablog.com/practiceHotel" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="地域のコンビニ" />
    <meta property="og:description" content="手作り商品と、地域のみなさまに寄り添うお店です。" />
    <meta property="og:image" content="https://verablog.com/practiceHotel/img/ogp.png" />
    <meta property="og:locale" content="ja_JP" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="地域のコンビニ">
    <meta name="twitter:description" content="手作り商品と、地域のみなさまに寄り添うお店です。">
    <meta name="twitter:image" content="https://verablog.com/practiceHotel/img/ogp.png">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/app.css" type="text/css" />

    <!-- js -->
    <script src="js/main.js" defer></script>
    <?php
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
        wp_enqueue_style('google-web-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic:wght@500;700&display=swap');
        wp_enqueue_script('food-science-main', get_template_directory_uri() . '/assets/js/main.js');
        wp_head();
    ?>
</head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header l-container">
      <h1 class="site-title">
          <a href="#">
              地域のコンビニ
          </a>
      </h1>
      <nav class="header-nav">
        <button class="header-btn-menu">メニュー</button>
        <ul class="header-menu">
            <li><a href="#">TOP</a></li>
            <li><a href="#top-products">商品紹介</a></li>
            <li><a href="#top-service">サービス</a></li>
            <li><a href="#top-access">店舗案内</a></li>
            <li><a href="#top-work">採用情報</a></li>
            <li><a href="news.html">お知らせ</a></li>
            <li><a href="contact.html">お問い合わせ</a></li>
        </ul>
      </nav>
    </header>