<?php
/**
 * 404 Page template.
 *
 * @package fc
 * @since 1.0.0
 *
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
                <div class="flc-error">
                    <div class="flc-error__content">
                        <div class="flc-error__text flc-about__text"><p><?php esc_html_e( 'This page doesn\'t seem to exist .', 'fc' ); ?></p></div>
                        <h1 class="flc-error__title flc-about__title"><?php esc_html_e( '404', 'fc' ); ?></h1>
                        <a href="<?php echo site_url('/'); ?>" class="flc-error__link flc-btn flc-btn-border flc-btn-border-large">
                            <?php esc_html_e('Go home', 'fc'); ?>
                        </a>
                    </div>
                </div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
