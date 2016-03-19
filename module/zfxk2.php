<?php
namespace api\module;

use api\lib\curl as curl;

require_once(dirname(dirname(__FILE__))."/lib/curl.php");

<<<<<<< HEAD

class zfxk2
{
    static $host = "113.106.49.220/zfxk2";

    # ###########################################
    # 登录教务管理系统
    # [in]  $user - 学号
    # [in]  $passwd - 密码
    # [out] $error - 返回错误
    # [return] false - 登录失败，成功返回网页cookies
=======
class zfxk2
{
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
	static function Login($user, $passwd, &$error)
	{
		$error = "";
		$cookies = dirname(dirname(__FILE__))."/cookies/zfxk2.login.".date("Ymdhis").".cookie";
		$data = '__VIEWSTATE=dDwxOTA0NTQ3NDgwO3Q8O2w8aTwxPjs%2BO2w8dDw7bDxpPDg%2BO2k8MTM%2BO2k8MTU%2BOz47bDx0PHA8O3A8bDxvbmNsaWNrOz47bDx3aW5kb3cuY2xvc2UoKVw7Oz4%2BPjs7Pjt0PHA8bDxWaXNpYmxlOz47bDxvPGY%2BOz4%2BOzs%2BO3Q8cDxsPFZpc2libGU7PjtsPG88Zj47Pj47Oz47Pj47Pj47bDxpbWdETDtpbWdUQztpbWdRTU07Pj7x6PjbnkVn3z9hXf5cLw0NJt%2FfaQ%3D%3D&tbYHM='.$user.'&tbPSW='.$passwd.'&ddlSF=%D1%A7%C9%FA&imgDL.x=25&imgDL.y=12';

<<<<<<< HEAD
		$url = 'http://'.zfxk2::$host.'/default3.aspx';
        curl::Curl($url, $cookies, true, "");
		$html = curl::encoding(curl::Cookies($url, $cookies, $data), "gbk"); // 取得cookies
		if(strpos($html, "密码不正确,若密码忘记请到各系教务办初始化密码！！"))
		{
			$error = "password is wrong.";
			return false;
=======
		$url = "http://113.106.49.220/zfxk2/default3.aspx"	;
		$html = curl::encoding(curl::Cookies($url, $cookies, $data), "gbk"); // 取得cookies
		if(strpos($html, "密码不正确,若密码忘记请到各系教务办初始化密码！！"))
		{
			$error = "password or user is wrong.";
			return "";
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
		}
		else if(strpos($html, "用户不存在或者学籍状态为空！请查证后再试！"))
		{
			$error = "user not found.";
<<<<<<< HEAD
			return false;
=======
			return "";
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
		}
		else if(strpos($html, "学籍状态为毕业！无法登陆系统"))
		{
			$error = "user has graduated.";
<<<<<<< HEAD
			return false;
=======
			return "";
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
		}
		return $cookies;
	}
	
<<<<<<< HEAD
    # ###########################################
    # 解析个人信息
    # [in]  $cookies - 登录cookies
    # [in]  $id - 学号
    # [out] $error - 返回错误
    # [return] false - 获取失败，成功返回学生详细信息数组
    static function Detail($cookies, $id, &$error)
	{
		if("" == $cookies || !file_exists($cookies))
		{
			$error = "cookies not found : use login() first.";
			return false;
		}

		if("" == $id)
		{
			$error = "id are empty.";
			return false;
		}

		$detail = array();
		$url = 'http://'.zfxk2::$host.'/xsgrxx.aspx?xh='.$id;
		$html = curl::encoding(curl::Get($url, $cookies), "gbk");
		$regex = array(
			'name' 			=> '/<span id="xm">(.*?)<\/span>/',
			'sex' 			=> '/<span id="xb">(.*?)<\/span>/',
			'college' 		=> '/<span id="xymc">(.*?)<\/span>/',
			'class' 		=> '/<span id="bjmc">(.*?)<\/span>/',
			'dorm' 			=> '/name="txtSSH" type="text" value="(.*?)"/',
			'telphone' 		=> '/name="txtJCLXDH" type="text" value="(.*?)"/',
			'birthday' 		=> '/name="txtCSRQ" type="text" value="(.*?)"/',
			'address' 		=> '/name="txtJtdZ" type="text" value="(.*?)"/',
			'email' 		=> '/name="txtEMLDZ" type="text" value="(.*?)"/',
			'qq' 			=> '/name="txtQQ" type="text" value="(.*?)"/',
			'idCard' 		=> '/<span id="sfzh">(.*?)<\/span>/',
			'year' 			=> '/<span id="dqszj">(.*?)<\/span>/',
			'nation' 		=> '/<span id="mz">(.*?)<\/span>/',
			'political' 	=> '/<span id="zzmm">(.*?)<\/span>/',
			'hometown' 		=> '/name="txtJG" type="text" value="(.*?)"/',
			'birthtown' 	=> '/name="txtCSD" type="text" value="(.*?)"/',
		);

		foreach ($regex as $key => $value)
		{
			$detail[$key] = "";
			if(preg_match_all($value, $html, $matches))
			{
				$detail[$key] = $matches[1][0];
			}
		}
		return $detail;
	}
    
=======
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
	static function Info($cookies, $id, $name, &$error)
	{
		if("" == $cookies || !file_exists($cookies))
		{
			$error = "cookies not found : use login() first.";
			return "";
		}
	
		if("" == $id && "" == $name)
		{
			$error = "id and name are both empty.";
			return "";
		}
	
		$_viewstate = "dDwxODk1MDc5NTg1O3Q8cDxsPFhZTUM7eHlkbTtKUztDWkZXOz47bDw7Ozs7Pj47bDxpPDE%2bOz47bDx0PDtsPGk8MT47aTwzPjtpPDU%2bO2k8Nz47aTw5PjtpPDExPjtpPDEzPjtpPDI5PjtpPDMxPjtpPDM1PjtpPDM3Pjs%2bO2w8dDxwPHA8bDxUZXh0Oz47bDzns7s7Pj47Pjs7Pjt0PHQ8cDxwPGw8RGF0YVRleHRGaWVsZDtEYXRhVmFsdWVGaWVsZDs%2bO2w8eHltYzt4eWRtOz4%2bOz47dDxpPDEwPjtAPFxlO%2bi0oue7j%2bWtpumZojvnlLXlrZDkuI7pgJrkv6HlrabpmaI75py655S15bel56iL5a2m6ZmiO%2biuoeeul%2bacuuWtpumZojvkuqTpgJrkuI7njq%2flooPlrabpmaI76L2v5Lu25a2m6ZmiO%2bWVhuWKoeeuoeeQhuWtpumZojvmlbDlrZflqpLkvZPlrabpmaI75bqU55So5aSW6K%2bt5a2m6ZmiOz47QDwwOzE0OzA4OzExOzA5OzEyOzA3OzEzOzEwOzE1Oz4%2bO2w8aTwwPjs%2bPjs7Pjt0PHQ8cDxwPGw8RGF0YVRleHRGaWVsZDtEYXRhVmFsdWVGaWVsZDs%2bO2w8enltYzt6eWRtOz4%2bOz47dDxpPDEyMT47QDxcZTvmiqXlhbPkuI7lm73pmYXotKfov5AoM%2bW5tOWItik76LSi5Yqh5L%2bh5oGv566h55CG77yIM%2bW5tOWItu%2b8iTvln47luILovajpgZPkuqTpgJrovabovobvvIgy5bm077yJO%2bWfjuW4gui9qOmBk%2bS6pOmAmui%2fkOiQpeeuoeeQhigz5bm05Yi2KTvln47luILovajpgZPkuqTpgJrov5DokKXnrqHnkIbvvIgy5bm05Yi277yJO%2beUteiEkeiJuuacr%2biuvuiuoe%2b8iDLlubTliLbvvIk755S16ISR6Im65pyv6K6%2b6K6h77yIM%2bW5tOW5s%2bmdouiuvuiuoe%2b8iTvnlLXohJHoibrmnK%2forr7orqHvvIgz5bm05a6k5YaF6K6%2b6K6h77yJO%2beUteiEkeiJuuacr%2biuvuiuoe%2b8iDPlubTliLbvvIk755S16ISR6Im65pyv6K6%2b6K6h77yIM%2bW5tOWItuW3peS4muiuvuiuoe%2b8iTvnlLXop4boioLnm67liLbkvZzvvIgy5bm05Yi277yJO%2beUteinhuiKguebruWItuS9nO%2b8iDPlubTliqjmvKvorr7orqHvvIk755S16KeG6IqC55uu5Yi25L2c77yIM%2bW5tOWItu%2b8iTvnlLXlrZDmtYvph4%2fmioDmnK%2fkuI7ku6rlmagoM%2bW5tOWItik755S15a2Q5ZWG5Yqh77yIMuW5tOWItu%2b8iTvnlLXlrZDllYbliqHvvIgz5bm05Yi277yJO%2beUteWtkOS%2foeaBr%2bW3peeoi%2baKgOacrygz5bm05Yi2KTvnlLXlrZDkv6Hmga%2flt6XnqIvmioDmnK%2fvvIgy5bm05Yi25LiJ5LqM5YiG5q6177yJO%2bWKqOa8q%2biuvuiuoeS4juWItuS9nCgz5bm05Yi2KTvlt6XllYbkvIHkuJrnrqHnkIbvvIgz5bm05Yi277yJO%2bWFieeUteWtkOaKgOacr%2b%2b8iDPlubTliLbvvIk75Zu96ZmF5ZWG5Yqh77yIM%2bW5tOWItu%2b8iTvnjq%2flooPlt6XnqIvmioDmnK%2fvvIgz5bm05Yi277yJO%2bS8muiuoeeUteeul%2bWMlu%2b8iDLlubTliLbvvIk75Lya6K6h55S1566X5YyW77yIM%2bW5tOWItu%2b8iTvmv4DlhYnliqDlt6XmioDmnK%2fvvIgz5bm05Yi277yJO%2biuoeeul%2bacuuWkmuWqkuS9k%2baKgOacr%2b%2b8iDLlubTliLbvvIk76K6h566X5py65aSa5aqS5L2T5oqA5pyv77yIM%2bW5tOWItu%2b8iTvorqHnrpfmnLrlpJrlqpLkvZPmioDmnK%2fvvIgz5bm05Yi25Lqk5LqS6K6%2b6K6h77yJO%2biuoeeul%2bacuui%2bheWKqeiuvuiuoeS4juWItumAoCgz5bm05Yi25qih5YW3KTvorqHnrpfmnLrovoXliqnorr7orqHkuI7liLbpgKAoM%2bW5tOWItuaVsOaOpyk76K6h566X5py66L6F5Yqp6K6%2b6K6h5LiO5Yi26YCg77yIMuW5tOWItjMrMuWIhuaute%2b8iTvorqHnrpfmnLrovoXliqnorr7orqHkuI7liLbpgKDvvIgz5bm05Yi277yJO%2biuoeeul%2bacuui%2bheWKqeiuvuiuoeS4juWItumAoO%2b8iDPlubTliLbmqKHlhbfnibnoibLnj63vvIk76K6h566X5py65o6n5Yi25oqA5pyvKDPlubTltYzlhaXlvI%2fns7vnu58pO%2biuoeeul%2bacuuaOp%2bWItuaKgOacrygz5bm05Yi2KTvorqHnrpfmnLrmjqfliLbmioDmnK8oM%2bW5tOWItuiHquWKqOWMlik76K6h566X5py65o6n5Yi25oqA5pyv77yIMuW5tOWItuacuuWZqOS6ujMrMuaWueWQke%2b8iTvorqHnrpfmnLrmjqfliLbmioDmnK%2fvvIgz5bm05rG96L2m55S15a2Q77yJO%2biuoeeul%2bacuuaOp%2bWItuaKgOacr%2b%2b8iDPlubTliLbmnLrnlLXkuIDkvZPljJbvvIk76K6h566X5py65o6n5Yi25oqA5pyv77yIM%2bW5tOWItuacuuWZqOS6uu%2b8iTvorqHnrpfmnLrnvZHnu5zmioDmnK8oM%2bW5tOe9kee7nOe8lueoiyk76K6h566X5py6572R57uc5oqA5pyvKDPlubTns7vnu5%2fpm4bmiJDkuI7lt6XnqIvorr7orqEpO%2biuoeeul%2bacuue9kee7nOaKgOacr%2b%2b8iDLlubTliLbvvIk76K6h566X5py6572R57uc5oqA5pyv77yIMuW5tOWItuS4ieS6jOWIhuaute%2b8iTvorqHnrpfmnLrnvZHnu5zmioDmnK%2fvvIgz5bm0572R566h77yJO%2biuoeeul%2bacuue9kee7nOaKgOacr%2b%2b8iDPlubTliLbvvIk76K6h566X5py65L%2bh5oGv566h55CGKDPlubTliLYpO%2biuoeeul%2bacuuS%2foeaBr%2beuoeeQhu%2b8iDPlubTliLbmlbDmja7lupPov5Dnu7TkuI7lupTnlKjvvIk76K6h566X5py65L%2bh5oGv566h55CG77yIM%2bW5tOWItuezu%2be7n%2bW8gOWPkeS4juW6lOeUqO%2b8iTvorqHnrpfmnLrlupTnlKjmioDmnK8oMuW5tOWItuWkmuWqkuS9k%2b%2b8iTvorqHnrpfmnLrlupTnlKjmioDmnK8oMuW5tOWItue9keeuoSk76K6h566X5py65bqU55So5oqA5pyvKDPlubTliLbnvZHnrqEpO%2biuoeeul%2bacuuW6lOeUqOaKgOacrygz5bm05Yi25L%2bh5oGv566h55CGKTvorqHnrpfmnLrlupTnlKjmioDmnK%2fvvIgz5bm05Yi277yJO%2bW7uuetkeW3peeoi%2beuoeeQhigz5bm05Yi2KTvlu7rnrZHlt6XnqIvnrqHnkIYoM%2bW5tOWItuS%2foeaBr%2bWMlik75bu6562R5bel56iL566h55CGKDPlubTliLblm63mnpfmma%2fop4LvvIk75bu6562R5bel56iL566h55CG77yIMuW5tOWupOWGheajgOaOp%2b%2b8iTvlu7rnrZHlt6XnqIvnrqHnkIbvvIgz5bm05Yi25bu6562R5bel56iL5oqA5pyv77yJO%2bW7uuetkeW3peeoi%2beuoeeQhu%2b8iDPlubTliLblm63mnpflt6XnqIvmioDmnK%2fvvIk76YeR6J6N566h55CG5LiO5a6e5YqhKDLlubTliLbnvZHnu5zph5Hono3vvIk76YeR6J6N566h55CG5LiO5a6e5YqhKDLlubTliLbkv6Hmga%2fmioDmnK%2fvvIk76YeR6J6N566h55CG5LiO5a6e5YqhKDPlubTliLbnvZHnu5zph5Hono0pIDvph5Hono3nrqHnkIbkuI7lrp7liqHvvIgz5bm05Yi277yJO%2baXhea4uOiLseivrSgz5bm05Yi2KTvmsb3ovabnlLXlrZDmioDmnK8oMuW5tOWItjMrMuaWueWQkSk75rG96L2m55S15a2Q5oqA5pyvKDPlubTliLYpO%2baxvei9pueUteWtkOaKgOacrygz5bm05Yi2KTvltYzlhaXlvI%2fmioDmnK%2fkuI7lupTnlKjvvIgz5bm05Yi277yJO%2bi9r%2bS7tua1i%2bivleaKgOacr%2b%2b8iDPlubTliLbvvIk76L2v5Lu25oqA5pyvKDLlubRDIyk76L2v5Lu25oqA5pyvKDLlubRWQi5ORVQpO%2bi9r%2bS7tuaKgOacrygy5bm055Sy6aqo5paH6aG555uuKTvova%2fku7bmioDmnK8oMuW5tOaJi%2bacuua4uOaIjyk76L2v5Lu25oqA5pyvKDLlubTnvZHnu5zmuLjmiI8pO%2bi9r%2bS7tuaKgOacrygy5bm05Yi25ri46L2v77yJO%2bi9r%2bS7tuaKgOacrygz5bm0Q%2bivreiogCk76L2v5Lu25oqA5pyvKDPlubRKYXZh6K%2bt6KiAKTvova%2fku7bmioDmnK8oM%2bW5tOaJi%2bacuua4uOaIjyk76L2v5Lu25oqA5pyvKDPlubTnvZHnu5zmuLjmiI8pO%2bi9r%2bS7tuaKgOacrygz5bm05Yi2Lk5FVCk76L2v5Lu25oqA5pyvKDPlubTliLZPcmFjbGUpO%2bi9r%2bS7tuaKgOacrygz5bm05Yi25ri46L2v77yJO%2bi9r%2bS7tuaKgOacr%2b%2b8iDLlubTliLYzKzLliIbmrrXvvIk76L2v5Lu25oqA5pyv77yIMuW5tOWItu%2b8iTvova%2fku7bmioDmnK%2fvvIgz5bm05Yi277yJO%2bi9r%2bS7tuaKgOacr%2b%2b8iDPlubTliLbnp7vliqjkupLogZTlupTnlKjmioDmnK%2fvvIk75ZWG5Yqh6Iux6K%2bt77yIM%2bW5tOWItu%2b8iTvlrqTlhoXmo4DmtYvkuI7mjqfliLbmioDmnK8oMuW5tOWItik75a6k5YaF5qOA5rWL5LiO5o6n5Yi25oqA5pyv77yIM%2bW5tOWItu%2b8iTvlrqTlhoXmo4DmtYvkuI7mjqfliLbmioDmnK%2fvvIgz5bm05Yi2546v5aKD5bel56iL5oqA5pyv77yJO%2bWupOWGheajgOa1i%2bS4juaOp%2bWItuaKgOacr%2b%2b8iDPlubTliLbnjq%2flooPnm5HmtYvmioDmnK%2fvvIk76YCa5L%2bh5oqA5pyv77yIM%2bW5tOWItu%2b8iTvmipXotYTkuI7nkIbotKLvvIgz5bm05Yi277yJO%2beOqeWFt%2biuvuiuoeS4juWItumAoO%2b8iDPlubTliLbvvIk7572R57uc57O757uf566h55CGKDPlubTliLYpO%2bW%2brueUteWtkOaKgOacr%2b%2b8iDPlubTmsb3ovabnlLXlrZDvvIk75b6u55S15a2Q5oqA5pyv77yIM%2bW5tOWItkZQR0HlupTnlKjkuI7lvIDlj5HvvIk75b6u55S15a2Q5oqA5pyv77yIM%2bW5tOWItklD6K6%2b6K6h77yJO%2bW%2brueUteWtkOaKgOacr%2b%2b8iDPlubTliLbvvIk75paH5YyW5biC5Zy657uP6JCl5LiO566h55CGKDPlubTliLYpO%2baWh%2benmO%2b8iDLlubTliLbkuK3oi7HmlofvvIk75paH56eY77yIM%2bW5tOWItu%2b8iTvmlofnp5jvvIgz5bm05Yi25Lit6Iux5paH77yJO%2beJqea1geeuoeeQhu%2b8iDPlubTliLbvvIk75L%2bh5oGv5a6J5YWo5oqA5pyv77yIM%2bW5tOWItu%2b8iTvnp7vliqjkupLogZTlupTnlKjmioDmnK%2fvvIgz5bm05Yi2QW5kcm9pZO%2b8iTvnp7vliqjkupLogZTlupTnlKjmioDmnK%2fvvIgz5bm05Yi2aU9T77yJO%2benu%2bWKqOS6kuiBlOW6lOeUqOaKgOacr%2b%2b8iDPlubTliLbvvIk756e75Yqo6YCa5L%2bh5oqA5pyv77yIMuW5tOWItu%2b8iTvnp7vliqjpgJrkv6HmioDmnK%2fvvIgz5bm077yJO%2benu%2bWKqOmAmuS%2foeaKgOacr%2b%2b8iDPlubTliLbnlLXkv6HmnI3liqHkuI7nrqHnkIbvvIk75bqU55So55S15a2Q5oqA5pyv77yIMuW5tOWItu%2b8iTvlupTnlKjnlLXlrZDmioDmnK%2fvvIgz5bm05Yi2TEVE54Wn5piO5bel56iL77yJO%2bW6lOeUqOeUteWtkOaKgOacr%2b%2b8iDPlubTliLbvvIk75ri45oiP6L2v5Lu277yIM%2bW5tOaJi%2bacuua4uOaIj%2b%2b8iTvmuLjmiI%2fova%2fku7bvvIgz5bm0572R57uc5ri45oiP77yJO%2bWbreael%2bW3peeoi%2baKgOacr%2b%2b8iDPlubTliLbvvIk76KOF6aWw6Im65pyv6K6%2b6K6h77yIM%2bW5tOWItu%2b8iTs%2bO0A8MDswNTA5OzE0MDE7MDQwNzswNDEwOzA0MDY7MDMxMDswMzExOzAzMTI7MDMwOTsxMDAxOzAzMDg7MDMxNTswMzA3OzAyMTA7MDUwMjswNTAxOzAyMDc7MDgwNTswMzIxOzA1MTA7MDgwNjsxMzAxOzEyMDQ7MDUwNzswNTA2OzExMDQ7MDMwNjswMzIyOzEwMDM7MDQwMzswNDAyOzExMDY7MDQwMTsxMTAzOzA0MDk7MDQwNTswNDA0OzExMDU7MDQwODsxMTAxOzExMDI7MDEyMTswMTIyOzAxMDY7MDkwMTswMTA4OzAxMDU7MDMxODswNzAzOzA3MDI7MDMwMjswMzA0OzAzMDM7MDMwNTswMzAxOzAzMTk7MDMxMzswMzE0OzAzMTc7MDMyNDsxMjAxOzA1MDQ7MDUwNTswNTAzOzA1MTI7MDYwNTsxMjA2OzAyMDg7MDQxMTswMTI1OzAxMjY7MDExMzswMTEyOzAxMTE7MDExNTswMTE0OzAxMDQ7MDExMDswMTA5OzAxMTY7MDExNzswMTE5OzAxMTg7MDEwMzswNzA3OzAxMDI7MDEwMTswNzAxOzA2MDE7MDMyMDswMzIzOzEyMDI7MTIwMzswMjAxOzA1MTE7MDQxMjswMTIwOzAyMDU7MDgwMzswODAyOzAyMDM7MDYwNDswNjAzOzE1MDE7MDYwMjswNTA4OzAxMDc7MDcwNTswNzA2OzA3MDQ7MDIwMjswMjA2OzA4MDQ7MDIwNDswODAxOzAyMDk7MDEyMzswMTI0OzEyMDU7MTAwMjs%2bPjtsPGk8MD47Pj47Oz47dDx0PHA8cDxsPERhdGFUZXh0RmllbGQ7RGF0YVZhbHVlRmllbGQ7PjtsPG5qO25qOz4%2bOz47dDxpPDE0PjtAPFxlOzIwMDM7MjAwNDsyMDA1OzIwMDY7MjAwNzsyMDA4OzIwMDk7MjAxMDsyMDExOzIwMTI7MjAxMzsyMDE0OzIwMTU7PjtAPDA7MjAwMzsyMDA0OzIwMDU7MjAwNjsyMDA3OzIwMDg7MjAwOTsyMDEwOzIwMTE7MjAxMjsyMDEzOzIwMTQ7MjAxNTs%2bPjtsPGk8MD47Pj47Oz47dDx0PHA8cDxsPERhdGFUZXh0RmllbGQ7RGF0YVZhbHVlRmllbGQ7PjtsPGJqbWM7YmpkbTs%2bPjs%2bO3Q8aTwzNDk%2bO0A8XGU7MTPmiqXlhbMzLTHnj607MTPmiqXlhbMzLTLnj607MTPmiqXlhbMzLTPnj607MTPotKLnrqEzLTHnj607MTPotKLnrqEzLTLnj607MTPmtYvph4%2fmioDmnK8zLTHnj607MTPmtYvph4%2fmioDmnK8zLTLnj607MTPln47ovajov5DokKUzLTHnj607MTPln47ovajov5DokKUzLTLnj607MTPln47ovajov5DokKUzLTPnj607MTPnlLXohJHoibrmnK8zLTHnj607MTPnlLXohJHoibrmnK8zLTLnj607MTPnlLXohJHoibrmnK8zLTPnj607MTPnlLXohJHoibrmnK8zLTTnj607MTPnlLXop4boioLnm64zLTHnj607MTPnlLXop4boioLnm64zLTLnj607MTPnlLXlrZDllYbliqEzLTHnj607MTPnlLXlrZDllYbliqEzLTLnj607MTPnlLXlrZDllYbliqEzLTPnj607MTPnlLXlrZDllYbliqEzLTTnj607MTPnlLXlrZDkv6Hmga8zLTHnj607MTPnlLXlrZDkv6Hmga8zLTLnj607MTPliqjmvKvorr7orqEzLTHnj607MTPliqjmvKvorr7orqEzLTLnj607MTPlpJrlqpLkvZPmioDmnK8zLTHnj607MTPlpJrlqpLkvZPmioDmnK8zLTLnj607MTPlpJrlqpLkvZPmioDmnK8zLTPnj607MTPovoXliqnorr7orqEzLTHnj607MTPovoXliqnorr7orqEzLTLnj607MTPovoXliqnorr7orqEzLTPnj607MTPlt6XllYbnrqHnkIYzLTHnj607MTPlt6XllYbnrqHnkIYzLTLnj607MTPlt6XllYbnrqHnkIYzLTPnj607MTPnjq%2flooPlt6XnqIszLTHnj607MTPnjq%2flooPlt6XnqIszLTLnj607MTPkvJrorqEzLTHnj607MTPkvJrorqEzLTLnj607MTPkvJrorqEzLTPnj607MTPkvJrorqEzLTTnj607MTPkvJrorqEzLTXnj607MTPorqHnrpfmnLrlupTnlKgzLTHnj607MTPorqHnrpfmnLrlupTnlKgzLTLnj607MTPorqHnrpfmnLrlupTnlKgzLTPnj607MTPorqHnrpfmnLrlupTnlKgzLTTnj607MTPlu7rnrZHlt6XnqIszLTHnj607MTPlu7rnrZHlt6XnqIszLTLnj607MTPlu7rnrZHlt6XnqIszLTPnj607MTPph5Hono0zLTHnj607MTPph5Hono0zLTLnj607MTPph5Hono0zLTPnj607MTPph5Hono0zLTTnj607MTPmjqfliLbmioDmnK8zLTHnj607MTPmjqfliLbmioDmnK8zLTLnj607MTPmjqfliLbmioDmnK8zLTPnj607MTPml4XmuLjoi7Hor60zLTHnj607MTPml4XmuLjoi7Hor60zLTLnj607MTPml4XmuLjoi7Hor60zLTPnj607MTPmsb3ovabnlLXlrZAzLTHnj607MTPmsb3ovabnlLXlrZAzLTLnj607MTPltYzlhaXmioDmnK8zLTHnj607MTPltYzlhaXmioDmnK8zLTLnj607MTPova%2fku7bmtYvor5UzLTHnj607MTPova%2fku7bmtYvor5UzLTLnj607MTPova%2fku7bmioDmnK8zLTHnj607MTPova%2fku7bmioDmnK8zLTLnj607MTPova%2fku7bmioDmnK8zLTPnj607MTPllYbliqHoi7Hor60zLTHnj607MTPllYbliqHoi7Hor60zLTLnj607MTPllYbliqHoi7Hor60zLTPnj607MTPllYbliqHoi7Hor60zLTTnj607MTPllYbliqHoi7Hor60zLTXnj607MTPlrqTlhoXmo4DmtYszLTHnj607MTPpgJrkv6HmioDmnK8zLTHnj607MTPpgJrkv6HmioDmnK8zLTLnj607MTPpgJrkv6HmioDmnK8zLTPnj607MTPpgJrkv6HmioDmnK8zLTTnj607MTPmipXotYQzLTHnj607MTPmipXotYQzLTLnj607MTPmipXotYQzLTPnj607MTPnjqnlhbforr7orqEzLTHnj607MTPnjqnlhbforr7orqEzLTLnj607MTPnvZHnu5znrqHnkIYzLTHnj607MTPnvZHnu5znrqHnkIYzLTLnj607MTPnvZHnu5zmioDmnK8zLTHnj607MTPnvZHnu5zmioDmnK8zLTLnj607MTPnvZHnu5zmioDmnK8zLTPnj607MTPlvq7nlLXlrZAzLTHnj607MTPlvq7nlLXlrZAzLTLnj607MTPmlofljJbluILlnLozLTHnj607MTPmlofljJbluILlnLozLTLnj607MTPmlofnp5joi7Hor60zLTHnj607MTPmlofnp5joi7Hor60zLTLnj607MTPnianmtYHnrqHnkIYzLTHnj607MTPnianmtYHnrqHnkIYzLTLnj607MTPnianmtYHnrqHnkIYzLTPnj607MTPkv6Hmga%2flronlhagzLTHnj607MTPkv6Hmga%2flronlhagzLTLnj607MTPkv6Hmga%2flronlhagzLTPnj607MTPkv6Hmga%2fnrqHnkIYzLTHnj607MTPkv6Hmga%2fnrqHnkIYzLTLnj607MTPkv6Hmga%2fnrqHnkIYzLTPnj607MTPnp7vliqjkupLogZQzLTHnj607MTPnp7vliqjkupLogZQzLTLnj607MTPnp7vliqjpgJrkv6EzLTHnj607MTPnp7vliqjpgJrkv6EzLTLnj607MTPnp7vliqjpgJrkv6EzLTPnj607MTPlupTnlKjnlLXlrZAzLTHnj607MTPlupTnlKjnlLXlrZAzLTLnj607MTPlupTnlKjnlLXlrZAzLTPnj607MTPmuLjmiI%2fova%2fku7YzLTHnj607MTPmuLjmiI%2fova%2fku7YzLTLnj607MTPmuLjmiI%2fova%2fku7YzLTPnj607MTPmuLjmiI%2fova%2fku7YzLTTnj607MTTmiqXlhbMzLTHnj607MTTmiqXlhbMzLTLnj607MTTmiqXlhbMzLTPnj607MTTotKLnrqEzLTHnj607MTTotKLnrqEzLTLnj607MTTmtYvph4%2fmioDmnK8zLTHnj607MTTmtYvph4%2fmioDmnK8zLTLnj607MTTln47ovajov5DokKUzLTHnj607MTTln47ovajov5DokKUzLTLnj607MTTnlLXohJHoibrmnK8zLTHnj607MTTnlLXohJHoibrmnK8zLTLnj607MTTnlLXohJHoibrmnK8zLTPnj607MTTnlLXohJHoibrmnK8zLTTnj607MTTnlLXop4boioLnm64zLTHnj607MTTnlLXop4boioLnm64zLTLnj607MTTnlLXlrZDllYbliqEzLTHnj607MTTnlLXlrZDllYbliqEzLTLnj607MTTnlLXlrZDllYbliqEzLTPnj607MTTnlLXlrZDllYbliqEzLTTnj607MTTnlLXlrZDkv6Hmga8yLTHnj607MTTnlLXlrZDkv6Hmga8zLTHnj607MTTnlLXlrZDkv6Hmga8zLTLnj607MTTliqjmvKvorr7orqEzLTHnj607MTTliqjmvKvorr7orqEzLTLnj607MTTlpJrlqpLkvZPmioDmnK8zLTHnj607MTTlpJrlqpLkvZPmioDmnK8zLTLnj607MTTlpJrlqpLkvZPmioDmnK8zLTPnj607MTTovoXliqnorr7orqEzLTHnj607MTTovoXliqnorr7orqEzLTLnj607MTTlt6XllYbnrqHnkIYzLTHnj607MTTlt6XllYbnrqHnkIYzLTLnj607MTTlt6XllYbnrqHnkIYzLTPnj607MTTlm73pmYXllYbliqEzLTHnj607MTTnjq%2flooPlt6XnqIszLTHnj607MTTnjq%2flooPlt6XnqIszLTLnj607MTTkvJrorqEzLTHnj607MTTkvJrorqEzLTLnj607MTTkvJrorqEzLTPnj607MTTkvJrorqEzLTTnj607MTTmv4DlhYnliqDlt6UzLTHnj607MTTorqHnrpfmnLrlupTnlKgzLTHnj607MTTorqHnrpfmnLrlupTnlKgzLTLnj607MTTorqHnrpfmnLrlupTnlKgzLTPnj607MTTorqHnrpfmnLrlupTnlKgzLTTnj607MTTlu7rnrZHlt6XnqIszLTHnj607MTTlu7rnrZHlt6XnqIszLTLnj607MTTph5Hono0zLTHnj607MTTph5Hono0zLTLnj607MTTph5Hono0zLTPnj607MTTph5Hono0zLTTnj607MTTph5Hono0zLTXnj607MTTmjqfliLbmioDmnK8yLTHnj607MTTmjqfliLbmioDmnK8zLTHnj607MTTmjqfliLbmioDmnK8zLTLnj607MTTml4XmuLjoi7Hor60zLTHnj607MTTml4XmuLjoi7Hor60zLTLnj607MTTml4XmuLjoi7Hor60zLTPnj607MTTmsb3ovabnlLXlrZAzLTHnj607MTTmsb3ovabnlLXlrZAzLTLnj607MTTltYzlhaXmioDmnK8zLTHnj607MTTltYzlhaXmioDmnK8zLTLnj607MTTova%2fku7bmtYvor5UzLTHnj607MTTova%2fku7bmtYvor5UzLTLnj607MTTova%2fku7bmioDmnK8zLTHnj607MTTova%2fku7bmioDmnK8zLTLnj607MTTova%2fku7bmioDmnK8zLTPnj607MTTllYbliqHoi7Hor60zLTHnj607MTTllYbliqHoi7Hor60zLTLnj607MTTllYbliqHoi7Hor60zLTPnj607MTTllYbliqHoi7Hor60zLTTnj607MTTlrqTlhoXmo4DmtYszLTHnj607MTTlrqTlhoXmo4DmtYszLTLnj607MTTpgJrkv6HmioDmnK8zLTHnj607MTTpgJrkv6HmioDmnK8zLTLnj607MTTpgJrkv6HmioDmnK8zLTPnj607MTTpgJrkv6HmioDmnK8zLTTnj607MTTmipXotYQzLTHnj607MTTmipXotYQzLTLnj607MTTmipXotYQzLTPnj607MTTnjqnlhbforr7orqEzLTHnj607MTTnjqnlhbforr7orqEzLTLnj607MTTnvZHnu5znrqHnkIYzLTHnj607MTTnvZHnu5znrqHnkIYzLTLnj607MTTnvZHnu5znrqHnkIYzLTPnj607MTTnvZHnu5zmioDmnK8yLTHnj607MTTnvZHnu5zmioDmnK8zLTHnj607MTTnvZHnu5zmioDmnK8zLTLnj607MTTlvq7nlLXlrZAzLTHnj607MTTlvq7nlLXlrZAzLTLnj607MTTmlofljJbluILlnLozLTHnj607MTTmlofljJbluILlnLozLTLnj607MTTmlofnp5gzLTHnj607MTTmlofnp5gzLTLnj607MTTmlofnp5gzLTPnj607MTTnianmtYHnrqHnkIYzLTHnj607MTTnianmtYHnrqHnkIYzLTLnj607MTTnianmtYHnrqHnkIYzLTPnj607MTTkv6Hmga%2flronlhagzLTHnj607MTTkv6Hmga%2flronlhagzLTLnj607MTTkv6Hmga%2flronlhagzLTPnj607MTTkv6Hmga%2fnrqHnkIYzLTHnj607MTTkv6Hmga%2fnrqHnkIYzLTLnj607MTTkv6Hmga%2fnrqHnkIYzLTPnj607MTTnp7vliqjkupLogZQzLTHnj607MTTnp7vliqjkupLogZQzLTLnj607MTTnp7vliqjpgJrkv6EzLTHnj607MTTnp7vliqjpgJrkv6EzLTLnj607MTTnp7vliqjpgJrkv6EzLTPnj607MTTlupTnlKjnlLXlrZAzLTHnj607MTTlupTnlKjnlLXlrZAzLTLnj607MTTlupTnlKjnlLXlrZAzLTPnj607MTTmuLjmiI%2fova%2fku7YzLTHnj607MTTmuLjmiI%2fova%2fku7YzLTLnj607MTTmuLjmiI%2fova%2fku7YzLTPnj607MTTlm63mnpflt6XnqIszLTHnj607MTTlm63mnpflt6XnqIszLTLnj607MTXmiqXlhbMzLTHnj607MTXmiqXlhbMzLTLnj607MTXmiqXlhbMzLTPnj607MTXotKLnrqEzLTHnj607MTXotKLnrqEzLTLnj607MTXmtYvph4%2fmioDmnK8zLTHnj607MTXmtYvph4%2fmioDmnK8zLTLnj607MTXln47ovajov5DokKUzLTHnj607MTXln47ovajov5DokKUzLTLnj607MTXnlLXohJHoibrmnK8zLTHnj607MTXnlLXohJHoibrmnK8zLTLnj607MTXnlLXohJHoibrmnK8zLTPnj607MTXnlLXop4boioLnm64zLTHnj607MTXnlLXop4boioLnm64zLTLnj607MTXnlLXlrZDllYbliqEzLTHnj607MTXnlLXlrZDllYbliqEzLTLnj607MTXnlLXlrZDllYbliqEzLTPnj607MTXnlLXlrZDkv6Hmga8yLTHnj607MTXnlLXlrZDkv6Hmga8zLTHnj607MTXnlLXlrZDkv6Hmga8zLTLnj607MTXliqjmvKvorr7orqEzLTHnj607MTXliqjmvKvorr7orqEzLTLnj607MTXlpJrlqpLkvZPmioDmnK8zLTHnj607MTXlpJrlqpLkvZPmioDmnK8zLTLnj607MTXlpJrlqpLkvZPmioDmnK8zLTPnj607MTXlpJrlqpLkvZPmioDmnK8zLTTnj607MTXovoXliqnorr7orqEyLTHnj607MTXovoXliqnorr7orqEzLTHnj607MTXovoXliqnorr7orqEzLTLnj607MTXlt6XllYbnrqHnkIYzLTHnj607MTXlt6XllYbnrqHnkIYzLTLnj607MTXlt6XllYbnrqHnkIYzLTPnj607MTXlhYnnlLXlrZAzLTHnj607MTXlm73pmYXllYbliqEzLTHnj607MTXnjq%2flooPlt6XnqIszLTHnj607MTXnjq%2flooPlt6XnqIszLTLnj607MTXkvJrorqEzLTHnj607MTXkvJrorqEzLTLnj607MTXkvJrorqEzLTPnj607MTXkvJrorqEzLTTnj607MTXmv4DlhYnmioDmnK8zLTHnj607MTXorqHnrpfmnLrlupTnlKgzLTHnj607MTXorqHnrpfmnLrlupTnlKgzLTLnj607MTXorqHnrpfmnLrlupTnlKgzLTPnj607MTXlu7rnrZHlt6XnqIszLTHnj607MTXlu7rnrZHlt6XnqIszLTLnj607MTXph5Hono0zLTHnj607MTXph5Hono0zLTLnj607MTXph5Hono0zLTPnj607MTXph5Hono0zLTTnj607MTXmjqfliLbmioDmnK8yLTHnj607MTXmjqfliLbmioDmnK8zLTHnj607MTXmjqfliLbmioDmnK8zLTLnj607MTXml4XmuLjoi7Hor60zLTHnj607MTXml4XmuLjoi7Hor60zLTLnj607MTXml4XmuLjoi7Hor60zLTPnj607MTXmsb3ovabnlLXlrZAyLTHnj607MTXmsb3ovabnlLXlrZAzLTHnj607MTXmsb3ovabnlLXlrZAzLTLnj607MTXltYzlhaXmioDmnK8zLTHnj607MTXltYzlhaXmioDmnK8zLTLnj607MTXova%2fku7bmtYvor5UzLTHnj607MTXova%2fku7bmtYvor5UzLTLnj607MTXova%2fku7bmioDmnK8yLTHnj607MTXova%2fku7bmioDmnK8zLTHnj607MTXova%2fku7bmioDmnK8zLTLnj607MTXova%2fku7bmioDmnK8zLTPnj607MTXllYbliqHoi7Hor60zLTHnj607MTXllYbliqHoi7Hor60zLTLnj607MTXllYbliqHoi7Hor60zLTPnj607MTXllYbliqHoi7Hor60zLTTnj607MTXlrqTlhoXmo4DmtYszLTHnj607MTXlrqTlhoXmo4DmtYszLTLnj607MTXpgJrkv6HmioDmnK8zLTHnj607MTXpgJrkv6HmioDmnK8zLTLnj607MTXpgJrkv6HmioDmnK8zLTPnj607MTXpgJrkv6HmioDmnK8zLTTnj607MTXmipXotYQzLTHnj607MTXmipXotYQzLTLnj607MTXmipXotYQzLTPnj607MTXnjqnlhbforr7orqEzLTHnj607MTXnjqnlhbforr7orqEzLTLnj607MTXnvZHnu5znrqHnkIYzLTHnj607MTXnvZHnu5znrqHnkIYzLTLnj607MTXnvZHnu5znrqHnkIYzLTPnj607MTXnvZHnu5zmioDmnK8yLTHnj607MTXnvZHnu5zmioDmnK8zLTHnj607MTXnvZHnu5zmioDmnK8zLTLnj607MTXlvq7nlLXlrZAzLTHnj607MTXlvq7nlLXlrZAzLTLnj607MTXmlofljJbluILlnLozLTHnj607MTXmlofljJbluILlnLozLTLnj607MTXmlofnp5gzLTHnj607MTXmlofnp5gzLTLnj607MTXmlofnp5gzLTPnj607MTXnianmtYHnrqHnkIYzLTHnj607MTXnianmtYHnrqHnkIYzLTLnj607MTXnianmtYHnrqHnkIYzLTPnj607MTXkv6Hmga%2flronlhagzLTHnj607MTXkv6Hmga%2flronlhagzLTLnj607MTXkv6Hmga%2flronlhagzLTPnj607MTXkv6Hmga%2fnrqHnkIYzLTHnj607MTXkv6Hmga%2fnrqHnkIYzLTLnj607MTXkv6Hmga%2fnrqHnkIYzLTPnj607MTXkv6Hmga%2fnrqHnkIYzLTTnj607MTXnp7vliqjkupLogZQzLTHnj607MTXnp7vliqjkupLogZQzLTLnj607MTXnp7vliqjpgJrkv6EzLTHnj607MTXnp7vliqjpgJrkv6EzLTLnj607MTXnp7vliqjpgJrkv6EzLTPnj607MTXlupTnlKjnlLXlrZAzLTHnj607MTXlupTnlKjnlLXlrZAzLTLnj607MTXlupTnlKjnlLXlrZAzLTPnj607MTXmuLjmiI%2fova%2fku7YzLTHnj607MTXmuLjmiI%2fova%2fku7YzLTLnj607MTXlm63mnpflt6XnqIszLTHnj607MTXlm63mnpflt6XnqIszLTLnj607MTXoo4XppbDoibrmnK8zLTHnj607MTXoo4XppbDoibrmnK8zLTLnj607PjtAPDA7MDUwOTEzMDE7MDUwOTEzMDI7MDUwOTEzMDM7MTQwMTEzMDE7MTQwMTEzMDI7MDIxMDEzMDE7MDIxMDEzMDI7MDQxMDEzMDE7MDQxMDEzMDI7MDQxMDEzMDM7MDMxMTEzMDE7MDMxMTEzMDI7MDMxMjEzMDM7MTAwMTEzMDQ7MDMwNzEzMDE7MDMwNzEzMDI7MDUwMTEzMDE7MDUwMTEzMDI7MDUwMTEzMDM7MDUwMTEzMDQ7MDIwNzEzMDE7MDIwNzEzMDI7MDMyMTEzMDE7MDMyMTEzMDI7MDMyMjEzMDE7MDMyMjEzMDI7MDMyMjEzMDM7MDQwMzEzMDE7MTEwMzEzMDI7MDQwMjEzMDM7MDUxMDEzMDE7MDUxMDEzMDI7MDUxMDEzMDM7MTIwNDEzMDE7MTIwNDEzMDI7MDUwNjEzMDE7MDUwNjEzMDI7MDUwNjEzMDM7MDUwNjEzMDQ7MDUwNjEzMDU7MDMwMTEzMDE7MDMwMTEzMDI7MDMwMTEzMDM7MDMwMTEzMDQ7MDMyNDEzMDE7MDMyNDEzMDI7MTIwMTEzMDM7MDUxMjEzMDE7MDUxMjEzMDI7MDUxMjEzMDM7MDUxMjEzMDQ7MTEwMjEzMDE7MTEwMTEzMDI7MTEwMTEzMDM7MDYwNTEzMDE7MDYwNTEzMDI7MDYwNTEzMDM7MDIwODEzMDE7MDIwODEzMDI7MDEyNTEzMDE7MDEyNTEzMDI7MDEyNjEzMDE7MDEyNjEzMDI7MDEwOTEzMDE7MDEwOTEzMDI7MDExOTEzMDM7MDYwMTEzMDE7MDYwMTEzMDI7MDYwMTEzMDM7MDYwMTEzMDQ7MDYwMTEzMDU7MTIwMzEzMDE7MDIwMTEzMDE7MDIwMTEzMDI7MDIwMTEzMDM7MDIwMTEzMDQ7MDUxMTEzMDE7MDUxMTEzMDI7MDUxMTEzMDM7MDQxMjEzMDE7MDQxMjEzMDI7MDEyMDEzMDE7MDEyMDEzMDI7MDEwNTEzMDE7MDEwNTEzMDI7MDEwNTEzMDM7MDgwMjEzMDE7MDgwMzEzMDI7MDYwNDEzMDE7MDYwNDEzMDI7MDYwMjEzMDE7MDYwMjEzMDI7MDUwODEzMDE7MDUwODEzMDI7MDUwODEzMDM7MDEwNzEzMDE7MDEwNzEzMDI7MDEwNzEzMDM7MDMxODEzMDE7MDMxODEzMDI7MDMxODEzMDM7MDcwNDEzMDE7MDcwNDEzMDI7MDIwNjEzMDE7MDIwNjEzMDI7MDIwNjEzMDM7MDgwMTEzMDE7MDIwOTEzMDI7MDIwOTEzMDM7MDEyNDEzMDE7MDEyMzEzMDI7MDEyNDEzMDM7MDEyMzEzMDQ7MDUwOTE0MDE7MDUwOTE0MDI7MDUwOTE0MDM7MTQwMTE0MDE7MTQwMTE0MDI7MDIxMDE0MDE7MDIxMDE0MDI7MDQxMDE0MDE7MDQxMDE0MDI7MDMxMTE0MDE7MDMxMTE0MDI7MDMxMjE0MDE7MTAwMTE0MDE7MDMwNzE0MDE7MDMwNzE0MDI7MDUwMTE0MDE7MDUwMTE0MDI7MDUwMTE0MDM7MDUwMTE0MDQ7MDgwNTE0MDE7MDIwNzE0MDE7MDIwNzE0MDI7MDMyMTE0MDE7MDMyMTE0MDI7MDMyMjE0MDE7MDMyMjE0MDI7MDMyMjE0MDM7MDQwMjE0MDE7MDQwMzE0MDE7MDUxMDE0MDE7MDUxMDE0MDI7MDUxMDE0MDM7MTMwMTE0MDE7MTIwNDE0MDE7MTIwNDE0MDI7MDUwNjE0MDE7MDUwNjE0MDI7MDUwNjE0MDM7MDUwNjE0MDQ7MTEwNDE0MDE7MDMwMTE0MDE7MDMwMTE0MDI7MDMwMTE0MDM7MDMwMTE0MDQ7MDMyNDE0MDE7MDMyNDE0MDI7MDUxMjE0MDE7MDUxMjE0MDI7MDUxMjE0MDM7MDUxMjE0MDQ7MDUxMjE0MDU7MTEwNTE0MDE7MTEwMTE0MDE7MTEwMTE0MDI7MDYwNTE0MDE7MDYwNTE0MDI7MDYwNTE0MDM7MDQxMTE0MDE7MDQxMTE0MDI7MDEyNTE0MDE7MDEyNTE0MDI7MDEyNjE0MDE7MDEyNjE0MDI7MDEwOTE0MDE7MDExOTE0MDE7MDExOTE0MDI7MDYwMTE0MDE7MDYwMTE0MDI7MDYwMTE0MDM7MDYwMTE0MDQ7MTIwMzE0MDE7MTIwMzE0MDI7MDIwMTE0MDE7MDIwMTE0MDI7MDIwMTE0MDM7MDIwMTE0MDQ7MDUxMTE0MDE7MDUxMTE0MDI7MDUxMTE0MDM7MDQxMjE0MDE7MDQxMjE0MDI7MDEyMDE0MDE7MDEyMDE0MDI7MDEyMDE0MDM7MDkwMTE0MDE7MDEwNTE0MDE7MDEwNTE0MDI7MDgwMjE0MDE7MDgwMzE0MDE7MDYwNDE0MDE7MDYwNDE0MDI7MDYwMjE0MDE7MDYwMjE0MDI7MDYwMjE0MDM7MDUwODE0MDE7MDUwODE0MDI7MDUwODE0MDM7MDEwNzE0MDE7MDEwNzE0MDI7MDEwNzE0MDM7MDcwMjE0MDE7MDcwMjE0MDI7MDcwMzE0MDE7MDcwNDE0MDE7MDcwNDE0MDI7MDIwNjE0MDE7MDIwNjE0MDI7MDgwNDE0MDE7MDIwOTE0MDE7MDIwOTE0MDI7MDgwMTE0MDE7MDEyNDE0MDE7MDEyMzE0MDE7MDEyNDE0MDI7MTIwNTE0MDE7MTIwNTE0MDI7MDUwOTE1MDE7MDUwOTE1MDI7MDUwOTE1MDM7MTQwMTE1MDE7MTQwMTE1MDI7MDIxMDE1MDE7MDIxMDE1MDI7MDQxMDE1MDE7MDQxMDE1MDI7MDMxMTE1MDE7MDMxMTE1MDI7MTAwMTE1MDE7MDMwNzE1MDE7MDMwNzE1MDI7MDUwMTE1MDE7MDUwMTE1MDI7MDUwMTE1MDM7MDgwNTE1MDE7MDIwNzE1MDE7MDIwNzE1MDI7MDMyMTE1MDE7MDMyMTE1MDI7MTAwNDE1MDE7MTAwNDE1MDI7MTAwMzE1MDE7MTAwMzE1MDI7MTEwNjE1MDE7MDQwMzE1MDE7MDQwMjE1MDE7MDUxMDE1MDE7MDUxMDE1MDI7MDUxMDE1MDM7MDgwNjE1MDE7MTMwMTE1MDE7MTIwNDE1MDE7MTIwNDE1MDI7MDUwNjE1MDE7MDUwNjE1MDI7MDUwNjE1MDM7MDUwNjE1MDQ7MTEwNDE1MDE7MDMwMTE1MDE7MDMwMTE1MDI7MDMwMTE1MDM7MDMyNDE1MDE7MDMyNDE1MDI7MDUxMjE1MDE7MDUxMjE1MDI7MDUxMjE1MDM7MDUxMjE1MDQ7MTEwNTE1MDE7MTEwMTE1MDE7MTEwMTE1MDI7MDYwNTE1MDE7MDYwNTE1MDI7MDYwNTE1MDM7MTIwNjE1MDE7MDQxMTE1MDE7MDQxMTE1MDI7MDEyNTE1MDE7MDEyNTE1MDI7MDEyNjE1MDE7MDEyNjE1MDI7MDcwNzE1MDE7MDEwOTE1MDE7MDEwOTE1MDI7MDExOTE1MDE7MDYwMTE1MDE7MDYwMTE1MDI7MDYwMTE1MDM7MDYwMTE1MDQ7MTIwMzE1MDE7MTIwMzE1MDI7MDIwMTE1MDE7MDIwMTE1MDI7MDIwMTE1MDM7MDIwMTE1MDQ7MDUxMTE1MDE7MDUxMTE1MDI7MDUxMTE1MDM7MDQxMjE1MDE7MDQxMjE1MDI7MDEyMDE1MDE7MDEyMDE1MDI7MDEyMDE1MDM7MDkwMTE1MDE7MDEwNTE1MDE7MDEwNTE1MDI7MDgwMjE1MDE7MDgwMzE1MDE7MDYwNDE1MDE7MDYwNDE1MDI7MDYwMjE1MDE7MDYwMjE1MDI7MDYwMjE1MDM7MDUwODE1MDE7MDUwODE1MDI7MDUwODE1MDM7MDEwNzE1MDE7MDEwNzE1MDI7MDEwNzE1MDM7MDcwMjE1MDE7MDcwMjE1MDI7MDcwMzE1MDE7MDcwMzE1MDI7MDcwNjE1MDE7MDcwNTE1MDE7MDIwNjE1MDE7MDIwNjE1MDI7MDgwNDE1MDE7MDIwOTE1MDE7MDIwOTE1MDI7MDIwOTE1MDM7MDEyNDE1MDE7MDEyMzE1MDE7MTIwNTE1MDE7MTIwNTE1MDI7MTAwMjE1MDE7MTAwMjE1MDI7Pj47Pjs7Pjt0PHQ8cDxwPGw8RGF0YVRleHRGaWVsZDtEYXRhVmFsdWVGaWVsZDs%2bO2w8eGp6dDt4anp0Oz4%2bOz47dDxpPDE3PjtAPFxlO%2bS%2fneeVmeWtpuexjTvmr5XkuJo75Zu96ZmF5Lqk5rWB55SfO%2be7k%2bS4mjvlvIDpmaTlrabnsY0756a75qChO%2bWPlua2iOWtpuexjTvlhaXkvI076YCA5a2mO%2bS8keWtpjvmmoLnvJM75rOo5YaMO%2bazqOmUgOWtpuexjTvovazlraY76L2s5a2m77yI6L2s5Ye6O%2biHquWKqOmAgOWtpjs%2bO0A8MDvkv53nlZnlrabnsY075q%2bV5LiaO%2bWbvemZheS6pOa1geeUnzvnu5PkuJo75byA6Zmk5a2m57GNO%2bemu%2bagoTvlj5bmtojlrabnsY075YWl5LyNO%2bmAgOWtpjvkvJHlraY75pqC57yTO%2bazqOWGjDvms6jplIDlrabnsY076L2s5a2mO%2bi9rOWtpu%2b8iOi9rOWHujvoh6rliqjpgIDlraY7Pj47Pjs7Pjt0PHQ8cDxwPGw8RGF0YVRleHRGaWVsZDtEYXRhVmFsdWVGaWVsZDs%2bO2w8Q09NTUVOVFM7Q09MVU1OX05BTUU7Pj47Pjt0PGk8MTMxPjtAPFxlO%2bWtpuWPtzvlh4bogIPor4Hlj7c76ZO26KGM6LSm5Y%2b3O%2bWnk%2bWQjTvoi7HmloflkI075oCn5YirO%2bWHuueUn%2baXpeacnzvmsJHml4875a2m6ZmiO%2bezuzvkuJPkuJo75Z%2b55YW75pa55ZCRO%2bS4k%2bS4muaWueWQkTvnj63nuqc75a2m5Yi2O%2bWtpuexjeeKtuaAgTvlubTnuqc75LiT5Lia57G75YirO%2bWFpeWtpuaXpeacnzvogIPnlJ%2fnsbvliKs75Y6f5q%2bV5Lia5a2m5qChO%2bWFpeWtpuaWueW8jzvlip7lrablvaLlvI875Z%2b55YW75bGC5qyhO%2beUn%2ba6kOaJgOWcqOWcsDvnsY3otK875Ye655Sf5ZywO%2bWutuW6reWcsOWdgDvpgq7mlL%2fnvJbnoIE75a6F55S1O%2bacieaXoOWtpuS9jTvmlL%2fmsrvpnaLosow75Yqg5YWl5pe26Ze0O%2bWBpeW6t%2beKtuWGtTvnibnplb876Lqr5Lu96K%2bB5Y%2b3O%2baIt%2bWPo%2beOsOeKtjvlgJ%2fkuabor4Hlj7c75Yy755aX6K%2bB5Y%2b3O%2bWuv%2biIjeWPtzvlrabkuaDlubTpmZA75YWl5a2m5oC75YiGO%2bWkh%2bazqDvnp5Hnm64xO%2benkeebrjI756eR55uuMzvnp5HnsbvlkI3np7A756eR55uuWDvlrabnlJ%2fnsbvliKs75a2m55Sf6K%2bB5Y%2b3O%2bWnk%2bWQjTE75YWz57O7MTvmlL%2fmsrvpnaLosowxO%2biBjOWKoTE75bel5L2c5Y2V5L2NMTvogZTns7vnlLXor5076YCa6K6v6YKu57yWO%2bS4quS6uuiBlOezu%2beUteivnTvlr4bnoIE7562J57qnO%2bWnk%2bWQjTI75YWz57O7MjvmlL%2fmsrvpnaLosowyO%2biBjOWKoTI75bel5L2c5Y2V5L2NMjvmoKHljLo75LiT5Lia5Luj56CBO2VfbWFpbDvlrp7pqoznu4TlkI3np7A75oql5Yiw5Y%2b3O%2baLm%2beUn%2bexu%2bWeizvmiJDnu6nooajkuI3lj6%2fmn6Xor6LlrabmnJ875piv5ZCm5q%2bV5LiaO%2bW9leajgOihqOmhteeggTvmlLbku7bkuro76IGU57O755S16K%2bdMTvogZTns7vnlLXor50yO%2baYr%2bWQpuWPr%2bazqOWGjDvmlLbotLnnkIbnlLE755uu55qE54Gr6L2m56uZO%2bWfueWFu%2baWueW8jzvogIPnlJ%2flj7c75pu%2b55So5ZCNO%2bWnk%2bWQjTM75a626ZW%2f5YWz57O7Mzvlrrbplb8z5pS%2f5rK76Z2i6LKMO%2bWutumVvzPlt6XkvZzljZXkvY075a626ZW%2fM%2biBjOWKoTvogZTns7vnlLXor50zO%2bezu%2bWIqzvlnZDkvY3lj7c75byA5oi36ZO26KGMO%2bS4k%2bS4muexu%2bWIqzE75a2m5qCh5Luj56CBO%2bWtpuagoeWQjeensDvlrabkuaDlvaLlvI875Y6f5paH5YyW56iL5bqmO%2bWutuW6reWHuui6qzvlhaXkvI3lnLDngrk75rqQ5pS%2f5rK76Z2i6LKMO%2bmYn%2bWIqzvlhaXkuI3mibnlh4bor4Hkuablj7c75Y6f5pS%2f5rK76Z2i6LKMO%2bWOn%2bW3peS9nOWNleS9jTvljp%2flt6XkvZzljZXkvY3lj4rogYzliqE75b2V5Y%2bW5om55qyhO%2bavleS4muaXtumXtDvmmK%2flkKbms6jlhow75piv5ZCm5L2P5qChO%2baVmeWKoeWkhOWuoeaguDvlsLHor7vmlrnlvI87UVHlj7fnoIE75a%2bd5a6k55S16K%2bdO%2baYr%2bWQpuWKqeWtpjvljY7kvqg75piv5ZCm5L2T6IKy54m56ZW%2f55SfO%2bacr%2benkeWQjeensDvmnK%2fnp5HliIY76IGU57O75Lq6O%2baVmeiCsumDqOiAg%2beUn%2bWPtzvmiYDlsZ7lhbPljLo75oub55Sf5a2j5bqmO%2baYr%2bWQpuS9juS%2fnTvmi43mkYTlj7c75piv5ZCm5bqU5bGKO%2bawkeaXj%2bS7o%2beggTvmoaPmoYg755S15a2Q5qGj5qGIO%2bavleS4muW5tOS7vTvmi5vnlJ%2fmlZnluIg7PjtAPDA7WEg7WktaSDtZSFpIO1hNO0VOR19YTTtYQjtDU1JRO01aO1hZTUM7WFNNQztaWU1DO1BZRlg7WllGWDtCSk1DO1haO1hKWlQ7RFFTWko7WllMQjtSWFJRO0tTTEI7QllYWDtSWEZTO0JYWFM7UFlDQztTWVNaRDtKRztDU0Q7SlREWjtZWkJNO0xYREg7WVdYVztaWk1NO0pSU0o7SktaSztUQztTRlpIO0hLWFo7SlNaSDtZTFpIO1NTSDtYWE5YO1JYWkY7Qlo7S00xO0tNMjtLTTM7S0xNQztLTVg7WFNMQjtYU1pIO0pDWE07SkNHWDtKQ1paTU07SkNaVztKQ0daRFc7SkNUWERaO0pDWUI7SkNMWERIO1BBU1NXT1JEO0RKO0pDWE0yO0pDR1gyO0pDWlpNTTI7SkNaVzI7SkNHWkRXMjtYSUFPUTtaWURNO0VNTERaO1NZWk1DO0JESDtaU0xYO0NKQktDWFhRO1NGQlk7TEpCWU07U0pSO0pDREg7SkNESDI7U0ZLWkM7U0ZMWTtTVEFUSU9OO1BZRlM7S1NIO0NZTTtKQ1hNMztKQ0dYMztKQ1paTU0zO0pDR1pEVzM7SkNaVzM7SkNMWERIMztYQk1DO1pXSDtLSFlIO1pZTEIxO1hYRE07WFhNQztYWFhTO1dIQ0Q7SlRDUztSV0REO1JYWlpNTTtEQjtSWFBaU0g7WlpNTTE7WURXO1pXO0xRUEM7QllTSjtTRlpDO1NGWlg7SldDU0g7SkRGU007UVE7UVNESDtaWDtIUTtUWVRDUztTS01DO1NLRjtMWFI7SllCS1NIO1NTR1E7WlNKRDtTRkRCO1BTSDtTRllKO01aRE07REE7RFpEQTtCWU5GO1pTSlM7Pj47Pjs7Pjt0PDtsPGk8MD47PjtsPHQ8O2w8aTwyPjs%2bO2w8dDxwPHA8bDxUZXh0Oz47bDxYSCBhcyDlrablj7csWE0gYXMg5aeT5ZCNLFhCIGFzIOaAp%2bWIqyxYWU1DIGFzIOWtpumZoixaWU1DIGFzIOS4k%2bS4mixCSk1DIGFzIOePree6pyxYSlpUIGFzIOWtpuexjeeKtuaAgTs%2bPjs%2bOzs%2bOz4%2bOz4%2bO3Q8O2w8aTwwPjs%2bO2w8dDx0PHA8cDxsPERhdGFUZXh0RmllbGQ7RGF0YVZhbHVlRmllbGQ7PjtsPENPTU1FTlRTO0NPTFVNTl9OQU1FOz4%2bOz47dDxpPDEzMD47QDzlrablj7c75YeG6ICD6K%2bB5Y%2b3O%2bmTtuihjOi0puWPtzvlp5PlkI076Iux5paH5ZCNO%2baAp%2bWIqzvlh7rnlJ%2fml6XmnJ875rCR5pePO%2bWtpumZojvns7s75LiT5LiaO%2bWfueWFu%2baWueWQkTvkuJPkuJrmlrnlkJE754%2bt57qnO%2bWtpuWItjvlrabnsY3nirbmgIE75bm057qnO%2bS4k%2bS4muexu%2bWIqzvlhaXlrabml6XmnJ876ICD55Sf57G75YirO%2bWOn%2bavleS4muWtpuagoTvlhaXlrabmlrnlvI875Yqe5a2m5b2i5byPO%2bWfueWFu%2bWxguasoTvnlJ%2fmupDmiYDlnKjlnLA757GN6LSvO%2bWHuueUn%2bWcsDvlrrbluq3lnLDlnYA76YKu5pS%2f57yW56CBO%2bWuheeUtTvmnInml6DlrabkvY075pS%2f5rK76Z2i6LKMO%2bWKoOWFpeaXtumXtDvlgaXlurfnirblhrU754m56ZW%2fO%2bi6q%2bS7veivgeWPtzvmiLflj6PnjrDnirY75YCf5Lmm6K%2bB5Y%2b3O%2bWMu%2beWl%2bivgeWPtzvlrr%2foiI3lj7c75a2m5Lmg5bm06ZmQO%2bWFpeWtpuaAu%2bWIhjvlpIfms6g756eR55uuMTvnp5Hnm64yO%2benkeebrjM756eR57G75ZCN56ewO%2benkeebrlg75a2m55Sf57G75YirO%2bWtpueUn%2bivgeWPtzvlp5PlkI0xO%2bWFs%2bezuzE75pS%2f5rK76Z2i6LKMMTvogYzliqExO%2bW3peS9nOWNleS9jTE76IGU57O755S16K%2bdO%2bmAmuiur%2bmCrue8ljvkuKrkurrogZTns7vnlLXor5075a%2bG56CBO%2betiee6pzvlp5PlkI0yO%2bWFs%2bezuzI75pS%2f5rK76Z2i6LKMMjvogYzliqEyO%2bW3peS9nOWNleS9jTI75qCh5Yy6O%2bS4k%2bS4muS7o%2beggTtlX21haWw75a6e6aqM57uE5ZCN56ewO%2baKpeWIsOWPtzvmi5vnlJ%2fnsbvlnos75oiQ57up6KGo5LiN5Y%2bv5p%2bl6K%2bi5a2m5pyfO%2baYr%2bWQpuavleS4mjvlvZXmo4DooajpobXnoIE75pS25Lu25Lq6O%2biBlOezu%2beUteivnTE76IGU57O755S16K%2bdMjvmmK%2flkKblj6%2fms6jlhow75pS26LS555CG55SxO%2bebrueahOeBq%2bi9puermTvln7nlhbvmlrnlvI876ICD55Sf5Y%2b3O%2babvueUqOWQjTvlp5PlkI0zO%2bWutumVv%2bWFs%2bezuzM75a626ZW%2fM%2baUv%2bayu%2bmdouiyjDvlrrbplb8z5bel5L2c5Y2V5L2NO%2bWutumVvzPogYzliqE76IGU57O755S16K%2bdMzvns7vliKs75Z2Q5L2N5Y%2b3O%2bW8gOaIt%2bmTtuihjDvkuJPkuJrnsbvliKsxO%2bWtpuagoeS7o%2beggTvlrabmoKHlkI3np7A75a2m5Lmg5b2i5byPO%2bWOn%2baWh%2bWMlueoi%2bW6pjvlrrbluq3lh7rouqs75YWl5LyN5Zyw54K5O%2ba6kOaUv%2bayu%2bmdouiyjDvpmJ%2fliKs75YWl5LiN5om55YeG6K%2bB5Lmm5Y%2b3O%2bWOn%2baUv%2bayu%2bmdouiyjDvljp%2flt6XkvZzljZXkvY075Y6f5bel5L2c5Y2V5L2N5Y%2bK6IGM5YqhO%2bW9leWPluaJueasoTvmr5XkuJrml7bpl7Q75piv5ZCm5rOo5YaMO%2baYr%2bWQpuS9j%2bagoTvmlZnliqHlpITlrqHmoLg75bCx6K%2b75pa55byPO1FR5Y%2b356CBO%2bWvneWupOeUteivnTvmmK%2flkKbliqnlraY75Y2O5L6oO%2baYr%2bWQpuS9k%2biCsueJuemVv%2beUnzvmnK%2fnp5HlkI3np7A75pyv56eR5YiGO%2biBlOezu%2bS6ujvmlZnogrLpg6jogIPnlJ%2flj7c75omA5bGe5YWz5Yy6O%2baLm%2beUn%2bWto%2bW6pjvmmK%2flkKbkvY7kv5075ouN5pGE5Y%2b3O%2baYr%2bWQpuW6lOWxijvmsJHml4%2fku6PnoIE75qGj5qGIO%2beUteWtkOaho%2bahiDvmr5XkuJrlubTku7075oub55Sf5pWZ5biIOz47QDxYSDtaS1pIO1lIWkg7WE07RU5HX1hNO1hCO0NTUlE7TVo7WFlNQztYU01DO1pZTUM7UFlGWDtaWUZYO0JKTUM7WFo7WEpaVDtEUVNaSjtaWUxCO1JYUlE7S1NMQjtCWVhYO1JYRlM7QlhYUztQWUNDO1NZU1pEO0pHO0NTRDtKVERaO1laQk07TFhESDtZV1hXO1paTU07SlJTSjtKS1pLO1RDO1NGWkg7SEtYWjtKU1pIO1lMWkg7U1NIO1hYTlg7UlhaRjtCWjtLTTE7S00yO0tNMztLTE1DO0tNWDtYU0xCO1hTWkg7SkNYTTtKQ0dYO0pDWlpNTTtKQ1pXO0pDR1pEVztKQ1RYRFo7SkNZQjtKQ0xYREg7UEFTU1dPUkQ7REo7SkNYTTI7SkNHWDI7SkNaWk1NMjtKQ1pXMjtKQ0daRFcyO1hJQU9RO1pZRE07RU1MRFo7U1laTUM7QkRIO1pTTFg7Q0pCS0NYWFE7U0ZCWTtMSkJZTTtTSlI7SkNESDtKQ0RIMjtTRktaQztTRkxZO1NUQVRJT047UFlGUztLU0g7Q1lNO0pDWE0zO0pDR1gzO0pDWlpNTTM7SkNHWkRXMztKQ1pXMztKQ0xYREgzO1hCTUM7WldIO0tIWUg7WllMQjE7WFhETTtYWE1DO1hYWFM7V0hDRDtKVENTO1JXREQ7UlhaWk1NO0RCO1JYUFpTSDtaWk1NMTtZRFc7Wlc7TFFQQztCWVNKO1NGWkM7U0ZaWDtKV0NTSDtKREZTTTtRUTtRU0RIO1pYO0hRO1RZVENTO1NLTUM7U0tGO0xYUjtKWUJLU0g7U1NHUTtaU0pEO1NGREI7UFNIO1NGWUo7TVpETTtEQTtEWkRBO0JZTkY7WlNKUzs%2bPjtsPGk8MD47aTwzPjtpPDU%2bO2k8OD47aTwxMD47aTwxMz47aTwxNT47Pj47Oz47Pj47dDxAMDw7Ozs7Ozs7Ozs7Pjs7Pjt0PDtsPGk8MD47PjtsPHQ8QDA8Ozs7Ozs7Ozs7Oz47Oz47Pj47Pj47Pj47PmMiYtCQncElQ%2bEUeu2PYKeAgLKv";

<<<<<<< HEAD
		$url = 'http://'.zfxk2::$host.'/bmxscx.aspx';
=======
		$url = 'http://113.106.49.220/zfxk2/bmxscx.aspx';
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
		$regex = '/<td>(\d+)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>(.*?)<\/td><td>.*?<\/td>/';
		if($name != "")
			$data = '__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE='.$_viewstate.'&ddlXYMC=0&ddlZYMC=0&ddlNJ=0&ddlBJMC=0&ddlXJZT=0&ddlZD=0&tbZD=&T_xh=&Button3=%B2%E9++%D1%AF&T_xm='.urlencode(curl::encoding($name,"utf-8","gb2312"));
		else 
			$data = '__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE='.$_viewstate.'&ddlXYMC=0&ddlZYMC=0&ddlNJ=0&ddlBJMC=0&ddlXJZT=0&ddlZD=0&tbZD=&T_xh='.$id.'&Button2=%B2%E9++%D1%AF&T_xm=';
		$html = curl::encoding(curl::Post($url, $cookies, $data), "gbk");

		$json = "";
<<<<<<< HEAD
		if(preg_match_all($regex, $html, $matches))
		{		
            $datas = array("infos"=>array());
			$json = '{"infos":['; 
			for($i = 0; $i < count($matches[1]); $i++)
			{
                $info = array(
				    "id" => $matches[1][$i],
				    "name" => $matches[2][$i], 
                    "sex" => $matches[3][$i], 
                    "subject" => $matches[4][$i], 
                    "classname" => $matches[5][$i], 
                    "college" => $matches[6][$i],
                    "pic" => "<img src=\'http://113.106.49.220/zfxk2/report/readimage.aspx?xh='.$matches[1][$i].'\'/>"
                );
                $datas["infos"][$i] = $info;
			}
=======

		if(preg_match_all($regex, $html, $matches))
		{		
			$json = '{"infos":['; 
			for($i = 0; $i < count($matches[1]); $i++)
			{
				$json .= '{';
				$json .= '"id":"'.$matches[1][$i].'",';
				$json .= '"name":"'.$matches[2][$i].'",'; 
				$json .= '"sex":"'.$matches[3][$i].'",'; 
				$json .= '"subject":"'.$matches[4][$i].'",'; 
				$json .= '"classname":"'.$matches[5][$i].'",'; 
				$json .= '"college":"'.$matches[6][$i].'",';
				$json .= '"pic":"<img src=\'http://113.106.49.220/zfxk2/report/readimage.aspx?xh='.$matches[1][$i].'\'/>",';
				$json .= '}';
				if($i < count($matches[1]) - 1) $json .= ',';
			}
			$json .= ']}'; 
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
		}
		else
		{
			$error = "infos not found.";
		}
		
<<<<<<< HEAD
		return $datas;
=======
		return $json;
>>>>>>> 982d8e33bb110ae766e90370792f7a55cc12c451
	}
}
