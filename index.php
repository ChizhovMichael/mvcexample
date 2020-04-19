<?php

session_start();

$request = $_SERVER['REQUEST_URI'];

require('vendor/autoload.php');

spl_autoload_register( function($classname) {
    require_once( __DIR__ . "/$classname.php");
});

if ($request == '' || $_GET) 
{
    @$sortname = key($_GET);
    @$sortdirection = $_GET[$sortname];
    new App\Controllers\HomeController(intval(str_replace('/page/', "", $request)), $sortname, $sortdirection);
    new App\Models\TaskModel();
} 
else if ($request == '/' || $_GET) 
{
    @$sortname = key($_GET);
    @$sortdirection = $_GET[$sortname];
    new App\Controllers\HomeController(intval(str_replace('/page/', "", $request)), $sortname, $sortdirection);
    new App\Models\TaskModel();
} 
else if (preg_match('#\/page\/[0-9]*#', $request)) 
{
    @$sortname = key($_GET);
    @$sortdirection = $_GET[$sortname];
    new App\Controllers\HomeController(intval(str_replace('/page/', "", $request)), $sortname, $sortdirection);
    new App\Models\TaskModel();
}
else if ($request == '/add/new/task' && $_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $addtask = new App\Controllers\HomeController();
    $addtask->addNewTask($_REQUEST['task']);
}
else if ($request == '/login') 
{
    new App\Controllers\AuthController();
}
else if ($request == '/login/admin' && $_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $auth = new App\Controllers\AuthController();
    $auth->login($_REQUEST['user']);
}
else if ($request == '/admin')
{
    if ($_SESSION['user'] != 'admin') {
        header('Location: /login');
    } else {
        $adminpage = new App\Controllers\AdminController();
        $adminpage->index();
        new App\Models\TaskModel();
    }    
}
else if ($request == '/logout')
{
    unset($_SESSION['user']);
    session_destroy();
    header('Location: /');
}
else if (preg_match('#\/success\/[0-9]*#', $request))
{
    if ($_SESSION['user'] != 'admin') {
        header('Location: /login');
    } else {
        $success = new App\Controllers\AdminController();
        $success->successTask(intval(str_replace('/success/', "", $request)));
    }
    
}
else if (preg_match('#\/task\/[0-9]*#', $request))
{
    if ($_SESSION['user'] != 'admin') {
        header('Location: /login');
    } else {
        $edit = new App\Controllers\AdminController();
        $edit->editTaskPage(intval(str_replace('/task/', "", $request)));
    }
    
}
else if (preg_match('#\/edit\/[0-9]*#', $request) && $_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if ($_SESSION['user'] != 'admin') {
        header('Location: /login');
    } else {
        $_REQUEST['task']['id'] = intval(str_replace('/edit/', "", $request));
        $edit = new App\Controllers\AdminController();
        $edit->editTask($_REQUEST['task']);
    }  
}
else 
{
    // http_response_code(404);
    // require $_SERVER["DOCUMENT_ROOT"] . '/views/404.php';
}
