<?php
/*
##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                       Free Content / Management System                 #
#                                   /                                    #
#                                                                        #
#                                                                        #
#   Copyright 2005-2010 by webspell.org                                  #
#                                                                        #
#   visit webSPELL.org, webspell.info to get webSPELL for free           #
#   - Script runs under the GNU GENERAL PUBLIC LICENSE                   #
#   - It's NOT allowed to remove this copyright-tag                      #
#   -- http://www.fsf.org/licensing/licenses/gpl.html                    #
#                                                                        #
#   Code based on WebSPELL Clanpackage (Michael Gruber - webspell.at),   #
#   Far Development by Development Team - webspell.org                   #
#                                                                        #
#   visit webspell.org                                                   #
#                                                                        #
##########################################################################

##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                            Society / Edition                           #
#                                   /                                    #
#                                                                        #
#   modified by webspell|k3rmit (Stefan Giesecke) in 2009                #
#                                                                        #
#   - Modifications are released under the GNU GENERAL PUBLIC LICENSE    #
#   - It is NOT allowed to remove this copyright-tag                     #
#   - http://www.fsf.org/licensing/licenses/gpl.html                     #
#                                                                        #
##########################################################################
*/

$servertypes=array('ts'=>'Teamspeak', 'vent'=>'Ventrilo', 'mumble'=>'Mumble');

$result=safe_query("SELECT * FROM ".PREFIX."servers ORDER BY sort");
$n=1;
while($row=mysql_fetch_array($result)) {
	echo '<table width="100%" cellspacing="0" cellpadding="2" border="0">';
	
	$servername = htmloutput($row['name']);
	$serverip=$row['ip'];
	$servertype=$servertypes[$row['game']];
	switch ($row['game']) {
		case 'ts':
			$protocol='teamspeak://';
		break;
	  
		case 'vent':
			$protocol='ventrilo://';
		break;
		
		case 'mumble':
			$protocol='mumble://';
		break;
		
		default:
		  $protocol='';
		break;
	}
	
  
  if($n%2) {
    $bg1=BG_1;
    $bg2=BG_2;
  }
  else {
    $bg1=BG_3;
    $bg2=BG_4;
  }
  
  eval ("\$sc_servers = \"".gettemplate("sc_servers")."\";");
	echo $sc_servers;
  $n++;
  
  echo '</table>';
}
?>