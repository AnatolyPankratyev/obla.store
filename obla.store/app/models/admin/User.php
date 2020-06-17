<?php


namespace app\models\admin;


use RedBeanPHP\R;

class User extends \app\models\User
{
    public $attributes = [
        'id' => '',
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
    ];

    public $rules = [
        'required' => [
            ['name'],
            ['email'],
            ['tel'],
            ['role']
        ],
        'email' => [
            ['email'],
        ],
    ];

    public function checkUnique(){
        $user = R::findOne('user', '(email = ? OR tel = ?) AND id <> ?', [$this->attributes['email'], $this->attributes['tel'], $this->attributes['id']]);
        if($user){
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот email уже используется';
            }
            if($user->tel == $this->attributes['tel']){
                $this->errors['unique'][] = 'Этот телефон уже используется';
            }
            return false;
        }
        return true;
    }
}