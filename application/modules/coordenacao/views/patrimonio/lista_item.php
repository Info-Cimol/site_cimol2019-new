	<?php
$id_patrimonio = isset($serv_patrimonio->id_patrimonio) ? $serv_patrimonio->id_patrimonio : "";
$nome = isset($serv_patrimonio->nome) ? $serv_patrimonio->nome : "";
$id_patrimonio = isset($patrimonio->id_patrimonio) ? $patrimonio->id_patrimonio : "";
$nome = isset($patrimonio->nome) ? $patrimonio->nome : "";





?>

<div class="container">
<div>
<h1>Adicionar Item </h1>
	
	
	<div>
			
             <form action="<?php echo base_url("coordenacao/patrimonio/salvar")?>" method="post">
				<div>
					<div class="marcacao">
						
                                                	
						<label>Patrimonio</label>	
											
						<input type="text"  name ="nome" value="<?php  echo $nome?>"  placeholder="">
						
						
                                                   
						
                     </div>
                            
        			
					
					
              <input type="hidden" name="id_patrimonio" value="<?php  echo $id_patrimonio?>"/>
				<div class="basse-botoes">									
						<button class="btn btn-danger">cancelar</button>
						<?= anchor("coordenacao/patrimonio/adicionar", "Adicionar ", array("class" => "btn btn-primary")) ?>
                                                
					</div>
			</div>
			</form>
		</div>
</div>
