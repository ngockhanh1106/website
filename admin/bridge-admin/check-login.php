<?php
if(!isset($_SESSION['login-check'])){
    header('location:login.php');
}
