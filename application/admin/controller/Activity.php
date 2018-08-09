<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/8/8
 * Time: 11:57
 */

namespace app\admin\controller;


use think\Db;

class Activity extends Admin
{
    public function index(){

//        $list = Db::name('Property')->select();
        $list = Db::name('Activity')->paginate(3);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('_page', $page);
        $this->assign('meta_title' , '报修管理');
        return $this->fetch();
    }
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
                $this->success('新增成功', url('index'));
                //记录行为
//                action_log('update_channel', 'channel', $data->id, UID);
            } else {
                $this->error($Property->getError());
            }
        } else {

            $this->assign('info', null);

            return $this->fetch('add');

        }

    }
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Property = \think\Db::name("property");
            //自动验证
            $validate = validate('property');
            if(!$validate->check($postdata)){
                return $this->error($validate->getError());
            }
            $data = $Property->update($postdata);

            if($data !== false){
                $this->success('修改成功', url('index'));
            } else {
                $this->error('修改失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('property')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

//            $pid = input('get.pid', 0);
//            //获取父导航
//            if(!empty($pid)){
//                $parent = \think\Db::name('Channel')->where(array('id'=>$pid))->field('title')->find();
//                $this->assign('parent', $parent);
//            }

//            $this->assign('pid', $pid);
            $this->assign('info', $info);
//            $this->meta_title = '编辑导航';
            return $this->fetch();
        }

    }
    public function del($id){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Property')->where($map)->delete()){
//            session('admin_menu_list',null);
//            //记录行为
//            action_log('update_menu', 'Menu', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }

    }

}