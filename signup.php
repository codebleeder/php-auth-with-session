<?php
/**
 * Created by PhpStorm.
 * User: sharads
 * Date: 10/10/2015
 * Time: 7:35 AM
 */
session_start();
try {
    $db = new PDO("mysql:host=localhost;dbname=logindb","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($db);
    $new_username = $_POST['new_username'];
    $new_email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $new_gender = $_POST['sex'];
    $stmt = $db->prepare("INSERT INTO users (username, email, password, gender) VALUES (:username, :email, :password, :gender)");
    $stmt->bindParam(':username', $new_username, PDO::PARAM_STR, 100);
    $stmt->bindParam(':email', $new_email, PDO::PARAM_STR, 100);
    $stmt->bindParam(':password', $new_password, PDO::PARAM_STR, 100);
    $stmt->bindParam(':gender', $new_gender, PDO::PARAM_STR, 100);
    if($stmt->execute()){
        echo "1 row has been inserted";
        $_SESSION['username'] == $new_username;
        header("location: index.php");
    }
    //$db = null;
} catch (Exception $e){
    echo "could not connect to the db </br>";
    exit;
}
echo "hi ".$_POST['new_username']."</br>";
echo " your email is:  ".$_POST['email'];
echo " your password is:  ".$_POST['new_password'];
echo " your gender is:  ".$_POST['sex'];
?>

<p><a href="index.php">go back to login</a></p>
