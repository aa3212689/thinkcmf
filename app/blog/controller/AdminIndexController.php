<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: ��è <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\blog\controller;

use cmf\controller\AdminBaseController;
use think\Db;

class AdminIndexController extends AdminBaseController
{
    public function index()
    {
        $miniQuery = Db::name('mini');

        $lists = $miniQuery->select();
        // 获取分页显示
        dump($lists);

        $this->assign('lists', $lists);

        return $this->fetch();
    }
}
