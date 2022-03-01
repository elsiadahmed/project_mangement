<?php
session_start();
if(!require_once('inc/template/init.ink')){require_once('inc/template/init.ink');}
if(isset($_POST['stage_value']))
{	
	$stmt2=$conn->prepare("SELECT (SELECT stage.stage_id WHERE (SELECT COUNT(emp_us_id.emp_id))) AS stage_id,
												  (SELECT stage.stage WHERE (SELECT COUNT(emp_us_id.emp_id))) AS stage,
												  (SELECT degree.degree_id WHERE (SELECT COUNT(emp_us_id.emp_id)) )AS degree_id,
												  (SELECT degree.degree WHERE (SELECT COUNT(emp_us_id.emp_id))) AS degree,
												  (SELECT special.special_id WHERE (SELECT COUNT(emp_us_id.emp_id))) AS special_id,
												  (SELECT special.special WHERE (SELECT COUNT(emp_us_id.emp_id))) AS special,
												  COUNT(emp_us_id.id) as search_employee,emp_us_id.id as emp_us_id_id
												  FROM emp_us_id INNER JOIN stage USING(stage_id)
												  INNER JOIN degree USING(degree_id)
												  INNER JOIN special USING(special_id) WHERE emp_us_id.emp_id = ?;");
                            $stmt2->execute(array($_SESSION['employee_sanitize_id']));
                            $degree=$stmt2->fetch();
	if($_POST['stage_value'] == 1 || $_POST['stage_value'] == 2 || $_POST['stage_value'] == 3)
	{
		  $stmt3=$conn->prepare("SELECT * FROM degree where degree.degree_id != ? and degree_id between 1 and 30");
                          $stmt3->execute(array($degree['degree_id']));
                          $stageall=$stmt3->fetchall();
						 
							echo (json_encode($stageall)); 
	}elseif($_POST['stage_value'] == 4)
	{
		 $stmt3=$conn->prepare("SELECT * FROM degree where degree.degree_id != ? && degree_id between 31 and 44 || degree_id BETWEEN 49 and 55 ||  degree_id BETWEEN 59 and 62 ||  degree_id BETWEEN 65 and 70;");
                          $stmt3->execute(array($degree['degree_id']));
                          $stageall=$stmt3->fetchall();
						 
							echo (json_encode($stageall)); 
	}		
}							
							
if(isset($_POST['punichement_selector_value']))
{
	$stmt=$conn->prepare("SELECT punichement.punichement as punichement,punichement.punichement_number as punichement_number,punichement.punichement_date AS punichement_date,remove_punichement,CASE WHEN punichement.remove_punichement < 1 THEN 'لم يحذف' ELSE 'تم الحذف' 
															END AS remove_punichement,
															CASE WHEN punichement.remove_punichement < 1 THEN 'لم يحذف' ELSE punichement.remove_punichement_date
															END AS remove_punichement_date FROM punichement where punichement.id=? limit 1;");
                          $stmt->execute(array($_POST['punichement_selector_value']));
                           $special1=$stmt->fetch();						   
						  echo(json_encode($special1));
}
if(isset($_POST['courses_selector_value']))
{
	$stmt=$conn->prepare("SELECT `course_name`,`course_place`,`start_course_date`,`end_course_date` from courses where id=? limit 1;");
                          $stmt->execute(array($_POST['courses_selector_value']));
                           $special=$stmt->fetch();						   
						  echo json_encode($special);
}
