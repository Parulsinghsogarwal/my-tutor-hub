<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .signup {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;



        }

        a {
            text-decoration: none;
        }

        .forgetpass {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            margin: 3px 2px;


        }

        a {
            text-decoration: none;
            color: blue;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <form action="login.php" method="POST">
            <div class="title">
                login
            </div>
            <div class="form">

                <div class="A">
                    <label>Mobile Number
                    </label>
                    <input type="text" class="input" name="mobile_number" required>
                </div>
                <div class="A">
                    <label> Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <div class="forgetpass"> <a href="#">Forget Password?</a> </div>

                <div class="A">
                    <input type="submit" value="Login" class="btn" name="up">
                </div>

                <div class="signup"> New member ?<a href="register.php" class="link"> SignUp Here </a>

                </div>
            </div>

        </form>
    </div>
</body>

</html>

<?php
include("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mnumber = $_POST['mobile_number'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tabb WHERE mobile_number ='$mnumber'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $hashed_password = $user['password'];

            if (password_verify($password, $hashed_password)) {
                // Successful login - Set session variable and redirect
                $_SESSION['user_id'] = $user['user_id']; // Assuming 'user_id' is the unique identifier for the user in the database
                header("Location: index.php");
                exit();
            } else {
                // Incorrect password - Display alert
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            // User with provided mobile number does not exist - Display alert
            echo "<script>alert('User with provided mobile number does not exist.');</script>";
        }
    } else {
        // Query execution error - Display alert
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

</body>
</html>