<?php
// model/Conexao.php

class Conexao {
    private static $pdo;

    // Altere conforme seu setup do XAMPP
    private static $host = 'localhost';
    private static $dbname = 'pilotoskart_mvc'; // O banco que criamos
    private static $usuario = 'root';
    private static $senha = ''; // Senha padrão do XAMPP é vazia

    public static function conectar() {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", 
                                    self::$usuario, 
                                    self::$senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>