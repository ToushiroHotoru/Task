<?php

    Class Home extends Controller
    {
        function index() 
        {   
            // database connect and render all records
            $DB = new Database();
            $games = $this->loadModel('games');
            $result = $games->get_all();

            // pagination
            $pagination = $this->loadModel("pagination");
            $data['prev_page'] = $pagination->generate_link($pagination->current_page_number() - 1);
            $data['next_page'] = $pagination->generate_link($pagination->current_page_number() + 1);

            if(!isset($_GET['page']))
            {
                $_GET['page'] = 1;
            }

            $data['max_page'] = $pagination->max_page_home();  
            $data['games'] = $result;
          
            if(isset($_SESSION['user_id']))
            {
                forEach($result as $item)
                {
                    if($games->is_added($item))
                    {   
                        $item->{'name'} = "Delete";
                        $item->{'class'} = "game__delete";
                    } else {
                        $item->{'name'} = "Add";
                        $item->{'class'} = "game__add";
                    }
                }
            }
            

            // show($mass);
            // $data['games'] = $mass;

            // image crop
            $image_class = $this->loadModel('image_class');
            if(is_array($data['games']))
            {
                foreach($data['games'] as $key => $value)
                {
                    $data['games'][$key]->preview = $image_class->get_thumbnail($data['games'][$key]->preview, 200, 200);
                }
            }

            
            
            $data['page_title'] = "Home";
            $this->view("home", $data);
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

    }    

?>