<?php
namespace Alfa; 

abstract class Entidade implements Abstracao\Entidade
{   
    public static $dependencia;
    public $nomeTabela;
    public function __construct(BaseDeDados $base)
    {
        self::$dependencia = $base;
    }
    abstract public function setNome($nome);
    abstract public function getNome();
    abstract public function create($colunas, $valores);
    abstract public function retrieve($colunas, $clausula);
    abstract public function update($colunas, $valores, $clausula);
    abstract public function delete($clausula);
}