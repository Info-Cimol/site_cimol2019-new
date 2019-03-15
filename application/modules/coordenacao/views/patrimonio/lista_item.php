	<?php
$id_patrimonio = isset($patrimonio->id_patrimonio) ? $patrimonio->id_patrimonio : "";
$nome = isset($patrimonio->nome) ? $patrimonio->nome : "";





?>

<div class="container">
	<div>
	<h1>Cadastro de Patrimônios </h1>
		<div>
			<div>
			
             <form action="<?php echo base_url("coordenacao/patrimonio/adicionar")?>" method="post">
				<div>
					<div class="marcacao">
						<h3>Patrimonios</h3>
                                                	
						<label>Nome Patrimonio</label>						
						<input type="text"  name ="nome" value="<?php  echo $nome?>"  placeholder="Digite o nome do patrimonio">	
						
                                                   
						
                     </div>
                            
        			
					
					
              <input type="hidden" name="id_patrimonio" value="<?php  echo $id_patrimonio?>"/>
				<div class="basse-botoes">									
						<button class="btn btn-danger">cancelar</button>
						<button class="btn btn-primary">Concluir cadastro</button>
                                                
					</div>
			</div>
			</form>
		</div>
		</div>
	</div>
</div>
