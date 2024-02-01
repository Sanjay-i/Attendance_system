<html>

<head>
    <title>Login</title>
    <link href="css\mystyle.css" rel=" stylesheet" type="text/css" />


</head>

<body>
    <div class="container">
        <form action="dashboard.php" onsubmit="return Checkuserexist();">
            <div class="login">
                <div class="heading">Login</div>
                <div><input type="email" id="useremail" name="username" placeholder="Email" autocomplete="off" required="" /></div>
                <div><input type="password" id="userpassword" name="userpassword" placeholder="Password" autocomplete="off" required="" /></div>
                <div><button name="login" id="login">Login</button></div>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.6.0. min.js" type="text/javascript"></script>
    <script src="js/myscript.js" type="text/javascript"></script>
</body>

</html>