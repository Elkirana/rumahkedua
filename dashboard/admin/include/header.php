<?php
    include '../../sys/core.php';
    session_start();
    if (!isset($_SESSION['user'])) {
      echo '<script language="javascript">document.location="../../";</script>';
    }else{
        $id_user = $_SESSION['user'];
        $sql_user = "SELECT * FROM tbl_user WHERE id ='$id_user' ";
        $run_query = $db->query($sql_user);
        $data_user = mysqli_fetch_assoc($run_query);
        $name = $data_user['nama_lengkap'];
        $picture = '';
        $status_login = 1;
        if (strlen($data_user['username'])>=7) {
            $username =  substr($data_user['username'], 0, 6)."...";
        }else{
            $username =  $data_user['username'];
        }
        if (deurl($data_user['image'])=='P') {
            $image = 'ce.png';
        }elseif (deurl($data_user['image'])=='L') {
            $image = 'co.png';
        }else{
            $image = 'admin.png';
        }
        if ($data_user['status_user']=='admin') {
            echo '';
        }elseif ($data_user['status_user']=='psikolog') {
            echo '<script language="javascript">document.location="../psikolog";</script>';
        }else{
            echo '<script language="javascript">document.location="../../";</script>';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="../assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/datatables.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/plugins/fancybox/jquery.fancybox.min.css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="../assets/js/jquery.min.js"></script>
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="./" class="logo">
                    <img alt="Logo" src="../assets/images/logo.png" />
                    <span>Panel admin</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="users.html#" aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/avatars/<?php echo $image; ?>" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>Hello, <?php echo $username ?></small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="../../logout.php" class="dropdown-item notify-item">
                                <i class="fas fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        
        <!-- Left Sidebar -->
        <div class="left main-sidebar">

            <div class="sidebar-inner leftscroll">

                <div id="sidebar-menu">

                    <ul>

                        <li class="submenu">
                            <a href="./">
                                <i class="fas fa-bars"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a id="tables" href="#">
                                <i class="fas fa-table"></i>
                                <span> Artikel </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="artikel.php">Artikel Manager</a>
                                </li>
                                <li>
                                    <a href="slider.php">Slider Manager</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a id="tables" href="#">
                                <i class="fas fa-users"></i>
                                <span> Data User </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="datauser.php?status=admin">Data Admin</a>
                                </li>
                                <li>
                                    <a href="datauser.php?status=psikolog">Data Psikolog</a>
                                </li>
                                <li>
                                    <a href="datauser.php?status=user">Data User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="clearfix"></div>

            </div>

            <!-- End Navigation -->
        </div>
        <!-- End Sidebar -->