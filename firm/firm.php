<?php
error_reporting(E_ERROR);
require_once("../Mpdo.php");
require_once("../Pagination.php");
$conf = include_once("../config.php");
$mysql = new Mpdo();
$db = $mysql->connect($conf['database']);

//if (isset($_GET['p']) && !empty(intval($_GET['p']))) {
//    $page = intval($_GET['p']);
//} else {
//    $page = 1;
//}
//if ($page < 1) $page = 1;
//
//$search = trim($_GET['s']);
//$where = 'WHERE 1=1';
//$query_str = [];
//if (!empty($search)) {
//    if (preg_match("/[^0-9]+/is", $search)) {
//        $where .= " AND `username` like '{$search}%'";
//    } else {
//        $where .= " AND `phone`='{$search}'";
//    }
//    $query_str['s'] = $search;
//}
//
//$pagesize = 20;
//
//$res = $db->count("SELECT count(`id`) AS `total` FROM `firm` " . $where);
//$pagetotal = ceil($res['total'] / $pagesize);
//
//if ($pagetotal > 0) {
//    if ($page > $pagetotal) $page = $pagetotal;
//}
//
//$offset = ($page - 1) * $pagesize;
//
//$page_link = [];
//if (1 < $pagetotal) {
//
//    $pagination = new Pagination();
//
//    $pagination->config([
//        'base_url' => '/index.php',
//        'pagetotal' => $pagetotal,
//        'cur_page' => $page,
//        'query_str' => $query_str,
//        'show_link_nums' => 5
//    ]);
//
//    $page_link = $pagination->create_links('array');
//}

$sql = "SELECT * FROM `firm` ORDER BY `id` DESC";
$data = $db->query($sql)->row_all();
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
    <style>
        .edit-goal {
            cursor: pointer;
        }
    </style>
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
                    <a href="../category/category.php" class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-table"></i>
                        <span>货品分类</span>
                        <!-- 列表打开状态的i标签添加 tpl-left-nav-more-ico-rotate 图表即90°旋转  -->
                        <!--                  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i> -->
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="../firm/firm.php" class="nav-link tpl-left-nav-link-list active">
                        <i class="am-icon-wpforms"></i>
                        <span>进货商信息</span>
                        <!-- <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> -->
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            进货商信息列表
        </div>
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 列表
                </div>
                <!--                <div class="tpl-portlet-input tpl-fz-ml">-->
                <!--                    <div class="portlet-input input-small input-inline">-->
                <!--                        <div class="input-icon right">-->
                <!--                            <i class="am-icon-search"></i>-->
                <!--                            <input type="text" class="form-control form-control-solid" placeholder="搜索..."></div>-->
                <!--                    </div>-->
                <!--                </div>-->
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
                    <!--                    <div class="am-u-sm-12 am-u-md-3">-->
                    <!--                        <div class="am-form-group">-->
                    <!--                            <select data-am-selected="{btnSize: 'sm'}">-->
                    <!--                                <option value="option1">所有类别</option>-->
                    <!--                                <option value="option2">IT业界</option>-->
                    <!--                                <option value="option3">数码产品</option>-->
                    <!--                                <option value="option3">笔记本电脑</option>-->
                    <!--                                <option value="option3">平板电脑</option>-->
                    <!--                                <option value="option3">只能手机</option>-->
                    <!--                                <option value="option3">超极本</option>-->
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
<!--                    <div class="am-u-sm-12 am-u-md-3">-->
<!--                        <form action="./index.php" method="get" class="am-input-group am-input-group-sm">-->
<!--                            <input style="width:120px;" name="s" value="--><?//= trim($_GET['s']) ?><!--" type="text"-->
<!--                                   class="am-form-field" placeholder="姓名或者手机号">-->
<!--                            <span class="am-input-group-btn">-->
<!--            <input class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search"-->
<!--                   type="submit" value="查询">-->
<!--          </span>-->
<!--                        </form>-->
<!--                    </div>-->
                    <!--                </div>-->
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                    <tr>
                                        <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                        <th class="table-id">ID</th>
                                        <th class="table-title">进货商名称</th>
                                        <th class="table-type">手机号</th>
                                        <th class="table-author am-hide-sm-only">联系人名称</th>
                                        <th class="table-date am-hide-sm-only">地址</th>
                                        <th class="table-set">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $k => $v): ?>
                                        <tr class="edit-goal-tr" uid="<?=$v['id']?>">
                                            <td><input type="checkbox"></td>
                                            <td><?= $v['id'] ?></td>
                                            <td><?= $v['name'] ?></td>
                                            <td><?= $v['phone'] ?></td>
                                            <td class="edit-goal"><?= $v['username'] ?></td>
                                            <td class="am-hide-sm-only"><?= $v['address'] ?></td>
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
                                <?php if (!empty($page_link)): ?>
                                    <div class="am-cf">
                                        <div class="am-fr">
                                            <ul class="am-pagination tpl-pagination">
                                                <?php if (isset($page_link['first_page'])): ?>
                                                    <li>
                                                        <a href="<?= $page_link['base_url'] ?>?<?= $page_link['first_page'] ?>">«</a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php foreach ($page_link['loop_page'] as $k => $v): ?>
                                                    <li<?php if ($k == $page_link['cur_page']): ?> class="am-active"<?php endif; ?>><?php if ($k != $page_link['cur_page']): ?>
                                                            <a
                                                            href="<?= $page_link['base_url'] ?>?<?= $v ?>"><?= $k ?></a><?php else: ?>
                                                            <span style="border-radius: 3px;
    padding: 6px 12px;"><?= $k ?></span><?php endif; ?></li>
                                                <?php endforeach; ?>
                                                <?php if (isset($page_link['last_page'])): ?>
                                                    <li>
                                                        <a href="<?= $page_link['base_url'] ?>?<?= $page_link['last_page'] ?>">»</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                        window.location = "firm.php";
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    });
</script>
</html>
