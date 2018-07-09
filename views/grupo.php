<?php


if($viewData['member']==1)//é membro
{	
	foreach ($viewData['info'] as $g) {
	echo "<h1>Grupo:".$g['titulo']."</h1><br>";			
	}
	$qtd=$viewData['qtd_membros'];
	echo ($qtd>1)?'Membros':'Membro';
	
}else{
	foreach ($viewData['info'] as $g) {
	echo "<h1>Grupo:".$g['titulo']."</h1><br>";			
	}
	echo $viewData['membros']. " membro(s)";
	echo "<h3>Entre no grupo</h3>";		
}
?>