<?php

	foreach ($imagens as $imagem) {
		$imagess[]['title'] = $imagem->nome;
		$imagess[]['value'] = base_url().$imagem->url_imagem.$imagem->nome;
	}

	echo json_encode($imagess);

 ?>
