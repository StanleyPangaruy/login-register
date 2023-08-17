<?php
require 'function.php';
if(isset($_SESSION["id"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <script type="text/javascript">
        function submitData() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var action = "login"; // You can set the action here

            var data = new URLSearchParams();
            data.append('username', username);
            data.append('password', password);
            data.append('action', action);

            fetch('function.php', {
                method: 'POST',
                body: data,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.text())
            .then(response => {
                alert(response);
                if (response === "Login Successful") {
                    window.location.reload();
                }
            })
            .catch(error => {
                alert('An error occurred: ' + error);
            });
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <form autocomplete="off" action="" method="post">
        <input type="hidden" id="action" value="login">
        <label for="">Username:</label>
        <input type="text" id="username" value=""> <br>
        <label for="">Password:</label>
        <input type="password" id="password" value=""> <br>
        <button type="button" onclick="submitData();">Login</button>
    </form>
    <br>
    <span>No account yet? </span><a href="register.php">Register here</a>
</body>
</html>