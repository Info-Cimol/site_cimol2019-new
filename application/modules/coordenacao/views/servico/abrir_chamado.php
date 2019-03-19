<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/temas/admin/css/servicos.css">

<div style="text-align: center; width: 500px; float: left; margin-left: 200px;">
	
	<div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <form class="form-purple" method="post" action="<?php echo base_url() ?>coordenacao/servico/abrir_chamado_submit">
                    <div class="ibox-head" >
                        <div class="ibox-title" style="margin-left: 180px;">Abrir Chamado</div>
                    </div>
                    <div class="ibox-body">

                    	<table>
			           		<tr style="margin-bottom: 40px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Código</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="codigo" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Equipamento</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="nome" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Nº de Série</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="num_serie" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Descrição</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="descricao" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Local</span>
							                <td style="width: 70%; text-align: left;">
							                	<input class="form-control" type="text" name="local" style="width: 250px;">
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>

			        		<tr style="margin-bottom: 20px;">
			        			<td style="width: 30%; text-align: right;">
			        				<div class="form-group" style="margin-bottom: 10px;">
							            <div class="input-group">
							                <span class="input-icon input-icon-left" style="margin-right: 15px;">Defeito</span>
							                <td style="width: 70%; text-align: left;">
							                	<textarea class="form-control" type="text" name="defeito" rows="2" style="width: 230px;"></textarea>
							                </td>
							            </div>
							        </div>
			        			</td>
			        		</tr>



                    	</table>



                    </div>
                    <div class="ibox-footer">
                        <button type="submit" class="btn btn-primary mr-2">Abrir</button>
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>coordenacao/servico" type="reset">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


<!--
<form action="<?php echo base_url() ?>coordenacao/servico/abrir_chamado_submit" method="post">
		<label>codigo</label>
		<input type="text" name="codigo">
		<label>N serie</label>
		<input type="text" name="num_serie">
		<label>Nome</label>
		<input type="text" name="nome">
		<label>descricao</label>
		<input type="text" name="descricao">

		<h4>Chamado</h4>


		<label>Defeito</label>
		<input type="text" name="defeito">

		<input type="submit" name="abrir_chamado" value="abrir_chamado">

	</form>

	-->