<?php
//Class: CS 234
//Author: Joe Devine
//Project: Hotel
//Name: adminsql.php
//Date Created: 4/18/14

//Entities:
//Hotel - A building with many rooms
//Rooms - Holds living quarters
//Members - A person who joins the page

//Relations:
//A Hotel has many Rooms for rent
//A Room is rented by a Member

function connect(){
$host = 'home.cs.siue.edu';
$username = 'jodevin';
$pswd = 'occlhjmj';
$dbName = "jodevin";

$con = new mysqli($host,$username,$pswd,$dbName);

if($con->connect_errno){
die('Could not connect: '. $con->connect_errno);
}
return $con;
}

function showDB($con){
$sql = "SELECT * FROM Hotel";
$result = mysqli_query($con,$sql);
echo "<br />";
echo "Room Number" . " | " . "Room Type" . " | " . "Available?";
echo "<br />";
while($row = mysqli_fetch_array($result))
{
echo $row['cRoomNum'] . "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  			"&nbsp;" . "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  "&nbsp;" . 			 "&nbsp;" . "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  			  "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  "&nbsp;" .  "&nbsp;" . 			   "&nbsp;" .  "&nbsp;" .  
     " | " .
	       "&nbsp;" .  "&nbsp;" .
     $row['cRoomType'] .
	       "&nbsp;" .  "&nbsp;" .
     " | " .
	       "&nbsp;" .  "&nbsp;" . "&nbsp;" .  "&nbsp;" .  "&nbsp;" .                        "&nbsp;" .  "&nbsp;" .
     $row['cAvail'];
echo "<br />";
}
}

function dropTable(){
$con = connect();
$sql = " DROP TABLE Hotel";

if(mysqli_query($con,$sql)){
echo " Table Dropped";
}else{
echo " Failed to Drop";
}
echo "<br />No table to show";
}

function createTable(){
$con = connect();
$sql = " CREATE TABLE Hotel ( cRoomNum INT  PRIMARY KEY, cRoomType VARCHAR(50), cAvail VARCHAR(10))";

if(mysqli_query($con,$sql)){
echo " Table Created";
}else{
echo " Failed to Create";
}
showDB($con);
echo "No data inserted";
}

function insertKing(){
$con = connect();
$sql = "INSERT INTO Hotel (cRoomNum,cRoomType, cAvail) VALUES (1,'King', 'Yes')";

if(mysqli_query($con,$sql)){
echo " King Added";
}else{
echo " Failed to add King";
}
showDB($con);
}
 
function insertQueen(){
$con = connect();
$sql = "INSERT INTO Hotel (cRoomNum,cRoomType, cAvail) VALUES (2,'Queen', 'Yes')";

if(mysqli_query($con,$sql)){
echo " Queen Added";
}else{
echo " Failed to add Queen";
}
showDB($con);
}

function insertDouble(){
$con = connect();
$sql = "INSERT INTO Hotel (cRoomNum,cRoomType, cAvail) VALUES (3,'Double', 'Yes')";


if(mysqli_query($con,$sql)){
echo " Double Added";
}else{
echo " Failed to add Double";
}
showDB($con);
}

function deleteEverything(){
$con = connect();
$sql = "DELETE FROM Hotel";


if(mysqli_query($con,$sql)){
echo " Deleted Everything in Hotel";
}else{
echo " Failed to Delete Everything in Hotel";
}
showDB($con);
echo "All data deleted. Please insert some data";
}

function catalogDB($con){
$sql = "SELECT * FROM Hotel";
$result = mysqli_query($con,$sql);
echo mysqli_error();
echo "<br />";
echo "Room Type";
echo "<br />";
while($row = mysqli_fetch_array($result))
{
echo 
     $row['cRoomType'] . "&nbsp;" . " | ";
echo "<input type='submit' name='button' value='{$row['cRoomType']}'>";
echo "<br />";
}
}


?>

