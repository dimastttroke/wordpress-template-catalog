	<?php
		//Получаем телефон и адресс
		$contactFields2 = get_fields(8);
		$phone2 = $contactFields2['nomer_telefona'];
		$phoneClean2 = preg_replace("/[^0-9]/", '', $phone2);
	?>

	<footer class="footer">
		<a class="btn-call" href="tel:<?php echo $phoneClean2;?>"><?php echo $phone2;?></a>
		<a class="btn-text" data-fancybox data-src="#popup-feedback" href="javascript:;">Закажите звонок</a>
	</footer>

	<div class="popup popup-feedback" id="popup-feedback" style="display: none;">
		<div class="popup__wrap">
			<div class="popup__title">Заполните форму и мы свяжемся с вами!</div>
			<?php echo do_shortcode( '[contact-form-7 id="240" title="Форма в модальном окне"]' ); ?>
			<?php /*
				// CONTACT FORM 7
				<label for="popup-tel"><img src="/wp-content/themes/vkmt/images/svg/tel.svg" alt=""></label>
				[text* tel id:popup-tel class:mask placeholder "___ ___ ___ __"]

				<label for="popup-email"><img src="/wp-content/themes/vkmt/images/svg/email.svg" alt=""></label>
				[email* email id:popup-email placeholder "Ваш E-mail"]

				<label for="popup-name"><img src="/wp-content/themes/vkmt/images/svg/user.svg" alt=""></label>
				[text* user id:popup-name placeholder "Укажите ваше имя"]
				
				<button type="submit" class="btn-more">Свяжитесь со мной</button>
			*/?>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>