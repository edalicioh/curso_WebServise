<?php

require_once __DIR__ . "/../objects/Curso.php";
require_once __DIR__ . "/../config/Database.php";

$conexao = Database::conectar();

$curso = new Curso($conexao);


if (count($_POST) > 0) {

    $this->nome;
    $this->descricao;

    if (isset($_GET['id'])) {
        $result = $curso->update($_GET['id']);
    } else {
        $result = $curso->insert();
    }
} else {
    if (isset($_GET['id'])) {
        $result = $curso->findById($_GET['id']);
    } elseif (isset($_GET['delete_id'])) {
        $result = $curso->delete($_GET['delete_id']);
    } else {
        $result = $curso->findAll();
    }
}

if ($result) {
    print(json_encode($result));
}
