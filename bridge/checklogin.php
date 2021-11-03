<?php
if(!isset($_SESSION['login_check'])){
    header('location:login.php');
}
