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
        <div class='User_change'>
            <div class="top">
                <h1>My Information</h1>
                <a class="align_right" href="User_home.php">Back</a>
                <br>
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
                <h1>-PASSWORD RESET-</h1>
            </div>
            <form action="" method="POST">
                <br>
                <label>Enter Current Password:</label><input type="text" name="current">
                <br>
                <label>Enter New Password:</label><input type="text" name="new">
                <br>
                <label>Re-Enter New Password:</label><input type="text" name="renew">
                <br><br>
                <input class="submit" type="submit" name="submit" value="Reset Password">
                <?php
                    $login_user = $_SESSION['user_username'];
                    if (isset($_POST['submit'])){
                        $renew = $_POST['renew'];
                        $login_user = $_SESSION['user_username'];

                        $sql = "SELECT password FROM user  WHERE username = '$login_user';";
                        $result = mysqli_query($conn,$sql);
                        $resultcheck = mysqli_num_rows($result);
                        while($row = mysqli_fetch_assoc($result)){
                            $current_pass = $row['password'];
                        }
                        if($_POST['current'] == $current_pass){
                            if ($_POST['new'] == $_POST['renew']){
                                $sql = "UPDATE user SET password='$renew' WHERE username='$login_user';";
                                $result = mysqli_query($conn,$sql);
                                mysqli_close($conn);
                            }
                            else{
                                echo "\nCredentials does not match";
                            }
                        }
                        else{
                            echo "Failed";
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>