<?php
    session_start();
    error_reporting(0);

    include '../../../connection.php';
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
    <title>Responsable</title>
    <!-- This page CSS -->
        <!-- Bootstrap responsive table CSS -->
    <link href="../assets/node_modules/tablesaw/dist/tablesaw.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.2/iconify.min.js"></script>
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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $_SESSION['Image']?>" alt="user" class="" style="width: 40px;border-radius: 50%;">
                             <span class="hidden-md-down"><?= $_SESSION['Prenom_enseignant'] ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="Responsable_Profil.php" class="dropdown-item"><i class="ti-user"></i> Mon Profile</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="../../../deconnection.php" class="dropdown-item"><i class="fa fa-power-off"></i> Se Déconnecter</a>
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
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= $_SESSION['Image']?>" alt="user-img" class="img-circle" style="width: 40px;border-radius: 50%;">
                        <span class="hide-menu"><?= $_SESSION['Prenom_enseignant'] .' '.$_SESSION['Nom_enseignant'] ?></span></a>
                                <ul aria-expanded="false" class="collapse">
                                <li><a href="Responsable_Profil.php"><i class="ti-user">
                                </i> Mon Profil</a></li>
                                <li><a href="../../../deconnection.php"><i class="fa fa-power-off"></i> Se Déconnecter</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="../../../index/accueil_Ens.php" aria-expanded="false"><i class="ti-window"></i><span class="hide-menu">Accueil</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Responsable_Archive.php" aria-expanded="false"><i class="ti-archive"></i><span class="hide-menu">Archive</span></a>
                        </li>
                        <li class="nav-small-cap">--- ESPACE ENSEIGNANT</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Gestion des PFE</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="AffectationDesSujets_RES.php">Affecter les sujets</a></li>
                                <li><a href="AccorderLesDocuments_RES.php">Valider les rapports et les présentations</a></li>
                                <!-- <li><a href="form-addons.html">Accorder les présentations</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="TéléchargerAttestation_RES.php" aria-expanded="false"><i class="ti-download"></i><span class="hide-menu">Téléchargement d'attestation</span></a>
                        </li>
                        <li class="nav-small-cap">--- ESPACE RESPONSABLE</li>
                        <li> <a class="waves-effect waves-dark" href="ImporterLaListeDesEtudiants.php" aria-expanded="false"><i class="ti-upload"></i><span class="hide-menu">Importer la liste des étudiants</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="PrecisionNbrGroupes.php" aria-expanded="false"><i class="ti-new-window"></i><span class="hide-menu">Précision du nombre des groupes</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="AffectationDesEncadrants.php" aria-expanded="false"><i class="ti-layout-list-thumb-alt"></i><span class="hide-menu">Affectation des encadrants</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="AccorderLesSujets.php" aria-expanded="false"><i class="ti-check-box"></i><span class="hide-menu">Valider les sujets</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="DateSoutenance.php" aria-expanded="false"><i class="ti-calendar"></i><span class="hide-menu">Date soutenance</span></a>
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Espace Responsable</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Reponsable</a></li>
                                <li class="breadcrumb-item active">Espace Responsable</li>
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

                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Précision du nombre des groupes :</h4>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-5">Option :</label>
                                            <div class="col-md-2">
                                                <?php
                                                    $filiere = $_SESSION['Nom_filiere'];

                                                    $sql=$bdd-> prepare("SELECT Cycle FROM filiere WHERE Nom_filiere=?");
                                                    $sql->execute(array($filiere));

                                                    $row=$sql->fetch();
                                                    $cycle=$row[0];


                                                    echo "<select class='form-control custom-select' name='option'>";
                                                    if ($cycle == "Master") {
                                                        echo "<option name='Option 1'></option>";
                                                    }
                                                    else{
                                                    echo "<option name='Option 1'>BD</option>";
                                                    echo "<option name='Option 2'>SID</option>";
                                                    echo "<option name='Option 3'>RESEAUX</option>";
                                                    }  
                                                    echo "</select>";
                                                ?>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Monômes :</label>
                                        <div class="input-group mb-3">
                                            <input type="Number" class="form-control" value="0" name="monomes">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Binômes :</label>
                                        <div class="input-group mb-3">
                                            <input type="Number" class="form-control" value="0" name="binomes">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><iconify-icon data-icon="fa-solid:user-friends"></iconify-icon></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd1">Trinômes :</label>
                                        <div class="input-group mb-3">
                                            <input type="Number" class="form-control" value="0" name="trinomes">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-users"></i></span>
                                            </div>
                                        </div>
                                    </div >
                                    <div style="padding-left:41%;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="trombinoscope">Créer le trombinoscope</button></div>
                                </form>
                                <div class="flex-col-c p-t-60" style="padding-right: 2%"><?php
                                    $monomes=$_POST['monomes'];
                                    $binomes=$_POST['binomes'];
                                    $trinomes=$_POST['trinomes']; 
                                    $message='<br><h4 style="color:green; text-align:center;"><i class="ti-check">'.' le trombinoscope a été créé avec succès</i></h4>'; 
                                    if(isset($_POST['trombinoscope']) &&($monomes>0 || $binomes>0 || $trinomes>0))echo $message; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
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


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/minisidebar/form-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2019 14:16:00 GMT -->
</html>
<?php
if (isset($_POST['trombinoscope'])) {
    $option=$_POST['option'];
    $SOM=$_SESSION['N__SOM'];

    if ($cycle == "Licence") {
        for ($z=0; $z < $trinomes; $z++) { 
            $req3=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Etudiant_e_2,Etudiant_e_3,Option_S6,Nom_filiere,N__SOM)VALUES ('  ','  ','  ',?,?,?)");
             $req3->execute(array($option,$filiere,$SOM));
        }
        for ($j=0; $j < $binomes; $j++) { 
            $req2=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Etudiant_e_2,Option_S6,Nom_filiere,N__SOM)VALUES ('  ','  ',?,?,?)");
             $req2->execute(array($option,$filiere,$SOM));
        }
        for ($i=0; $i < $monomes; $i++) { 
             $req1=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Option_S6,Nom_filiere,N__SOM)VALUES ('  ',?,?,?)");
             $req1->execute(array($option,$filiere,$SOM));
        }
    }else{
        for ($z=0; $z < $trinomes; $z++) { 
            $req3=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Etudiant_e_2,Etudiant_e_3,Nom_filiere,N__SOM)VALUES ('  ','  ','  ',?,?)");
             $req3->execute(array($filiere,$SOM));
        }
        for ($j=0; $j < $binomes; $j++) { 
            $req2=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Etudiant_e_2,Nom_filiere,N__SOM)VALUES ('  ','  ',?,?)");
             $req2->execute(array($filiere,$SOM));
        }
        for ($i=0; $i < $monomes; $i++) { 
             $req1=$bdd->prepare("INSERT INTO trombinoscope(Etudiant_e_1,Nom_filiere,N__SOM)VALUES ('  ',?,?)");
             $req1->execute(array($filiere,$SOM));
        }
    }

    $message='<h4 style="color:green; text-align:center;"><i class="ti-check">'.' le trombinoscope a été créé avec succès</i></h4>';
}

?>