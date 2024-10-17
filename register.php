<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <?php include './partialse/header.php' ?>



    <form method="POST" action="register.php">
        <input type="text" placeholder="username" name="username">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Göndər">
    </form>

    <?php
    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = trim(htmlspecialchars($_POST["username"]));
        $email = trim(htmlspecialchars($_POST["email"]));
        $password = trim(htmlspecialchars($_POST["password"]));

        if (empty($username) || empty($email) || empty($password)) {

            trigger_error("All inputs are required", E_USER_ERROR);
        }

        $users = $_COOKIE['users'] ? json_decode($_COOKIE['users'], true) : [];

        $users[] = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),


        ];

        setcookie("users", json_encode($users), time() + 3600, "/");

        header("Location:login.php");
    }

    $file = 'user.csv';

    $handle = fopen($file, 'w');

    fputcsv($handle, ['Username', 'Email', 'Password']);

    foreach ($users as $user) {
        fputcsv($handle, $user);
    };

    fclose($handle);







    ?>


    <?php include './partialse/footer.php' ?>

</body>

</html>