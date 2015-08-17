<?php

$PageTitle="Adriana Mejía Cuartas";

function customPageHeader(){?>
<?php }

function customPageFooter(){?>
  	<!-- Loading: Forms and Form Validation -->
	<script src="assets/js/plugins/jquery.form.min.js" type="text/javascript"></script>
	<script src="assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/js/home.validation.js" type="text/javascript"></script>
<?php }

include_once('header.php');
include_once('assets/php/Config.php');
include_once('assets/php/TwitterHandler.php');

$twitter = new TwitterHandler();
$twits=$twitter->get_tweets_with_hash("UnidosVamosalGrano", "AdriMejiaC");

?>


		<!-- Start: Hero -->
		<div id="hero">
			<div class="q-container">
				<div class="box-join simple-half">
					<h2 class="section-headline inverted">Unidos <em>vamos </em>al <em>grano</em></h2>
                    
					<p>Trabajemos juntos por una caficultura rentable y sostenible. Aquí están mis propuestas y quiero escuchar las de todos los cafeter@s. Regístrate y compártelas:</p>
					<div id="form-message"></div>
					<form id="form-home" name="form-home">
					<div class="q-row">
						<div class="q-col-1-1"><input type="email" id="email" name="email"></div>
					</div>
					<div class="q-row">
					
						<div class="q-col-1-1">
							<textarea style="width:100%;" id="message" name="message" rows="4"></textarea><br>
						</div>
					</div>
					<div class="q-row">
						<input type="hidden" name="name" value="Anonimo" id="name">
                        <input type="hidden" name="last" value="Anonimo" id="last">
						<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
						<div class="q-col-1-2 g-recaptcha" data-theme="dark" data-sitekey="6Lf9MgoTAAAAADWMPPf9sBlIiYmeVe0FYbdLk-cf"></div>
					</div>
					<div class="q-row">
						 <!-- <div class="q-col-1-2"><button class="">Enviar ...</button></div> -->
						 <div class="q-col-1-2"><a href="#" id="submit-home" class="button button-submit"><i class="fa fa-envelope"></i> Envie su mensaje</a></div>
                         <div class="q-col-1-2">
                             <div class="q-row">
                                <div class="q-col-1-5">
                                    <input type="checkbox" name="suscribir" value="Si" checked>
                                    <span class="show-mobile">Quiero seguir en contacto con Adriana</span>
                                </div>
                                <div class="q-col-4-5 checkboxtext">
                                    <span class="hide-mobile">Quiero seguir en contacto con Adriana</span>
                                </div>
                             </div>
                         </div>
					</div>
					
					</form>
				</div>
			</div>
		</div>
		<!-- End: Hero -->

		<!-- Start: Calls to action -->
		<div id="home-cta">
			<div class="q-container wow animated fadeInDown" data-wow-duration="0.5s">
				<div id="box-donate" class="box box-alt simple-half">
					<h4 class="box-headline"><a href="propuestas.php" target="_blank">ESTAS SON MIS PROPUESTAS</a></h4>
				</div>
				<div id="box-volunteer" class="box box-alt simple-half">
					<h4 class="box-headline"><a href="https://www.facebook.com/adrianamejiagerentefnc">ADRIANA EN MEDIOS</a></h4>
				</div>
			</div>
		</div>
		<!-- End: Calls to action -->

        <!-- Start: Main -->
		<main id="main">
			
			<div class="section social-updates">
				<div class="q-container">
					<div class="q-row">
						<div class="q-col-1-3">
							<h2 class="section-headline section-headline-social wow animated fadeInLeft" data-wow-offset="100" data-wow-duration="0.5s"><span>Sígueme en</span> Redes Sociales</h2>
							<ul class="social-profiles">
								<li><a href="https://www.facebook.com/adrianamejiagerentefnc" class="social-button social-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/AdriMejiaC" class="social-button social-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <!-- <li><a href="https://plus.google.com/114269256594082537179/" class="social-button social-google" title="Google+"><i class="fa fa-google-plus"></i></a></li> -->
                                <li><a href="https://www.linkedin.com/profile/view?id=18236880" class="social-button social-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
						<div class="q-col-2-3 wow animated fadeInUp" data-wow-duration="0.5s" data-wow-offset="200">
							<div id="social-slider" class="simple-slider">
								<?php foreach($twits as $t){ ?>
                                    <div class="simple-slide">
                                        <div class="social-update"><?php echo $t['text']; ?></div>
                                        <p class="social-update-info"><a href="#"><?php echo $t['date']; ?></a> on Twitter via <a href="https://twitter.com/AdriMejiaC">@AdriMejiaC</a></p>
                                    </div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End: Social Updates -->

		</main>
		<!-- End: Main -->

<?php
include_once('footer.php');
?>
