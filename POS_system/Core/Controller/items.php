<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\transaction;

class items extends Controller
{

    use Tests;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets All Items
     * 
     */
   
     public function index(){
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new item; // new model item.
        $this->data['items'] = $item->get_all();
        $this->data['item_count'] = count($item->get_all());
        
      
    }
   
    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['item:update']);
        $item = new item();// new model item.
        $item->create($_POST);
        Helper::redirect('/items');
    }

    /**
     * Can see items inside 
     * 
     */
    public function single()
    {
        $this->permissions(['item:read']);

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->view = 'items.single';
        $item = new item();// new model item.
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }
    /**
     * 
     * Delete Items
     */

    public function delete()
    {
        $this->permissions(['item:delete']);
        $item = new item; // new model item.
        $trans= new transaction();
        $trans->connection->query("DELETE  from transactions where item_id ='".$_GET['id']."'");
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }

        /**
        * 
        * Display the HTML form for post update
        */
        public function edit(){
            $this->permissions(['item:update']);
            $items=new item();// new model item.
            $this->data['data']= $items->get_by_id($_GET['id']);
            $this->view="items.edit";
        }
        /**
         * Update items
         * 
         */
        public function editDone(){
            $this->permissions(['item:update']);
            $item =new item();// new model item.
            $item->update($_POST);
            Helper::redirect('/items');

        }
}
