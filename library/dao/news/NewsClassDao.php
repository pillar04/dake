<?php
/**
 * 单页
 * @author dake
 */
class NewsClassDao extends BaseDao {
	protected $table_name = 'initapp_news_category';
	
	/**
	 * 新增单页
	 * 
	 * @param array $data        	
	 * @return int
	 */
	public function add($data) {
		if (! $data)
			return false;
		return $this->dao->db->insert ( $data, $this->table_name );
	}
	
	/**
	 * 编辑单页
	 * 
	 * @param int $id        	
	 * @param array $data        	
	 * @return bool
	 */
	public function edit($id, $data) {
		$id = intval ( $id );
		if (! $id || ! $data)
			return false;
		return $this->dao->db->update ( $id, $data, $this->table_name );
	}
	
	/**
	 * 删除单页
	 * 
	 * @param int $uid        	
	 * @return bool
	 */
	public function delete($id) {
		$id = intval ( $id );
		return $this->dao->db->delete ( $id, $this->table_name );
	}
	
	/**
	 * 获取一个单页信息
	 * 
	 * @param int $id        	
	 * @return array
	 */
	public function get($id) {
		$id = intval ( $id );
		if ($id < 1)
			return false;
		return $this->dao->db->get_one ( $id, $this->table_name );
	}
	
	/**
	 * 获取分页列表
	 * 
	 * @param int $page        	
	 * @param int $perpage        	
	 * @return Array
	 */
	public function getList($page, $perpage) {
		$page = intval ( $page );
		$perpage = intval ( $perpage );
		if ($page < 1)
			$page = 1;
		$page = ($page - 1) * $perpage;
		return $this->dao->db->get_all ( $this->table_name, $perpage, $page );
	}
	
	public function getAll()
	{
		//return $this->dao->db->get_all_sql("select * from ".$this->table_name." order by depth asc,orders asc");
		//获得root左边和右边的值
		$arr_lr = $this->dao->db->get_all_sql("select * from ".$this->table_name." where title = '顶级栏目'");
		//print_r($arr_lr);
		if($arr_lr){
			$right = array();
			$arr_tree = $this->category->query("SELECT id, type, title, rgt FROM category WHERE lft >= ". $arr_lr['lft'] ." AND lft <=".$arr_lr['rgt']." ORDER BY lft");
			foreach($arr_tree as $v){
				if(count($right)){
					while ($right[count($right) -1] < $v['rgt']){
						array_pop($right);
					}
				}
				$title = $v['title'];
				if(count($right)){
					$title = '|-'.$title;
				}
				$arr_list[] = array('id' => $v['id'], 'type' => $type, 'title' => str_repeat('  ', count($right)).$title, 'name' =>$v['title']);
				$right[] = $v['rgt'];
			}
			return $arr_list;
		}
		
	}
}