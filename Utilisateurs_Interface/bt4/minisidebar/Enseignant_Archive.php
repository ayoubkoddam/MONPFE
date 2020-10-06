<?php
    session_start();
    error_reporting(0);

    include '../../../connection.php';
    $sql=$bdd->prepare("SELECT Sujet_PFE,Encadrant,Nom_filiere,Rapport,Presentation,Annee_univ FROM archive ");
    $sql->execute();
    $count=$sql->rowCount();
    $sql=$bdd->prepare("SELECT Sujet_PFE,Encadrant,Nom_filiere,Rapport,Presentation,Annee_univ FROM archive WHERE Sujet_PFE OR Encadrant LIKE ?");
    $sql->execute(array($_POST['recherche']."%"));
    $count_rech=$sql->rowCount();
    $pourcent=($count_rech/$count)*100;
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
    <title>Archive</title>
    <!-- This page CSS -->
        <!-- Bootstrap responsive table CSS -->
    <link href="../assets/node_modules/tablesaw/dist/tablesaw.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $_SESSION['Image']?>" alt="user" class="" style="width: 40px;border-radius: 50%;">
                             <span class="hidden-md-down"><?= $_SESSION['Prenom_enseignant'] ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="Enseignant_Profil.php" class="dropdown-item"><i class="ti-user"></i> Mon Profile</a>
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
                        <span class="hide-menu"><?= $_SESSION['Nom_enseignant'] .' '.$_SESSION['Prenom_enseignant'] ?></span></a>
                                <ul aria-expanded="false" class="collapse">
                                <li><a href="Enseignant_Profil.php"><i class="ti-user">
                                </i> Mon Profil</a></li>
                                <li><a href="../../../deconnection.php"><i class="fa fa-power-off"></i> Se Déconnecter</a></li>
                            </ul>
                        </li>
                        <li> <a  href="../../../index/accueil_Ens.php" aria-expanded="false">
                            <i class="ti-window"></i><span class="hide-menu">Accueil</span></a>
                        </li>
                        <li> <a href="Enseignant_Archive.php" aria-expanded="false"> 
                            <i class="ti-archive"></i><span class="hide-menu">Archive</span></a>
                        </li>
                        <li class="nav-small-cap">--- ESPACE ENSEIGNANT</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Gestion des PFE</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="AffectationDesSujets_EN.php">Affecter les sujets</a></li>
                                <li><a href="AccorderLesDocuments_EN.php">Valider les rapports et les présentations</a></li>
                            </ul>
                        </li>
                        <li> <a href="TéléchargerAttestation_EN.php" aria-expanded="false">
                             <i class="ti-download"></i> 
                            <span class="hide-menu">Téléchargement d'attestation</span></a>
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
                        <h4 class="text-themecolor">Archive</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Etudiant</a></li>
                                <li class="breadcrumb-item active">Archive</li>
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
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="">
                                <div id="editable-datatable_filter" class="dataTables_filter"><label>Recherche:<input type="search" class="" placeholder="" aria-controls="editable-datatable" name="recherche"></label>
                                </div><br><br><br>
                                <table class="horizontalBar" height="30" width="100%">
                                <tr>
                                    <td width="<?php echo $pourcent."%"; ?>" bgcolor="#6f42c1"><h3 style="text-align: center;padding-top: 1%;"><?php echo $pourcent."%"; ?></h3></td>
                                    <td width="100%" bgcolor="#f5f5fc"></td>
                                    </tr>
                                </table>
                                <table class="tablesaw table-bordered table-hover table no-wrap" data-tablesaw-mode=""
                                    data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap
                                    data-tablesaw-mode-switch>
                                    <thead>
                                        <tr>
                                            <th scope="" data-tablesaw-sortable-col data-tablesaw-priority="" class="" style="text-align: center;">
                                                Sujet</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                                data-tablesaw-priority="3" class="border" style="text-align: center;">Encadrant</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="border" style="text-align: center;">Filière
                                            </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" class="border" style="text-align: center;">
                                                <abbr title="Rotten Tomato Rating">Rapport</abbr>
                                            </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" class="border" style="text-align: center;">Présentation
                                            </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" class="border" style="text-align: center;">Année universitaire
                                            </th>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                        <?php
                        if(empty($_POST['recherche'])){
                            while ($row=$sql->fetch()) {

        
    
                            $rapport='http://localhost/monPFE/Utilisateurs_Interface/bt4/minisidebar/'.$row[3];
                            $presentation='http://localhost/monPFE/Utilisateurs_Interface/bt4/minisidebar/'.$row[4];

        
                            echo "<tr><td style='text-align: center;padding-top:2%;'><h5>".$row[0]."</h5></td>";
                            echo "<td  style='text-align: center;padding-top:2%;'><h5>".$row[1]."</h5></td>";
                            echo "<td style='text-align: center;padding-top:2%;'><h5>".$row[2]."</h5></td>";
                            echo "<td style='padding-top: 1.6%;display: table-cell;text-align:center;'>
                                                    <button type='button' style='background: #6f42c1;color: white; border-radius:18%;font-size: 20px;' name='rapport' onclick='window.location.href=\"$rapport\"'><i class='fa fa-file-pdf-o' style='padding-top: 23%;'></i>
                                                    </button> 
                                                    
                                </td>
                                <td style='padding-top: 1.6%;display: table-cell;text-align:center;'>
                                                    <button type='button' style='background: #6f42c1;color: white; border-radius:18%;font-size: 20px;' name='presentation' onclick='window.location.href=\"$presentation\"'><i class='fa fa-file-powerpoint-o' style='padding-top: 23%;'></i>
                                                    </button> 
                                </td>";
                
                                echo "<td style='text-align: center;padding-top:2%;'><h5>".$row[5]."</h5></td>
                                </tr>";
                            }
                        }
                        else{
                            while ($row=$sql->fetch()) {

        
    
                            $rapport='http://localhost/monPFE/Utilisateurs_Interface/bt4/minisidebar/'.$row[3];
                            $presentation='http://localhost/monPFE/Utilisateurs_Interface/bt4/minisidebar/'.$row[4];

        
                            echo "<tr><td style='text-align: center;padding-top:2%;'><h5>".$row[0]."</h5></td>";
                            echo "<td  style='text-align: center;padding-top:2%;'><h5>".$row[1]."</h5></td>";
                            echo "<td style='text-align: center;padding-top:2%;'><h5>".$row[2]."</h5></td>";
                            echo "<td style='padding-top: 1.6%;display: table-cell;text-align:center;'>
                                                    <button type='button' style='background: #6f42c1;color: white; border-radius:18%;font-size: 20px;' name='rapport' onclick='window.location.href=\"$rapport\"'><i class='fa fa-file-pdf-o' style='padding-top: 23%;'></i>
                                                    </button> 
                                                    
                                </td>
                                <td style='padding-top: 1.6%;display: table-cell;text-align:center;'>
                                                    <button type='button' style='background: #6f42c1;color: white; border-radius:18%;font-size: 20px;' name='presentation' onclick='window.location.href=\"$presentation\"'><i class='fa fa-file-powerpoint-o' style='padding-top: 23%;'></i>
                                                    </button> 
                                </td>";
                
                                echo "<td style='text-align: center;padding-top:2%;'><h5>".$row[5]."</h5></td>
                                </tr>";
                        }
                    }
                    ?>
                                      


                                        <!-- <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)"></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> -->
                                        <!-- <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Titanic</a></td>
                                            <td>2</td>
                                            <td>1997</td>
                                            <td>88%</td>
                                            <td>$2.1B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">The Avengers</a>
                                            </td>
                                            <td>3</td>
                                            <td>2012</td>
                                            <td>92%</td>
                                            <td>$1.5B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Harry Potter and
                                                    the Deathly Hallows—Part 2</a></td>
                                            <td>4</td>
                                            <td>2011</td>
                                            <td>96%</td>
                                            <td>$1.3B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Frozen</a></td>
                                            <td>5</td>
                                            <td>2013</td>
                                            <td>89%</td>
                                            <td>$1.2B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Iron Man 3</a>
                                            </td>
                                            <td>6</td>
                                            <td>2013</td>
                                            <td>78%</td>
                                            <td>$1.2B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Transformers:
                                                    Dark of the Moon</a></td>
                                            <td>7</td>
                                            <td>2011</td>
                                            <td>36%</td>
                                            <td>$1.1B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">The Lord of the
                                                    Rings: The Return of the King</a></td>
                                            <td>8</td>
                                            <td>2003</td>
                                            <td>95%</td>
                                            <td>$1.1B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Skyfall</a></td>
                                            <td>9</td>
                                            <td>2012</td>
                                            <td>92%</td>
                                            <td>$1.1B</td>
                                        </tr>
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">Transformers:
                                                    Age of Extinction</a></td>
                                            <td>10</td>
                                            <td>2014</td>
                                            <td>18%</td>
                                            <td>$1.0B</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                        <!-- Column -->
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
    <!-- jQuery peity -->
    <script src="../assets/node_modules/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="../assets/node_modules/tablesaw/dist/tablesaw-init.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/minisidebar/app-contact-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2019 14:18:06 GMT -->
</html>