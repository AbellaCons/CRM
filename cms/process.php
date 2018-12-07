<?php

//session_start();

$mysqli = new mysqli('localhost', 'root','', 'crm') or die(mysqli_error($mysqli)); 
$update= false;
$id = '';
$name = '';
$location = '';
$phone ='';
$city ='';
$email ='';
$contact ='';
$attempt ='';
$aitems ='';
$cbdate ='';
$cbtime ='';
$other ='';


//ADD TABLE
if (isset($_POST['save'])){
    $name= $_POST['name'];
    $location= $_POST['location'];
    $phone= $_POST['phone'];
    $city= $_POST['city'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $attempt= $_POST['attempt'];
    $aitems= $_POST['aitems'];
    $cbdate= $_POST['cbdate'];
    $cbtime= $_POST['cbtime'];
    $other= $_POST['other'];
 
   
$mysqli->query("INSERT INTO data(name, location, phone, city, email, contact, attempt, aitems, cbdate, cbtime, other)VALUES ('$name', '$location','$phone','$city','$email','$contact','$attempt','$aitems','$cbdate','$cbtime','$other')" ) or die($mysqli->error);
//ADD MESSAGE
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";

header("location: table.php");

}
//DELETE TABLE
if (isset($_GET['delete'])){
    $id =  $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id='{$id}'")or 
    die($mysqli->error);
//DELETE MESSAGE
$_SESSION['message'] = "Record has been deleted!";
$_SESSION['msg_type'] = "danger";

    header("location: table.php");
}
//EDIT TABLE 
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id='{$id}'")or die($mysqli->error());
    if ($result->num_rows > 0){
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
        $phone=$row['phone'];
        $city=$row['city'];
        $email=$row['email'];
        $contact=$row['contact'];
        $attempt=$row['attempt'];
        $aitems=$row['aitems'];
        $cbdate=$row['cbdate'];
        $cbtime=$row['cbtime'];
        $other=$row['other'];
    }
}
    /*
    var_dump($result->num_rows);
if ($result->num_rows > 0){
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
*/
//UPDATE TABLE
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $attempt = $_POST['attempt'];
    $aitems = $_POST['aitems'];
    $cbdate = $_POST['cbdate'];
    $cbtime = $_POST['cbtime'];
    $other = $_POST['other'];
    
    

    $mysqli->query("UPDATE data SET name='$name',location='$location', phone='$phone', city='$city', email='$email', contact='$contact', attempt='$attempt', aitems='$aitems', cbdate='$cbdate', cbtime='$cbtime', other='$other' WHERE id='{$id}'")
    or die($mysqli->error);

//EDIT MESSAGE
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: table.php');
}