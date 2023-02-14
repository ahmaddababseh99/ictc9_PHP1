<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\transaction;
use FTP\Connection;

class transactions extends Controller
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
     * Gets all transactions
     *
     */
   
   public function index(){
       $this->permissions(['transaction:create']); 
        $item= new item();//new model item.
        $this->data['item']=$item->get_all();
        $data = new transaction(); // new model transaction.
        $this->data['data'] = $data->get_all();

        $this->view = 'transactions.index';
        
      
    }
    function AllTransactions(){
        $this->permissions(['transaction:read']); 
            $transaction= new transaction();
            $sql="SELECT t.*,i.*,t.id as trans_id FROM transactions as t 
            INNER JOIN items as i 
            on t.item_id = i.id";

            $this->data['data']=$transaction-> connection->query($sql);
            $this->view = 'transactions.alltransactions';

   }
   
    /**
     * Display the HTML form for transaction creation
     *
     * @return void
     */
    public function create()
    {       
        $this->permissions(['transaction:create']); 

         $this->view = 'transactions.alltransactions'; 
       
    }

   /**
     * Creates new transaction
     *
     * @return void
     */
    public function store()
    {
       
        $this->permissions(['transaction:create']); 

        $transaction= new transaction();//new model transaction.
        $transaction->create($_GET);
        $item = new item();//new model item.
        $getquantity=$item->get_by_id($_GET['item_id']);
        $q= $getquantity->quantity- $_GET['itemQuantity'];
        $setquantity= $item->connection->query("UPDATE items set quantity=$q where id='".$_GET['item_id']."' ");
    }
    /**
     * Can see transactions inside 
     */
   
    function edit(){
        $this->permissions(['transaction:update']); 

        $item= new item();//new model item.
        $this->data['item']=$item->get_all();
        $transaction =new transaction();//new model transaction.
        $this->data['transaction']= $transaction->get_by_id($_GET['id']);
        $this->view='transactions.edit';
    }
    /**
     * Edit Transactions
     * 
     */
    function editdone(){
        $this->permissions(['transaction:update']); 
        
        $transaction =new transaction();//new model transaction.
        $transaction->update($_POST);
        $this->view='transactions.edit';
        Helper::redirect('/AllTransactions');

    }
    /**
     * Delete Transactions
     * 
     */
    function delete(){
        $this->permissions(['transaction:delete']); 

         $transaction =new transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/AllTransactions');

    }
}

