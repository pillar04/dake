<?php
$nav = $sidebar = array();
$nav['system'] = '系统';
$sidebar['system']['admin']['title'] = '管理员';
$sidebar['system']['admin']['option'] = array(
	array('管理员管理', 'user', 'run', 1),  
	array('编辑管理员', 'user', 'edit', 0),
	array('编辑管理员操作', 'user', 'editdo', 0),
	array('删除管理员', 'user', 'del', 0),
	array('新增管理员', 'user', 'add', 0),
	array('新增管理员操作', 'user', 'adddo', 0),
	array('用户组管理', 'group', 'run', 1),
	array('编辑用户组', 'group', 'edit', 0),
	array('编辑用户组操作', 'group', 'editdo', 0),
	array('删除用户组', 'group', 'del', 0),
	array('新增用户组', 'group', 'add', 0), 
	array('新增用户组操作', 'group', 'adddo', 0),
	array('后台管理日志', 'adminlog', 'run', 1),
	array('后台管理详情', 'adminlog', 'detail', 0),
);
$sidebar['system']['site']['title'] = '站点设置';
$sidebar['system']['site']['option'] = array(
	array('网站基本设置', 'site', 'run', 1),
	array('基本设置操作', 'site', 'editdo', 0),
	array('网站访问控制', 'access', 'run', 1),
	array('访问控制操作', 'access', 'editdo', 0),
);
$nav['extend'] = '扩展';
$sidebar['extend']['ad']['title'] = '广告管理';
$sidebar['extend']['ad']['option'] = array(
	array('广告位管理', 'ad', 'run', 1),
	array('编辑广告位', 'ad', 'edit', 0),
	array('编辑广告位操作', 'ad', 'editdo', 0), 
	array('删除广告位', 'ad', 'del', 0),
	array('新增广告位', 'ad', 'add', 0),
	array('新增广告位操作', 'ad', 'adddo', 0),
	array('广告管理', 'ad', 'adlist', 1),
	array('新增广告', 'ad', 'adadd', 0),
	array('新增广告操作', 'ad', 'adadddo', 0),
	array('编辑广告', 'ad', 'adedit', 0),
	array('编辑广告操作', 'ad', 'adeditdo', 0),
	array('删除广告', 'ad', 'addel', 0),
);

$nav['singles'] = '单页管理';
$sidebar['singles']['single']['title'] = '单页管理';
$sidebar['singles']['single']['option'] = array(
	array('单页列表', 'singles', 'run', 1)
);

$nav['news'] = '新闻中心';
$sidebar['news']['news']['title'] = '新闻中心';
$sidebar['news']['news']['option'] = array(
		array('新闻列表管理', 'news', 'run', 1),
		array('新闻分类管理', 'newsclass', 'run', 1)
);


return array('nav' => $nav, 'sidebar' => $sidebar);