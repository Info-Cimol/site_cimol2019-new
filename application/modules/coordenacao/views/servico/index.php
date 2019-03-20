
<!--  Modal que edita o chamado -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Editar Chamado</h3>
      </div>
      <div class="modal-body">
        <form>

        	<table style="width: 100%">
        		
        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Atendimento</span>
				                <td style="width: 70%; text-align: left;" id="data_atendimento">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Solução</span>
				                <td style="width: 70%; text-align: left;" id="data_solucao">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Defeito</span>
				                <td style="width: 70%; text-align: left;" id="defeito">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Solução</span>
				                <td style="width: 70%; text-align: left;">
				                	<textarea class="form-control" type="text" name="solucao" rows="2" style="width: 230px;"></textarea>
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Status</span>
				                <td style="width: 70%; text-align: left;" id="status">
				                	<select style="width: 265px">
						            	<option>Pendente</option>
						            	<option>Finalizado</option>
						            	<option>ferfer</option>
						            	<option>fsdfsdfsdfsdf</option>
						            </select>
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Nº de Série</span>
				                <td style="width: 70%; text-align: left;" id="num_serie">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>


        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: center;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Local</span>
				                <td style="width: 70%; text-align: left;">
				                	<input class="form-control" type="text" name="local_descricao" style="width: 250px">
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>
        	</table>       
        </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
        <button type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal que mostra os detalhes do chamado -->
<div class="modal fade" id="modal_detalhes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Detalhes</h3>
      </div>
      <div class="modal-body">
        <form>

        	<table style="width: 100%">
        		<tr style="margin-bottom: 20px;">
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Código :</span>
				                <td style="width: 70%; text-align: left;" id="codigo">
				                	
				                </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Equipamento :</span>
				                <td style="width: 70%; text-align: left;" id="nome">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Nº Série :</span>
				                <td style="width: 70%; text-align: left;" id="num_serie">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Abertura :</span>
				                <td style="width: 70%; text-align: left;" id="data_abertura">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Atendimento :</span>
				                <td style="width: 70%; text-align: left;" id="data_atendimento">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Data de Solução :</span>
				                <td style="width: 70%; text-align: left;" id="data_solucao">

						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Local :</span>
				                <td style="width: 70%; text-align: left;" id="local">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Defeito :</span>
				                <td style="width: 70%; text-align: left;" id="defeito">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Solução :</span>
				                <td style="width: 70%; text-align: left;" id="solucao">
				                	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>

        		<tr>
        			<td style="width: 30%; text-align: right;">
        				<div class="form-group" style="margin-bottom: 10px;">
				            <div class="input-group">
				                <span class="input-icon input-icon-left">Status :</span>
				                <td style="width: 70%; text-align: left;" id="status">
	
						        </td>
				            </div>
				        </div>
        			</td>
        		</tr>
        	</table>       
        </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">


<div style=" float: left; width: 860px; margin-left: 40px; text-align: center;">

    <div class="page-wrapper">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h3 class="font-strong mb-4">Ordem de Serviços</h3>
                        
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2" style="margin-right: 10px;">Filtrar:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select"  data-width="150px">
                                    <option>Todos</option>
                                    <option>Pendente</option>
                                    <option>Aguardando orçamento</option>
                                    <option>Aguardando peça</option>
                                    <option>Finalizado</option>
                                </select>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>coordenacao/servico/abrir_chamado"><span><i class="menu-icon icon-plus"></i> Abrir</span></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>coordenacao/servico/finalizar_chamado"><span><i class="menu-icon icon-signout"></i> Finalizar</span></a>
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>Código</th>
                                        <th>Equipamento</th>
                                        <th>Abertura</th>
                                        <th>Defeito</th>
                                        <th>Status</th>
                                        <th>Detalhes</th>
                                        <th>Editar</th>

                                    </tr>
                                </thead>
                                <tbody id="tabela">
                                	<?php 
                                		foreach ($chamados as $chamado) {
                                		?>
                                			<tr>
		                                        <td style="text-align: center"><?php echo $chamado->codigo ?></td>
		                                        <td>
		                                            <a href=""><?php echo $chamado->nome ?></a>
		                                        </td>

		                                        <td><?php echo date('d/m/Y', strtotime($chamado->data_abertura)) ?></td>
		                                        <td><?php echo $chamado->defeito ?></td>
		                                        <td><?php echo $chamado->status ?></td>
		                                        <td>
		                                        	<button onclick="busca_detalhes(<?php echo $chamado->codigo ?>)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_detalhes" data-whatever="@mdo"><span><i class="menu-icon icon-inbox"></i> DETALHES</span></button>
		                                        </td>
		                                        <td style="text-align: center">
		                                        	<button onclick="editar(<?php echo $chamado->codigo ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span><i class="menu-icon icon-pencil"></i> EDITAR</span></button>
		                                        </td>
		                                        
		                                    </tr>
                                		<?php
                                		}
                                	 ?>                                                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Carrega Ajax -->    
<script src="<?php echo base_url();  ?>public/temas/admin/scripts/ajax.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		$('#type-filter').change(function(){
			var status = $('#type-filter').val();
			//alert(status);
			$.ajax({
	            url:"<?php echo base_url() ?>coordenacao/servico/busca_chamado_ajax",
	            method:"POST",
	            dataType: 'json',
	            data:{status:status},
	            success:function(data){
	            	//alert('Deu Certooooo');
	            	$('#tabela').empty(); 	
	               	for (var i = 0; i < data.length; i++) {
	               		$('#tabela').append('<tr><td style="text-align: center">'+ data[i].codigo +'</td><td><a href="">'+data[i].nome+'</a></td><td>'+data[i].data_abertura+'</td><td>'+data[i].defeito+'</td><td>'+data[i].status+'</td><td><button onclick="busca_detalhes('+data[i].codigo+')" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_detalhes" data-whatever="@mdo"><span><i class="menu-icon icon-inbox"></i> DETALHES</span></button></td><td style="text-align: center"><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span><i class="menu-icon icon-pencil"></i> EDITAR</span></a></td></tr>');
	               	}
	                //console.log(data);
	            }
       		})
		})
		//alert(codigo);


	})

	function busca_detalhes($codigo){
		var codigo = $codigo;
		//alert(codigo);
		$.ajax({
            url:"<?php echo base_url() ?>coordenacao/servico/busca_detalhes",
            method:"POST",
            dataType: 'json',
            data:{codigo:codigo},
            success:function(data){
            	alert(data[0].local);
            	if (data[0].codigo != null) {
            		$('#codigo').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].codigo +'</h5>');	
            	} 	
                
                $('#nome').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].nome +'</h5>');

                var d = new Date(data[0].data_abertura);
                data_abertura = (d.toLocaleDateString());
                $('#data_abertura').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data_abertura +'</h5>');

                if (data[0].data_atendimento != null) {
                	$('#data_atendimento').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].data_atendimento +'</h5>');	
                }

                if (data[0].data_solucao != null) {
                	$('#data_solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].data_solucao +'</h5>');	
                }

				if (isset(data[0].local) && (data[0].local =! null)) {
                	$('#local').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].local +'</h5>');	
                }                
                //$('#local').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].local +'</h5>');

                if (data[0].defeito != null) {
                	$('#defeito').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].defeito +'</h5>');	
                }
                //$('#defeito').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].defeito +'</h5>');

                if (data[0].solucao != null) {
                	$('#solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].data_solucao +'</h5>');	
                }
                //$('#solucao').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].solucao +'</h5>');
                $('#status').html('<h5 class="font-strong mb-4" style="margin-left: 20px;">'+ data[0].status +'</h5>');
                //$('#num_serie').html('UIUIUYGBNMK');
            }
       })
	}

	function editar($codigo){
		var codigo = $codigo;
		//alert(codigo);
		//var defeito = $('#defeito').val();
		//alert(defeito);
		$.ajax({
	            url:"<?php echo base_url() ?>coordenacao/servico/busca_detalhes",
	            method:"POST",
	            dataType: 'json',
	            data:{codigo:codigo},
	            success:function(data){
	            	//alert(data[0].defeito);
	            	$('#defeito').html('<textarea class="form-control"  name="defeito" style="width: 230px" row="2" value='+data[0].defeito+'></textarea>');

	            	if (data[0].solucao =! null) {
	            		$('#solucao').html('<textarea class="form-control"  name="solucao" style="width: 230px" row="2" value='+data[0].defeito+'></textarea>');	
	            	}else{
	            		$('#solucao').html('<textarea class="form-control"  name="solucao" style="width: 230px" row="2"></textarea>');
	            	}
	            	
	            	$('#num_serie').html('<input class="form-control" type="text" value='+data[0].num_serie+' name="num_serie" style="width: 250px">');
	            	
	            	$('#status').html('<select style="width: 265px"><option>'+data[0].status+'</option><option>Pendente</option><option>Aguardando peça</option><option>Aguardando orçamento</option><option>Finalizado</option></select>');
	            	
	            	if (data[0].data_atendimento != null) {
	            		$('#data_atendimento').html('<input class="form-control" type="date" value='+data[0].data_atendimento+' name="data_atendimento" style="width: 250px">');
	            	}else{
	            		$('#data_atendimento').html('<input class="form-control" type="date" name="data_atendimento" style="width: 250px">');
	            	}

	            	if (data[0].data_solucao != null) {
	            		$('#data_solucao').html('<input class="form-control" type="date" value='+data[0].data_solucao+' name="data_solucao" style="width: 250px">');
	            	}else{
	            		$('#data_solucao').html('<input class="form-control" type="date" name="data_solucao" style="width: 250px">');
	            	}

	            	if (data[0].local != null) {
	            		$('#local').html('<input class="form-control" type="text" value='+local+' name="local" style="width: 250px">');
	            	}else{
	            		$('#local').html('<input class="form-control" type="text" name="local" style="width: 250px">');
	            	}	         		


	            }
       		})

	}


</script>


<!-- Trigger que abre os Modal -->
<script type="text/javascript">
	
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus')
	})	

</script>


