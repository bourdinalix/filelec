<?php
namespace Controllers;

require_once("Controller.php");
require_once("Models/Account.php");


class Account extends Controller{
    private $unAccount;

    public function __construct()
    {
        $this->unAccount = new \Models\Account();
    }

    public function selectMyAccount($tab)
    {
        return $this->unAccount->selectMyAccount($tab);
    }

    public function selectOrderPay($tab)
    {
        return $this->unAccount->selectOrderPay($tab);
    }
}