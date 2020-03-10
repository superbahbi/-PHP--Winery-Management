<?php
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
    } else {
        $email = mysqli_real_escape_string($db->connection(),stripslashes($_POST['email']));
        $password = mysqli_real_escape_string($db->connection(),stripslashes($_POST['password']));
        $result = $db->get_all_data("user", "password='".$password."' AND email='".$email."'");
        $user = $result->fetch_assoc();
        if ($user['email']) {
            $_SESSION['login_user']=$email;
            redirect("/lot");
        } else {
            $error = "Email or Password is invalid2";
        }
    }
}
?>