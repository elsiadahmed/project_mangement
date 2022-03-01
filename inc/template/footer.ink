		<script>
			<?php              
				if($page=='index')
                {
					echo "
							//start login page
								//start variables
									let username=document.getElementById('username')
									password=document.getElementById('password')
									show_hide=document.getElementById('show-hide')
									langbtn=document.getElementById('langbtn') 
									login_form==document.getElementById('login_form');								
								//end variables
								//start index action
										//start username action
											username.onmouseover=function(){username.placeholder='';}
											username.onmouseleave=function(){username.placeholder='".lang("usernme")."';}
											username.onfocus=function(){username.placeholder='';}
											username.onblur=function(){username.placeholder='".lang("usernme")."';}                                
										//end username action 
										//start password action        
											password.onmouseover=function(){password.placeholder='';}
											password.onmouseleave=function(){password.placeholder='".lang("pass")."';}
											password.onfocus=function(){password.placeholder='';}
											password.onblur=function(){password.placeholder='".lang("pass")."';}
											show_hide.onmousemove=function()
											{password.type='text';show_hide.classList.remove('fa-lock');
											show_hide.classList.add('fa-unlock');password.style='padding-";global $padding_way;echo $padding_way.":45px'}                        
											show_hide.onmouseleave=function()
											{password.type='password';show_hide.classList.remove('fa-unlock');
											show_hide.classList.add('fa-lock');}
										//end password action
										//start langbutton action
											langbtn.onclick=function(){langbtn.value='ar';}
										//end langbutton action	
                            //end languagebutton
							login_form.onsubmit=function(e)
							{
								if(username.value=='' || username.value.lenght < 3 || username.value.lenght > 25 || password.value=='' || password.value.lenght < 3 || password.value.lenght > 25)
								{
									
									e.preventDefault();									
									console.log('ياررب');
								}
							}							
                        //end login page
                       ";if((isset($_GET['lang']) && $_GET['lang']=='ar') || !isset($_GET['lang']))
						 {?>
							for(let i=0;i<document.getElementsByTagName('input').length;i++)
							{                                             
								let myspan=document.createElement('span');
								myspan.className='astrix_right';
								let myspan_text=document.createTextNode('*');
								myspan.appendChild(myspan_text);
								if(document.getElementsByTagName('input')[i].required==true)
								{
									document.getElementsByTagName('input')[i].parentElement.appendChild(myspan);
								}  
							}<?php
						}elseif(isset($_GET['lang']) && $_GET['lang']=='en')
						{?>
								for(let i=0;i<document.getElementsByTagName('input').length;i++)
								{                                             
									let myspan=document.createElement('span');
									myspan.className='astrix_left';
									let myspan_text=document.createTextNode('*');
									myspan.appendChild(myspan_text);
									if(document.getElementsByTagName('input')[i].required==true)
									{
										document.getElementsByTagName('input')[i].parentElement.appendChild(myspan);
									}  
								}
					  <?php }
                 }
                 elseif($page=='Dashboard')
                 {?>
                    //start dashboard page
                        //start variables 
                            var togle_sidebar=document.querySelector('.toggle')
                            sidebar=document.querySelector('.sidebar')
                            main=document.querySelector('.main')
                            span_toggle=document.querySelector('.span_toggle')
                            search=document.querySelector('.search')
							search=document.querySelector('.search')
							topbar=document.querySelector('.topbar');
							var
                            cardBox=document.getElementById('cardBox');
							var
                            i_icon_card=document.getElementById('i_icon_card_1')
                            i_icon_card=document.getElementById('i_icon_card_2')
                            i_icon_card=document.getElementById('i_icon_card_3')
                            egypt_logo_container=document.getElementById('egypt_logo_container')
                            user=document.getElementById('user')
                            flag_title_span_1=document.getElementById('flag_title_span_1')
                            flag_title_span_2=document.getElementById('flag_title_span_2')
                            cardName_1=document.getElementById('cardName_1')
                            cardName_2=document.getElementById('cardName_2')
                            cardName_3=document.getElementById('cardName_3')
                            cardnumbers_1=document.getElementById('cardnumbers_1')
                            cardnumbers_2=document.getElementById('cardnumbers_2')
                            cardnumbers_3=document.getElementById('cardnumbers_3')
                            li_1_convert_right_way_link_to_arabic=document.getElementById('li_1_convert_right_way_link_to_arabic')
                            li_2_convert_right_way_link_to_arabic=document.getElementById('li_2_convert_right_way_link_to_arabic') 
                            li_3_convert_right_way_link_to_arabic=document.getElementById('li_3_convert_right_way_link_to_arabic') 
                            li_4_convert_right_way_link_to_arabic=document.getElementById('li_4_convert_right_way_link_to_arabic')
                            li_5_convert_right_way_link_to_arabic=document.getElementById('li_5_convert_right_way_link_to_arabic') 
                            li_6_convert_right_way_link_to_arabic=document.getElementById('li_6_convert_right_way_link_to_arabic') 
                            li_7_convert_right_way_link_to_arabic=document.getElementById('li_7_convert_right_way_link_to_arabic')
                            li_8_convert_right_way_link_to_arabic=document.getElementById('li_8_convert_right_way_link_to_arabic') 
                            li_9_convert_right_way_link_to_arabic=document.getElementById('li_9_convert_right_way_link_to_arabic') 
                            li_10_convert_right_way_link_to_arabic=document.getElementById('li_10_convert_right_way_link_to_arabic') 
                            li_11_convert_right_way_link_to_arabic=document.getElementById('li_11_convert_right_way_link_to_arabic')
                            details=document.getElementById('details')
                            alert_danger=document.getElementById('alert_danger')
                            alert_warning=document.getElementById('alert_warning')
                            alert_info=document.getElementById('alert_info')
							<?php if($work=='add_project' || $work=='edit_project')
							{?>
							add_project_form=document.getElementById('add_project_form')
							edit_form=document.getElementById('edit_form')													
							project_date=document.getElementById('project_date')
							number_of_version=document.getElementById('number_of_version')							
							project_name=document.getElementById('project_name')							
							project_description=document.getElementById('project_description')
							finished_job=document.getElementById('finished_job')							
							instuite1=document.getElementById('instuite1')
							instuite2=document.getElementById('instuite2')
							instuite3=document.getElementById('instuite3')
							finished_job_date=document.getElementById('finished_job_date')
							required_job=document.getElementById('required_job')<?php }
							if($work =='add_user' || $work=='edit_user'){ ?>
							password=document.getElementById('password')
							show_hide=document.getElementById('show-hide')
							employee_name=document.getElementById('employee_name')
							username=document.getElementById('username')
							email=document.getElementById('email');<?php }?>							
						  var confirm_delete=document.querySelector('.confirm')
							delete_user=document.querySelector('.delete_user')
							print_submit=document.getElementById('print_submit')
							user_authority_select=document.getElementById('user_authority_select')
							add_user=document.getElementById('add_user');
						  //end variables
						  //start dashboard actions
                            //start sidebar toggle button							
                                togle_sidebar.onclick=function()
                                {
								topbar.classList.toggle('active');
                                 sidebar.classList.toggle('active');
                                 main.classList.toggle('active');span_toggle.classList.toggle('active');
                                 //search.classList.toggle('active');
                                 /*cardBox.classList.toggle('active');
								 user.classList.toggle('active');//i_icon_card_1.classList.toggle('active');
                                 cardBox.classList.toggle('active');
                                 i_icon_card_2.classList.toggle('active');i_icon_card_3.classList.toggle('active');*/
                                 egypt_logo_container.classList.toggle('active');
                                 flag_title.classList.toggle('active');flag_title_span_1.classList.toggle('active');
                                 flag_title_span_2.classList.toggle('active');/*cardName_1.classList.toggle('active');
                                 cardName_2.classList.toggle('active');cardName_3.classList.toggle('active');
                                 cardnumbers_1.classList.toggle('active');cardnumbers_2.classList.toggle('active');
                                 cardnumbers_3.classList.toggle('active');*/
								 <?php if($work=='add_project' || $work=='edit_project'){?>
								 if(edit_form){edit_form.classList.toggle('active');}
								 if(number_of_version){number_of_version.classList.toggle('active');}
								 /*if((edit_form.childElementCount==8) || (edit_form.childElementCount==9) || (edit_form.childElementCount==10))
								 {
									 if(edit_form.childElementCount==8)
										{
											project_date.classList.toggle('active_8');
											job_title.classList.toggle('active');
											nat_id_ico.classList.toggle('active');											
										}
										else if(edit_form.childElementCount==9)
										{
											project_name.classList.toggle('active');
											project_date.classList.toggle('active_9');
											nat_id.classList.toggle('active_9');
											job_title.classList.toggle('active_9');
											degree_div.classList.toggle('active_9');
											if(!(courses_div==null)){courses_div.classList.toggle('active_9');}
											if(edit_form.classList.contains('active'))
											{
												nat_id_ico.classList.remove('active_9');
												nat_id_ico.classList.add('active');
											}else
											{
												nat_id_ico.classList.remove('active');
												nat_id_ico.classList.add('active_9');
											}
											<?php if(!empty($punichement)){ ?> punichement_div.classList.toggle('active_9');<?php } ?>											
										}else if(edit_form.childElementCount==10)
										{
											project_name.classList.toggle('active_10');
											project_date.classList.toggle('active_10');
											punichement_div.classList.toggle('active_10');
											nat_id.classList.toggle('active_10');
											if(edit_form.classList.contains('active'))
											{
												nat_id_ico.classList.remove('active_10');
												nat_id_ico.classList.add('active');
											}else
											{
												nat_id_ico.classList.remove('active');
												nat_id_ico.classList.add('active_10');
											}
											job_title.classList.toggle('active_10');
											degree_div.classList.toggle('active_10');
											courses_div.classList.toggle('active_10');
										}
								 }*/
								 <?php }?>
                                 if(alert_danger || alert_warning || alert_info)
                                 {
                                  alert_danger.classList.toggle('active');
                                  alert_warning.classList.toggle('active');
                                  alert_info.classList.toggle('active');
                                 }
                                 <?php if(isset($_GET['lang'])){if($_GET['lang']=='عربى')
                                 {
                                    echo "li_1_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_2_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_3_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_4_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_5_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_6_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_7_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_8_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_9_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_10_convert_right_way_link_to_arabic.classList.toggle('right_way');";
                                    echo "li_11_convert_right_way_link_to_arabic.classList.toggle('right_way');";                                 
                                 }}
                                 ?>
								<?php if($work=='add_project' || $work=='edit_project'){?> number_of_version.classList.toggle('active');<?php }?>
                               }
                            //end sidebar toggle button
                           //start add project form
								<?php if($work=='add_project' || $work=='edit_project'){?>
								if(add_project_form || edit_form)
								{
									if(add_project_form)
									{
										add_project_form.addEventListener("submit",function(e)
										{
											if(project_name.value=='' || project_name.value.lenght < 3 || 
											project_name.value.lenght > 250 || project_date.value=='' || 
											number_of_version.value=='' || manger_name.value=='' ||
											instuite1.value=='' || project_description.value=='' || 
											project_description.value.lenght < 3 || 
											project_description.value.lenght > 2000 || project_description > 2000
											|| finished_job.value=='' || finished_job.value.lenght < 3 ||
											finished_job.value.lenght > 5000 || finished_job_date.value=='')									
											{
												e.preventDefault();
												console.log('يارب');
											}
										});
									}else if(edit_form)
									{
										edit_form.onsubmit=function(e)
										{
											if(project_name.value=='' || project_name.value.lenght < 3 || 
											project_name.value.lenght > 250 || project_date.value=='' || 
											number_of_version.value=='' || manger_name.value=='' ||
											instuite1.value=='' || project_description.value=='' || 
											project_description.value.lenght < 3 || 
											project_description.value.lenght > 2000 || project_description > 2000
											|| finished_job.value=='' || finished_job.value.lenght < 3 ||
											finished_job.value.lenght > 5000 || finished_job_date.value=='')									
											{
												e.preventDefault();
												console.log('يارب');
											}
										}
									}
								}								
							for(let i=0;i<document.getElementsByTagName('input').length;i++)
							{                                             
								let myspan=document.createElement('span');
								myspan.className='astrix_add_edit_project';
								let myspan_text=document.createTextNode('*');
								myspan.appendChild(myspan_text);
								if(document.getElementsByTagName('input')[i].required==true)
								{
									document.getElementsByTagName('input')[i].parentElement.appendChild(myspan);
								}  
							}
							document.getElementsByTagName('input')[1].parentElement.children[1].style.right="0vw";
							document.getElementsByTagName('input')[2].parentElement.lastElementChild.style.right="0vw";
							document.getElementsByTagName('input')[3].parentElement.lastElementChild.style.right="52vw"
							for(let i=0;i<document.getElementsByTagName('select').length;i++)
							{                                             
								let myspan=document.createElement('span');
								myspan.className='astrix_add_edit_project_select';
								let myspan_text=document.createTextNode('*');
								myspan.appendChild(myspan_text);
								if(document.getElementsByTagName('select')[i].required==true)
								{
									document.getElementsByTagName('select')[i].parentElement.appendChild(myspan);
								}  
							}
							document.getElementsByTagName('select')[2].parentElement.lastElementChild.style.right="54.5vw";
							document.getElementsByTagName('select')[2].parentElement.lastElementChild.cssText="@media(max-width:991px){right:44.5vw}";
							for(let i=0;i<document.getElementsByTagName('textarea').length;i++)
							{                                             
								let myspan=document.createElement('span');
								myspan.className='astrix_add_edit_project_textarea';
								let myspan_text=document.createTextNode('*');
								myspan.appendChild(myspan_text);
								if(document.getElementsByTagName('textarea')[i].required==true)
								{
									document.getElementsByTagName('textarea')[i].parentElement.appendChild(myspan);
								}  
							}
                           //end add project form 
								<?php } ?>
								if(confirm_delete)
							{
								confirm_delete.onclick=function(e)
								{
									var msg=confirm('<?php echo lang('are you sure'); ?>');
									if(msg == false)
									{
										e.preventDefault();
									}
								}
							}
							if(delete_user)
							{
							
								delete_user.onclick=function(event)
								{
									var msg=confirm('<?php echo lang('are you sure'); ?>');
									if(msg == false)
									{
										event.preventDefault();
									}
								}
							}
							if(print_submit)
							{
								print_submit.onclick=function()
								{
									window.print();
								}
							}
							// start add_edit_project action
								<?php if($work=='add_project' || $work=='edit_project')
								{?>
									if(project_name)
									{
										project_name.onmouseover=function(){project_name.placeholder='';}
										project_name.onmouseleave=function(){project_name.placeholder='<?php echo lang("project name");?>';}
										project_name.onfocus=function(){project_name.placeholder='';}
										project_name.onblur=function(){project_name.placeholder='<?php echo lang("project name");?>';}
									}
									if(project_date)
									{
										project_date.onmouseover=function(){project_date.type='date';}
										project_date.onmouseleave=function(){project_date.type='text';}
										project_date.onfocus=function(){project_date.type='date';}
										project_date.onblur=function(){project_date.type='text';}
									}
									if(project_description)
									{
										project_description.onmouseover=function(){project_description.placeholder='';}
										project_description.onmouseleave=function(){project_description.placeholder='<?php echo lang("project_description");?>';}
										project_description.onfocus=function(){project_description.placeholder='';}
										project_description.onblur=function(){project_description.placeholder='<?php echo lang("project_description");?>';}
									}
									if(finished_job)
									{
										finished_job.onmouseover=function(){finished_job.placeholder='';}
										finished_job.onmouseleave=function(){finished_job.placeholder='<?php echo lang("finished_job");?>';}
										finished_job.onfocus=function(){finished_job.placeholder='';}
										finished_job.onblur=function(){finished_job.placeholder='<?php echo lang("finished_job");?>';}
									}
									if(finished_job_date)
									{
										finished_job_date.onmouseover=function(){finished_job_date.type='date';}
										finished_job_date.onmouseleave=function(){finished_job_date.type='text';}
										finished_job_date.onfocus=function(){finished_job_date.type='date';}
										finished_job_date.onblur=function(){finished_job_date.type='text';}
									}
									if(required_job)
									{								
										required_job.onmouseover=function(){required_job.placeholder='';}
										required_job.onmouseleave=function(){required_job.placeholder='<?php echo lang("required_job");?>';}
										required_job.onfocus=function(){required_job.placeholder='';}
										required_job.onblur=function(){required_job.placeholder='<?php echo lang("required_job");?>';}
									}
									<?php }?>
							//end add_edit_project action
							//start user_add_edit action<?php
								if($work =='add_user' || $work=='edit_user')
								{?>
									if(password)
									{
										password.onmouseover=function(){password.placeholder='';}
										password.onmouseleave=function(){password.placeholder='<?php echo lang("pass");?>';}
										password.onfocus=function(){password.placeholder='';}
										password.onblur=function(){password.placeholder='<?php echo lang("pass");?>';}
									}
									if(show_hide)
									{
										show_hide.onmousemove=function()
										{password.type='text';show_hide.classList.remove('fa-lock');
										show_hide.classList.add('fa-unlock');}                        
										show_hide.onmouseleave=function()
										{password.type='password';show_hide.classList.remove('fa-unlock');
										show_hide.classList.add('fa-lock');}
									}
									if(employee_name)
									{
										employee_name.onmouseover=function(){employee_name.placeholder='';}
										employee_name.onmouseleave=function(){employee_name.placeholder='<?php echo lang("Employee name");?>';}
										employee_name.onfocus=function(){employee_name.placeholder='';}
										employee_name.onblur=function(){employee_name.placeholder='<?php echo lang("Employee name");?>';}
									}
									if(username)
									{
										username.onmouseover=function(){username.placeholder='';}
										username.onmouseleave=function(){username.placeholder='<?php echo lang("usernme");?>';}
										username.onfocus=function(){username.placeholder='';}
										username.onblur=function(){username.placeholder='<?php echo lang("usernme");?>';}
									}
									if(email)
									{
										email.onmouseover=function(){email.placeholder='';}
										email.onmouseleave=function(){email.placeholder='<?php echo lang("email");?>';}
										email.onfocus=function(){email.placeholder='';}
										email.onblur=function(){email.placeholder='<?php echo lang("email");?>';}
									}
									for(let i=0;i<document.getElementsByTagName('input').length;i++)
									{                                             
										let myspan=document.createElement('span');
										myspan.className='astrix_add_edit_project';
										let myspan_text=document.createTextNode('*');
										myspan.appendChild(myspan_text);
										if(document.getElementsByTagName('input')[i].required==true)
										{
											document.getElementsByTagName('input')[i].parentElement.appendChild(myspan);
										}  
									}
									document.getElementsByTagName('input')[3].parentElement.lastElementChild.style.right="0vw";
									for(let i=0;i<document.getElementsByTagName('select').length;i++)
									{                                             
										let myspan=document.createElement('span');
										myspan.className='astrix_add_edit_project_select';
										let myspan_text=document.createTextNode('*');
										myspan.appendChild(myspan_text);
										if(document.getElementsByTagName('select')[i].required==true)
										{
											document.getElementsByTagName('select')[i].parentElement.appendChild(myspan);
										}  
									}
									add_user.onsubmit=function(e)
									{
											if(employee_name.value=='' || employee_name.value.lenght < 3 || 
											employee_name.value.lenght > 50 || username.value=='' || 
											username.value.lenght < 3 || username.value.lenght > 25 ||
											email.value=='' || user_authority_select.value=='' || password.value=='' ||
											password.value.lenght < 3 || password.value.lenght > 25)									
											{
												e.preventDefault();
												console.log('يارب');
											}
									}
								<?php }?>
							//end user_add_edit action
                        //end dashboard actions                        
                    //end dashboard<?php } ?>
		</script>          
		<script src="inc/layout/js/jquery-1.12.4.min.js"></script>
		<script src="inc/layout/js/bootstrap.min.js"></script>
	</body>
</html><?php echo '<!--الحمد لله رب العالمين تم بفضل الله الأنتهاء من هذا العمل -->';ob_end_flush();?>