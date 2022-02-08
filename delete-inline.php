<?php


    if(isset($_GET['id'])){    
        $id = $_GET['id'];
        require_once "config.php";

        $sql = "DELETE FROM students WHERE sid = '$id'";
        $result = mysqli_query( $conn, $sql);
        header('location:index.php');
    }else{
        header('location:index.php');
    }



    if(isset($_POST['deletebtn'])){

        if(isset($_POST['sid'])){    
            $id = $_POST['sid'];
            require_once "config.php";

            $sql = "DELETE FROM students WHERE sid = '$id'";
            $result = mysqli_query( $conn, $sql);
            header('location:index.php');
        }else{
            header('location:index.php');
        }

    }else{
        header('location: index.php');
    }