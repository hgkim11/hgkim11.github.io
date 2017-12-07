<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
  <title>Welcome to BufEEE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Welcome to BufEEE(Bottom-up model for Energy, Emission and Evaluation)</h2>
  <h3>By Hugon Kim, Dept. of BA, Kyungsung University, Busan, Korea</h3>
  <h3> <a href="mailto:hkim@ks.ac.kr">hkim@ks.ac.kr</a></h3>            
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Content</th>
        <th>File</th>
        <th>Comment</th>
      </tr>
    </thead>
     <tbody>
      <tr><td>BufEEE v0.5 Manual </td>			<td><a href="reformulation2017v0.5.pptx">reformulation2017v0.5.pptx</a></td><td>2017.8.2</td></tr>
      <tr><td>EXCEL BufEEE v.0.51</td>			<td><a href="excelBufEEEpy1.zip">excelBufEEEpy1.zip</a></td><td>2017.9.15</td></tr>
      <tr><td>GAMS BufEEE v0.5</td>			<td><a href="GAMS BufEEE.zip">GAMS BufEEE.zip</a></td><td>2017.8.2</td></tr>
      <tr><td>Web BufEEE v.0.1</td>			<td><a href="http://cat.ks.ac.kr/RES4/res.php">http://cat.ks.ac.kr/RES4/res.php</a></td><td>2017.8.2</td></tr>
      <!--<tr><td>BufEEE v.0.1, Excel 32bit</td>			<td><a href="tr0.1.32.xlsm">tr0.1.32.xlsm</a></td><td>2017.1.12</td></tr>-->
      <tr><td>BufEEE MAC(Marginal Abatement Curve) generator 1.0</td>			<td><a href="MACgenerator.1.0.xlsm">MACgenerator.1.0.xlsm</a></td><td>2017.01.04</td></tr>
      <tr><td>BufEEE output viewer</td>			<td><a href="http://cat.ks.ac.kr/khg/stacked_bar.html">http://cat.ks.ac.kr/khg/stacked_bar.html</a></td><td>2017.08.04</td></tr>
	</tbody>
  </table>
  
  <h3>Published(first or corresponding)</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Journal</th>
        <th>Year</th>
        <th>Sector</th>
      </tr>
    </thead>
     <tbody>
      <tr><td>Mathematical properties and constraints representation for bottom-up approaches to the evaluation of GHG mitigation policies</td>	
	  <td><a href="http://www.sciencedirect.com/science/article/pii/S1361920914000893">Transportation Research Part D</a></td><td>2014</td><td>Tr</td></tr>
      <tr><td>Investigating the length of data collection period with respect to rate constant in the first-order decay model</td>		
	  <td><a href="https://www.researchgate.net/publication/277646524_Investigating_the_length_of_data_collection_period_with_respect_to_rate_constant_in_the_first-order_decay_model">
	  Journal of Material Cycles and Waste Management</a></td><td>2015</td><td>Landfill</td></tr>
      <tr><td>전력부문 온실가스 감축정책 평가를 위한 상향식 모형화 방안</td> <td><a href="paper_2016_전력부문.pdf">에너지공학</a></td><td>2016</td><td>Elec</td></tr>
      <tr><td>MESSAGE 모델링을 이용한 승용차 부문의 그린카 도입 전망 분석</td> <td><a href="paper_2012_MESSAGE_승용.pdf">에너지공학</a></td><td>2012</td><td>Tr</td></tr>
      <tr><td>손익분기점 분석을 이용한 전기차의 보조금 정책 연구</td> <td><a href="paper_2011_전기자동차_보조금.pdf">에너지공학</a></td><td>2011</td><td>Tr</td></tr>
	</tbody>
  </table>
</div>

<?php
 
//ASSIGN VARIABLES TO USER INFO
$time = date("M j G:i:s Y"); 
$ip = getenv('REMOTE_ADDR');
$userAgent = getenv('HTTP_USER_AGENT');
$referrer = getenv('HTTP_REFERER');
$query = getenv('QUERY_STRING');


$agent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match('/Adroid/',$agent)) $os = 'Android';
elseif(preg_match('/Linux/',$agent)) $os = 'Linux';
elseif(preg_match('/Win/',$agent)) $os = 'Windows';
elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
else $os = 'UnKnown';

 
//COMBINE VARS INTO OUR LOG ENTRY
//$msg = "IP: " . $ip . " TIME: " . $time . " OS: " . getOS() . "\n"  ;
$msg = "IP: " . $ip . " TIME: " . $time . " OS: " . $os . "\n"  ;
//$msg = "IP: " . $ip . " TIME: " . $time . " REFERRER: " . $referrer . " SEARCHSTRING: " . $query . " USERAGENT: " . $userAgent . "<br>";
//echo "<br>"  . $msg . "<br>";
//CALL OUR LOG FUNCTION
writeToLogFile($msg);
 
function writeToLogFile($msg) {
    $today = date("Y_m_d"); 
//    $logfile = $today."_log.txt"; 
    $logfile = "log.txt"; 
    $dir = 'logs';
    $saveLocation=$dir . '/' . $logfile;
	//echo "<br>file open success";
	if (file_put_contents($saveLocation, $msg, FILE_APPEND)){
		echo "<br>write success";		
	}else 	echo "<br>write fail";
}
 
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}

/* return Operating System */
function operating_system_detection(){
    if ( isset( $_SERVER ) ) {
    $agent = $_SERVER['HTTP_USER_AGENT'] ;
    }
    else {
    global $HTTP_SERVER_VARS ;
    if ( isset( $HTTP_SERVER_VARS ) ) {
    $agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ;
    }
    else {
    global $HTTP_USER_AGENT ;
    $agent = $HTTP_USER_AGENT ;
    }
    }
    $ros[] = array('Windows XP', 'Windows XP');
    $ros[] = array('Windows NT 5.1|Windows NT5.1)', 'Windows XP');
    $ros[] = array('Windows 2000', 'Windows 2000');
    $ros[] = array('Windows NT 5.0', 'Windows 2000');
    $ros[] = array('Windows NT 4.0|WinNT4.0', 'Windows NT');
    $ros[] = array('Windows NT 5.2', 'Windows Server 2003');
    $ros[] = array('Windows NT 6.0', 'Windows Vista');
    $ros[] = array('Windows NT 7.0', 'Windows 7');
    $ros[] = array('Windows CE', 'Windows CE');
    $ros[] = array('(media center pc).([0-9]{1,2}\.[0-9]{1,2})', 'Windows Media Center');
    $ros[] = array('(win)([0-9]{1,2}\.[0-9x]{1,2})', 'Windows');
    $ros[] = array('(win)([0-9]{2})', 'Windows');
    $ros[] = array('(windows)([0-9x]{2})', 'Windows');
    // Doesn't seem like these are necessary...not totally sure though..
    //$ros[] = array('(winnt)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'Windows NT');
    //$ros[] = array('(windows nt)(([0-9]{1,2}\.[0-9]{1,2}){0,1})', 'Windows NT'); // fix by bg
    $ros[] = array('Windows ME', 'Windows ME');
    $ros[] = array('Win 9x 4.90', 'Windows ME');
    $ros[] = array('Windows 98|Win98', 'Windows 98');
    $ros[] = array('Windows 95', 'Windows 95');
    $ros[] = array('(windows)([0-9]{1,2}\.[0-9]{1,2})', 'Windows');
    $ros[] = array('win32', 'Windows');
    $ros[] = array('(java)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2})', 'Java');
    $ros[] = array('(Solaris)([0-9]{1,2}\.[0-9x]{1,2}){0,1}', 'Solaris');
    $ros[] = array('dos x86', 'DOS');
    $ros[] = array('unix', 'Unix');
    $ros[] = array('Mac OS X', 'Mac OS X');
    $ros[] = array('Mac_PowerPC', 'Macintosh PowerPC');
    $ros[] = array('(mac|Macintosh)', 'Mac OS');
    $ros[] = array('(sunos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'SunOS');
    $ros[] = array('(beos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'BeOS');
    $ros[] = array('(risc os)([0-9]{1,2}\.[0-9]{1,2})', 'RISC OS');
    $ros[] = array('os/2', 'OS/2');
    $ros[] = array('freebsd', 'FreeBSD');
    $ros[] = array('openbsd', 'OpenBSD');
    $ros[] = array('netbsd', 'NetBSD');
    $ros[] = array('irix', 'IRIX');
    $ros[] = array('plan9', 'Plan9');
    $ros[] = array('osf', 'OSF');
    $ros[] = array('aix', 'AIX');
    $ros[] = array('GNU Hurd', 'GNU Hurd');
    $ros[] = array('(fedora)', 'Linux - Fedora');
    $ros[] = array('(kubuntu)', 'Linux - Kubuntu');
    $ros[] = array('(ubuntu)', 'Linux - Ubuntu');
    $ros[] = array('(debian)', 'Linux - Debian');
    $ros[] = array('(CentOS)', 'Linux - CentOS');
    $ros[] = array('(Mandriva).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'Linux - Mandriva');
    $ros[] = array('(SUSE).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'Linux - SUSE');
    $ros[] = array('(Dropline)', 'Linux - Slackware (Dropline GNOME)');
    $ros[] = array('(ASPLinux)', 'Linux - ASPLinux');
    $ros[] = array('(Red Hat)', 'Linux - Red Hat');
    // Loads of Linux machines will be detected as unix.
    // Actually, all of the linux machines I've checked have the 'X11' in the User Agent.
    //$ros[] = array('X11', 'Unix');
    $ros[] = array('(linux)', 'Linux');
    $ros[] = array('(amigaos)([0-9]{1,2}\.[0-9]{1,2})', 'AmigaOS');
    $ros[] = array('amiga-aweb', 'AmigaOS');
    $ros[] = array('amiga', 'Amiga');
    $ros[] = array('AvantGo', 'PalmOS');
    //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1}-([0-9]{1,2}) i([0-9]{1})86){1}', 'Linux');
    //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1} i([0-9]{1}86)){1}', 'Linux');
    //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1})', 'Linux');
    $ros[] = array('[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3})', 'Linux');
    $ros[] = array('(webtv)/([0-9]{1,2}\.[0-9]{1,2})', 'WebTV');
    $ros[] = array('Dreamcast', 'Dreamcast OS');
    $ros[] = array('GetRight', 'Windows');
    $ros[] = array('go!zilla', 'Windows');
    $ros[] = array('gozilla', 'Windows');
    $ros[] = array('gulliver', 'Windows');
    $ros[] = array('ia archiver', 'Windows');
    $ros[] = array('NetPositive', 'Windows');
    $ros[] = array('mass downloader', 'Windows');
    $ros[] = array('microsoft', 'Windows');
    $ros[] = array('offline explorer', 'Windows');
    $ros[] = array('teleport', 'Windows');
    $ros[] = array('web downloader', 'Windows');
    $ros[] = array('webcapture', 'Windows');
    $ros[] = array('webcollage', 'Windows');
    $ros[] = array('webcopier', 'Windows');
    $ros[] = array('webstripper', 'Windows');
    $ros[] = array('webzip', 'Windows');
    $ros[] = array('wget', 'Windows');
    $ros[] = array('Java', 'Unknown');
    $ros[] = array('flashget', 'Windows');
    // delete next line if the script show not the right OS
    //$ros[] = array('(PHP)/([0-9]{1,2}.[0-9]{1,2})', 'PHP');
    $ros[] = array('MS FrontPage', 'Windows');
    $ros[] = array('(msproxy)/([0-9]{1,2}.[0-9]{1,2})', 'Windows');
    $ros[] = array('(msie)([0-9]{1,2}.[0-9]{1,2})', 'Windows');
    $ros[] = array('libwww-perl', 'Unix');
    $ros[] = array('UP.Browser', 'Windows CE');
    $ros[] = array('NetAnts', 'Windows');
    $file = count ( $ros );
    $os = '';
    for ( $n=0 ; $n<$file ; $n++ ){
    if ( preg_match('/'.$ros[$n][0].'/i' , $agent, $name)){
    $os = @$ros[$n][1].' '.@$name[2];
    break;
    }
    }
    return trim ( $os );
}
 
 
?>
</body>
</html>
