<?php


namespace app\models;


use ishop\App;
use RedBeanPHP\R;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel
{
     public static function saveOrder($data) {
        $order = R::dispense('orders');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->how_delivery = $data['how_delivery'];
        if ($order->how_delivery == 'delivery') {
            $order->sum = $_SESSION['cart.sum'] + $_SESSION['cart.delivery'];
        } else {
            $order->sum = $_SESSION['cart.sum'];
        }
        $order_id = R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
     }

     public static function saveOrderProduct($order_id) {
        $sql_part ='';
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $id_mod = $product['id_mod'];
            if ($id_mod) {
                $qt_mod = R::load('modification', $id_mod);
                $qt_mod2 = R::load('product_quantity', $id_mod);
            }
            if ($qt_mod->qt != null) {
                $qt_mod->qt = $qt_mod->qt - $product['qty'];
                R::store($qt_mod);
            }
            $qt_mod2->qt = $qt_mod2->qt - $product['qty'];
            R::store($qt_mod2);
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}), ";
        }
         $sql_part = rtrim($sql_part, ', ');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
     }

     public static function mailOrder($order_id, $user_email) {
        // Create the Transport
         $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'),
             App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
             ->setUsername(App::$app->getProperty('smtp_login'))
             ->setPassword(App::$app->getProperty('smtp_password'))
         ;
         // Create the Mailer using your created Transport
         $mailer = new Swift_Mailer($transport);

         // Create a message
         ob_start();
         require_once ROOT . '/app/views/mail/mail_order.php';
         $body = ob_get_clean();
         $message_client = (new Swift_Message("Вы совершили Заказ №{$order_id} на сайте " . App::$app->getProperty('shop_name')))
             ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
             ->setTo($user_email)
             ->setBody($body, 'text/html')
         ;
         $message_admin = (new Swift_Message("Сделан заказ №{$order_id}"))
             ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
             ->setTo(App::$app->getProperty('admin_email'))
             ->setBody($body, 'text/html')
         ;

         // Send the message
         $result = $mailer->send($message_client);
         $result = $mailer->send($message_admin);

     }
}