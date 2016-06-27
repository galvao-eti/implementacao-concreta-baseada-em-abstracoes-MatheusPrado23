<?php
require 'autoload.php';

use Alfa\SGBD;
use Alfa\BaseDeDados;
use Alfa\Produto;

$servidor = new SGBD('mysql');
$servidor->setEndereco('localhost');
$servidor->setPorta(3306);
$servidor->setUsuario('root');
$servidor->setSenha('root');

$base = new BaseDeDados($servidor);
$base->setNome('alfa_oo');

try {
	$base->conectar();
} catch (Exception $e) {
	echo $e->getMessage();
}

$produto = new Produto($base);
$produto->setNome('produto');


try{
	$produto->create(array("nome","preco"),array("Geladeinha",90));

	$produto->update('preco',9999,'id=40');
	$produto->delete('id in (140,142)');

} catch (Exception $e) {
	echo $e->getMessage();
}
	$t = $produto->retrieve('*','order by nome ');
		echo
		'<table>'.
		  '<thead>'.
			'<tr>'.
                 '<th> ID </th>'.
				 '<th> Nome </th>'.
            	 '<th> Preco </th>';
        	 '</tr>'.
        '</thead>'.
        '<tbody>';
	while (($row = mysqli_fetch_array($t))) {
		echo '<tr>'.
			 '<td>'.$row[0]. '</td>'.
			 '<td>'.$row[1]. '</td>'.
             '<td>'.$row[2]. '</td>'.
             '</tr>';
    }
    echo '</tbody>'.
    '</table>';
    

$base->desconectar();