<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-10-16 16:09:56, compiled from E:\VertrigoServ\www\dake/web/template/admin/singles/add.htm */ ?>
<div class="content_tab">
  <ul>
    <li  name="<?php echo $page_run; ?>">单页管理</li>
    <li class="checked"  name="<?php echo $page_add; ?>">新增单页</li>
  </ul>
</div>
<div class="content">
  <h1>新增单页</h1>
  <form name="addSingle" enctype="multipart/form-data" method="post" id="addSingle" action="<?php echo $addrSinglesAddDo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">名称</th>
        <td class="top_broder"><input name="title"  class="input" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">简介</th>
        <td><textarea name="introduce" class="textarea"></textarea></td>
      </tr>
      <tr>
        <th width="200">内容</th>
        <td>
         <textarea name="content" class="content"></textarea>
        </td>
      </tr>
      <tr>
        <th width="200">图片</th>
        <td>
            <input name="img_url" type="file">
        </td>
      </tr>
	  <tr>
        <th width="200">推荐值</th>
        <td> <input class="input wh50" maxlength="5" name="sorts" type="text" value="0" /><span>数值越大越靠前</span>
        </td>
      </tr>
      <tr>
        <th width="200">页面关键词</th>
        <td> <input class="input wh50" maxlength="5" name="keywords" type="text" />
        </td>
      </tr>
      <tr>
        <th width="200">页面描述</th>
        <td> <input class="input wh50" maxlength="5" name="description" type="text" />
        </td>
      </tr>
      <tr>
        <th width="200"></th>
        <td><input  value="提交" type="submit" class="btn2" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="str"]', {
		cssPath : 'static/js/common/kindeditor/plugins/code/prettify.css',
		uploadJson : 'static/js/common/kindeditor/php/upload_json.php',
		fileManagerJson : 'static/js/common/kindeditor/php/file_manager_json.php',
		allowFileManager : true,
		items : [
			'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link']

	});
	prettyPrint();
});

$(document).ready(function() {
 	submitForm('addSingle', '<?php echo $addrSinglesRun; ?>');
});
</script>
