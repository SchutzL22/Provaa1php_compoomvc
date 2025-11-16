<?php
// controller/PilotoController.php
require_once 'model/PilotoModel.php';
require_once 'model/Piloto.php';

class PilotoController {
    private $model;

    public function __construct() {
        $this->model = new PilotoModel();
    }

    // Ação Padrão: Listar todos
    public function index() {
        $pilotos = $this->model->listarTodos();
        $totalPilotos = $this->model->contarTotal();
        
        // Carrega a view de listagem
        require 'view/listagem.php';
    }

    // Ação: Mostrar formulário de cadastro
    public function cadastrarForm() {
        $tituloPagina = "Cadastrar Novo Piloto";
        $acaoFormulario = "index.php?acao=salvar";
        $botaoFormulario = "Cadastrar";
        $piloto = null; // Nenhum piloto para preencher o form
        
        require 'view/formulario.php';
    }

    // Ação: Salvar novo piloto (CREATE) [cite: 63]
    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nomePiloto'];
            $personagem = $_POST['personagem'];
            $kart = $_POST['kart'];
            $numero = (int)$_POST['numero'];

            $novoPiloto = new Piloto($nome, $personagem, $kart, $numero);
            $this->model->inserir($novoPiloto);
            
            header('Location: index.php'); // Redireciona para a listagem
            exit();
        }
    }

    // Ação: Mostrar formulário de edição (UPDATE) [cite: 64]
    public function editarForm() {
        if (isset($_GET['nome'])) {
            $nome = $_GET['nome'];
            $piloto = $this->model->buscarPorNome($nome);

            if ($piloto) {
                $tituloPagina = "Editar Piloto: " . htmlspecialchars($piloto['nomePiloto']);
                $acaoFormulario = "index.php?acao=atualizar";
                $botaoFormulario = "Atualizar Piloto";
                
                require 'view/formulario.php';
            } else {
                echo "Piloto não encontrado!";
                echo '<br><a href="index.php">Voltar</a>';
            }
        }
    }

    // Ação: Atualizar piloto (UPDATE) [cite: 64]
    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomeOriginal = $_POST['nomeOriginal'];
            $novoPersonagem = $_POST['personagem'];
            $novoKart = $_POST['kart'];

            $this->model->atualizar($nomeOriginal, $novoPersonagem, $novoKart);
            
            header('Location: index.php'); // Redireciona para a listagem
            exit();
        }
    }

    // Ação: Excluir piloto (DELETE) [cite: 64, 68]
    public function excluir() {
        if (isset($_GET['nome'])) {
            $nome = $_GET['nome'];
            $this->model->excluirPorNome($nome);
            
            header('Location: index.php'); // Redireciona para a listagem
            exit();
        }
    }
}
?>