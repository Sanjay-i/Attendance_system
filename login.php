<html>

<head>
    <title>Login</title>
    <link href="css\mystyle.css" rel=" stylesheet" type="text/css" />
    <style>
        .container {
            width: 500px;
            background-color: green;
            padding: 20px;
            margin: auto;
        }

        .heading {
            font-size: 30px;
            text-align: center;
        }

        .login {
            width: 300px;
            margin: auto;
        }

        .login input {
            padding: 10px;
            width: 300px;
        }

        .login button:hover {
            background-color: purple
        }

        .login button {
            padding: 10px 20px;
            font-weight: bold;
            font-size: 20px;
            background-color: black;
            border: 1px solid black;
            color: #fff;
            cursor: pointer;
        }

        .login div {
            margin-bottom: 20px;
        }

        .alinkI {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
        }

        .profile {
            font-size: 20px;
        }

        .check-in-btn,
        .check-out-btn {
            padding: 10px 20px;
            font-weight: bold;
            font-size: 20px;
            background-color: black;
            border: 1px solid black;
            color: #fff;
            cursor: pointer;
        }

        .check-in-btn:hover,
        .check-out-btn:hover {
            background-color: purple;
        }
    </style>

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