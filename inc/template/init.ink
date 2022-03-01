<?php
date_default_timezone_set('Africa/Cairo');
//start routes variables
    $inc='inc/';
    $lay='layout/';
    $tmp='template/';
    $css='css/';
	$upload='upload/';
    $ink='ink';
    $cssext='css';
    $js='js/';
    $func='functions/';
    $lang='lang/';
    $loc='location: ';
    $dshbrd='dashboard';
    $phpext='php';
    $dotext='.';
    $img='images/'; 
    $pngext='png';   
//end routes variables
//start files name variables    
    $minconct='db-connect';
    $minhedr='header';
    $mincss='style';
    $mininit='init';
    $nomzecss='normalize';
    $minjs='main';
    $mainfnt='all.min';
    $arlang='ar';
    $enlang='en';
    $side='sidebar';
    $minfunc='functions';
    $egyptflag='egypt-logo';
//end files name variables 
//start include files
require($minconct.$dotext.$ink);
require($inc.$func.$minfunc.$dotext.$ink);
$SANITIZE_GET_LANG='';
if(isset($_GET['lang'])){$SANITIZE_GET_LANG==htmlspecialchars($_GET['lang']);}
if(isset($_GET['lang']) && !empty($_GET['lang']))
{
    if($_GET['lang']== 'en')
    {
        require($inc.$lang.$enlang.$dotext.$ink);
        $langauges='en';
        $lang_btn_value='ar';
               
    }
    elseif($_GET['lang']=='ar')
    {
        require($inc.$lang.$arlang.$dotext.$ink);
        $langauges='ar';
        $lang_btn_value='en';
               
    }else
    {
         require($inc.$lang.$arlang.$dotext.$ink);
        $langauges='ar';
        $lang_btn_value='en';               
    }
}
else
{
   require($inc.$lang.$arlang.$dotext.$ink);
        $langauges='ar';
        $lang_btn_value='en';  
                 
}
//end include files