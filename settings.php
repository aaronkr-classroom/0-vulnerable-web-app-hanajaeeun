<?php 
include("config.php");
session_start();

header("X-Frame-Opt ions:DENY"); //Clickjacking 방지

//get username of logged in user
$check = mysqli_real_escape_string($db, $_SESSION['login_user']);
if($check==NULL)
{
	header("Location: /index.php");
}

$sql="select username , email, gender from register where username='$check'";
$result=mysqli_query($db, $sql) or die('Error querying database.');

//fetch values from database
 if($row = mysqli_fetch_array($result)) {
	$a=$row['username'];
}
?>

<html>
	<body>
		<h1>Welcome <?php echo htmlentities($a); ?></h1>

		<center>
			<h2>Profile setting</h2>		
			<form action="Profileupdate.php" method="POST" >
				Username : <input type="text" name="username" disabled="" value="<?php echo $a; ?>"/> </br>
				Email : <input type="email" name="email" value="<?php echo htmlentities($row["email"]); ?>"></br>
				Gender : <input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female </br>

				<!--CSRF 방지-->
				<input type="hidden" name = "csrf_token' value=<?php echo htmlentities ($_SESSION['csrf']); ?>" ></br>
				<input type="submit" name="update" value="update">
			</form>

			</br>
			<h2> Change password </h2>
			<form action="changepasswd.php" method="POST">
				Username : <input type="hidden" name="username"  value="<?php echo htmlentities( $a );?>" </br>
				Old Password : <input type="text" name="oldpasswd" value="" > </br>
				New Password : <input type="text" name="newpasswd" value="" > </br>

				<!--CSRF 방지-->
				<input type="hidden" name = "csrf_token' value=<?php echo htmlentities ($_SESSION['csrf']); ?>" ></br>
				<input type="submit" name="update" value="update">

			</br>
			<h2> Delete account </h2>
            <form action="deleteaccount.php" method="POST">
				Username : <input type="hidden" name="usdername"  value="<?php echo htmlentities($a) ;?>" </br>
				Old Password : <input type="text" name="oldpasswd" value="" > </br>
				
				<!--CSRF 방지-->
				<input type="hidden" name = "csrf_token' value=<?php echo htmlentities ($_SESSION['csrf']); ?>" ></br>
				<input type="submit" name="update" value="Delete">
			</form>

			<h2> Ping website </h2>
			<form action="pingurl.php" method="POST">
				Enter Url : <input text="text" name="url" value=""></br>
				
				<!--CSRF 방지-->
				<input type="hidden" name = "csrf_token' value=<?php echo htmlentities ($_SESSION['csrf']); ?>" ></br>
				<input type="submit" name="update" value="ping">
			</form>
			</br>


			</br>
			<h2 > Terms of Service </h2>
			<a href="tos.php?file=service" >Click here </a>

			</br>
			</br>
			</br>

			<a href="logout.php" >Logout</a>
		</center>

	</body>
</html>
