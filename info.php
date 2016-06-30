<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');




$dt = new DateTime(null, new DateTimeZone('Europe/Vienna'));
$current_time = $dt->format('Y-m-d\TH:i:s\Z');
 echo  $current_time;
 
// Don't remove this
//-------------------RESTRICTION OF ACCESS TO CLOSED PART OF SITE
unset ($auth);
unset ($pid);
session_name();
session_start();


if(!$_SESSION['auth']==1):{ 
  header("Location: index.php"); 
  exit; 
}
endif;
//------------

//Lena: 29.12.2014 - Controlling of sessions

/*
echo "Sessions <pre>";
session_name();
session_start();
print_r($_SESSION);
echo "</pre>";

echo "Cookies <pre>";
print_r($_COOKIE);
echo "</pre>";
//
error_reporting(E_ALL);
ini_set('display_errors', '1');
echo "test";

function round_right_000($a)
{

	// $ScaledFractPart:= Frac(a)*100;
	$ScaledFractPart=($a-floor($a))*1000;
	//Temp:= Frac(ScaledFractPart);
	$Temp= $ScaledFractPart-floor($ScaledFractPart);
	//ScaledFractPart:= Int(ScaledFractPart);
	$ScaledFractPart= floor($ScaledFractPart);
	if ($Temp >=0.5): {$ScaledFractPart=$ScaledFractPart+1;}endif;
	if ($Temp <=-0.5):{$ScaledFractPart=$ScaledFractPart-1;}endif;

	//Result:= Int(a) + ScaledFractPart/100;
	$Result= floor($a)+$ScaledFractPart/1000;
	return $Result;
}



function roundup($value,$znak)
{
	if ($znak>-1)
	{
		$first_round=round($value,$znak);
		$get_downgrade=$value-$first_round;
		$multiplier=1;
		for ($p=1; $p<=$znak ; $p++)
		{
			$multiplier=($multiplier/10);
		}
		if ($get_downgrade>0)
		{
			$get_final=($first_round+$multiplier);
		}
		else $get_final=$first_round;
		return $get_final;
	}
	else return 'error: wrong round value</br>';
}
$num_to_round=12.4645;
echo 
"<br>without round:".$num_to_round.
"<br>round: ".round($num_to_round,3).
"<br>round right: ".round_right_000($num_to_round).
"<br>round up: ".roundup($num_to_round,3).'<br>';

$num_to_round=12.4641;
echo 
"<br>without round:".$num_to_round.
"<br>round: ".round($num_to_round,3).
"<br>round right: ".round_right_000($num_to_round).
"<br>round up: ".roundup($num_to_round,3).'<br>';

$num_to_round=12.4647;
echo 
"<br>without round:".$num_to_round.
"<br>round: ".round($num_to_round,3).
"<br>round right: ".round_right_000($num_to_round).
"<br>round up: ".roundup($num_to_round,3).'<br>';
/*
$get_timestamp=((strtotime('2012-11-01'))-(strtotime('2007-11-01')));
echo $get_timestamp;
							//We are getting current stamp of end of year
							$get_curr_year=round($get_timestamp/(2628000*12),2);
                                                        echo $get_curr_year;
							//Round to integer value - it's order of current year
							$get_curr=roundup($get_curr_year,0);
							//From common numbers of months we "-" count of months in full year, 
							//If we didn't have full year, then $period=$get_curr_month
							$abgm=(12/1);

							$get_timestamp2=((strtotime('2011-11-01'))-(strtotime('2007-11-01')));
							$get_curr_month=($get_timestamp2/2628000);
							$period=(round($get_curr_month, 0)+$abgm);
                                                        echo $get_curr;
                                                        echo "<br>$period<br><br>";
                                                        //Calculating year
                                                     //  $get_curr=($period-$period%12)/12;
                                                      
                                                        $get_curr=ceil($period/12);
                                                       echo $get_curr;



                                                        
//echo date("Y-m-d G:i:s"); */
//echo 'Today hookup is not working !!!';
echo phpinfo();

include_once('admin/cg_t.php');
//$picture=urldecode($_GET['picture']);
//$id=$_GET['id'];
//$mak=$_GET['mak'];
mysql_connect($dbhostname, 'secured', '467890');
mysql_select_db($dbname) or die('An error has occurred. Unable to change data base!'); 
/*
$get_loop_S72_KONTO=mysql_query("SELECT * FROM S72_KONTO 
			WHERE MAK = '28' and ABRM='201201' and NEUSALDO=0");
while ($loop_S72_KONTO=mysql_fetch_assoc($get_loop_S72_KONTO))
{ 
	
	$get_mnr_adminunit=mysql_query("SELECT a.AdminUnitID, a.POrt, b.AdminUnitDesc, b.AdminUnitCode FROM P2_Addr as a LEFT JOIN iAdminUnit as b ON b.CountryCODE=a.PNat AND b.AdminUnitID=a.AdminUnitID WHERE a.PNat = 'BIH' AND a.`AddrID` = '3' AND a.PID='".$loop_S72_KONTO['MNR_KONTO']."'");	
	if (mysql_num_rows($get_mnr_adminunit)==1)
	{
		$adminunit=mysql_fetch_assoc($get_mnr_adminunit);
		$update_S72_KONTO=mysql_query("Update S72_KONTO  set AdminUnitID='".$adminunit['AdminUnitID']."',AdminUnitDesc='".$adminunit['AdminUnitDesc']."', AdminUnitCode='".$adminunit['AdminUnitCode']."', POrt='".$adminunit['POrt']."'  
					WHERE MAK = '28' and ABRM='201201' and MNR_KONTO='".$loop_S72_KONTO['MNR_KONTO']."' ");
		
		if ($adminunit['AdminUnitID']==87)
		{ $is_resident='*';
		}
		else
		{
			if ($adminunit['AdminUnitID']==74)
			{
				if ($adminunit['AdminUnitID']==74 and substr_count($adminunit['POrt'], "Sarajevo")==1)
				{
					$is_resident='*';
				}
				else 
				{
					$is_resident='';
				}
			}
			else
			{
				$is_resident='*';
			}
		}
	$update_S72_KONTO=mysql_query("Update S72_KONTO  set AdminUnitID='".$adminunit['AdminUnitID']."',AdminUnitDesc='".$adminunit['AdminUnitDesc']."', AdminUnitCode='".$adminunit['AdminUnitCode']."', POrt='".$adminunit['POrt']."', F_is_resident= '".$is_resident."' 
					WHERE MAK = '28' and ABRM='201201' and MNR_KONTO='".$loop_S72_KONTO['MNR_KONTO']."' ");
		echo "Update S72_KONTO  set AdminUnitID='".$adminunit['AdminUnitID']."',AdminUnitDesc='".$adminunit['AdminUnitDesc']."', AdminUnitCode='".$adminunit['AdminUnitCode']."', POrt='".$adminunit['POrt']."', F_is_resident= '".$is_resident."' 
				WHERE MAK = '28' and ABRM='201201' and MNR_KONTO='".$loop_S72_KONTO['MNR_KONTO']."' ";
	}
	else // we have not, or not Not clear info about AdminUnitID
	{
		$update_S72_KONTO=mysql_query("Update S72_KONTO as a set NETTO=0, NEUSALDO=SUMME, Note='Not clear info about AdminUnitID or POrt' 
					WHERE MAK = '28' and ABRM='201201' and MNR_KONTO='".$loop_S72_KONTO['MNR_KONTO']."' ");
	}
}

$get_loop_S72_KONTO=mysql_query("SELECT * FROM S72_KONTO 
			WHERE MAK = '28' and ABRM='201201' and NEUSALDO=0");
while ($loop_S72_KONTO=mysql_fetch_assoc($get_loop_S72_KONTO))
{ 
	$brutto=0;
	$aufwand=0;
	$po=0;
	$steuer=0;
	
	$unfall=0;
	$invalst=0;
	$prirez= 0;   //what is this on human lanq??
	
	$netto=0;
	$note='';
	
if ($loop_S72_KONTO['PaymentTypeID']==2) 
{
	$brutto=$loop_S72_KONTO['SUMME'];
	$aufwand=0;
	$po=0;
	$steuer=round(($brutto*0.44115),2);
	
	$unfall=0;
	$invalst=0;
	$prirez= 0;   //what is this on human lanq??
	
	$netto=round(($brutto-$steuer),2);
	$newsaldo=0;
	$note='OK';

}
else 
	{
		
		if ($loop_S72_KONTO['F_is_resident']=='*') {
			$brutto=$loop_S72_KONTO['SUMME'];
			$aufwand=round(($brutto*0.2),2);
			$po=round(($brutto-$aufwand),2);;
			$steuer=round(($po*0.1),2);
			
			$unfall=0;
			$invalst=0;
			$prirez= 0;
			
			$netto=round(($brutto-$steuer),2);
			$newsaldo=0;
			$note='OK';
		}
		else 
		{
			$brutto=$loop_S72_KONTO['SUMME'];
			$aufwand=0;
			$po=round(($brutto),2);
			$netto=round(($brutto/(11111/10000)),2);
			$steuer=round(($brutto-$netto),2);
			
			$unfall=0;
			$invalst=0;
			$prirez= 0;
			
			$note='OK';
		}
	}
	$update_S72_KONTO=mysql_query("Update S72_KONTO  set 
				BRUTTO='$brutto',
				Aufwand='$aufwand',
				PO_SteuerBasis='$po',
				Steuer='$steuer',
				Unfall='$unfall',
				Invalst='$invalst',
				Prirez='$prirez',
				NETTO='$netto', 
				NEUSALDO='$newsaldo',
				Note='$note'
				WHERE MAK = '28' and ABRM='201201' and MNR_KONTO='".$loop_S72_KONTO['MNR_KONTO']."' and PaymentTypeID='".$loop_S72_KONTO['PaymentTypeID']."'");
}

----------------
function Get_Empty_PID_From_P1() 
{
	$dbresult=mysql_query("SELECT l.PID +1 AS
				START
				FROM P1 AS l
				LEFT OUTER JOIN P1 AS r ON l.PID +1 = r.PID
				WHERE r.PID IS NULL
				AND l.PID >59100
				ORDER BY `start` ASC
				LIMIT 1");
	$get_pid=mysql_fetch_assoc($dbresult);
	return $get_pid['START']; 
}

$get_main_loop=mysql_query("SELECT *
			FROM `K1_STAMM_16`
			WHERE `PID` IS NULL
			GROUP BY K_NAME_SH_CODE, K_NAME_L_CODE, `K_GEBDAT`");
			while ($main_loop=mysql_fetch_assoc($get_main_loop))
{
	$pid=Get_Empty_PID_From_P1();
	mysql_query("UPDATE K1_STAMM_16 SET PID='$pid' WHERE K_NR='".$main_loop['K_NR']."'");	
	mysql_query("insert into P1(PID,PNameSh,PNameL,PNameSh_code,PNameL_code,PTypeCODE,PDefAddrID,Lang,PUID_Ins,PDate_Ins,PUID_Upd,PDate_Upd) 
				values ($pid,'".$main_loop['K_NAME_SH']."','".$main_loop['K_NAME_L']."','".$main_loop['K_NAME_SH_CODE']."','".$main_loop['K_NAME_L_CODE']."','p','','bg',0,NOW(),0,NOW())");
	if ($main_loop['K_NAME_L_CODE']=='��"��A�A"'
or $main_loop['K_NAME_L_CODE']=='ET"SYANA"'
or $main_loop['K_NAME_L_CODE']=='Shtrkel-OOD'
or $main_loop['K_NAME_L_CODE']=='SOLVEKS-TURYNVEST-EOOD'
or $main_loop['K_NAME_L_CODE']=='EOOD'
or $main_loop['K_NAME_L_CODE']=='AD'
or $main_loop['K_NAME_L_CODE']=='00D'
or $main_loop['K_NAME_L_CODE']=='OOD')
	{
		mysql_query("insert into P1_Comp(PID,PID_chief1,PID_chief2,PBegDate,PUID_Ins,PDate_Ins,PUID_Upd,PDate_Upd) 
					values($pid,'','','".$main_loop['K_GEBDAT']."',0,NOW(),0,NOW())");
	echo "<br>";	
	}
	else {
		if (substr($main_loop['K_NAME_SH_CODE'], -1)=='a') {$sex='f'; $tit='2';}
		else {$sex='m';$tit='1';}
		
	mysql_query("insert into P1_Pers(PID,PSex,PTitelID,PBirthDayX,PBirthDay,PBNumber,PSchoolID,PProfDesc,MaritalStatusID,PIsDead,PUID_Ins,PDate_Ins,PUID_Upd,PDate_Upd, PDate_InsU, PDate_UpdU) 
					values($pid,'$sex','$tit=',DATE_FORMAT('".$main_loop['K_GEBDAT']."','%d.%m.%Y'),'".$main_loop['K_GEBDAT']."',0,'','','','',0,NOW(),0,NOW(),UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
		
		}
	mysql_query("insert into P2_Addr(PID,AddrId,PNat,AdminUnitID,PStr,POrt,PZip,F_PostAddress,PUID_Ins,PDate_Ins,PUID_Upd,PDate_Upd, PDate_UpdU, PDate_InsU) values
				($pid,'1','".$main_loop['K_NAT']."',NULL,'".$main_loop['K_STR']."','".$main_loop['K_ORT']."','".$main_loop['K_PLZ']."','',0,NOW(),0,NOW(),UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
}


*/

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
/*
function to_allfinans()
{
 $k=480;
    $get_top_loop=mysql_query("SELECT DISTINCT PID_Owner
FROM Blank1
WHERE ANR IS NOT NULL
AND `PID_Owner` !=53462");
   while ($top_loop=mysql_fetch_assoc($get_top_loop))
	{ 
       $k++;
     mysql_query("INSERT  INTO DABlankAct1 VALUES ('".$k."','14','From ".$top_loop['PID_Owner']."', NOW(), 'transfer note', ".$top_loop['PID_Owner'].",'53462', NULL, 0,'','','','0', NOW())");
     
	$get_vals=mysql_query("SELECT c.CompBlankTypeDesc, a.CompBlankTypeID, a.DABlankSeries, a.DABlankNb, a.CompCODE
FROM Blank1 AS a, iCompBlankType AS c
WHERE c.CompBlankTypeID = a.CompBlankTypeID
AND `PID_Owner` ='".$top_loop['PID_Owner']."'
AND a.F_Spoiled IS NULL
AND a.DABlankActID_given IS NULL
AND ANR IS NOT NULL
AND `PID_Owner` !=53462
AND `PID_Owner` !=247885
AND `PID_Owner` !=29198
AND `PID_Owner` !=239792
ORDER BY a.CompBlankTypeID, a.DABlankSeries, a.DABlankNb");
	while ($vals=mysql_fetch_assoc($get_vals))
	{
            if ($seria=='') $seria=$vals['DABlankSeries']; 
            if ($type=='')  $type=$vals['CompBlankTypeID'];
	     $diapazon_count[$seria][$type]+=1;
          // echo print_r($diapazon_count).'<br>';
        // echo $vals['DABlankNb'].'-->'.$diapazon_count[$seria][$type].'<br>';
		if ($diapazon_count[$seria][$type]!=$vals['DABlankNb'] and $diapazon_count[$seria][$type]!='' and $begin>0)
		{
			$i++;
                    //    echo $begin.'-->'.$diapazon_count[$seria][$type].'<br>';
			if ($begin!=$diapazon_count[$seria][$type] ) {$diapazon_count[$seria][$type]-=1; }//fix 
                        if ($owner=='')  $owner=$top_loop['PID_Owner'];
                        if ($count=='')  $count=$k;
                        if ($comp=='')  $comp=$vals['CompCODE'];
                       // echo $owner.'->'.$type.'->'.$seria.'->'.$begin.'->'.$diapazon_count[$seria][$type].'->'.($diapazon_count[$seria][$type]-$begin+1)."<br>";	
			mysql_query("INSERT INTO DABlankAct2 VALUES( '".$count."', '".$comp."','".$type."','".$seria."','".$begin."','".$diapazon_count[$seria][$type]."','".($diapazon_count[$seria][$type]-$begin+1)."')");
                        
                        $begin='';
		}
	if ($begin=='') 
	{
                $comp=$vals['CompCODE'];
                $count=$k;
                $owner=$top_loop['PID_Owner'];
		$begin=$vals['DABlankNb']; //setting begin if we do not have one
		$seria=$vals['DABlankSeries'];
		$type=$vals['CompBlankTypeID'];
		$desc=$vals['CompBlankTypeDesc'];
		$diapazon_count[$seria][$type]=$vals['DABlankNb']; //initializing diapazon
	}
	}
}
}
    
*/

//AND `PID_Owner` !=247885 UPS_UA
//AND `PID_Owner` !=29198 KZA_UA
//AND `PID_Owner` !=239792 AXA_UA
/*
       $k=538;
     print("INSERT  INTO DABlankAct1 VALUES ('".$k."','14','From 53462', NOW(), 'transfer note', '53462','247885', NULL, 0,'','','','0', NOW());");
     echo "<br>";
	$get_vals=mysql_query("SELECT c.CompBlankTypeDesc, a.CompBlankTypeID, a.DABlankSeries, a.DABlankNb, a.CompCODE
FROM Blank1 AS a, iCompBlankType AS c
WHERE c.CompBlankTypeID = a.CompBlankTypeID
AND `PID_Owner` ='53462'
AND a.F_Spoiled IS NULL
AND a.DABlankActID_given IS NULL
AND ANR IS NOT NULL
AND a.CompCODE='UPS_UA'
ORDER BY a.CompBlankTypeID, a.DABlankSeries, a.DABlankNb");
	while ($vals=mysql_fetch_assoc($get_vals))
	{
            if ($seria=='') $seria=$vals['DABlankSeries']; 
            if ($type=='')  $type=$vals['CompBlankTypeID'];
	     $diapazon_count[$seria][$type]+=1;
          // echo print_r($diapazon_count).'<br>';
        // echo $vals['DABlankNb'].'-->'.$diapazon_count[$seria][$type].'<br>';
		if ($diapazon_count[$seria][$type]!=$vals['DABlankNb'] and $diapazon_count[$seria][$type]!='' and $begin>0)
		{
			$i++;
                    //    echo $begin.'-->'.$diapazon_count[$seria][$type].'<br>';
			if ($begin!=$diapazon_count[$seria][$type] ) {$diapazon_count[$seria][$type]-=1; }//fix 
                        if ($owner=='')  $owner=$top_loop['PID_Owner'];
                        if ($count=='')  $count=$k;
                        if ($comp=='')  $comp=$vals['CompCODE'];
                       // echo $owner.'->'.$type.'->'.$seria.'->'.$begin.'->'.$diapazon_count[$seria][$type].'->'.($diapazon_count[$seria][$type]-$begin+1)."<br>";	
			print("INSERT INTO DABlankAct2 VALUES( '".$count."', '".$comp."','".$type."','".$seria."','".$begin."','".$diapazon_count[$seria][$type]."','".($diapazon_count[$seria][$type]-$begin+1)."');");
                        echo "<br>";
                        $begin='';
		}
	if ($begin=='') 
	{
                $comp=$vals['CompCODE'];
                $count=$k;
                $owner=$top_loop['PID_Owner'];
		$begin=$vals['DABlankNb']; //setting begin if we do not have one
		$seria=$vals['DABlankSeries'];
		$type=$vals['CompBlankTypeID'];
		$desc=$vals['CompBlankTypeDesc'];
		$diapazon_count[$seria][$type]=$vals['DABlankNb']; //initializing diapazon
	}
	}
 



function get_cows_hier($mak,$mnr,$clear=1,$level)
        {
    $level++; 
    if ($level<50) //protection from infinit loop in structure
        { 
    if ($clear==1)  mysql_query("DELETE FROM Work1 WHERE Mak='".$mak."'");
    mysql_query("INSERT INTO Work1 VALUES ('".$mak."','".$mnr."')"); 
    $get_layer=mysql_query("SELECT MNR from _M1_STAMM where Mak='".$mak."' and LNR='".$mnr."'");
    while ($layer=mysql_fetch_assoc($get_layer)) 
           {
           get_cows_hier($mak,$layer['MNR'],'', $level);
           }
        }
        else echo "Warning recursion is too deep! Function stopped on mnr=".$mnr.", check _M1_STAMM for structure loops!";
   }
get_cows_hier(14,1000);
 



 $get_coworker_doc="SELECT * FROM DAMakAct1 WHERE DAMakActID=1728";
  $coworker_doc_result=mysql_query($get_coworker_doc);
  if (mysql_num_rows($coworker_doc_result)>0)
  {
	$dbresult=mysql_fetch_assoc($coworker_doc_result);
	//header("Content-Type: application/pdf");
	//header("HTTP/1.1 200 OK");
	header('Content-Type: application/x-download');
	header("Content-Disposition: inline; filename='VR524WVPNOTA.CSV'");
	header('Cache-Control: private, max-age=0, must-revalidate');
	header('Pragma: public');
	ini_set('zlib.output_compression','0');
	print $dbresult['DAMakFile'];
  }  

 */
/*
function translit($InStr)
{
//use http://www.1728.org/codes.htm to get HTML Character Entities and correct transliteration
$trans = array(
  html_entity_decode('&#138;', 0, 'UTF-8')=>'S'				
, html_entity_decode('&#142;', 0, 'UTF-8')=>'Z', html_entity_decode('&#154;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#156;', 0, 'UTF-8')=>'a', html_entity_decode('&#158;', 0, 'UTF-8')=>'Z'	
, html_entity_decode('&#159;', 0, 'UTF-8')=>'Y'
, html_entity_decode('&#192;', 0, 'UTF-8')=>'A', html_entity_decode('&#193;', 0, 'UTF-8')=>'A'				
, html_entity_decode('&#194;', 0, 'UTF-8')=>'A', html_entity_decode('&#195;', 0, 'UTF-8')=>'A'				
, html_entity_decode('&#196;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#197;', 0, 'UTF-8')=>'A'				
, html_entity_decode('&#198;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#199;', 0, 'UTF-8')=>'C'				
, html_entity_decode('&#200;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#201;', 0, 'UTF-8')=>'E'				
, html_entity_decode('&#202;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#203;', 0, 'UTF-8')=>'E'				
, html_entity_decode('&#204;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#205;', 0, 'UTF-8')=>'I'				
, html_entity_decode('&#206;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#207;', 0, 'UTF-8')=>'I'				
, html_entity_decode('&#208;', 0, 'UTF-8')=>'D'	, html_entity_decode('&#209;', 0, 'UTF-8')=>'N'				
, html_entity_decode('&#210;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#211;', 0, 'UTF-8')=>'O'				
, html_entity_decode('&#212;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#213;', 0, 'UTF-8')=>'O'				
, html_entity_decode('&#214;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#215;', 0, 'UTF-8')=>'X'				
, html_entity_decode('&#216;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#217;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#218;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#219;', 0, 'UTF-8')=>'U'
, html_entity_decode('&#220;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#221;', 0, 'UTF-8')=>'Y'				
, html_entity_decode('&#222;', 0, 'UTF-8')=>'p'	, html_entity_decode('&#223;', 0, 'UTF-8')=>'ss'				
, html_entity_decode('&#224;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#225;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#226;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#227;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#228;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#229;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#230;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#231;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#232;', 0, 'UTF-8')=>'e'	, html_entity_decode('&#233;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#234;', 0, 'UTF-8')=>'e'	, html_entity_decode('&#235;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#236;', 0, 'UTF-8')=>'i'	, html_entity_decode('&#237;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#238;', 0, 'UTF-8')=>'i'	, html_entity_decode('&#239;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#240;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#241;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#242;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#243;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#244;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#245;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#246;', 0, 'UTF-8')=>'o'					
, html_entity_decode('&#248;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#249;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#250;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#251;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#252;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#253;', 0, 'UTF-8')=>'y'				
, html_entity_decode('&#254;', 0, 'UTF-8')=>'p'	, html_entity_decode('&#255;', 0, 'UTF-8')=>'y'				
, html_entity_decode('&#256;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#257;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#258;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#259;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#260;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#261;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#262;', 0, 'UTF-8')=>'C'	, html_entity_decode('&#263;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#264;', 0, 'UTF-8')=>'C'	, html_entity_decode('&#265;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#266;', 0, 'UTF-8')=>'C'	, html_entity_decode('&#267;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#268;', 0, 'UTF-8')=>'C'	, html_entity_decode('&#269;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#270;', 0, 'UTF-8')=>'D'	, html_entity_decode('&#271;', 0, 'UTF-8')=>'d'				
, html_entity_decode('&#272;', 0, 'UTF-8')=>'Dj' , html_entity_decode('&#273;', 0, 'UTF-8')=>'dj'				
, html_entity_decode('&#274;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#275;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#276;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#277;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#278;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#279;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#280;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#281;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#282;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#283;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#284;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#285;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#286;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#287;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#288;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#289;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#290;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#291;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#292;', 0, 'UTF-8')=>'H'	, html_entity_decode('&#293;', 0, 'UTF-8')=>'h'				
, html_entity_decode('&#294;', 0, 'UTF-8')=>'H'	, html_entity_decode('&#295;', 0, 'UTF-8')=>'h'				
, html_entity_decode('&#296;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#297;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#298;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#299;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#300;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#301;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#302;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#303;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#304;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#305;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#306;', 0, 'UTF-8')=>'?'	, html_entity_decode('&#307;', 0, 'UTF-8')=>'?'				
, html_entity_decode('&#308;', 0, 'UTF-8')=>'J'	, html_entity_decode('&#309;', 0, 'UTF-8')=>'j'				
, html_entity_decode('&#310;', 0, 'UTF-8')=>'K'	, html_entity_decode('&#311;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#312;', 0, 'UTF-8')=>'K'	, html_entity_decode('&#313;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#314;', 0, 'UTF-8')=>'l'	, html_entity_decode('&#315;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#316;', 0, 'UTF-8')=>'l'	, html_entity_decode('&#317;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#318;', 0, 'UTF-8')=>'l'	, html_entity_decode('&#319;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#320;', 0, 'UTF-8')=>'l'	, html_entity_decode('&#321;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#322;', 0, 'UTF-8')=>'l'	, html_entity_decode('&#323;', 0, 'UTF-8')=>'N'				
, html_entity_decode('&#324;', 0, 'UTF-8')=>'n'	, html_entity_decode('&#325;', 0, 'UTF-8')=>'N'				
, html_entity_decode('&#326;', 0, 'UTF-8')=>'n'	, html_entity_decode('&#327;', 0, 'UTF-8')=>'N'				
, html_entity_decode('&#328;', 0, 'UTF-8')=>'n'	, html_entity_decode('&#329;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#330;', 0, 'UTF-8')=>'B'	, html_entity_decode('&#331;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#332;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#333;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#334;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#335;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#336;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#337;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#340;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#341;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#342;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#343;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#344;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#345;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#346;', 0, 'UTF-8')=>'S'	, html_entity_decode('&#347;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#348;', 0, 'UTF-8')=>'S'	, html_entity_decode('&#349;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#350;', 0, 'UTF-8')=>'S'	, html_entity_decode('&#351;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#352;', 0, 'UTF-8')=>'S'	, html_entity_decode('&#353;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#354;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#355;', 0, 'UTF-8')=>'t'				
, html_entity_decode('&#356;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#357;', 0, 'UTF-8')=>'t'				
, html_entity_decode('&#358;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#359;', 0, 'UTF-8')=>'t'				
, html_entity_decode('&#360;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#361;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#362;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#363;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#364;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#365;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#366;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#367;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#368;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#369;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#370;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#371;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#372;', 0, 'UTF-8')=>'W'	, html_entity_decode('&#373;', 0, 'UTF-8')=>'w'				
, html_entity_decode('&#374;', 0, 'UTF-8')=>'Y'	, html_entity_decode('&#375;', 0, 'UTF-8')=>'y'				
, html_entity_decode('&#376;', 0, 'UTF-8')=>'Y'	, html_entity_decode('&#377;', 0, 'UTF-8')=>'Z'				
, html_entity_decode('&#378;', 0, 'UTF-8')=>'z'	, html_entity_decode('&#379;', 0, 'UTF-8')=>'Z'				
, html_entity_decode('&#380;', 0, 'UTF-8')=>'z'	, html_entity_decode('&#381;', 0, 'UTF-8')=>'Z'				
, html_entity_decode('&#382;', 0, 'UTF-8')=>'z'	, html_entity_decode('&#383;', 0, 'UTF-8')=>'f'				
, html_entity_decode('&#384;', 0, 'UTF-8')=>'b'	, html_entity_decode('&#385;', 0, 'UTF-8')=>'b'				
, html_entity_decode('&#386;', 0, 'UTF-8')=>'b'	, html_entity_decode('&#387;', 0, 'UTF-8')=>'b'				
, html_entity_decode('&#389;', 0, 'UTF-8')=>'b'	, html_entity_decode('&#391;', 0, 'UTF-8')=>'c'				
, html_entity_decode('&#428;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#430;', 0, 'UTF-8')=>'T'	
, html_entity_decode('&#432;', 0, 'UTF-8')=>'u'	 				
, html_entity_decode('&#434;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#435;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#436;', 0, 'UTF-8')=>'y'	, html_entity_decode('&#437;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#438;', 0, 'UTF-8')=>'z'	, html_entity_decode('&#439;', 0, 'UTF-8')=>'z'					
, html_entity_decode('&#452;', 0, 'UTF-8')=>'DZ', html_entity_decode('&#453;', 0, 'UTF-8')=>'Dz'				
, html_entity_decode('&#454;', 0, 'UTF-8')=>'dz', html_entity_decode('&#455;', 0, 'UTF-8')=>'LJ'				
, html_entity_decode('&#456;', 0, 'UTF-8')=>'Lj', html_entity_decode('&#457;', 0, 'UTF-8')=>'lj'				
, html_entity_decode('&#458;', 0, 'UTF-8')=>'NJ', html_entity_decode('&#459;', 0, 'UTF-8')=>'Nj'				
, html_entity_decode('&#460;', 0, 'UTF-8')=>'nj', html_entity_decode('&#461;', 0, 'UTF-8')=>'A'				
, html_entity_decode('&#462;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#463;', 0, 'UTF-8')=>'I'				
, html_entity_decode('&#464;', 0, 'UTF-8')=>'i'	, html_entity_decode('&#465;', 0, 'UTF-8')=>'O'				
, html_entity_decode('&#466;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#467;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#468;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#469;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#470;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#471;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#472;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#473;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#474;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#475;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#476;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#477;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#478;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#479;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#480;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#481;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#482;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#483;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#484;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#485;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#486;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#487;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#488;', 0, 'UTF-8')=>'K'	, html_entity_decode('&#489;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#490;', 0, 'UTF-8')=>'Q'	, html_entity_decode('&#491;', 0, 'UTF-8')=>'q'				
, html_entity_decode('&#492;', 0, 'UTF-8')=>'Q'	, html_entity_decode('&#493;', 0, 'UTF-8')=>'q'				
, html_entity_decode('&#496;', 0, 'UTF-8')=>'j'	, html_entity_decode('&#497;', 0, 'UTF-8')=>'?'				
, html_entity_decode('&#498;', 0, 'UTF-8')=>'Dz'	, html_entity_decode('&#499;', 0, 'UTF-8')=>'dz'				
, html_entity_decode('&#500;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#501;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#503;', 0, 'UTF-8')=>'p'				
, html_entity_decode('&#504;', 0, 'UTF-8')=>'N'	, html_entity_decode('&#505;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#506;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#507;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#508;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#509;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#510;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#511;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#512;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#513;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#514;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#515;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#516;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#517;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#518;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#519;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#520;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#521;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#522;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#523;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#524;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#525;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#526;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#527;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#528;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#529;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#530;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#531;', 0, 'UTF-8')=>'r'
, html_entity_decode('&#532;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#533;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#534;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#535;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#536;', 0, 'UTF-8')=>'S'	, html_entity_decode('&#537;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#538;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#539;', 0, 'UTF-8')=>'t'				
, html_entity_decode('&#542;', 0, 'UTF-8')=>'H'	, html_entity_decode('&#543;', 0, 'UTF-8')=>'h'				
, html_entity_decode('&#544;', 0, 'UTF-8')=>'N'					
, html_entity_decode('&#548;', 0, 'UTF-8')=>'Z'	, html_entity_decode('&#549;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#550;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#551;', 0, 'UTF-8')=>'a'				
, html_entity_decode('&#552;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#553;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#554;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#555;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#556;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#557;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#558;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#559;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#560;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#561;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#562;', 0, 'UTF-8')=>'Y'	, html_entity_decode('&#563;', 0, 'UTF-8')=>'y'								
, html_entity_decode('&#580;', 0, 'UTF-8')=>'U'					
, html_entity_decode('&#582;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#583;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#584;', 0, 'UTF-8')=>'J'	, html_entity_decode('&#585;', 0, 'UTF-8')=>'j'				
, html_entity_decode('&#586;', 0, 'UTF-8')=>'Q'	, html_entity_decode('&#587;', 0, 'UTF-8')=>'q'				
, html_entity_decode('&#588;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#589;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#590;', 0, 'UTF-8')=>'Y'	, html_entity_decode('&#591;', 0, 'UTF-8')=>'y'
, html_entity_decode('&#1026;', 0, 'UTF-8')=>'Dz'
, html_entity_decode('&#1025;', 0, 'UTF-8')=>'Jo', html_entity_decode('&#1027;', 0, 'UTF-8')=>'G'				
, html_entity_decode('&#1028;', 0, 'UTF-8')=>'E'	, html_entity_decode('&#1029;', 0, 'UTF-8')=>'S'				
, html_entity_decode('&#1030;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#1031;', 0, 'UTF-8')=>'Ji'			
, html_entity_decode('&#1035;', 0, 'UTF-8')=>'Ch'				
, html_entity_decode('&#1036;', 0, 'UTF-8')=>'K'	, html_entity_decode('&#1037;', 0, 'UTF-8')=>'J'				
, html_entity_decode('&#1038;', 0, 'UTF-8')=>'U'	, html_entity_decode('&#1039;', 0, 'UTF-8')=>'Dz'				
, html_entity_decode('&#1040;', 0, 'UTF-8')=>'A'	, html_entity_decode('&#1041;', 0, 'UTF-8')=>'B'				
, html_entity_decode('&#1042;', 0, 'UTF-8')=>'V'	, html_entity_decode('&#1043;', 0, 'UTF-8')=>'G'				
, html_entity_decode('&#1044;', 0, 'UTF-8')=>'D'	, html_entity_decode('&#1045;', 0, 'UTF-8')=>'E'				
, html_entity_decode('&#1046;', 0, 'UTF-8')=>'Zh'	, html_entity_decode('&#1047;', 0, 'UTF-8')=>'Z'				
, html_entity_decode('&#1048;', 0, 'UTF-8')=>'I'	, html_entity_decode('&#1049;', 0, 'UTF-8')=>'J'				
, html_entity_decode('&#1050;', 0, 'UTF-8')=>'K'	, html_entity_decode('&#1051;', 0, 'UTF-8')=>'L'				
, html_entity_decode('&#1052;', 0, 'UTF-8')=>'M'	, html_entity_decode('&#1053;', 0, 'UTF-8')=>'N'				
, html_entity_decode('&#1054;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#1055;', 0, 'UTF-8')=>'P'				
, html_entity_decode('&#1056;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#1057;', 0, 'UTF-8')=>'S'				
, html_entity_decode('&#1058;', 0, 'UTF-8')=>'T'	, html_entity_decode('&#1059;', 0, 'UTF-8')=>'U'				
, html_entity_decode('&#1060;', 0, 'UTF-8')=>'F'	, html_entity_decode('&#1061;', 0, 'UTF-8')=>'H'				
, html_entity_decode('&#1062;', 0, 'UTF-8')=>'C'	, html_entity_decode('&#1063;', 0, 'UTF-8')=>'Ch'				
, html_entity_decode('&#1064;', 0, 'UTF-8')=>'Sh'	, html_entity_decode('&#1065;', 0, 'UTF-8')=>'Sh'				
, html_entity_decode('&#1066;', 0, 'UTF-8')=>'"'	, html_entity_decode('&#1067;', 0, 'UTF-8')=>'Y'				
, html_entity_decode('&#1068;', 0, 'UTF-8')=>"'"	, html_entity_decode('&#1069;', 0, 'UTF-8')=>'Je'				
, html_entity_decode('&#1070;', 0, 'UTF-8')=>'Ju'	, html_entity_decode('&#1071;', 0, 'UTF-8')=>'Ja'				
, html_entity_decode('&#1072;', 0, 'UTF-8')=>'a'	, html_entity_decode('&#1073;', 0, 'UTF-8')=>'b'
, html_entity_decode('&#1074;', 0, 'UTF-8')=>'v'	, html_entity_decode('&#1075;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#1076;', 0, 'UTF-8')=>'d'	, html_entity_decode('&#1077;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#1078;', 0, 'UTF-8')=>'zh'	, html_entity_decode('&#1079;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#1080;', 0, 'UTF-8')=>'i'	, html_entity_decode('&#1081;', 0, 'UTF-8')=>'j'				
, html_entity_decode('&#1082;', 0, 'UTF-8')=>'k'	, html_entity_decode('&#1083;', 0, 'UTF-8')=>'l'				
, html_entity_decode('&#1084;', 0, 'UTF-8')=>'m'	, html_entity_decode('&#1085;', 0, 'UTF-8')=>'n'
, html_entity_decode('&#1086;', 0, 'UTF-8')=>'o'	, html_entity_decode('&#1087;', 0, 'UTF-8')=>'p'				
, html_entity_decode('&#1088;', 0, 'UTF-8')=>'r'	, html_entity_decode('&#1089;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#1090;', 0, 'UTF-8')=>'t'	, html_entity_decode('&#1091;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#1092;', 0, 'UTF-8')=>'f'	, html_entity_decode('&#1093;', 0, 'UTF-8')=>'h'				
, html_entity_decode('&#1094;', 0, 'UTF-8')=>'c'	, html_entity_decode('&#1095;', 0, 'UTF-8')=>'ch'				
, html_entity_decode('&#1096;', 0, 'UTF-8')=>'sh', html_entity_decode('&#1097;', 0, 'UTF-8')=>'sh'				
, html_entity_decode('&#1098;', 0, 'UTF-8')=>'``'	, html_entity_decode('&#1099;', 0, 'UTF-8')=>'y'				
, html_entity_decode('&#1100;', 0, 'UTF-8')=>"`"	, html_entity_decode('&#1101;', 0, 'UTF-8')=>'je'				
, html_entity_decode('&#1102;', 0, 'UTF-8')=>'ju', html_entity_decode('&#1103;', 0, 'UTF-8')=>'ja'				
, html_entity_decode('&#1104;', 0, 'UTF-8')=>'e'	, html_entity_decode('&#1105;', 0, 'UTF-8')=>'jo'				
, html_entity_decode('&#1106;', 0, 'UTF-8')=>'dz'	, html_entity_decode('&#1107;', 0, 'UTF-8')=>'g'				
, html_entity_decode('&#1108;', 0, 'UTF-8')=>'e'	, html_entity_decode('&#1109;', 0, 'UTF-8')=>'s'				
, html_entity_decode('&#1110;', 0, 'UTF-8')=>'i'	, html_entity_decode('&#1111;', 0, 'UTF-8')=>'ji'				
, html_entity_decode('&#1112;', 0, 'UTF-8')=>'j'	, html_entity_decode('&#1033;', 0, 'UTF-8')=>'Lj'
, html_entity_decode('&#1113;', 0, 'UTF-8')=>'lj'       , html_entity_decode('&#1034;', 0, 'UTF-8')=>'Nj'    
, html_entity_decode('&#1114;', 0, 'UTF-8')=>'nj'	, html_entity_decode('&#1115;', 0, 'UTF-8')=>'ch'				
, html_entity_decode('&#1116;', 0, 'UTF-8')=>'k'	, html_entity_decode('&#1117;', 0, 'UTF-8')=>'ij'				
, html_entity_decode('&#1118;', 0, 'UTF-8')=>'u'	, html_entity_decode('&#1119;', 0, 'UTF-8')=>'dz'								
, html_entity_decode('&#1140;', 0, 'UTF-8')=>'V'	, html_entity_decode('&#1141;', 0, 'UTF-8')=>'v'				
, html_entity_decode('&#1142;', 0, 'UTF-8')=>'V'	, html_entity_decode('&#1143;', 0, 'UTF-8')=>'v'				
, html_entity_decode('&#1144;', 0, 'UTF-8')=>'O'	, html_entity_decode('&#1145;', 0, 'UTF-8')=>'o'				
, html_entity_decode('&#1162;', 0, 'UTF-8')=>'J'	, html_entity_decode('&#1163;', 0, 'UTF-8')=>'J'				
, html_entity_decode('&#1166;', 0, 'UTF-8')=>'R'	, html_entity_decode('&#1167;', 0, 'UTF-8')=>'r'				
, html_entity_decode('&#1168;', 0, 'UTF-8')=>'G'	, html_entity_decode('&#1169;', 0, 'UTF-8')=>'g'
, html_entity_decode('&#1170;', 0, 'UTF-8')=>'F'	, html_entity_decode('&#1171;', 0, 'UTF-8')=>'f'				
, html_entity_decode('&#1174;', 0, 'UTF-8')=>'Zh', html_entity_decode('&#1175;', 0, 'UTF-8')=>'zh'				
, html_entity_decode('&#1176;', 0, 'UTF-8')=>'Z', html_entity_decode('&#1177;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#1178;', 0, 'UTF-8')=>'K', html_entity_decode('&#1179;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#1180;', 0, 'UTF-8')=>'K', html_entity_decode('&#1181;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#1182;', 0, 'UTF-8')=>'K', html_entity_decode('&#1183;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#1184;', 0, 'UTF-8')=>'K', html_entity_decode('&#1185;', 0, 'UTF-8')=>'k'				
, html_entity_decode('&#1186;', 0, 'UTF-8')=>'N', html_entity_decode('&#1187;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#1188;', 0, 'UTF-8')=>'N', html_entity_decode('&#1189;', 0, 'UTF-8')=>'n'				
, html_entity_decode('&#1190;', 0, 'UTF-8')=>'N'								
, html_entity_decode('&#1244;', 0, 'UTF-8')=>'Zh', html_entity_decode('&#1245;', 0, 'UTF-8')=>'zh'				
, html_entity_decode('&#1246;', 0, 'UTF-8')=>'z', html_entity_decode('&#1247;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#1248;', 0, 'UTF-8')=>'z', html_entity_decode('&#1249;', 0, 'UTF-8')=>'z'				
, html_entity_decode('&#1250;', 0, 'UTF-8')=>'J', html_entity_decode('&#1251;', 0, 'UTF-8')=>'j'				
, html_entity_decode('&#1252;', 0, 'UTF-8')=>'I', html_entity_decode('&#1253;', 0, 'UTF-8')=>'i'				
, html_entity_decode('&#1254;', 0, 'UTF-8')=>'O', html_entity_decode('&#1255;', 0, 'UTF-8')=>'O'				
, html_entity_decode('&#1256;', 0, 'UTF-8')=>'O', html_entity_decode('&#1257;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#1258;', 0, 'UTF-8')=>'E', html_entity_decode('&#1259;', 0, 'UTF-8')=>'e'				
, html_entity_decode('&#1260;', 0, 'UTF-8')=>'Je', html_entity_decode('&#1261;', 0, 'UTF-8')=>'je'				
, html_entity_decode('&#1262;', 0, 'UTF-8')=>'u', html_entity_decode('&#1263;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#1264;', 0, 'UTF-8')=>'U', html_entity_decode('&#1265;', 0, 'UTF-8')=>'u'
, html_entity_decode('&#1266;', 0, 'UTF-8')=>'U', html_entity_decode('&#1267;', 0, 'UTF-8')=>'u'				
, html_entity_decode('&#1268;', 0, 'UTF-8')=>'Ch', html_entity_decode('&#1269;', 0, 'UTF-8')=>'ch');

return strtr($InStr, $trans);
}

echo '<head><link rel="stylesheet" type="text/css" href="css/mainstyle.css"><head><body>';  
echo 'ttttttttttttt';
$F_PostAddress=1;
$PostAddress=$F_PostAddress?"'*'":"NULL"; 
echo $PostAddress;
$F_PostAddress='';
$PostAddress=$F_PostAddress?"'*'":"NULL";
echo $PostAddress;
//$get_test_name=mysql_query("SELECT * FROM `P1` WHERE PDate_Upd<'2013-02-21'");
/*$get_test_name=mysql_query("SELECT * FROM `P1`
WHERE (`PNameL` LIKE '%".html_entity_decode('&#380;', 0, 'UTF-8')."%'  and PNameL_code NOT LIKE '%z%')
OR (`PNameSh` LIKE '%".html_entity_decode('&#380;', 0, 'UTF-8')."%' AND PNameSh_code NOT LIKE '%z%')"); */
// "<table border=\"0\" align='center' border='1' class=\"lite\"><tr><th>Original</th><th>New translit</th><th>Old translit</th>";
/*
$get_test_name=mysql_query("SELECT *
FROM `P1`
WHERE (
`PNameSh_code` LIKE '%Z%'
OR `PNameL_code` LIKE '%Z%'
)
AND PDate_Upd < '2014-01-15'");
while ($test_name=mysql_fetch_assoc($get_test_name))
    
    {
    $ch_rows++;
    mysql_query('UPDATE P1 SET PNameSh_code="'.(translit($test_name['PNameSh'])).'", PNameL_code="'.(translit($test_name['PNameL'])).'", PDate_Upd=NOW()  WHERE PID="'.$test_name['PID'].'"');
  //  echo 'UPDATE P1 SET PNameSh_code="'.(translit($test_name['PNameSh'])).'", PNameL_code="'.(translit($test_name['PNameL'])).'", PDate_Upd=NOW()  WHERE PID="'.$test_name['PID'].'"<br>';
//echo "<tr><td>".$test_name['PNameSh'].' '.$test_name['PNameL'].'</td><td>'.translit($test_name['PNameSh'].' '.$test_name['PNameL']).'</td><td>'.$test_name['PNameSh_code'].' '.$test_name['PNameL_code'].'</td></tr>';
}
echo "Changed $ch_rows";
*/
//echo "</table></body>"; 
 
        /*
           $get_rows_for_sum=mysql_query("SELECT  a.`ID`,a.`DAMakID`, a.`DAMakActID` , a.`Mak` , a.`UAID_tmp` , a.`PartID` , a.`DAMakPayDate_From` , a.`DAMakPayDate_Till` ,
							SUM(a.`DAMakYearlyPremium`) as DAMakYearlyPremium  , SUM(a.`DAMakMonthlyPremium`) as DAMakMonthlyPremium  , a.`DAMakInsSum` , a.`PremiumCurrCODE` , SUM(a.`DAMakPaySum`) as DAMakPaySum, a.`DAMakPayDate` , a.`PaySumCurrCODE` ,
							a.`DAMakTerm` , a.`DAMakZart` , a.`DAMakInsYear` , a.`DAMakInsPeriod` , a.`DAMakPayNB` , SUM(a.`DAMakBase`) as DAMakBase , a.`BaseCurrCODE` , a.`DAMakProvPrc` , 
							a.`DAMakProvPayPrc` , a.`DAMakProvSumBeg` , a.`DAMakKursCB` , SUM(a.`DAMakProvSumEnd`) as DAMakProvSumEnd , a.`ProvSumEndCurrCODE`, a.`PremiumTypeID`, a.`PremiumTypeID_New` ,a.`ABRM`, a.`X`, a.`DAMakProvALL`, a.NUMMER, a.MONTH, a.INFO, COUNT(*) as cou
                                                        FROM DAMakAct3_U3_Advice1 as a, DAMakAct1 as b WHERE a.DAMakActID=b.DAMakActID AND a.Mak=b.Mak AND b.CompCODE='TAB' AND a.Mak=21  AND a.DAMakActID > '1232' AND (a.UAID_tmp>=26771 OR (a.DAMakZart!=1 AND a.UAID_tmp!=0 AND (a.DAMakInsPeriod/(12/a.DAMakZart))!=1) ) AND Z IS NULL GROUP BY a.Mak, a.DAMakActID, a.UAID_tmp, a.PartID ");
           while ( $rows_for_sum=mysql_fetch_assoc( $get_rows_for_sum))
               {
               if ($rows_for_sum['cou']>1)
               {
                mysql_query("DELETE FROM `DAMakAct3_U3_Advice1` WHERE Mak=21 AND DAMakActID='".$rows_for_sum['DAMakActID']."' AND UAID_tmp='".$rows_for_sum['UAID_tmp']."' ");   
                mysql_query("INSERT INTO `DAMakAct3_U3_Advice1` ( `ID`,`DAMakID`, `DAMakActID` , `Mak` , `UAID_tmp` , `PartID` , `DAMakPayDate_From` , `DAMakPayDate_Till` ,
							`DAMakYearlyPremium` , `DAMakMonthlyPremium` , `DAMakInsSum` , `PremiumCurrCODE` , `DAMakPaySum` , `DAMakPayDate` , `PaySumCurrCODE` ,
							`DAMakTerm` , `DAMakZart` , `DAMakInsYear` , `DAMakInsPeriod` , `DAMakPayNB` , `DAMakBase` , `BaseCurrCODE` , `DAMakProvPrc` ,
							`DAMakProvPayPrc` , `DAMakProvSumBeg` , `DAMakKursCB` , `DAMakProvSumEnd` , `ProvSumEndCurrCODE`, `PremiumTypeID`, `PremiumTypeID_New` ,`ABRM`, `X`, `DAMakProvALL`, NUMMER, MONTH, INFO  )
							VALUES ('".$rows_for_sum['ID']."', '', '".$rows_for_sum['DAMakActID']."' , '".$rows_for_sum['Mak']."' , '".$rows_for_sum['UAID_tmp']."' , '".$rows_for_sum['PartID']."' , '".$rows_for_sum['DAMakPayDate_From']."' , '".$rows_for_sum['DAMakPayDate_Till']."' , '".$rows_for_sum['DAMakYearlyPremium']."' ,
							'".$rows_for_sum['DAMakMonthlyPremium']."' , '".$rows_for_sum['DAMakInsSum']."' , '".$rows_for_sum['PremiumCurrCODE']."' , '".$rows_for_sum['DAMakPaySum']."' , '".$rows_for_sum['DAMakPayDate']."' , '".$rows_for_sum['PaySumCurrCODE']."' , '".$rows_for_sum['DAMakTerm']."' , '".$rows_for_sum['DAMakZart']."' ,
							'".$rows_for_sum['DAMakInsYear']."' , '".$rows_for_sum['DAMakInsPeriod']."' , '".$rows_for_sum['DAMakPayNB']."' , '".$rows_for_sum['DAMakBase']."' , '".$rows_for_sum['BaseCurrCODE']."' , '".$rows_for_sum['DAMakProvPrc']."' , '".$rows_for_sum['DAMakProvPayPrc']."' , '".$rows_for_sum['DAMakProvSumBeg']."' ,
							'".$rows_for_sum['DAMakKursCB']."' , '".$rows_for_sum['DAMakProvSumEnd']."' , '".$rows_for_sum['ProvSumEndCurrCODE']."', '".$rows_for_sum['PremiumTypeID']."', '".$rows_for_sum['PremiumTypeID']."', '', '*', '".$rows_for_sum['DAMakProvALL']."', '".$rows_for_sum['NUMMER']."', '".$rows_for_sum['MONTH']."', '".$rows_for_sum['INFO']."')");
     echo "INSERT INTO `DAMakAct3_U3_Advice1` ( `ID`,`DAMakID`, `DAMakActID` , `Mak` , `UAID_tmp` , `PartID` , `DAMakPayDate_From` , `DAMakPayDate_Till` ,
							`DAMakYearlyPremium` , `DAMakMonthlyPremium` , `DAMakInsSum` , `PremiumCurrCODE` , `DAMakPaySum` , `DAMakPayDate` , `PaySumCurrCODE` ,
							`DAMakTerm` , `DAMakZart` , `DAMakInsYear` , `DAMakInsPeriod` , `DAMakPayNB` , `DAMakBase` , `BaseCurrCODE` , `DAMakProvPrc` ,
							`DAMakProvPayPrc` , `DAMakProvSumBeg` , `DAMakKursCB` , `DAMakProvSumEnd` , `ProvSumEndCurrCODE`, `PremiumTypeID`, `PremiumTypeID_New` ,`ABRM`, `X`, `DAMakProvALL`, NUMMER, MONTH, INFO  )
							VALUES ('".$rows_for_sum['ID']."', '', '".$rows_for_sum['DAMakActID']."' , '".$rows_for_sum['Mak']."' , '".$rows_for_sum['UAID_tmp']."' , '".$rows_for_sum['PartID']."' , '".$rows_for_sum['DAMakPayDate_From']."' , '".$rows_for_sum['DAMakPayDate_Till']."' , '".$rows_for_sum['DAMakYearlyPremium']."' ,
							'".$rows_for_sum['DAMakMonthlyPremium']."' , '".$rows_for_sum['DAMakInsSum']."' , '".$rows_for_sum['PremiumCurrCODE']."' , '".$rows_for_sum['DAMakPaySum']."' , '".$rows_for_sum['DAMakPayDate']."' , '".$rows_for_sum['PaySumCurrCODE']."' , '".$rows_for_sum['DAMakTerm']."' , '".$rows_for_sum['DAMakZart']."' ,
							'".$rows_for_sum['DAMakInsYear']."' , '".$rows_for_sum['DAMakInsPeriod']."' , '".$rows_for_sum['DAMakPayNB']."' , '".$rows_for_sum['DAMakBase']."' , '".$rows_for_sum['BaseCurrCODE']."' , '".$rows_for_sum['DAMakProvPrc']."' , '".$rows_for_sum['DAMakProvPayPrc']."' , '".$rows_for_sum['DAMakProvSumBeg']."' ,
							'".$rows_for_sum['DAMakKursCB']."' , '".$rows_for_sum['DAMakProvSumEnd']."' , '".$rows_for_sum['ProvSumEndCurrCODE']."', '".$rows_for_sum['PremiumTypeID']."', '".$rows_for_sum['PremiumTypeID']."', '', '*', '".$rows_for_sum['DAMakProvALL']."', '".$rows_for_sum['NUMMER']."', '".$rows_for_sum['MONTH']."', '".$rows_for_sum['INFO']."')";
				
                  
               }
               
               }
  
          */
/*
function get_iso7064($num1,$num2,$countrycode)
{
  if (strlen($num1)!=7) echo "number 1 is not ok!<br>";
  if (strlen($num2)!=10) echo "number 2 is not ok!<br>";
  
  if ($countrycode=='HR') $countrycode=1727;
  else echo "country code is not ok!<br>";
 $get_module= mysql_query("Select ".$num1.$num2.$countrycode."00%97 as module");
 $module = mysql_fetch_assoc($get_module);
 $mod97  = $module['module'];
 $result=(98-$mod97);
 
 $get_check= mysql_query("Select ".$num1.$num2.$countrycode.$result."%97 as che");
 $check = mysql_fetch_assoc($get_check);
 $checkit  = $check['che'];
  if ($checkit==1)  {
      if ($result<10) $result=$result.'0';
      return $result; }
  else { echo $result." looks like error!";  return false; }
}
 * */

 //echo get_iso7064(2360000,1500400097, 'HR');
 
 /*
 $bt = mysql_query("SELECT * FROM P3_Account WHERE  BLZ > 0  AND Domestic_account > 0  AND  Mak = 26");
 while ($bt_show = mysql_fetch_assoc($bt))
    {
        $mnr      = $bt_show['PID'];        
        $account  = $bt_show['Domestic_account'];
        $BLZ1     = $bt_show['BLZ'];
        $BLZ      = substr($BLZ1,0,7);
        $countrycode = '1727';

    $get_module = mysql_query("Select ".$BLZ.$account.$countrycode."00"."%97 as module");
    $module = mysql_fetch_assoc($get_module);
    $mod97  = $module['module'];
    $kk     = (98-$mod97);
    if (strlen($kk)==1) { $kk = '0'.$kk; }
    
    $iban     = 'HR'.$kk.$BLZ.$account;
   echo $BLZ."<br>";
   echo $account."<br>";
   
     
    if (strlen($BLZ)==7 && strlen($account)==10)
    {
    mysql_query("UPDATE P3_Account p
               SET IBAN = '$iban'
               WHERE p.MAK=26 AND  p.PID = $mnr ");
   
    }

    }

$bt = mysql_query("SELECT * FROM iAdminUnit WHERE  AdminUnitKtoNr > 0   AND  Mak = 26");
 do 
    {
        $au       = $bt_show['AdminUnitID'];        
        
        $BLZ      = substr($bt_show['AdminUnitKtoNr'],0,7);
        $account  = substr($bt_show['AdminUnitKtoNr'],8,10);        
        
        $countrycode = '1727';

    $get_module = mysql_query("Select ".$BLZ.$account.$countrycode."00"."%97 as module");
    $module = mysql_fetch_assoc($get_module);
    $mod97  = $module['module'];
    $kk     = (98-$mod97);

     if (strlen($kk)==1) 
        { 
            $kk = '0'.$kk;             
        }
    
    $iban   = 'HR'.$kk.$BLZ.$account;

    if (strlen($BLZ)==7 && strlen($account)==10)
    {
        echo "UPDATE iAdminUnit i
                         SET i.AdminUnitKtoNr = '$iban'
                         WHERE i.Mak=26 AND i.AdminUnitID='$au'";
        
    $upd =  mysql_query("UPDATE iAdminUnit i
                         SET i.AdminUnitKtoNr = '$iban'
                         WHERE i.Mak=26 AND i.AdminUnitID='$au' ");
    $upd_s = mysql_fetch_array($upd);
    }

    }
    while ($bt_show = mysql_fetch_array($bt));
    
    echo "done";
  */
    /*
 $get_test=mysql_query("
SELECT  SUBSTR( EREIG , -1 ) as index_ereig
FROM _A2_VAR_21
WHERE `ANR` = '25518'
AND NUMMER = '49299'
AND Mak =21
AND (
EREIG LIKE 'Xp%'
OR EREIG LIKE 'XP%'
)");
 $mytest=mysql_fetch_assoc($get_test);
 echo $mytest['EREIG'].'<br>'.$mytest['index_ereig'];

*/
/*
$dbh = new PDO('mysql:host=127.0.0.1;dbname=zzz', 'secured', '467890');
$stmt = $dbh->prepare("SELECT * FROM P1 where PNameSh LIKE ? LIMIT 3");
if ($stmt->execute(array( 'Fir%'))) {
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
}
  */
/*
$tarif_id=921;
$age=20;

function show_tarifs($tarif_id,$age)
{
  $get_tarif=mysql_query("SELECT *
FROM `iCalcTarif`
WHERE `TarifID` =921
AND `Age` =20
LIMIT 0 , 30");  
$tarif=mysql_fetch_assoc($get_tarif);  
for ($i=5; $i<=45;$i++)
{
    echo $i;
if ($tarif['T'.$i]!=0) $tarif_output['T'.$i]=$tarif['T'.$i];       
}
return $tarif_output;
}
$final_array=show_tarifs($tarif_id,$age);
 echo "<select>";
 foreach ($final_array as $key => $value)
     {
    echo "<option value='".$value."'>".$key."</option>";
     
     }
      echo "</select>";
 
setlocale(LC_MONETARY, 'it_IT');
 echo date_format(date_create('2013-10-14'),'d.m.Y');
 $client_inssum=explode(' ','20555 EUR');
 print_r( $client_inssum);
 //$client_inssum[0]= money_format('%.2n', $client_inssum[0]);
 print(money_format("%!n", $client_inssum[0]));
 print($client_inssum[0].' '.$client_inssum[1]);
 
 
 $prepare_profit_line=str_pad('832,00 EUR', strlen('3.832,00 EUR'), " ", STR_PAD_LEFT);
 echo strlen('3.832,00 EUR');
echo "<br>'".$prepare_profit_line."'";

echo '<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript">
jQuery(function($){
   $("#mdate").mask("99.99.9999",{placeholder:"_"});
});
</script>
<input type="text" id="mdate" name="my_date">';
 */
//echo date_create_from_format('Y-m-d',1998-12-01);
/*
function send_wvp_mail($sender,$address, $subject, $message_text )
{

//define the subject of the email
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$got_sender['MakDesc']='WVP admin';

//define the headers we want passed. Note that they are separated with \r\n
$headers = "Reply-To: Administration of ".$got_sender['MakDesc']." <".$sender.">\r\n";
$headers .= "Return-Path: Administration of ".$got_sender['MakDesc']." <".$sender.">\r\n";
$headers .= "From: Administration of ".$got_sender['MakDesc']." <".$sender.">\r\n";
$headers .= "Organization: ".$got_sender['MakDesc']."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed;\n boundary=\"{$mime_boundary}\"";
$headers .= "\r\nX-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
//add boundary string and mime type specification
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$coworker_doc_result=mysql_query("SELECT * FROM M2_Agreement WHERE PID ='1001' AND Mak='24' AND AgreemDate_from='2015-05-08'");
  if (mysql_num_rows($coworker_doc_result)>0)
  {
	$dbresult=mysql_fetch_assoc($coworker_doc_result);
	$attachment = chunk_split(base64_encode($dbresult['AgreemFile']));
  }

//$attachment = chunk_split(base64_encode(file_get_contents('attachment.zip')));
//define the body of the message.
  
$name="attachment.pdf";
$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message_text . "\n\n"; 
$message .= "--{$mime_boundary}\n";
$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
"Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . $attachment . "\n\n";
$message .= "--{$mime_boundary}\n";
//send the email
$mail_sent = @mail( $address, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";     
}
//send_wvp_mail('mory@bigmir.net','mory@bigmir.net', 'Test2 mail', '<h2>Hello World!</h2><p>This is something with <b>HTML</b> formatting.</p> ' )


$newdate_array=getdate(strtotime('31.08.2015')); 
$DAMakPayDate_Till=$newdate_array['year']."-".$newdate_array['mon']."-".$newdate_array['mday'];
print($DAMakPayDate_Till);
*/
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
echo 'test';
require 'resources/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.wvp.at';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'localhost';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('Ivan@wvp.at', 'Mailer');
$mail->addAddress('mory@bigmir.net', 'Morion');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('Ivan@wvp.at', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('Show_main_minor.swf' ,'mytest.swf');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
*/
function IsPidRestricted($pid,$mak,$module)
{
	$get_restricted_user=mysql_query("SELECT * FROM P11_Restricts WHERE PID='".$pid."' AND Mak='".$mak."' AND ModulID='".$module."'");
	if (mysql_num_rows($get_restricted_user)!=0) return 1;
	else return 0;
}
function detect_aktivity($mnr, $mak)
{
	if ($mak=='verant') $vstv="";
	else $vstv="Mak='".$mak."' AND";
	$get1_data_check=mysql_query("SELECT * FROM M2_Activity WHERE ".$vstv." MNR='".$mnr."' AND LastEventDate>ADDDATE(CURDATE(), INTERVAL -6 MONTH)");
	$count1=mysql_num_rows($get1_data_check);
	$get2_data_check=mysql_query("SELECT * FROM M2_Activity1_CompActivity  WHERE ".$vstv." MNR='".$mnr."' AND LastUAID_tmpDate>ADDDATE(CURDATE(), INTERVAL -6 MONTH)");
	$count2=mysql_num_rows($get2_data_check);
	if ($count1>0 or $count2>0 ) return 1;
	else return 0;
}
function isVerant($betreuer, $mak)
{
	$get_btreuer=mysql_query("SELECT * FROM U1 as a, _M1_STAMM as b WHERE b.MNR=a.PID AND b.Mak='".$mak."' AND b.Stf>=4 AND a.RoleID='1' AND a.GroupID='14' AND a.PID='".$betreuer."'");
	if (mysql_num_rows($get_btreuer)>0) return $betreuer;
	else return '';
}

function define_betrauer2($mak, $mnr)
{
	$changable_mnr=$mnr;
	$get_next1=mysql_query("SELECT b.login, a.STF, b.GroupID FROM _M1_STAMM as a , U1 as b WHERE a.MNR='".$mnr."' and Mak='".$mak."' and b.PID=a.MNR ORDER BY b.GroupID DESC");
	$res1=mysql_fetch_assoc($get_next1);
	$aktiv=detect_aktivity($mnr, $mak);
	$restrict=IsPidRestricted($mnr,$mak,3); //Check if it is in black list
	while ((($res1['STF']=='0' or $res1['STF']=='X') or $res1['login']=='' or $restrict=='1' or $aktiv=='0' or $changable_mnr==$mnr))
	{
		if ($res1['GroupID']==14 and $res1['STF']>='4' and $restrict!='1')  {return $mnr; break;}
		$get_next=mysql_query("SELECT LNR FROM _M1_STAMM WHERE MNR='".$mnr."' and Mak='".$mak."'");
		$res=mysql_fetch_assoc($get_next);
		$mnr=$res['LNR'];
		$restrict=IsPidRestricted($mnr,$mak,3);
		$aktiv=detect_aktivity($mnr, $mak);
		$get_next1=mysql_query("SELECT b.login, a.STF, b.GroupID FROM _M1_STAMM as a , U1 as b WHERE a.MNR='".$mnr."' and Mak='".$mak."' and b.PID=a.MNR ORDER BY b.GroupID DESC");
		$res1=mysql_fetch_assoc($get_next1);
		if ($mnr=='1000' or $mnr=='' or $mnr=='0') break;
		// echo $mnr, '-',$res1['STF'],'-',$aktiv,'-',$res1['login'],'-', $res1['GroupID'],'<br>';

	}
	if 	($mnr=='' or $mnr=='0') $mnr=1000;
	//if (($res1['STF']=='0' or $res1['STF']=='X') or $res1['login']=='' or $aktiv=='0' or $changable_mnr==$mnr or $restrict=='1') return '';
	//else return $mnr;
	return $mnr;
}

//ini_set('default_charset','utf8mb4');
//mysql_set_charset('utf8mb4');
echo '<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<form><input name="bla1" id="blabla1" type="text">
<input name="bla2" id="blabla2" type="text">
<input name="bla3" id="blabla3" type="text">
<div id="xy"></div>
<input type="submit"  name="ok">
</form>
<script language="JavaScript" type="text/javascript">
$( "#blabla1" ).on( "change", function() {
 $("#xy").append("<div id=\'test1\'> SUPER1</div>");
});
$( "#blabla2" ).on( "change", function() {
 $("#xy").append("<div id=\'test2\'> SUPER2</div>");
});
$( "#blabla3" ).on( "change", function() {
 $("#xy").append("<div id=\'test3\'> SUPER3</div>");
});
$("form").submit(function(e){
e.preventDefault();
console.log("test");
console.log($("#test1").text());
console.log($("#test2").text());
console.log($("#test3").text());
});
</script>
';
?>
