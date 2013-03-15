<?php
  
$x_user = $_GET['x_user'];
$x_pass = $_GET['x_pass'];

$proxy_user = $_GET['proxy_user'];
$proxy_pass = $_GET['proxy_pass'];

//$curl = curl_init('http://hatmsg025/exchange/Todd.Halfpenny/Calendar/?Cmd=contents');
$curl = curl_init('http://localhost/powa/sim_cal.html');

curl_setopt($curl, CURLOPT_FAILONERROR, true); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
curl_setopt($curl, CURLOPT_PROXY, 'proxy:8080');
curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxy_user . ':' . $proxy_pass);
curl_setopt($curl, CURLOPT_USERPWD, $x_user . ':' . $x_pass);  
//curl_setopt($curl, CURLOPT_HEADER, true); 
$result = curl_exec($curl); 
curl_close($curl);


// S T A T U S    C O D E    S T U F F 
//$status_code = array(); 
//preg_match('/\d\d\d/', $result, $status_code); 
//switch( $status_code[0] ) {
//       case 200:
       // Success
//       break;
//       case 503:
//       die('Your call to Yahoo Web Services failed and returned an HTTP status of 503. That means: Service unavailable. An internal problem prevented us from returning data to you.');
//       break;
//       case 403:
//       die('Your call to Yahoo Web Services failed and returned an HTTP status of 403. That means: Forbidden. You do not have permission to access this resource, or are over your rate limit.');
//       break;
//       case 400:
//       die('Your call to Yahoo Web Services failed and returned an HTTP status of 400. That means:  Bad request. The parameters passed to the service did not match as expected. The exact error is returned in the XML response.');
//       break;
//       default:
//       die('Your call to Yahoo Web Services returned an unexpected HTTP status of:' . $status_code[0]);
//    }


// D O M    S C R A P I N G
include('simple_html_dom.php'); 
$html = new simple_html_dom();
$html->load($result);

$res = $html->find('table', 4);

// Find all article blocks
foreach($res->find('tr') as $entry) {
    $tmp_date = $entry->find('td', 0)->plaintext;
    if ($tmp_date != "") {     
        $item['date']     = $entry->find('td', 0)->plaintext;
    } else {
     $item['date'] = $item['date'];
    }
    $item['time']     = $entry->find('td', 1)->plaintext;
    $item['subject']  = $entry->find('td', 2)->plaintext;
    $anchor           = $entry->find('a', 0);
    $item['href']     = $anchor->href; 
    $item['location'] = $entry->find('td', 3)->plaintext;
    $entries[] = $item;
}

print_r($entries);

//echo $rows; 

?>