<?php

    Class Game extends Controller
    {
        function index($link = '') 
        {   
            if(empty($link))
            {
                $data['page_title'] = "not found";
                $this->view("404.php", $data);
            } else {
                $games = $this->loadModel('games');
                $comments = $this->loadModel('comments');
                $rating = $this->loadModel('rating');
                $user = $this->loadModel('user');
                $result = $games->get_one($link);

                if(isset($_SESSION['user_id']))
                {
                    if($games->is_added($result))
                    {   
                        $result->{'name'} = "Delete";
                        $result->{'class'} = "game__delete";
                    } else {
                        $result->{'name'} = "Add";
                        $result->{'class'} = "game__add";
                    }
                }

                //comments section start

                $comments_result = $comments->get_comments();
                if($user->check_logged_in())
                {
                    forEach($comments_result as $comment)
                    {
                        // show($comment->id);
                        if($comments->is_comment_from_user($comment->id))
                        {
    
                            $comment->{'is_owner'} = true;
                            // show($comment->is_owner);
                        }
                    }
                }
                
                //comments section end

                // //rating section startTLS

                
                $rating_array = $rating->output_rating($_GET);
                if(!empty($rating_array))
                {
                    $all_ratings = count($rating_array);
                    $sum = 0;
                    
                    forEach($rating_array as $rate)
                    {
                        $sum += $rate->rating;
                    }
    
                    $data['rating'] = $sum / $all_ratings;
                }
                

                
                $data['comments'] = $comments_result;
                $data['game'] = $result;
                $data['page_title'] = "Game";
                $this->view("game", $data);
            }  
   
        }

        function add_comment()
        {
            $comments = $this->loadModel('comments');
            $error = null;
            if(isset($_POST['text']))
            {
                if(empty($_POST["text"]))
                {
                    $_SESSION['error'] = "Enter some text";
                } else 
                    if(!preg_match('/^[a-zA-Zа-яёА-ЯЁ\d]{6,250}$/i', $_POST['text'])){
                    $_SESSION['error'] = 'Commentary must be valid';
                } 
            }

            if(empty($_SESSION['error']))
            {
                $comments->add_comment($_POST);
            }
            
        }

        function delete_comment()
        {
            $comments = $this->loadModel('comments');
            $comments->delete_comment($_POST);
        }

        function add_to_favorites()
        {
            $favorites = $this->loadModel('games');
            $favorites->add_game($_POST);
        }

        function delete_from_favorites()
        {
            $favorites = $this->loadModel('games');
            $favorites->delete_game($_POST);
        }
        
        function rate_game()
        {
            $rating = $this->loadModel('rating');
            if($rating->is_rated($_POST))
            {
                $rating->rate_again($_POST);
            } else {
                $rating->rate($_POST);
            }
           
        }

       

    }    

?>