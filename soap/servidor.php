<?php
//*****************//
// S E R V I D O R //
//*****************//

//incluindo a biblioteca
require_once 'nusoap-0.9.5/lib/nusoap.php';
require_once '../config/Database.php';
require_once '../objects/Curso.php';




//instancia, configura o WSDL e o NameSpace
$server = new soap_server();
$server->configureWSDL('WebService', 'urn:ifc.webserver');
$server->wsdl->schemaTargetNamespace = 'urn:ifc.webserver';

$server->wsdl->addComplexType(
    'Curso',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array(
            'name' => 'id',
            'type' => 'xsd:int'
        ),
        'nome' => array(
            'name' => 'nome',
            'type' => 'xsd:string'
        ),
        'descricao' => array(
            'name' => 'descricao',
            'type' => 'xsd:string'
        ),
    )
);

$server->register(
    'getNome',
    array('id' => 'xsd:int'),
    array('Dados' => 'xsd:string')
);

$server->register(
    'getEndereco',
    array('id' => 'xsd:int'),
    array('Endereco' => 'xsd:string')
);

$server->register(
    'getCurso',
    array('id' => 'xsd:int'),
    array('Curso' => 'tns:Curso')

);

function getNome($id)
{
    if ($id == 1) {
        $dados = 'Bruce Banner';
    } else {
        $dados = 'Homer Simpson';
    }
    return $dados;
}

function getEndereco($id)
{
    if ($id == 1) {
        $dados = 'Terra-616';
    } else {
        $dados = 'Evergreen Terrace, 632';
    }
    return $dados;
}

function getCurso($id)
{
    $conexao = Database::conectar();
    $curso = new Curso($conexao);
    $result = $curso->findById($id);
    foreach ($result as $r) {
        $dados = $r;
    }
    return $dados;
}


//os dados brutos da requisição
$dados = file_get_contents('php://input');
//inicia o serviço
$server->service($dados);
