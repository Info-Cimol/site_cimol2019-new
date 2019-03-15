
<?php
	$count = 1;foreach($noticias as $noticia): $count++;?>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header" style="height: 28px;">
			<h5 class="modal-title" id="exampleModalLabel" style="width: 60%;margin: 0%;float: left;margin-top: 1%;">Excluir item?</h5>
			<button type="button" style="width: 10%;float: right;margin-left: 30%;" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">
			Deseja excluir a noticia "<?php echo $noticia->titulo; ?>"?
		  </div>
		  <div class="modal-footer">
			<?php echo form_open('admin/noticia/deletar_noticia/'.$noticia->id , '');?>
			<button type='submit' class="btn btn-danger">Excluir</button>
			<button type="button" name="cancel" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>

<?php endforeach; ?>
            <!---TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
            	<a href="<?php echo base_url(); ?>admin/noticia/nova_noticia" class="btn btn-blue" >Nova noticia</a>

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Título</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php
						$count = 1;foreach($noticias as $noticia):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo "<img src='".base_url().$noticia->url_imagem.$noticia->arquivo_imagem."' style='width:50px'/>".$noticia->titulo;?></td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/noticia/editar_noticia/<?php echo $noticia->id;?>" class="btn btn-gray btn-small" title="Editar">
                                	<i class="icon-wrench"></i>
                                </a>

                            	<a data-toggle="modal" data-target="#exampleModal<?php echo $count; ?>"  class="btn btn-red btn-small" title="Excluir">
                                	<i class="icon-trash"></i>
                                </a>

                                <a href="<?php echo base_url(); ?>admin/noticia/visualizar_noticia/<?php echo $noticia->id;?>" href="#modal-form" class="btn btn-green btn-small" title="Visualizar">
                                	<i class="icon-eye-open"></i>
                                </a>

                                <a data-toggle="modal" href="#modal-form" class="btn btn-green btn-small" title="Visualizar">
                                	<i class="icon-tags"></i>
                                </a>
        					</td>
                        </tr>

                        <?php endforeach;?>

                    </tbody>
                </table>



			</div>
