<?php

namespace app\controllers;

use app\models\Category;

class CategoryController extends AppController {

    public function viewAction(){
        $alias = $this->route['alias'];
        $category = \R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Страница не найдена', 404);
        }

        // хлебные крошки
        $breadcrumbs = '';

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        $products = \R::find('product', "category_id IN ($ids)");
        $this->setMeta('3D19 MERCH', $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs'));
    }

}