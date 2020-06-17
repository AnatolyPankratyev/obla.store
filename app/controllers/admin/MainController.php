<?php

namespace app\controllers\admin;

use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction(){
        $countNewOrders = R::count('orders', "status = '0'");
        $countUsers = R::count('user');
        $countProducts = R::count('product');
        $countCategories = R::count('category');

        $this->setMeta('Панель управления');
        $this->set(compact(
            'countNewOrders',
            'countCategories',
            'countProducts',
            'countUsers'
        ));
    }

}