<?php
 
namespace app\home\validate;
use think\Validate; 

class Property extends Validate{
     
    protected $rule = [ 
        ['title', 'require', '标题不能为空'],
        ['name', 'require', '姓名不能为空'],
        ['tel', 'require', '电话不能为空'],
        ['addr', 'require', '地址不能为空'],
        ['content', 'require', '报修内容不能为空'],
    ];
}