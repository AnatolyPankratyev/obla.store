<?php


namespace app\controllers;


use app\models\Order;
use app\models\User;
use RedBeanPHP\R;
use YandexCheckout\Client;

class PaymentController extends AppController
{
    public function errorAction() {

    }

    public function waitAction() {

    }

    public function successAction() {
        if (isset($_SESSION['client'])) {
            $client = $_SESSION['client'];
            $paymentId = $_SESSION['payment.id_kassa'];
            $payment = $client->getPaymentInfo("$paymentId");
            $status = $payment->status;
            $paid = $payment->paid;

            if ($status == 'succeeded' && $paid == 1) {
                if(!User::checkAuth()){
                    $user = new User();
                    $data = $_SESSION['posted'];
                    $user->load($data);
                    if(!$user->validate($data)
                        // || !$user->checkUnique()
                    ){
                        $user->getErrors();
                        $_SESSION['form_data'] = $data;
                        redirect();
                    }else{
//                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                        if(!$user_id = $user->save('user')){
                            $_SESSION['error'] = 'Ошибка!';
                            redirect();
                        }
                    }
                }

                // сохранение заказа
                $data['user_id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
                $data['note'] = !empty($_SESSION['posted']['note']) ? $_SESSION['posted']['note'] : '';
                $user_email = $_SESSION['posted']['email'];
                // saveOrder
                $order_id = Order::saveOrder($data);



                Order::mailOrder($order_id, $user_email);




            }
        }
        $this->set(compact('payment', 'status', 'paid'));
        $this->setMeta('3D19 MERCH', 'Obladaet Store', 'Obla.store obladaet merch');
    }
}