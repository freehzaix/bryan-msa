
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Connexion à la plateforme des administrateurs du MSA</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<link rel="stylesheet" href="/backend/assets_login/css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>
	<!-- /login-section -->

	<section class="w3l-forms-23">
		<div class="forms23-block-hny">
			<div class="wrapper">
				<h1>Administrateur</h1>
				<!-- if logo is image enable this
					<a class="logo" href="index.html">
					  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a>
				-->
				<div class="d-grid forms23-grids">
					<div class="form23">
						<div class="main-bg">
							<h6 class="sec-one">Authentification</h6>
							<div class="speci-login first-look">
								<img src="/backend/assets_login/images/user.png" alt="" class="img-responsive">
							</div>
						</div>
						<div class="bottom-content">

							<form action="/admin/login/traitement" method="post">
                                @csrf
								<input type="email" name="email" class="input-form" placeholder="Adresse mail"
										required="required" />
								<input type="password" name="password" class="input-form"
										placeholder="Mot de passe" required="required" />
								<button type="submit" class="loginhny-btn btn">Connexion</button>
							</form>

						</div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
					<p>© 2023 Admin-MSA. All rights reserved | Design by
						<a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- //login-section -->
</body>

</html>
