<?php
/**
 * Footer template.
 *
 * @package fc
 * @since 1.0.0
 *
 */

$facebook    = get_field('facebook', 'option');
$twitter     = get_field('twitter', 'option');
$instagram   = get_field('instagram', 'option');
$tripadvisor = get_field('tripadvisor', 'option');

$address        = get_field('address', 'option');
$address_button = get_field('address_button', 'option');
$copyright_text = get_field('copyright_text', 'option');
?>
    </main>
    <footer class="flc-footer">
        <div class="container">
            <?php wp_nav_menu(
                array(
                    'container'      => '',
                    'items_wrap'     => '<ul class="flc-footer__menu">%3$s</ul>',
                    'theme_location' => 'footer-menu',
                    'depth'          => 1,
                    'fallback_cb'    => '__return_empty_string',
                )
            ); ?>
            <a href="<?php echo site_url('/'); ?>" class="flc-footer__logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="logo">
            </a>

            <?php if ( ! empty( $address ) ): ?>
                <h6 class="text-center flc-footer__logo-text"><?php echo $address; ?></h6>
            <?php endif ?>

            <div class="flc-footer__soc">
                <?php if ( ! empty( $address_button ) ):
                    $link_target = $address_button['target'] ? $address_button['target'] : '_self'; ?>
                    <a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo $address_button['url'] ?>" class="flc-footer__soc-title"><?php echo $address_button['title']; ?></a>
                <?php endif ?>
                
                <div class="d-flex flc-soc">
                    <?php if ( ! empty( $facebook ) ): ?>
                        <a href="<?php echo $facebook; ?>" class="flc-soc__item" rel="nofollow" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M360.7,284.1l12.5-81.4h-78.1v-52.8c0-22.3,10.9-44,45.9-44h35.5V36.5c0,0-32.2-5.5-63.1-5.5C249.1,31,207,70,207,140.6v62.1h-71.5v81.4H207V481h88V284.1H360.7z" />
                                </g>
                            </svg>
                        </a>
                    <?php endif ?>
                    <?php if ( ! empty( $instagram ) ): ?>
                        <a href="<?php echo $instagram; ?>" class="flc-soc__item" rel="nofollow" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M17.626 1.5h-11.252c-2.691 0.003-4.871 2.183-4.874 4.874v11.252c0.003 2.691 2.183 4.871 4.874 4.874h11.252c2.691-0.003 4.871-2.183 4.874-4.874v-11.252c-0.003-2.691-2.183-4.871-4.874-4.874h-0zM21 17.626c0 1.863-1.511 3.374-3.374 3.374h-11.252c-1.863 0-3.374-1.511-3.374-3.374v0-11.252c0-1.863 1.511-3.374 3.374-3.374h11.252c1.863 0 3.374 1.511 3.374 3.374v0z"></path>
                                <path d="M12 6.75c-3.107 0-5.625 2.518-5.625 5.625s2.518 5.625 5.625 5.625c3.107 0 5.625-2.518 5.625-5.625 0-1.553-0.63-2.96-1.648-3.977v0c-1.012-1.018-2.414-1.648-3.962-1.648-0.005 0-0.011 0-0.016 0h0.001zM12 16.5c-2.278 0-4.125-1.847-4.125-4.125s1.847-4.125 4.125-4.125c2.278 0 4.125 1.847 4.125 4.125v0c0 2.278-1.847 4.125-4.125 4.125v0z"></path>
                                <path d="M19.5 6c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
                            </svg>
                        </a>
                    <?php endif ?>
                    <?php if ( ! empty( $twitter ) ): ?>
                        <a href="<?php echo $twitter; ?>" class="flc-soc__item" rel="nofollow" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M434.7,164.3c0.3,4,0.3,8,0.3,12c0,121.9-92.8,262.4-262.4,262.4c-52.3,0-100.8-15.1-141.6-41.4c7.4,0.9,14.6,1.1,22.3,1.1
                                    c43.1,0,82.8-14.6,114.5-39.4c-40.5-0.9-74.5-27.4-86.2-64c5.7,0.9,11.4,1.4,17.4,1.4c8.3,0,16.6-1.1,24.3-3.1
                                    c-42.3-8.6-74-45.7-74-90.5v-1.1c12.3,6.9,26.6,11.1,41.7,11.7c-24.8-16.6-41.1-44.8-41.1-76.8c0-17.1,4.6-32.8,12.6-46.5
                                    c45.4,56,113.6,92.5,190.2,96.5c-1.4-6.9-2.3-14-2.3-21.1c0-50.8,41.1-92.2,92.2-92.2c26.6,0,50.5,11.1,67.4,29.1
                                    c20.8-4,40.8-11.7,58.5-22.3c-6.9,21.4-21.4,39.4-40.5,50.8c18.6-2,36.5-7.1,53.1-14.3C468.4,134.9,452.7,151.2,434.7,164.3
                                    L434.7,164.3z" />
                                </g>
                            </svg>
                        </a>
                    <?php endif ?>
                    <?php if ( ! empty( $tripadvisor ) ): ?>
                        <a href="<?php echo $tripadvisor; ?>" class="flc-soc__item" rel="nofollow" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                                <path d="M30.7,12.7c0.4-1.6,1.6-3.2,1.6-3.2h-5.3c-3-1.9-6.6-3-10.7-3c-4.2,0-8,1-11,3h-5c0,0,1.2,1.6,1.6,3.2c-1,1.3-1.6,3-1.6,4.7
                                c0,4.4,3.6,8,8,8c2.5,0,4.8-1.2,6.2-3l1.7,2.6l1.7-2.6c0.8,1,1.8,1.8,2.9,2.3c1.9,0.9,4.1,1,6.1,0.2c4.1-1.5,6.3-6.2,4.7-10.3
                                C31.5,13.9,31.1,13.3,30.7,12.7L30.7,12.7z M26.5,23.5c-1.6,0.6-3.3,0.5-4.9-0.2c-1.1-0.5-2-1.3-2.7-2.3c-0.3-0.4-0.5-0.8-0.7-1.3
                                c-0.2-0.5-0.3-1.1-0.3-1.6c-0.1-1.1,0.1-2.2,0.5-3.3c0.7-1.6,2-2.7,3.6-3.3c3.3-1.2,7,0.5,8.2,3.8C31.5,18.6,29.8,22.2,26.5,23.5
                                L26.5,23.5L26.5,23.5z M13.6,21c-1.2,1.7-3.1,2.8-5.3,2.8c-3.5,0-6.4-2.9-6.4-6.4S4.7,11,8.3,11c3.5,0,6.4,2.9,6.4,6.4
                                c0,0.2,0,0.4-0.1,0.6C14.5,19.2,14.1,20.2,13.6,21L13.6,21z M4.2,17.4c0,2.2,1.8,4,4,4s4-1.8,4-4c0-2.2-1.8-4-4-4
                                C6,13.4,4.2,15.2,4.2,17.4L4.2,17.4z M20.3,17.4c0,2.2,1.8,4,4,4s4-1.8,4-4c0-2.2-1.8-4-4-4C22,13.4,20.3,15.2,20.3,17.4L20.3,17.4z
                                 M5.6,17.4c0-1.4,1.2-2.6,2.6-2.6c1.4,0,2.6,1.2,2.6,2.6c0,1.4-1.2,2.6-2.6,2.6C6.7,20,5.5,18.8,5.6,17.4L5.6,17.4z M21.6,17.4
                                c0-1.4,1.2-2.6,2.6-2.6c1.4,0,2.6,1.2,2.6,2.6c0,1.4-1.2,2.6-2.6,2.6C22.7,20,21.6,18.8,21.6,17.4L21.6,17.4z M16.2,7.9
                                c2.9,0,5.5,0.5,7.8,1.5c-0.9,0-1.7,0.2-2.5,0.5c-2,0.7-3.6,2.2-4.5,4.2c-0.4,0.9-0.6,1.8-0.7,2.8c-0.3-4.1-3.7-7.4-7.8-7.4
                                C10.6,8.5,13.3,7.9,16.2,7.9L16.2,7.9z" />
                            </svg>
                        </a>
                    <?php endif ?>
                </div>
            </div>
            <div class="flc-footer__bottom text-center">

                <?php echo $copyright_text; ?>

                <?php wp_nav_menu(
                    array(
                        'container'      => '',
                        'items_wrap'     => '<ul class="flc-footer__bottom-nav">%3$s</ul>',
                        'theme_location' => 'copyright-menu',
                        'depth'          => 1,
                        'fallback_cb'    => '__return_empty_string',
                    )
                ); ?>
                <div class="d-flex align-items-center justify-content-center flc-footer__author">
                    Website by
                    <a href="https://engineroom.uk/" rel="nofollow" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="66px" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="-370 294 59 14" style="enable-background:new -370 294 59 14;" xml:space="preserve">
                            <g>
                                <path class="st0" d="M-332.5,301.1c0.1,0,0.2,0.1,0.2,0.1C-332.4,301.2-332.4,301.1-332.5,301.1z"/>
                                <path class="st0" d="M-313.4,299.3l-0.5,3.7L-313.4,299.3z"/>
                                <path class="st0" d="M-315.3,303.7l0.6-3.7L-315.3,303.7z"/>
                                <path class="st0" d="M-369.1,295.1v11.8h5v-1.8h-3.1v-3.4h2.5v-1.8h-2.5v-3.2h3.1v-1.8L-369.1,295.1z"/>
                                <path class="st0" d="M-331.4,305.5v-1.8c0-1.4-0.4-2.1-1.2-2.4c0.8-0.4,1.2-1.2,1.2-2.3v-1c0-1.8-0.9-2.7-2.7-2.7h-2.8v11.8h1.8
                                    v-4.9h0.6c0.9,0,1.2,0.4,1.2,1.5v1.8c0,1,0.1,1.1,0.2,1.5h1.8C-331.3,306.4-331.4,306-331.4,305.5z M-335,296.7h0.9
                                    c0.7,0,1,0.4,1,1.2v1.2c0,0.9-0.4,1.2-1.1,1.2h-0.7L-335,296.7z M-332,301.5C-332,301.5-332,301.4-332,301.5z M-331.8,301.8
                                    C-331.8,301.8-331.8,301.7-331.8,301.8C-331.8,301.7-331.8,301.8-331.8,301.8z M-332.4,301.2c-0.1,0-0.2-0.1-0.2-0.1
                                    C-332.4,301.1-332.4,301.2-332.4,301.2z"/>
                                <path class="st0" d="M-359.5,296.1v6.1l-1.6-6.1h-2.1v10.6h1.6v-7.5l2,7.5h1.6v-10.5L-359.5,296.1z M-359.5,302.6v-3.1V302.6z
                                     M-361.9,299.2v3.8V299.2z"/>
                                <path class="st0" d="M-354.7,296c-1.7,0-2.4,1-2.4,2.7v5.5c0,1.8,0.9,2.7,2.4,2.7c1.7,0,2.4-1,2.4-2.7v-3.3h-2.3v1.6h0.8v1.8
                                    c0,0.7-0.3,1.1-0.9,1.1c-0.6,0-0.9-0.4-0.9-1.1v-5.7c0-0.7,0.3-1.1,0.9-1.1c0.6,0,0.9,0.4,0.9,1.1v1.1h1.6v-1
                                    C-352.1,297-353,296-354.7,296z"/>
                                <path class="st0" d="M-351.3,296.1l-0.1,10.7h1.6v-10.7H-351.3z"/>
                                <path class="st0" d="M-344.8,296.1v6.1l-1.7-6.1h-2.1v10.6h1.6v-7.5l2,7.5h1.7v-10.5L-344.8,296.1z M-344.8,302.6v-3.1V302.6z
                                     M-347.1,299.2v3.8V299.2z"/>
                                <path class="st0" d="M-342.3,296.1l-0.1,10.7h4.6v-1.6h-2.8v-3h2.2v-1.6h-2.2v-2.9h2.8v-1.6H-342.3z"/>
                                <path class="st0" d="M-328,296c-1.6,0-2.5,1-2.5,2.7v5.5c0,1.8,1,2.7,2.5,2.7c1.6,0,2.5-1,2.5-2.7v-5.5
                                    C-325.5,297-326.3,296-328,296z M-328.9,298.7c0-0.7,0.3-1.1,0.9-1.1s0.9,0.4,0.9,1.1v5.7c0,0.7-0.3,1.1-0.9,1.1s-0.9-0.4-0.9-1.1
                                    V298.7z"/>
                                <path class="st0" d="M-322.3,296c-1.6,0-2.5,1-2.5,2.7v5.5c0,1.8,1,2.7,2.5,2.7c1.6,0,2.5-1,2.5-2.7v-5.5
                                    C-319.7,297-320.5,296-322.3,296z M-323,298.7c0-0.7,0.3-1.1,0.9-1.1c0.6,0,0.9,0.4,0.9,1.1v5.7c0,0.7-0.3,1.1-0.9,1.1
                                    c-0.6,0-0.9-0.4-0.9-1.1V298.7z"/>
                                <path class="st0" d="M-311.9,296.1h-2.3l-1.1,7.3l-1.2-7.3h-2.3v10.6h1.5v-7.2l1.2,7.2h1.5l1.1-7.2v7.2h1.6V296.1z M-315.3,303.7
                                    l0.5-3.7L-315.3,303.7z M-317.3,299.4v3.8V299.4z M-313.9,303l0.6-3.7v0.1L-313.9,303z"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
	<?php wp_footer(); ?>
	</body>
</html>
