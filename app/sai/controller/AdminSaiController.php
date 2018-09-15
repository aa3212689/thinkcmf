<?php
namespace app\sai\controller;
use cmf\controller\AdminBaseController;

use app\sai\service\PostService;
use app\sai\model\PortalCategoryModel;
use app\sai\model\SaiModel;


class AdminSaiController extends AdminBaseController{

    public function index(){
//        $SaiModel = new SaiModel();
//        dump($SaiModel->find());


        $param = $this->request->param();
//        dump($param);

        $categoryId = $this->request->param('category', 0, 'intval');

        $postService = new PostService();
        $data        = $postService->adminArticleList($param);
//        dump($data);

        $data->appends($param);

        $portalCategoryModel = new PortalCategoryModel();
        $categoryTree        = $portalCategoryModel->adminCategoryTree($categoryId);

        $this->assign('start_time', isset($param['start_time']) ? $param['start_time'] : '');
        $this->assign('end_time', isset($param['end_time']) ? $param['end_time'] : '');
        $this->assign('keyword', isset($param['keyword']) ? $param['keyword'] : '');
        $this->assign('articles', $data->items());
        $this->assign('category_tree', $categoryTree);
        $this->assign('category', $categoryId);
        $this->assign('page', $data->render());
//视图
        return $this->fetch();
    }

    public function add(){
	    //测试复制会更新多少
        return $this->fetch();
    }

    public function getdata(){
        $data   = $this->request->param();
//        dump($data);
        $SaiModel = new SaiModel();

        if (!empty($data['photo_urls'])) {

            $link= cmf_asset_relative_url($data['photo_urls'][0]);
            $data['photo']=cmf_get_image_url($link);
        }
        $data['start_time']= strtotime($data['start_time']);
        $data['stop_time']= strtotime($data['stop_time']);

        $SaiModel->allowField(true)->data($data,true)->isUpdate(false)->save();
    }

}