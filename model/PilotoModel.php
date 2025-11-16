<?php
// model/PilotoModel.php
require_once 'Piloto.php';
require_once 'Conexao.php';

class PilotoModel {
    private $pdo;

    public function __construct() { // [cite: 34]
        $this->pdo = Conexao::conectar();
    }

    // CREATE [cite: 35]
    public function inserir(Piloto $piloto) {
        try {
            $sql = "INSERT INTO pilotos (nomePiloto, personagem, kart, numero) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute([
                $piloto->getNomePiloto(),
                $piloto->getPersonagem(),
                $piloto->getKart(),
                $piloto->getNumero()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir piloto: " . $e->getMessage();
            return false;
        }
    }

    // READ (Listar Todos) [cite: 36]
    public function listarTodos() {
        try {
            $sql = "SELECT * FROM pilotos ORDER BY numero";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar pilotos: " . $e->getMessage();
            return [];
        }
    }

    // READ (Buscar por Nome) [cite: 37]
    public function buscarPorNome($nome) {
        try {
            $sql = "SELECT * FROM pilotos WHERE nomePiloto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar piloto: " . $e->getMessage();
            return false;
        }
    }

    // UPDATE [cite: 38, 67]
    public function atualizar($nomePiloto, $novoPersonagem, $novoKart) {
        try {
            $sql = "UPDATE pilotos SET personagem = ?, kart = ? WHERE nomePiloto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$novoPersonagem, $novoKart, $nomePiloto]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Erro ao atualizar piloto: " . $e->getMessage();
            return false;
        }
    }

    // DELETE [cite: 39, 68]
    public function excluirPorNome($nome) {
        try {
            $sql = "DELETE FROM pilotos WHERE nomePiloto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Erro ao excluir piloto: " . $e->getMessage();
            return false;
        }
    }

    // COUNT [cite: 40, 59]
    public function contarTotal() {
        try {
            $sql = "SELECT COUNT(*) as total FROM pilotos";
            $stmt = $this->pdo->query($sql);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int)$resultado['total'];
        } catch (PDOException $e) {
            echo "Erro ao contar pilotos: " . $e->getMessage();
            return 0;
        }
    }
}
?>