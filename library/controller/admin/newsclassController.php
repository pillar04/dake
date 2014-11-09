<?php
/**
 * 后台管理-后台用户管理
 * @author zhuli
 */
class newsclassController extends BaseAdminController {
	
	public $initphp_list = array('add', 'adddo', 'del', 'edit', 'editdo'); //Action白名单
	
	/**
	 * 后台用户列表
	 */
	public function run() {
		
		$dataList = $this->_getService()->getAll();
		
		foreach ($dataList as $key=>$item)
		{
			$tmp_prev = '';
			for ($x=0;$x<$item['depth'];$x++)
			{
				$tmp_prev .= '-';
			}
			echo $tmp_prev.$item['class_name'];
			echo '<br/>';
		}
		//$this->view->set_tpl('news/news_class_run');	
	}
	
	
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		
	}
	
	public function _getService()
	{
		return InitPHP::getService('NewsClass', 'news');
	}
	
}