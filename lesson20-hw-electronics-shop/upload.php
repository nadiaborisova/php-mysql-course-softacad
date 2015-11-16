<?php 
include('templates/header.php'); 
include('templates/menu.php'); 
include('db/model.php'); 

if(isset($_SESSION['login_user'])) {
?>
	<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
<?php
}
var_dump($_POST);
var_dump($_FILES);

		$fileToInsert = dirname(__FILE__)."\\dataToImport\\computers.txt";
		var_dump($fileToInsert);
		$addProdFromFile = new Model();
		$addProdFromFile ->	addProductFromFile($fileToInsert);
		var_dump($addProdFromFile);
/*$target_dir = "dataToImport\\";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
var_dump($target_file);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
	
    if ($_FILES["fileToUpload"]["size"] > 50000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($fileType != "txt") {
    echo "Sorry, only TXT files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$products = $_POST['products'];
		//$fileToInsert = dirname(__FILE__)."\\".$target_file;
		var_dump($fileToInsert);
		$addProdFromFile = new Model();
		$addProdFromFile ->	addProductFromFile($fileToInsert);
		var_dump($addProdFromFile);
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
echo "<br/><br/>The products are added. Thank you!"?><br/>
<a href="admin.php">Back to Admin panel</a><br/><br/>
<?php*/
include('templates/footer.php'); 
?>