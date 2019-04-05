<link rel="stylesheet" href="<?php echo base_url();  ?>public/site/css/noticia.css" />
		<section id="noticia" style="">
				<h4 class="titulo_pagina" style='font-size:32px;'><?php echo $noticia[0]->titulo?></h4>

				<p id="data"><?php echo $noticia[0]->data_noticia;?></p>
				<p id="resumo"><?php echo $noticia[0]->resumo;?></p>
				<p id="tags"><?php

					for ($i=0; $i < count($tags_noticia); $i++) {
								echo "#".$tags_noticia[$i]['marcador'];
					}

				?></p>

				<div>
				 	<img src="<?php echo base_url().$noticia[0]->url_imagem.$noticia[0]->arquivo_imagem?>">

					<p style="font-size:10px;">
						<?php echo $noticia[0]->conteudo?>
				  </p>

			</div>
			</section>
