<?php
namespace app\one\controller;

use cmf\controller\AdminBaseController;
use think\Model;
use think\Db;
use app\one\model\OneModel;

class AdminIndexController extends AdminBaseController
{
    public function index()
    {
        //return "Hello ThinkCMF!";


        return $this->fetch();
    }


    public  function  addPost(){
        $data   = $this->request->param();
        dump($data);
        $game_id=$data['game_id'];

        $domain=$this->request->domain();
//        $file=$_SERVER['DOCUMENT_ROOT'].'/' .implode($data['file_urls']);
        $file=implode($data['file_urls']);
        $file2=cmf_get_asset_url($file);
        dump($file2);
//        dump($file);
//       $file_url= $domain ."/". $file;
        $content = file_get_contents( $file2);
        $contents= explode(",",$content);
        dump($contents);
        $OneModel = new OneModel();
        for($x=0;$x<count($contents);$x++)
        {
            $code= $contents[$x];
            echo $code;
           $data['game_id']=$game_id;
            $data['code']=$code;
            $OneModel->allowField(true)->data($data,true)->isUpdate(false)->save();

            echo "<br>";

        }

//        foreach ($contents as $game_id => $v)//遍历循环
//        {
//            $game_iid = $game_id;
//            dump($game_iid);
//            $code = $v;
//        }
//        $content = file_get_contents( );
//      echo( $file_url);



    }

}
