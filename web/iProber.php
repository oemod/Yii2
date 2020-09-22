<?php
/*
    +--------------------------------------------------------------------------
    |   iProber v0.024
    |   ========================================
    |   by Tahiti
    |   dEpoch Studio
    |   http://www.depoch.net
    |   ========================================
    |   Web: http://www.depoch.net
    |   Last Updated: 29th April 2006
    |   Email: depoch@gmail.com
    +---------------------------------------------------------------------------
    |
    |   > PHP PROBER
    |   > Script written by Tahiti
    |   > Date started: 27th June 2004
    |
    +--------------------------------------------------------------------------

	 
/* Functions in this file */
/**************************/

    // bar($percent)
    // find_command($commandName)
    // getcon($varName)
    // get_key($keyName)
    // isfun($funName)
    // sys_freebsd()
    // sys_linux()
    // test_float()
    // test_int()
    // test_io()
	// do_command($commandName, $args)

	header("content-Type: text/html; charset=utf-8");
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	ob_start();
     
    $valInt = (false == empty($_POST['pInt']))?$_POST['pInt']:"&#26410;&#27979;&#35797;";
    $valFloat = (false == empty($_POST['pFloat']))?$_POST['pFloat']:"&#26410;&#27979;&#35797;";
    $valIo = (false == empty($_POST['pIo']))?$_POST['pIo']:"&#26410;&#27979;&#35797;";
    $mysqlReShow = "none";
    $mailReShow = "none";
    $funReShow = "none";
    $opReShow = "none";
    $sysReShow = "none";
     
    define("YES", "<span class='resYes'>YES</span>");
    define("NO", "<span class='resNo'>NO</span>");
    define("ICON", "<span class='icon'>2</span>&nbsp;");
    $phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
    define("PHPSELF", preg_replace("/(.{0,}?\/+)/", "", $phpSelf));
     
    if ($_GET['act'] == "phpinfo")
    {
        phpinfo();
        exit();
    }
    elseif($_POST['act'] == "TEST_1")
    {
        $valInt = test_int();
    }
    elseif($_POST['act'] == "TEST_2")
    {
        $valFloat = test_float();
    }
    elseif($_POST['act'] == "TEST_3")
    {
        $valIo = test_io();
    }
    elseif($_POST['act'] == "CONNECT")
    {
        $mysqlReShow = "show";
        $mysqlRe = "MYSQL&#36830;&#25509;&#27979;&#35797;&#32467;&#26524;&#65306;";
        $mysqlRe .= (false !== @mysql_connect($_POST['mysqlHost'], $_POST['mysqlUser'], $_POST['mysqlPassword']))?"MYSQL&#26381;&#21153;&#22120;&#36830;&#25509;&#27491;&#24120;, ":
        "MYSQL&#26381;&#21153;&#22120;&#36830;&#25509;&#22833;&#36133;, ";
        $mysqlRe .= "&#25968;&#25454;&#24211; <b>".$_POST['mysqlDb']."</b> ";
        $mysqlRe .= (false != @mysql_select_db($_POST['mysqlDb']))?"&#36830;&#25509;&#27491;&#24120;":
        "&#36830;&#25509;&#22833;&#36133;";
    }
    elseif($_POST['act'] == "SENDMAIL")
    {
        $mailReShow = "show";
        $mailRe = "MAIL&#37038;&#20214;&#21457;&#36865;&#27979;&#35797;&#32467;&#26524;&#65306;&#21457;&#36865;";
        $mailRe .= (false !== @mail($_POST["mailReceiver"], "MAIL SERVER TEST", "This email is sent by iProber.\r\n\r\ndEpoch Studio\r\nhttp://depoch.net"))?"&#23436;&#25104;":"&#22833;&#36133;";
    }
    elseif($_POST['act'] == "FUNCTION_CHECK")
    {
        $funReShow = "show";
        $funRe = "&#20989;&#25968; <b>".$_POST['funName']."</b> &#25903;&#25345;&#29366;&#20917;&#26816;&#27979;&#32467;&#26524;&#65306;".isfun($_POST['funName']);
    }
    elseif($_POST['act'] == "CONFIGURATION_CHECK")
    {
        $opReShow = "show";
        $opRe = "&#37197;&#32622;&#21442;&#25968; <b>".$_POST['opName']."</b> &#26816;&#27979;&#32467;&#26524;&#65306;".getcon($_POST['opName']);
    }
     
     
    // &#31995;&#32479;&#21442;&#25968;
     
     
    switch (PHP_OS)
    {
        case "Linux":
        $sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
        break;
        case "FreeBSD":
        $sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
        break;
        default:
        break;
    }
     
/*========================================================================*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP&#25506;&#38024; iProber V0.024</title>
<meta name="keywords" content="php&#25506;&#38024;,&#25506;&#38024;&#31243;&#24207;,php&#25506;&#38024;&#31243;&#24207;,&#25506;&#38024;,iProber,dEpoch Studio" />
<style type="text/css">
<!--
body,div,p,ul,form,h1 { margin:0px; padding:0px; }
body { background:#252724; }
div,a,input { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color:#7D795E; }
div { margin-left:auto; margin-right:auto; width:720px; }
input { border: 1px solid #414340; background:#353734; }
a,#t3 a.arrow,#f1 a.arrow { text-decoration:none; color:#978F78; }
a:hover { text-decoration:underline; }
a.arrow { font-family:Webdings, sans-serif; color:#343525; font-size:10px; }
a.arrow:hover { color:#ff0000; text-decoration:none; }
.resYes { font-size: 9px; font-weight: bold; color: #33CC00; } 
.resNo { font-size: 9px; font-weight: bold; color: #CC3300; }
.myButton { font-size:10px; font-weight:bold;  background:#3D3F3E; border:1px solid #4A4C49; border-right-color:#2D2F2C; border-bottom-color:#2D2F2C; color:#978F78; }
.bar { border:1px solid #2D2F2C; background:#6C6754; height:8px; font-size:2px; }
.bar li { background:#979179; height:8px; font-size:2px; list-style-type:none; }
table { clear:both; background:#2D2F2C; border:3px solid #41433E; margin-bottom:10px; }
td,th { padding:4px; background:#363835; }
th { background:#7E7860; color:#343525; text-align:left; }
th span { font-family:Webdings, sans-serif; font-weight:normal; padding-right:4px; }
th p { float:right; line-height:10px; text-align:right; }
th a { color:#343525; }
h1 { color:#009900; font-size:35px; width:300px; float:left; }
h1 b { color:#cc3300; font-size:50px; font-family: Webdings, sans-serif; font-weight:normal; }
h1 span { font-size:10px; padding-left:10px; color:#7D795E;  }
#t12 { float:right; text-align:right; padding:15px 0px 30px 0px; }
#t12 a { line-height:18px; color:#7D795E; }
#t3 td{ line-height:30px; height:30px; text-align:center; background:#3D3F3E; border:1px solid #4A4C49; border-right:none; border-bottom:none; }
#t3 th,#t3 th a { font-weight:normal; }
#m4 td {text-align:center;}
.th2 th,.th3 { background:#232522; text-align:center; color:#7D795E; font-weight:normal;  }
.th3 { font-weight:bold; text-align:left; }
#footer table { clear:none; }
#footer td { text-align:center; padding:1px 3px; font-size:9px; }
#footer a { font-size:9px; }
#f1 { text-align:right; padding:15px; }
#f2 {float:left; border:1px solid #dddddd; }
#f2 td { background:#FF6600; }
#f2 a { color:#ffffff; }
#f3 { border: 1px solid #888888; float:right; }
#f3 a { color:#222222; }
#f31 { background:#2359B1; color:#FFFFFF; }
#f32 { background:#dddddd; }
-->
</style>
</head>
<body>
<form method="post" action="<?=PHPSELF."#bottom"?>">
	<div>
		<input type="hidden" name="pInt" value="<?=$valInt?>" />
		<input type="hidden" name="pFloat" value="<?=$valFloat?>" />
		<input type="hidden" name="pIo" value="<?=$valIo?>" />
<!-- =============================================================
&#39029;&#22836; 
============================================================= -->
		<h1><i><b>i</b>Prober</i><span>V0.024</span></h1>
		<a name="top"></a>
		<p id="t12">
			<a href="http://depoch.net/download.htm" target="_blank">&#28857;&#20987;&#19979;&#36733; iProber &#25506;&#38024;, &#25110;&#26597;&#30475;&#26368;&#26032;&#29256;&#26412; </a>
			&#9632;<br />
			<a href="mailto:depoch@gmail.com">&#25253;&#21578;BUGS, &#25110;&#21453;&#39304;&#24847;&#35265;&#32473; dEpoch Studio </a>
			&#9632;
		</p>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" id="t3">
			<tr>
				<td><a href="#sec1">&#26381;&#21153;&#22120;&#29305;&#24449;</a></td>
				<td><a href="#sec2">PHP&#22522;&#26412;&#29305;&#24449;</a></td>
				<td><a href="#sec3">PHP&#32452;&#20214;&#25903;&#25345;&#29366;&#20917;</a></td>
				<td><a href="#sec4">&#26381;&#21153;&#22120;&#24615;&#33021;&#26816;&#27979;</a></td>
				<td><a href="#sec5">&#33258;&#23450;&#20041;&#26816;&#27979;</a></td>
				<td><a href="<?=PHPSELF?>" class="t211">&#21047;&#26032;</a></td>
				<td><a href="#bottom" class="arrow">66</a></td>
			</tr>
			<tr>
				<th colspan="7"><b>&#12310;AD&#12311;</b>
					<a href="http://www.egobiz.com" target="_blank">&#32703;&#39640;&#22495;&#21517;&#21830;&#21153;&#32593;: </a>
					<a href="http://www.egobiz.com/domain/" target="_blank">&#22495;&#21517;&#27880;&#20876;</a>
					<a href="http://www.egobiz.com/domain-sell/" target="_blank">&#22495;&#21517;&#20132;&#26131;</a>
					<a href="http://www.egobiz.com/deleting-domain/" target="_blank">&#36807;&#26399;&#22495;&#21517;|&#21024;&#38500;&#22495;&#21517;&#26597;&#35810;</a>
					<a href="http://www.egobiz.com/domain-tool/" target="_blank">&#22495;&#21517;&#24037;&#20855;&#38598;</a></th>
			</tr>
		</table>
<!-- =============================================================
&#26381;&#21153;&#22120;&#29305;&#24615; 
============================================================= -->
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
				<th colspan="2"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>&#26381;&#21153;&#22120;&#29305;&#24615;
					<a name="sec1" id="sec1"></a>
				</th>
			</tr>
			<?if("show"==$sysReShow){?>
			<tr>
				<td>&#26381;&#21153;&#22120;&#22788;&#29702;&#22120; CPU</td>
				<td>CPU&#20010;&#25968;&#65306;
					<?=$sysInfo['cpu']['num']?>
					<br />
					<?=$sysInfo['cpu']['detail']?></td>
			</tr>
			<?}?>
			<tr>
				<td>&#26381;&#21153;&#22120;&#26102;&#38388;</td>
				<td><?=date("Y&#24180;n&#26376;j&#26085; H:i:s")?>
					&nbsp;&#21271;&#20140;&#26102;&#38388;&#65306;
					<?=gmdate("Y&#24180;n&#26376;j&#26085; H:i:s",time()+8*3600)?></td>
			</tr>
			<?if("show"==$sysReShow){?>
			<tr>
				<td>&#26381;&#21153;&#22120;&#36816;&#34892;&#26102;&#38388;</td>
				<td><?=$sysInfo['uptime']?></td>
			</tr>
			<?}?>
			<tr>
				<td>&#26381;&#21153;&#22120;&#22495;&#21517;/IP&#22320;&#22336;</td>
				<td><?=$_SERVER['SERVER_NAME']?>
					(
					<?=@gethostbyname($_SERVER['SERVER_NAME'])?>
					)</td>
			</tr>
			<tr>
				<td>&#26381;&#21153;&#22120;&#25805;&#20316;&#31995;&#32479;
					<?$os = explode(" ", php_uname());?></td>
				<td><?=$os[0];?>
					&nbsp;&#20869;&#26680;&#29256;&#26412;&#65306;
					<?=$os[2]?></td>
			</tr>
			<tr>
				<td>&#20027;&#26426;&#21517;&#31216;</td>
				<td><?=$os[1];?></td>
			</tr>
			<tr>
				<td>&#26381;&#21153;&#22120;&#35299;&#35793;&#24341;&#25806;</td>
				<td><?=$_SERVER['SERVER_SOFTWARE']?></td>
			</tr>
			<tr>
				<td>Web&#26381;&#21153;&#31471;&#21475;</td>
				<td><?=$_SERVER['SERVER_PORT']?></td>
			</tr>
			<tr>
				<td>&#26381;&#21153;&#22120;&#31649;&#29702;&#21592;</td>
				<td><a href="mailto:<?=$_SERVER['SERVER_ADMIN']?>">
					<?=$_SERVER['SERVER_ADMIN']?>
					</a></td>
			</tr>
			<tr>
				<td>&#26412;&#25991;&#20214;&#36335;&#24452;</td>
				<td><?=$_SERVER['PATH_TRANSLATED']?></td>
			</tr>
			<tr>
				<td>&#30446;&#21069;&#36824;&#26377;&#31354;&#20313;&#31354;&#38388;&nbsp;diskfreespace</td>
				<td><?=round((@disk_free_space(".")/(1024*1024)),2)?>
					M</td>
			</tr>
			<?if("show"==$sysReShow){?>
			<tr>
				<td>&#20869;&#23384;&#20351;&#29992;&#29366;&#20917;</td>
				<td> &#29289;&#29702;&#20869;&#23384;&#65306;&#20849;
					<?=$sysInfo['memTotal']?>
					M, &#24050;&#20351;&#29992;
					<?=$sysInfo['memUsed']?>
					M, &#31354;&#38386;
					<?=$sysInfo['memFree']?>
					M, &#20351;&#29992;&#29575;
					<?=$sysInfo['memPercent']?>
					%
					<?=bar($sysInfo['memPercent'])?>
					SWAP&#21306;&#65306;&#20849;
					<?=$sysInfo['swapTotal']?>
					M, &#24050;&#20351;&#29992;
					<?=$sysInfo['swapUsed']?>
					M, &#31354;&#38386;
					<?=$sysInfo['swapFree']?>
					M, &#20351;&#29992;&#29575;
					<?=$sysInfo['swapPercent']?>
					%
					<?=bar($sysInfo['swapPercent'])?>
				</td>
			</tr>
			<tr>
				<td>&#31995;&#32479;&#24179;&#22343;&#36127;&#36733;</td>
				<td><?=$sysInfo['loadAvg']?></td>
			</tr>
			<?}?>
		</table>
<!-- ============================================================= 
PHP&#22522;&#26412;&#29305;&#24615; 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<th colspan="2"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>PHP&#22522;&#26412;&#29305;&#24615;
					<a name="sec2" id="sec2"></a>
				</th>
			</tr>
			<tr>
				<td width="49%">PHP&#36816;&#34892;&#26041;&#24335;</td>
				<td width="51%"><?=strtoupper(php_sapi_name())?></td>
			</tr>
			<tr>
				<td>PHP&#29256;&#26412;</td>
				<td><?=PHP_VERSION?></td>
			</tr>
			<tr>
				<td>&#36816;&#34892;&#20110;&#23433;&#20840;&#27169;&#24335;</td>
				<td><?=getcon("safe_mode")?></td>
			</tr>
			<tr>
				<td>&#25903;&#25345;ZEND&#32534;&#35793;&#36816;&#34892;</td>
				<td><?=(get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts")) ?YES:NO?></td>
			</tr>
			<tr>
				<td>&#20801;&#35768;&#20351;&#29992;URL&#25171;&#24320;&#25991;&#20214;&nbsp;allow_url_fopen</td>
				<td><?=getcon("allow_url_fopen")?></td>
			</tr>
			<tr>
				<td>&#20801;&#35768;&#21160;&#24577;&#21152;&#36733;&#38142;&#25509;&#24211;&nbsp;enable_dl</td>
				<td><?=getcon("enable_dl")?></td>
			</tr>
			<tr>
				<td>&#26174;&#31034;&#38169;&#35823;&#20449;&#24687;&nbsp;display_errors</td>
				<td><?=getcon("display_errors")?></td>
			</tr>
			<tr>
				<td>&#33258;&#21160;&#23450;&#20041;&#20840;&#23616;&#21464;&#37327;&nbsp;register_globals</td>
				<td><?=getcon("register_globals")?></td>
			</tr>
			<tr>
				<td>&#31243;&#24207;&#26368;&#22810;&#20801;&#35768;&#20351;&#29992;&#20869;&#23384;&#37327;&nbsp;memory_limit</td>
				<td><?=getcon("memory_limit")?></td>
			</tr>
			<tr>
				<td>POST&#26368;&#22823;&#23383;&#33410;&#25968;&nbsp;post_max_size</td>
				<td><?=getcon("post_max_size")?></td>
			</tr>
			<tr>
				<td>&#20801;&#35768;&#26368;&#22823;&#19978;&#20256;&#25991;&#20214;&nbsp;upload_max_filesize</td>
				<td><?=getcon("upload_max_filesize")?></td>
			</tr>
			<tr>
				<td>&#31243;&#24207;&#26368;&#38271;&#36816;&#34892;&#26102;&#38388;&nbsp;max_execution_time</td>
				<td><?=getcon("max_execution_time")?>
					&#31186;</td>
			</tr>
			<tr>
				<td>magic_quotes_gpc</td>
				<td><?=(1===get_magic_quotes_gpc())?YES:NO?></td>
			</tr>
			<tr>
				<td>magic_quotes_runtime</td>
				<td><?=(1===get_magic_quotes_runtime())?YES:NO?></td>
			</tr>
			<tr>
				<td>&#34987;&#31105;&#29992;&#30340;&#20989;&#25968;&nbsp;disable_functions</td>
				<td><?=(""==($disFuns=get_cfg_var("disable_functions")))?"&#26080;":str_replace(",","<br />",$disFuns)?></td>
			</tr>
			<tr>
				<td>PHP&#20449;&#24687;&nbsp;PHPINFO</td>
				<td><?=(false!==eregi("phpinfo",$disFuns))?NO:"<a href='$phpSelf?act=phpinfo' target='_blank' class='static'>PHPINFO</a>"?></td>
			</tr>
		</table>
<!-- ============================================================= 
PHP&#32452;&#20214;&#25903;&#25345; 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<th colspan="4"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>PHP&#32452;&#20214;&#25903;&#25345;
					<a name="sec3" id="sec3"></a>
				</th>
			</tr>
			<tr>
				<td width="38%">&#25340;&#20889;&#26816;&#26597; ASpell Library</td>
				<td width="12%"><?=isfun("aspell_check_raw")?></td>
				<td width="38%">&#39640;&#31934;&#24230;&#25968;&#23398;&#36816;&#31639; BCMath</td>
				<td width="12%"><?=isfun("bcadd")?></td>
			</tr>
			<tr>
				<td>&#21382;&#27861;&#36816;&#31639; Calendar</td>
				<td><?=isfun("cal_days_in_month")?></td>
				<td>DBA&#25968;&#25454;&#24211;</td>
				<td><?=isfun("dba_close")?></td>
			</tr>
			<tr>
				<td>dBase&#25968;&#25454;&#24211;</td>
				<td><?=isfun("dbase_close")?></td>
				<td>DBM&#25968;&#25454;&#24211;</td>
				<td><?=isfun("dbmclose")?></td>
			</tr>
			<tr>
				<td>FDF&#34920;&#21333;&#36164;&#26009;&#26684;&#24335;</td>
				<td><?=isfun("fdf_get_ap")?></td>
				<td>FilePro&#25968;&#25454;&#24211;</td>
				<td><?=isfun("filepro_fieldcount")?></td>
			</tr>
			<tr>
				<td>Hyperwave&#25968;&#25454;&#24211;</td>
				<td><?=isfun("hw_close")?></td>
				<td>&#22270;&#24418;&#22788;&#29702; GD Library</td>
				<td><?=isfun("gd_info")?></td>
			</tr>
			<tr>
				<td>IMAP&#30005;&#23376;&#37038;&#20214;&#31995;&#32479;</td>
				<td><?=isfun("imap_close")?></td>
				<td>Informix&#25968;&#25454;&#24211;</td>
				<td><?=isfun("ifx_close")?></td>
			</tr>
			<tr>
				<td>LDAP&#30446;&#24405;&#21327;&#35758;</td>
				<td><?=isfun("ldap_close")?></td>
				<td>MCrypt&#21152;&#23494;&#22788;&#29702;</td>
				<td><?=isfun("mcrypt_cbc")?></td>
			</tr>
			<tr>
				<td>&#21704;&#31232;&#35745;&#31639; MHash</td>
				<td><?=isfun("mhash_count")?></td>
				<td>mSQL&#25968;&#25454;&#24211;</td>
				<td><?=isfun("msql_close")?></td>
			</tr>
			<tr>
				<td>SQL Server&#25968;&#25454;&#24211;</td>
				<td><?=isfun("mssql_close")?></td>
				<td>MySQL&#25968;&#25454;&#24211;</td>
				<td><?=isfun("mysql_close")?></td>
			</tr>
			<tr>
				<td>SyBase&#25968;&#25454;&#24211;</td>
				<td><?=isfun("sybase_close")?></td>
				<td>Yellow Page&#31995;&#32479;</td>
				<td><?=isfun("yp_match")?></td>
			</tr>
			<tr>
				<td>Oracle&#25968;&#25454;&#24211;</td>
				<td><?=isfun("ora_close")?></td>
				<td>Oracle 8 &#25968;&#25454;&#24211;</td>
				<td><?=isfun("OCILogOff")?></td>
			</tr>
			<tr>
				<td>PREL&#30456;&#23481;&#35821;&#27861; PCRE</td>
				<td><?=isfun("preg_match")?></td>
				<td>PDF&#25991;&#26723;&#25903;&#25345;</td>
				<td><?=isfun("pdf_close")?></td>
			</tr>
			<tr>
				<td>Postgre SQL&#25968;&#25454;&#24211;</td>
				<td><?=isfun("pg_close")?></td>
				<td>SNMP&#32593;&#32476;&#31649;&#29702;&#21327;&#35758;</td>
				<td><?=isfun("snmpget")?></td>
			</tr>
			<tr>
				<td>VMailMgr&#37038;&#20214;&#22788;&#29702;</td>
				<td><?=isfun("vm_adduser")?></td>
				<td>WDDX&#25903;&#25345;</td>
				<td><?=isfun("wddx_add_vars")?></td>
			</tr>
			<tr>
				<td>&#21387;&#32553;&#25991;&#20214;&#25903;&#25345;(Zlib)</td>
				<td><?=isfun("gzclose")?></td>
				<td>XML&#35299;&#26512;</td>
				<td><?=isfun("xml_set_object")?></td>
			</tr>
			<tr>
				<td>FTP</td>
				<td><?=isfun("ftp_login")?></td>
				<td>ODBC&#25968;&#25454;&#24211;&#36830;&#25509;</td>
				<td><?=isfun("odbc_close")?></td>
			</tr>
			<tr>
				<td>Session&#25903;&#25345;</td>
				<td><?=isfun("session_start")?></td>
				<td>Socket&#25903;&#25345;</td>
				<td><?=isfun("socket_accept")?></td>
			</tr>
		</table>
<!-- ============================================================= 
&#26381;&#21153;&#22120;&#24615;&#33021;&#26816;&#27979; 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0" id="m4">
			<tr>
				<th colspan="4"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>&#26381;&#21153;&#22120;&#24615;&#33021;&#26816;&#27979;
					<a name="sec4" id="sec4"></a>
				</th>
			</tr>
			<tr class="th2" >
				<th>&#26816;&#27979;&#23545;&#35937;</th>
				<th>&#25972;&#25968;&#36816;&#31639;&#33021;&#21147;&#27979;&#35797;<br />
					(1+1&#36816;&#31639;300&#19975;&#27425;)</th>
				<th>&#28014;&#28857;&#36816;&#31639;&#33021;&#21147;&#27979;&#35797;<br />
					(&#24320;&#24179;&#26041;300&#19975;&#27425;)</th>
				<th>&#25968;&#25454;I/O&#33021;&#21147;&#27979;&#35797;<br />
					(&#35835;&#21462;10K&#25991;&#20214;10000&#27425;)</th>
			</tr>
			<tr>
				<td>Tahiti &#30340;&#30005;&#33041;(P4 1.7G 256M WinXP)</td>
				<td> 1.421&#31186;</td>
				<td> 1.358&#31186;</td>
				<td> 0.177&#31186;</td>
			</tr>
			<tr>
				<td>PIPNI&#20813;&#36153;&#31354;&#38388;(2004/06/28 02:08)</td>
				<td> 2.545&#31186;</td>
				<td> 2.545&#31186;</td>
				<td>0.171&#31186; </td>
			</tr>
			<tr>
				<td>&#31070;&#35805;&#31185;&#25216;&#39118;CGI&#22411;(2004/06/28 02:03)</td>
				<td> 0.797&#31186;</td>
				<td> 0.729&#31186;</td>
				<td>0.156&#31186;</td>
			</tr>
			<tr>
				<td>&#24744;&#27491;&#22312;&#20351;&#29992;&#30340;&#36825;&#21488;&#26381;&#21153;&#22120;</td>
				<td><b>
					<?=$valInt?>
					</b><br />
					<input type="submit" value="TEST_1" class="myButton"  name="act" /></td>
				<td><b>
					<?=$valFloat?>
					</b><br />
					<input type="submit" value="TEST_2" class="myButton"  name="act" /></td>
				<td><b>
					<?=$valIo?>
					</b><br />
					<input type="submit" value="TEST_3" class="myButton"  name="act" /></td>
			</tr>
		</table>
<!-- ============================================================= 
&#33258;&#23450;&#20041;&#26816;&#27979; 
============================================================== -->
<?php
    $isMysql = (false !== function_exists("mysql_query"))?"":" disabled";
    $isMail = (false !== function_exists("mail"))?"":" disabled";
?>
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
				<th colspan="4"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>&#33258;&#23450;&#20041;&#26816;&#27979;
					<a name="sec5" id="sec5"></a>
				</th>
			</tr>
			<tr>
				<th colspan="4" class="th3">MYSQL&#36830;&#25509;&#27979;&#35797;</th>
			</tr>
			<tr>
				<td>MYSQL&#26381;&#21153;&#22120;</td>
				<td><input type="text" name="mysqlHost" value="localhost" <?=$isMysql?> /></td>
				<td> MYSQL&#29992;&#25143;&#21517; </td>
				<td><input type="text" name="mysqlUser" <?=$isMysql?> /></td>
			</tr>
			<tr>
				<td> MYSQL&#29992;&#25143;&#23494;&#30721; </td>
				<td><input type="text" name="mysqlPassword" <?=$isMysql?> /></td>
				<td> MYSQL&#25968;&#25454;&#24211;&#21517;&#31216; </td>
				<td><input type="text" name="mysqlDb" />
					&nbsp;<input type="submit" class="myButton" value="CONNECT" <?=$isMysql?>  name="act" /></td>
			</tr>
			<?php if("show"==$mysqlReShow){?>
			<tr>
				<td colspan="4"><?=$mysqlRe?></td>
			</tr>
			<?}?>
			<tr>
				<th colspan="4" class="th3">MAIL&#37038;&#20214;&#21457;&#36865;&#27979;&#35797;</th>
			</tr>
			<tr>
				<td>&#25910;&#20449;&#22320;&#22336;</td>
				<td colspan="3"><input type="text" name="mailReceiver" size="50" <?=$isMail?> />
					&nbsp;<input type="submit" class="myButton" value="SENDMAIL" <?=$isMail?>  name="act" /></td>
			</tr>
			<?php if("show"==$mailReShow){?>
			<tr>
				<td colspan="4"><?=$mailRe?></td>
			</tr>
			<?}?>
			<tr>
				<th colspan="4" class="th3">&#20989;&#25968;&#25903;&#25345;&#29366;&#20917;</th>
			</tr>
			<tr>
				<td>&#20989;&#25968;&#21517;&#31216;</td>
				<td colspan="3"><input type="text" name="funName" size="50" />
					&nbsp;<input type="submit" class="myButton" value="FUNCTION_CHECK" name="act" /></td>
				<?php if("show"==$funReShow){?>
			<tr>
				<td colspan="4"><?=$funRe?></td>
			</tr>
			<?}?>
			</tr>
			
			<tr>
				<th colspan="4" class="th3">PHP&#37197;&#32622;&#21442;&#25968;&#29366;&#20917;</th>
			</tr>
			<tr>
				<td>&#21442;&#25968;&#21517;&#31216;</td>
				<td colspan="3"><input type="text" name="opName" size="40" />
					&nbsp;<input type="submit" class="myButton" value="CONFIGURATION_CHECK" name="act" /></td>
			</tr>
			<?php if("show"==$opReShow){?>
			<tr>
				<td colspan="4"><?=$opRe?></td>
			</tr>
			<?}?>
		</table>
<!-- ============================================================= 
&#39029;&#33050;  
============================================================== -->
		<div id="footer">
			<p id="f1">
				<a name="bottom"></a>
				<a href="#top" class="arrow">55</a>
			</p>
			<table  border="0" cellspacing="1" cellpadding="0" id="f2">
				<tr>
					<td><a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML</a></td>
					<td><a href="http://jigsaw.w3.org/css-validator/validator?uri=http://<?=$_SERVER['SERVER_NAME'].($_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME]);?>" target="_blank">CSS</a>
					</td>
				</tr>
			</table>
			<table  border="0" cellspacing="1" cellpadding="0" id="f3">
				<tr>
					<td id="f31">Powered by</td>
					<td id="f32"><a href="http://www.depoch.net"><b>dEpoch Studio</b></a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>
</body>
</html>
<?php
/*=============================================================
    &#20989;&#25968;&#24211;
=============================================================*/
/*-------------------------------------------------------------------------------------------------------------
    &#26816;&#27979;&#20989;&#25968;&#25903;&#25345;
--------------------------------------------------------------------------------------------------------------*/
    function isfun($funName)
    {
        return (false !== function_exists($funName))?YES:NO;
    }
/*-------------------------------------------------------------------------------------------------------------
    &#26816;&#27979;PHP&#35774;&#32622;&#21442;&#25968;
--------------------------------------------------------------------------------------------------------------*/
    function getcon($varName)
    {
        switch($res = get_cfg_var($varName))
        {
            case 0:
            return NO;
            break;
            case 1:
            return YES;
            break;
            default:
            return $res;
            break;
        }
         
    }
/*-------------------------------------------------------------------------------------------------------------
    &#25972;&#25968;&#36816;&#31639;&#33021;&#21147;&#27979;&#35797;
--------------------------------------------------------------------------------------------------------------*/
    function test_int()
    {
        $timeStart = gettimeofday();
        for($i = 0; $i < 3000000; $i++);
        {
            $t = 1+1;
        }
        $timeEnd = gettimeofday();
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."&#31186;";
        return $time;
    }
/*-------------------------------------------------------------------------------------------------------------
    &#28014;&#28857;&#36816;&#31639;&#33021;&#21147;&#27979;&#35797;
--------------------------------------------------------------------------------------------------------------*/
    function test_float()
    {
        $t = pi();
        $timeStart = gettimeofday();
        for($i = 0; $i < 3000000; $i++);
        {
            sqrt($t);
        }
        $timeEnd = gettimeofday();
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."&#31186;";
        return $time;
    }
/*-------------------------------------------------------------------------------------------------------------
    &#25968;&#25454;IO&#33021;&#21147;&#27979;&#35797;
--------------------------------------------------------------------------------------------------------------*/
    function test_io()
    {
        $fp = fopen(PHPSELF, "r");
        $timeStart = gettimeofday();
        for($i = 0; $i < 10000; $i++)
        {
            fread($fp, 10240);
            rewind($fp);
        }
        $timeEnd = gettimeofday();
        fclose($fp);
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."&#31186;";
        return($time);
    }
/*-------------------------------------------------------------------------------------------------------------
    &#27604;&#20363;&#26465;
--------------------------------------------------------------------------------------------------------------*/
    function bar($percent)
    {
    ?>
<ul class="bar">
	<li style="width:<?=$percent?>%">&nbsp;</li>
</ul>
<?php
    }
/*-------------------------------------------------------------------------------------------------------------
    &#31995;&#32479;&#21442;&#25968;&#25506;&#27979; LINUX
--------------------------------------------------------------------------------------------------------------*/
    function sys_linux()
    {
        // CPU
        if (false === ($str = @file("/proc/cpuinfo"))) return false;
        $str = implode("", $str);
        @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(.]+)[\r\n]+/", $str, $model);
        //@preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
        @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
        if (false !== is_array($model[1]))
            {
            $res['cpu']['num'] = sizeof($model[1]);
            for($i = 0; $i < $res['cpu']['num']; $i++)
            {
                $res['cpu']['detail'][] = "&#31867;&#22411;&#65306;".$model[1][$i]." &#32531;&#23384;&#65306;".$cache[1][$i];
            }
            if (false !== is_array($res['cpu']['detail'])) $res['cpu']['detail'] = implode("<br />", $res['cpu']['detail']);
            }
         
         
        // UPTIME
        if (false === ($str = @file("/proc/uptime"))) return false;
        $str = explode(" ", implode("", $str));
        $str = trim($str[0]);
        $min = $str / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $res['uptime'] = $days."&#22825;";
        if ($hours !== 0) $res['uptime'] .= $hours."&#23567;&#26102;";
        $res['uptime'] .= $min."&#20998;&#38047;";
         
        // MEMORY
        if (false === ($str = @file("/proc/meminfo"))) return false;
        $str = implode("", $str);
        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
         
        $res['memTotal'] = round($buf[1][0]/1024, 2);
        $res['memFree'] = round($buf[2][0]/1024, 2);
        $res['memUsed'] = ($res['memTotal']-$res['memFree']);
        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;
         
        $res['swapTotal'] = round($buf[3][0]/1024, 2);
        $res['swapFree'] = round($buf[4][0]/1024, 2);
        $res['swapUsed'] = ($res['swapTotal']-$res['swapFree']);
        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;
         
        // LOAD AVG
        if (false === ($str = @file("/proc/loadavg"))) return false;
        $str = explode(" ", implode("", $str));
        $str = array_chunk($str, 3);
        $res['loadAvg'] = implode(" ", $str[0]);
         
        return $res;
    }
/*-------------------------------------------------------------------------------------------------------------
    &#31995;&#32479;&#21442;&#25968;&#25506;&#27979; FreeBSD
--------------------------------------------------------------------------------------------------------------*/
    function sys_freebsd()
    {
        //CPU
        if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
        $res['cpu']['detail'] = get_key("hw.model");
         
        //LOAD AVG
        if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;
        $res['loadAvg'] = str_replace("{", "", $res['loadAvg']);
        $res['loadAvg'] = str_replace("}", "", $res['loadAvg']);
         
        //UPTIME
        if (false === ($buf = get_key("kern.boottime"))) return false;
        $buf = explode(' ', $buf);
        $sys_ticks = time() - intval($buf[3]);
        $min = $sys_ticks / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $res['uptime'] = $days."&#22825;";
        if ($hours !== 0) $res['uptime'] .= $hours."&#23567;&#26102;";
        $res['uptime'] .= $min."&#20998;&#38047;";
         
        //MEMORY
        if (false === ($buf = get_key("hw.physmem"))) return false;
        $res['memTotal'] = round($buf/1024/1024, 2);
        $buf = explode("\n", do_command("vmstat", ""));
        $buf = explode(" ", trim($buf[2]));
         
        $res['memFree'] = round($buf[5]/1024, 2);
        $res['memUsed'] = ($res['memTotal']-$res['memFree']);
        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;
		         
        $buf = explode("\n", do_command("swapinfo", "-k"));
        $buf = $buf[1];
        preg_match_all("/([0-9]+)\s+([0-9]+)\s+([0-9]+)/", $buf, $bufArr);
        $res['swapTotal'] = round($bufArr[1][0]/1024, 2);
        $res['swapUsed'] = round($bufArr[2][0]/1024, 2);
        $res['swapFree'] = round($bufArr[3][0]/1024, 2);
        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;
         
        return $res;
    }
     
/*-------------------------------------------------------------------------------------------------------------
    &#21462;&#24471;&#21442;&#25968;&#20540; FreeBSD
--------------------------------------------------------------------------------------------------------------*/
function get_key($keyName)
    {
        return do_command('sysctl', "-n $keyName");
    }
     
/*-------------------------------------------------------------------------------------------------------------
    &#30830;&#23450;&#25191;&#34892;&#25991;&#20214;&#20301;&#32622; FreeBSD
--------------------------------------------------------------------------------------------------------------*/
    function find_command($commandName)
    {
        $path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
        foreach($path as $p)
        {
            if (@is_executable("$p/$commandName")) return "$p/$commandName";
        }
        return false;
    }
     
/*-------------------------------------------------------------------------------------------------------------
    &#25191;&#34892;&#31995;&#32479;&#21629;&#20196; FreeBSD
--------------------------------------------------------------------------------------------------------------*/
    function do_command($commandName, $args)
    {
        $buffer = "";
        if (false === ($command = find_command($commandName))) return false;
        if ($fp = @popen("$command $args", 'r'))
            {
				while (!@feof($fp))
				{
					$buffer .= @fgets($fp, 4096);
				}
				return trim($buffer);
			}
        return false;
    }

?>
