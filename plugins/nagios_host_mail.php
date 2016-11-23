#!/usr/bin/php -c /etc/php.ini

<?php
 
 array_shift($argv); 
 $f_notify_type =array_shift($argv);
 $f_host_name =array_shift($argv);
 $f_host_alias =array_shift($argv);
 $f_host_state =array_shift($argv);
 $f_host_address =array_shift($argv);
 $f_host_output =array_shift($argv);
 $f_long_date =array_shift($argv);
 $f_serv_desc  =array_shift($argv);
 $f_serv_state  =array_shift($argv);
 $f_to  =array_shift($argv);
 $f_totalup  =array_shift($argv);
 $f_totaldown=array_shift($argv);
 
 $subject = "$f_notify_type HOST:$f_host_name";
 
 $from  ="nagios@nag.server.com"; //The Nagios Server sending the messages
 $body = "<html><body><b>Notification: </b> <font color=#CC0000>$f_notify_type</font><br/>";
 $body .= "<b>Host: </b> <font color=#007700>$f_host_alias</font> </br>";
 $body .= "<b>Address: </b> <font color=#005555>$f_host_address</font><br/>";
 $body .= "<b>Date/Time: </b><font color=#005555>$f_long_date</font><br/>";
 $body .= "<b>More Info: </b><a href='http://www.mycms.org/cms/?Nagios:$f_serv_desc'>";
 $body .= "http://www.rezg.net/cms/?Nagios:$f_serv_desc</a><br/>";
 $body .= "<b>Additional Info: </b>$f_host_output<br/>";
 $body .= "<b>Total Servers Up: </b>$f_totalup<br/>";
 $body .= "<b>Total Servers Down: </b>$f_totaldown<br/>";
 $body .= "<b><font color=#CC0000>Actions: </font></b><a href='http://nag.server.org/nagios/cgi-bin/cmd.cgi?cmd_typ=100&host=$f_host_name&service=$f_serv_desc'><b>Stop Obsessing</b></a><br/>";
 $body .= "</body></html> \n";
 
 $headers = "From: $from\r\n";
 $headers .= "Content-type: text/html\r\n"; 
 $headers .= "MIME-Version: 1.0\r\n";
 
 /* Send eMail */
  mail($f_to, $subject, $body, $headers); 
/*
 $m_jabstr  = "echo \"**** Nagios Alert ****** \n";
 $m_jabstr .= " Notification = $f_notify_type [$f_serv_state] \n ";
 $m_jabstr .= " Service = $f_serv_desc \n ";
 $m_jabstr .= " Host = $f_host_alias \n ";
 $m_jabstr .= " Date/Time = $f_long_date \n ";
 $m_jabstr .= " Additional Info = $f_host_output \" | sendxmpp -u nagios -p nagiospwd nagalertuser@www.mywildfire.com";
 
 echo shell_exec($m_jabstr);
 */
?>
