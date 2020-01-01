<?php
    session_start();
    $_SESSION['jazyk'] = $_POST['jazyk'];
    $message = "wrong answer";
    echo "<script type='text/javascript'>alert('$message');</script>";
?>