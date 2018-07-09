<?php
//fundamento e base do sistema, mecanismo para dar inicio ao sistema
class Core{
	//pega a url chamada	
	public function run(){
		//verificar conteúdo da url
		$url='/';
		$params=array();
		if(isset($_GET['url'])){
			$url.=$_GET['url'];
		}
		if(!empty($url) && $url != '/'){
			$url= explode('/', $url);			
			//remover o 1º item que vem vazio, Array ( [0] => [1] => home )
			array_shift($url); //remove último array_pop(array)
			$currentController=$url[0]."Controller";
			//ja utilizou o controller, retirá-lo do array
			array_shift($url);
			//se existir algo na action
			if(isset($url[0]) && !empty($url[0])){
				$currentAction=$url[0];
				array_shift($url);//remover este para sobrar só paramnetro se existir
			}else{//se não há ação, segue a padrão
				$currentAction='index';
			}

			if (count($url)>0) {
				$params=$url;
			}
		}else{
			$currentController="homeController";
			$currentAction="index";
		}


		//instanciar o controller criado, $currentController  ()
		$c=new $currentController();
		//função php que pega a classe e executa sua action, com parametros
		call_user_func_array(array($c,$currentAction),$params);
		
	}
}
