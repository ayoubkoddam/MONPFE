<?php
    session_start();
    error_reporting(0);

include '../../../connection.php';

    $prenom=$_POST['prenom'];

    $nom=$_POST['nom'];

    $email=$_POST['email'];

    $pass=$_POST['password'];

    $cne=$_SESSION['CNE'];

if(isset($_POST['update'])){
    $sql=$bdd->prepare('UPDATE Etudiant SET Prenom_etudiant=?,Nom_etudiant=?,E_mail_etudiant=?,Password_etudiant=? WHERE CNE=?');
    $sql->execute(array($prenom,$nom,$email,$pass,$cne));

    $_SESSION['Prenom_etudiant']=$prenom;
    $_SESSION['Nom_etudiant']=$nom;
    $_SESSION['E_mail_etudiant']=$email;
    $_SESSION['Password_etudiant']=$pass;
}
    $soutenance_req=$bdd->prepare("SELECT Date_soutenance FROM soutenance WHERE Code_soutenance=?");
    $soutenance_req->execute(array($_SESSION['Code_soutenance']));
    $date=$soutenance_req->fetch();
    $Date_soutenance=$date[0];
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="../assets/images/MONPFE.png">
    <title>Etudiant profil</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-purple fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">MONPFE</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index-2.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../assets/images/monPFE.png" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <img src="../assets/images/MONPFE_.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                         <!-- Light Logo text -->    
                         <div class="light-logo" style="padding-top:10px;"><h2 style="color: white;">MONPFE</h2></div></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                           
                                            <!-- Message -->
                                            <?php if(isset($Date_soutenance)){
                                            echo "<a href='javascript:void(0)'>
                                                <div class='btn btn-success btn-circle' style='background: white; color: #6610f2;'><i class='ti-calendar'></i></div>
                                                <div class='mail-contnet'>
                                                    <h5>Date soutenance</h5> <span class='mail-desc'>La soutenance est programmé pour le:</span> <span class='time'>".$Date_soutenance."<span></div>
                                            </a>
                                            </div>
                                            </li>";}else{
                                                echo "<li>
                                                            <a class='nav-link text-center link' href='javascript:void(0);'> <strong>Aucune notification</strong> </a>
                                                    </li>";
                                            }
                                            ?>
                                            
                                </ul>
                            </div>
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
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="Etudiant_Master_Profil.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $_SESSION['Image'] ?>" alt="user" class=""> <span class="hidden-md-down"><?=$_SESSION['Prenom_etudiant']?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="Etudiant_Master_Profil.php" class="dropdown-item"><i class="ti-user"></i> Mon Profil</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <form method="post" action="../../../deconnection.php">
                                <a href="../../../deconnection.php" class="dropdown-item"><i class="fa fa-power-off"></i> Se Déconnecter</a></form>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="<?=$_SESSION['Image'] ?>" alt="user-img" class="img-circle"><span class="hide-menu"><?=$_SESSION['Prenom_etudiant']." ".$_SESSION['Nom_etudiant']?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="Etudiant_Master_Profil.php"><i class="ti-user"></i> Mon Profil</a></li>
                                <form method="post" action="../../../deconnection.php">
                                <a href="../../../deconnection.php"><i class="fa fa-power-off"></i> Se Déconnecter</a></form>
                            </ul>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="../../../index/accueil_Etud.php" aria-expanded="false"><i class="ti-window"></i><span class="hide-menu">Accueil</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="Documentation _Etudiant_Master.php" aria-expanded="false"><i class="ti-info"></i><span class="hide-menu">Documentation</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="Etudiant_Master_Archive.php" aria-expanded="false"><i class="ti-archive"></i><span class="hide-menu">Archive</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="../../../index/accueil_Etud.php#contact" aria-expanded="false"><i class="ti-help"></i><span class="hide-menu">Aide</span></a>
                        </li>
                        <li class="nav-small-cap">--- ESPACE ETUDIANT</li>
                        <li> <a class=" waves-effect waves-dark" href="FormationDesGroupes_EM.php" aria-expanded="false"><i class="ti-star"></i><span class="hide-menu">Formation des groupes</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="TéléchargerLaConvention.php" aria-expanded="false"><i class="ti-download"></i><span class="hide-menu">Télécharger la convention</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="ImporterLaConvention.php" aria-expanded="false"><i class="ti-plus"></i><span class="hide-menu">Importer la convention</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="ImporterLesDocuments_EM.php" aria-expanded="false"><i class="ti-upload"></i><span class="hide-menu">Importation des documents</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Rapport</a></li>
                                <li><a href="#">Présentation</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Mon Profil</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Etudiant</a></li>
                                <li class="breadcrumb-item active">Mon Profil</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card"> 
                            <img class="card-img" src="../assets/images/background/background.jpg" height="456" alt="Card image">
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center"> <img src="<?= $_SESSION['Image'] ?>" class="img-circle" width="100">
                                    <br><br>
                                    <h4 class="card-title"><?=$_SESSION['Prenom_etudiant']." ".$_SESSION['Nom_etudiant']?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card"> 
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profil</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Paramètres</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nom Complet</strong>
                                                <br>
                                                <p class="text-muted"><?=$_SESSION['Prenom_etudiant']." ".$_SESSION['Nom_etudiant']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?=$_SESSION['E_mail_etudiant']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Filière</strong>
                                                <br>
                                                <p class="text-muted"><?=$_SESSION['Nom_filiere']?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Cycle</strong>
                                                <br>
                                                <p class="text-muted"><?=$_SESSION['Cycle']?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Le département de mathématiques et d'informatique compte plus de vingt professeurs qui œuvrent dans divers domaines, tant en enseignement qu'en recherche.<br><br>

                                        De nos jours, l'informatique occupe une place importante dans notre société. L'informatique est devenue plus accessible par l'abondance de logiciels et de systèmes de plus en plus faciles à utiliser. Ceux-ci sont conçus selon des théories et des approches variées. Nos professeurs travaillent sur ces théories et ces approches au sein de nos unités de recherche et les enseignent aussi à nos étudiants dans les programmes de cycles supérieurs.<br><br>

                                        Le département d’informatique propose un enseignement :<br><br>

                                        Fondamental, pour acquérir les concepts de base et les méthodes de travail.
                                        Appliqué, pour faciliter l’apprentissage des concepts et déployer un savoir-faire professionnel.
                                        Evolutif, pour intégrer les progrès technologiques et les exigences du milieu professionnel.
                                        Ouvert, pour développer les facultés de communication indispensables à l’exercice du métier d’informaticien.<br><br>
                                        <b>Chef de département</b></p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" method="post" action="#">
                                            <div class="form-group">
                                                <label class="col-md-12">Prénom</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Prénom" class="form-control form-control-line" name="prenom" value="<?=$_SESSION['Prenom_etudiant']?>">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-12">Nom</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Nom" class="form-control form-control-line" name="nom" value="<?=$_SESSION['Nom_etudiant']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="Etudiant@monpfe.com" class="form-control form-control-line" name="email" id="example-email" value="<?=$_SESSION['E_mail_etudiant']?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Mot de passe</label>
                                                <div class="col-md-12">
                                                    <input type="password"  class="form-control form-control-line" name="password" value="<?=$_SESSION['Password_etudiant']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="update">Mettre à jour le profil</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer" style="text-align: center;">
            Copyright ©2019 MONPFE Designed by <a href="https://www.linkedin.com/in/ayoub-koddam-8a814a172/">Ayoub Koddam</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/minisidebar/app-contact-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2019 14:18:06 GMT -->
</html>