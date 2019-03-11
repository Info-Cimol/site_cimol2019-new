


            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
            	<a href="" class="btn btn-blue" >Nova noticia</a>
                
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Título</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php $count = 1;foreach($noticias as $noticia):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo "<img src='".base_url().$noticia->url_imagem.$noticia->arquivo_imagem."' style='width:50px'/>".$noticia->titulo;?></td>
							<td align="center">
								<a data-toggle="modal" href="#modal-form" onclick="editar_noticia(<?php echo $noticia->id; ?>)" class="btn btn-gray btn-small" title="Editar"> 
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a data-toggle="modal" data-target="#exampleModal" href="<?php echo base_url(); ?>admin/noticia/deletar_noticia/<?php echo $noticia->id;?>" class="btn btn-red btn-small" title="Excluir">
                                		<i class="icon-trash"></i> 
                                </a>
                                <a data-toggle="modal" href="#modal-form" onclick="ajaxModal(<?php echo $noticia->id ?>);return false;" class="btn btn-green btn-small" title="Visualizar">
                                <i class="icon-eye-open"></i> 
                                </a>
                                <a data-toggle="modal" href="#modal-form" onclick="listar_imagens(<?php echo $noticia->id ?>);return false;" class="btn btn-blue btn-small" title="Imagens">
                                <i class="icon-tags"></i> 
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php

            require_once($this->config->item("base_dir").'public/temas/admin/modal_excluir.php');

            ?>


			</div>
    