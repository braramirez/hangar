<?php

require_once('Facebook/FacebookSession.php');  



// datos de la aplicación que se nos facilitan cuando la registramos en Facebook 
$appapikey = '1054934174521979'; 
$appsecret = '9f25916cd25eb96bcf26061364fc6acb';

$facebook = new Facebook(array(
   'appId' => $appapikey,
   'secret' => $appsecret,
));

//obteniendo el usuario ID
$user=$facebook->getUser();
//saber si disponemos de datos del usuario 
$me=null;

//llamadas a la API
if($user){    
 try {    
  //
  $uid = $facebook->getUser();  
  
  //se procede a saber si se tiene un usuario conectado que esta autenticado 
  $me = $facebook->api('/me');    
 }    
 catch(FacebookApiException $e){    
  error_log($e);    
 }    
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
  $facebookaut = true;
  header("Location:index.html");

} else {
  $loginUrl = $facebook->getLoginUrl(array('scope' => email));


}

