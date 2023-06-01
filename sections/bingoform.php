<?php $content =  get_sub_field('content'); ?>
<?php $image =  get_sub_field('image'); ?>
<?php $img_src  = ($image)  ? $image['sizes']['large'] : ''; ?>
<section class="bingo_section">
    <div id="bingo_popup">
        <div id="bingo_popup_inner">

            <div class="container-fluid">

                <div class="col-sm-8">
                    <?php if ($content) : ?>
                        <?php echo $content; ?>
                    <?php endif; ?>

                    <form id="bingoform" method="get" action="?success" class="bingo_form"><input type="text" name="bingoemail" id="bingoemail" placeholder="Votre adresse email" /><button type="submit">Recevoir</button></form>
                    <div id="bingo_success" class="alert alert_success">Nous vous avons envoyé l\'imprimable Savio par email !</div>
                    <div id="bingo_error" class="alert alert_danger">Error</div>

                </div>
                <div class="col-sm-4">
                    <img class="side_image" src="<?php echo $img_src; ?>">
                </div>
            </div>


        </div>
        <div id="close_bingo_popup">X</div>
    </div>
</section>