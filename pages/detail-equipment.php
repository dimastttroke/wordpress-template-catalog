<?php /* Template Name: Детальная: оборудование */ ?>

<?php get_header(); ?>

<?php
    $detailFields = get_fields(get_the_ID());
    $slider = $detailFields['slajder_vidov'];
    //echo '<pre>'.print_r($detailFields,true).'</pre>';
?>

<?php the_post(); ?>

<div class="inner-page">
    <div class="container">

    <?php get_template_part('pages/blocks/breadcrumbs'); ?>
    
    <h1 class="inner-page__title"><?php the_title(); ?></h1>
    
    <div class="detail-page">
        <div class="services__item services__item-detail flex">
            <div class="services__image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
            <div class="services__content">
                <?php echo $detailFields['opisanie'];?>
                <a class="btn-more btn-more__icon flex flex-center flex-between" data-fancybox data-src="#popup-kp" href="javascript:;">Запросить коммерческое предложение<img src="<?php echo get_template_directory_uri();?>/images/svg/arrow.svg" alt=""></a>
            </div>
        </div>
    </div>

    <?php if(!empty($detailFields['slajder_vidov'])) {?>

        <div class="inner-page__h2 flex">
            <?php if (empty($detailFields['nazvanie_slajdera_s_vidami'])){ ?>
                <h2>Виды</h2>
            <?php } else { ?>
                <h2><?php echo $detailFields['nazvanie_slajdera_s_vidami'];?></h2>
            <?php }?>
            <hr>
        </div>
    
        <div class="inner-page__slider">
            <div class="swiper-container detail__slider">
                <div class="swiper-wrapper">

                    <?php foreach($slider as $slide) {?>
                        <div class="swiper-slide">
                            <div class="slider__image"><img class="img-fluid" src="<?php echo $slide['kartinka']['sizes']['large'];?>" alt=""></div>
                            <div class="slider__title"><?php echo $slide['nazvanie'];?></div>
                            <div class="slider__desc"><?php echo $slide['opisanie'];?></div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="detail__nav detail__next"><svg width="35px" height="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240.8 240.8"><path d="M183.2 111.8L74.9 3.6c-4.8-4.7-12.5-4.7-17.2 0 -4.8 4.8-4.8 12.5 0 17.2l99.7 99.7 -99.7 99.7c-4.8 4.7-4.8 12.4 0 17.2 4.8 4.7 12.5 4.7 17.2 0L183.2 129C187.9 124.3 187.9 116.5 183.2 111.8z" fill="#B2B2B2"/></svg></div>
            <div class="detail__nav detail__prev"><svg width="35px" height="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240.8 240.8"><path d="M57.6 129l108.3 108.3c4.8 4.7 12.5 4.7 17.2 0 4.8-4.7 4.8-12.4 0-17.2l-99.7-99.7 99.7-99.7c4.8-4.7 4.8-12.4 0-17.2 -4.8-4.7-12.5-4.7-17.2 0L57.6 111.8C52.9 116.5 52.9 124.3 57.6 129z" fill="#B2B2B2"/></svg></div>
            <div class="swiper-pagination detail__pag"></div>
        </div>
    
    <?php } ?>

    <?php get_template_part('pages/blocks/form'); ?>

    </div>
</div>

<?php get_footer(); ?>