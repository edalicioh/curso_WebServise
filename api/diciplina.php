<?php

require_once __DIR__ . "/../objects/Disciplina.php";
require_once __DIR__ . "/../config/Database.php";

$conexao = Database::conectar();

$disciplina = new Disciplina($conexao);


if (count($_POST) > 0) {
    $disciplina->nome = $_POST['nome'];
    $disciplina->codigo = $_POST['codigo'];
    $disciplina->carga = $_POST['carga'];
    $disciplina->ementa = $_POST['ementa'];
    $disciplina->semestre = $_POST['semestre'];
    $disciplina->idCurso = $_POST['id_curso'];


    if (isset($_GET['id'])) {
        $result = $disciplina->update($_GET['id']);
    } else {
        $result = $disciplina->insert();
    }
} else {
    if (isset($_GET['semestre'])) {
        $result = $disciplina->readSemestre($_GET['semestre']);
    } elseif (isset($_GET['id'])) {
        $result = $disciplina->delete($_GET['id']);
    } else {
        $result = $disciplina->findAll();
    }
}

if ($result) {
    print(json_encode($result));
}
