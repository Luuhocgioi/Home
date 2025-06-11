<?php
/**
 * Product/Service Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'product-service-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'product-service-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$cards = get_field('cards');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="cards-grid">
            <?php if ( $cards ) : ?>
                <?php foreach ( $cards as $card ) : 
                    $card_title = $card['card_title'];
                    $card_description = $card['card_description'];
                    $card_image = $card['card_image'];
                    $card_link = $card['card_link'];
                ?>
                    <div class="card-item">
                        <div class="card-header">
                            <?php if ($card_title) : ?>
                                <h3 class="card-title"><?php echo esc_html($card_title); ?></h3>
                            <?php endif; ?>
                            <?php if ($card_link) : ?>
                                <a href="<?php echo esc_url($card_link); ?>" class="card-link">></a>
                            <?php endif; ?>
                        </div>
                        <?php if ($card_description) : ?>
                            <p class="card-description"><?php echo esc_html($card_description); ?></p>
                        <?php endif; ?>
                        <?php if ($card_image) : ?>
                            <div class="card-image">
                                <?php echo wp_get_attachment_image($card_image, 'medium'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section> 