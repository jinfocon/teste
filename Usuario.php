<?php

class Usuario
{
    private $telefone;
    private $data_cadastro;
    private $nome;
    private $nivel;

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function preencherDados($nome, $telefone, $nivel)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->nivel = $nivel;
    }

    public function cadastrar()
    {
        if (empty($this->nome) || empty($this->telefone) || empty($this->nivel->getNivel())) {
            throw new Exception("Nome, telefone e nível devem ser preenchidos.");
        }

        $this->data_cadastro = date('Y-m-d H:i:s');
    }
}
