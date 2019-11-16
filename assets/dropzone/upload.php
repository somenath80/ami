<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password);
mysql_select_db("nhpspk",$dbhandle);


$ds = DIRECTORY_SEPARATOR;  //1

if($_POST['upload_path'] != "") {
	
	$storeFolder = '../../'.$_POST['upload_path'].'/';   //2

	$id = $_POST['id'];
	$modetype = $_POST['modetype'];
	
}
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    if($modetype == "stdntcampus"){
    	$sql = mysql_query("INSERT INTO nh_campusfacilities_option SET campusfacilities_id = '".$id."',thumb_image = '".$_FILES['file']['name']."'");
    }elseif($modetype == "event"){
    	$sql = mysql_query("INSERT INTO nh_event_option SET event_id = '".$id."',event_image = '".$_FILES['file']['name']."'");
    }

    move_uploaded_file($tempFile,$targetFile); //6
     
}

// - See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.ZpnBuj7o.dpuf
?>