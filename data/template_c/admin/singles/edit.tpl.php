<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-11-09 14:20:07, compiled from E:\VertrigoServ\www\dake/web/template/admin/singles/edit.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $page_run; ?>">单页管理</li>
    <li   name="<?php echo $page_add; ?>">新增单页</li>
  </ul>
</div>
<div class="content">
  <h1>编辑单页</h1>
  <form name="editSingle" enctype="multipart/form-data" method="post" id="editSingle" action="<?php echo $addrSinglesEditDo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
	 <input name="id" type="hidden"  value="<?php echo $dataInfo['id']; ?>" >
    <table>
      <tr>
        <th width="200">名称</th>
        <td class="top_broder"><input name="title"  class="input" value="<?php echo $dataInfo['title']; ?>" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">简介</th>
        <td><textarea name="introduce" class="textarea"><?php echo $dataInfo['introduce']; ?></textarea></td>
      </tr>
      <tr>
        <th width="200">内容</th>
        <td>
         <textarea name="content" class="content"><?php echo $dataInfo['content'] ?></textarea>
        </td>
      </tr>
      <tr>
        <th width="200">图片</th>
        <td>
        	<img src="<?php echo $dataInfo['img_url']; ?>"  width="100" height="100"/> &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="img_url" type="file" value="<?php echo $dataInfo['img_url'] ?>">
        </td>
      </tr>
	   <tr>
        <th width="200">推荐值</th>
        <td> <input class="input wh50" maxlength="5" name="sorts" type="text" value="<?php echo $dataInfo['sorts'] ?>" /><span>数值越大越靠前</span>
        </td>
      </tr>
      <tr>
        <th width="200">页面关键词</th>
        <td> <input class="input wh50" maxlength="5" name="keywords" type="text" value="<?php echo $dataInfo['keywords'] ?>" />
        </td>
      </tr>
      <tr>
        <th width="200">页面描述</th>
        <td> <input class="input wh50" maxlength="5" name="description" type="text" value="<?php echo $dataInfo['description'] ?>" />
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
var singleContent = function () {
	var val = $("#adtype").val();
	if (val == 0) {
		$("#ad_str").hide();
		$("#ad_img").show();
	} else {
		$("#ad_str").show();
		$("#ad_img").hide();
	}
}
$(document).ready(function() {
	submitForm('editSingle', '<?php echo $page_run; ?>');
	$("#adtype").bind("click", singleContent); 
});
</script>
