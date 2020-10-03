<?php
$cliente = new SoapClient('https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');


$func = 'consultaCEP';

$params = [

    'consultaCEP' => [
        'cep' => '88345-227'
    ]
];

$options = ['https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl'];

$result = $cliente->__soapCall(
    $func,
    $params,
    $options,
);

print_r($result);
