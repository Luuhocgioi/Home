<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <?php

        /**
         * Header Partial Template.
         */

        // Load values from Options Page.
        $logo = get_field('logo', 'option');
        $menu_items = get_field('menu_items', 'option');
        $button_text = get_field('button_text', 'option');
        $button_link = get_field('button_link', 'option');
        ?>

        <header class="site-header">
            <div class="site-header-inner">
                <?php if ($logo): ?>
                    <div class="site-header-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                        </a>
                    </div>
                <?php endif; ?>

                <div class="site-header-nav-group">
                    <?php if ($menu_items): ?>
                        <nav class="site-header-nav">
                            <ul>
                                <?php foreach ($menu_items as $item): ?>
                                    <li><a href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['text']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                    <span class="separator">|</span>
                    <div class="site-header-right-nav">
                        <a href="#" class="provider-portal">Provider Portal</a>
                        <i class="bi bi-search"></i>
                    </div>
                </div> <!-- End site-header-nav-group -->

                <?php if ($button_text && $button_link): ?>
                    <div class="site-header-cta">
                        <a href="<?php echo esc_url($button_link); ?>" class="button"><?php echo esc_html($button_text); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </header>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>