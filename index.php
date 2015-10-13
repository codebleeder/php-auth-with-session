<section>
    <h2> Login </h2>
    <form action="authenticate.php" method="post">
        <p>Username: <input type="text" name="username" /></p>
        <p>Password: <input type="password" name="password" /></p>
        <p>Login!<input type="submit" /></p>
    </form>

</section>
<section>
    <h2> Signup </h2>
    <form action="signup.php" method="post">
        <p>New Username: <input type="text" name="new_username" /></p>
        <p>Email: <input type="email" name="email" /></p>
        <p><input type="radio" name="sex" value="male">Male</br>
        <input type="radio" name="sex" value="female">Female</br>
        <input type="radio" name="sex" value="other">Other</p>
        <p>New Password: <input type="password" name="new_password" /></p>
        <p>Retype New Password: <input type="password" name="retype_new_password" /></p>
        <p><input type="submit" /></p>
    </form>
</section>

<?php
/**
 * Created by PhpStorm.
 * User: sharads
 * Date: 10/10/2015
 * Time: 7:11 AM
 */
session_start();
session_destroy();
echo "hi </br>";
echo " you are logged out, please log in";
?>