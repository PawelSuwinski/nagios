<?php
 $login = 'nagiosuser';
 $password = 'password';
 $f_domain = "nagios.mycompany.com";
 
 $mnow     = time();
 $lastWeek = time() - (8 * 60 * 60);
 // 7 days; 24 hours; 60 mins; 60secs
 
 $f_host_name = $_GET['host'];  /*1*/
 $f_service = $_GET['srv'];    /*2*/
 
 $url = "http://$f_domain/pnp4nagios/image?host=".rawurlencode($f_host_name)
   .'&srv='.rawurlencode($f_service)."&view=3&source=0&start=$lastWeek&end=$mnow";
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
 $result = curl_exec($ch);
 curl_close($ch);  
 // Set the content type header - in this case image/jpeg
 header('Content-Type: image/png');
 echo($result);
?>
