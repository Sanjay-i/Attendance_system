<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        body {
            background-color: blueviolet;
        }

        #form {
            background-color: white;
            width: 25%;
            margin: 120px auto;
            padding: 50px;
            box-shadow: 10px 10px 5px rgb(82, 11, 77);
            border-radius: 6px;
        }

        #btn {
            color: white;
            background-color: rgb(105, 15, 190);
            padding: 10px;
            font-size: large;
            border-radius: 10px;
        }

        @media screen and (max-width: 700px) {
            #form {
                width: 65%;
                padding: 40px;
            }
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