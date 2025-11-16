<?php
// index.php (Router / Front-Controller)

require_once 'controller/PilotoController.php';

$controller = new PilotoController();

// Define a ação baseando-se no parâmetro 'acao' da URL
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'index';

switch ($acao) {
    case 'cadastrar':
        $controller->cadastrarForm();
        break;
    case 'salvar':
        $controller->salvar(); // [cite: 63]
        break;
    case 'editar':
        $controller->editarForm();
        break;
    case 'atualizar':
        $controller->atualizar(); // [cite: 64]
        break;
    case 'excluir':
        $controller->excluir(); // [cite: 64]
        break;
    case 'index':
    default:
        $controller->index(); // Ação 'Read' [cite: 66]
        break;
}
?>