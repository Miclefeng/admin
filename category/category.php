<?php
error_reporting(E_ERROR);
require_once("../Mpdo.php");
require_once("../Pagination.php");
$conf = include_once("../config.php");
$mysql = new Mpdo();
$db = $mysql->connect($conf['database']);

$sql = "SELECT * FROM `category` ORDER BY `pid` ASC,`id` ASC";
$data = $db->query($sql)->row_all();

$category = [];
foreach ($data as $k => $v){
    $category[$v['id']]['id'] = $v['id'];
    $category[$v['id']]['name'] = $v['name'];
    if(isset($category[$v['pid']])){
        $category[$v['id']]['parent'] = $category[$v['pid']]['name'];
    }
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
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="../assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="../assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body data-type="generalComponents">
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="../index.php" class="nav-link">
                        <i class="am-icon-home"></i>
                        <span>会员信息</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="../goods/goods.php" class="nav-link tpl-left-nav-link-list">
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
                    <a href="../firm/firm.php" class="nav-link tpl-left-nav-link-list ">
                        <i class="am-icon-wpforms"></i>
                        <span>进货商信息</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            货品分类信息列表
        </div>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 列表
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <a href="operation.php" class="am-btn am-btn-default am-btn-success"><span
                                            class="am-icon-plus"></span> 新增
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                    <tr>
                                        <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                        <th class="table-id">ID</th>
                                        <th class="table-title">分类名称</th>
                                        <th class="table-type">所属分类</th>
                                        <th class="table-set">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($category as $k => $v): ?>
                                        <tr class="edit-goal-tr" uid="<?= $v['id'] ?>">
                                            <td><input type="checkbox"></td>
                                            <td><?= $v['id'] ?></td>
                                            <td><?= $v['name'] ?></td>
                                            <td><?= $v['parent'] ?></td>
                                            <td class="operation">
                                                <div class="am-btn-toolbar edit-delete-btn">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href="operation.php?id=<?= $v['id'] ?>"
                                                           class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                                    class="am-icon-pencil-square-o"></span> 编辑
                                                        </a>
                                                        <a uid="<?= $v['id'] ?>"
                                                           class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delete-user">
                                                            <span class="am-icon-trash-o"></span> 删除
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/amazeui.min.js"></script>
    <script src="../assets/js/app.js"></script>
</body>
<script type="application/javascript">
    $(".delete-user").click(function () {
        if (confirm('你确定要删除吗？')) {
            var id = $(this).attr('uid');
            $.ajax({
                type: "POST",
                url: "delete.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (data) {
                    if (data.status == 2000) {
                        alert(data.msg);
                        window.location = "category.php";
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    });
</script>
</html>
