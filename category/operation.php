<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/8
 * Time: 9:56
 */
error_reporting(E_ERROR);
require_once("../Mpdo.php");
$conf = include_once("../config.php");
$mysql = new Mpdo();
$db = $mysql->connect($conf['database']);

$sql = "SELECT * FROM `category` WHERE `pid`=0 ORDER BY `id` DESC";
$category = $db->query($sql)->row_all();

if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $data['name'] = (isset($_POST['name']) && !empty($_POST['name'])) ? trim($_POST['name']) : '' ;
    if(empty($data['name'])){
        echo '<script>alert("请输入分类名称！");window.history.go(-1);</script>>';
        exit();
    }
    $data['parent'] = (isset($_POST['parent']) && !empty($_POST['parent'])) ? intval($_POST['parent']) : 0 ;

    if(isset($_POST['id']) && !empty(intval($_POST['id']))){
        $id = intval($_POST['id']);
        $sql = "UPDATE `category` SET `name`=?,`pid`=? WHERE `id`={$id}";
        $res = $db->update($sql,array_values($data));
        if($res){
            echo '<script>alert("修改分类信息成功！");window.location = "category.php";</script>>';
            exit();
        }else{
            echo '<script>alert("修改分类信息失败！");window.history.go(-1);</script>>';
            exit();
        }
    }else{
        $sql = "INSERT INTO `category` (`name`,`pid`) VALUES (?,?)";
        $res = $db->insert($sql,array_values($data));
        if($res){
            echo '<script>alert("添加分类信息成功！");window.location = "category.php";</script>>';
            exit();
        }else{
            echo '<script>alert("添加分类信息失败！");window.history.go(-1);</script>>';
            exit();
        }
    }

}

if(!empty(intval($_GET['id'])) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `category` WHERE `id`={$id}";
    $cateInfo = $db->query($sql)->row_one();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="../assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="../assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <style>
        select{
            display: block;
            width: 100%;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857;
            color: #4d6b8a;
            background-color: #fff;
            background-image: none;
            border: 1px solid #c2cad8;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            background: 0 0;
            border: 0;
            border-bottom: 1px solid #c2cad8;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
            border-radius: 0;
            color: #555;
            box-shadow: none;
            padding-left: 0;
            padding-right: 0;
            font-size: 14px;
            -webkit-appearance: none!important;
            -moz-appearance: none!important;
            -webkit-border-radius: 0;
            background: #fff url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zd…J2ZSI+PHBvbHlnb24gcG9pbnRzPSI1Ljk5MiwwIDIuOTkyLDMgLTAuMDA4LDAgIi8+PC9zdmc+) no-repeat 100% center;
        }
    </style>
</head>
<body data-type="generalComponents">
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="../index.php" class="nav-link ">
                        <i class="am-icon-home"></i>
                        <span>会员信息</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="../goods/goods.php" class="nav-link tpl-left-nav-link-list ">
                        <i class="am-icon-bar-chart"></i>
                        <span>货品信息</span>
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <!-- 打开状态 a 标签添加 active 即可   -->
                    <a href="../category/category.php" class="nav-link tpl-left-nav-link-list active">
                        <i class="am-icon-table"></i>
                        <span>货品分类</span>
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="../firm/firm.php" class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-wpforms"></i>
                        <span>进货商信息</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            <?php
            if(isset($_GET['id']) && !empty(intval($_GET['id']))){
                echo '修改分类信息';
            }else{
                echo '添加分类信息';
            }
            ?>
        </div>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 表单
                </div>
                <div class="tpl-portlet-input tpl-fz-ml">
                    <div class="portlet-input input-small input-inline">
                    </div>
                </div>
            </div>
            <div class="tpl-block">

                <div class="am-g">
                    <div class="tpl-form-body tpl-form-line">
                        <form action="operation.php" method="post" class="am-form tpl-form-line-form">
                            <input type="hidden" name="id" value="<?=intval($_GET['id'])?>">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label"> 分类名称 <span class="tpl-form-line-small-title">Category</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="name" value="<?=$cateInfo['name']?>" class="tpl-form-input" id="user-name" placeholder="请输入分类名称">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label"> 所属分类 <span class="tpl-form-line-small-title"> Belong </span></label>
                                <div class="am-u-sm-9">
                                    <select name="parent">
                                        <option value="0">-- 顶级分类 --</option>
                                        <?php foreach ($category as $k => $v):?>
                                            <option value="<?=$v['id']?>" <?php if($v['id'] == $cateInfo['pid']):?>selected<?php endif;?>>-- <?=$v['name']?> --</option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success " name="提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/amazeui.min.js"></script>
<script src="../assets/js/app.js"></script>
</body>
</html>
