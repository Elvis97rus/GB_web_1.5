<?php
namespace App\controllers;

use App\models\User;
class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        $id = (int)$_GET['id'];
        $params = [
            'user' =>  User::getOne($id)
        ];

        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
          'users' =>  User::getAll()
        ];

        echo $this->render('users', $params);
    }

    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        $user = User::getOne($id);
        $user->delete();
        header('Location: ?a=users');
    }

    public function insertAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->fio = $_POST['fio'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->save();
            header('Location: ?a=users');
            exit;
        }
        echo $this->render('userInsert', []);
    }
}