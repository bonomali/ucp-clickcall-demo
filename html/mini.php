<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Minimal UCP Clickcall Demo">
  <meta name="author" content="Olle Sjögren, Licencia Telecom AB, 2014">
  <title>Clickcall Web Service Demo</title>
  <style type="text/css"> 
    input { display: block; margin-bottom: 10px; width: 200px; }
    .message { color: red; }
  </style>  
</head>  
<body>
<h2>Minimal UCP Clickcall Demo</h2>
<form action="mini.php" method="post" enctype="multipart/form-data">            
  <input type="text" class="form-control input-lg" name="ip" placeholder="UCP IP Address" required>
  <input type="number" class="form-control input-lg" name="port" placeholder="Port" value="7878">
  <input type="text" class="form-control input-lg" name="username" placeholder="User name" required>
  <input type="number" class="form-control input-lg" name="extension" placeholder="Extension number" required>
  <input type="text" class="form-control input-lg" name="password" placeholder="Password" required>
  <input type="number" class="form-control input-lg" name="callto" placeholder="Phone number" required>           
  <button type="submit">Call</button>
</form> 
<?php 
function _post_request($url, $data, $optional_headers = NULL) {
  $params = array('http' => array('method' => 'POST', 'content' => $data));
  if ($optional_headers !== NULL) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', FALSE, $ctx);
  $response = @stream_get_contents($fp);
  return $response;
}
$message = '-';
if (!empty($_POST['ip'])) {
  $xmldata = '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE ipecs_svc SYSTEM "iPECSService.dtd"><ipecs_svc><request type="service" encrypt="off" servicename="clicktocall"><clicktocall>';
  $xmldata .= '<userinfo><stnnum>' . $_POST['extension'] . '</stnnum><userid>' . $_POST['username'] . '</userid><userpwd encrypt="off">' . $_POST['password'] . '</userpwd></userinfo>';
  $xmldata .= '<srcinfo><dialnum>' . $_POST['extension'] . '</dialnum></srcinfo>';
  $xmldata .= '<destinfo calltype="single"><dialnum>' . $_POST['callto'] . '</dialnum></destinfo>';
  $xmldata .= '</clicktocall></request></ipecs_svc>';
  $url = "https://" . $_POST['ip'] . ":" . $_POST['port'] . "/ipecs_svc";
  $response = _post_request($url, $xmldata);
  if ($response === FALSE) {
    $message = $php_errormsg;
  }
  else {
    $xml = simplexml_load_string($response);
    $message = (string) $xml->response->clicktocall_r->message;
  }
}
?>
<h3>Result: <span class="message"><?php if ($message) {print $message;} ?></span></h3>
<p>An example based on AJAX and Bootstrap can be found at <a href="http://www.licab.se/clickcall">http://www.licab.se/clickcall</a>.</p>
<p>By <a href="mailto:olle.sjogren@licencia.se" target="_top">Olle Sjögren</a>, 2014. <a href="http://www.licencia.se">Licencia Telecom AB</a> distributor for 
<a target="_blank" href="https://www.ericssonlg-enterprise.com/" title="www.ericssonlg-enterprise.com"> Ericsson-LG Enterprise</a> in Sweden.</p>
</body>
</html>