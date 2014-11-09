<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-10-05 08:15:16, compiled from E:\VertrigoServ\www\dake/web/template/admin/user/adminlog_detail.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked" name="<?php echo $adminlogRun; ?>">后台管理日志</li>
  </ul>
</div>
<div class="content">
  <h1>详细参数</h1>
  <pre>
  <?php var_export(InitPHP::output($logInfo)); ?>
  </pre>
</div>

