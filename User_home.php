<?php
     session_start();
?>
<!DOCTYPE HTML>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sa4_db";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="top">
                <h1>My information</h1>
                <a class="align_right" href="logout.php">Logout</a><br>
            </div>
            <div class="left">
                <?php
                    $login_user = $_SESSION['user_username'];
                    $sql = "SELECT * FROM user  WHERE username = '$login_user';";
                    $result = mysqli_query($conn,$sql);
                    $resultcheck = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<b>Welcome</b> ".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."<br>";
                        echo "<b>Birthday:</b> ".$row['birthday']."<br>";
                        echo "<b>Contact</b> Details <br>";
                        echo "<b>Email:</b> ".$row['email']."<br>";
                        echo "<b>Contact:</b> ".$row['contact_num']."<br>";
                }
                ?>
            </div>
            
            <div class="right">right

            </div>
            <div class="middle">
                <hr>
                <div class="middle_link"><a href="Admin_image.php">Upload Image</a><a href="Admin_changepass.php">Reset my password</a></div>
                <hr>
            </div>
        </div>
    </body>
</html>