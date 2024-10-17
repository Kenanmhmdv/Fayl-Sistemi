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


    <form method="POST" action="login.php">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Göndər">
    </form>



    <?php

    session_start();

    $file = 'user.csv';
    $users = [];

    if (($handle = fopen($file, 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $users[] = [
                'username' => $data[0],
                'email' => $data[1],
                'password' => $data[2],
            ];
        }
        fclose($handle);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usernameInput = trim($_POST["username"]);
            $passwordInput = trim($_POST["password"]);
            $istifadeciTapildi = false;


          
            foreach ($users as $user) {
                if ($user["username"] === $usernameInput){
                    $istifadeciTapildi = true;

                    if (password_verify($passwordInput, $user["password"])) {


                        $_SESSION['username'] = $user['username'];
                        header("location:admin.php");
                    } else {
                        echo "yalnis sifre";
                    }
                }



                
            }
        }
    }



    if (!$istifadeciTapildi) {
        trigger_error('İstifadəçi tapılmadı', E_USER_WARNING);
    }


    echo $_SESSION['username'] ?? 'NULL';
    ?>




















    <?php include './partialse/footer.php' ?>

</body>

</html>