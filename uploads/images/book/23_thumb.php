<?php
ini_set("display_errors","Off");
include "session.php";
define("SBCURRENCY","$");
ob_start();
// YOU NEED TO CHANGE THE CONTENTS OF THE values of variables given in single quotes

//CONFIGURATION SECTION STARTS ///

$servername='localhost' ;  // Replace this 'localhost' with your server name
$siteurl="http://www.tycoonsworld.com";
if($_SERVER['HTTP_HOST']=="localhost")
{
	$database_username='root'; // Replace this  with your username
	$database_password='';  // Replace this  with your password
	$database_name='tycoonsw_b2b';  // Replace this 'db' with your database name
}
elseif($_SERVER['HTTP_HOST']=="192.168.1.1:8080")
{
	$database_username='webmyne'; // Replace this  with your username
	$database_password='webmyne';  // Replace this  with your password
	$database_name='tycoonsw_b2b';  // Replace this 'db' with your database name
	$siteurl="http://192.168.1.1:8080/projects/tycoons";
}
else
{
	$database_username='tycoonsw_webmyne'; // Replace this  with your username
	$database_password='webmyne';  // Replace this  with your password
	$database_name='tycoonsw_b2bdev';  // Replace this 'db' with your database name
	$siteurl="http://www.tycoonsworld.com";
}



// CONFIGURATION SECTION ENDS ////


mysql_connect($servername,$database_username,$database_password);
mysql_select_db($database_name);


function checkUserLoggIn($username)
{
	$expire_time = time() - 30; // idle for more than 30 seconds  ? //
	if(mysql_num_rows(mysql_query("SELECT username FROM users WHERE last_ping >= $expire_time AND username='".mysql_real_escape_string($username)."' AND is_online<>'0'")) == 0)
		return false;
	else
		return true;	
}
/*
print_r($_SESSION);

echo "<br /><br />";

print_r($_COOKIE);
*/
//echo "--".md5($_SESSION['b2b_passw']);

if (isset($_SESSION["b2b_userid"]) && isset($_SESSION['b2b_username']) && isset($_SESSION['b2b_user_email']) && isset($_SESSION['b2b_passw']))
{
	$email=$_SESSION['b2b_user_email'];
	$from=$_SESSION['b2b_username'];
	$pwd=$_SESSION['b2b_passw'];
		
	"SELECT email FROM users WHERE email='".mysql_real_escape_string($email)."'";	
	if(mysql_num_rows(mysql_query("SELECT email FROM users WHERE email='".mysql_real_escape_string($email)."'")) == 0)
	 {
		  $query = @mysql_query("SELECT username FROM users WHERE username='".mysql_real_escape_string($from)."'");
		  if(@mysql_num_rows($query) == 0)
		  {
		  	 $sql="INSERT INTO users (username, password, email) VALUES ('".mysql_real_escape_string($from)."', '".md5($pwd)."', '".mysql_real_escape_string($email)."')";
			 $query = @mysql_query($sql);
			 mysql_query("COMMIT");
		  }
	 } 
 ?>
<script type="text/javascript" src="script/JSSerializer.js"></script> 
<script LANGUAGE="JavaScript1.2">

/*
Floating image II (up down)- Bruce Anderson (http://appletlib.tripod.com)
Submitted to Dynamicdrive.com to feature script in archive
Modified by DD for script to function in NS6
For 100's of FREE DHTML scripts, Visit http://www.dynamicdrive.com
*/

var XX=20; // X position of the scrolling objects
var xstep=1;
var delay_time=60;

//Begin of the unchangable area, please do not modify this area
var YY=0;  
var ch=0;
var oh=0;
var yon=0;

var ns4=document.layers?1:0
var ie=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0

if(ie){
YY=document.body.clientHeight;
point1.style.top=YY;
}
else if (ns4){
YY=window.innerHeight;
document.point1.pageY=YY;
document.point1.visibility="hidden";
}
else if (ns6){
YY=window.innerHeight
document.getElementById('point1').style.top=YY
}


function reloc1()
{

if(yon==0){YY=YY-xstep;}
else{YY=YY+xstep;}
if (ie){
ch=document.body.clientHeight;
oh=point1.offsetHeight;
}
else if (ns4){
ch=window.innerHeight;
oh=document.point1.clip.height;
}
else if (ns6){
ch=window.innerHeight
oh=document.getElementById("point1").offsetHeight
}
		
if(YY<0){yon=1;YY=0;}
if(YY>=(ch-oh)){yon=0;YY=(ch-oh);}
if(ie){
point1.style.left=XX;
point1.style.top=YY+document.body.scrollTop;
}
else if (ns4){
document.point1.pageX=XX;
document.point1.pageY=YY+window.pageYOffset;
}
else if (ns6){
document.getElementById("point1").style.left=XX
document.getElementById("point1").style.top=YY+window.pageYOffset
}

}

function onad()
{
if(ns4)
document.point1.visibility="visible";
loopfunc();
}
function loopfunc()
{
reloc1();
setTimeout('loopfunc()',delay_time);
}

//if (ie||ns4||ns6)
//window.onload=onad

</script>
<script type="text/javascript">
var popWin = null;    // use this when referring to pop-up window
var oneTimeWinName = "oneTimePop";
var PopupWin="PopupWin";
var serializer = new JSSerializer();
////////////////////////////////////////////////////////////////////////////////////
// Set and get the cookie values
////////////////////////////////////////////////////////////////////////////////////    
function setCookie(c_name,value,expiredays) {
var exdate=new Date();
exdate.setDate(exdate.getDate()+expiredays);
document.cookie=c_name+ "=" +escape(value);
} 

function getCookie(c_name) {
if (document.cookie.length>0) {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1) { 
	c_start=c_start + c_name.length+1 
	c_end=document.cookie.indexOf(";",c_start)
	if (c_end==-1) c_end=document.cookie.length
	return unescape(document.cookie.substring(c_start,c_end))
  } 
}
return "";
}

retrieveWindowObject = function() 
{
	var serializedXML = getCookie(PopupWin);
	if(serializedXML) {
	var obj = serializer.deserialize(serializedXML);  
	return obj;          
	} else {
	return null;
	}
}

function chat_login()
{
	var val="";
	var force="";
	
	if(arguments.length>=0)
		val=arguments[0];

//	alert(val);	
	if(val=="undefined" || val==null)	
		val="";

	if(arguments.length>=1)
		force=arguments[1];
//	alert(force);
		
	//	setCookie(PopupWin,"");
	
    var popcookies = getCookie(PopupWin);
//	alert(popcookies);
	if (popcookies == "" || force=="1")
	{ // cookie not found
	//index.php?chat="+val
//		alert("<?=$siteurl?>");
		// +"&PHPSESSID=<?=$_REQUEST['PHPSESSID']?>"
		popWin=window.open("jindex.php?chat="+val,"ChatApplication","width=500,height=800,scrollbars=yes,toolbar=no,location=no,status=no,menubar=no,copyhistory=no");
		
		if(popWin)
			setCookie(PopupWin,"1");
	}
}
function closePopWin()
{    // close pop-up window if it is open 
  if (navigator.appName != "Microsoft Internet Explorer" 
      || parseInt(navigator.appVersion) >=4) //do not close if early IE
    if(popWin != null) if(!popWin.closed) popWin.close() 
}

function retrieveURL(url,id) {
    
    //Do the Ajax call
    if (window.XMLHttpRequest) { // Non-IE browsers 
      req = new XMLHttpRequest();
      req.onreadystatechange = function () {
		  if (req.readyState == 4) { // Complete
		  if (req.status == 200) { // OK response
			
			//alert("Ajax response:"+req.responseText);
			document.getElementById(id).innerHTML = req.responseText;
			
		  } else {
			alert("Problem with server response:\n " + req.statusText);
		  }
		}
	  };
      try {
      	req.open("GET", url, true); //was get
      } catch (e) {
        alert("Problem Communicating with Server\n"+e);
      }
      req.send(null);
    } else if (window.ActiveXObject) { // IE
      
      req = new ActiveXObject("Microsoft.XMLHTTP");
      if (req) {
		req.onreadystatechange = function () {
		  if (req.readyState == 4) { // Complete
		  if (req.status == 200) { // OK response
			
			//alert("Ajax response:"+req.responseText);
			document.getElementById(id).innerHTML = req.responseText;
			
		  } else {
			alert("Problem with server response:\n " + req.statusText);
		  }
		}
	  };
        req.open("GET", url, true);
        req.send();
      }
    }
  }

/*
   * Set as the callback method for when XmlHttpRequest State Changes 
   * used by retrieveUrl
  */
  function processStateChange() {
  
  	  if (req.readyState == 4) { // Complete
      if (req.status == 200) { // OK response
        
        //alert("Ajax response:"+req.responseText);
        
        //document.getElementById("").innerHTML = req.responseText;
        
      } else {
        alert("Problem with server response:\n " + req.statusText);
      }
    }
  }
  
function checkUserLogin()
{
	retrieveURL("check_chat.php","chat_marqee");
//	alert("IN");
	t=setTimeout("checkUserLogin()",25000);
	
	
}

chat_login();

checkUserLogin();

if (ie||ns4||ns6)
		window.onload=onad;
</script>

<?	
}
else
{
?>
<script type="text/javascript">
function chat_login()
{
	alert("In Order to chat with this person,Please Login into System ");
}
</script>
<?
}


$to_secs=200;
$t_stamp = date("Ymdhis",time());
$timeout = $t_stamp - $to_secs;
$ip=$_SERVER['REMOTE_ADDR'];
$uid=-1;
if(isset($_SESSION["b2b_userid"]))
{
$uid=$_SESSION["b2b_userid"];
$to_secs=500;
$timeout = $t_stamp - $to_secs;
}
//==========================online visitors
mysql_query( "DELETE FROM b2b_online WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(sb_ontime) >$to_secs") ;
$online=mysql_fetch_array(mysql_query("select * from b2b_online where sb_ip='$ip'"));
 if($online)
 {
 mysql_query("update b2b_online set sb_ontime=$t_stamp,sb_uid=$uid where sb_ip='$ip'");
 }
 else
 {
 mysql_query("insert into b2b_online (sb_ontime,sb_ip,sb_uid) values($t_stamp,'$ip',$uid)");
 }
/* $num=mysql_num_rows(mysql_query("select * from b2b_online"));
 echo $num;*/
 
function get_sub_categories($cid)
{
		$rst_query=mysql_query("Select * from b2b_categories where sb_pid=".$cid);
		$clist=$cid;
		while ( $rst=mysql_fetch_array($rst_query) )
		{
 				$clist.="," . $rst["sb_id"];
				$thislist="-1," . $rst["sb_id"];
				while ( $rst=mysql_fetch_array($rst_query) )
				{ 
					$clist.="," . $rst["sb_id"];
					$thislist.="," . $rst["sb_id"];
				//echo $rst["sbcat_id"];
				}
	   		$rst_query=mysql_query("Select * from b2b_categories where sb_pid in (" . $thislist . ")" );
		}
	return $clist;
		
} 
function  get_sub_categories_qry($cid)
{
	$clist=get_sub_categories($cid);
	return $sbcat_str= " and  sb_cid IN (" .$clist . ")" ;
}
function get_total_products($cid)
{
/*
	$sql="select count(*) from b2b_product_cats where sb_cid=$cid";
	$result=mysql_fetch_array(mysql_query($sql));
	
	return $result[0];
	*/
	global $config;
	$sbcat_str=get_sub_categories_qry($cid);
	
	$sbq_product_cat="select * from b2b_product_cats, b2b_products where sb_approved='yes' and b2b_products.sb_id=b2b_product_cats.sb_offer_id $sbcat_str";
	return $sbproduct_count=mysql_num_rows(mysql_query($sbq_product_cat));
	
}

function get_total_offers($cid)
{
	global $config;
	$sbcat_str=get_sub_categories_qry($cid);
	$sbq_off_cat="select * from b2b_offer_cats, b2b_offers where sb_approved='yes' and b2b_offers.sb_id=b2b_offer_cats.sb_offer_id and DATE_ADD(sb_postedon,INTERVAL ".$config["sb_expiry_sell"]." MONTH) > NOW() $sbcat_str";

	return $sboff_count=mysql_num_rows(mysql_query($sbq_off_cat));
}

function get_total_buy_offers($cid)
{
	global $config;
	$sbcat_str=get_sub_categories_qry($cid);
	$sbq_buy_cat="select * from b2b_offer_cats_buy, b2b_offers_buy where sb_approved='yes' and b2b_offers_buy.sb_id=b2b_offer_cats_buy.sb_offer_id and DATE_ADD(sb_postedon,INTERVAL ".$config["sb_expiry_buy"]." MONTH) > NOW() $sbcat_str";
	return $sbbuy_count=mysql_num_rows(mysql_query($sbq_buy_cat));
}

function get_total_profiles($cid)
{	
	global $config;
	$sbcat_str=get_sub_categories($cid);
	$main_cats=explode(",",$sbcat_str);
	
	 $sbq_profile_cat="select * from b2b_profile_cats, b2b_companyprofiles where sb_approved='yes' and b2b_companyprofiles.sb_id=b2b_profile_cats.sb_profile_id AND (sb_buycid like '%".$cid."%' OR sb_sellcid like '%".$cid."%')";

	
	$cats = mysql_query($sbq_profile_cat);
	$list_num3 = 0;
	$list_num4 = 0;
	$company_pro=0;
	
	while($sbrow_cat = mysql_fetch_array($cats))
	{
			$buying1 = $sbrow_cat["sb_buycid"];
			$buying = explode(',',$buying1);
			$selling1 = $sbrow_cat["sb_sellcid"];
			$selling = explode(',',$selling1);
			
			foreach($buying as $cid1)
			{
				if(in_array($cid1,$main_cats))
				{
					$company_pro++;
					break;
				}
			}
			foreach($selling as $cid1)
			{
				if(in_array($cid1,$main_cats))
				{
					$company_pro++;
					break;
				}
			}
	}
	return $company_pro;
}



?>