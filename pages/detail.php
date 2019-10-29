<?php /* Template Name: Детальная: новости */ ?>

<?php get_header(); ?>

    <?php the_post(); ?>

    <?php get_template_part('pages/blocks/breadcrumbs'); ?>
        
    <h1><?php the_title(); ?></h1>
        
    <?php the_content(); ?>

    <?php get_template_part('pages/blocks/form'); ?>

<?php get_footer(); ?>