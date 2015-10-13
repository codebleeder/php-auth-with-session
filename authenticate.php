<?php
/**
 * Created by PhpStorm.
 * User: sharads
 * Date: 10/10/2015
 * Time: 7:35 AM
 */
session_start();
if (!isset($_SESSION['username'])) {
    try {
        $db = new PDO("mysql:host=localhost;dbname=logindb","root");
        // $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db -> exec("SET NAMES 'utf-8");

        //echo $results."</br>";
    } catch (Exception $e){
        echo "could not connect to the db </br>";
        exit;
    }

    try {
        $username = $_POST["username"];
        $password = $_POST["password"];
        echo $password."</br>".$username."</br>";
        //$results = $db -> query("SELECT username, password FROM users");
        $record = $db -> prepare("SELECT username, password FROM users where username=:username");
        $record -> bindParam(":username",$username);
        $record -> execute();
        $result = $record -> fetch(PDO::FETCH_ASSOC);
        if ($password == $result["password"]) {
            echo "authentication success! </br>";
            $_SESSION['username'] = $username;
        }
        else {
            echo "username or password is wrong!";
        }
        //echo "our query ran successfully";
    }
    catch(Exception $e) {
        echo "Data could not be retrieved from db";
        exit;
    }
}

echo "session set with session: ".$_SESSION['username']."<br>";
echo "you are logged in!</br>";
echo "<pre>";
//var_dump($result->fetchAll(PDO::FETCH_ASSOC));
//var_dump($result);
?>

<p><a href="index.php">go back to login</a></p>
