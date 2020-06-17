<?php


namespace app\controllers;


use RedBeanPHP\R;

class EnterController extends AppController
{
    public function viewAction() {
        $categories = R::findAll('category');
        $this->set(compact('categories'));
        $this->setMeta('3D19 MERCH', 'Obladaet Store', 'Obla.store obladaet merch');

    }

}