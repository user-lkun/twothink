<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/8/8
 * Time: 11:57
 */

namespace app\home\controller;


use app\home\controller\Home;
use think\Db;

class Property extends Home
{
    public function add(){

        if(request()->isPost()){
            $Property = model('property');
            $post_data=\think\Request::instance()->post();
            //自动验证
            $validate = validate('property');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $data = $Property->create($post_data);
            if($data){
                $this->success('新增成功', url('/home/index'));
//                记录行为
//                action_log('update_channel', 'channel', $data->id, UID);
            } else {
                $this->error($Property->getError());
            }
        } else {
            if ( !is_login() ) {//检测是否登录
                $this->error( '您还没有登陆',url('/user/login') );
            }

            $this->assign('info', null);

            return $this->fetch('add');

        }

    }


}