<?php
session_start();
include 'conexao.php';


function limparDados($dados, $conn):mixed {
    return $conn->real_escape_string(trim(string: $dados));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = limparDados(dados: $_POST['email'], conn: $conn);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare(query: "SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param(types: "s", var: &$email);
    $stmt->execute();
    $result = $stmt->get_result();

    if
}