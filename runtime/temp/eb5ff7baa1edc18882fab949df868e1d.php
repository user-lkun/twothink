<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"F:\twothink\public/../application/home/view/default/article\lists.html";i:1533816387;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static2/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static2/css/style.css" rel="stylesheet">


    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <div class="container-fluid">
        <div class="row noticeList">
            <a href="<?php echo url('Article/detail?id='.$data['id']); ?>">
            <div class="col-xs-2">
                <img class="img-thumbnail" src="__ROOT__<?php echo get_cover_path($data['cover_id']); ?>" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?php echo $data['title']; ?></p>
                <p class="intro"><?php echo $data['description']; ?></p>
                <p class="info">浏览: <?php echo $data['view']; ?> <span class="pull-right"><?php echo $data['create_time']; ?></span> </p>
            </div>
            </a>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <div style="text-align: center">
        <!--<a id="more" href="<?php echo url('Article/lists?category=43&p=2'); ?>">显示更多</a>-->
    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static2/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static2/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>