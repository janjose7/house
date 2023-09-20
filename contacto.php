<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contacto</title>
	<link rel="stylesheet" href="css/contactoIn.css">
</head>
<body>
<div class="background"></div>
<header>
	<div class="container">
		<ul>
			<li>
				<a href="#" class="logo">
					<div class="images">
						<img src="img/logo-forDark.png" class="logo-forDark" alt="OxeRev">
						<img src="img/logo-forLight.png" class="logo-forLight" alt="OxeRev">
					</div>
					<h2>Oxe<span>Rev.</span></h2>
				</a>
			</li>
			<li>
				<a href="index.php" class="nav-link">Inicio</a>
			</li>
			<li>
				<span class="nav-link theme-toggle">
					<i class="fa-solid fa-sun"></i>
					<i class="fa-solid fa-moon"></i>
				</span>
			</li>
		</ul>
	</div>
</header>
<main>
	<section class="contact">
		<div class="container">
			<div class="left">
				<div class="form-wrapper">
					<div class="contact-heading">
						<h1>Empecemos juntos<span>.</span></h1>
						<p class="text">Contactanos por:&nbsp;&nbsp;<a href="#"><i class="fa-brands fa-whatsapp" style="font-size: 1.5rem; color: #00bb2d"></i></a></p>
					</div>
					<form action="" id="datoHtml" method="POST" class="contact-form">
						<div class="input-wrap">
							<input type="text" class="contact-input" name="nombre" id="nombre" autocomplete="off" required>
							<label>Nombres</label>
							<i class="icon fa-solid fa-address-card"></i>
						</div>

						<div class="input-wrap">
							<input type="text" class="contact-input" name="tlf" id="tlf" autocomplete="off" required>
							<label>Teléfono</label>
							<i class="icon fa-solid fa-phone"></i>
						</div>

						<div class="input-wrap w-100">
							<input type="email" class="contact-input" name="correo" id="correo" autocomplete="off" required>
							<label>Correo Electrónico</label>
							<i class="icon fa-solid fa-envelope"></i>
						</div>

						<div class="input-wrap textarea w-100">
							<textarea name="sms" id="sms" autocomplete="off" class="contact-input" require></textarea>
							<label>Mensaje</label>
							<i class="icon fa-solid fa-inbox"></i>
						</div>

						<div class="contact-buttons">
							<input type="submit" value="Enviar Mensaje" name="envio" id="envio" class="btn">
						</div>
						<div id="status" style="padding: 0.7em 0 0 0"></div>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="image-wrapper">
					<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/d12668163670241.63ea44d9de796.jpg" class="img" alt="Montaña">
					<!-- https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/d12668163670241.63ea44d9de796.jpg -->
					<!-- https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/28c49d163670241.63ebc5b3b9de2.jpg -->
					<!-- https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/60c5e9163670241.63ebf751a5ef1.gif -->
					<!-- https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/4339cf163670241.63ebf74cdef7d.gif -->
					<div class="wave-wrap">
						<svg class="wave" viewBox="0 0 783 1536" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path id="wave" d="M236.705 1356.18C200.542 1483.72 64.5004 1528.54 1 1535V1H770.538C793.858 63.1213 797.23 196.197 624.165 231.531C407.833 275.698 274.374 331.715 450.884 568.709C627.393 805.704 510.079 815.399 347.561 939.282C185.043 1063.17 281.908 1196.74 236.705 1356.18Z"/>
						</svg>
					</div>
					<svg class="dashed-wave" viewBox="0 0 345 877" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path id="dashed-wave" d="M0.5 876C25.6667 836.167 73.2 739.8 62 673C48 589.5 35.5 499.5 125.5 462C215.5 424.5 150 365 87 333.5C24 302 44 237.5 125.5 213.5C207 189.5 307 138.5 246 87C185 35.5 297 1 344.5 1"/>
					</svg>
				</div>
			</div>
		</div>
	</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
<script src="js/appContacto.js"></script>
<script src="js/contacto_index.js"></script>
</body>

</html>