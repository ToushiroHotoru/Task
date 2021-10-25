<?php

Class Pagination
{
	private $URL = "";

	public function __construct()
	{
		$this->URL = $_GET;
	}

	public function current_page_number()
	{
		$page = isset($this->URL['page']) ? (int)$this->URL['page'] : 1;
		return $page;
	}

	public function generate_link($number)
	{
		$url = isset($this->URL['url']) ? $this->URL['url'] : "";
		
		$num = 0;
		foreach ($this->URL as $key => $value) {
			# code...
			$num++;
			if($num == 1)
			{
 				$url .= "?";
 				if($key != "url")
				{
 					$url .= $key . "=" . $value;
					
				}
				continue;
			}

			if($key == "url")
			{
				continue;
			}

			if($key == "page")
			{
				$url .= "&" . $key . "=" . $number;
				continue;
			}
  
			$url .= "&" . $key . "=" . $value;
		}

		if(!strstr($url, "page=")){
			return ROOT . $url . "page=" . $number;
		}
		return ROOT . $url;
	}

	public function max_page_home()
    {
	
		$query = "SELECT * FROM games";

        $DB = new Database();
        $data = $DB->read($query);

        if(is_array($data))
        {
            $max_page = ceil(count($data) / 10);
            return $max_page;
        }
        return false;
    }

	public function max_page_favorites()
	{
		$arr['user_id'] = $_SESSION['user_id'];
		$query = "SELECT * FROM favorites WHERE user_id = :user_id";

		$DB = new Database();
        $data = $DB->read($query, $arr);

        if(is_array($data))
        {
			$max_page = ceil(count($data) / 10);
            return $max_page;
        }
        return false;
	}

}