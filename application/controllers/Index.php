<?php
/**
 * @name IndexController
 * @author root
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends BaseController {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf_sample/index/index/index/name/root 的时候, 你就会发现不同
     */
	public function index2Action($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
	public function index3Action()
	{
		$transport = Swift_SmtpTransport::newInstance('mail.139.com', 25);
		$transport->setUsername('iinux@139.com');
		$transport->setPassword('leuwai');

		if (false) {
			$transport->setEncryption('ssl');
		}

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance();
		$message->setFrom(array('iinux@139.com' => 'iinux'));
		$emailTo = ['iinux@139.com' => 'iinux'];
		$message->setTo($emailTo);
		$message->setSubject("order");
		$message->setBody('content', 'text/html', 'utf-8');
		//$message->attach(Swift_Attachment::fromPath('pic.jpg', 'image/jpeg')->setFilename('rename_pic.jpg'));
		try {
			$mailer->send($message);
		} catch (Exception $e) {
			echo 'error: There was a problem communicating with SMTP: ' . $e->getMessage();
		}
	}
	public function indexAction()
	{
		// 插入, 方式之一
		UserModel::create([
			'name'      => 'eloquent',
			'password'  => password_hash('password', PASSWORD_BCRYPT, ['cost' => 12]),
			'email'     => 'test@example.com'
		]);

		// 获取
		$user = User::find(1);
		dd($user->toArray()); // dd 放到

		//$this->view->assign("content", "Hello Hadoop! Welcome to Beijing!<br/>");
		$this->view->clearVars();
		$model = new UserModel();
		$this->view->content = $model->say();
		/*指定template_dir目录下的模板*/
		$this->view->display('smarty.tpl');
		/*false为禁止显示默认模板   return false表示显示display指定的模板*/
		return false;
	}
}
