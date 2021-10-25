<?php

Class User
{
    
    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] ="";

        if(isset($POST['username']) && isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            
            $query = "SELECT * FROM users WHERE username = :username limit 1";
            $data = $DB->read($query, $arr);
            show($data);
            if(is_array($data))
            {
                if(password_verify($POST['password'], $data[0]->password))
                {
                    if($data[0]->is_admin == true)
                    {
                        $_SESSION['admin_url'] = get_random_string_max(60);
                    }
                    $_SESSION['user_id'] = $data[0]->id;
                    $_SESSION['user_name'] = $data[0]->username;
                    $_SESSION['url_address'] = $data[0]->url_address;
                    header("Location:". ROOT . "home");
                    die;
                } else {
                    $_SESSION['error'] = "wrong password";
                }
            } else {
                $_SESSION['error'] = "wrong username";
            } 
        } else {
            $_SESSION['error'] = "please enter a valid username and password";
        }
        
       
    }

    function signup($POST)
    {

        $DB = new Database();

        $_SESSION['error'] = "";

        if(isset($POST['username']) && isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = password_hash($POST['password'], PASSWORD_DEFAULT);
            $arr['email'] = $POST['email'];
            $arr['url_address'] = get_random_string_max(20);
            $arr['date'] = date("Y-m-d H:i:s");
            $arr['is_admin'] = false;
            
            $query = "INSERT INTO users (username, password, email, url_address, date, is_admin) values (:username, :password, :email, :url_address, :date, :is_admin)";
            $data = $DB->write($query, $arr);
            if($data)
            {
                header("Location:". ROOT . "login");
                die;
            } 
        } else {
            $_SESSION['error'] = "please enter a valid username and password";
        }

    }

    function check_logged_in()
    {
        $DB = new Database();

        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];
            
            $query = "SELECT * FROM users WHERE url_address = :user_url limit 1";
            $data = $DB->read($query, $arr);
            if(is_array($data))
            {
               
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }
        return false;
    }

    function check_is_admin()
    {
        $DB = new Database();

        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];
            $arr['is_admin'] = true;
            
            $query = "SELECT * FROM users WHERE url_address = :user_url AND is_admin = :is_admin  limit 1";
            $data = $DB->read($query, $arr);
            if(is_array($data))
            {
               
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;
                $_SESSION['admin_url'] = get_random_string_max(60);

                return true;
            }
        }
        return false;
    }

    function get_all_users()
    {
        $DB = new Database();

        $query = "SELECT * FROM users";
        $data = $DB->read($query);
        if(is_array($data))
        {
            return $data;
        }

        return false;
    }

    function get_one($link)
    {
        $DB = new Database();

        $arr['url_address'] = $link;

        $query = "SELECT * FROM users WHERE url_address = :url_address limit 1";
        $data = $DB->read($query, $arr);
        if($data)
        {
            return $data;
        }
        return false;
    }


    function make_admin($POST)
    {
        $DB = new Database();

        $arr['url_address'] = $POST['url_address'];
        $arr['is_admin'] = true;

        $query = "UPDATE users SET is_admin = :is_admin WHERE url_address = :url_address";
        $data = $DB->write($query, $arr);
        if($data)
        {
            return true;
        }

        return false; 
    }

    function delete_user($POST)
    {
        $DB = new Database();

        $query = "DELETE FROM users WHERE url_address = :url_address";

        $arr['url_address'] = $POST['url_address'];

        $data = $DB->write($query, $arr);
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

    function change_password($POST, $email)
    {
        $DB = new Database();

        $query = "UPDATE users SET password=:password WHERE email=:email";

        $arr['email'] = $email;
        $arr['password'] = password_hash($POST['password'], PASSWORD_DEFAULT);

        $data = $DB->write($query, $arr);
        if($data)
        {
            return true;
        }

        return false;
    }

   

    function logout()
    {
        unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);
        unset($_SESSION['user_id']);
        unset($_SESSION['error']);
        unset($_SESSION['admin_url']);

		header("Location:". ROOT . "login");
		die;
    }
}

?>