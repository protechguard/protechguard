<?php
require "database.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $_POST['email'], $_POST['password'])) {
            echo "Login Success";
            header("Location: http://localhost/index.html");
        } else header("Location: http://localhost/signin.php?login=failed");
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>