<?php
/**
 * Icon & Text Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'icon-text-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'icon-text-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$items = get_field('items');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="icon-text-grid">
            <?php if ( $items ) : ?>
                <?php foreach ( $items as $item ) : 
                    $icon = $item['icon'];
                    $description = $item['description'];
                ?>
                    <div class="icon-text-item">
                        <?php if ($icon) : ?>
                            <div class="icon">
                                <?php echo wp_get_attachment_image($icon, 'full'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p class="description"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section> 