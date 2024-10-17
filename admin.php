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

    <?php
   

   
    if (!isset($_SESSION['username'])) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                session_start();
                $_SESSION[] = [];
                session_destroy();
                header("Location:login.php");
            }
     
        
    }
    
    ?>
    
  
   
 
    <h2>Xoş gəlmisiniz, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Bu admin panelidir.</p>





    <!-- // session_start();
    // echo "WELCOME";
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     session_start();
    //     $_SESSION[] = [];
    //     session_destroy();
    //     header("Location:login.php");
    // }
    ?> -->
    <form action="admin.php" method="POST">
        <button>Logout</button>

    </form>

    <?php include './partialse/footer.php' ?>

</body>

</html>