<?php
namespace App\Controller;

use Core\Loader;
use Core\model;
use Core\p;

/**
 * Class index 控制器
 * @package App\Controller
 */
class index extends Loader
{
    function __construct()
    {
    }

    public function index()
    {
        $model = new model();
        $messages = $model->select('message', ['id', 'title', 'content', 'createtime']);
        $this->assign('title', '全部留言');
        $this->assign('messages', $messages);

        $this->display('index.html');
    }

    public function add()
    {

        $this->assign('title', '添加留言');
        $this->display('add.html');
    }

    public function save()
    {
        $model = new model();
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['createtime'] = time();
        $res = $model->insert('message', $data);
        if ($res) {
            header('Location:' . '/');
            exit();
        } else {
            $this->display('add.html');
        }

    }
}