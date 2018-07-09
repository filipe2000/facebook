

	<div class="row">
		<div class="col-sm-2 menu-left" >
		<?php  
		$f="";
		if(empty($viewData['foto'])){
		$f="default.png";			
		}else{
		$f="usuario/perfil/".$viewData['foto'];		
		}
		?>
			<div class="panel widget">
			<a class="user_menu" href="<?php  echo BASE_URL."perfil/exibir/".$_SESSION['lgsocial']; ?>">
			<img src="<?php	echo BASE_URL.'assets/images/'.$f ; ?>" class='ft_user img-responsive img-circle'>
				<span class="nm_user"><?php echo $viewData['usuario_loged'];?></span>
			</a>	
				<form method="POST" class="addgrupo">
					<h4>Grupos</h4>
					<div class="input-group">
						<input type="text" name="grupo" class="form-control" placeholder="Novo grupo"></input>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"> 
								<i class="fas fa-users icon ac" title="Criar"></i>
							</button>
						</span>						
					</div>
					<ul class="list-group lkgrupo">
					<?php foreach ($viewData['grupos'] as $g): ?>						
						<a href="<?php echo BASE_URL; ?>grupos/abrir/<?php echo $g['id']; ?>" 
						class="list-group-item" >
						<?php echo $g['titulo']; ?></a>						
					<?php endforeach; ?>
					</ul>
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
for($i=0;$i<count($feed);$i++)
{
		$f="";
		if(empty($feed[$i]['ft'])){
		$f="default.png";			
		}else{
		$f="usuario/perfil/".$feed[$i]['ft'];		
		}

	?>	
	<div class="panel panel_post"> 
	<img src="<?php	echo BASE_URL.'assets/images/'.$f; ?>" class='ft_user img-responsive img-circle'>
	<div class="nmdt"><span class="nome_feed"><span><?php echo $feed[$i]['nome']; ?>
		</span></span><br><?php echo date("d M H:i",strtotime($feed[$i]['dt_criado']));?>
		<br></div>
		<?php if($feed[$i]['tipo']=='foto'){ ?>
		<div class="img_post">
		<img src="<?php echo BASE_URL.'assets/images/posts/'.$feed[$i]['url'];?>" id="fpost" class="foto_feed" style="max-width:96%; max-height:400px"></div><br>
		

	<?php	}
	echo '<div class="texto_feed">'.$feed[$i]['texto'].'</div>'; ?>
	
		<div class="cont">
			<div class="lcc flk" onclick="curtir(this)"
			<?php echo ($feed[$i]['liked']=='0')?'':' style="color: #4267b2;font-weight:bold;"';?>
			data-id="<?php echo $feed[$i]['id']; ?>" 
			data-likes="<?php echo $feed[$i]['likes']; ?>" 
			data-liked="<?php echo $feed[$i]['liked']; ?>">
				(<?php echo $feed[$i]['likes']; ?>)
				<i class="far fa-thumbs-up"
				<?php echo ($feed[$i]['liked']=='0')?'':' style="color: #4267b2;font-weight:bold;"';?>>
				Curtir</i>
					<div class="flkc">
					<?php 			
					for($a=0;$a< count($feed[$i]['nlk']);$a++){
						$nm=$feed[$i]['nlk'][$a]['n'];
						echo $nm."<br>";				
					}					
					?>
					</div>
			</div>
			<div class="lcc"><i class="far fa-comment-alt" 
			onclick="displayComent(this)">Comentar</i></div>
			<div class="lcc"><i class="far fa-share-square">Compartilhar</i></div>
		</div>
		
			<?php	
			//se a chave coments não é vazia			
if(!empty($feed[$i]['coments']))
{
	for ($c=0;$c< count($feed[$i]['coments']);$c++){

		$f="";
		if(empty($feed[$i]['coments'][$c]['foto'])){
		$f=BASE_URL."assets/images/default.png";			
		}else{
		$f=BASE_URL."assets/images/usuario/perfil/".$feed[$i]['coments'][$c]['foto'];		
		}
		echo '<ul class="panel penel-coment"><li>';			
		echo '<img src="'.$f.'"" class="ft_userc img-responsive img-circle">';
		echo '<div>
			<span class="nome_feed">'.$feed[$i]['coments'][$c]['user'].
			'</span> &nbsp;<span>'.$feed[$i]['coments'][$c]['texto'].'</span>
			 </div>';		
		echo '</li></ul>';				
	}
}
				?>
				<!-- add comentario -->
			<div class="coment_area">
			<textarea class="form-control coment_txt" autofocus="true"></textarea>				
			<input type="submit" class="btn btn-default" value="Enviar"
			data-id="<?php echo $feed[$i]['id']; ?>" onclick="comentar(this)"></input>
			</div>	
		</div><!-- panel post-->
		<?php	
}//for feed		?>
	</div>


		</div>
		<div class="col-sm-3 menu-right" >
		<div class="panel widget">
			<h4><?php  echo $totalAmigos." "; ?> AMIGO<?php echo ($totalAmigos=='1')	?'':'S';?> </h4>
			
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
					class="ft_user">				
					<?php echo " ".$my['nome']; ?>
			</a>
			<?php endforeach; echo "</ul>"; ?>
			
		</div>
		<?php if(count($requisicoes) >0): ?>
			<div class="panel widget">
				<h4>Requisições de Amizade</h4>
				<?php  echo "<ul class='req'>"; 
				foreach ($requisicoes as $req): ?>
				<a href="<?php echo BASE_URL."perfil/exibir/".$req['id']; ?>" 
				class="list-group-item requisicaoItem">
					<span class="nm"> <?php echo $req['nome']; ?> </span>
					<button class="btn btn-default " 
					onclick="aceitarFriend('<?php echo $req['id'];?>',this)">
					<i class="fas fa-user-check pull-right icon ac" title="Aceitar"></i></button>
					<button class="btn btn-default " 
					onclick="recusarFriend('<?php echo $req['id'];?>',this)">
					<i class="fas fa-user-times pull-right icon rec" title="Recusar" ></i></button>		
				</a>				
				<?php endforeach; echo "</ul>"; ?>
			</div>
		<?php endif; ?>

		
		<?php if(count($sugestoes) >0): ?>
			<div class="panel widget">
				<h4>Sugestões Amizade</h4>			
				<?php echo "<ul class='req'>";
				foreach ($sugestoes as $sug): ?>
				<a href="<?php echo BASE_URL."perfil/exibir/".$sug['id']; ?>" 
				class="list-group-item sugestaoItem">
				<span class="nm"> <?php echo $sug['nome']; ?></span>
				<button class="btn btn-default" onclick="addFriend('<?php echo $sug['id'];?>',this)">
					<i class="fas fa-user-plus pull-right icon ac" title="Adicionar" ></i></button>		
				</a>				
				<?php endforeach; echo "</ul>"; ?>
			</div>
		<?php endif; ?>	
		</div>
	</div>

