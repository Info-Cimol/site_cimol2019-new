<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">


<div style="text-align: center; width: 500px; float: left; margin-left: 200px;">
	
	<div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <form class="form-purple" method="post" action="<?php echo base_url() ?>coordenacao/servico/finalizar_chamado_submit">
                    <div class="ibox-head" >
                        <div class="ibox-title" style="margin-left: 180px;">Finalizar Chamado</div>
                    </div>

                    <table style="width: 100%; margin-top: 30px;">
		        		<tr style="margin-bottom: 20px;">
		        			<td style="width: 30%; text-align: center;">
		        				<div class="form-group" style="margin-bottom: 10px;">
						            <div class="input-group">
						                <span class="input-icon input-icon-left">Código</span>
						                <td style="width: 70%; text-align: left;">
						                	<input class="form-control" type="text" name="codigo" style="width: 250px;">
						                </td>
						            </div>
						        </div>
		        			</td>
		        		</tr>

		        		<tr style="margin-bottom: 20px;">
		        			<td style="width: 30%; text-align: center;">
		        				<div class="form-group" style="margin-bottom: 10px;">
						            <div class="input-group">
						                <span class="input-icon input-icon-left">Data Solução</span>
						                <td style="width: 70%; text-align: left;">
						                	<input class="form-control" type="date" name="data_solucao" style="width: 250px;">
						                </td>
						            </div>
						        </div>
		        			</td>
		        		</tr>

		        		<tr style="margin-bottom: 20px;">
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



        			</table>

                    <div class="ibox-footer">
                        <button type="submit" class="btn btn-primary mr-2">Finalizar</button>
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>coordenacao/servico" type="reset">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>