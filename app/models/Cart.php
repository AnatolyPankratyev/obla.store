<?php


namespace app\models;


use RedBeanPHP\R;

class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null) {
        if($mod) {
            $ID = "{$product->id}-{$mod->id}";
            if ($mod->id) {
                $id_mod = $mod->id;
            }
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
        } else {
            $ID = $product->id;
            if ($ID == 6) {
                $id_mod = 100;
            } elseif ($ID == 7) {
                $id_mod = 200;
            }
            $title = $product->title;
            $price = $product->price;
        }
        if ($id_mod) {
            $qt_mod = R::load('modification', $id_mod);
            $qt_mod2 = R::load('product_quantity', $id_mod);
        }
//        if ($qt_mod->qt != null) {
//            $qt_mod->qt = $qt_mod->qt - $qty;
//            R::store($qt_mod);
//        }
//        $qt_mod2->qt = $qt_mod2->qt - $qty;
//        R::store($qt_mod2);
        if ($qt_mod2->qt >= $qty) {
            if (isset($_SESSION['cart'][$ID])) {
                $_SESSION['cart'][$ID]['qty'] += $qty;
            } else {
                $_SESSION['cart'][$ID] = [
                    'qty' => $qty,
                    'title' => $title,
                    'alias' => $product->alias,
                    'price' => $price,
                    'img' => $product->img,
                    'id_mod' => $id_mod,
                    'qt_mod2' => $qt_mod2->qt,
                    'qt_mod' => $qt_mod->qt,
                ];
            }
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price : $qty * $price;
            $_SESSION['cart.delivery'] = 350;
        }
    }


    public function deleteItem($id) {
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

}