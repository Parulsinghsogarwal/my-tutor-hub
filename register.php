<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="register.php" method="POST">
            <div class="title">
                Sign Up
            </div>
            <div class="form">
                <div class="A">
                    <label>Name</label>
                    <input type="text" class="input" name="name" required>
                </div>
                <div class="A">
                    <label>Mobile Number
                    </label>
                    <input type="text" class="input" name="mnumber" required>
                </div>
                <div class="A">
                    <label> Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <!-- <div class="A">
                <label>Confirm Password</label>
                <input type="password" class="input" name="cpassword"  required>
            </div>
            <div class="A">
                <label>OTP</label>
                <input type="text" class="input" name="otp"  required>
            </div> -->
                <div class="A">
                    <input type="submit" value="Sign Up" class="btn" name="btn">
                </div>
                <P>If already register? <a href="login.php">Login Here</a></P>



            </div>

        </form>
    </div>
</body>

</html>
<?php
include("connection.php");
session_start(); // Start the session

// Check if the user is already logged in, redirect if logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $mnumber = $_POST['mnumber'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the query using prepared statements to prevent SQL injection
    $query = "INSERT INTO tabb (name, mobile_number, password) VALUES (?, ?, ?)";

    // Prepare and bind the statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $mnumber, $hashed_password);

    try {
        // Attempt to execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Data stored in the database";
            header("Location: login.php");
            exit;
        } else {
            echo "Failed";
        }
    } catch (mysqli_sql_exception $e) {
        // Check for duplicate entry error code (1062 for MySQL)
        if ($e->getCode() === 1062) {
            // Duplicate entry error code (1062)
            // Display an alert or error message to the user
            echo "<script>alert('This mobile number is already registered. Please use a different number.');</script>";
        } else {
            // Other database-related errors
            echo "Error: " . $e->getMessage();
        }
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>