<?php

//Выводим телефон и адрес
$contactFields = get_fields(8);
$phone = $contactFields['nomer_telefona'];
$phoneClean = preg_replace("/[^0-9]/", '', $phone);
$adress = $contactFields['adres'];

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <?php wp_head(); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/vendor.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css">
  <script src="<?php echo get_template_directory_uri();?>/js/vendor.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/scripts.js"></script>
</head>

<body <?php body_class(); ?>>

  <header class="header">
    <a href="/"><img class="logo" src="<?php echo get_template_directory_uri();?>/images/svg/logo.svg" alt=""></a>
    <?php get_search_form(); ?>
    <?php echo $adress;?>
    <a class="btn-call" href="tel:<?php echo $phoneClean;?>"><?php echo $phone;?></a>
  </header>