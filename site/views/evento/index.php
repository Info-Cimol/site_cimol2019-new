<link rel="stylesheet" href="<?php echo base_url();  ?>public/site/css/evento.css" />

<div id="conteudo-evento">
    
        <?php 
            foreach($eventos AS $evento){
        ?>
        <div id="conteudo_evento">
            <div class="item-evento">
                <a href="<?php echo base_url()."evento/".$evento->id  ?>">
                    <img src="<?php echo base_url().$evento->url_imagem.$evento->nome_imagem?>"/>
                    <div class="descricao">
                        <div class="titulo"><strong><?php echo $evento->titulo?></strong></div> 
                        <div class="resumo"><?php echo $evento->resumo?></div>
                    </div>
                </a>
            </div>
        </div>
    <?php
            }
    ?>
    
    
</div>