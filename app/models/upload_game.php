<?php

Class Upload_game
{

	function upload($POST,$FILES)
	{
		$DB = new Database();
		$_SESSION['error'] = ""; 

		$allowed[] = "image/jpeg";
		$allowed[] = "image/png";

		if(isset($POST['title']) && isset($FILES['file']))
		{
			//upload file
			if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
			{


			 	$folder = "assets/img/";
			 	if(!file_exists($folder))
			 	{
			 		mkdir($folder,0777,true);

			 	}

			 	$destination = $folder . $FILES['file']['name'];

				move_uploaded_file($FILES['file']['tmp_name'], $destination);

			}else{
				$_SESSION['error'] = "This file could not be uploaded";
			}

			if(empty($_SESSION['error']))
			{

				//save to db
				$arr['title'] = $POST['title'];
				$arr['body'] = $POST['description'];
				$arr['preview'] = $destination;
				
				$arr['url_address'] = get_random_string_max(60);
				$arr['created_at'] = date("Y-m-d H:i:s");

				$query = "INSERT INTO games (title,body,url_address,created_at,preview) VALUES (:title,:body,:url_address,:created_at,:preview)";
				$data = $DB->write($query,$arr);
				if($data)
				{
					header("Location:". ROOT . "home");
					die;
				}
			}

		
		}
	}

}