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
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="login">
            <h1>Log-in form</h1>
            <?php
            if (isset($_POST['submit'])){
                $login_user = $_SESSION['user_username'];
                $sql = "SELECT status FROM user WHERE username='$login_user';";
                $result = mysqli_query($conn,$sql);
                $resultcheck = mysqli_num_rows($result);
                $flag=false;
                while($row = mysqli_fetch_assoc($result)){
                    if ($row['status'] == "active"){
                        $flag=true;
                        break;
                    }
                    else{
                        $flag=false;
                        echo "<b>This account is disabled, pleace contact the administrator</b>";
                    }
                }
            }
            ?>
            <form class = "log_in"method = "POST">
                <label>Username</label><br><input type="text" name="username">
                <br>
                <label>Password</label><br><input type="text" name="password">
                <br><br>
                <input class="submit" type="submit" name="submit" placeholder="Submit">

                <?php
                    if (isset($_POST['submit'])){
                        $sql = "SELECT username, password, access_level, status FROM user;";
                        $result = mysqli_query($conn,$sql);
                        $resultcheck = mysqli_num_rows($result);
                        $flag=false;
                        while($row = mysqli_fetch_assoc($result)){
                            if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password'] ){
                                $flag=true;
                                break;
                            }
                            else{
                                $flag=false;
                            }
                        }
                        if ($flag==true){
                            $_SESSION['user_username'] = $_POST['username'];
                            if ($row["status"] == "active"){
                                if($row['access_level'] == "admin"){
                                    header("Location: Admin_home.php");
                                }
                                else{
                                    header("Location: User_home.php");
                                }
                            }
                            
                        }
                        else{
                            echo "\nCredentials does not match";
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>