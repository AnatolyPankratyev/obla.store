<?php
namespace app\models;

use RedBeanPHP\R;

class User extends AppModel {

    public $attributes = [
        'password' => '',
        'name' => '',
        'email' => '',
        'tel' => '',
        'country' => '',
        'how_delivery' => '',
        'city' => '',
        'zipcode' => '',
        'street' => '',
        'building' => '',
        'apartment' => '',
        'role' => 'user'
    ];

    public $rules = [
        'required' => [
            ['name'],
            ['email'],
            ['tel'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique(){
        $user = \R::findOne('user', 'email = ? OR email = ?', [$this->attributes['email'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }
        return true;
    }

    public function login($isAdmin = false){
        $login = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if($isAdmin){
                $user = R::findOne('user', "email = ? AND role = 'admin'", [$login]);
            }else{
                $user = R::findOne('user', "email = ?", [$login]);
            }
            if($user){
                if(password_verify($password, $user->password)){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

}