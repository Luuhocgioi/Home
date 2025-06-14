<?php
/**
 * Featured Content Carousel Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'featured-content-carousel-' . $block['id'];

// Create class attribute for alignment and other settings.
$className = 'featured-content-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// ACF fields
$featured_eyebrow = get_field('eyebrow_text');
$featured_title = get_field('title');
$featured_description = get_field('description');
$read_now_link = get_field('read_now_link');
$featured_image = get_field('featured_image');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="carousel-wrapper">
        <div class="carousel-nav-arrow left">&lt;</div>
        <div class="content-left">
            <?php if ($featured_eyebrow): ?>
                <div class="eyebrow"><?php echo esc_html($featured_eyebrow); ?></div>
            <?php endif; ?>
            <?php if ($featured_title): ?>
                <h2 class="title"><?php echo esc_html($featured_title); ?></h2>
            <?php endif; ?>
            <?php if ($featured_description): ?>
                <p class="description"><?php echo esc_html($featured_description); ?></p>
            <?php endif; ?>
            <?php if ($read_now_link): ?>
                <a href="<?php echo esc_url($read_now_link['url']); ?>" target="<?php echo esc_attr($read_now_link['target'] ? $read_now_link['target'] : '_self'); ?>" class="read-now-link">
                    <?php echo esc_html($read_now_link['title']); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="image-right">
            <?php if ($featured_image): ?>
                <img src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($featured_image['alt']); ?>">
            <?php endif; ?>
        </div>
        <div class="carousel-nav-arrow right">&gt;</div>
    </div>
</section> 