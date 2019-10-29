<?php /* Template Name: Оборудование */ ?>

<?php get_header(); ?>

<div class="inner-page">
    <div class="container">

        <?php get_template_part('pages/blocks/breadcrumbs'); ?>

        <h1 class="inner-page__title">Медицинское оборудование компании ВКМТ</h1>
        <div class="inner-page__desc">
            <?php the_post(); ?>
            <?php echo get_the_content(); ?>
        </div>

        <div class="catalog-page">
            <div class="catalog__sort flex">
                <span>Сортировать:</span>
                <a class="sort__item js-sort" data-sort="js-brand" href="javascript:;">по брендам</a>
                <a class="sort__item js-sort" data-sort="js-area" href="javascript:;">по направлениям</a>
            <hr>
            </div>

            <div class="catalog__row row">

                <?php
                $page_children = new WP_Query(array(
                    'post_type' => 'page',
                    'post_parent' => 14
                ));        

                if($page_children->have_posts()) :
                while($page_children->have_posts()): $page_children->the_post();
                
                //Получаем значения для фильтров из массива 
                //Образуем строку с классами $equipFilter
                $equipFields = get_fields(get_the_ID());
                $equipFilter = array_values($equipFields['filtr']);
                $equipFilter = implode(" ", $equipFilter);
                //echo '<pre>'.print_r($equipFilter,true).'</pre>';
                ?>
                
                    <a class="catalog__item <?php echo $equipFilter;?> col-12 col-lg-4" href="<?php the_permalink();?>">
                        <div class="catalog__item-wrap bg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                            <div class="catalog__item-title">
                                <span><?php the_title(); ?></span><img src="<?php echo get_template_directory_uri();?>/images/svg/arrow.svg" alt="">
                            </div>
                        </div>
                    </a>

                <?php
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