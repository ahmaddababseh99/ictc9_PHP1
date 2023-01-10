<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\transaction;
use Core\Model\User;

class Admin extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }
        /**
         * Function to make view
         * 
         */
        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }

        public function index()
        {
                
                
                $item = new Item(); //new model item
                $trans = new transaction(); //new model transaction
                $user = new User(); // new model user
                $this->data['item'] = count($item->get_all());
                $this->data['trans'] = count($trans->get_all());
                $this->data['user'] = count($user->get_all());
                $this->data['exp']= $item->connection->query("SELECT * from items ORDER BY `items`.`price` DESC limit 5");
                $this->view = 'dashboard';
        }
}
