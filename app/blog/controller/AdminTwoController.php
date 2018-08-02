<?php
namespace app\blog\controller;

use cmf\controller\AdminBaseController;
use think\Db;

class AdminTwoController extends AdminBaseController
{
public function index()
{


return $this->fetch();
}
}
?>