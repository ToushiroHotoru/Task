<?php

    Class Favorites extends Controller
    {
        function index() 
        {   
            $games = $this->loadModel('games');
            $result = $games->favorites_list();
            

            $pagination = $this->loadModel("pagination");
            $data['prev_page'] = $pagination->generate_link($pagination->current_page_number() - 1);
            $data['next_page'] = $pagination->generate_link($pagination->current_page_number() + 1);

            if(!isset($_GET['page']))
            {
                $_GET['page'] = 1;
            }

            $data['max_page'] = $pagination->max_page_favorites();
            $data['games'] = $result;
            $image_class = $this->loadModel('image_class');


            if(is_array($data['games']))
            {
                foreach($data['games'] as $key => $value)
                {
                    $data['games'][$key]->preview = $image_class->get_thumbnail($data['games'][$key]->preview, 200, 200);
                }
            }

            $data['favorites'] = $result;
            $data['page_title'] = 'favorites';
            $this->view("favorites", $data);
        }
        
        function delete_from_favorites()
        {
            $favorites = $this->loadModel('games');
            $favorites->delete_game($_POST);
        }
    }    

?>