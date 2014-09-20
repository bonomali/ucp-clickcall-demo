<?php

global $php_errormsg;

// Send the XML post request to UCP
function _post_request($url, $data, $optional_headers = NULL) {
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== NULL) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', FALSE, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

// Add header to the response
header("Content-type: text/xml");

// Load xml data
$data = file_get_contents('php://input');

// Split the data
$xml = simplexml_load_string($data);
$ucpxml = (string) $xml->ucpxml;
$ucpurl = $xml->ucpurl;

// Post XML
try {
    $response = _post_request($ucpurl, $ucpxml);
} catch (Exception $e) {
    print '<error>' . $e->getMessage() . '</error>';
}


// Log to file
$file = 'log/log.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= date("Y-m-d H:i:s") . " " . $ucpurl . " " . $ucpxml . " " . $response  . "\n";
// Write the contents back to the file
file_put_contents($file, $current);


print $response;