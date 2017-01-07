<?php
namespace App\Controller;
use Core\Loader;
use Core\model;
use Core\p;

/**
 * Created by PhpStorm.
 * User: pc188
 * Date: 2017/1/7
 * Time: 10:43
 */
class index extends Loader {
    function __construct()
    {
    }

    public  function index(){
        $model = new model();

        $stmt  = $model->prepare('select id,name from user WHERE  id >= :id');
        $stmt->execute([':id'=>1]);
        $users = $stmt->fetchAll();

        $this->assign('title','this is title');
        $this->assign('users',$users);

        $this->assign('hello','Hello World ');
        $this->display('index.html');
    }
}