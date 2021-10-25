<?php

class Games
{

    public function get_all()
    {
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limit = 10;
        $offset = ($page_number - 1) * $limit;
        $query = "SELECT * FROM games ORDER BY id DESC limit $limit offset $offset";

        $DB = new Database();
        $data = $DB->read($query);

        if(is_array($data))
        {
            return $data;
        }
        return false;

    }

    public function get_one($link)
    {
        $query = "SELECT * FROM games WHERE url_address = :link limit 1";
        $arr['link'] = $link;

        $DB = new Database();
        $data = $DB->read($query, $arr);

        if(is_array($data))
        {
            return $data[0];
        }
        return false;
    }


    public function is_added($data)
    {

        $query = "SELECT * FROM favorites WHERE user_id=:user_id AND game_id=:game_id";

        $arr['user_id'] = $_SESSION['user_id'];
        $arr['game_id'] = $data->id;
        
        $DB = new Database();
        $data = $DB->read($query, $arr);

        if($data)
        {
            return true;
        }
        return false;

    }

    public function splitURL($GET)
    {
        $url = isset($GET['url']) ? $GET['url'] : false;
        $url_address = explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
        return end($url_address);
    }

    public function add_game($POST)
    {
        $query = "INSERT INTO favorites (user_id, game_id) VALUES (:user_id, :game_id)";

        $arr['user_id'] = $_SESSION['user_id'];
        $arr['game_id'] = $POST['game_id'];

        $DB = new Database();
        $data = $DB->write($query, $arr);
        if($data)
        {
            return true;
        } 
        return false;
    }

    public function delete_game($POST)
    {
        $query = "DELETE FROM favorites WHERE user_id = :user_id AND game_id = :game_id";

        $arr['user_id'] = $_SESSION['user_id'];
        $arr['game_id'] = $POST['game_id'];

        $DB = new Database();
        $data = $DB->write($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    public function favorites_list()
    {
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limit = 10;
        $offset = ($page_number - 1) * $limit;
        $query = "SELECT * FROM favorites LEFT JOIN games ON game_id = games.id WHERE user_id = :user_id limit $limit offset $offset";

        $arr['user_id'] = $_SESSION['user_id'];

        $DB = new Database();
        $data = $DB->read($query, $arr);

        if(is_array($data))
        {
            return $data;
        }
        return false;
    }


}

?>