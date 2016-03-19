<?php 
/**************************************************
* 功能：检查教务管理系统账密，用于身份认证
* 接口：u - 学号 ， p = 密码
* 输出：status : 检查状态
*        data : 学生个人资料详细信息，error时为空
*         msg : 错误讯息
*            1. password is wrong. 密码错误
*            2. user not found. 学号错误
*            3. user has graduated. 该学号已毕业
*            4. not enough arguments. 参数不足
***************************************************/

use api\module\zfxk2 as zfxk;

require_once(dirname(dirname(__FILE__))."/header.php");
require_once(dirname(dirname(__FILE__))."/module/zfxk2.php");

$error = "";
$json = "";

if (!isset($_GET["u"]) && !isset($_GET["p"])) 
{
	echo json_encode(array(
        "status" => "error", 
        "data" => null, 
        "msg" => "not enough arguments."
    ));
}
else {
    $id = $_GET["u"];
    $passwd = $_GET["p"];
    $cookies = zfxk::Login($id, $passwd, $error);
    if(false != $cookies) $detail = zfxk::Detail($cookies, $id, $error);

    if (false == $cookies || false == $detail || $error != "")
    {
        echo json_encode(array(
            "status" => "error",
            "data" => null,
            "msg" => $error,
        ), JSON_UNESCAPED_UNICODE);
    }
    else {
        echo json_encode(array(
            "status" => "ok",
            "data" => $detail,
            "msg" => "",
        ), JSON_UNESCAPED_UNICODE);
    }
}
