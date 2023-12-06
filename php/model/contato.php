<?php
namespace Model;

class Contato {
    
    private $email;
    private $telefone;
    private $Cliente; 

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setPessoa(\Cliente $Cliente) {
        $this->Cliente = $Cliente;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCliente() {
        if (!isset($this->Cliente)) {
            $this->Cliente = new \Cliente();
        }
        return $this->Cliente;
    }
}

?>