<?php
namespace app\blog\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{
    public function index()
    {
//        return "Hello ThinkCMF!";

        return $this->fetch();
    }
}
