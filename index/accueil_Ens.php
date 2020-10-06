<?php
    session_start();
    error_reporting(0);
    include '../connection.php';
    include '../sendmail/PHPMailer-master/PHPMailerAutoload.php';

    $sql1=$bdd->prepare("SELECT * FROM filiere");
    $sql1->execute();
    $Nbr_filiere=$sql1->rowCount();

    $sql2=$bdd->prepare("SELECT * FROM enseignant");
    $sql2->execute();
    $Nbr_enseignant=$sql2->rowCount();

    $sql3=$bdd->prepare("SELECT * FROM etudiant WHERE Cycle = 'Licence'");
    $sql3->execute();
    $Nbr_etudLic=$sql3->rowCount();

    $sql4=$bdd->prepare("SELECT * FROM etudiant WHERE Cycle = 'Master'");
    $sql4->execute();
    $Nbr_etudMast=$sql4->rowCount();

if(isset($_POST['submit'])){
    $message=$_POST['message'];
    $em=$bdd->prepare('SELECT E_mail_enseignant from enseignant where Nom_filiere=?');

    $em->execute(array($_POST['email']));
    $row1=$em->fetch();
            
             
                                    
    $mail = new PHPMailer();
    $mail ->isSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = 'smtp.gmail.com';
    $mail ->Port = 465; // or 587
    $mail ->isHTML(true);
    $mail ->Username = "monpfe.fsac@gmail.com";
    $mail ->Password = "MONPFEfsac";
    $mail ->SetFrom($row1['E_mail_enseignant'],"MONPFE");
    $mail ->Subject = $_POST['name'];
    $mail ->Body = $message ;
    $mail ->AddAddress($row1['E_mail_enseignant']);
    if(!$mail->Send()){
    $message= "<br><br><h5 style='color:red;text-align:center;'> Probléme lors de l'envoi de mail</h5>";
                        }
                        else
                        {
    $message= "<br><br><h5 style='color:green;text-align:center;'><i class='ti-check'> l'email a bien été envoyé</i></h5>";
                        }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>MONPFE</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/MONPFE.png">

    <!-- Core Stylesheet -->
    <link href="styleAc.css" rel="stylesheet">
    <!-- Custom CSS -->
<!--     <link href="../Utilisateurs_Interface/bt4/minisidebar/dist/css/style.min.css" rel="stylesheet"> -->

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- chartist CSS -->
    <!-- <link href="../Utilisateurs_Interface/bt4/assets/node_modules/morrisjs/morris.css" rel="stylesheet"> -->
    <!--Toaster Popup message CSS -->
    <!-- <link href="../Utilisateurs_Interface/bt4/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <!-- <link href="../Utilisateurs_Interface/bt4/minisidebar/dist/css/style.min.css" rel="stylesheet"> -->
    <!-- Dashboard 1 Page CSS -->
<!--     <link href="../Utilisateurs_Interface/bt4/minisidebar/dist/css/pages/dashboard1.css" rel="stylesheet">
     -->

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                          <a class="navbar-brand" href="#">MONPFE</a>
                             <!-- <img src="img/core-img/favicon.png" alt>  -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Acceuil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                                    <li class="nav-item"><a  class="nav-link" href="../Utilisateurs_Interface/bt4/minisidebar/Enseignant_Archive.php">Visualisation</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Aide</a></li>
                                </ul>
                            </div>
                            
                            <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="line-height: 50px;"> <i class="ti-bell" style="color: rgba(255,255,255,.5);"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <!-- <div class="idropdown-menu idropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center" -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div> -->
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro" style="padding-top: 9px;">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?='../Utilisateurs_Interface/bt4/minisidebar/'. $_SESSION['Image']?>" alt="user" class="" style="width: 30px;
    border-radius: 100%;"> <span class="hidden-md-down" style="color: rgba(255,255,255,.5);"><?=$_SESSION['Prenom_enseignant']?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?php if(empty($_SESSION['Nom_filiere'])){
                                    echo"../Utilisateurs_Interface/bt4/minisidebar/Enseignant_Profil.php";
                                    }else{
                                    echo"../Utilisateurs_Interface/bt4/minisidebar/Responsable_Profil.php";  
                                    }
                                    ?>" class="dropdown-item"><i class="ti-user"></i> Mon Profil</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <form method="post" action="../deconnection.php">
                                <a href="../deconnection.php" class="dropdown-item"><i class="fa fa-power-off"></i> Se Déconnecter</a></form>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
<!--                 <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="../RedirectInsc/redirectInsc.php">S'inscrire</a>
                    </div>
                </div> -->
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Plateforme de gestion et archivage des PFE</h2>
                        <h3>MONPFE</h3>
                        <p>Pour mieux organiser les procédures</p>
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->
                       <!--  <form action="#" method="post" class="form-inline">
                            <input type="submit" class="submit" value="Get Started">
                        </form> -->
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="img/bg-img/welcome-img.png" alt="">
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Pourquoi cette plateforme?</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-settings" aria-hidden="true"></i>
                        </div>
                        <h4>Gestion</h4>
                        <p>Une démarche visant à organiser de bout en bout le bon déroulement du projet</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <i class="ti-bell" aria-hidden="true"></i>
                        </div>
                        <h4>Notification</h4>
                        <p>Un système de notification chargé de transmettre les updating à l'étudiant et l'enseignant</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-search" aria-hidden="true"></i>
                        </div>
                        <h4>Recherche</h4>
                        <p>Une archive permettant aux étudiants d'avoir une idée sur les anciens rapports</p><br>
                    </div>
                </div>
            </div>
        </div>
        <!-- Special Description Area -->
        <div class="special_description_area mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-ispecial video-area" data-wow-delay="0.8s" style="background-image: url(img/bg-img/Logo-FSAC.jpg);top: 22%; width: 450px;height: 200px;">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 ml-xl-auto">
                        <div class="special_description_content">
                            <h2>Faculté des sciences Aïn Chock</h2>
                            <p>la faculté des sciences Aïn Chock, ou FSAC, est une faculté située dans le campus Casablanca Route d'El Jadida. Elle dépend de l'université Hassan II de Casablanca. Les départements dans la FSAC sont organisés selon les disciplines en cinq départements: mathématiques  et informatique; physique ; chimie ; biologie ; géologie ...</p>
                            <div class="app-download-area">
                                <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                                    <!-- Google Store Btn -->
                                    <a href="http://www.fsac.ac.ma/">
                                        <i class="fa fa-link"></i>
                                        <p class="mb-0"><span></span> Visiter le site principal de la faculté</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Special Area End ***** -->

    
    <!-- ***** Video Area Start ***** -->
    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Area Start -->
                    <div class="video-area">
                       <!--  <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div> -->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="width: 100%;height: 100%;">
    <div class="item active">
      <img src="img/fsac/1.jpeg" alt="...">
    </div>
    
    <div class="item">
      <img src="img/fsac/3.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/fsac/4.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/fsac/5.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/fsac/6.jpg" alt="...">
    </div>
    <div class="item">
      <img src="img/fsac/7.jpg" alt="...">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <section class="cool_facts_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h3><span class="counter"><?php echo $Nbr_filiere; ?></span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-university"></i>
                            <p>Filières<br><br></p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="counter-area">
                            <h3><span class="counter"><?php echo $Nbr_enseignant; ?></span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-person"></i>
                            <p>Enseignants<br><br></p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h3><span class="counter"><?php echo $Nbr_etudLic; ?></span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-android-people"></i>
                            <p>Étudiants<br>Licence</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="1s">
                        <div class="counter-area">
                            <h3><span class="counter"><?php echo $Nbr_etudMast; ?></span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-android-people"></i>
                            <p>Étudiants <br>Master</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** App Screenshots Area Start ***** -->
    
    <!-- ***** App Screenshots Area End *****====== -->

    <!-- ***** Pricing Plane Area Start *****==== -->
    
    <!-- ***** Pricing Plane Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    
    <!-- ***** Client Feedback Area End ***** -->
    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Un service à votre écoute !</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>Pour toute assistance veuillez contacter le service informatique , en fournissant une description détaillée du probléme !</p>
                        <p>Pour les problémes lors de l'activation du compte priére de joindre aussi les informations saisies pour vérifier s'il y a erreur !</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Telephonne:</span> 00 212 522 23 06 80 / 84</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Fax:</span> +212 522 23 06 74</p>
                    </div>
                     <div class="address-text">
                        <p><span>Address:</span> Faculté des sciences Aïn Chock Km 8 Route d'El Jadida</p>
                    </div>    
                    <div class="app-download-area">
                            <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                                    <!-- Google Store Btn -->
                                    <a href="http://www.fsac.ac.ma/images/fsac.gif">
                                        <i class="ti-location-pin"></i>
                                        <p class="mb-0"><span></span> Localisation</p>
                                    </a>
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <br><br><br><br><br>
                        <form action="#" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php
                                            echo "<input type='text' value='".$_SESSION['Prenom_enseignant']." ".$_SESSION['Nom_enseignant']."' class='form-control' name='name' id='name' placeholder='Nom' required>";
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="email">
                                                <?php
                                                    while ($row=$sql1->fetch()){
                                                        echo "<option>$row[0]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                    <?php 
                        echo "$message";
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
           <!--  <h2>Ca.</h2> -->
            <img src="img/core-img/favicon_.png" alt> 
        </div>
        <!-- social icon-->
        <!-- <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div> -->
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <!-- <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li> -->
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright ©2019 MONPFE Designed by <a style="color: #6f42c1;" href="https://www.linkedin.com/in/ayoub-koddam-8a814a172/" target="_blank">Ayoub Koddam</a></p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
