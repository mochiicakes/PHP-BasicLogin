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

            <div class="bottom">
                <h1>-Records-</h1>
                <a href="Admin_adduser.php">Add New User</a>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Username</th>
                        <th>Access level</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM user;";
                        $result = mysqli_query($conn,$sql);
                        $resultcheck = mysqli_num_rows($result);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <th><?php echo $row['id']; ?></th>
                        <th><?php echo $row['first_name']; ?></th>
                        <th><?php echo $row['middle_name']; ?></th>
                        <th><?php echo $row['last_name']; ?></th>
                        <th><?php echo $row['contact_num']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['birthday']; ?></th>
                        <th><?php echo $row['username']; ?></th>
                        <th><?php echo $row['access_level']; ?></th>
                        <th><?php echo $row['status']; ?></th>
                    </tr>
                    <?php } ?> 
                </table>  
            </div>
        </div>
    </body>
</html>