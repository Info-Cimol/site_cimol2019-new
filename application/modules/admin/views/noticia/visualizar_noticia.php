<!-- <div class="">
	<section id="noticia">
			<h4 class="titulo_pagina">Notícias</h4>

			<img src="<?php // echo base_url().$noticia[0]->url_imagem.$noticia[0]->arquivo_imagem?>" >
			<h2><?php // echo $noticia[0]->titulo?></h2>
			<p><?php // echo $noticia[0]->resumo?></p>
			<p><?php // echo $noticia[0]->data_noticia?></p>
			<hr/>
			<?php // echo $noticia[0]->conteudo?>

	</section>
</div> -->
<?php
	print_r($noticia);
	// foreach ($noticia as $dados) {
	// 	$id=$dados->id;
	// 	$titulo=$dados->titulo;
	// 	$conteudo=$dados->conteudo;
	// 	$resumo=$dados->resumo;
	// 	$nome_imagem = $dados->arquivo_imagem;
	// 	$url_imagem = $dados->url_imagem;
	// 	if(isset($dados->arquivo_imagem))
	// 		$caminho_imagem= base_url().$dados->url_imagem.$dados->arquivo_imagem;
	// 	else
	// 		$caminho_imagem = "";
	// }

 ?>
