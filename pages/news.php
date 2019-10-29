<?php 

/* Template Name: Новости */ 

$page_children = new WP_Query(array(
    'post_type' => 'page',
    'post_parent' => 18
));

?>

<?php get_header(); ?>

<div class="inner-page">
    <div class="container">

        <?php get_template_part('pages/blocks/breadcrumbs'); ?>

        <h1 class="inner-page__title">Новости</h1>
        <div class="inner-page__desc">
            <p>Основные сегменты рынка медицинского оборудования, в которых ВКМТ ведет активную работу это оборудование для лучевой диагностики и терапии, ядерной медицины, МРТ, рентгенохирургии.</p>
            <p>Каждый проект в этих сегментах напряженная и сложная работа команды наших сотрудников. Каждая задача в рамках каждого из таких проектов индивидуальна.</p>
        </div>
        
        <div class="catalog-page">

            <div class="catalog__sort flex">
                <span>Сортировать:</span>
                <a class="sort__item js-sort-news" data-sort="order:asc" href="javascript:;">новые</a>
                <a class="sort__item js-sort-news" data-sort="order:desc" href="javascript:;">старые</a>
                <hr>
            </div>

            <div class="catalog__row row js-news-row">

            <?php
            $order = 1;
            if($page_children->have_posts()) :
            while($page_children->have_posts()): $page_children->the_post();
            ?>

                <a class="catalog__item js-news mix col-12 col-lg-4" data-order="<?php echo $order;?>" href="<?php the_permalink();?>">
                    <div class="catalog__item-wrap bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                        <div class="catalog__item-title">
                            <span><?php the_title(); ?></span><img src="<?php echo get_template_directory_uri();?>/images/svg/arrow.svg" alt="">
                        </div>
                    </div>
                </a>

            <?php
            $order++;
            endwhile;
            endif; 
            wp_reset_query();
            ?>

            </div>
        </div>

        <?php get_template_part('pages/blocks/form'); ?>

    </div>
</div>

<script src="<?php echo get_template_directory_uri();?>/js/mixitup.min.js"></script>
<script>
	var mixer = mixitup('.js-news-row', {
		selectors: {
			target: '.mix'
		},
		animation: {
			duration: 300
		}
	});
</script>

<?php get_footer(); ?>