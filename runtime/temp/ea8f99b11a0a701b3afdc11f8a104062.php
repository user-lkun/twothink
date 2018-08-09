<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"F:\twothink\public/../application/admin/view/default/auth_manager\tree.html";i:1496373782;}*/ ?>
<?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
<dl class="cate-item">
    <dt class="cf">
    <div class="fold"><i></i></div>
    <label>
        <div class="order"> <input class="cate_id" type="checkbox" name="cid[]" value="<?php echo $list['id']; ?>"></div>
        <div class="name">
            <span class="tab-sign"></span>
            <?php echo $list['title']; ?>
            <span class="help-inline msg"></span>
        </div>
    </label>
    </dt>
    <?php if(!(empty($list['_']) || (($list['_'] instanceof \think\Collection || $list['_'] instanceof \think\Paginator ) && $list['_']->isEmpty()))): ?>
      <dd>
        <?php echo action('AuthManager/tree', array($list['_'])); ?>
      </dd>
    <?php endif; ?>
</dl>
<?php endforeach; endif; else: echo "" ;endif; ?>
