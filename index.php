<?php
session_start();
$nosidebar='';
$langauges='';

if(!require_once('inc/template/init.ink')){require_once('inc/template/init.ink');}
$pageTitle=lang('login');
require($inc.$tmp.$minhedr.$dotext.$ink);
if($pageTitle=='Login' || $pageTitle=='تسجيل الدخول')
{
    $page='index';
}

if(isset($_SESSION['username'])){
    header($loc.$dshbrd.$dotext.$phpext.'?lang='.$_SESSION['lang'].'&username='.$_SESSION['username'].'&user_id='.$_SESSION['user_id']);
   exit(); 
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$formerror=array();
	if(isset($_POST['password']))
	{
		$pass=filter_var($_POST['password'],FILTER_SANITIZE_STRING);		
	}else{$pass='';}	
	if(isset($_POST['username']))
	{
		$santized_username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	}
	$stmt=$conn->prepare("SELECT `id`,`username`,`password` FROM users WHERE username=? LIMIT 1");
	$stmt->execute(array($santized_username));
	$row=$stmt->fetch();
	$rowcount = $stmt->rowCount();
	if($rowcount>0)
	{
		if(isset($pass) && !empty($pass))
		{				
			if(!password_verify($pass, $row['password']))
			{
				$formerror[]=lang('Invalid password.');
			}
		}elseif(empty($pass))
		{
			$formerror[]=lang('password can\'t be empty');
		}
	}
	if(strlen($pass) < 3 && !empty($pass))			
	{
		$formerror[]=lang('password smaller than 3 charcter');
	}
	if(strlen($pass) > 25 && !empty($pass))
	{
		$formerror[]=lang('password larger than 25 charcter');
	}
	if(empty($santized_username))
	{
		$formerror[]=lang('username can\'t be empty');
	}elseif(strlen($santized_username) < 3)			
	{
		$formerror[]=lang('username smaller than 3 charcter');
	}elseif(strlen($santized_username) > 25)
	{
		$formerror[]=lang('username larger than 25 charcter');
	}	
	if($rowcount == 0 && !empty($santized_username))
	{
		$formerror[]=lang('this username is not found');
	}
	foreach($formerror as $error)
	{
		echo '<div class="alert alert-danger" style="text-align:center">'.$error."</div>";
	}
	if(empty($formerror))
	{
		if($rowcount > 0)
		{
			$_SESSION['username']= $santized_username;			
			$_SESSION['user_id']=$row['id'];
			echo $_SESSION['user_id'];
			if(!empty($langauges))
			{        
				header($loc.$dshbrd.$dotext.$phpext.'?lang='.$_SESSION['lang'].'&username='.$_SESSION['username'].'&user_id='.$_SESSION['user_id']);
				exit();
			}
			else
			{
				$_SESSION['lang']='ar';
				header($loc.$dshbrd.$dotext.$phpext.'?lang='.$_SESSION['lang'].'&username='.$_SESSION['username'].'&user_id='.$_SESSION['user_id']);
				exit();
			}
		} 
	}
}
?>
<section id="sec" <?php if($langauges=='ar'){echo 'style="direction:rtl"';}elseif($langauges=='en'){echo 'style="direction:ltr"';}else{echo 'style="direction:rtl"';}?>>
<div class="box">           
			   <div class="form">
                    <form method="POST" id="login_form" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <h2 style="<?php if(isset($_GET['lang']) && ($_GET['lang']=='ar')){echo 'left: 8vw; position:relative';}elseif(isset($_GET['lang']) && ($_GET['lang']=='en')){}else{echo 'left: 8vw; position:relative';}?>"><?php echo lang('login');?></h2>
                        <div class="inputbox">
                            <input pattern=".{3,25}" required title="<?php echo lang('username must be beween 3 to 25'); ?>" autocomplete="off" type="text" name="username" placeholder="<?php echo lang("usernme");?>" id="username" <?php if($langauges=='ar'){echo 'style="padding-right:45px;padding-left:19px"';}elseif($langauges=='en'){echo 'style="padding-left:45px;padding-right:19px"';}else{echo 'style="padding-left:45px;padding-right:19px"';}?>>
                            <i class="font-icon fa fa-user" <?php if ($langauges=='ar'){echo 'style="left=0;right:10px"';}elseif($langauges=='en'){echo 'style="left=10;right:0px"';}else{echo 'style="left=10;right:0px"';}?>></i>                               
                        </div>
                        <div class="inputbox">
                            <input pattern=".{3,25}" required title="<?php echo lang('password must be beween 3 to 25'); ?>" autocomplete="new-password" type="password" name="password" placeholder="<?php echo lang("pass");?>" id="password" <?php if($langauges=='ar'){$padding_way='right';echo 'style="padding-'.$padding_way.':45px;padding-left:19px"';}elseif($langauges=='en'){$padding_way='left';echo 'style="padding-'.$padding_way.':45px;padding-right:19px"';}else{$padding_way='left';echo 'style="padding-left:45px;padding-right:19px"';}?>>
                            <i id="show-hide" class="font-icon fa fa-lock fa-2x" <?php if ($langauges=='ar'){echo 'style="left=0;right:10px"';}elseif($langauges=='en'){echo 'style="left=10;right:0px"';}else{echo 'style="left=10;right:0px"';}?>></i>
                        </div>
                        <label for="remeber" class="remember" style="<?php if(isset($_GET['lang']) && ($_GET['lang']=='ar')){echo 'left: 19vw; position:relative';}elseif(isset($_GET['lang']) && ($_GET['lang']=='en')){}else{echo 'left: 19vw; position:relative';}?>">
						<input id="remeber" type="checkbox" class="remeber_input" style="<?php if(isset($_GET['lang']) && ($_GET['lang']=='ar')){echo 'left: 5px; position:relative';}elseif(isset($_GET['lang']) && ($_GET['lang']=='en')){}else{echo 'left: 5px; position:relative';}?>"><?php echo lang("Remember");?></label>
                        <div class="submit_container">
                            <div class="inputbox">
                                <input name='submit_login' type="submit" value="<?php echo lang('login');?>">
                            </div>
                            <div class="inputbox">
                                <a id="langbtn" class="classlangbtn" href="<?php echo $_SERVER["PHP_SELF"].'?lang=';if($lang_btn_value=='ar'){$lang= 'عربى';$_SESSION['lang']='en';echo $lang_btn_value;}elseif($lang_btn_value=='en'){$lang='en';$_SESSION['lang']='ar';echo $lang_btn_value;}?>"><?php echo $lang;?></a>
                            </div>  
                        </div>                             
                    </form>
                    <p style="<?php if(isset($_GET['lang']) && ($_GET['lang']=='ar')){echo 'left: 16vw; position:relative';}elseif(isset($_GET['lang']) && ($_GET['lang']=='en')){}else{echo 'left: 16vw; position:relative';}?>"><span <?php if ($langauges=='ar'){echo 'style="margin-left: 0.5vw;"';}elseif($langauges=='en'){echo 'style="margin-right: 0.5vw;"';}else{echo 'style="margin-right: 0.5vw;"';}?>><?php echo lang('frget');?> </span><a href=""><?php echo lang("pass");?></a></p>
                    <p style="<?php if(isset($_GET['lang']) && ($_GET['lang']=='ar')){echo 'left: 19vw; position:relative';}elseif(isset($_GET['lang']) && ($_GET['lang']=='en')){}else{echo 'left: 19vw; position:relative';}?>"><span <?php if ($langauges=='ar'){echo 'style="margin-left: 0.5vw;"';}elseif($langauges=='en'){echo 'style="margin-right: 0.5vw;"';}else{echo 'style="margin-right: 0.5vw;"';}?>><?php echo lang('ned');?></span><a href=""><?php echo lang('accnt');?></a></p>
                </div>                
            </div>           
        </section>
<?php if(!require_once($inc.$tmp.'footer'.$dotext.$ink)){require_once($inc.$tmp.'footer'.$dotext.$ink);}?>