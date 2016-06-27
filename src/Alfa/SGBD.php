<?php

namespace Alfa;
// nameespace = espaço nomeado
class SGBD implements Abstracao\SGBD
{
    protected $endereco;
    protected $porta;
    public $senha;
    public $usuario;
    public $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getPorta()
    {
        return $this->porta;
    }

    public function setPorta($porta)
    {
        if(is_numeric($porta)) {
            $this->porta = $porta;
        }
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
            $this->usuario = $usuario;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
            $this->senha = $senha;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
}