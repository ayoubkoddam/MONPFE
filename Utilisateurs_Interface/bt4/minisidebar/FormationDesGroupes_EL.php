<?php
    session_start();
    error_reporting(0);

    include '../../../connection.php';

    $filiere=$_SESSION['Nom_filiere'];
    $option=$_SESSION['Option_S6'];

    $soutenance_req=$bdd->prepare("SELECT Date_soutenance FROM soutenance WHERE Code_soutenance=?");
    $soutenance_req->execute(array($_SESSION['Code_soutenance']));
    $date=$soutenance_req->fetch();
    $Date_soutenance=$date[0];
    $soutenance_req->closeCursor();
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
    <!-- Footable CSS -->
    <link href="../assets/node_modules/footable/css/footable.bootstrap.min.css" rel="stylesheet">
    <!-- Page CSS -->
    <link href="dist/css/pages/contact-app-page.css" rel="stylesheet">
    <link href="dist/css/pages/footable-page.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">Formation des groupes</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Etudiant</a></li>
                                <li class="breadcrumb-item active">Formation des groupes</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <?php
                                echo "<div class='card-header' style='text-align:center;''>
                                    <h1 class='card-title'>".$filiere."/".$option."</h1>
                                    </div>";
                            ?>
                            <div class="card-body"> 
                                <form method="post" action="" enctype="multipart/form-data">                               
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-paging="true" data-paging-size="7">
                                        <thead>
                                            <tr>
                                                <th style="padding-bottom: 2%;">№</th>
                                                <th style="padding-left: 3%;padding-bottom: 2%;">Etudiant(e)1</th>
                                                <th style="padding-left: 3%;padding-bottom: 2%;">Etudiant(e)2</th>
                                                <th style="padding-left: 3%;width:125.281px;padding-right: 5%;padding-bottom: 2%;">Etudiant(e)3</th>
                                                <th style="display: table-cell;width: 171.9375px;text-align: center;padding-bottom: 2%;">Encadrant(e)</th>
                                                <th style="text-align: center;display: table-cell;width: 221.9375px;padding-bottom: 2%;">Sujet</th>
                                                <th style="padding-left: 0.5%;display: table-cell;width: 132px;text-align: center;">Statut<br>
                                                 sujet</th>
                                                 <th style="padding-left: 0.9%;display: table-cell;width: 132px;text-align: center;">Statut<br>
                                                 documents</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql=$bdd->prepare("SELECT * FROM trombinoscope WHERE Nom_filiere=? AND Option_S6=?");
                                        $sql->execute(array($filiere,$option));
                                        $Num=1;
                                        while ($row=$sql->fetch()){ 

                                            $req_doc=$bdd->prepare("SELECT pfe.Statut_PFE,affecter_sujet.Sujet FROM pfe JOIN affecter_sujet ON pfe.Sujet_PFE=affecter_sujet.Sujet WHERE affecter_sujet.Num_groupe=?");
                                            $req_doc->execute(array($row[0]));
                                            $doc=$req_doc->fetch();
                                            $statdoc=$doc[0];
                                            $sujet=$doc[1];


                                            $query=$bdd->prepare("SELECT Sujet FROM affecter_sujet WHERE Num_groupe=?");
                                            $query->execute(array($row[0]));
                                            $sujet=$query->fetch();

                                            $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req1->execute(array($row[1]));
                                            $etud1=$req1->fetch();

                                            $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req2->execute(array($row[2]));
                                            $etud2=$req2->fetch();

                                            $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req3->execute(array($row[3]));
                                            $etud3=$req3->fetch();



                                            echo "<tr>";
                                            echo "<td style='padding-top:2%;'><h4 style='padding-top: 28%;'>".$Num."</h4></td>";
                                                if ($row[1]!=NULL) {
                                                    if ($row[1]!='  ') {
                                                       echo "<td style='display: table-cell;'><a href='' ><img src=$etud1[2] alt='user' class='img-circle' style='width:60px;' /> ".$etud1[0]." ".$etud1[1]."</a></td>";

                                                    }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add1".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                    </button> 
                                                </td>";
                                                    }
                                                }
                                                if ($row[2]!=NULL && $row[3]!=NULL) {
                                                    if ($row[2]!='  ' && $row[3]!='  '){
                                                       echo "<td style='padding-top:display: table-cell;'><a href='' ><img src=$etud2[2] alt='user' class='img-circle' style='width:60px;'/> ".$etud2[0]." ".$etud2[1]."</a></td>";
                                                       echo "<td style='display: table-cell;'><a href='' ><img src=$etud3[2] alt='user' class='img-circle' style='width:60px;'/> ".$etud3[0]." ".$etud3[1]."</a></td>";

                                                    }else if($row[2]=='  ' && $row[3]!='  '){
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                             <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add2".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                            </button>
                                                            </td>";
                                                       echo "<td style='display: table-cell;'><a href='' ><img src=$etud3[2] alt='user' class='img-circle' style='width:60px;'/> ".$etud3[0]." ".$etud3[1]."</a></td>";

                                                    }
                                                    elseif ($row[2]!='  ' && $row[3]=='  ') {
                                                        echo "<td style='display: table-cell;'><a href='' ><img src=$etud2[2] alt='user' class='img-circle' style='width:60px;'/> ".$etud2[0]." ".$etud2[1]."</a></td>";
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                             <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add3".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                            </button>
                                                            </td>";
                                                    }
                                                    else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add2".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                    </button>
                                                </td>
                                                <td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add3".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                    </button>
                                                </td>";}
                                                }elseif ($row[2]!=NULL){
                                                    if ($row[2]!='  ') {
                                                       echo "<td style='display: table-cell;'><a href='' ><img src= $etud2[2] alt='user' class='img-circle' style='width:60px;'/> ".$etud2[0]." ".$etud2[1]."</a></td>
                                                            <td></td>";

                                                    }else{
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            <button style='border-radius: 100%;background: #6f42c100;color: #6f42c1;' name='add2".$Num."'><i class='fa fa-plus' style='padding-top: 23%;'></i>
                                                            </button>
                                                            </td>
                                                            <td></td>";}
                                                }else{
                                                echo "<td></td>
                                                <td></td>";
                                                }


                                                echo "<td style='padding-top:3%;text-align ceneter;'><h5>".$row[5]."</h5>";

                                                echo"</td>
                                                <td><h5 style='padding-top: 6%;text-align:center;'>".$sujet[0]."</h5></td>";
                                                if ($row[6]!=NULL) {
                                                if($row[6]==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:60%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:60%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:60%;'></h4></td>";
                                                }
                                                if ($statdoc!=NULL) {
                                                if($statdoc==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:30%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'></h4></td>";
                                                }

                                            echo "</tr>";
                                                $CNE=$_SESSION['CNE'];
                                                $add1=$_POST['add1'.$Num];
                                                $add2=$_POST['add2'.$Num];
                                                $add3=$_POST['add3'.$Num];
                                                $Num_groupe=$row[0];
                                            if (isset($add1) || isset($add2) || isset($add3)) {
                                                if (isset($add1)) {
                                                    $CNE1=$bdd->prepare("UPDATE trombinoscope SET Etudiant_e_1=? WHERE Num_groupe=? ");
                                                    $CNE1->execute(array($CNE,$Num_groupe));
                                                    $Num_gr1=$bdd->prepare("UPDATE etudiant SET Num_groupe=? WHERE CNE=?");
                                                    $Num_gr1->execute(array($row[0],$CNE));
                                                    header('location:FormationDesGroupes_EL.php');
                                                    
                                                }elseif (isset($add2)) {
                                                    $CNE2=$bdd->prepare("UPDATE trombinoscope SET Etudiant_e_2=? WHERE Num_groupe=? ");
                                                    $CNE2->execute(array($CNE,$Num_groupe));
                                                    $Num_gr2=$bdd->prepare("UPDATE etudiant SET Num_groupe=? WHERE CNE=?");
                                                    $Num_gr2->execute(array($row[0],$CNE));
                                                    header('location:FormationDesGroupes_EL.php');
                                                }else{
                                                    $CNE3=$bdd->prepare("UPDATE trombinoscope SET Etudiant_e_3=? WHERE Num_groupe=? ");
                                                    $CNE3->execute(array($CNE,$Num_groupe));
                                                    $Num_gr3=$bdd->prepare("UPDATE etudiant SET Num_groupe=? WHERE CNE=?");
                                                    $Num_gr3->execute(array($row[0],$CNE));
                                                    header('location:FormationDesGroupes_EL.php');
                                                }
                                            }
                                            $Num++;
                                            $pfe_req1=$bdd->prepare("SELECT Code_PFE FROM pfe WHERE Sujet_PFE=?");
                                            $pfe_req1->execute(array($sujet[0]));
                                            $code1=$pfe_req1->fetch();
                                            $etud1_pfe=$bdd->prepare("UPDATE etudiant SET Code_PFE=? WHERE CNE=?");
                                            $etud1_pfe->execute(array($code1[0],$row[1]));
                                            $etud2_pfe=$bdd->prepare("UPDATE etudiant SET Code_PFE=? WHERE CNE=?");
                                            $etud2_pfe->execute(array($code1[0],$row[2]));
                                            $etud3_pfe=$bdd->prepare("UPDATE etudiant SET Code_PFE=? WHERE CNE=?");
                                            $etud3_pfe->execute(array($code1[0],$row[3]));
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>        
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- Footable -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/footable/js/footable.min.js"></script>
    <!--FooTable init-->
    <script src="dist/js/pages/footable-init.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/minisidebar/app-ticket.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2019 14:14:51 GMT -->
</html>