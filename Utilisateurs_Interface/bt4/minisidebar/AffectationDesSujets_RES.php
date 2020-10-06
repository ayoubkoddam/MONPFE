<?php
    session_start();
    error_reporting(0);

    include '../../../connection.php';  

    $fil=$bdd->prepare("SELECT Nom_filiere FROM attacher WHERE N__SOM=?");
    $fil->execute(array($_SESSION['N__SOM']));

    $count=$fil->rowCount();




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
                        <h4 class="text-themecolor">Espace Enseignant</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Enseignant</a></li>
                                <li class="breadcrumb-item active">Espace Enseignant</li>
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
                            <h4 class="card-title"> Affectation des sujets :</h4><br><br>
                        <form method="post" action="" enctype="multipart/form-data">
                            <?php
                            if ($count>0) {

                                while ($filier=$fil->fetch()) {

                                    $filiere=$filier[0];
                                    $sql=$bdd-> prepare("SELECT Cycle FROM filiere WHERE Nom_filiere=?");
                                    $sql->execute(array($filiere));

                                    $row=$sql->fetch();
                                    $cycle=$row[0];


                            if($cycle=='Licence'){


                                $option1="BD";
                                $option2="SID";
                                $option3="RESEAUX";

                                echo "<div class='card-header' style='text-align:center;''>
                                    <h1 class='card-title'>$filiere</h1>
                                    </div>
                                    <br><br>";

                                echo "<h4 style='text-align:center;'><u>Option : BD</u></h4>";
                               
                                echo "<div class='table-responsive'>
                                    <table id='demo-foo-addrow' class='table m-t-30 table-hover no-wrap contact-list' data-paging='true' data-paging-size='7'>
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)1</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)2</th>
                                                <th style='padding-left: 3%;width:120.281px;padding-right: 5%;'>Etudiant(e)3</th>
                                                <th style='display: table-cell;width: 171.9375px; padding-left: 1%;''>Encadrant(e)</th>
                                                <th style='padding-left: 10%;display: table-cell;width: 221.9375px;''>Sujet</th>
                                                <th style='padding-left: 0.5%;display: table-cell;width: 132px;''>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                        $sql=$bdd->prepare('SELECT * FROM trombinoscope WHERE Nom_filiere=? AND Option_S6=?');
                                        $sql->execute(array($filiere,$option1));
                                        $Num1=1;
                                        while ($row=$sql->fetch()){ 
                                            $Num_groupe=$row[0];

                                            $SOM=$_SESSION['N__SOM'];

                                            $query=$bdd->prepare("SELECT Sujet FROM affecter_sujet WHERE Num_groupe=?");
                                            $query->execute(array($row[0]));
                                            $sujet1=$query->fetch();

                                            $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req1->execute(array($row[1]));
                                            $etud1_1=$req1->fetch();

                                            $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req2->execute(array($row[2]));
                                            $etud2_1=$req2->fetch();

                                            $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req3->execute(array($row[3]));
                                            $etud3_1=$req3->fetch();

                                            echo "<tr>";
                                            echo "<td ><h4 style='padding-top: 85%;'>".$Num1."</h4></td>";
                                                if ($row[1]!=NULL) {
                                                    if ($row[1]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src= $etud1_1[2] alt='etudiant(e)1' class='img-circle' style='width:60px;' /> ".$etud1_1[0]." ".$etud1_1[1]."</a></td>";

                                                    }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'> 
                                                        </td>";
                                                    }
                                                }
                                                if ($row[2]!=NULL && $row[3]!=NULL) {
                                                    if ($row[2]!='  ' && $row[3]!='  '){
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_1[2] alt='etudiant(e)2' class='img-circle' style='width:60px;'/> ".$etud2_1[0]." ".$etud2_1[1]."</a></td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_1[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_1[0]." ".$etud3_1[1]."</a></td>";

                                                    }else if($row[2]=='  ' && $row[3]!='  '){
                                                        echo "<td style='padding-top: 2%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>";
                                                       echo "<td style='padding-top: 2.6%;display: table-cell;'><a href='' ><img src=$etud3[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3[0]." ".$etud3[1]."</a></td>";

                                                    }
                                                    else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>
                                                    <td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>";}
                                                }elseif ($row[2]!=NULL){
                                                    if ($row[2]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_1[2] alt='etudiant(e)2' class='img-circle' style='width:60px;' /> ".$etud2_1[0]." ".$etud2_1[1]."</a></td>
                                                            <td></td>";

                                                    }else{
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>
                                                            <td></td>";}
                                                }else{
                                                echo "<td></td>
                                                <td></td>";
                                                }


                                                if ($row[5]!=NULL) {
                                                echo "<td style=' padding-top:3%;'><h5>".$row[5]."</h5></td>";

                                                }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($sujet1[0]!=NULL) {
                                                echo "<td><h5 style='padding-top: 6%;'>".$sujet1[0]."</h5></td>";
                                                }elseif ($row[5]==$_SESSION['Nom_enseignant']) {
                                                echo "<td style=' padding-top:2%;'><input type='text' class='dataTables_filter' name='sujet1' style='width: 256px;'></td>";
                                                }else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($row[6]!=NULL) {
                                                if($row[6]==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:30%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'></h4></td>";
                                                }
                                            echo "</tr>";
                                                                                        
                                            $sujet_1=$_POST['sujet1'];
                                            $Num1++;
                                            if (isset($_POST['trombinoscope'])){
                                                if (isset($sujet_1) && ($row[5]==$_SESSION['Nom_enseignant'])){
                                                $suj1=$bdd->prepare("INSERT INTO affecter_sujet(N__SOM,Num_groupe,Sujet) VALUES(?,?,?) ");
                                                $suj1->execute(array($SOM,$row[0],$sujet_1));
                                                }
                                                header('location:AffectationDesSujets_RES.php');
                                            }
                                        }
                                        echo "</tbody>
                                            <tfoot>        
                                            </tfoot>
                                            </table>
                                            </div>";
                                echo "<br><br><h4 style='text-align:center;'><u>Option : SID</u></h4>";
                               
                                echo "<div class='table-responsive'>
                                    <table id='demo-foo-addrow' class='table m-t-30 table-hover no-wrap contact-list' data-paging='true' data-paging-size='7'>
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)1</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)2</th>
                                                <th style='padding-left: 3%;width:120.281px;padding-right: 5%;'>Etudiant(e)3</th>
                                                <th style='display: table-cell;width: 171.9375px; padding-left: 1%;''>Encadrant(e)</th>
                                                <th style='padding-left: 10%;display: table-cell;width: 221.9375px;''>Sujet</th>
                                                <th style='padding-left: 0.5%;display: table-cell;width: 132px;''>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                        $sql=$bdd->prepare('SELECT * FROM trombinoscope WHERE Nom_filiere=? AND Option_S6=?');
                                        $sql->execute(array($filiere,$option2));
                                        $Num2=1;
                                        while ($row=$sql->fetch()){ 
                                            $Num_groupe=$row[0];

                                            $query=$bdd->prepare("SELECT Sujet FROM affecter_sujet WHERE Num_groupe=?");
                                            $query->execute(array($row[0]));
                                            $sujet2=$query->fetch();

                                            $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req1->execute(array($row[1]));
                                            $etud1_2=$req1->fetch();

                                            $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req2->execute(array($row[2]));
                                            $etud2_2=$req2->fetch();

                                            $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req3->execute(array($row[3]));
                                            $etud3_2=$req3->fetch();

                                            echo "<tr>";
                                            echo "<td ><h4 style='padding-top: 50%;'>".$Num2."</h4></td>";
                                                if ($row[1]!=NULL) {
                                                    if ($row[1]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud1_2[2] alt='etudiant(e)1' class='img-circle' style='width:60px;'/> ".$etud1_2[0]." ".$etud1_2[1]."</a></td>";

                                                    }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'> 
                                                        </td>";
                                                    }
                                                }
                                                if ($row[2]!=NULL && $row[3]!=NULL) {
                                                    if ($row[2]!='  ' && $row[3]!='  '){
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_2[2] alt='etudiant(e)2' class='img-circle' style='width:60px;'/> ".$etud2_2[0]." ".$etud2_2[1]."</a></td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_2[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_2[0]." ".$etud3_2[1]."</a></td>";

                                                    }else if($row[2]=='  ' && $row[3]!='  '){
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_2[2] alt='etudiant(e)3' class='img-circle'style='width:60px;' /> ".$etud3_2[0]." ".$etud3_2[1]."</a></td>";

                                                    }
                                                    else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>
                                                    <td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>";}
                                                }elseif ($row[2]!=NULL){
                                                    if ($row[2]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_2[2] alt='etudiant(e)2' class='img-circle' style='width:60px'/> ".$etud2_2[0]." ".$etud2_2[1]."</a></td>
                                                            <td></td>";

                                                    }else{
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>
                                                            <td></td>";}
                                                }else{
                                                echo "<td></td>
                                                <td></td>";
                                                }


                                                if ($row[5]!=NULL) {
                                                echo "<td style=' padding-top:3%;'><h5>".$row[5]."</h5></td>";

                                                }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($sujet2[0]!=NULL) {
                                                echo "<td><h5 style='padding-top: 6%;'>".$sujet2[0]."</h5></td>";
                                                }elseif ($row[5]==$_SESSION['Nom_enseignant']) {
                                                echo "<td style=' padding-top:2%;'><input type='text' class='dataTables_filter' name='sujet2' style='width: 256px;'></td>";
                                                }else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($row[6]!=NULL) {
                                                if($row[6]==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:30%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'></h4></td>";
                                                }
                                            echo "</tr>";
                                            $sujet_2=$_POST['sujet2'];
                                            $Num2++;
                                            if (isset($_POST['trombinoscope'])){
                                                if (isset($sujet_2) && ($row[5]==$_SESSION['Nom_enseignant'])){
                                                $suj2=$bdd->prepare("INSERT INTO affecter_sujet(N__SOM,Num_groupe,Sujet) VALUES(?,?,?) ");
                                                $suj2->execute(array($SOM,$row[0],$sujet_2));
                                                }
                                                header('location:AffectationDesSujets_RES.php');
                                            }
                                        }
                                        echo "</tbody>
                                            <tfoot>        
                                            </tfoot>
                                            </table>
                                            </div>";
                                echo "<br><br><h4 style='text-align:center;'><u>Option : RESEAUX</u></h4>";
                               
                                echo "<div class='table-responsive'>
                                    <table id='demo-foo-addrow' class='table m-t-30 table-hover no-wrap contact-list' data-paging='true' data-paging-size='7'>
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)1</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)2</th>
                                                <th style='padding-left: 3%;width:120.281px;padding-right: 5%;'>Etudiant(e)3</th>
                                                <th style='display: table-cell;width: 171.9375px; padding-left: 1%;''>Encadrant(e)</th>
                                                <th style='padding-left: 10%;display: table-cell;width: 221.9375px;''>Sujet</th>
                                                <th style='padding-left: 0.5%;display: table-cell;width: 132px;''>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                        $sql=$bdd->prepare('SELECT * FROM trombinoscope WHERE Nom_filiere=? AND Option_S6=?');
                                        $sql->execute(array($filiere,$option3));
                                        $Num3=1;
                                        while ($row=$sql->fetch()){ 
                                            $Num_groupe=$row[0];

                                            $query=$bdd->prepare("SELECT Sujet FROM affecter_sujet WHERE Num_groupe=?");
                                            $query->execute(array($row[0]));
                                            $sujet3=$query->fetch();

                                            $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req1->execute(array($row[1]));
                                            $etud1_3=$req1->fetch();

                                            $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req2->execute(array($row[2]));
                                            $etud2_3=$req2->fetch();

                                            $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req3->execute(array($row[3]));
                                            $etud3_3=$req3->fetch();

                                            echo "<tr>";
                                            echo "<td ><h4 style='padding-top: 50%;'>".$Num3."</h4></td>";
                                                if ($row[1]!=NULL) {
                                                    if ($row[1]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud1_3[2] alt='etudiant(e)1' class='img-circle' style='width:60px;'/> ".$etud1_3[0]." ".$etud1_3[1]."</a></td>";

                                                    }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'> 
                                                        </td>";
                                                    }
                                                }
                                                if ($row[2]!=NULL && $row[3]!=NULL) {
                                                    if ($row[2]!='  ' && $row[3]!='  '){
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_3[2] alt='etudiant(e)2' class='img-circle' style='width:60px;'/> ".$etud2_3[0]." ".$etud2_3[1]."</a></td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_3[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_3[0]." ".$etud3_3[1]."</a></td>";

                                                    }else if($row[2]=='  ' && $row[3]!='  '){
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_3[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_3[0]." ".$etud3_3[1]."</a></td>";

                                                    }
                                                    else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>
                                                    <td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>";}
                                                }elseif ($row[2]!=NULL){
                                                    if ($row[2]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_3[2] alt='user' class='img-circle' style='width:60px; /> ".$etud2_3[0]." ".$etud2_3[1]."</a></td>
                                                            <td></td>";

                                                    }else{
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>
                                                            <td></td>";}
                                                }else{
                                                echo "<td></td>
                                                <td></td>";
                                                }


                                                if ($row[5]!=NULL) {
                                                echo "<td style=' padding-top:3%;'><h5>".$row[5]."</h5></td>";

                                                }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($sujet3[0]!=NULL) {
                                                echo "<td><h5 style='padding-top: 6%;'>".$sujet3






                                                [0]."</h5></td>";
                                                }elseif ($row[5]==$_SESSION['Nom_enseignant']) {
                                                echo "<td style=' padding-top:2%;'><input type='text' class='dataTables_filter' name='sujet3' style='width: 256px;'></td>";
                                                }else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($row[6]!=NULL) {
                                                if($row[6]==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:30%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'></h4></td>";
                                                }
                                            echo "</tr>";
                                            $sujet_3=$_POST['sujet3'];
                                            $Num3++;
                                            if (isset($_POST['trombinoscope'])){
                                                if (isset($sujet_3) && ($row[5]==$_SESSION['Nom_enseignant'])){
                                                $suj3=$bdd->prepare("INSERT INTO affecter_sujet(N__SOM,Num_groupe,Sujet) VALUES(?,?,?) ");
                                                $suj3->execute(array($SOM,$row[0],$sujet_3));
                                                }
                                                header('location:AffectationDesSujets_RES.php');
                                            }
                                        }
                                        echo "</tbody>
                                            <tfoot>        
                                            </tfoot>
                                            </table>
                                            </div>";
                            }else{

                                    echo "<div class='card-header' style='text-align:center;''>
                                    <h1 class='card-title'>$filiere</h1>
                                    </div>
                                    <br><br>";

                                    echo "<div class='table-responsive'>
                                    <table id='demo-foo-addrow' class='table m-t-30 table-hover no-wrap contact-list' data-paging='true' data-paging-size='7'>
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)1</th>
                                                <th style='padding-left: 3%;'>Etudiant(e)2</th>
                                                <th style='padding-left: 3%;width:120.281px;padding-right: 5%;'>Etudiant(e)3</th>
                                                <th style='display: table-cell;width: 171.9375px; padding-left: 1%;''>Encadrant(e)</th>
                                                <th style='padding-left: 10%;display: table-cell;width: 221.9375px;''>Sujet</th>
                                                <th style='padding-left: 0.5%;display: table-cell;width: 132px;''>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                        $sql=$bdd->prepare('SELECT * FROM trombinoscope WHERE Nom_filiere=?');
                                        $sql->execute(array($filiere));
                                        $Num=1;
                                        while ($row=$sql->fetch()){ 
                                            $Num_groupe=$row[0];

                                            $query=$bdd->prepare("SELECT Sujet FROM affecter_sujet WHERE Num_groupe=?");
                                            $query->execute(array($row[0]));
                                            $sujet1=$query->fetch();

                                            $req1=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req1->execute(array($row[1]));
                                            $etud1_1=$req1->fetch();

                                            $req2=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req2->execute(array($row[2]));
                                            $etud2_1=$req2->fetch();

                                            $req3=$bdd->prepare("SELECT Prenom_etudiant,Nom_etudiant,Image FROM etudiant WHERE CNE=?");
                                            $req3->execute(array($row[3]));
                                            $etud3_1=$req3->fetch();

                                            echo "<tr>";
                                            echo "<td ><h4 style='padding-top: 50%;'>".$Num."</h4></td>";
                                                if ($row[1]!=NULL) {
                                                    if ($row[1]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud1_1[2] alt='etudiant(e)1' class='img-circle' style='width:60px;'/> ".$etud1_1[0]." ".$etud1_1[1]."</a></td>";

                                                    }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'> 
                                                        </td>";
                                                    }
                                                }
                                                if ($row[2]!=NULL && $row[3]!=NULL) {
                                                    if ($row[2]!='  ' && $row[3]!='  '){
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_1[2] alt='etudiant(e)2' class='img-circle' style='width:60px;'/> ".$etud2_1[0]." ".$etud2_1[1]."</a></td>";
                                                       echo "<td style='padding-top: 2.6%;display: table-cell;'><a href='' ><img src=$etud3_1[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_1[0]." ".$etud3_1[1]."</a></td>";

                                                    }else if($row[2]=='  ' && $row[3]!='  '){
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>";
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud3_1[2] alt='etudiant(e)3' class='img-circle' style='width:60px;'/> ".$etud3_1[0]." ".$etud3_1[1]."</a></td>";

                                                    }
                                                    else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>
                                                    <td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                    </td>";}
                                                }elseif ($row[2]!=NULL){
                                                    if ($row[2]!='  ') {
                                                       echo "<td style='padding-top: 2%;display: table-cell;'><a href='' ><img src=$etud2_1[2] alt='etudiant(e)2' class='img-circle' style='width:60px;'/> ".$etud2_1[0]." ".$etud2_1[1]."</a></td>
                                                            <td></td>";

                                                    }else{
                                                        echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                            </td>
                                                            <td></td>";}
                                                }else{
                                                echo "<td></td>
                                                <td></td>";
                                                }


                                                if ($row[5]!=NULL) {
                                                echo "<td style=' padding-top:3%;'><h5>".$row[5]."</h5></td>";

                                                }else{
                                                    echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($sujet1[0]!=NULL) {
                                                echo "<td><h5 style='padding-top: 6%;'>".$sujet1[0]."</h5></td>";
                                                }elseif ($row[5]==$_SESSION['Nom_enseignant']) {
                                                echo "<td style=' padding-top:2%;'><input type='text' class='dataTables_filter' name='sujet' style='width: 256px;'></td>";
                                                }else{
                                                echo "<td style='padding-top: 2.6%;display: table-cell;padding-left: 5.5%;'>
                                                        </td>";
                                                }
                                                if ($row[6]!=NULL) {
                                                if($row[6]==1){
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'><i class='ti-check'></i></h4></td>";
                                                }else{
                                                    echo "<td><h4 style='color:red; text-align:center;padding-top:30%;'><i class='ti-close'></i></h4></td>";
                                                }
                                                }else{
                                                    echo "<td><h4 style='color:green; text-align:center;padding-top:30%;'></h4></td>";
                                                }
                                            echo "</tr>";
                                            $sujet=$_POST['sujet'];
                                            $Num1++;
                                            if (isset($_POST['trombinoscope'])){
                                                if (isset($sujet) && ($row[5]==$_SESSION['Nom_enseignant'])){
                                                $suj=$bdd->prepare("INSERT INTO affecter_sujet(N__SOM,Num_groupe,Sujet) VALUES(?,?,?) ");
                                                $suj->execute(array($SOM,$row[0],$sujet));
                                                }
                                                header('location:AffectationDesSujets_RES.php');
                                            }

                                        }
                                        echo "</tbody>
                                            <tfoot>        
                                            </tfoot>
                                            </table>
                                            </div>";
                                }

                        }
                        $fil->closeCursor();
                    }
                            ?>
                        <br><br><div style="padding-left:48%;">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="trombinoscope">Affecter</button>
                        </div>
                        </form><br><br>

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