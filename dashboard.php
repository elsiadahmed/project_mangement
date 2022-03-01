<?php
if(!ob_start("ob_gzhandler")){ob_start();}
	session_start();
	if(isset($_SESSION['username']))
	{
		if(!require_once('inc/template/init.ink')){require_once('inc/template/init.ink');}
		$pageTitle=lang('dashboard');
		require($inc.$tmp.$minhedr.$dotext.$ink); 
		if($pageTitle=='Dashboard' || $pageTitle=='لوحة الأعدادات')
		{
			$page='Dashboard';
		}
		$work='';
		if(isset($_GET['work']))
		{ 
			$work=$_GET['work'];  
		}
		else
		{
			$work='';    
		}?>  
		<div class="container_dashboard"  id="element-to-print"> 
			<aside class="sidebar">
				<ul>                      
					<li>            
						<a id="li_1_convert_right_way_link_to_arabic" href="#" class="li_1_convert_right_way_link_to_arabic"> 
							<span class="icon"><i class="fa fa-database"></i></span>
							<span class="title"><h2><?php echo lang('project management system');?></h2></span>
						</a>        
					</li>                        
					<li class="<?php if(isset($_GET['clicked_1'])){echo 'clicked'; } ?>">
						<b class="" id="li1-b-radius-1"></b>
						<b id="li1-b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_1'])){echo 'clicked'; } ?>" id="li_2_convert_right_way_link_to_arabic" href="<?php echo $_SERVER['PHP_SELF'].'?work=Manage_Projects&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';}echo '&clicked_1'; ?>">                    
							<span class="icon"><i class="fas fa-briefcase fa-2x <?php if(isset($_GET['clicked_1'])){echo 'clicked-1_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_1'])){echo 'clicked-1_title'; } ?>"><?php echo lang('All PROJECTS');?></span>
						</a>
					</li> 
					<li class="<?php if(isset($_GET['clicked_7'])){echo 'clicked'; } ?>">
						<b class="" id="li7-b-radius-1"></b>
						<b id="li7-b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_7'])){echo 'clicked'; } ?>" id="li_8_convert_right_way_link_to_arabic" href="<?php echo $_SERVER['PHP_SELF'].'?work=Manage_users&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';}echo '&clicked_7';?>">
							<span class="icon"><i class="fa fa-users <?php if(isset($_GET['clicked_7'])){echo 'clicked-7_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_7'])){echo 'clicked-7_title'; } ?>"><?php echo lang('Add').lang('space').lang('Users');?></span>
						</a>                   
					</li>
					<li class="<?php if(isset($_GET['clicked_5'])){echo 'clicked'; } ?>">
						<b class="" id="li5-b-radius-1"></b>
						<b id="li15b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_5'])){echo 'clicked'; } ?>" id="li_6_convert_right_way_link_to_arabic" href="#">
							<span class="icon"><i class="fa fa-comment <?php if(isset($_GET['clicked_5'])){echo 'clicked-5_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_5'])){echo 'clicked-5_title'; } ?>"><?php echo lang('Message');?></span>
						</a>    
					</li>
					<li class="<?php if(isset($_GET['clicked_6'])){echo 'clicked'; } ?>">
						<b class="" id="li6-b-radius-1"></b>
						<b id="li6-b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_6'])){echo 'clicked'; } ?>" id="li_7_convert_right_way_link_to_arabic" href="#">
							<span class="icon"><i class="fa fa-question-circle <?php if(isset($_GET['clicked_6'])){echo 'clicked-6_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_6'])){echo 'clicked-6_title'; } ?>"><?php echo lang('Help');?></span>
						</a>
					</li>
					<li class="<?php if(isset($_GET['clicked_9'])){echo 'clicked'; } ?>">
						<b class="" id="li9-b-radius-1"></b>
						<b id="li9-b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_9'])){echo 'clicked'; } ?>" id="li_10_convert_right_way_link_to_arabic" href="#">    
							<span class="icon"><i class="fa fa-cog <?php if(isset($_GET['clicked_9'])){echo 'clicked-9_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_9'])){echo 'clicked-9_title'; } ?>"><?php echo lang('Setting');?></span>
						</a>
					</li>
					<li class="<?php if(isset($_GET['clicked_10'])){echo 'clicked'; } ?>">
						<b class="" id="li10-b-radius-1"></b>
						<b id="li10-b-radius-2"></b>
						<a class="<?php if(isset($_GET['clicked_10'])){echo 'clicked'; } ?>" id="li_11_convert_right_way_link_to_arabic" href="<?php echo 'sign_out.php?lang='.$_GET['lang'];?>">
							<span class="icon"><i class="fa fa-arrow-alt-circle-left  <?php if(isset($_GET['clicked_10'])){echo 'clicked-10_i'; } ?>"></i></span>
							<span class="title <?php if(isset($_GET['clicked_10'])){echo 'clicked-10_title'; } ?>"><?php echo lang('Sign out');?></span>
						</a>
					</li>        
				</ul> 
			</aside>
		</div>
		<div class="main" id="main">	
			<div class="topbar">
				<div class="toggle">
					<span></span><span class="span_toggle"></span><span></span>
				</div>
				<div class="user" id="user">
					<span id="egypt_logo_container" class="egypt_logo_container"><img src="<?php echo $inc.$lay.$img.$egyptflag.$dotext.$pngext;?>" alt=""></span>
					<div id="flag_title" class="flag_title">
						<span id="flag_title_span_1"><?php echo lang('Ministry of Local Devloment');?></span>
						<span id="flag_title_span_2"><?php echo lang('Numeric Conversion Unit');?></span>
					</div>
				</div>
			</div><?php
			if($work=='Manage_Projects')
			{
				//start Manage_employees page
					$stmt=$conn->prepare("SELECT users.id as user_id,projects.id as projects_id,projects.project_name, projects.project_description,projects.project_date,projects.number_of_version,employees.id as employees_id from projects,team_group,users,employees WHERE team_group.project_id=projects.id and team_group.employee_id=employees.id and users.emp_id=employees.id and team_group.job_code='0';");
					$stmt->execute();
					$rows=$stmt->fetchAll();
					$rows_count=$stmt->rowcount();?>
					<div class="details" id="details" <?php if(isset($_GET['lang'])){if($_GET['lang']=='ar'){echo 'style="direction:rtl"';}elseif(($_GET['lang']=='en')){echo 'style="direction:ltr"';}}?>>
						<div class="emplyees_mangement">
							<div class="card_header">
								<h2><?php echo lang('All PROJECTS');?></h2>	
							</div>
							<div class="table-responsive fixed_table_responsive">
								<table class="table">
									<thead>
										<tr>                    
											<th scope="row"><?php echo lang('project name');?></th>                   
											<th scope="row"><?php echo lang('project date'); ?></th> 
											<th scope="row"><?php echo lang('number_of_version'); ?></th>
											<th scope="row"><?php echo lang('project manger') ?></th>   
											<th scope="row"><?php echo lang('control'); ?></th>
										</tr>
									</thead>
									<tbody><?php
										$super_admin=$conn->prepare("SELECT users.id FROM users WHERE users.GROUP_ID=2 and users.id=?;");
										$super_admin->execute(array($_SESSION['user_id']));
										$super_admin_fetch=$super_admin->fetch();
										$super_admin_fetch_count=$super_admin->rowcount();
										foreach($rows as $row)
										{	
											$employee_name=$conn->prepare("SELECT employees.name as employee_name FROM employees,team_group WHERE employees.id=team_group.employee_id and team_group.project_id=? and team_group.job_code='0';");
											$employee_name->execute(array($row['projects_id'].''));
											$employee_name_fetch=$employee_name->fetchall();
											echo '<tr><th scope="row"><span class="status delivred">'.$row['project_name'].'</span></th><th scope="row"><span class="status delivred">';
											$time1=$row['project_date'];
											if($_GET['lang']=='ar'){echo arabic_date($time1);}elseif($_GET['lang']=='en'){echo date('l - j / n / Y',strtotime($time1));}                    
											echo '</span></th><th scope="row"><span class="status delivred">'.lang($row['number_of_version']).'</span></th><th scope="row"><span class="status delivred">';
											foreach($employee_name_fetch as $employee_name_loop)
											{
												if($employee_name_loop['employee_name'] != '')
												{
													echo $employee_name_loop['employee_name'];
												}
												elseif($employee_name_loop['employee_name'] == '')
												{
													echo 'بدون  مدير';
												}
											}
											echo '</span></th><th scope="row"><ul class="ul_btns">';
											$user=$conn->prepare("SELECT users.id as user_id,projects.id as project_id FROM users,team_group,projects,employees WHERE users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and users.id=? and projects.id=?;");
											$user->execute(array($row['user_id'],$row['projects_id']));
											$user_fetch=$user->fetch();
											$user_fetch_count=$user->rowcount();
											$filter_user_admin=$conn->prepare("SELECT users.id,projects.id FROM users,team_group,projects,employees WHERE users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and team_group.job_code='0' and users.id=? and projects.id=?;");
											$filter_user_admin->execute(array($_SESSION['user_id'],$row['projects_id']));
											$filter_user_admin_fetch=$filter_user_admin->fetchall();
											$project_name_query_count=$filter_user_admin->rowcount();
											if($user_fetch_count > 0)
											{
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=print_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id='.$user_fetch['user_id'].'&id='.$user_fetch['project_id']; echo '" class="btn btn-info">';echo lang('print').'</a></li>';
											}
											elseif($project_name_query_count > 0)
											{
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=print_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id=';$super_admin_loop['user_id'].'&id='.$super_admin_loop['project_id']; echo '" class="btn btn-info">';echo lang('print').'</a></li>';
											}
											elseif($super_admin_fetch_count > 0)
											{
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=print_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id='.$_SESSION['user_id'].'&id='.$row['projects_id']; echo '" class="btn btn-info">';echo lang('print').'</a></li>';
											}
											if($project_name_query_count > 0)
											{	
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=edit_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id='.$row['user_id'].'&id='.$row['projects_id']; echo '" class="btn btn-success">';echo lang('edit').'</a></li>';
											}elseif($super_admin_fetch_count > 0)
											{
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=edit_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id='.$_SESSION['user_id'].'&id='.$row['projects_id']; echo '" class="btn btn-success">';echo lang('edit').'</a></li>';
											}
											if($super_admin_fetch > 0)
											{
												echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=delete_project&id='.$row['projects_id'].'&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} echo '&user_id='.$row['user_id'].'" class="btn btn-danger confirm">'.lang('delete').'</a></li>';
											}
											$files_project=$conn->prepare("SELECT projects_files.file_path FROM projects_files WHERE projects_files.project_id=?;");
											$files_project->execute(array($row['projects_id']));
											$files_project_fetch=$files_project->fetch();
											$files_project_count=$files_project->rowcount();
											$user_work_in_project=$conn->prepare("SELECT users.id from users,employees,team_group,projects,projects_files where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and projects_files.project_id=projects.id and users.id=? and projects.id=?;");
											$user_work_in_project->execute(array($_SESSION['user_id'],$row['projects_id']));
											$user_work_in_project_fetch=$user_work_in_project->fetch();
											$user_work_in_project_count=$user_work_in_project->rowcount();
											if($files_project_count > 0 && ($super_admin_fetch_count > 0 || $user_work_in_project_count > 0)){?>
											<li title="<?php echo lang('files project').lang('space').$row['project_name'];?>"><a href="<?php echo $files_project_fetch['file_path']; ?>" class="btn btn-danger"><i id="show-hide" class="far fa-file-archive fa-2x" <?php if(isset($_GET['lang'])){if($_GET['lang']=='ar'){echo 'style="left=0;right:10px"';}elseif($_GET['lang']=='en'){echo 'style="left=10;right:0px"';}else{echo 'style="left=0;right:10px"';}} ?>></i></a></li>
											<?php }
											echo '</ul></th></tr>';										
										}?>
									</tbody>
								</table>
							</div> 			  
						</div>			
					</div><?php	
						if($super_admin_fetch > 0)
						{?>
							<a style="position: relative;left: 3vw;font-size: larg;top:1%;" href="<?php echo $_SERVER['PHP_SELF'].'?work=add_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>" class="btn btn-info"><?php echo lang('Add'); ?></a></li><?php
						}         
				//end Manage_employees page
			}
			elseif($work=='add_project')
			{
				//start Add_Employees page ?>       
					<div class="edit_employees_container height_fixed">                      
						<h2><?php echo lang('Add').lang('space');if($_GET['lang']=='ar'){echo lang('project_without_al').lang('space').lang('new');}else{echo lang('new').lang('space').lang('project_without_al');} ?></h2>
						<form method="POST" id="add_project_form" class="add_project_form" action="<?php echo '?work=insert_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>" enctype="multipart/form-data">
							<div class="container-fluid add_edit_container">
								<div class="row">
									<div class="project_name form-group col-xl-7 ml-xl-0 col-lg-8 ml-lg-0 col-md-9 ml-md-5 col-sm-10 ml-sm-5">
										<input required id="project_name" type="text" pattern=".{3,250}" title="<?php echo lang('project name must be between 3 to 250 character'); ?>" autocomplete="off" value="" placeholder="<?php echo lang('project name'); ?>" name="project_name" class="form-control">
									</div>                  
									<div  class="project_date form-group col-xl-3 ml-xl-0 col-lg-4 ml-lg-0 col-md-5 ml-md-5 col-sm-10 ml-sm-5">
										<input required id="project_date" title="<?php echo lang("project date can't be empty"); ?>"  type="text" placeholder="<?php echo lang('project_date'); ?>" name="project_date" class="form-control">
									</div>
									<div class="number_of_version form-group col-xl-2 ml-xl-0 col-lg-3 col-md-4 col-sm-10 ml-sm-5">					
										<select class="form-control" required title="<?php echo lang('number_of_version can\'t be not selected'); ?>" id="number_of_version" name="number_of_version">
											<option value=''><?php echo lang('number_of_version');?></option>
											<option value='first'><?php echo lang('first');?></option>
											<option value='seconde'><?php echo lang('seconde'); ?></option>
											<option value='third'><?php echo lang('third');?></option>
										</select>
									</div> 
								</div>	
								<div class="row">
									<div class="manger_name form-group col-lg-5 mr-lg-5 col-md-5 col-sm-6 col-8">
											<?php $mangers=$conn->prepare("SELECT employees.name,employees.id as employee_id from employees;");
											$mangers->execute(array());
											$mangers_name=$mangers->fetchall(); ?>
											<select class="form-control" required title="<?php echo lang('manger name can\'t be not selected'); ?>" id="manger_name" name="manger_name_code">
												<option value=''><?php echo lang('manger_name');?></option>						
												<?php foreach($mangers_name as $mangersloop)
												{ ?>
													<option value='<?php echo $mangersloop['employee_id']; ?>'><?php echo $mangersloop['name']; ?></option><?php }?>
											</select>
								    </div>					
									<div class="form-group row col col-lg-12 col-md-12 col-sm-12 col-12" style="margin-right:1vw">	
										<select required class="instuite1 form-control col-xl-4 mb-xl-2 col-lg-5 mb-lg-2 mr-lg-2 col-md-6 mr-md-2 mb-md-2 col-sm-9 mb-sm-2 col-10 mb-2" id="instuite1" name="instuite1"  title="<?php echo lang('instuite 1 must be selected');?>">					 
											<?php $stmt1=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite;");
											$stmt1->execute(array()); 
											$instuites=$stmt1->fetchall();?>							
											<option value=''><?php echo lang('instuite intersted in').lang('space').'1';?></option>
											<?php foreach($instuites as $instuitesloop){ ?>
											<option value="<?php echo $instuitesloop['id']; ?>"><?php echo $instuitesloop['instuite_name']; ?></option><?php }?>
										</select>
										<select class="instuite2 form-control col-xl-4 mb-xl-0 col-lg-5 mb-lg-2 col-md-6 mr-md-2 mb-md-2 col-sm-9 mb-sm-2 col-10 mb-2" id="instuite2" name="instuite2">
											<option value=''><?php echo lang('instuite intersted in').lang('space').'2';?></option>
											<?php foreach($instuites as $instuiteloop){ ?>
											<option value="<?php echo $instuiteloop['id']; ?>"><?php echo $instuiteloop['instuite_name']; ?></option><?php }?>
										</select>
										<select class="instuite3 form-control col-xl-4 col-lg-5 col-md-6 col-sm-9 col-10" id="instuite3" name="instuite3">
											<option value=''><?php echo lang('instuite intersted in').lang('space').'3';?></option>
											<?php foreach($instuites as $instuiteloop){ ?>
											<option value="<?php echo $instuiteloop['id']; ?>"><?php echo $instuiteloop['instuite_name']; ?></option>	
											<?php }?>
										</select>
									</div>
									<div class="row">
										<div class="project_description inputbox form-group col-lg-6 col-md-8 col-sm-9">
											<textarea required id="project_description" title="<?php echo lang('project description between 3 and 2000');?>" style="resize: none;" rows="4" cols="50" placeholder="<?php echo lang('project_description'); ?>" name="project_description" class="form-control"></textarea>
										</div>
										<div class="finished_job inputbox form-group col-lg-6 col-md-8 col-sm-9">
										  <textarea required id="finished_job"  title="<?php echo lang('finished job between 3 to 5000 charcter');?>" style="resize: none;" rows="4" cols="50" placeholder="<?php echo lang('finished_job'); ?>" name="finished_job" class="form-control"></textarea>
										</div>
									</div>
									<div class="row">
										 <div class="finished_job_date inputbox form-group col-8 col-md-5 col-sm-5">
										  <input id="finished_job_date" required type="text" placeholder="<?php echo lang('finished_job_date'); ?>" name="finished_job_date"  title="<?php echo lang('finished job date can\'t be empty'); ?>" class="form-control">      
										</div>
										<div class="required_job inputbox form-group col-12 col-md-12 col-sm-12">
										  <textarea required id="required_job" title="<?php echo lang('required must be between 3 to 1000 charcter');?>" style="resize: none;max-height:170px;margin: 0px;height: 258px;width: 100%;" rows="4" cols="50" placeholder="<?php echo lang('required_job'); ?>" name="required_job" class="form-control"></textarea>
										</div>
									</div>
									<div class="row offset-4">		
										<div class="inputbox form-group col-12" id="submit">									
											<input title="<?php if($_GET['lang']=='ar'){echo ".jpg,.gif,.jpeg,.png,.doc,.pdf".lang('space').lang('extinsion allowed');}else{echo lang('extinsion allowed').lang('space').".jpg,.gif,.jpeg,.png,.doc,.pdf";}?>" accept=".jpg,.gif,.jpeg,.png,.doc,.pdf" required style="font-size: large" type="file" class="file btn btn-info file_upload col-5" value="<?php echo lang('choose the file');?>" name="file_upload[]" multiple="multiple">
										</div>
										<div class="inputbox form-group col-5">
											<input  style="font-size: large" type="submit" class="btn btn-info col-6" value="<?php echo lang('Add');?>">
										</div>
									</div>
								</div>	
							</div>
						</form>                  
			</div><?php 
      //end Add_Employees page
    }
	elseif($work=='insert_project')
    {
		//start manage update_employee page
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        ?><h1 style="text-align:center;"><?php echo lang('Add').lang('space').lang('project'); ?></h1><?php
		$formerror=array();
		$successmsg=array();
		$project_name=filter_var($_POST['project_name'],FILTER_SANITIZE_STRING);
		$project_date=$_POST['project_date'];
		$number_of_version=$_POST['number_of_version'];
		$manger_name_code=$_POST['manger_name_code'];
		$instuite1=$_POST['instuite1'];
		$instuite2=$_POST['instuite2'];
		$instuite3=$_POST['instuite3'];
		$project_description=filter_var($_POST['project_description'],FILTER_SANITIZE_STRING);
		$finished_job=filter_var($_POST['finished_job'],FILTER_SANITIZE_STRING);
	    $finished_job_date=$_POST['finished_job_date'];
		$uploaded=$_FILES['file_upload'];
		$file_upload_name=$uploaded['name'];
		$file_upload_type=$uploaded['type'];
		$file_upload_tmp_name=$uploaded['tmp_name'];
		$file_upload_size=$uploaded['size'];
		$file_upload_error=$uploaded['error'];
		$count_file_upload_name=count($file_upload_name);		
		if(isset($_POST['required_job']) && !empty($_POST['required_job']))
		{
			if(strlen($_POST['required_job']) < 3 || strlen($_POST['required_job']) > 1000)
		    {
				if(strlen($_POST['required_job']) < 3)			
				{
					$formerror[]=lang('required job smaller than 3 charcter');
				}elseif(strlen($_POST['required_job']) > 1000)
				{
					$formerror[]=lang('required job larger than 1000 charcter');
				}
			}else
			{
				$required_job=filter_var($_POST['required_job'],FILTER_SANITIZE_STRING);
			}
	    }
		if(empty($project_name) || strlen($project_name) < 3 || strlen($project_name) > 250)
		{
			if(empty($project_name))
			{
				$formerror[]=lang('project name can\'t be empty');
			}elseif(strlen($project_name) < 3)			
			{
				$formerror[]=lang('project name smaller than 3 charcter');
			}elseif(strlen($project_name) > 250)
			{
				$formerror[]=lang('project name larger than 250 charcter');
			}
		}				
		if(empty($project_date))
		{
			$formerror[]=lang('project date can\'t be empty');
		}
		if(empty($number_of_version))
		{
			$formerror[]=lang('number of version can\'t be not selected');
		}		
		if(empty($manger_name_code))
		{
			$formerror[]=lang('manger name can\'t be not selected');
		}		
		if(empty($instuite1))
		{
			$formerror[]=lang('instuite 1 can\'t be not selected');
		}		
		if(($_POST['instuite1'] == $_POST['instuite2'] && !empty($_POST['instuite1']) && !empty($_POST['instuite2'])) || ($_POST['instuite1'] == $_POST['instuite3'] && !empty($_POST['instuite1']) && !empty($_POST['instuite3'])) || ($_POST['instuite2'] == $_POST['instuite3'] && !empty($_POST['instuite2']) && !empty($_POST['instuite3'])) || (($_POST['instuite1'] == $_POST['instuite3'] && $_POST['instuite1'] == $_POST['instuite2']) && !empty($_POST['instuite1']) && !empty($_POST['instuite2']) && !empty($_POST['instuite3'])))
		{
			$formerror[]=lang('instuite can\'t be equal another instuite');
		}	
		if(empty($project_description) || strlen($project_description) < 3 || strlen($project_description) > 2000)
		{
			if(empty($project_description))
			{
				$formerror[]=lang('project description can\'t be empty');
			}elseif(strlen($project_description) < 3)			
			{
				$formerror[]=lang('project description smaller than 3 charcter');
			}elseif(strlen($project_description) > 2000)
			{
				$formerror[]=lang('project description larger than 2000 charcter');
			}
		}
		if(empty($finished_job) || strlen($finished_job) < 3 || strlen($finished_job) > 5000)
		{
			if(empty($finished_job))
			{
				$formerror[]=lang('finished job can\'t be empty');
			}elseif(strlen($finished_job) < 3)			
			{
				$formerror[]=lang('finished job smaller than 3 charcter');
			}elseif(strlen($finished_job) > 5000)
			{
				$formerror[]=lang('finished job larger than 5000 charcter');
			}
		}
		if(empty($finished_job_date))
		{
			$formerror[]=lang('finished job date can\'t be empty');
		}
		if(!empty($formerror))
		{			
			foreach($formerror as $error)
			{
				msg_responde($error,);
			}
			$second=10;
			$txtsecond=lang('space').lang('ثوانى');
			if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
			redirectmsg($msg,$second,$txtsecond);
		}elseif(empty($formerror))
		{
			if(!$file_upload_error[0] == 4)
			{
				$path=$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload;
				mkdir($path.$project_name.'/files',0777,true);
				$allimage=array();
				$allowed_extinsion=array('jpg','gif','jpeg','png','doc','pdf');
				for($i = 0; $i < $count_file_upload_name; $i++)
				{
					$errorarray=array();
					$successarray=array();				
					$convert_to_lower[$i]=strtolower($file_upload_name[$i]);
					$image_extinsion[$i]=explode('.',$convert_to_lower[$i]);
					$image_extinsion_end[$i]=end($image_extinsion[$i]);
					$image_random[$i]=rand(0,10000000).'_@_'.$convert_to_lower[$i];					
					if(!in_array($image_extinsion_end[$i],$allowed_extinsion))
					{
						if($_GET['lang']=='ar'){$errorarray[]=lang('space').$image_extinsion_end[$i].lang('space').lang('extinsion name that is not allowed is').lang('space').$file_upload_name[$i].lang('space').lang('this extinsion is not allowed').lang('space').lang('for').lang('space');}else{$errorarray[]=lang('this extinsion is not allowed').lang('space').lang('for').lang('space').$file_upload_name[$i].lang('extinsion name that is not allowed is').lang('space').$image_extinsion_end[$i];}
					}
					//maximum size 30M
					if($file_upload_size[$i] > 31457280)
					{
						if($_GET['lang']=='ar'){$errorarray[]=lang('space').$file_upload_name[$i].lang('space').lang('this file is big').lang('space').lang('the name of file is : ');}else{$errorarray[]=lang('this file is big').lang('space').lang('the name of file is : ').$file_upload_name[$i];}
					}
					foreach($errorarray as $error_file)
					{
						echo msg_responde($error_file);
					}
					if(empty($errorarray))
					{	
						if(!$file_upload_error[0] == 4)
						{
							move_uploaded_file($file_upload_tmp_name[$i],$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload.$project_name.'/files/'.$convert_to_lower[$i]);
							$successarray[]=lang('تم الرفع بنجاح').lang('space').$file_upload_name[$i];
							
							foreach($successarray as $successarray_array)
							{
								echo msg_responde('',$successarray_array);
							}
						}
					}
				}
				$new_path=$path.$project_name.'/files/';
				$zip=new ZipArchive();
				$zip->open($path.$project_name.'/'.$project_name.'.zip',ZipArchive::CREATE);
				$files=scandir($new_path);
				unset($files[0],$files[1]);
				foreach($files as $file)
				{
					$zip->addFile($new_path.$file,$file);
				}
				$zip->close();
				foreach($files as $file)
				{
					unlink($new_path.$file);
				}			
				rmdir($new_path);				
			}
			$project_name_query=$conn->prepare("SELECT project_name FROM projects WHERE project_name = ?;");
			$project_name_query->execute(array($project_name));
			$project_name_query_count=$project_name_query->rowcount();
			if($project_name_query_count < 1)
			{				
				$stmt=$conn->prepare("INSERT INTO projects(project_name,project_description,project_date,number_of_version)VALUES(:zproject_name,:zproject_description,:zproject_date,:znumber_of_version);");
				$stmt->execute(array('zproject_name'=>$project_name,'zproject_description'=>$project_description,'zproject_date'=>$project_date,'znumber_of_version'=>$number_of_version));
				$count=$stmt->rowcount();
				if(!$file_upload_error[0] == 4)
				{
					$project=$conn->prepare("SELECT id FROM projects WHERE project_name = ?;");
					$project->execute(array($project_name));
					$project_id_fetch=$project->fetch();
					$project_id_count=$project->rowcount();
					$stmt=$conn->prepare("INSERT INTO projects_files(projects_files.file_path,projects_files.project_id) VALUES(:zfile_path,:zproject_id)");
					$stmt->execute(array('zfile_path'=>$inc.$tmp.$upload.$project_name.'/'.$project_name.'.zip','zproject_id'=>$project_id_fetch['id']));
					$count=$stmt->rowcount();
				}		
				$curent_inserted_project_id_value=$conn->prepare("SELECT max(projects.id) as curent_inserted_project_id_value from projects;");
				$curent_inserted_project_id_value->execute(array());
				$curent_inserted_project_id=$curent_inserted_project_id_value->fetch();
				$curent_inserted_project_id_count=$curent_inserted_project_id_value->rowcount();
				$stmt=$conn->prepare("INSERT INTO team_group(project_id,employee_id,job_code,join_date)VALUES(:zproject_id,:zemployee_id,'0',now());");
				$stmt->execute(array('zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value'],'zemployee_id'=>$manger_name_code));
				$count2=$stmt->rowcount();				
				if(isset($instuite1))
				{
					$stmt1=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
					$stmt1->execute(array(':zinstuite_id'=>$instuite1,'zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value']));
					$count3=$stmt1->rowcount();
					if($count3 > 0)
					{
						$successmsg[]=lang('تم اضافة بيانات المشروع وبيانات الجهة الأولى').lang('space');
					}
				}
				if(isset($instuite2) && !empty($instuite2))
				{
					$stmt2=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
					$stmt2->execute(array(':zinstuite_id'=>$instuite2,'zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value']));
					$count4=$stmt2->rowcount();
					if($count4 > 0)
					{
						$successmsg[]=lang('وبيانات الجهة الخارجية الثانية').lang('space');
					}
				}
				if(isset($instuite3) && !empty($instuite3))
				{
					$stmt3=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
					$stmt3->execute(array(':zinstuite_id'=>$instuite3,'zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value']));
					$count5=$stmt3->rowcount();
					if($count5 > 0)
					{
						$successmsg[]=lang('وبيانات الجهة الخارجية الثالثة').lang('space');
					}
				}
				$stmt=$conn->prepare("INSERT INTO finished_job(job_finish,project_id,job_finish_date) VALUES (:zjob_finish,:zproject_id,:zjob_finish_date);");
				$stmt->execute(array('zjob_finish'=>$finished_job,'zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value'],'zjob_finish_date'=>$finished_job_date));
				$count6=$stmt->rowcount();
				if(isset($required_job) && !empty($required_job))
				{
					$stmt=$conn->prepare("INSERT INTO required_job(project_id,required) VALUES (:zproject_id,:zrequired);");
					$stmt->execute(array('zproject_id'=>$curent_inserted_project_id['curent_inserted_project_id_value'],'zrequired'=>$curent_inserted_project_id['curent_inserted_project_id_value'],'zrequired'=>$required_job));
					$count7=$stmt->rowcount();
					if($count7 > 0)
					{
						$successmsg[]=lang('وبيانات المطلوب من الوزارة').lang('space');
					}
				}
				foreach($successmsg as $success_msg)
				{
					msg_responde('',$success_msg);
				}
				$second=10;
				$txtsecond=lang('space').lang('ثوانى');
				if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
			    redirectmsg($msg,$second,$txtsecond);
				
			}else
			{
				msg_responde(lang('this project name is exist'));
				$second=5;
				$txtsecond=lang('space').lang('ثوانى');
				if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
				redirectmsg($msg,$second,$txtsecond);
			}	
		}
      }
      else
      {
		header("location: sign_out.php");
        exit();
      }         
     //end update_employee page
	}
    elseif($work=='edit_project')
    {
      //start edit_employee page  
        if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
          $project_sanitize_id=htmlspecialchars(intval($_GET['id']),ENT_COMPAT);
		  $_SESSION['project_sanitize_id']=$project_sanitize_id;
        }
        else
        {
          header("location: sign_out.php");
          exit(); 
        }
        $stmt1=$conn->prepare("SELECT projects.id,projects.project_name,projects.project_description, projects.project_date, projects.number_of_version, employees.name as manger_name,employees.id as employee_id,instuite.instuite_name,finished_job.job_finish as finished_job,finished_job.job_finish_date as finished_job_date FROM projects, employees, team_group,instuite,instuite_job,finished_job WHERE team_group.project_id=projects.id and team_group.employee_id = employees.id AND team_group.job_code = '0' and instuite_job.instuite_id=instuite.id and instuite_job.project_id=projects.id and finished_job.project_id=team_group.project_id and projects.id=?;");
        $stmt1->execute(array($project_sanitize_id));
        $project_information=$stmt1->fetch();		
        $count1=$stmt1->rowcount();         
        if(($count1 > 0)){$_SESSION['id']=$project_sanitize_id;?>
              <div class="edit_employees_container height_fixed">                      
				<h2><?php echo $project_information['project_name']; ?></h2>
				<?php $stmt1=$conn->prepare("SELECT required_job.required from required_job,projects where required_job.project_id=projects.id and projects.id=?;");
					  $stmt1->execute(array($project_sanitize_id));
					 $required=$stmt1->fetch();
						  $count_required=$stmt1->rowcount(); ?>
                <form method="POST" id="edit_form" class="add_project_form" action="<?php echo '?work=update_project&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>" enctype="multipart/form-data">
                   <div class="container-fluid add_edit_container">
					<div class="row">
						<div class="project_name form-group col-xl-7 ml-xl-0 col-lg-8 ml-lg-0 col-md-9 ml-md-5 col-sm-10 ml-sm-5">
							<input required id="project_name" type="text" pattern=".{3,250}" title="<?php echo lang('project name must be between 3 to 250 character'); ?>" autocomplete="off" value="<?php echo $project_information['project_name']; ?>" placeholder="<?php echo lang('project name'); ?>" name="project_name" class="asterix form-control">
						</div>                     
						<div  class="project_date form-group col-xl-3 ml-xl-0 col-lg-4 ml-lg-0 col-md-5 ml-md-5 col-sm-10 ml-sm-5">
							<input required id="project_date" title="<?php echo lang("project date can't be empty"); ?>" type="date" placeholder="<?php echo lang('project_date'); ?>" name="project_date" value="<?php if(!($project_information['project_date'] == 'null')){echo $project_information['project_date'];} ?>" class="form-control">
                        </div>
						<div class="number_of_version form-group col-xl-2 ml-xl-0 col-lg-3 col-md-4 col-sm-10 ml-sm-5">					
							<select required class="form-control" title="<?php echo lang('number_of_version can\'t be not selected'); ?>" id="number_of_version" name="number_of_version">
								<option value=''><?php echo lang('number_of_version');?></option>
								<?php $number_of_version=$conn->prepare("SELECT projects.number_of_version from projects where projects.id=?");
								$number_of_version->execute(array($_GET['id']));
								$number_of_version_fetch=$number_of_version->fetch();
								$first='first';
								$seconde='seconde';
								$third='third';?>
								<option value='<?php echo $number_of_version_fetch['number_of_version'];?>' selected><?php echo lang($number_of_version_fetch['number_of_version']);?></option>
								<?php if($first != $number_of_version_fetch['number_of_version']){echo "<option value='first'>".lang('first')."</option>";}?>
								<?php if($seconde != $number_of_version_fetch['number_of_version']){echo "<option value='seconde'>".lang('seconde')."</option>";}?>
								<?php if($third != $number_of_version_fetch['number_of_version']){echo "<option value='third'>".lang('third')."</option>";}?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="manger_name form-group col-lg-5 mr-lg-5 col-md-5 col-sm-6 col-8"> 
						<?php $manger=$conn->prepare("SELECT employees.name,employees.id as employee_id from employees,team_group,projects WHERE team_group.employee_id = employees.id AND team_group.job_code='0' AND team_group.project_id=projects.id AND projects.id=?;");
						  $manger->execute(array($_SESSION['id']));
                          $manger_name=$manger->fetch(); ?>
						<?php $mangers=$conn->prepare("SELECT employees.name,employees.id as employee_id from employees where employees.id != ?;");
						  $mangers->execute(array($manger_name['employee_id']));
                          $mangers_name=$mangers->fetchall();
						  $super_admin=$conn->prepare("SELECT users.id FROM users WHERE users.GROUP_ID=2 and users.id=?;");
						  $super_admin->execute(array($_SESSION['user_id']));
						  $super_admin_fetch=$super_admin->fetch();
						  $super_admin_fetch_count=$super_admin->rowcount();?>
                     <select required class="form-control" id="manger_name" title="<?php echo lang('manger name can\'t be not selected'); ?>" id="manger_name" name="manger_name_code">
						<option value=''><?php echo lang('manger_name');?></option>						
						<option value='<?php echo $manger_name['employee_id'];?>' selected><?php echo $manger_name['name'];?></option>
						<?php if($super_admin_fetch_count > 0){foreach($mangers_name as $mangersloop){ ?>
						<option value='<?php echo $mangersloop['employee_id']; ?>'><?php echo $mangersloop['name']; ?></option>
						<?php }}?>
					  </select>
					</div>
				   <div class="form-group row col col-lg-12 col-md-12 col-sm-12 col-12" id="instuite_div">	
                      <select required class="instuite1 form-control col-xl-4 mb-xl-2 col-lg-5 mb-lg-2 mr-lg-2 col-md-6 mr-md-2 mb-md-2 col-sm-9 mb-sm-2 col-10 mb-2" id="instuite1" name="instuite1" title="<?php echo lang('instuite 1 must be selected');?>">
							<?php 
								$stmt1=$conn->prepare("SELECT instuite.id as instuite_id,instuite.instuite_name from instuite,instuite_job where instuite.id=instuite_job.instuite_id and instuite_job.project_id=?;");
								$stmt1->execute(array($_GET['id'])); 
								$selected_instuite=$stmt1->fetchall();
								$count_selected_instuite=$stmt1->rowcount();
								$stmt2=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite where instuite.id != ?;");
								$stmt2->execute(array($selected_instuite[0]['instuite_id'])); 
								$instuites1=$stmt2->fetchall();
								$standard_instuites=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite;");
								$standard_instuites->execute(array()); 
								$standard_instuites_fetch=$standard_instuites->fetchall();
								if($count_selected_instuite == 2)
								{
									$stmt3=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite where instuite.id != ?;");
									$stmt3->execute(array($selected_instuite[1]['instuite_id'])); 
									$instuites2=$stmt3->fetchall();
									
								}elseif($count_selected_instuite == 3)
								{
									$stmt3=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite where instuite.id != ?;");
									$stmt3->execute(array($selected_instuite[1]['instuite_id'])); 
									$instuites2=$stmt3->fetchall();
									$stmt4=$conn->prepare("SELECT instuite.instuite_name,instuite.id from instuite where instuite.id != ?;");
									$stmt4->execute(array($selected_instuite[2]['instuite_id'])); 
									$instuites3=$stmt4->fetchall();
								}?>
						<option value=''><?php echo lang('instuite intersted in').lang('space').'1';?></option>						
						<option value="<?php echo $selected_instuite[0]['instuite_id']; ?>" selected><?php echo $selected_instuite[0]['instuite_name']; ?></option>
						<?php foreach($instuites1 as $instuitesloop1){ ?>
						<option value="<?php echo $instuitesloop1['id']; ?>"><?php echo $instuitesloop1['instuite_name']; ?></option>
						<?php }?>
					  </select>					 
					   <select class="instuite2 form-control col-xl-4 mb-xl-0 col-lg-5 mb-lg-2 col-md-6 mr-md-2 mb-md-2 col-sm-9 mb-sm-2 col-10 mb-2" id="instuite2" name="instuite2">
					   <option value=''><?php echo lang('instuite intersted in').lang('space').'2';?></option>
						<?php if($count_selected_instuite == 3){?><option value="<?php echo $selected_instuite[1]['instuite_id']; ?>" selected><?php echo $selected_instuite[1]['instuite_name']; ?></option>
						<?php foreach($instuites2 as $instuiteloop2){ ?>
						<option value="<?php echo $instuiteloop2['id']; ?>"><?php echo $instuiteloop2['instuite_name']; ?></option>	
						<?php }}elseif($count_selected_instuite == 2){?><option value="<?php echo $selected_instuite[1]['instuite_id']; ?>" selected><?php echo $selected_instuite[1]['instuite_name']; ?></option>
						<?php foreach($instuites2 as $instuiteloop2){ ?>
						<option value="<?php echo $instuiteloop2['id']; ?>"><?php echo $instuiteloop2['instuite_name']; ?></option>	
						<?php }}else{
							foreach($standard_instuites_fetch as $standard_instuites_loop){ ?>
						<option value="<?php echo $standard_instuites_loop['id']; ?>"><?php echo $standard_instuites_loop['instuite_name']; ?></option>	
						<?php }
						}?>
					  </select>
					  <select class="instuite3 form-control col-xl-4 col-lg-5 col-md-6 col-sm-9 col-10" id="instuite3" name="instuite3">
					  <option value=''><?php echo lang('instuite intersted in').lang('space').'3';?></option>
						<?php if($count_selected_instuite == 3){?><option value="<?php echo $selected_instuite[2]['instuite_id']; ?>" selected><?php echo $selected_instuite[2]['instuite_name']; ?></option>
						<?php foreach($instuites3 as $instuiteloop3){ ?>
							<option value="<?php echo $instuiteloop3['id']; ?>"><?php echo $instuiteloop3['instuite_name']; ?></option>
						<?php }}else{
							foreach($standard_instuites_fetch as $standard_instuites_loop){ ?>
						<option value="<?php echo $standard_instuites_loop['id']; ?>"><?php echo $standard_instuites_loop['instuite_name']; ?></option>	
						<?php }
						}?>
					  </select>
                     </div>
					 <div class="row">
                    <div class="project_description inputbox form-group col-lg-6 col-md-8 col-sm-9">
                      <textarea required id="project_description" title="<?php echo lang('project description between 3 and 2000');?>" style="resize: none;max-height:170px;margin: 0px;height: 258px;width: 100%;" rows="4" cols="50" placeholder="<?php echo lang('project_description'); ?>" name="project_description" class="form-control"><?php echo $project_information['project_description']; ?></textarea>
                    </div>
					<div class="finished_job inputbox form-group col-lg-6 col-md-8 col-sm-9">
                      <textarea required id="finished_job" title="<?php echo lang('finished job between 3 to 5000 charcter');?>" style="resize: none;max-height:170px;margin: 0px;height: 258px;width: 100%;" rows="4" cols="50" placeholder="<?php echo lang('finished_job'); ?>" name="finished_job" class="form-control"><?php echo $project_information['finished_job']; ?></textarea>
                    </div>
					</div>
					<div class="row">
					<div class="finished_job_date inputbox form-group col-8 col-md-5 col-sm-5">
                      <input required id="finished_job_date" type="date" placeholder="<?php echo lang('finished_job_date'); ?>" name="finished_job_date" value="<?php echo $project_information['finished_job_date'];?>" class="form-control" title="<?php echo lang('finished job date can\'t be empty'); ?>">
                    </div>
					<?php $stmt1=$conn->prepare("SELECT required_job.required from required_job,projects where required_job.project_id=projects.id and projects.id=?;");
						  $stmt1->execute(array($project_sanitize_id));
						  $required=$stmt1->fetch();
						  $count_required=$stmt1->rowcount();if($count_required > 0){ ?>
					<div class="required_job inputbox form-group col-5 col-md-12 col-sm-12">
                      <textarea  id="required_job" style="resize: none;max-height:170px;margin: 0px;height: 258px;" rows="4" cols="50" placeholder="<?php echo lang('required_job'); ?>" name="required_job" class="form-control" title="<?php echo lang('required must be between 3 to 1000 charcter');?>"><?php echo $required['required']; ?></textarea>
                    </div><?php }	?>
					</div>
					<div class="row offset-4">
					<div class="inputbox form-group col-12" id="submit">
					<input title="<?php if($_GET['lang']=='ar'){echo ".jpg,.gif,.jpeg,.png,.doc,.pdf".lang('space').lang('extinsion allowed');}else{echo lang('extinsion allowed').lang('space').".jpg,.gif,.jpeg,.png,.doc,.pdf";}?>" accept=".jpg,.gif,.jpeg,.png,.doc,.pdf" required style="font-size: large" type="file" class="file btn btn-info file_upload col-5" value="<?php echo lang('choose the file');?>" name="file_upload[]" multiple="multiple">
					</div>
					<div class="inputbox form-group col-5">
					<input type="submit" class="btn btn-success col-6" value="<?php echo lang('edit');?>">
					</div>
					</div>
					</div>
					</div>
                </form>                  
			</div><?php      
        } 
        else
        {
          header("location: sign_out.php");
          exit(); 
        }     
      //end edit_employee page
    }
    elseif($work=='update_project')
    {
      //start manage update_employee page
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        ?><h1 style="text-align:center;"><?php echo lang('update').lang('space').lang('project'); ?></h1><?php
		$formerror=array();
		$instuite_array=array();
		$id=filter_var($_SESSION['project_sanitize_id'],FILTER_SANITIZE_NUMBER_INT);				
		$project_name=filter_var($_POST['project_name'],FILTER_SANITIZE_STRING);
		$project_date=$_POST['project_date'];
		$number_of_version=$_POST['number_of_version'];
		$manger_name_code=$_POST['manger_name_code'];
		$instuite1=$_POST['instuite1'];
		$instuite2=$_POST['instuite2'];
		$instuite3=$_POST['instuite3'];
		$project_description=filter_var($_POST['project_description'],FILTER_SANITIZE_STRING);
		$finished_job=filter_var($_POST['finished_job'],FILTER_SANITIZE_STRING);
	    $finished_job_date=$_POST['finished_job_date'];	
		$uploaded=$_FILES['file_upload'];
		$file_upload_name=$uploaded['name'];
		$file_upload_type=$uploaded['type'];
		$file_upload_tmp_name=$uploaded['tmp_name'];
		$file_upload_size=$uploaded['size'];
		$file_upload_error=$uploaded['error'];
		$count_file_upload_name=count($file_upload_name);
		if(isset($_POST['required_job']))
		{
			if(empty($_POST['required_job']) || strlen($_POST['required_job']) < 3 || strlen($_POST['required_job']) > 500)
		    {
				if(empty($_POST['required_job']))
				{
					$formerror[]=lang('required job can\'t be empty');
				}elseif(strlen($_POST['required_job']) < 3)			
				{
					$formerror[]=lang('required job smaller than 3 charcter');
				}elseif(strlen($_POST['required_job']) > 500)
				{
					$formerror[]=lang('required job larger than 500 charcter');
				}
			}else
			{
				$required_job=filter_var($_POST['required_job'],FILTER_SANITIZE_STRING);
			}	
	    }
		if(empty($project_name) || strlen($project_name) < 3 || strlen($project_name) > 250)
		{
			if(empty($project_name))
			{
				$formerror[]=lang('project name can\'t be empty');
			}elseif(strlen($project_name) < 3)			
			{
				$formerror[]=lang('project name smaller than 3 charcter');
			}elseif(strlen($project_name) > 250)
			{
				$formerror[]=lang('project name larger than 250 charcter');
			}
		}			
		if(empty($project_date))
		{
			$formerror[]=lang('project date can\'t be empty');
		}
		if(empty($number_of_version))
		{
			$formerror[]=lang('number of version can\'t be not selected');
		}		
		if(empty($manger_name_code))
		{
			$formerror[]=lang('manger name can\'t be not selected');
		}
		if(empty($instuite1))
		{
			$formerror[]=lang('instuite 1 can\'t be not selected');
		}
		if(empty($project_description) || strlen($project_description) < 3 || strlen($project_description) > 500)
		{
			if(empty($project_description))
			{
				$formerror[]=lang('project description can\'t be empty');
			}elseif(strlen($project_description) < 3)			
			{
				$formerror[]=lang('project description smaller than 3 charcter');
			}elseif(strlen($project_description) > 500)
			{
				$formerror[]=lang('project description larger than 2000 charcter');
			}
		}
		if(empty($finished_job) || strlen($finished_job) < 3 || strlen($finished_job) > 500)
		{
			if(empty($finished_job))
			{
				$formerror[]=lang('finished job can\'t be empty');
			}elseif(strlen($finished_job) < 3)			
			{
				$formerror[]=lang('finished job smaller than 3 charcter');
			}elseif(strlen($finished_job) > 500)
			{
				$formerror[]=lang('finished job larger than 5000 charcter');
			}
		}
		if(empty($finished_job_date))
		{
			$formerror[]=lang('finished job date can\'t be empty');
		}
		if(($_POST['instuite1'] == $_POST['instuite2'] && !empty($_POST['instuite2']) && !empty($_POST['instuite1'])) || ($_POST['instuite1'] == $_POST['instuite3'] && !empty($_POST['instuite1']) && !empty($_POST['instuite3'])) || ($_POST['instuite2'] == $_POST['instuite3'] && !empty($_POST['instuite2']) && !empty($_POST['instuite3'])) || ($_POST['instuite1'] == $_POST['instuite3'] && $_POST['instuite1'] == $_POST['instuite2'] && !empty($_POST['instuite1']) && !empty($_POST['instuite2']) && !empty($_POST['instuite3'])))
		{
			$formerror[]=lang("instuite can't equal another instuite");
		}
		if(!empty($formerror))
		{
			foreach($formerror as $error)
			{
				msg_responde($error);
				
			}
			$second=10;
			$txtsecond=lang('space').lang('ثوانى');
			if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
			redirectmsg($msg,$second,$txtsecond);
		}
		if(empty($formerror))
		{
			$path=$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload;
			$checkpath=$path.$project_name.'/'.$project_name.'.zip';
			if(!$file_upload_error[0] == 4)
			{
			if(!file_exists($checkpath))
			{
				if(!$file_upload_error[0] == 4)
				{
					mkdir($path.$project_name.'/files',0777,true);
					$allimage=array();
					$allowed_extinsion=array('jpg','gif','jpeg','png','doc','pdf');
					for($i = 0; $i < $count_file_upload_name; $i++)
					{
						$errorarray=array();
						$successarray=array();				
						$convert_to_lower[$i]=strtolower($file_upload_name[$i]);
						$image_extinsion[$i]=explode('.',$convert_to_lower[$i]);
						$image_extinsion_end[$i]=end($image_extinsion[$i]);
						$image_random[$i]=rand(0,10000000).'_@_'.$convert_to_lower[$i];					
						if(!in_array($image_extinsion_end[$i],$allowed_extinsion))
						{
							if($_GET['lang']=='ar'){$errorarray[]=lang('space').$image_extinsion_end[$i].lang('space').lang('extinsion name that is not allowed is').lang('space').$file_upload_name[$i].lang('space').lang('this extinsion is not allowed').lang('space').lang('for').lang('space');}else{$errorarray[]=lang('this extinsion is not allowed').lang('space').lang('for').lang('space').$file_upload_name[$i].lang('extinsion name that is not allowed is').lang('space').$image_extinsion_end[$i];}
						}
						//maximum size 30M
						if($file_upload_size[$i] > 31457280)
						{
							if($_GET['lang']=='ar'){$errorarray[]=lang('space').$file_upload_name[$i].lang('space').lang('this file is big').lang('space').lang('the name of file is : ');}else{$errorarray[]=lang('this file is big').lang('space').lang('the name of file is : ').$file_upload_name[$i];}
						}
						foreach($errorarray as $error_file)
						{
							echo msg_responde($error_file);
						}
						if(empty($errorarray))
						{	
							if(!$file_upload_error[0] == 4)
							{
								move_uploaded_file($file_upload_tmp_name[$i],$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload.$project_name.'/files/'.$convert_to_lower[$i]);
								$successarray[]=lang('تم الرفع بنجاح').lang('space').$file_upload_name[$i];
								
								foreach($successarray as $successarray_array)
								{
									echo msg_responde('',$successarray_array);
								}
							}
						}
					}
					$new_path=$path.$project_name.'/files/';
					$zip=new ZipArchive();
					$zip->open($path.$project_name.'/'.$project_name.'.zip',ZipArchive::CREATE);
					$files=scandir($new_path);
					unset($files[0],$files[1]);
					foreach($files as $file)
					{
						$zip->addFile($new_path.$file,$file);
					}
					$zip->close();
					foreach($files as $file)
					{
						unlink($new_path.$file);
					}			
					rmdir($new_path);
				}
			}elseif(file_exists($checkpath))
			{
				if(!$file_upload_error[0] == 4)
				{
					$files=scandir($path.$project_name.'/');
					unset($files[0],$files[1]);
					foreach($files as $file)
					{
						unlink($path.$project_name.'/'.$file);
					}
					rmdir($path.$project_name.'/');	
					mkdir($path.$project_name.'/files',0777,true);
					$allimage=array();
					$allowed_extinsion=array('jpg','gif','jpeg','png','doc','pdf');
					for($i = 0; $i < $count_file_upload_name; $i++)
					{
						$errorarray=array();
						$successarray=array();				
						$convert_to_lower[$i]=strtolower($file_upload_name[$i]);
						$image_extinsion[$i]=explode('.',$convert_to_lower[$i]);
						$image_extinsion_end[$i]=end($image_extinsion[$i]);
						$image_random[$i]=rand(0,10000000).'_@_'.$convert_to_lower[$i];					
						if(!in_array($image_extinsion_end[$i],$allowed_extinsion))
						{
							if($_GET['lang']=='ar'){$errorarray[]=lang('space').$image_extinsion_end[$i].lang('space').lang('extinsion name that is not allowed is').lang('space').$file_upload_name[$i].lang('space').lang('this extinsion is not allowed').lang('space').lang('for').lang('space');}else{$errorarray[]=lang('this extinsion is not allowed').lang('space').lang('for').lang('space').$file_upload_name[$i].lang('extinsion name that is not allowed is').lang('space').$image_extinsion_end[$i];}
						}
						//maximum size 30M
						if($file_upload_size[$i] > 31457280)
						{
							if($_GET['lang']=='ar'){$errorarray[]=lang('space').$file_upload_name[$i].lang('space').lang('this file is big').lang('space').lang('the name of file is : ');}else{$errorarray[]=lang('this file is big').lang('space').lang('the name of file is : ').$file_upload_name[$i];}
						}
						foreach($errorarray as $error_file)
						{
							echo msg_responde($error_file);
						}
						if(empty($errorarray))
						{	
							if(!$file_upload_error[0] == 4)
							{
								move_uploaded_file($file_upload_tmp_name[$i],$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload.$project_name.'/files/'.$convert_to_lower[$i]);
								$successarray[]=lang('تم الرفع بنجاح').lang('space').$file_upload_name[$i];
								
								foreach($successarray as $successarray_array)
								{
									echo msg_responde('',$successarray_array);
								}
							}
						}
					}
					$new_path=$path.$project_name.'/files/';
					$zip=new ZipArchive();
					$zip->open($path.$project_name.'/'.$project_name.'.zip',ZipArchive::CREATE);
					$files=scandir($new_path);
					unset($files[0],$files[1]);
					foreach($files as $file)
					{
						$zip->addFile($new_path.$file,$file);
					}
					$zip->close();
					foreach($files as $file)
					{
						unlink($new_path.$file);
					}			
					rmdir($new_path);
				}
			}
		}
			$successmsg=array();
			$stmt=$conn->prepare("UPDATE projects SET projects.project_name=?,projects.project_description=?,projects.project_date=?,projects.number_of_version=? where projects.id =?");
			$stmt->execute(array($project_name,$project_description,$project_date,$number_of_version,$id));
			$count=$stmt->rowcount();
			if(file_exists($checkpath) && !$file_upload_error[0] == 4)
			{
				$project=$conn->prepare("SELECT projects.id from projects where projects.project_name=?");
				$project->execute(array($project_name));
				$project_id_fetch=$project->fetch();
				$project_files=$conn->prepare("SELECT projects_files.id FROM projects_files,projects WHERE projects_files.project_id=projects.id and projects.project_name=?;");
				$project_files->execute(array($project_name));
				$project_files_fetch=$project_files->fetch();
				$project_files_count=$project_files->rowcount();
				if($project_files_count < 1)
				{
					$stmt=$conn->prepare("INSERT INTO projects_files(projects_files.file_path,projects_files.project_id) VALUES(:zfile_path,:zproject_id)");
					$stmt->execute(array('zfile_path'=>$inc.$tmp.$upload.$project_name.'/'.$project_name.'.zip','zproject_id'=>$project_id_fetch['id']));
					$count=$stmt->rowcount();
				}else
				{
					$stmt=$conn->prepare("UPDATE projects_files SET projects_files.file_path=? WHERE projects_files.id=?");
					$stmt->execute(array($inc.$tmp.$upload.$project_name.'/'.$project_name.'.zip',$project_id_fetch['id']));
					$count=$stmt->rowcount();
				}
			}				
			$team_id=$conn->prepare("SELECT team_group.id as team_group_id FROM team_group WHERE team_group.project_id=? and team_group.job_code='0';");
			$team_id->execute(array($id));
			$team_id_variable1=$team_id->fetch();
			$stmt2=$conn->prepare("UPDATE team_group SET team_group.employee_id=? where team_group.id=?");
			$stmt2->execute(array($manger_name_code,$team_id_variable1['team_group_id']));
		    $count2=$stmt2->rowcount();
			$instuite_job=$conn->prepare("SELECT instuite_job.id FROM instuite_job WHERE instuite_job.project_id=?;");
			$instuite_job->execute(array($id));
			$instuite_job_loop=$instuite_job->fetchall();
			$count_instuite_job_loop=$instuite_job->rowcount();
			$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=? where instuite_job.id=? and instuite_job.project_id=?");
			$stmt2->execute(array($instuite1,$instuite_job_loop[0]['id'],$id));
			$count3=$stmt2->rowcount();
			$successmsg[]=lang('تم تحديث بيانات المشروع والجهة الخارجية الأولى');
			if(($count_instuite_job_loop == 2) || ($count_instuite_job_loop == 3) || ($count_instuite_job_loop == 1))
			{
				if(($count_instuite_job_loop == 2))
				{
					$instuite_job2=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job2->execute(array($id,$instuite2));
					$instuite2_job_fetch=$instuite_job2->fetch();
					$instuite2_job_count=$instuite_job2->rowcount();
					$instuite_job3=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job3->execute(array($id,$instuite3));
					$instuite3_job_fetch=$instuite_job3->fetch();
					$instuite3_job_count=$instuite_job3->rowcount();
					if($instuite2_job_count < 1 && empty($instuite3) || ($instuite2_job_count < 1 && (!empty($instuite3))))
					{
						$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=? where instuite_job.id=? and instuite_job.project_id=?");
						$stmt2->execute(array($instuite2,$instuite_job_loop[1]['id'],$id));
						$count4=$stmt2->rowcount();
						if($count4 > 0)
						{					
							$successmsg[]=lang('وبيانات الجهة الخارجية الثانية');
						}
					}
					if(isset($instuite3) && !empty($instuite3) && $instuite3_job_count < 1)
					{
						$stmt=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
						$stmt->execute(array(':zinstuite_id'=>$instuite3,'zproject_id'=>$id));
						$count5=$stmt->rowcount();
						if($count5 > 0)
						{
							$successmsg[]=lang('تم تسجيل بيانات جهة خارجية جديدة ثالثة');
						}
					}	
				}			
				elseif($count_instuite_job_loop == 3 && (!isset($count4) || !isset($count5)))
				{
					$instuite_job2=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job2->execute(array($id,$instuite2));
					$instuite2_job_fetch=$instuite_job2->fetch();
					$instuite2_job_count=$instuite_job2->rowcount();
					$instuite_job3=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job3->execute(array($id,$instuite3));
					$instuite3_job_fetch=$instuite_job3->fetch();
					$instuite3_job_count=$instuite_job3->rowcount();
					if($instuite2_job_count < 1 && $instuite3_job_count < 1)
					{
						$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=?
						where instuite_job.id=? and instuite_job.project_id=?");
						$stmt2->execute(array($instuite2,$instuite_job_loop[1]['id'],$id));
						$count_instuite_2=$stmt2->rowcount();
						$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=? where instuite_job.id=? and instuite_job.project_id=?");
						$stmt2->execute(array($instuite3,$instuite_job_loop[2]['id'],$id));
						$count6=$stmt2->rowcount();
						$successmsg[]=lang('وبيانات الجهة الخارجية الثانية والثالثة');
					}
					if($instuite2_job_count < 1 && !$instuite3_job_count < 1)
					{
						$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=?
						where instuite_job.id=? and instuite_job.project_id=?");
						$stmt2->execute(array($instuite2,$instuite_job_loop[1]['id'],$id));
						$count7=$stmt2->rowcount();
						if($count7 > 0)
						{					
							$successmsg[]=lang('وبيانات الجهة الخارجية الثانية');
						}
					}
					if(!$instuite2_job_count < 1 && $instuite3_job_count < 1)
					{
						$stmt2=$conn->prepare("UPDATE instuite_job SET instuite_job.instuite_id=? where instuite_job.id=? and instuite_job.project_id=?");
						$stmt2->execute(array($instuite3,$instuite_job_loop[2]['id'],$id));
						$count8=$stmt2->rowcount();
						if($count8 > 0)
						{	
							$successmsg[]=lang('وبيانات الجهة الخارجية الثالثة');
						}
					}
				}
				elseif($count_instuite_job_loop == 1)  
				{
					$instuite_job2=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job2->execute(array($id,$instuite2));
					$instuite2_job_fetch=$instuite_job2->fetch();
					$instuite2_job_count=$instuite_job2->rowcount();
					$instuite_job3=$conn->prepare("SELECT * FROM instuite_job WHERE instuite_job.project_id=? and instuite_job.instuite_id=?");
					$instuite_job3->execute(array($id,$instuite3));
					$instuite3_job_fetch=$instuite_job3->fetch();
					$instuite3_job_count=$instuite_job3->rowcount();
					if(($instuite2_job_count < 1 && !empty($instuite2)) && ($instuite3_job_count < 1 && !empty($instuite3)))
					{
						$stmt=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
						$stmt->execute(array(':zinstuite_id'=>$instuite2,'zproject_id'=>$id));
						$count9=$stmt->rowcount();
						if($count9 > 0)
						{						
							$successmsg[]=lang('تم تسجيل بيانات جهة خارجية جديدة ثانية');
						}
						$stmt=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
						$stmt->execute(array(':zinstuite_id'=>$instuite3,'zproject_id'=>$id));
						$count10=$stmt->rowcount();
						if($count10 > 0)
						{
							$successmsg[]=lang('تم تسجيل بيانات جهة خارجية جديدة ثالثة');
						}
					}					
					if(empty($instuite3) && ($instuite2_job_count < 1 && !empty($instuite2)) && (!isset($count9) || !isset($count10)))
					{
						$stmt=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
						$stmt->execute(array(':zinstuite_id'=>$instuite2,'zproject_id'=>$id));
						$count11=$stmt->rowcount();
						if($count11 > 0)
						{
							$successmsg[]=lang('تم تسجيل بيانات جهة خارجية جديدة ثانية');
						}
					}
					if(empty($instuite2) && ($instuite3_job_count < 1 && !empty($instuite3)) && (!isset($count9) || !isset($count10) || !isset($count11)))
					{
						$stmt=$conn->prepare("INSERT INTO instuite_job(instuite_id,project_id) VALUES (:zinstuite_id,:zproject_id);");
						$stmt->execute(array(':zinstuite_id'=>$instuite3,'zproject_id'=>$id));
						$count12=$stmt->rowcount();
						if($count12 > 0)
						{
							$successmsg[]=lang('تم تسجيل بيانات جهة خارجية جديدة ثالثة');
						}
					}
				}
			}
			$stmt=$conn->prepare("UPDATE finished_job SET finished_job.job_finish=?,finished_job.job_finish_date=? where finished_job.project_id=?");
			$stmt->execute(array($finished_job,$finished_job_date,$id));
			$count13=$stmt->rowcount();
			if(isset($required_job))
			{
				$stmt=$conn->prepare("UPDATE required_job SET required_job.required=? where required_job.project_id=?");
				$stmt->execute(array($required_job,$id));
				$count14=$stmt->rowcount();
				if($count14 > 0)
					{
						$successmsg[]=lang('وبيانات المطلوب من الوزارة');
					}
			}
			if(isset($count4) || isset($count5) || (isset($count_instuite_2) && isset($count6)) || isset($count7) || isset($count8) || isset($count9) || isset($count10) || isset($count11) || isset($count12) || isset($count13) || isset($count14))
			{	
				if(count($successmsg) > 2){$second=10;}else{$second=3;}
				foreach($successmsg as $success_msg)
				{
					msg_responde('',$success_msg);
				}			
				$txtsecond=lang('space').lang('ثوانى');
				if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
				redirectmsg($msg,$second,$txtsecond);
			}else
			{
				$second=3;
				msg_responde(lang('لم تقم بتعديل اى شىء'));					
				$txtsecond=lang('space').lang('ثوانى');
				if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
				redirectmsg($msg,$second,$txtsecond);
			}
		}
      }
      else
      {
        header("location: sign_out.php");
        exit();
      }         
     //end update_employee page
    }
    elseif($work=='delete_project')
    {
      //start delete project page 
		if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
          $project_sanitize_id=htmlspecialchars(intval($_GET['id']),ENT_COMPAT);
		  $_SESSION['project_sanitize_id']=$project_sanitize_id;
        }
        else
        {
          header("location: sign_out.php");
          exit(); 
        }	
		$successmsg=array();
        $stmt1=$conn->prepare("SELECT projects.id,projects.project_name,projects.project_description, projects.project_date, projects.number_of_version, employees.name as manger_name,employees.id as employee_id,instuite.instuite_name,finished_job.job_finish as finished_job,finished_job.job_finish_date as finished_job_date FROM projects, employees, team_group,instuite,instuite_job,finished_job WHERE team_group.project_id=projects.id and team_group.employee_id = employees.id AND team_group.job_code = '0' and instuite_job.instuite_id=instuite.id and instuite_job.project_id=projects.id and finished_job.project_id=team_group.project_id and projects.id=?;");
        $stmt1->execute(array($project_sanitize_id));
        $project_information=$stmt1->fetch();		
        $count1=$stmt1->rowcount(); 
		$project_name=$project_information['project_name'];
        $path=$_SERVER['DOCUMENT_ROOT'].'/project mangement/'.$inc.$tmp.$upload;
		$checkpath=$path.$project_name.'/'.$project_name.'.zip';
		if($count1 > 0)
        {
			$team_group=$conn->prepare("SELECT team_group.id from team_group where team_group.project_id=? and team_group.employee_id=?;");
			$team_group->execute(array($project_sanitize_id,$project_information['employee_id']));
			$team_group_id=$team_group->fetch();
			$team_group=$conn->prepare("DELETE FROM team_group WHERE team_group.id=?");
			$team_group->execute(array($team_group_id['id']));		
			$instuite=$conn->prepare("DELETE from instuite_job where instuite_job.project_id=?;");
			$instuite->execute(array($project_sanitize_id));
			$instuite=$conn->prepare("DELETE from finished_job where finished_job.project_id=?;");
			$instuite->execute(array($project_sanitize_id));
			$required=$conn->prepare("SELECT required_job.id FROM required_job where required_job.project_id=?;");
			$required->execute(array($project_sanitize_id));
			$required_fetch=$required->fetch();
			$count_required=$required->rowcount();
			$projects_files_id=$conn->prepare("SELECT projects_files.id FROM projects_files WHERE projects_files.project_id=?");
			$projects_files_id->execute(array($project_sanitize_id));
			$projects_files_id_fetch=$projects_files_id->fetch();
			$projects_files_id_count=$projects_files_id->rowcount();
			if($count_required > 0)
			{
				$instuite=$conn->prepare("DELETE from required_job where required_job.id=?");
				$instuite->execute(array($required_fetch['id']));
				$successmsg[]=lang('تم مسح بيانات المطلوب من الوزارة بنجاح');
			}
			if($projects_files_id_count > 0)
			{
			$instuite=$conn->prepare("DELETE from projects_files where projects_files.project_id=?");
			$instuite->execute(array($project_sanitize_id));
			$successmsg[]=lang('تم مسح ملفات المشروع بنجاح');
			$files=scandir($path.$project_name.'/');
			unset($files[0],$files[1]);
			foreach($files as $file)
			{
				unlink($path.$project_name.'/'.$file);
			}
			rmdir($path.$project_name.'/');
			}
			$instuite=$conn->prepare("DELETE from projects where projects.id=?");
			$instuite->execute(array($project_sanitize_id));
			$successmsg[]=lang('تم مسح بيانات المشروع بنجاح');
			$second=3;
			foreach($successmsg as $success_msg)
			{
				msg_responde('',$success_msg);
			}			
			$txtsecond=lang('space').lang('ثوانى');
			if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
			redirectmsg($msg,$second,$txtsecond);
		}
		else
		{
			header("location: sign_out.php");
			exit(); 
		}			
      //end manage member page
    }elseif($work=='print_project')
    {
		//start print project page 
			if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
          $project_sanitize_id=htmlspecialchars(intval($_GET['id']),ENT_COMPAT);
		  $_SESSION['project_sanitize_id']=$project_sanitize_id;
        }
        else
        {
          header("location: sign_out.php");
          exit(); 
        }
        $stmt1=$conn->prepare("SELECT projects.id,projects.project_name,projects.project_description, projects.project_date, projects.number_of_version, employees.name as manger_name,employees.id as employee_id,instuite.instuite_name,finished_job.job_finish as finished_job,finished_job.job_finish_date as finished_job_date FROM projects, employees, team_group,instuite,instuite_job,finished_job WHERE team_group.project_id=projects.id and team_group.employee_id = employees.id AND team_group.job_code = '0' and instuite_job.instuite_id=instuite.id and instuite_job.project_id=projects.id and finished_job.project_id=team_group.project_id and projects.id=?;");
        $stmt1->execute(array($project_sanitize_id));
        $project_information=$stmt1->fetch();		
        $count1=$stmt1->rowcount();         
        if(($count1 > 0)){$_SESSION['id']=$project_sanitize_id;?>
              <div class="edit_employees_container"> 
				<?php $stmt1=$conn->prepare("SELECT required_job.required from required_job,projects where required_job.project_id=projects.id and projects.id=?;");
					  $stmt1->execute(array($project_sanitize_id));
					 $required=$stmt1->fetch();
						  $count_required=$stmt1->rowcount(); ?>
                <form method="POST" id="edit_form" class="edit_form print_project">
                     <div class="inputbox form-group print_project_project_div" id="project_description" >
                       <textarea style="<?php if($_GET['lang'] === 'ar'){echo "direction:rtl;";} ?>resize: none;direction: rtl;resize: none;height: 89vh;width: 90vw;position: relative;" class="form-control print_textarea" disabled><?php echo  lang('project name').' : '.lang('space').$project_information['project_name']."\n".lang('project_description').' : '.$project_information['project_description']."\n";
						$manger_name=$conn->prepare("SELECT employees.name as employees_name FROM employees,users,projects,team_group WHERE employees.id=users.emp_id and team_group.employee_id=employees.id and projects.id=team_group.project_id and team_group.job_code='0' and projects.id=? and users.id=?;");
						  $manger_name->execute(array($_GET['id'],$_GET['user_id']));
						  $manger_name_fetch=$manger_name->fetch();echo lang('manger_name').' : '.$manger_name_fetch['employees_name']."\n";
						  $employee_name=$conn->prepare("SELECT employees.name FROM employees,team_group,projects WHERE employees.id=team_group.employee_id and projects.id=team_group.project_id and team_group.job_code!='0' and projects.id=?");
						  $employee_name->execute(array($_GET['id']));
						  $employee_name_fetch=$employee_name->fetchall();						  
						  echo lang('work_team').' : ';
						  foreach($employee_name_fetch as $employee_name_loop)
						  {
							  echo $employee_name_loop['name']."\n";
						  }
						  echo "\n".lang('instuite intersted in').' : ';
								$stmt2=$conn->prepare("SELECT instuite.instuite_name from instuite,instuite_job where instuite.id=instuite_job.instuite_id and instuite_job.project_id=?;");
								$stmt2->execute(array($_GET['id'])); 
								$instuites=$stmt2->fetchall();
								$count_selected_instuite=$stmt2->rowcount();
								foreach($instuites as $instuites_loop) 
								{
									echo $instuites_loop['instuite_name'] ."\n";
								}
								 $stmt1=$conn->prepare("SELECT required_job.required from required_job,projects where required_job.project_id=projects.id and projects.id=?;");
								 $stmt1->execute(array($_GET['id']));
								 $required=$stmt1->fetch();
								 $count_required=$stmt1->rowcount();
								 echo lang('finished_job').' : '.$project_information['finished_job']."\n";if($count_required > 0){echo lang('required_job').' : '.$required['required'];}echo "\n".lang('project_date'). " : ";
								 echo arabic_date($project_information['project_date']). " ".lang('number_of_version').' : '.lang($project_information['number_of_version']);?>
					 </textarea>
					 </div>
					 <div class="inputbox form-group print_project_project_submit" id="project_description" >
                       <input type="submit" id="print_submit" class="btn btn-info btn-lg print_submit" value="<?php echo lang('print');?>">
                </form>                  
			</div><?php      
        } 
        else
        {
          header("location: sign_out.php");
          exit(); 
        }
		//end print project page
	}	
	elseif($work=='Manage_users')
    {
		//start mannage member page ?>
        <div class="details" id="details" <?php if(isset($_GET['lang'])){if($_GET['lang']=='ar'){echo 'style="direction:rtl"';}elseif(($_GET['lang']=='en')){echo 'style="direction:ltr"';}} ?>>
          <div class="emplyees_mangement">
            <div class="card_header">
              <h1><?php echo lang('All').lang('space').lang('the').lang('Users');?></h1>				
            </div>
            <div class="table-responsive fixed_table_responsive_user">
              <table class="table">
                <thead>
                  <tr>
				  <th scope="col"><?php echo lang('employee name');?></th>
                    <th scope="col"><?php echo lang('usernme');?></th>
                     <th scope="col"><?php echo lang('email'); ?></th>
                    <th scope="col"><?php echo lang('Registered Date'); ?></th>
                    <th scope="col"><?php echo lang('project name'); ?></th>                  
                    <th scope="col"><?php echo lang('control'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
					$super_admin=$conn->prepare("SELECT users.id FROM users WHERE users.GROUP_ID=2 and users.id=?;");
					$super_admin->execute(array($_SESSION['user_id']));
					$super_admin_fetch=$super_admin->fetch();
					$super_admin_fetch_count=$super_admin->rowcount();
					$manger_projects_user=$conn->prepare("SELECT projects.id as project_id FROM projects,team_group,employees,users WHERE team_group.project_id=projects.id and team_group.employee_id=employees.id AND users.emp_id=employees.id and team_group.job_code='0' and users.id=?");
					$manger_projects_user->execute(array($_SESSION['user_id']));
					$manger_projects_user_fetch=$manger_projects_user->fetchAll();
					$manger_projects_user_count=$manger_projects_user->rowcount();
					$user=$conn->prepare("SELECT users.id as id,projects.id as project_id,employees.name as employees_name,users.username as username,users.email as user_email,users.date as user_date,projects.project_name as project_name from users,team_group,projects,employees where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and users.id=?;");
					$user->execute(array($_SESSION['user_id']));
					$user_fetch=$user->fetchall();
					$user_fetch_count=$user->rowcount();
					if($manger_projects_user_count > 0 && !$super_admin_fetch_count > 0)
					{
						foreach($manger_projects_user_fetch as $manger_projects_user_fetch_loop)
						{					
							$user_work_in_same_project=$conn->prepare("SELECT users.id,projects.id as project_id,employees.name as employees_name,users.username as username,users.email as user_email,users.date as user_date,projects.project_name as project_name,users.id from users,team_group,projects,employees where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and projects.id=?;");
							$user_work_in_same_project->execute(array($manger_projects_user_fetch_loop['project_id']));
							$user_work_in_same_project_fetch=$user_work_in_same_project->fetchAll();
							$count_user_work_in_same_project=$user_work_in_same_project->rowcount();
							foreach($user_work_in_same_project_fetch as $user_work_in_same_project_loop)
							{
								echo '<tr><th scope="row"><span class="status delivred">'.$user_work_in_same_project_loop['employees_name'].
								'</span></th><th scope="row"><span class="status delivred">'.$user_work_in_same_project_loop['username'].
								'</span></th><th scope="row"><span class="status delivred">'.$user_work_in_same_project_loop['user_email'].
								'</span></th><th scope="row"><span class="status delivred">';
								$time=$user_work_in_same_project_loop['user_date'];                    
								if($_GET['lang']=='ar')
								{
									echo arabic_date($time);
								}elseif($_GET['lang']=='en')
								{
									echo date('l - j / n / Y',strtotime($time));
								}
								echo '</span></th><th scope="row"><span class="status delivred">'.$user_work_in_same_project_loop['project_name'].
								'</span></th><th scope="row"><span class="status delivred">';                   
								echo '<ul class="ul_btns">
								<li><a href="'.$_SERVER['PHP_SELF'].'?work=edit_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'en';} echo '&id='.$user_work_in_same_project_loop['id'].'&project_id='.$user_work_in_same_project_loop['project_id']; echo '" class="btn btn-success">';echo lang('edit').'</a></li>';
								if($user_work_in_same_project_loop['id']!=$_SESSION['user_id'])
								{echo '<li><a href="'.$_SERVER['PHP_SELF'].'?work=delete_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'en';} echo '&id='.$user_work_in_same_project_loop['id'].'&project_id='.$user_work_in_same_project_loop['project_id']; echo '" class="btn btn-danger delete_user'.'">';echo lang('delete').'</a></li>';}
							}
							echo '</ul></th></tr></tbody>';
					    }
					}					
					elseif($super_admin_fetch_count > 0)
					{
						$user_information=$conn->prepare("select users.id,projects.id as project_id,employees.name as employees_name,users.username as username,users.email as user_email,users.date as user_date,projects.project_name as project_name,users.id from users,team_group,projects,employees where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id;");
						$user_information->execute(array());
						$user_information_fetched=$user_information->fetchAll();
						$count_user_information=$user_information->rowcount();
						foreach($user_information_fetched as $user_information_loop)
						{
						echo '<tr><th scope="row"><span class="status delivred">'.$user_information_loop['employees_name'].
							'</span></th><th scope="row"><span class="status delivred">'.$user_information_loop['username'].
							'</span></th><th scope="row"><span class="status delivred">'.$user_information_loop['user_email'].
							'</span></th><th scope="row"><span class="status delivred">';
							$time=$user_information_loop['user_date'];                    
							if($_GET['lang']=='ar')
							{
								echo arabic_date($time);
							}elseif($_GET['lang']=='en')
							{
								echo date('l - j / n / Y',strtotime($time));
							}
							echo '</span></th><th scope="row"><span class="status delivred">'.$user_information_loop['project_name'].
							'</span></th><th scope="row"><span class="status delivred">';                   
							echo '<ul class="ul_btns">
							<li><a href="'.$_SERVER['PHP_SELF'].'?work=edit_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'en';} echo '&id='.$user_information_loop['id'].'&project_id='.$user_information_loop['project_id']; echo '" class="btn btn-success">';echo lang('edit').'</a></li>
							<li><a href="'.$_SERVER['PHP_SELF'].'?work=delete_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'en';} echo '&id='.$user_information_loop['id'].'&project_id='.$user_information_loop['project_id']; echo '" class="btn btn-danger delete_user">';echo lang('delete').'</a></li>';
						}
						echo '</ul></th></tr>';
					}
					elseif($user_fetch_count > 0)
					{
						foreach($user_fetch as $user_loop)
						{
						echo '<tr><th scope="row"><span class="status delivred">'.$user_loop['employees_name'].
							'</span></th><th scope="row"><span class="status delivred">'.$user_loop['username'].
							'</span></th><th scope="row"><span class="status delivred">'.$user_loop['user_email'].
							'</span></th><th scope="row"><span class="status delivred">';
							$time=$user_loop['user_date'];                    
							if($_GET['lang']=='ar')
							{
								echo arabic_date($time);
							}elseif($_GET['lang']=='en')
							{
								echo date('l - j / n / Y',strtotime($time));
							}
							echo '</span></th><th scope="row"><span class="status delivred">'.$user_loop['project_name'].
							'</span></th><th scope="row"><span class="status delivred">';                   
							echo '<ul class="ul_btns">
							<li><a href="'.$_SERVER['PHP_SELF'].'?work=edit_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'en';} echo '&id='.$user_loop['id'].'&project_id='.$user_loop['project_id']; echo '" class="btn btn-success">';echo lang('edit').'</a></li></ul></th></tr>';}}?>
				</tbody>
              </table>
            </div>          
          </div>
        </div><?php 
		$user_information=$conn->prepare("SELECT users.id from users,team_group,employees where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.job_code='0' and users.id=?;");
		$user_information->execute(array($_SESSION['user_id']));
		$user_information_fetched=$user_information->fetchAll();
		$user_information_count=$user_information->rowcount();
		if($user_information_count > 0 || $super_admin_fetch_count > 0){?>				
		<a style="position: relative;left: 3vw;font-size: large;" href="<?php echo $_SERVER['PHP_SELF'].'?work=add_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>" class="btn btn-info"><?php echo lang('Add'); ?></a></li><?php }
      //end manage member page
    }
	elseif($work =='add_user')
	{
		//start add_user page ?>
			<div class="edit_employees_container user_container_finished">                      
                <h2><?php if($_GET['lang']=='ar'){echo lang('Add').lang('space').lang('data');}else{echo lang('Add').lang('space').lang('data');} ?></h2>
				<form method="POST" id="add_user" class="" action="<?php echo '?work=insert_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>">
                    <div class="container-fluid">
						<div class="row">
							<div class="form-group col-4">
							  <input required type="text" id="employee_name" pattern=".{3,50}" title="<?php echo lang('employee name must be between 3 to 50 character'); ?>" autocomplete="off" value="" placeholder="<?php echo lang('Employee name'); ?>" name="employee_name" class="form-control">
							</div>                     
							<div class="form-group col-4">
							  <input id="username" pattern=".{3,25}" required type="text" title="<?php echo lang('username must be beween 3 to 25'); ?>" autocomplete="off" value="" placeholder="<?php echo lang('usernme'); ?>" name="username" class="form-control">
							</div>
							<div class="form-group col-4">
								<select class="form-control" id="project_name_select" name="project_code">
									<option value=''><?php echo lang('project name');?></option>
									<?php 
									$projects_query=$conn->prepare("SELECT projects.id as project_id,projects.project_name FROM projects,team_group,employees,users WHERE team_group.project_id=projects.id and team_group.employee_id=employees.id AND users.emp_id=employees.id and team_group.job_code='0' and users.id=?");
									$projects_query->execute(array($_SESSION['user_id']));
									$projects_query_fetched=$projects_query->fetchAll();
									$projects_querycount=$projects_query->rowcount();
									$super_admin=$conn->prepare("SELECT users.id FROM users WHERE users.GROUP_ID=2 and users.id=?;");
									$super_admin->execute(array($_SESSION['user_id']));
									$super_admin_fetch=$super_admin->fetch();
									$super_admin_fetch_count=$super_admin->rowcount();
									if($projects_querycount > 0)
									{
									foreach($projects_query_fetched as $projects_query_loop){?> 
									<option value="<?php echo $projects_query_loop['project_id']; ?>"><?php echo $projects_query_loop['project_name']; ?></option>
									<?php }}
									elseif($super_admin_fetch_count > 0)
									{
										$projects=$conn->prepare("SELECT projects.id as project_id,projects.project_name FROM projects");
										$projects->execute(array());
										$projects_fetched=$projects->fetchAll();
										$projects_query_count=$projects->rowcount();
										foreach($projects_fetched as $projects_loop)
										{?>
											<option value="<?php echo $projects_loop['project_id']; ?>"><?php echo $projects_loop['project_name']; ?></option><?php
										}
									}?>						
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-4">
								<input id="email" type="email" required title="<?php echo lang('email can\'t be empty'); ?>" autocomplete="off" value="" placeholder="<?php echo lang('email'); ?>" name="user_email" class="form-control">
							</div>
							<div class="form-group col-4">
								<select class="form-control" id="user_authority_select" name="authority_code" required title="<?php echo lang('authority can\'t be not selected');?>">
									<option value=''><?php echo lang('user_authority');?></option><?php
									if($super_admin_fetch_count > 0){?><option value="0"><?php echo lang('manger'); ?></option><?php }?>
									<option value="1"><?php echo lang('employee'); ?></option><?php
									if($super_admin_fetch_count > 0){?><option value="2"><?php echo lang('admin'); ?></option><?php }?>
								</select>						    
							</div>
							<div class="form-group col-4">
								<input required id="password" pattern=".{3,25}" style="<?php echo 'padding-right: 48px;padding-left: 14px;';?>" type="password" title="<?php echo lang('pass'); ?>" autocomplete="off" placeholder="<?php echo lang('pass'); ?>" name="password" class="form-control">
								<i id="show-hide" class="font_icon_add_edit_user fa fa-lock fa-2x"></i>
							</div>
						</div>
						<div class="row form-group offset-5" id="submit">
							<input type="submit" class="btn btn-success btn-lg" value="<?php echo lang('Add');?>">
						</div>
					</div>
                </form>                  
			</div><?php
		//END add_user page
	}elseif($work =='insert_user')
	{
		//start insert_user page
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{				
				?><h1 style="text-align:center;"><?php echo lang('Add').lang('space').lang('data'); ?></h1><?php
				$formerror=array();
				$array_puch=array();
				$msgwarning=array();
				$successmsg=array();				
				$employee_name=filter_var($_POST['employee_name'],FILTER_SANITIZE_STRING);
				$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
				$project_code=filter_var($_POST['project_code'],FILTER_SANITIZE_STRING);
				$user_email=filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
				$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
				$authority_code=$_POST['authority_code'];
				if(!empty($password))
				{
					$options = ['cost' => 12,];
					$password_hashed=password_hash($password,PASSWORD_BCRYPT,$options);
					$query_password=",password";
					$zquery_password=",:zpassword";
				}else
				{
					$query_password='';					
				}
				if(empty($employee_name) || strlen($employee_name) < 3 || strlen($employee_name) > 50)
				{
					if(empty($employee_name))
					{
						$formerror[]=lang('employee name can\'t be empty');
					}elseif(strlen($employee_name) < 3)			
					{
						$formerror[]=lang('employee name smaller than 3 charcter');
					}elseif(strlen($employee_name) > 50)
					{
						$formerror[]=lang('employee name larger than 50 charcter');
					}
				}
				if(empty($username) || strlen($username) < 3 || strlen($username) > 25)
				{
					if(empty($username))
					{
						$formerror[]=lang('username can\'t be empty');
					}elseif(strlen($username) < 3)			
					{
						$formerror[]=lang('username smaller than 3 charcter');
					}elseif(strlen($username) > 25)
					{
						$formerror[]=lang('username larger than 25 charcter');
					}
				}				
				if($authority_code == '')
				{
					$formerror[]=lang('authority can\'t be not selected');
				}
				if($user_email == '')
				{
					$formerror[]=lang('email can\'t be empty');
				}
				if(empty($password) || strlen($password) < 3 || strlen($password) > 25)
				{
					if(empty($password))
					{
						$formerror[]=lang('password can\'t be empty');
					}elseif(strlen($password) < 3)			
					{
						$formerror[]=lang('password smaller than 3 charcter');
					}elseif(strlen($password) > 25)
					{
						$formerror[]=lang('password larger than 25 charcter');
					}
				}
				if(!empty($formerror))
				{
					foreach($formerror as $error)
					{
						msg_responde($error);
					}
					$second=10;
					$txtsecond=lang('space').lang('ثوانى');
					if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
					redirectmsg($msg,$second,$txtsecond);
				}	
				elseif(empty($formerror))
				{
					$employee_id=$conn->prepare("SELECT employees.id FROM employees where employees.name=?");
					$employee_id->execute(array($employee_name));
					$employee_id_fetch=$employee_id->fetch();
					$count_employee=$employee_id->rowcount();
					if($count_employee < 1)
					{
						$stmt=$conn->prepare("INSERT INTO employees(name) VALUES (:zname);");
						$stmt->execute(array('zname' =>$employee_name));
						$count=$stmt->rowcount();
						$employee_id2=$conn->prepare("SELECT employees.id FROM employees where employees.name=?");
						$employee_id2->execute(array($employee_name));
						$employee_id_fetch2=$employee_id2->fetch();	
						$employee_code=$employee_id_fetch2['id'];
						$successmsg[]=lang('تم اضافة بيانات الموظف بنجاح');						
					}else
					{
						$employee_code=$employee_id_fetch['id'];
						$msgwarning[]=lang('اسم الموظف مسجل فى قاعدة البيانات');
					}
					$user_id=$conn->prepare("SELECT users.id FROM users WHERE users.username=?;");
					$user_id->execute(array($username));
					$user_id_fetch=$user_id->fetch();
					$count_user=$user_id->rowcount();
					if($count_user < 1)
					{	
						$group_id=$conn->prepare("SELECT GROUP_ID FROM users WHERE users.id=?;");
						$group_id->execute(array($_SESSION['user_id']));
						$group_id_fetch=$group_id->fetch();
						if($group_id_fetch['GROUP_ID'] !='2'){$authority_code='1';}
						$stmt=$conn->prepare("insert into users(username,email,date,emp_id,GROUP_ID".$query_password.") values (:zusername,:zemail,now(),:zemp_id,:zGROUP_ID".$zquery_password.")");
						$array_puch=array($username,$user_email,$employee_code,$authority_code,$password_hashed);$stmt->execute(array('zusername'=>$array_puch[0],'zemail'=>$array_puch[1],'zemp_id'=>$array_puch[2],'zGROUP_ID'=>$array_puch[3],'zpassword'=>$array_puch[4]));
						$count=$stmt->rowcount();
						$successmsg[]=lang('تم اضافة بيانات المستخدم بنجاح');
					}elseif($count_user > 0){$msgwarning[]=lang('اسم المستخدم مسجل فى قاعدة البيانات');}
						$team_group_id=$conn->prepare("SELECT team_group.id,projects.project_name from team_group,projects where team_group.project_id=projects.id and team_group.project_id=? and team_group.employee_id=?;");
						$team_group_id->execute(array($project_code,$employee_code));
						$team_group_fetch=$team_group_id->fetch();
						$count_team_group=$team_group_id->rowcount();
					if($count_team_group < 1 && !empty($project_code))
					{
						$users_date=$conn->prepare("SELECT users.date FROM users where users.username=?;");
						$users_date->execute(array($username));
						$users_date_fetch=$users_date->fetch();
						$stmt=$conn->prepare("INSERT INTO team_group(project_id,employee_id,job_code,join_date) VALUES (:zproject_id,:zemployee_id,:zjob_code,:zjoin_date);");
						$stmt->execute(array('zproject_id'=>$project_code,'zemployee_id'=>$employee_code,'zjob_code'=>$authority_code,'zjoin_date'=>$users_date_fetch['date']));
						$count=$stmt->rowcount();
						$team_group_id=$conn->prepare("SELECT team_group.id,projects.project_name from team_group,projects where team_group.project_id=projects.id and team_group.project_id=? and team_group.employee_id=?;");
						$team_group_id->execute(array($project_code,$employee_code));
						$team_group_fetch=$team_group_id->fetch();
						$successmsg[]=lang('تم تسجيل بيانات المستخدم فى مشروع').lang('space').$team_group_fetch['project_name'];						
					}elseif($count_team_group > 0 && !empty($project_code))
					{						
						$msgwarning[]=lang('هذا الموظف يعمل فى هذا المشروع');
					}elseif($count_team_group < 1 && empty($project_code)){$msgwarning[]=lang('لايوجد مشروعات مسجلة لكن تم تسجيل البيانات المدخلة فى قاعدة البيانات');}
					if(!empty($msgwarning))
					{
						foreach($msgwarning as $msg_warning)
						{
						msg_responde('','',$msg_warning);
						}
						$second=10;
						$txtsecond=lang('space').lang('ثوانى');
						if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
						redirectmsg($msg,$second,$txtsecond);
					}elseif(empty($msgwarning))
					{
						$second=3;
						foreach($successmsg as $success_msg)
						{
							msg_responde('',$success_msg);
						}			
						$txtsecond=lang('space').lang('ثوانى');
						if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
						redirectmsg($msg,$second,$txtsecond);
					}
				}
			}
			else
			{
				 header("location: sign_out.php");
				 exit();
		    }  
		//END insert_user page
	}
	elseif($work=='edit_user')
	{
		//start edit_user page  
			if(isset($_GET['id']) && is_numeric($_GET['id']))
			{
			  $user_sanitize_id=htmlspecialchars(intval($_GET['id']),ENT_COMPAT);
			  $_SESSION['user_sanitize_id']=$user_sanitize_id;
			}
			else
			{
			  header("location: sign_out.php");
			  exit(); 
			}
			$stmt1=$conn->prepare("SELECT users.id,users.username as username,employees.name as employee_name,users.email as user_email,projects.project_name FROM users,employees,projects,team_group where users.emp_id=employees.id and team_group.project_id=projects.id and users.id=?;");
			$stmt1->execute(array($user_sanitize_id));
			$user_information=$stmt1->fetch();		
			$count1=$stmt1->rowcount();         
			if(($count1 > 0))
			{?>
				  <div class="edit_employees_container user_container_finished">                       
					<h2><?php if($_GET['lang']=='ar'){echo $user_information['username'].lang('space').lang('edit').lang('space').lang('data');}else{echo lang('edit').lang('space').lang('data').lang('space').$user_information['username'];} ?></h2>
					<form method="POST" id="add_user" action="<?php echo '?work=update_user&lang=';if(isset($_GET['lang'])){echo $_GET['lang'];}else{echo 'ar';} ?>">
						 <div class="container-fluid">
							<div class="row">
								<div class="form-group col-3">
									<input id="employee_name" type="text" title="<?php echo lang('employee name must be between 3 to 50 character'); ?>" autocomplete="off" value="<?php echo $user_information['employee_name']; ?>" placeholder="<?php echo lang('Employee name'); ?>" name="employee_name" class="form-control" pattern=".{3,50}" required>
								</div>
								<div class="form-group col-3">
									<input id="username" type="text" pattern=".{3,25}" required title="<?php echo lang('username must be beween 3 to 25'); ?>" autocomplete="off" value="<?php echo $user_information['username']; ?>" placeholder="<?php echo lang('usernme'); ?>" name="username" class="form-control">
						    	</div>
								<div id="project_name" class="form-group col-6">
									<select required class="form-control" id="project_name_select" name="project_code" title="<?php echo lang('project name can\'t be not selected');?>">
										<option value=''><?php echo lang('project name');?></option>
										<?php
										$projects_query=$conn->prepare("SELECT projects.id as project_id,projects.project_name FROM projects,team_group,employees,users WHERE team_group.project_id=projects.id and team_group.employee_id=employees.id AND users.emp_id=employees.id and team_group.job_code='0' and users.id=?");
										$projects_query->execute(array($_SESSION['user_id']));
										$projects_query_fetched=$projects_query->fetchAll();
										$projects_querycount=$projects_query->rowcount();
										$super_admin=$conn->prepare("SELECT users.id FROM users WHERE users.GROUP_ID=2 and users.id=?;");
										$super_admin->execute(array($_SESSION['user_id']));
										$super_admin_fetch=$super_admin->fetch();
										$super_admin_fetch_count=$super_admin->rowcount();
										$standard_user=$conn->prepare("SELECT projects.id as project_id,projects.project_name as project_name from users,team_group,projects,employees where users.emp_id=employees.id and team_group.employee_id=employees.id and team_group.project_id=projects.id and users.id=? and project_id=?;");
										$standard_user->execute(array($_SESSION['user_id'],$_GET['project_id']));
										$standard_user_fetch=$standard_user->fetch();
										$standard_user_count=$standard_user->rowcount();
										if($projects_querycount > 0)
										{
										foreach($projects_query_fetched as $projects_query_loop){?> 
										<option value="<?php echo $projects_query_loop['project_id']; ?>"><?php echo $projects_query_loop['project_name']; ?></option>
										<?php }}
										elseif($super_admin_fetch_count > 0)
										{
											$projects=$conn->prepare("SELECT projects.id as project_id,projects.project_name FROM projects");
											$projects->execute(array());
											$projects_fetched=$projects->fetchAll();
											$projects_query_count=$projects->rowcount();
											foreach($projects_fetched as $projects_loop)
											{?>
												<option value="<?php echo $projects_loop['project_id']; ?>"><?php echo $projects_loop['project_name']; ?></option>
											<?php
											}
										}elseif($standard_user_count > 0)
										{?>
											<option value="<?php echo $standard_user_fetch['project_id']; ?>"><?php echo $standard_user_fetch['project_name']; ?></option><?php
										}?>						
									</select>
						   		</div>
							</div>
							<div class="row">
								 <div class="form-group col-4">
									<input id="email" type="email" required title="<?php echo lang('email'); ?>" autocomplete="off" value="<?php echo $user_information['user_email']; ?>" placeholder="<?php echo lang('email'); ?>" name="user_email" class="form-control">
								 </div>
								 <div id="user_authority" class="form-group col-4">
									<select class="form-control" id="user_authority_select" name="authority_code" required title="<?php echo lang('authority can\'t be not selected');?>">
										<option value=''><?php echo lang('user_authority');?></option>
										<?php if($super_admin_fetch_count > 0){?><option value="0"><?php echo lang('manger'); ?></option><?php } ?>
										<option value="1"><?php echo lang('employee'); ?></option>
									</select>
								 </div>
								 <div class="form-group col-4">
									<input required id="password" type="password" style="<?php echo 'padding-right: 48px;padding-left: 14px;';?>" title="<?php echo lang('pass'); ?>" autocomplete="off" placeholder="<?php echo lang('pass'); ?>" name="password" class="asterix form-control">
									<i id="show-hide" class="font_icon_add_edit_user fa fa-lock fa-2x"></i>
								 </div>
							</div>
							<div class="row form-group offset-5" id="submit">
								<input type="submit" class="btn btn-success btn-lg" value="<?php echo lang('edit');?>">
							</div>
						</div>
					</form>                  
				</div><?php      
			} 
			else
			{
			  header("location: sign_out.php");
			  exit(); 
			}     
      //end edit_user page
	}elseif($work =='update_user')
	{
		//start update_user page
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$stmt1=$conn->prepare("SELECT users.username from users where users.id=?");
				$stmt1->execute(array($_SESSION['user_sanitize_id']));
				$user_information=$stmt1->fetch();
				?><h1 style="text-align:center;"><?php echo lang('update').lang('space').lang('data').lang('space').$user_information['username']; ?></h1><?php
				$formerror=array();
				$array_puch=array();	
				$employee_name=filter_var($_POST['employee_name'],FILTER_SANITIZE_STRING);
				$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
				$project_code=filter_var($_POST['project_code'],FILTER_SANITIZE_STRING);
				$user_email=filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
				$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
				$authority_code=$_POST['authority_code'];
				if(!empty($password))
				{
					$options = ['cost' => 12,];
					$password_hashed=password_hash($password,PASSWORD_BCRYPT,$options);
					$query_password=",password=?";
				}else
				{
					$query_password='';					
				}
				if(empty($employee_name) || strlen($employee_name) < 3 || strlen($employee_name) > 50)
				{
					if(empty($employee_name))
					{
						$formerror[]=lang('employee name can\'t be empty');
					}elseif(strlen($employee_name) < 3)			
					{
						$formerror[]=lang('employee name smaller than 3 charcter');
					}elseif(strlen($employee_name) > 50)
					{
						$formerror[]=lang('employee name larger than 50 charcter');
					}
				}
				if(empty($username) || strlen($username) < 3 || strlen($username) > 25)
				{
					if(empty($username))
					{
						$formerror[]=lang('username can\'t be empty');
					}elseif(strlen($username) < 3)			
					{
						$formerror[]=lang('username smaller than 3 charcter');
					}elseif(strlen($username) > 25)
					{
						$formerror[]=lang('username larger than 25 charcter');
					}
				}
				if(empty($project_code))
				{
					$formerror[]=lang('project name can\'t be not selected');
				}
				if($authority_code == '')
				{
					$formerror[]=lang('authority can\'t be not selected');
				}
				if(!empty($formerror))
				{
					foreach($formerror as $error)
					{
						msg_responde($error);
					}
					$second=5;
					$txtsecond=lang('space').lang('ثوانى');
					if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
					redirectmsg($msg,$second,$txtsecond);
				}
				elseif(empty($formerror))
				{
					$successmsg=array();
					$stmt=$conn->prepare("UPDATE employees,users set employees.name=? WHERE users.emp_id=employees.id and users.id=?");
					$stmt->execute(array($employee_name,$_SESSION['user_sanitize_id']));
					$count=$stmt->rowcount();
					$successmsg[]=lang('تم تعديل بيانات الموظف بنجاح');
					$employee_id=$conn->prepare("SELECT employees.id FROM employees where employees.name=?");
					$employee_id->execute(array($employee_name));
					$employee_id_fetch=$employee_id->fetch();
					$stmt=$conn->prepare("update users SET users.username=?,users.email=?,users.emp_id=?".$query_password." where id=?");
					if(!empty($password)){$array_puch=array($username,$user_email,$employee_id_fetch['id'],$password_hashed,$_SESSION['user_sanitize_id']);$stmt->execute(array($array_puch[0],$array_puch[1],$array_puch[2],$array_puch[3],$array_puch[4]));}elseif(empty($password)){$array_puch=array($username,$user_email,$employee_id_fetch['id'],$_SESSION['user_sanitize_id']);$stmt->execute(array($array_puch[0],$array_puch[1],$array_puch[2],$array_puch[3]));}
					$count2=$stmt->rowcount();
					$successmsg[]=lang('تم تعديل بيانات المستخدم بنجاح');
					$team_group_id=$conn->prepare("SELECT team_group.id,projects.project_name FROM projects,team_group WHERE team_group.project_id=? and team_group.employee_id=?;");
					$team_group_id->execute(array($project_code,$employee_id_fetch['id']));
					$team_group_id_fetch=$team_group_id->fetch();
					$stmt=$conn->prepare("update team_group SET team_group.project_id=?,team_group.employee_id=?,team_group.job_code=? where team_group.id=?;");
					$stmt->execute(array($project_code,$employee_id_fetch['id'],$authority_code,$team_group_id_fetch['id']));
					$count3=$stmt->rowcount();
					$successmsg[]=lang('تم تسجيل بيانات المستخدم فى مشروع').lang('space').$team_group_id_fetch['project_name'];
					$second=5;
					foreach($successmsg as $success_msg)
					{
						msg_responde('',$success_msg);
					}			
					$txtsecond=lang('space').lang('ثوانى');
					if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
					redirectmsg($msg,$second,$txtsecond);
				}
			}
			else
			{ 
				 header("location: sign_out.php");
				 exit();
		    }  
		//end update_user page
	}elseif($work =='delete_user')
	{
		//start insert_user page
			if(isset($_GET['id']) && is_numeric($_GET['id']))
			{
			  $user_sanitize_id=htmlspecialchars(intval($_GET['id']),ENT_COMPAT);
			  $_SESSION['user_sanitize_id']=$user_sanitize_id;
			}
			else
			{
			  header("location: sign_out.php");
			  exit(); 
			}
			$successmsg=array();
			$employee_id=$conn->prepare("SELECT employees.id FROM employees,users WHERE employees.id=users.emp_id and users.id=?;");
			$employee_id->execute(array($_SESSION['user_sanitize_id']));
			$employee_id_fetch=$employee_id->fetch();
			$count_employee=$employee_id->rowcount();
			if($count_employee > 0)
			{
				$employee_id=$conn->prepare("DELETE FROM team_group WHERE team_group.employee_id =? and team_group.project_id =?;");
				$employee_id->execute(array($employee_id_fetch['id'],$_GET['project_id']));
				$successmsg[]=lang('تم مسح بيانات المستخدم من المشروع بنجاح');
			}
			$second=5;
			foreach($successmsg as $success_msg)
			{
				msg_responde('',$success_msg);
			}			
			$txtsecond=lang('space').lang('ثوانى');
			if($_GET['lang']=='ar'){$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').numbers($second).$txtsecond;}else{$msg=lang('سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال').$second.$txtsecond;}
			redirectmsg($msg,$second,$txtsecond);
		//END insert_user page
	}else
	{
			//dashboard page i will make charts here
	}
    if(!require_once($inc.$tmp.'footer'.$dotext.$ink)){require_once($inc.$tmp.'footer'.$dotext.$ink);}if(isset($SANITIZE_GET_LANG)){$_SESSION['lang']=$SANITIZE_GET_LANG;}
  }
else
{
  header("location: index.php");
  exit();}?>