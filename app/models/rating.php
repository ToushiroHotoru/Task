<?php

class Rating
{
    public function rate($POST)
    {
        $query = "INSERT INTO rating(game_id, user_id, rating) VALUES (:game_id, :user_id, :rating)";

        $arr['game_id'] = $POST['game_id'];
        $arr['user_id'] = $_SESSION['user_id'];
        $arr['rating'] = $POST['rating'];

        $DB = new Database();
        $data = $DB->write($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    public function is_rated($POST)
    {
        $query = "SELECT * FROM rating WHERE game_id=:game_id AND user_id=:user_id limit 1";

        $arr['game_id'] = $POST['game_id'];
        $arr['user_id'] = $_SESSION['user_id'];
        
        $DB = new Database();
        $data = $DB->read($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    public function rate_again($POST)
    {
        $query = "UPDATE rating SET rating=:rating WHERE game_id=:game_id AND user_id=:user_id";

        $arr['game_id'] = $POST['game_id'];
        $arr['user_id'] = $_SESSION['user_id'];
        $arr['rating'] = $POST['rating'];
        
        $DB = new Database();
        $data = $DB->write($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    public function output_rating($GET)
    {
        $url_address = $this->splitURL($GET);

        $query = "SELECT * FROM rating LEFT JOIN games ON game_id = games.id WHERE url_address=:url_address";

        $arr['url_address'] = $url_address;
        
        $DB = new Database();
        $data = $DB->read($query, $arr);

        if(is_array($data))
        {
            return $data;
        }
        return false;
    }

    public function splitURL($GET)
    {
        $url = isset($GET['url']) ? $GET['url'] : false;
        $url_address = explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
        return end($url_address);
    }
}



?>