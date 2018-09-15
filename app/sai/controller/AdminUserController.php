<?php
namespace app\sai\controller;
use cmf\controller\AdminBaseController;

class AdminUserController extends AdminBaseController{

    public function index(){
        return $this->fetch();
    }

}