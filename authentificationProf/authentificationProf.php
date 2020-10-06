<?php
session_start();
require '../connection.php';

		error_reporting(0);

		if(isset($_POST['login'])) {

			$user = $_POST['N_SOM'];
			$pass = $_POST['password'];

		if(empty($user) || empty($pass)) {
			$message = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.'№ SOM/Mot de passe est vide';
		} 
		else {
			setcookie('N_SOM',$user);
			setcookie('pass',$pass);

			$query = $bdd->prepare("SELECT * FROM enseignant WHERE 
			N__SOM=? AND Password_enseignant=? ");
			$query->execute(array($user,$pass));
			$ens = $query->fetch(PDO::FETCH_BOTH);

		if($query->rowCount() > 0) {
				$_SESSION['N__SOM'] = $ens[0];
				$_SESSION['Nom_enseignant']=$ens[1];
			    $_SESSION['Prenom_enseignant']=$ens[2];
			    $_SESSION['E_mail_enseignant']=$ens[3];
			    $_SESSION['Password_enseignant']=$ens[4];
			    $_SESSION['Image']=$ens[5];
			    $_SESSION['Nom_filiere']=$ens[6];
			    if ($_SESSION['Nom_filiere']==NULL){
			  		header('location:../Utilisateurs_Interface/bt4/minisidebar/Enseignant_Profil.php');
				}
				else{
					header('location:../Utilisateurs_Interface/bt4/minisidebar/Responsable_Profil.php');
				}
		}		
		else{
			  $message = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.'№ SOM/Mot de passe est incorrect';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
    <title>Authentification enseignant</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/MONPFE.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-49">
						Authentification
					</span>

					<div class="wrap-input100  m-b-23" >
						<span class="label-input100">Numéro SOM</span>
						<input class="input100" type="text" name="N_SOM" placeholder="Votre numéro de SOM" value="<?=$_COOKIE['N_SOM'];?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 ">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="password" placeholder="Votre mot de passe" value="<?=$_COOKIE['pass']?>">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								S'authentifier
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-60">
						<a href="../inscriptionProf/inscriptionProf.php" class="txt2">
							S'inscrire
						</a>
					</div>
				</form>
				<div class="flex-col-c p-t-60" style="color: red;"><?php echo $message; ?></div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>