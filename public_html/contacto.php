<?php

$PageTitle="Contacto";

function customPageHeader(){?>
  
<?php }

function customPageFooter(){?>
  	<!-- Loading: Forms and Form Validation -->
	<script src="assets/js/plugins/jquery.form.min.js" type="text/javascript"></script>
	<script src="assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/js/contact.validation.js" type="text/javascript"></script>
<?php }

include_once('header.php');

?>

		<!-- Start: Main -->
		<main id="main">
			<div class="page-header wow animated fadeInDown" data-wow-duration="0.5s">
				<div class="q-container">
					<div class="q-row">
						<div class="q-col-1-1"><h1 class="section-headline"><span>Unidos vamos al grano.</span> Por una caficultura sostenible y rentable</h1></div>
					</div>
				</div>
			</div>
			<div class="page-body">
				<div class="q-container">
					<div class="q-row">
						<div class="content q-col-2-3 wow animated fadeIn" data-wow-delay="0.2s" data-wow-duration="0.5s">
							<p>Quiero involucrarte en mi gestión, compárteme tus sugerencias para ir al grano.</p>

							<div id="form-message"></div>

							<form id="form-contact" name="form-contact" class="note">

								<div class="q-row">
									<div class="q-col-1-2">
										<!-- <label for="name">Nombre? <span class="required">*</span></label><br> -->
										<input type="text" name="name" id="name" class="full-width" value="">
									</div>
									<div class="q-col-1-2">
										<!-- <label for="last">Apellido? <span class="required">*</span></label><br> -->
										<input type="text" name="last" id="last" class="full-width" value="">
									</div>
								</div>
                                <div class="q-row">
									<div class="q-col-1-1">
										<!-- <label for="name">Correo Electrónico? <span class="required">*</span></label><br> -->
										<input type="text" name="email" id="email" class="full-width" value="">
									</div>
								</div>
								<div class="q-row">
									<div class="q-col-1-1">
										<!-- <label for="name">Ideas? <span class="required">*</span></label><br> -->
										<textarea name="message" id="message" class="full-width" rows="4"></textarea>
									</div>
								</div>
								<div class="q-row">
									<div class="q-col-1-1">
										<div class="g-recaptcha" data-sitekey="6Lf9MgoTAAAAADWMPPf9sBlIiYmeVe0FYbdLk-cf"></div>
									</div>
								</div>
								<div class="q-row">
									<div class="q-col-1-2">
										<a href="#" id="submit-contact" class="button button-submit"><i class="fa fa-envelope"></i> Envie su mensaje</a>
									</div>
                                    <div class="q-col-1-2">
                                         <div class="q-row">
                                            <div class="q-col-1-5">
                                                <input type="checkbox" name="suscribir" value="Si" checked style="margin-top: 8px;">
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
                        
                        <aside id="sidebar" class="q-col-1-3 wow animated fadeIn hide-mobile" data-wow-delay="0.4s" data-wow-duration="0.5s">
							<div class="widget sin-borde">
                                <img src="assets/img/texto_contact.png">
							</div>
							
						</aside>

						
					</div>
				</div>
			</div>
		</main>
		<!-- End: Main -->

<?php
include_once('footer.php');
?>