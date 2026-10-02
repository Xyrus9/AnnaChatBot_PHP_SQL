<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href=""/>
</head>
<style>
body {
    background: #3e4144;
}
.form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background: white;
}
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h3 {
    font-weight: normal;
    text-align: center;
}
</style>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `user` (username, password, email, create_datetime)
                     VALUES ('$username', '$password', '$email','$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<script>
                    alert('You are registered Successfully!!');
                    window.location.href='login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Required Fields are missing!!');
                    window.location.href='registration.php';
                </script>";
        }
    } else {
?>
    <form class="form" action="" method="post">
    <h1 class="login-title" style="color:darkred;">Anna English Practice Chatbot</h1>
		<h2 class="login-title">Registration</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password" autocomplete="off">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Login Here</a></p>
    </form>
<?php
    }
?>
</body>
</html>