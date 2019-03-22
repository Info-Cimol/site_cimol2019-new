<link rel="stylesheet" href="<?php echo base_url();  ?>public/site/css/noticia.css" />
		<section id="noticia" style="">
				<h4 class="titulo_pagina" style='font-size:40px;'><?php echo $noticia[0]->titulo?></h4>

				<p style="font-size:12px;"><?php echo $noticia[0]->data_noticia?></p>
				<div>
				 	<img  style="width:60%;margin-right:2%;margin-bottom:1.5%;" src="<?php echo base_url().$noticia[0]->url_imagem.$noticia[0]->arquivo_imagem?>">

					<p style="font-size:10px;">
						<?php echo $noticia[0]->conteudo?>
				  </p>

			</div>
			</section>
