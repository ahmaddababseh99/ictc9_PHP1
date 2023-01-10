<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
{
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
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.index';
                $user = new User; // new model user.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();// new model user.
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Display the HTML form for user creation
         *
         * @return void
         */
        public function create()
        {

                $this->permissions(['user:create']);
                $this->view = 'users.create';
        }

        /**
         * Creates new User
         *
         * @return void
         */
        public function store()
        {

                $this->permissions(['user:create']);
                $user = new User();// new model user.
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->create($_POST);
                /**
                 * upload Image User
                 */
                $targetDir = "resources/views/uploads/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
                        $user->connection->query("INSERT INTO users ( username, display_name, email, password,img)
                         VALUES ('" . $_POST['username'] . "','" . $_POST['display_name'] . "'
                         ,'" . $_POST['email'] . "','" . $_POST['password'] . "'
                         ,'" . $fileName . "')");
                }

                Helper::redirect('/users');
        }

        /**
         * Display the HTML form for user update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();// new model user.
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Updates the User
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();// new model user.
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'seller':
                                $permissions = User::SELLER;
                                break;
                        case 'procurement':
                                $permissions = User::PROCUREMENT;
                                break;
                        case 'accountant':
                                $permissions = User::ACCOUNTANT;
                                break;
                }
                ($_POST['role']);
                $_POST['permissions'] = \serialize($permissions);
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
        }

        /**
         * Delete the User
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();// new model user.
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
        /**
         * Can User Edit Profile
         * 
         */
        public function profile()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();// new model user.
                $this->data['user'] = $user->get_by_id($_GET['id']);
                $this->view = "users.editProfile";
        }

        /**
         * Can User Edit Profile Image
         * 
         */
        public function profileStore()
        {
                $user = new User();// new model user.
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);

                $targetDir = "resources/views/uploads/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath); 
                }
               
                $user->connection->query("UPDATE  users set 
                display_name='" . $_POST['display_name'] . "' ,email='" . $_POST['email'] . "',
                password ='" . $_POST['password'] . "',
                img='" . $fileName . "' 
                 where id = '" . $_POST['id'] . "' ");
                 unset($_SESSION['img']);
                 $_SESSION['img']=$fileName;
                 Helper::redirect('/dashboard');

        }
}
