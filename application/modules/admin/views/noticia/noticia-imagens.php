<div class="main-content">
<div class="content-fluid padded">
<div class="box">
	<div class="box-content padded">
		<div class="tab-content">
            <!---CREATION FORM STARTS---->
            	<h3 class="editar-imagem-aviso">Clique na imagem para editar o tamanho:</h3>
                <div class="box-content">
                	<?php for($i=0; $i<count($imagens);$i++){?>
                		<div class='imagem-editar'>
                		<a data-toggle='modal' href='.modal-imagem' onclick='editar_imagem("<?php echo $imagens[$i] ?>");'><img src="<?php echo base_url().$imagens[$i]?>"></img></a>
                		</div>
                		<form action="<?php echo base_url().$_SESSION['form_action']?>" method="post">
	                		<input id='width-<?php echo $i?>' type='hidden' name='width[<?php echo $i?>]'>
	                		<input id='height-<?php echo $i?>' type='hidden' name='height[<?php echo $i?>]'>
	                		<input id='x-<?php echo $i?>' type='hidden' name='x[<?php echo $i?>]'>
	                		<input id='y-<?php echo $i?>' type='hidden' name='y[<?php echo $i?>]'>
	                		<input id='x2-<?php echo $i?>' type='hidden' name='x2[<?php echo $i?>]'>
	                		<input id='y2-<?php echo $i?>' type='hidden' name='y2[<?php echo $i?>]'>
	                		<input type='hidden' name="imagens[<?php echo $i?>]" value="<?php echo $imagens[$i] ?>">
                		<?php }?>
                			<br/>
                			<br/>
                			<input type='submit' value='Salvar' class="botao-editar-imagem btn btn-blue">
                		</form>
                </div>
			<!----CREATION FORM ENDS--->
		</div>
	</div>
</div>
</div>
</div>
