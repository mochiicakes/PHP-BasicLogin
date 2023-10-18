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
        <div class='Admin_adduser'>
            <h1>Add User</h1>
            <form method="POST">
            <a class="align_right" href="Admin_home.php">Back</a><br>
            <p>Fill-Up Form</p>
            <label>First Name</label><input type="text" name="first_name"><br>
            <label>Middle  Name</label><input type="text" name="middle_name"><br>
            <label>Last  Name</label><input type="text" name="last_name"><br>
            <label>Username</label><input type="text" name="username"><br>
            <label>Password</label><input type="text" name="password"><br>
            <label>Confirm Password</label><input type="text" name="confirm_pass"><br>
            <label>Birthay</label><input type="text" name="birthday"><br>
            <label>Email</label><input type="text" name="email"><br>
            <label>Contact Number</label><input type="text" name="contact_num"><br>
            <label>Access Level</label><input type="text" name="access_level"><br>
            <label>Status</label><input type="text" name="status"><br><br>
            <input class="submit" type="submit" name="submit">
            <br>
            <?php
            if (isset($_POST['submit'])){
                if ($_POST['password'] != $_POST['confirm_pass']){
                    echo "password and confirm password are not the same.";
                }
                else{
                    $user_first = $_POST['first_name'];
                    $user_middle= $_POST['middle_name'];
                    $user_last= $_POST['last_name'];
                    $user_username= $_POST['username'];
                    $user_pass= $_POST['password'];
                    $user_birth= $_POST['birthday'];
                    $user_email= $_POST['email'];
                    $user_contact= $_POST['contact_num'];
                    $user_access= $_POST['access_level'];
                    $user_status= $_POST['status'];

                    $sql = "INSERT INTO user (first_name, middle_name, last_name, contact_num,
                    email, birthday, username, access_level, status, password) VALUES
                    ('$user_first', '$user_middle', '$user_last', '$user_contact', '$user_email', '$user_birth', 
                    '$user_username', '$user_access', '$user_status', '$user_pass');";
                    $result = mysqli_query($conn,$sql);
                    mysqli_close($conn);
                }
                
            }
            ?>
            </form>
        </div>
    </body>
</html>