<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <style>
        body {
            background-color: blueviolet;
        }
    </style>
</head>

<body>
    <div id="form">
        <h1>Login Form</h1>
        <form action="dashboard.php" name="form" method="POST">
            <label>Username</label>
            <input type="text" id="user" name="name"></br></br>
            <label>UserEmail</label>
            <input type="email" id="email" name="email"></br></br>
            <label>Password</label>
            <input type="password" id="pass" name="pass"></br></br>
            <label>MobileNum</label>
            <input type="number" id="num" name="num"></br></br>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
    </div>
</body>

</html>