<?php

    class Contato {
        private $id;
        private $nome;
        private $telefone;
        private $email;

    public function __construct($id, $nome, $telefone, $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone; 
        $this->email = $email;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getTelefone() 
    {
        return $this->telefone;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    // SETERS

    public function setNome($nome) 
    {
        return $nome > 3 ? $this->nome = $nome : false;
    }

    public function setTelefone($telefone) 
    {
        // Verificar se numero de telefone existe e é vaalido
        $this->telefone =  $telefone;
    }

    public function setEmail($email) 
    {
        // verificar se o email e válido
        $this->email = $email;
    }


    }

?>