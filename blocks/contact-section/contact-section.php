<?php
/**
 * Contact Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'contact-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'contact-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$eyebrow_text = get_field('eyebrow_text');
$main_title = get_field('main_title');
$description = get_field('description');
$button_text = get_field('button_text');
$button_url = get_field('button_url');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="contact-content">
            <?php if ($eyebrow_text) : ?>
                <p class="eyebrow-text"><?php echo esc_html($eyebrow_text); ?></p>
            <?php endif; ?>

            <?php if ($main_title) : ?>
                <h2 class="main-title"><?php echo esc_html($main_title); ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <p class="description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <?php if ($button_text && $button_url) : ?>
                <a href="<?php echo esc_url($button_url); ?>" class="button primary"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section> 