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

if(!empty(intval($_POST['id'])) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $mysql = new Mpdo();
    $db = $mysql->connect($conf['database']);
    $id = intval($_POST['id']);
    $sql = "SELECT `id` FROM `category` WHERE `pid`={$id}";
    $res = $db->query($sql)->row_all();
    if(!empty($res)){
        echo json_encode(['status' => 5001, 'msg' => '请先删除子分类再删除顶级分类！']);
        exit();
    }
    $sql = "DELETE FROM `category` WHERE `id`={$id}";
    $res = $db->delete($sql);
    if($res){
        echo json_encode(['status' => 2000, 'msg' => '删除成功！']);
    }else{
        echo json_encode(['status' => 5000, 'msg' => '删除失败！']);
    }
}
?>
