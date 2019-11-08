<?php /* Template Name: Партнеры */ ?>

<?php get_header(); ?>


<div class="inner-page">
    <div class="container">

    <?php get_template_part('pages/blocks/breadcrumbs'); ?>

                <?php 
                    $partnersFields = get_fields(20);
                    $logos = $partnersFields['logotipy'];
                    //echo '<pre>'.print_r($logo,true).'</pre>';
                ?>

                <?php foreach ($logos as $logo) {?>
                    <div class="partners__item col-12 col-lg-4">
                        <a href="<?php echo $logo['link'];?>" target="_blank">
                            <img class="img-fluid" src="<?php echo $logo['izobrazhenie']['sizes']['large'];?>" alt="">
                        </a>
                    </div>
                <?php } ?>

        <?php get_template_part('pages/blocks/form'); ?>

    </div>
</div>

<?php get_footer(); ?>
