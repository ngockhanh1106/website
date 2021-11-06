<?php
include('config/constants.php');
include("check-login.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../image/Logo-be-Thuy_Loi.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <title>Quản trị viên - Hệ thống Quản trị Đại học Trực tuyến</title>
</head>

<body>
    <div class="wrapper">
        <?php
        if (isset($_SESSION['welcome'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['welcome']; //Display the SEssion Message if SEt
            unset($_SESSION['welcome']); //Remove Session Message
        }
        ?>
        <div class="header">
            <div class="container">
                <header class="row justify-content-start">
                    <a href="index.php" class="col-6"><img src="../image/logo_TL.png" class="img-fluid "></a>
                    <div class="header-right col-6 text-end header-meta">
                        <div class="logout">
                            <a href="logout.php" style="color:#2b3f8d;">Đóng phiên làm việc</a>
                            <img src="../image/vi.jpg" alt="">
                            <img src="../image/en.jpg" alt="">
                            <!--<a href="login.php">sign in</a>-->
                        </div>
                        <div class="account dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="../image/no-profile-photo-small.png" alt="" class="img-circle img-fluid ">
                                <span><?= $_SESSION['users'] ?></span>
                            </a>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-navbar" style="padding: 0;">
                    <div class="position-sticky sidebar-left">
                        <ul class="nav flex-column">
                        <li >
                            <img src="../image/md-header-bg.jpg" class="img-fluid" alt="">
                    
                            </li>
                            <li class="bg-hover nav-item ">
                                <a class="nav-link active" aria-current="page" href="index.php">
                                    <i class="fas fa-desktop"></i>
                                    <span></span>
                                    Trang chủ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_course.php">
                                    <i class="fab fa-opencart"></i>
                                    <span></span>
                                    Quản lý khóa học
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="users.php">
                                    <i class="fab fa-opencart"></i>
                                    <span></span>
                                    Quản lý tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="manage_list_student.php">
                                    <i class="fab fa-opencart"></i>
                                    <span></span>
                                    Quản lý danh sách sinh viên đăng ký
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_assignment.php">
                                    <i class="far fa-hand-paper"></i>
                                    <span></span>
                                    Phân công giảng dạy
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_semester.php">
                                    <i class="far fa-hand-paper"></i>
                                    <span></span>
                                    Cập nhật kỳ học
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">
                                    <i class="fas fa-user-alt"></i>
                                    <span></span>
                                    Thông tin cá nhân
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-user-cog"></i>
                                    <span></span>
                                    Cài đặt
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-content-right">
                    <div class=" mt-4 mb-4 ">
                        <div class="mt-4 p-4 bg-white rounded shadow-sm">
