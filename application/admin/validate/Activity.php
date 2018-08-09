<?php
 
namespace app\admin\validate;
use think\Validate; 

class Activity extends Validate{
     
    protected $rule = [ 
        ['title', 'require', '标题不能为空'],
        ['content', 'require', '通知内容不能为空'],
    ];
}