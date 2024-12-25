<?php 

include 'config.php';

function str_openssl_dec($str, $iv){
	$key='progga1234567890#%$%$#$%$';
	$chiper="AES-128-CTR";
	$options=0;
	$str=openssl_decrypt($str, $chiper, $key, $options, $iv);
	return $str;
  
  }

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$user = $_POST['user'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {

		// $iv=hex2bin($row['iv']);
		// $user= str_openssl_dec($row['user'], $iv);

		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['id'] = $row['id'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! user or Password is Wrong.')</script>";
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
<body  style="background-image: url('images/login.jpg');">
	<div class="container">
		<form action="" method="POST" class="login-user" >
			<p class="login-text" style="font-size: 2rem; font-weight: 800; ">Login</p>
			<div class="input-group">
			<input style="background-color:#e8f0fe ;" type="text" name="user" placeholder="Username" value="<?php echo $user; ?>" required>
			</div>
			<div class="input-group">
				<input style="background-color:#e8f0fe ;"  type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text" style="color:black ; text-align:center;">Don't have an account? <a href="register.php" style="color:#00008B ;">Register Here</a>.</p>
		</form>

	</div>
</body>
</html>