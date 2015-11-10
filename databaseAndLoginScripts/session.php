<!--Author Name: Joe Devine-->
<!--File Name: Sessions.php-->
<!--File Created: 3/26/2014-->
<!--This file is what checks the database to see if the user enters in their password/username correctly and then logs them in and sends them to the catalog. It also logs out a Member.-->

<?php
session_start();
include 'adminsql.php';

if($_POST['Logout'] == true)
{
	session_destroy();
header( 'Location:  http://home.cs.siue.edu/~jodevin/project/');
}

$con = connect();
$sql = "SELECT user_name,password_hash FROM Users where user_name = '{$_POST['username']}';";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
echo $row['user_name'] . "<br>";
echo $row['password_hash'] . "<br>";
$hash = $row['password_hash'];
echo $hash;
}

if(password_verify($_POST['pass'], $hash)){
$n = $_POST['username'];
$_SESSION['username'] = $n;
header( 'Location: http://home.cs.siue.edu/~jodevin/project/catalog.php');
}
else{
echo " <script>
alert('The Username or Password is incorrect. Please try again.');
window.location.href='../signin.php';
 </script>";

}



?>
