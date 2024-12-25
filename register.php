<?php 


include 'config.php';

error_reporting(0);
function str_openssl_enc($str, $iv){
   $key='progga1234567890#%$%$#$%$';
   $chiper="AES-128-CTR";
   $options=0;
   $str=openssl_encrypt($str, $chiper, $key, $options, $iv);
   return $str;

}
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$iv=openssl_random_pseudo_bytes(16);

	$username = $_POST['username'];
	$email = $_POST['email'];
    
	$email=str_openssl_enc($email, $iv);

	$iv=bin2hex($iv);


	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);



	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password,iv)
					VALUES ('$username', '$email', '$password', '$iv')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Protibaad</title>
</head>

<body  style="background-image: url('images/reg.jpg');">
	<div class="container" style="margin-left:150px ;">
		<form action="" method="POST" class="login-email login-user">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input style="background-color:#e8f0fe ;" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input style="background-color:#e8f0fe ;" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input style="background-color:#e8f0fe ;" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input style="background-color:#e8f0fe ;" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text" style="color:black ; text-align:center;">Have an account? <a href="index.php" style="color: #00008B;">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>