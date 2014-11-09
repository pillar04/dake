<?php
/**
 * 后台管理-扩展管理-单页管理
 * @author dake
 */
class singlesController extends BaseAdminController {
	public $initphp_list = array ('run','add','adddo','edit','editdo','del'); // Action白名单
	
	/**
	 * 单页列表显示
	 */
	public function run() {
		$page = intval ( $this->controller->get_gp ( 'page' ) );
		/* 列表 */
		list ( $singleList, $singleCount ) = $this->_getService ()->getList ( $page, $this->perpage );
		$this->page ( $singleCount ); // 分页
		/* 输出 */
		$this->view->assign ( 'singleList', $singleList );
		$this->view->assign ( 'singleCount', $singleCount );
		$this->view->set_tpl ( 'singles/run' );
	}
	
	/**
	 * 单页添加
	 */
	public function add() {
		$this->view->assign('addrSinglesRun', $this->getUrl('singles', 'run'));
		$this->view->assign('addrSinglesAddDo', $this->getUrl('singles', 'adddo'));
		$this->view->set_tpl ( 'singles/add' );
	}
	
	/**
	 * 单页修改
	 */
	public function edit() {
		$id = intval($this->controller->get_gp('id'));
		$dataInfo = $this->_getService()->getInfo($id);
		$dataInfo = $this->controller->filter_escape($dataInfo);
		$this->view->assign('dataInfo', $dataInfo);
		$this->view->assign('addrSinglesEditDo', $this->getUrl('singles', 'editdo'));
		
		$this->view->set_tpl ( 'singles/edit' );
	}
	
	/**
	 * 提交修改单页
	 */
	public function editdo() {
		$postArr = $this->controller->get_gp ( array('title', 'introduce', 'content', 'img_url', 'sorts', 'keywords', 'description','id') );
		$postArr = $this->_checkData($postArr);
		$result = $this->_getService ()->edit ( $postArr['id'], $postArr );
		if ($result == false)
			$this->ajax_return ( 0, $result [1] );
		$this->ajax_return ( 1, '修改成功' );
	}
	
	/**
	 * 提交单页
	 */
	public function adddo() {
		$singleInfo = $this->controller->get_gp ( array('title', 'introduce', 'content', 'img_url', 'sorts', 'keywords', 'description') );
		$singleInfo = $this->_checkData($singleInfo);
		$result = $this->_getService ()->add ( $singleInfo );
		if ($result [0] == false)
			$this->ajax_return ( 0, $result [1] );
		$this->ajax_return ( 1, '单页新增成功' );
	}
	
	/**
	 * 删除
	 */
	public function del() {
		$id = $this->controller->get_gp('id');
		$result = $this->_getService()->del($id);
        if (!$result) $this->ajax_return(0, '删除失败');
        $this->ajax_return(1, '删除成功');
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('page_run', $this->getUrl('singles', 'run'));
		$this->view->assign('page_add', $this->getUrl('singles', 'add'));
		$this->view->assign('page_edit', $this->getUrl('singles', 'edit'));
		$this->view->assign('page_del', $this->getUrl('singles', 'del'));
	}
	
	
	public function _checkData($postInfo)
	{
		if (!($_FILES['img_url']['name'] == '' && $postInfo['id'])) {
			$uploadResult = $this->upload('img_url', 'data/attachment/single');
			if (is_array($uploadResult)) {
				$postInfo['img_url'] = $uploadResult['source'];
				/* 图片压缩 */
				$param = array(0=>array('', $postInfo['img_width'], $postInfo['img_height']));
				$this->imageThumb($postInfo['img'], $param);
			} else {
				$this->ajax_return(0, '文件上传失败，请检查文件类型，大小！');
			}
		} else {
			unset($postInfo['img_url']); //编辑的时候不上传图片 就用原先的图片
		}
		return $postInfo;
	}
	
	/**
	 *
	 * @return SingleService
	 */
	private function _getService() {
		return InitPHP::getService ( 'Single', 'single' );
	}
	
}