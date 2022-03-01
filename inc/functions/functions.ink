<?php
//start variable
 $div_danger='<div class="alert alert-danger" id="msg_danger" style="text-align:center;position: relative;">';
  $enddiv='</div>';
 $br='<br>';
 $alertinfo='<div class="alert alert-info" id="msg_info" style="text-align:center;position: relative;">';
$div_success='<div class="alert alert-success" id="msg_success" style="text-align:center;position: relative;">';
$div_warning='<div class="alert alert-warning" id="msg_success" style="text-align:center;position: relative;">';	
//end variable
//start functions
    //start page title name function
        function getTitle()
        {
            global $pageTitle;
            if(isset($pageTitle))
            {
                echo $pageTitle;
            }
            else
            {
                echo 'Default';
            }
        }
    //end page title name function
      //start arabic numbers function
        function numbers($number)
        {
        $en = array("0","1","2","3","4","5","6","7","8","9");
        $arabic = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩
        ");
        $ar_number = str_replace($en, $arabic,$number);
        return $ar_number;
        }
    //end arabic numbers function     
//end functions   
    //start date arabic convert function  
     function arabic_date($arabicday)
    {
        $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
        $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
		$strtotime=strtotime($arabicday);
        $ar_day_format = date('D',$strtotime); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);
         $standard = array("0","1","2","3","4","5","6","7","8","9");        
        $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
       $strtotime=strtotime($arabicday);
	   $current_date=' - '.date("Y/n/j",$strtotime);
        $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);
        return $ar_day .$arabic_date;
    } 

    //end  date arabic convert function
	//start function redirect
		function msg_responde($errormsg='',$successmsg='',$msgwarning='',$noresponde='')
		{
			global $div_danger,$enddiv,$div_success,$div_warning;
			if(empty($successmsg) && empty($msgwarning)){echo $div_danger.$errormsg.$enddiv;}elseif(empty($errormsg) && empty($msgwarning)){echo $div_success.$successmsg.$enddiv;}elseif(empty($successmsg) && empty($errormsg)){echo $div_warning.$msgwarning.$enddiv;}else{echo $noresponde;}			
		}		
		function redirectmsg($msg='سوف نقوم بتحويل الصفحة الى الصفحة السابقة فى خلال ',$second=3,$txtsecond=' ثوانى ',$url='index.php')
		{
			global $alertinfo,$enddiv,$br;
			echo $alertinfo.$msg;
			if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
			{
				$url=$_SERVER['HTTP_REFERER'];
			}
			else
			{
				$url='sign_out.php';
			}
			header("refresh:$second;url=$url");
			exit();
		}
	//end function redirect
?>