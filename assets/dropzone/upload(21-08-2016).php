<?php
$ds = DIRECTORY_SEPARATOR;  //1

if($_POST['upload_path'] != "") {
	$storemainFolder = '../../../uploads/'.$_POST['upload_main_path'].'/';
	$storeFolder = '../../../uploads/'.$_POST['upload_path'].'/';   //2
		
	if (!file_exists($storemainFolder)) {
	  //mkdir($storemainFolder);
	  mkdir($storemainFolder, 0777, true);
	}
	if (!file_exists($storeFolder)) {
	  //mkdir($storeFolder);
	  mkdir($storeFolder, 0777, true);
	}
	
}
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}

// - See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.ZpnBuj7o.dpuf
?>