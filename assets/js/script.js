function addFriend(id,obj){
	//remover o item clicado, animar subindo
	$(obj).closest('.sugestaoItem').slideUp();
	$.ajax({
		type:'POST',
		url:'ajax/addFriend',
		data:{id:id},
		success:function(){
			window.location.reload();
		}
	});
}
function aceitarFriend(id,obj){
	//aceitar amigo clicado, animar subindo
	$(obj).closest('.requisicaoItem').slideUp();
	$.ajax({
		type:'POST',
		url:'ajax/aceitarFriend',
		data:{id:id},
		success:function(){
			window.location.reload();
		}
		
	});
}
function recusarFriend(id,obj){
	//aceitar amigo clicado, animar subindo
	$(obj).closest('.requisicaoItem').slideUp();
	$.ajax({
		type:'POST',
		url:'ajax/recusarFriend',
		data:{id:id},
		success:function(){
			window.location.reload();
		}
		
	});
}


function curtir(obj){//home
	var id = $(obj).attr('data-id');
	var likes =parseInt($(obj).attr('data-likes'));
	var liked =parseInt($(obj).attr('data-liked'));	
	//var icon="<i class='far fa-thumbs-up'><?php echo ($f['liked']=='0')?' Curtir':' Descurtir';?></i>";
	if(liked==0){
		likes++;
		liked=1;
		$.ajax({
		type:'POST',
		url:'ajax/curtir',
		data:{id:id},
		success:function(){
			window.location.reload();
			}
		});
		
	}else{
		likes--;
		liked=0;
		$.ajax({
		type:'POST',
		url:'ajax/descurtir',
		data:{id:id},
		success:function(){			
			window.location.reload();
			}
		});

	}
	$(obj).attr('data-likes',likes);
	$(obj).attr('data-liked',liked);
	//alert('Post: '+id+' - Likes: '+likes+' - Liked: '+liked);
	
}


 function displayComent(obj){
 	$(obj).closest('.panel_post').find('.coment_area').show();
 }
 
 function comentar(obj){
 	var id= $(obj).attr('data-id');
 	var txt= $(obj).closest('.coment_area').find('.coment_txt').val();
 	$.ajax({
 		type:'POST',
 		url:'ajax/comentar',
 		data:{id:id, txt:txt}
 	});
 	$(obj).closest('.coment_area').find('.coment_txt').val('');
 	$(obj).closest('.coment_area').slideUp();
 	window.location.reload();
 }