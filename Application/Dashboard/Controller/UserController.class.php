<?php
namespace Dashboard\Controller;
use Think\Controller;
class UserController extends Controller {
	public function login(){
		if(IS_POST)
		{
            // 1.创建数据表操作对象
			$userTable = D('user');
            // 2.获取表单数据
			$username = I('post.uemail');
			$pwd = I('post.upwd');
            //判断用户名有效性
			if($userTable->isValidUser($username,$pwd))
			{
                //3.1把用户名信息放到session中
				session('logineduser',$username);
				session('logineduserid',$userTable->getUserIdByUserName($username));
				
                //dump($_SESSION);
                //3.2跳转到首页
				$this->success('登录成功','/Home/Index/index');
			}
			else{
				$this->error('用户名或密码错误，请重新填写');
			}

		}
		else{
			$this->display();
		}
	}
	public function register()
	{
		if (IS_POST) {
            // 1.创建数据表操作对象
			$userTable = D('user');
            // 2.获取表单数据
			$uemail = I('post.uemail');
			$pwd = I('post.upwd');
			$uname = I('post.uname');
			//$captcha = I('post.captcha');
			// if (Captcha::checkCaptcha($captcha, Captcha::REGISTR_CAPTCHA)) {
			// 3.执行注册
			$r = $userTable->doUserRegister(trim($uemail), $pwd, trim($uname));
			if ($r)
			{
				session('logineduser',$uemail);
				session('logineduserid',$userTable->getUserIdByUserName($uemail));
				//session('logineduserimgurl',$userimgurl);
				$this->success('注册并登录成功,','/Home/Index/index');
			}
			// }else {
			// 	unlink('./Public/image/'.$userimgurl);
			// 	$this->error('验证码不正确');
			// }
		} else {
            // 现实视图文件
			$this->display();
		}
	}
	public function logout()
	{
        //1注销session
		session('logineduser',null);
		session('logineduserid',null);
        //跳转首页
		$this->success('注销成功','/Home/Index/index',1);
	}
	public function captcha($atype = 'register')
	{
		switch ($atype) {
			case 'register':
			Captcha::createCaptcha(Captcha::REGISTR_CAPTCHA);
			break;
			case 'login':
			Captcha::createCaptcha(Captcha::LOGIN_CAPTCHA);
			break;
			default:
			Captcha::createCaptcha(Captcha::REGISTR_CAPTCHA);
			break;
		}
	}
}