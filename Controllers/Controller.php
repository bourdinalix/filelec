<?php
namespace Controllers;
require_once("Models/Model.php");

class Controller{
    protected $unModel;

    public function __construct()
    {
        $this->unModel = new \Models\Model();
    }


}
