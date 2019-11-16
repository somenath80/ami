<?php

if($_POST['file_name'] != "" && $_POST['upload_path'] != "") {
	
	unlink("../../../uploads/".$_POST['upload_path']."/".$_POST['file_name']);
}

?>