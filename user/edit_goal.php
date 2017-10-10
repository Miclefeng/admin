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

if(!empty(intval($_POST['id'])) && !empty(intval($_POST['goal'])) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $mysql = new Mpdo();
    $db = $mysql->connect($conf['database']);
    $id = intval($_POST['id']);
    $goal = intval($_POST['goal']);
    $sql = "UPDATE `user` SET `goal`='{$goal}' WHERE `id`={$id}";
    $res = $db->update($sql);
    if($res){
        echo json_encode(['status' => 2000, 'msg' => '修改积分成功！']);
    }else{
        echo json_encode(['status' => 5000, 'msg' => '修改积分失败！']);
    }
}
?>
