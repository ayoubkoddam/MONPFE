<?php
session_start();
require '../connection.php';
		
		error_reporting(0);

		if(isset($_POST['login'])) {

			$user = $_POST['CNE'];
			$pass = $_POST['password'];

		if(empty($user) || empty($pass)) {
			$message = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.'CNE/Mot de passe est vide';} 
		else {
			setcookie('CNE',$user);
			setcookie('pass',$pass);

			$query = $bdd->prepare("SELECT * FROM etudiant WHERE 
			CNE=? AND Password_etudiant=? AND Cycle='Licence'");
			$query->execute(array($user,$pass));
			$etudLic = $query->fetch(PDO::FETCH_BOTH);


			$sql = $bdd->prepare("SELECT * FROM etudiant WHERE 
			CNE=? AND Password_etudiant=? AND Cycle='Master'");
			$sql->execute(array($user,$pass));
			$etudMast = $sql->fetch(PDO::FETCH_BOTH);

		if($query->rowCount() > 0) {
			    $_SESSION['CNE'] = $etudLic[0];
			    $_SESSION['Nom_etudiant']=$etudLic[1];
				$_SESSION['Prenom_etudiant']=$etudLic[2];
			    $_SESSION['Cycle']=$etudLic[3];
			    $_SESSION['Option_S6']=$etudLic[4];
			    $_SESSION['Password_etudiant']=$etudLic[5];
			    $_SESSION['E_mail_etudiant']=$etudLic[6];
			    $_SESSION['Image']=$etudLic[7];
			    $_SESSION['Code_soutenance']=$etudLic[9];
			    $_SESSION['Num_groupe']=$etudLic[10];
			    $_SESSION['Nom_filiere']=$etudLic[11];
			    $_SESSION['N__SOM']=$etudLic[12];
			    $_SESSION['Code_PFE']=$etudLic[13];
			  header('location:../Utilisateurs_Interface/bt4/minisidebar/Etudiant_Licence_Profil.php');}
		else if ($sql->rowCount() > 0) {
			  $_SESSION['CNE'] = $etudMast[0];
			    $_SESSION['Nom_etudiant']=$etudMast[1];
				$_SESSION['Prenom_etudiant']=$etudMast[2];
			    $_SESSION['Cycle']=$etudMast[3];
			    $_SESSION['Password_etudiant']=$etudMast[5];
			    $_SESSION['E_mail_etudiant']=$etudMast[6];
			    $_SESSION['Image']=$etudMast[7];
			    $_SESSION['Code_soutenance']=$etudMast[9];
			    $_SESSION['Num_groupe']=$etudMast[10];
			    $_SESSION['Nom_filiere']=$etudMast[11];
			    $_SESSION['N__SOM']=$etudMast[12];
			    $_SESSION['Code_PFE']=$etudMast[13];
			  header('location:../Utilisateurs_Interface/bt4/minisidebar/Etudiant_Master_Profil.php');
		}
		else {
			  $message = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.'CNE/Mot de passe est incorrect';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
    <title>Authentification étudiant</title>

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

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">CNE</span>
						<input class="input100" type="text" name="CNE" placeholder="Votre CNE" value="<?=$_COOKIE['CNE'];?>">
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
						<a href="../inscriptionEtud/inscriptionEtud.php" class="txt2">
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