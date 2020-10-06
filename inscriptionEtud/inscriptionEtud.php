

<?php
session_start();
include'../connection.php';

   error_reporting(0);
     
     if(isset($_POST['submit']))
   { 
    $cne = $_POST['cne']; 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cycle = $_POST['cycle'];
    $nomfiliere = $_POST['nomfiliere'];
    $option= $_POST['option'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword=$_POST['repassword'];
    $uid = uniqid();
    $image=$uid.'-'.$_FILES['file']['name'];
    $tmp=$_FILES['file']['tmp_name'];
    $image_url = "/uploads/" . basename($image);
    $image_path = __DIR__ . $image_url;

    $_SESSION['CNE']=$cne;
    $_SESSION['Prenom_etudiant']=$prenom;
    $_SESSION['Nom_etudiant']=$nom;
    $_SESSION['Cycle']=$cycle;
    $_SESSION['option_S6']=$option;
    $_SESSION['Password_etudiant']=$password;
    $_SESSION['E_mail_etudiant']=$email;
    $_SESSION['Image']=$image_url;
    $_SESSION['Nom_filiere']=$nomfiliere;
     if(move_uploaded_file($tmp,$image_path)){
      if($nom&&$prenom&&$cne&&$cycle&&$email&&$password&&$repassword&&$image_url)
      {
        if($password==$repassword){   
            
            $req=$bdd->prepare("UPDATE etudiant SET Nom_etudiant=?,Prenom_etudiant=?,Cycle=?,option_S6=?,Password_etudiant=?,E_mail_etudiant=?,image=? WHERE CNE=? ");
            $req->execute(array($nom,$prenom,$cycle,$option,$password,$email,$image_url,$cne));

            if ($cycle=="Licence" && $req==true){
                header('location:../Utilisateurs_Interface/bt4/minisidebar/Etudiant_Licence_Profil.php');
            }
            else{

                header('location:../Utilisateurs_Interface/bt4/minisidebar/Etudiant_Master_Profil.php');
            }
        }
                     
        else
            {
               $message = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.'les mots de passe ne sont pas identiques';

        }
   }
}
}
?>




<html>
<head>
    <title>Inscription etudiant</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/monPFE.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
    <link rel="stylesheet" type="" href="inscription.php">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">

    
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('images/student.jpg');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form" method="post"  enctype="multipart/form-data" action="">
                    <span class="login100-form-title p-b-59">
                        Inscription
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Nom invalide">
                        <span class="label-input100">Nom</span>
                        <input class="input100" type="text" name="nom" placeholder="tapez votre nom....">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Prénom invalide">
                        <span class="label-input100">Prénom</span>
                        <input class="input100" type="text" name="prenom" placeholder="tapez votre prénom...">
                        <span class="focus-input100"></span>
                    </div>

                    

                    <div class="wrap-input100 validate-input" data-validate="CNE invalide">
                        <span class="label-input100">CNE</span>
                        <input class="input100" type="text" name="cne" placeholder="tapez votre cne...">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Cycle invalide">
                        <span class="label-input100">Cycle</span>
                        <input class="input100" type="text" name="cycle" placeholder="tapez votre cycle actuel...">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Nom de filière invalide">
                        <span class="label-input100">Filière</span>
                        <input class="input100" type="text" name="nomfiliere" placeholder="tapez votre nom de filière">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Nom d'option invalide">
                        <span class="label-input100">Option</span>
                        <input class="input100" type="text" name="option" placeholder="tapez votre option si vous êtes licencié ...">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Email invalide">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="tapez votre Email...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Mot de passe invalide">
                        <span class="label-input100">Mot de passe</span>
                        <input class="input100" type="password" name="password" placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Les mot de passe saisis ne sont pas identiques">
                        <span class="label-input100">Confirmer votre mot de passe</span>
                        <input class="input100" type="password" name="repassword" placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Inserer votre image<br></span>
                        <br>
                         <input  type="file" name="file">
                         <span class="focus-input100"></span>
                        <br>
                        
                        
                         <br/>
                      

                    </div> 

                    <div class="flex-m w-full p-b-33">
                        <div class="contact100-form-checkbox">
                            
                                <span class="txt1">
                                    
                                    <a href="#" class="txt2 hov1">
                                        
                                    </a>
                                </span>
                            </label>
                        </div>

                        
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                           <i class="fa fa-check-circle"></i> &nbsp; 
                           <input type="submit" name="submit" value="S'inscrire" style="background: transparent; color:white ">
                            </button>
                        </div>
                    </div>
                </form>
                <div class="flex-col-c p-t-60" style="color: red;"><?php echo $message; ?></div>
            </div> 
        </div>
    </div>
    
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