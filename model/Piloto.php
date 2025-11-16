<?php
// model/Piloto.php

class Piloto {
    private $id;
    private $nomePiloto;
    private $personagem;
    private $kart;
    private $numero;

    // Construtor [cite: 15]
    public function __construct($nomePiloto, $personagem, $kart, $numero, $id = null) {
        $this->nomePiloto = $nomePiloto;
        $this->personagem = $personagem;
        $this->kart = $kart;
        $this->numero = $numero;
        $this->id = $id;
    }

    // Getters [cite: 16-20]
    public function getId() { return $this->id; }
    public function getNomePiloto() { return $this->nomePiloto; }
    public function getPersonagem() { return $this->personagem; }
    public function getKart() { return $this->kart; }
    public function getNumero() { return $this->numero; }

    // Setters [cite: 21-25]
    public function setId($id) { $this->id = $id; }
    public function setNomePiloto($nomePiloto) { $this->nomePiloto = $nomePiloto; }
    public function setPersonagem($personagem) { $this->personagem = $personagem; }
    public function setKart($kart) { $this->kart = $kart; }
    public function setNumero($numero) { $this->numero = $numero; }
}
?>