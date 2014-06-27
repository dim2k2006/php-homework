<?php
$maxFileSize = 2000000;

if (isset($_POST['MAX_FILE_SIZE'])) {
	//проверяем на ошибки
	$error = error_handler ($_FILES['userfile']['error']);
	
	//если ошибок нет продолжаем процедуру загрузки
	if ($error != "") {
		echo $error;
	} else {
		$postSize = $_POST['MAX_FILE_SIZE'];
		$type = $_FILES['userfile']['type'];
		$uploaddir = 'images/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		$check = size_type_check ($postSize, $maxFileSize, $type, $uploadfile);
		if ($check[0] && $check[1]) {
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				header('Location: '.$_SERVER['PHP_SELF']);
			} else {
				echo "Error during uploading.\n";
			}
		} else {
			echo "Not supported file type or file too big!\n";
		}
	}
}


/**
*Обрабатывает ошибки
*@param int
*@return string
*/
function error_handler ($error) {
	switch ($error) {
		case 0:
			$result = "";
			break;
		case 1:
			$result = "File too bog!";
			break;
		case 2:
			$result = "File too bog!";
			break;
		case 3:
			$result = "File upload error!";
			break;
		case 4:
			$result = "File was not uploaded!";
			break;
	}
	return $result;
}

/**
*Проверяет тип и размер файла
*@param int
*@param int
*@param string
*@param string
*@return array
*/
function size_type_check ($postSize, $maxFileSize, $type, $fileName) {
	$result = array();
	//проверяем размер
	$sizeCheck = ($maxFileSize == $postSize) ? true : false;
	$result[] = $sizeCheck;
	//проверяем тип
	$allowTypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
	$typeCheck = in_array($type, $allowTypes);
	$result[] = $typeCheck;
	return $result;
}


echo <<<END
<form enctype='multipart/form-data' action='' method='POST'>
    <input type='hidden' name='MAX_FILE_SIZE' value='$maxFileSize' />
    Send file: <input name='userfile' type='file' />
    <input type='submit' value='Send File' />
</form>
END;

$fileList =glob("images/*");

foreach ($fileList as $filename) {
   echo "<img src='$filename'><br>";
}