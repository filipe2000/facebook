	<div class="row">
	<div class="col-sm-10" style="border:1px solid #ddd; width: 100%; height: 200px;">
		
	</div>
	</div>

	<div class="row">
		<div class="col-sm-2 menu-left" >
		<?php  $f="";
		if(empty($viewData['foto'])){
		$f="default.png";			
		}else{
		$f="usuario/perfil/".$viewData['foto'];		
		}
		?>
			<div class="panel widget">								  
			<a class="user_menu" href="<?php echo BASE_URL."perfil/exibir/".$viewData['id'];?>">
			<img src="<?php	echo BASE_URL.'assets/images/'.$f ; ?>" class='ft_user img-responsive img-circle'>
				<span class="nm_user"><?php echo $viewData['usuario_nome'];?></span>
			</a>	
				<form method="POST" class="addgrupo">
					<h4>Grupos</h4>					
					<?php foreach ($myGrupos as $g): ?>
						<div class="lkgrupo">
						<a href="<?php echo BASE_URL; ?>grupos/abrir/<?php echo $g['id']; ?>">
						<?php echo $g['titulo']; ?></a>
						</div>
					<?php endforeach; ?>
				</form>			
			</div>
		</div>
		<div class="col-sm-7" >
			<div class="post_area">
				<form method="POST" enctype="multipart/form-data">
				<h5>O que você está pensando?</h5>
					<textarea class="form-control" name="post"></textarea>
				
				<div class="file">
				<a href="#" class="upload">Imagem
				<input type="file" name="foto" class="opacity"></input>	
				</a>	
				</div>
				<br>	
					<input type="submit" class="btn btn-default" value="Enviar"></input>
				</form><br>
			</div>
			<!-- PIANEL FEED -->
			<div class="feed">
				<?php	
				for ($i=0;$i< count($myFeed);$i++)
				{
						$f="";
						if(empty($myFeed[$i]['ft'])){
						$f="default.png";			
						}else{
						$f="usuario/perfil/".$myFeed[$i]['ft'];		
						}
				echo '<div class="panel panel_post">';
				echo '<img src= '.BASE_URL."assets/images/".$f.' class="ft_user img-responsive img-circle">';
				echo '<div class="nmdt"><span class="nome_feed"><strong>'.$myFeed[$i]['nome'].'</strong></span><br>'.date("d M H:i",strtotime($myFeed[$i]['dt_criado'])).'<br></div>';
					if($myFeed[$i]['tipo']=='foto'){
					echo '
					<div class="img_post"><img src='.BASE_URL.'assets/images/posts/'.$myFeed[$i]["url"].' id="fpost" class="foto_feed" style="max-width:96%; max-height:400px"></div><br>';
					}
				echo '<div class="texto_feed">'.$myFeed[$i]['texto'].'</div>'; ?>
				
		<div class="cont">
			<div class="lcc flk" onclick="curtir(this)" 
			<?php echo ($myFeed[$i]['liked']=='0')?'':' style="color: #4267b2;font-weight:bold;"';?>
			data-id="<?php echo $myFeed[$i]['id']; ?>" 
			data-likes="<?php echo $myFeed[$i]['likes']; ?>" 
			data-liked="<?php echo $myFeed[$i]['liked']; ?>">
				(<?php echo $myFeed[$i]['likes']; ?>)
				<i class="far fa-thumbs-up" 
				<?php echo ($myFeed[$i]['liked']=='0')?'':' style="color: #4267b2;font-weight:bold;"';?>>
				Curtir</i>
					<div class="flkc">
					<?php 			
					for($a=0;$a< count($myFeed[$i]['nlk']);$a++){
						$nm=$myFeed[$i]['nlk'][$a]['n'];
						echo $nm."<br>";				
					}					
					?>
					</div>
			</div>
			<div class="lcc"><i class="far fa-comment-alt" 
			onclick="displayComent(this)">Comentar</i></div>
			<div class="lcc"><i class="far fa-share-square">Compartilhar</i></div>
		</div><!-- add comentario -->
			<div class="coment_area">
			<textarea class="form-control coment_txt" autofocus="true"></textarea>				
			<input type="submit" class="btn btn-default" value="Enviar"
			data-id="<?php echo $myFeed[$i]['id']; ?>" onclick="comentar(this)"></input>
			</div>							
			<?php	
			//se a chave coments não é vazia			
if(!empty($myFeed[$i]['coments']))
{
	for ($c=0;$c< count($myFeed[$i]['coments']);$c++){

		$f="";
		if(empty($myFeed[$i]['coments'][$c]['foto'])){
		$f=BASE_URL."assets/images/default.png";			
		}else{
		$f=BASE_URL."assets/images/usuario/perfil/".$myFeed[$i]['coments'][$c]['foto'];		
		}
		echo '<ul class="panel penel-coment"><li>';	
		echo '<img src="'.$f.'"" class="ft_userc img-responsive img-circle">';			
		echo '<div>
			 <span class="nome_feed">'.$myFeed[$i]['coments'][$c]['user'].
			'</span> &nbsp;<span>'.$myFeed[$i]['coments'][$c]['texto'].'</span>
			 </div>';		
		echo '</li></ul>';				
	}
}
				?>
		</div>
		<?php	}//for feed		?>
	</div>


		</div>
		<div class="col-sm-3 menu-right" >
		<div class="panel widget">
			<h4>Total de amigos</h4>
			<?php  echo $totalAmigos." "; ?>amigo<?php echo ($totalAmigos=='1')?'':'s';?> 
			<?php  echo  "<br>"; ?>
			<?php echo "<ul class='list-group'>";		
			foreach ($friends as $my): ?>
			<a href="<?php echo BASE_URL."perfil/exibir/".$my['id']; ?>" class="list-group-item">
			<?php
				$f="";
				if(empty($my['foto'])){
				$f="default.png";			
				}else{
				$f="usuario/perfil/".$my['foto'];		
				}
			?>
				
					<img src="<?php	echo BASE_URL.'assets/images/'.$f ; ?>" 
					class="ft_user"> - 				
					<?php echo $my['nome']; ?>
			</a>
			<?php endforeach; echo "</ul>"; ?>
			

		</div>
		</div>
	</div>
	

