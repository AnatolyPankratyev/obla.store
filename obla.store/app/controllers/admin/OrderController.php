<?php


namespace app\controllers\admin;


use ishop\libs\Pagination;
use RedBeanPHP\R;

class OrderController extends AppController {

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 300;
        $count = R::count('orders');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();


        $orders = \R::getAll("SELECT `orders`.`id`, `orders`.`user_id`, `orders`.`status`, `orders`.`date`, `orders`.`update_at`, `orders`.`how_delivery`, `user`.`name`,`user`.`country`,`user`.`tel`,`user`.`email`, ROUND(SUM(`order_product`.`price`*`qty`), 0) AS `sum` FROM `orders`
  JOIN `user` ON `orders`.`user_id` = `user`.`id`
  JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
  GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id` LIMIT $start, $perpage");

        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction(){
        $order_id = $this->getRequestID();
        $order = \R::getRow("SELECT `user`.*, `orders`.*, ROUND(SUM(`order_product`.`price`*`qty`), 2) AS `sum` FROM `orders`
  JOIN `user` ON `orders`.`user_id` = `user`.`id`
  JOIN `order_product` ON `orders`.`id` = `order_product`.`order_id`
  WHERE `orders`.`id` = ?
  GROUP BY `orders`.`id` ORDER BY `orders`.`status`, `orders`.`id` LIMIT 1", [$order_id]);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order_products = \R::findAll('order_product', "order_id = ?", [$order_id]);
        $this->setMeta("Заказ №{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction() {
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = R::load('orders', $order_id);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");
        R::store($order);
        $_SESSION['success'] = 'Изменение сохранено';
        redirect();
    }

    public function deleteAction() {
        $order_id = $this->getRequestID();
        $order = R::load('orders', $order_id);
        R::trash($order);
        $_SESSION['success'] = 'Заказ удален';
        redirect(ADMIN . '/order');
    }

}