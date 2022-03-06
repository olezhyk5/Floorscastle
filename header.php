<?php
/**
 * Header template.
 *
 * @package fc
 * @since 1.0.0
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="d-header">
    <div class="d-header__nav">
        <?php wp_nav_menu(
            array(
                'container'      => '',
                'items_wrap'     => '<ul class="d-header__menu">%3$s</ul>',
                'theme_location' => 'main-menu',
                'depth'          => 1,
                'fallback_cb'    => '__return_empty_string',
            )
        ); ?>
        <div class="d-header__close"></div>
    </div>

    <a href="<?php echo site_url('/'); ?>" class="d-header__logo"><?php esc_html_e('fc', 'fc'); ?></a>

    <div class="d-header__button">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>