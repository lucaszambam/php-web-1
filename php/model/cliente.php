<?php
namespace Model;

class Cliente {

    private $codigo;
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $Contato;

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getContato() {
        if (!isset($this->Contato)) {
            require_once('contato.php');
            $this->Contato = new Contato();
        }
        return $this->Contato;
    }
}

?>