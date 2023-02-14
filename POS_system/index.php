<?php
session_start();


use Core\Model\User;
use Core\Router;


spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'user_id' => $logged_in_user->id,
        'is_admin_view' => true
    );
}

// This code will run only at the first time of using the app.
// For public access


////////// items
Router::get('/items', 'items.index'); // Display item index
Router::get('/items/create', 'items.create'); // Display item index
Router::post('/items/store', 'items.store'); // Display item index
Router::get('/item/edit', "items.edit"); // Displays single item (HTML)
Router::post('/item/editdone', "items.editDone"); // Displays single item (HTML)

Router::get('/item', "items.single"); // Displays single post (HTML)
Router::get('/items/delete', "items.delete");
////
Router::get('/transactions', 'transactions.index');
router::get('/AllTransactions','transactions.AllTransactions');

Router::get('/transactions/Store', 'transactions.store');
Router::get('/transaction/delete', 'transactions.delete');
Router::get('/transaction/update', 'transactions.edit');
Router::post('/transctions/editdone', 'transactions.editdone');





Router::get('/', 'authentication.login'); // Display home.php
Router::get('/front/post', 'front.single'); // Display home.php
// For web administrators
Router::get('/login', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// athenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard


// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)

// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::get('/users/Profile', "users.profile"); // Display the edit form (HTML)
Router::post('/users/prfileeditdone', "users.profileStore"); // Display the edit form (HTML)

Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)



Router::redirect();
