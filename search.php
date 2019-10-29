<?php 
/**
 * Template Name: Поиск
 */
?> 

<?php get_header(); ?>

<?php
	//Получаем значение атрибута search
	$s = $_GET['search'];
	//Исключаем страницы
	$exclude_ids = array(238, 167, 169, 178, 171, 174, 176, 185, 180, 187, 183);
	//Параметры поиска
	$args = array(
		's' => $s,
		'post__not_in' => $exclude_ids
	);
	//The Query
	$the_query = new WP_Query($args);
?>

<div class="inner-page search-page">
    <div class="container">

		<?php if ( $the_query->have_posts() ) {?>

			<h1>Результаты поиска: <?php echo $s; ?></h1>
			<div class="search-result">
				<?php while ( $the_query->have_posts() ) {
					$the_query->the_post();?>
					<div class="search-item">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
				<?php } ?>
			</div>

		<?php } else { ?>

			<h1>Результаты поиска: ничего не найдено</h1>
			<div class="search-result">
				<h4>Ничего не найдено. Попробуйте повторить запрос или вернитесь на <a href="/">Главную страницу</a>!</h4>
				<div class="search-page__form">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php } ?>

	</div>
</div>

<?php get_footer(); ?>