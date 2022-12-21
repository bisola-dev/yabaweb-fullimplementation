<?php 

if (isset($_POST['submit'])){

$targetDir = "imagez/";
$fileName = basename($_FILES["pix"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["pix"]["name"])){


             if ($_FILES["pix"]["size"] > 50000) {

                $reportalert = '<script type="text/javascript">
                alert("Sorry, your file is too large.")</script>';
               
                    }
			}

    // Allow certain file formats
$allowTypes = array('jpg','png','jpeg','gif');
 if (in_array($fileType, $allowTypes)){
       
           
        // Upload file to server
        if(move_uploaded_file($_FILES["pix"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

//$mysql = "UPDATE agents SET agpic = '$fileName' WHERE emal = '$semail'";

		}
	}
}

 ?>