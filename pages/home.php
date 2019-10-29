<?php 

/* Template Name: Главная страница */

$fields = get_fields();
$sliderMain = $fields['slajder_na_glavnoj_na_pervom_ekrane'];
//echo '<pre>'.print_r(get_fields(),true).'</pre>';

?>

<?php get_header(); ?>

    <!-- Вывод слайдов из полей страницы -->
    <?php foreach($sliderMain as $sliderMainItem) {?>
            <img src="<?php echo $sliderMainItem['kartinka']['sizes']['large'];?>" alt="">
            <?php echo $sliderMainItem['nazvanie'];?>
            <a href="<?php echo $sliderMainItem['ssylka'];?>">Узнать подробнее</a>
    <?}?>

    <!-- Путь до картинки -->
    <img src="<?php echo get_template_directory_uri();?>/images/license.png" alt="" />

    <?php
    //Получаем последние проекты на главной
    //Получаем два массива с полями - 2 айтема слева и 1 айтем справа
    $keys_children = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => 16,
        'posts_per_page' => 3
    ));
    if($keys_children->have_posts()) {
        $countKeys = 0;
        while($keys_children->have_posts()) { 
            $keys_children->the_post();
            if ($countKeys == 2) {
                $cityFieldsBig = get_fields(get_the_ID())['proekty_kejsa'][0];
            } else {
                $cityFields = get_fields(get_the_ID())['proekty_kejsa'][0];
                $citiesFields[] = $cityFields;
            }
            $countKeys++;
        }
    }
    //echo '<pre>'.print_r($cityFieldsBig,true).'</pre>';
    ?>

    <?php foreach ($citiesFields as $lastProj) {?>
        <img src="<?php echo $lastProj['kartinka']['sizes']['large'];?>" alt="">
        <?php echo $cityFieldsBig['data'];?>
        <?php echo $cityFieldsBig['nazvanie'];?>
        <?php echo $cityFieldsBig['opisanie'];?>
    <?php }?>

    <?php
    //Получаем оборудование
    //Через дочерние страницы
    $equip_children = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => 14,
        'posts_per_page' => 4
    ));
    //echo '<pre>'.print_r($equip_children,true).'</pre>';
    if($equip_children->have_posts()) {
        while($equip_children->have_posts()) { 
            $equip_children->the_post();
            $equipFields = get_fields(get_the_ID());
    ?>

        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        <?php the_title(); ?>
        <?php echo $equipFields['prevyu-tekst'];?>
        <a href="<?php the_permalink();?>">Ссылка</a>

    <?php
        }
    }
    wp_reset_query();
    ?>

    <?php
        //Получаем информацию о контактах
        $adressFields = get_fields(12);
        $adressPhone = $adressFields['telefon'];
        $adressEmail = $adressFields['pochta'];
        $adressPhoneClean = preg_replace("/[^0-9]/", '', $adressPhone);
        $adressText = $adressFields['adres'];
        $adressMap = $adressFields['karta'];
    ?>
    <a href="tel:<?php echo $adressPhoneClean;?>"><?php echo $adressPhone;?></a>
    <a href="email:<?php echo $adressEmail;?>"><?php echo $adressEmail;?></a>
    <?php echo $adressText;?>
    <div id="map"><?php echo $adressMap;?></div>

<?php get_footer();