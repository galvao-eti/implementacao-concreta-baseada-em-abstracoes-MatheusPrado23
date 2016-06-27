<?php

namespace Alfa;

// classe para guardar conexao
class BaseDeDados implements Abstracao\BaseDeDados
{
    public $conexao;
    public $nome;
    public $dependencia;

    function __construct(SGBD $servidor)
    {
        $this->dependencia = $servidor;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
            $this->nome = $nome;
    }

    public function conectar()
    {
        if ($this->dependencia->tipo == 'mysql') {
            $this->conexao = mysqli_connect($this->dependencia->getEndereco(), $this->dependencia->getUsuario(), $this->dependencia->getSenha(), $this->getNome());

            if (!$this->conexao) {
                throw new \Exception(mysqli_connect_error());
            }
        }
    }

    public function desconectar()
    {
        if ($this->conexao) {
            mysqli_close($this->conexao);
            $this->conexao = NULL;
        }
    }

    public function __destruct()
    {
        $this->desconectar();
    }

    public static function log($msg)
    {
        file_put_contents('var/log/hoje.log', $msg);
    }
}