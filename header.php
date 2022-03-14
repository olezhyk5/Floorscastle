<?php
/**
 * Header template.
 *
 * @package fc
 * @since 1.0.0
 *
 */

$booking_button = get_field('booking_button', 'option');
$link_target = $booking_button['target'] ? $booking_button['target'] : '_self';
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
    <header class="flc-header">
        <div class="flc-header__top">
            <a href="<?php echo site_url('/'); ?>" class="flc-header__logo" title="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="logo">
            </a>
            <div class="flc-header__search">
                <form method="get" action="<?php echo site_url('/'); ?>" class="flc-header__search-form">
                    <input type="text" name="s" placeholder="Search">
                </form>
                <div class="flc-header__search-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-search.png" alt="icon">
                </div>
            </div>
        </div>
        <div class="flc-header__wrap">

            <div class="d-lg-block d-none flc-header__lang">
                <?php echo do_shortcode('[gtranslate]'); ?>
            </div>

            <nav class="flc-header__nav">
                <?php wp_nav_menu(
                    array(
                        'container'      => '',
                        'items_wrap'     => '<ul class="flc-header__menu">%3$s</ul>',
                        'theme_location' => 'main-menu',
                        'depth'          => 1,
                        'fallback_cb'    => '__return_empty_string',
                    )
                ); ?>
            </nav>

            <a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo $booking_button['url']; ?>" class="flc-btn flc-btn-secondary" title="Book Tickets"><?php echo $booking_button['title'] ?></a>
            
            <div class="d-lg-none d-flex flc-header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    <main class="main-wrapper">