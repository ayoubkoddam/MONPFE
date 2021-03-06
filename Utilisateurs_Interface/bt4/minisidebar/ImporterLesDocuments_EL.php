<?php
    session_start();
    error_reporting(0);

    include '../../../connection.php';

    $annee=$bdd->prepare('SELECT Annee_univ FROM annee_universitaire ORDER BY Annee_univ DESC');
    $annee->execute();
    $row=$annee->fetch();
    $Annee_univ=$row[0];

    $Groupe=$bdd->prepare('SELECT Num_groupe FROM etudiant WHERE CNE=?');
    $Groupe->execute(array($_SESSION['CNE']));
    $requ=$Groupe->fetch();
    $Num_groupe=$requ[0];

    $SOM_req=$bdd->prepare("SELECT enseignant.N__SOM FROM enseignant JOIN trombinoscope ON enseignant.Nom_enseignant=trombinoscope.encadrant WHERE trombinoscope.Num_groupe=?");
    $SOM_req->execute(array($Num_groupe));
    $res=$SOM_req->fetch();
    $SOM=$res[0];

    if(isset($_POST['upload'])){
    if(!empty($_FILES)){
        $file_name=$_FILES['file']['name'];
        $pres_name=$_FILES['presentation']['name'];
        $uploaddir ="/uploads/" . basename($file_name);
        $upload=__DIR__ .$uploaddir;
        $uploadpres ="/uploads/" . basename($pres_name);
        $uploadp=__DIR__ .$uploadpres;
        $file_extension = strrchr($file_name, ".");
        $pres_extension = strrchr($pres_name, ".");
        $extension_autorisees=array('.pdf','.PDF');
        $extension_presentation=array('.ppt','.PPT','pptx','.PPTX');
        $fil=substr($file_name, 0,-4);
        if (in_array($file_extension, $extension_autorisees) and in_array($pres_extension, $extension_presentation) ){

        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload) and move_uploaded_file($_FILES['presentation']['tmp_name'], $uploadp)) {
            $req=$bdd->prepare('INSERT INTO pfe (Sujet_pfe,Rapport,Presentation,N__SOM,Annee_univ) VALUES(?,?,?,?,?)');
            $req->execute(array($fil,$uploaddir,$uploadpres,$SOM,$Annee_univ));

            $message='<h4 style="color:green; text-align:center;"><i class="ti-check">'.' les documents ont été importés avec succès</i></h4>';
        }
        }
        }
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
    <title>Etudiant</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="dist/css/pages/file-upload.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="">
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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="Etudiant_Licence_Profil.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=$_SESSION['Image'] ?>" alt="user" class=""> <span class="hidden-md-down"><?=$_SESSION['Prenom_etudiant']?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="Etudiant_Licence_Profil.php" class="dropdown-item"><i class="ti-user"></i> Mon Profil</a>
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
                                <li><a href="Etudiant_Licence_Profil.php"><i class="ti-user"></i> Mon Profil</a></li>
                                <form method="post" action="../../../deconnection.php">
                                <a href="../../../deconnection.php"><i class="fa fa-power-off"></i> Se Déconnecter</a></form>
                            </ul>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="../../../index/accueil_Etud.php" aria-expanded="false"><i class="ti-window"></i><span class="hide-menu">Accueil</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="Documentation _Etudiant_Licence.php" aria-expanded="false"><i class="ti-info"></i><span class="hide-menu">Documentation</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="Etudiant_Licence_Archive.php" aria-expanded="false"><i class="ti-archive"></i><span class="hide-menu">Archive</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="../../../index/accueil_Etud.php#contact" aria-expanded="false"><i class="ti-help"></i><span class="hide-menu">Aide</span></a>
                        </li>
                        <li class="nav-small-cap">--- ESPACE ETUDIANT</li>
                        <li> <a class="waves-effect waves-dark" href="FormationDesGroupes_EL.php" aria-expanded="false"><i class="ti-star"></i><span class="hide-menu">Formation des groupes</span></a>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="ImporterLesDocuments_EL.php" aria-expanded="false"><i class="ti-upload"></i><span class="hide-menu">Importation des documents</span></a>
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
                        <h4 class="text-themecolor">Espace Etudiant</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Etudiant</a></li>
                                <li class="breadcrumb-item active">Espace Etudiant</li>
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
                <!-- row -->
                
                <!-- /.row -->
                <!-- Row -->
                
                <!-- /.row -->
                <!-- .row -->
                <!-- ROw -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Importer les document</h4><br><br>
                            <form method="post" action="ImporterLesDocuments_EL.php" enctype="multipart/form-data">
                            <h3>Rapport:</h3>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="file">
                                <label class="custom-file-label form-control" for="inputGroupFile04">Sélectionner le fichier</label>
                              </div>
                              <!-- <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04" name="uploadf">Importer</button>
                              </div> -->
                            </div>
                            <br><br>
                              <h3>Présentation:</h3>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="presentation">
                                <label class="custom-file-label form-control" for="inputGroupFile04">Sélectionner le fichier</label>
                              </div>
                              <!-- <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04" name="uploadpres">Importer</button>
                              </div> -->
                            </div><br><br><br>
                            <div class="input-group-append" style="padding-left: 48%;">
                                <!-- <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04"> -->
                                <input type="submit" name="upload"  class="btn btn-outline-secondary" value="Importer" ><!-- </button> -->
                              </div>
                            </form><br><br>
                            <div class="flex-col-c p-t-60" style="padding-left: 4%;"><?php echo $message;?></div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- row -->
                <!-- Row -->
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="dist/js/pages/jasny-bootstrap.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/minisidebar/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2019 14:16:00 GMT -->
</html>