<?php

class Comments
{

    public function add_comment($POST)
    {
        if(!empty($POST['text']))
        {
            $query = "INSERT INTO comments(user_id, game_id, text) VALUES (:user_id, :game_id, :text)"; 

            $arr['user_id'] = $_SESSION['user_id'];
            $arr['game_id'] = $POST['game_id'];
            $arr['text'] = $POST['text'];
    
            $DB = new Database();
            $data = $DB->write($query, $arr);
    
            if($data)
            {
                // json_encode()
                return json_encode($arr);
            }
            return false;
        } else {
            $_SESSION['error'] = 'Here is must be some text';
        }
    
    }

    public function delete_comment($POST)
    {
        $query = "DELETE FROM comments WHERE id = :commentId";

        $arr['commentId'] = (int)$POST['commentId'];

        $DB = new Database();
        $data = $DB->write($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    public function get_comments()
    {
        $query = "SELECT * FROM users RIGHT JOIN comments ON user_id = users.id";

        $DB = new Database();
        $data = $DB->read($query);

        if(is_array($data))
        {
            return $data;
        }
        return false;
    }

    public function is_comment_from_user($comment_id)
    {
        $query = "SELECT * FROM comments WHERE user_id=:user_id AND id=:id limit 1";

        $arr['user_id'] = $_SESSION['user_id'];
        $arr['id'] = $comment_id;

        $DB = new Database();
        $data = $DB->read($query, $arr);

        if($data)
        {
            return true;
        }
        return false;
    }

    
}

?>