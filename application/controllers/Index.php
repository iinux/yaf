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
	public function indexAction()
	{
		//$this->view->assign("content", "Hello Hadoop! Welcome to Beijing!<br/>");
		$this->view->clearVars();
		$this->view->content = "Hello Hadoop! Welcome to Beijing!<br/>";
		/*指定template_dir目录下的模板*/
		$this->view->display('smarty.tpl');
		/*false为禁止显示默认模板   return false表示显示display指定的模板*/
		return false;
	}
}
