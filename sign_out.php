<?php
session_start();
if(!require_once('inc/template/init.ink')){require_once('inc/template/init.ink');}
$pageTitle=lang('sign out');
require($inc.$tmp.$minhedr.$dotext.$ink); 
session_unset();
session_destroy();
for($i=0;$i<=9;$i++)
{
	echo "<br>";
}
msg_responde('',lang('تم تسجيل الخروج بنجاح'));
$second=5;
$txtsecond=lang('space').lang('ثوانى');
if($_GET['lang']=='ar'){$second_convert=numbers($second);}elseif(($_GET['lang']=='en')){$second_convert=$second;}else{$second_convert=numbers($second);}
$msg=lang('سوف نقوم بتحويل الصفحة فى خلال').lang('space').$second_convert.$txtsecond;
echo '<br>';
redirectmsg($msg,$second,$txtsecond);
exit();