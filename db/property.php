<?php

namespace Property\DB;

class Property /* implements \Countable */
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['properties'])) {
            $_SESSION['properties'] = array();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }
    public function addProperty($property)
    {
        array_push($_SESSION['properties'], $property);
    }
    public function removeProperty($id)
    {
        $path = $_SESSION['properties'][$id]["image"];
        @unlink($path);
        unset($_SESSION['properties'][$id]);
        //remove cart
        $this->removeCart($id);
    }
    public function getProperty()
    {
        return $_SESSION['properties'];
    }
    public function addToCart($id)
    {
        if (!in_array($id, $_SESSION['cart'])) {
            array_push($_SESSION['cart'], $id);
        }
    }
    public function removeCart($value)
    {
        $cartArr = $_SESSION['cart'];
        $key = array_search($value, $cartArr);
        if ($key !== false) {
            unset($_SESSION['cart'][$key]);
            // echo $key;
        }
    }
    public function getCart()
    {
        return $_SESSION['cart'];
    }
    // public function count(): int
    // {
    //     return count($_SESSION['properties']);
    // }
}
