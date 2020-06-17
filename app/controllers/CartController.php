<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\User;
use RedBeanPHP\R;
use YandexCheckout\Client;

class CartController extends AppController
{
    public function addAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);

        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if (isset($_SESSION['cart'][$id])) {
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }

    public function viewAction() {
        $this->setMeta('3D19 MERCH - Оформление заказа', 'Obladaet Store', 'Obla.store obladaet merch');
    }

    public function checkoutAction(){
        if(!empty($_POST)){
            // запись в ссесию юзера
            $_SESSION['posted'] = $_POST;


            // данные для оплаты
            if(!empty($_POST['agreement'])) {
                if (isset($_SESSION['payment'])) unset($_SESSION['payment']);
                if (isset($_POST['how_delivery'])) {
                    if ($_POST['how_delivery'] == 'delivery') {
                        if ($_POST['country'] == 'ukraine') {
                            $_SESSION['cart.delivery'] = 500;
                        }
                        if ($_POST['country'] == 'kazakhstan') {
                            $_SESSION['cart.delivery'] = 500;
                        }
                        if ($_POST['country'] == 'belarus') {
                            $_SESSION['cart.delivery'] = 750;
                        }
                        $_SESSION['payment']['sum'] = $_SESSION['cart.sum'] + $_SESSION['cart.delivery'];
                    }
                    if ($_POST['how_delivery'] == 'pickup') {
                        $_SESSION['payment']['sum'] = $_SESSION['cart.sum'];
                    }
                }
            }
            $r_items = array();
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id => $item) {
                    $item_title = $item['title'];
                    $item_qty = $item['qty'];
                    $item_price = $item['price'];
                    $r_item = array(
                        "description" => "{$item_title}",
                        "quantity" => "{$item_qty}",
                        "amount" => array(
                            "value" => "{$item_price}",
                            "currency" => "RUB"
                        ),
                        "vat_code" => "2",
                        "payment_mode" => "full_prepayment",
                        "payment_subject" => "commodity"
                    );
                    array_push($r_items, $r_item);
                }
            }
            $a_delivery = array(
                "description" => "Доставка",
                "quantity" => "1.00",
                "amount" => array(
                    "value" => "{$_SESSION['cart.delivery']}",
                    "currency" => "RUB"
                ),
                "vat_code" => "2",
                "payment_mode" => "full_prepayment",
                "payment_subject" => "commodity"
            );
            if ($_POST['how_delivery'] == 'delivery') {
                array_push($r_items, $a_delivery);
            }

            // ========================
            $client = new Client();
            $client->setAuth('661426', 'live_XulLNLeyAayrda0czmTYt3gmimXsTTFq3Ry363zySQU');
            $payment = $client->createPayment(
                array(
                    "amount" => array(
                        "value" => $_SESSION['payment']['sum'],
                        "currency" => "RUB"
                    ),
                    "confirmation" => array(
                        "type" => "redirect",
                        'return_url' => PATH . '/payment/success',
                    ),
                    "receipt" => array(
                        "customer" => array(
                            "full_name" => "{$_POST['name']}",
                            "email" => "{$_POST['email']}",
                        ),
                        "items" => $r_items,
                    ),
                    'capture' => true,
                    'description' => "{$_POST['tel']}",
                ),
                uniqid('', true)
            );
            // ========================




//            if(!empty($_POST['agreement'])) {
//                redirect(PATH . '/payment/form.php');
//            }
        }
        $_SESSION['client'] = $client;
        $_SESSION['payment.id_kassa'] = $payment->id;

        redirect($payment->confirmation['confirmation_url']);
    }

//    protected static function setPaymentData($order_id) {
//        if (isset($_SESSION['payment'])) unset($_SESSION['payment']);
//        $_SESSION['payment']['id'] = $order_id;
//        if (isset($_POST['how_delivery'])) {
//            if ($_POST['how_delivery'] == 'delivery') {
//                $_SESSION['payment']['sum'] = $_SESSION['cart.sum'] + $_SESSION['cart.delivery'];
//            }
//            if ($_POST['how_delivery'] == 'pickup') {
//                $_SESSION['payment']['sum'] = $_SESSION['cart.sum'];
//            }
//        }
//    }
}