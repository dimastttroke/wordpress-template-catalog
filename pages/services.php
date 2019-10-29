<?php /* Template Name: Услуги */ ?>

<?php get_header(); ?>

<div class="inner-page">
    <div class="container">
    
        <?php get_template_part('pages/blocks/breadcrumbs'); ?>
    
        <h1 class="inner-page__title"><?php the_title(); ?></h1>
        <div class="inner-page__desc">
            <?php the_post(); ?>
            <?php echo get_the_content(); ?>
        </div>

        <div class="services-page">

            <?php
                $servicesFields = get_fields(22);
                $services = $servicesFields['usluga'];
                //echo '<pre>'.print_r($servicesFields,true).'</pre>';
            ?>

            <?php foreach ($services as $service) {?>
                
                <div class="services__item flex">
                    <div class="services__image"><img src="<?php echo $service['kartinka']['sizes']['large'];?>" alt=""></div>
                    <div class="services__content">
                        <div class="services__title"><?php echo $service['nazvanie'];?></div>
                        <?php echo $service['opisanie'];?>
                    </div>
                </div>

            <?php } ?>

        </div>

        <?php get_template_part('pages/blocks/form'); ?>

    </div>
</div>

<?php get_footer(); ?>