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
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mnumber = $_POST['mobile_number'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM tabb WHERE mobile_number = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $mnumber);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $hashed_password = $user['password'];

            if (password_verify($password, $hashed_password)) {
                // Regenerate session ID upon successful login for security
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['user_id']; // Assuming 'user_id' is the unique identifier for the user
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('User with provided mobile number does not exist.');</script>";
        }
    } else {
        echo "<script>alert('Error: Login failed.');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

