<?php
include_once('../connection.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // $password_hash = md5($password);
        // $query_login = "SELECT * FROM admins WHERE email = '$email' and admins_password = '$password_hash'";

        $query_login = "SELECT * FROM admins WHERE email = '$email' and admins_password = '$password'";
        $result_login = mysqli_query($connection, $query_login);

        if (mysqli_num_rows($result_login) > 0) {
            $admin = mysqli_fetch_assoc($result_login);
            setcookie('id', $admin['id'], time() + 24 * 60 * 60, '/');
            setcookie('name', $admin['name'], time() + 24 * 60 * 60, '/');
            setcookie('admins_password', $admin['admins_password'], time() + 24 * 60 * 60, '/');

            header('Location: http://localhost/project_php/dashboard/store.php');
        }
    }
}
?>
