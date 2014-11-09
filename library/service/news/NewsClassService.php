<?php
/**
 * 单页管理
 * @author dake
 */
class NewsClassService extends BaseService {
	
	/**
	 * 添加单页
	 * 参数结构:
	 * array(
	 * 'type' => 单页类型
	 * 'name' => 单页名词
	 * 'descrip' => 单页详细内容
	 * )
	 * 
	 * @param array $data        	
	 */
	public function add($data) {
		if (! is_array ( $data ))
			return $this->service->return_msg ( false, '参数不正确!' );
		if (empty($data['title']))
			return $this->service->return_msg ( false, '请输入标题!' );
		$data = $this->_cookData ( $data );
		$data ['create_time'] = InitPHP::getTime ();
		$result = $this->_getDao ()->add ( $data );
		if (! $result)
			return $this->service->return_msg ( false, '创建失败!' );
		return $this->service->return_msg ( true, '创建成功!', $result );
	}
	
	/**
	 * 编辑单页
	 * 
	 * @param int $id        	
	 * @param array $data        	
	 */
	public function edit($id, $data) {
		
		$id = intval ( $id );
		if ($id < 1)
			return false;
		$data = $this->_cookData ( $data );
		return $this->_getDao ()->edit ( $id, $data );
	}
	
	/**
	 * 删除单页
	 * 
	 * @param int $id        	
	 */
	public function del($id) {
		$id = intval ( $id );
		if ($id < 1)
			return false;
		return $this->_getDao ()->delete ( $id );
	}
	
	/**
	 * 获取单个广告
	 * 
	 * @param int $id        	
	 */
	public function getInfo($id) {
		$id = intval ( $id );
		if ($id < 1)
			return array ();
		$data = $this->_getDao ()->get ( $id );
		return $data;
	}
	
	/**
	 * 获取广告列表
	 * 
	 * @param int $page        	
	 * @param int $perpage        	
	 */
public function getList($page, $perpage) {
		$page = intval ( $page );
		$perpage = intval ( $perpage );
		return $this->_getDao ()->getList ( $page, $perpage );
	}
	
	public function getAll() {
		return $this->_getDao ()->getAll();
	}
	
	/**
	 * 过滤传递进来的参数
	 * 
	 * @param array $data        	
	 * @return ArrayIterator
	 */
	private function _cookData($data) {
		$field = array (
				array ('title',''),
				array ('introduce',''),
				array ('content',''),
				array ('img_url',''),
				array ('sorts','int'),
				array ('keywords',''),
				array ('img_url',''),
				array ('description','')
		);
		return $this->service->parse_data ( $field, $data );
	}
	
	
	/**
	 * 单页DAO
	 * 
	 * @return Dao
	 */
	private function _getDao() {
		return InitPHP::getDao ( 'NewsClass', 'news' );
	}
}