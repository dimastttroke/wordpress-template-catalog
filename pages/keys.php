<?php /* Template Name: Кейсы */ ?>

<?php get_header(); ?>

<?php 
    $page_children = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => 16
    ));
?>

<div class="inner-page">
    <div class="container">

        <?php get_template_part('pages/blocks/breadcrumbs'); ?>
        
        <h1 class="inner-page__title">Наши проекты</h1>
        <div class="inner-page__desc">
            <?php the_post(); ?>
            <?php echo get_the_content(); ?>
        </div>

        <div class="keys-page">
            <div class="keys__map">

                <?php
                    $countCity = 1;
                    if($page_children->have_posts()) :
                    while($page_children->have_posts()): $page_children->the_post();
                    
                        $cityFields = get_fields(get_the_ID());
                        $projects = $cityFields['proekty_kejsa'];
                        $top = $cityFields['koordinaty_na_karte_css_svojstvo_top_v_px'];
                        $left = $cityFields['koordinaty_na_karte_css_svojstvo_left_v_px'];
                        //echo '<pre>'.print_r($cityFields,true).'</pre>';
                    ?>
                        
                        <style>
                            .keys<?php echo $countCity;?> {
                                top: <?php echo $top;?>px;
                                left: <?php echo $left;?>px;
                            }
                        </style>

                        <a class="js-keys keys__item keys<?php echo $countCity;?>" data-src="#keys<?php echo $countCity;?>" href="javascript:;"><img src="<?php echo get_template_directory_uri();?>/images/svg/pin.svg" alt=""><span>Проекты: <?php the_title(); ?></span></a> 

                        <div class="popup-keys popup-keys-<?php echo $countCity;?>" id="keys<?php echo $countCity;?>" style="display: none;">
                            <div class="popup-keys__wrap">
                            <div class="swiper-container popup-keys__slider">
                                <div class="swiper-wrapper">
                                    
                                    <?php foreach ($projects as $project) {?>
                                    
                                        <div class="swiper-slide">
                                            <div class="projects__project">
                                                <div class="project__wrap">
                                                    <div class="project__header flex">
                                                        <?php if(!empty($project['kartinka'])){?>
                                                            <div class="project__image"><img src="<?php echo $project['kartinka']['sizes']['large'];?>" alt=""></div>
                                                        <?php } else {?>
                                                            <div class="project__image project__image-empty"></div>
                                                        <?php }?>
                                                        <div class="project__top">
                                                            <div class="project__date"><?php echo $project['data'];?></div>
                                                            <div class="project__name"><?php echo $project['nazvanie'];?></div>
                                                            <div class="project__desc"><?php echo $project['opisanie'];?></div>
                                                            <a class="btn-more" href="<?php echo $project['ssylka'];?>" target="_blank">Подробнее</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?}?>
                                
                                </div>
                            </div>
                            <div class="swiper-pagination popup-keys__pag"></div>
                            </div>
                        </div>

                    <?php
                    $countCity++;
                    endwhile;
                    endif; 
                    wp_reset_query();
                ?>

            </div>

            <div class="keys__mobile">

                <?php
                    $countCityMobile = 1;
                    if($page_children->have_posts()) :
                    while($page_children->have_posts()): $page_children->the_post();
                    ?>
                        
                        <a class="js-keys m-keys m-keys<?php echo $countCityMobile;?>" data-src="#keys<?php echo $countCityMobile;?>" href="javascript:;"><span>Проекты: <?php the_title(); ?></span></a>

                    <?php
                    $countCityMobile++;
                    endwhile;
                    endif; 
                    wp_reset_query();
                ?>

            </div>

        </div>

        <?php get_template_part('pages/blocks/form'); ?>

    </div>
</div>

<?php get_footer(); ?>