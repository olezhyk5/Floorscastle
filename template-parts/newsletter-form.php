<div class="flc-newsletter">
    <div class="container">
        <div class="d-flex flc-newsletter__wrap">
            <div class="flc-newsletter__title-wrap">
                <h3 class="flc-newsletter__title"><?php echo $args['form_title']; ?></h3>
                <h6 class="flc-newsletter__subtitle"><?php echo $args['form_subtitle']; ?></h6>
            </div>
            <?php echo do_shortcode('[gravityform id="' . $args['form_id'] . '" title="false" description="false" ajax="true"]') ?>
        </div>
    </div>
</div>