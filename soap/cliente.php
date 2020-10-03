<?php
//*****************//
// C L I E N T E   //
//*****************//

//incluindo a biblioteca
require_once 'nusoap-0.9.5/lib/nusoap.php';
$wsdl = 'http://localhost/edalicio/webService/soap/servidor.php?wsdl';
$cliente = new nusoap_client($wsdl, 'wsdl');

$funcao = 'getNome';
$params = array('id' => 1);

$result = $cliente->call($funcao, $params);
echo ('<pre>');
print_r($cliente->return);

$result = $cliente->call('getEndereco', $params);
echo ('<pre>');
print_r($cliente->return);

$result = $cliente->call('getCurso', $params);
echo ('<pre>');
print_r($cliente->return);
