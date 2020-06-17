<?php


namespace app\controllers\admin;


use RedBeanPHP\R;

class RemainsController extends AppController
{
    public function indexAction(){
        $mods = R::findAll('modification');
        $products = R::findAll('product');
        $products_qt = R::findAll('product_quantity');

        $this->setMeta('Панель управления');
        $this->set(compact(
            'mods',
            'products',
            'products_qt'
        ));
    }

    public function viewAction()
    {
        $pr_id = $this->getRequestID();
        $products = R::findAll('product');
        $productQT = R::findOne('product_quantity', 'id = ?', [$pr_id]);



        $this->set(compact('productQT', 'products'));
        $this->setMeta('Панель управления');
    }

    public function editAction() {
        if (!empty($_GET)) {
            $id = $_GET['id'];
            $qt = $_GET['qt'];
            if ($id == 200 || $id == 100) {
                $pr_QT = R::load('product_quantity', $id);
                $pr_QT->qt = $qt;
                R::store($pr_QT);
                if (R::store($pr_QT)) {
                    $_SESSION['success'] = 'Количество изменено';
                } else {
                    $_SESSION['error'] = 'Изменение не прошло';
                }
            } else {
                $pr_QT = R::load('product_quantity', $id);
                $mod_QT = R::load('modification', $id);
                $pr_QT->qt = $qt;
                R::store($pr_QT);
                $mod_QT->qt = $qt;
                R::store($mod_QT);
                if (R::store($pr_QT) && R::store($mod_QT)) {
                    $_SESSION['success'] = 'Количество изменено';
                } else {
                    $_SESSION['error'] = 'Изменение не прошло';
                }
            }
        }
        redirect(ADMIN . 'remains/');
    }
}