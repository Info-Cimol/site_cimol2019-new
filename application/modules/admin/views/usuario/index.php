	<style>
        td{
            font-size:10px;
            padding-left: 10px;
        }
        .menus{
            margin-bottom: 5px;
        }
        .sub-menus{
            margin-left: 10px;
            font-size: 14px;
        }
	
	</style>
	<div class="box-content padded">
		<div class="tab-content" style="min-height: 600px;">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
               
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Foto</div></th>
                    		<th><div>Nome</div></th>
                    		<th><div>email</div></th>
                    		<th><div>Permissões</div></th>
                    		<th><div></div></th>
						</tr>
					</thead>
					<tbody>
                    	<?php 
                    	if(isset($usuarios)){
                    	    foreach($usuarios as $usuario):

                            $aluno = $usuario['aluno'];
                            $professor = $usuario['professor'];
                            $permissoes = $usuario['permissoes'];
                            $servidor = $usuario['servidor'];
                            $admin = $usuario['admin'];
                    	?>
                        <tr>
                            <!-- Id -->
                            <td>
                                <?php
                                    echo $usuario['id'];
                                ?>
                            </td>

                            <!-- Foto -->
							<td>
                                <?php
                                    if($usuario['foto']!=''){
                                        echo "<img src='".base_url().$usuario['foto']."' style='width:70px; height: 70px; border-radius: 50%;'/> ";
                                    }else{
                                        echo "<img src='".base_url()."public/images/user.png' style='width:70px; height: 70px; border-radius: 50%;'/> ";
                                    }
                                ?>
                            </td>

                            <!-- Nome -->
                            <td>
                                <?php
                                    echo $usuario['nome'];
                                ?>
                            </td>

                            <!-- Email -->
							<td>
                                <?php
                                    echo $usuario['email'];
                                ?>
                            </td>

                            <!-- Perfil -->
							<td>
                                <div class="dropdown" style="font-size: 15px">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Perfil
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding-left: 10px">
                                        <?php
                                            if($aluno == 1){
                                                echo "<div class='menus'> Aluno </div>";
                                            }

                                            if($professor == 1 || $professor == 2){
                                                echo "<div> Professor </div>";
                                                if($professor != 2){
                                                    echo "<div class='menus'></div>";
                                                }
                                                if($professor == 2){
                                                    echo "<div class='sub-menus menus'> Coordenador </div>";
                                                }
                                            }

                                            if($admin == 0){
                                                echo "<div> Administrador </div>";
                                                if($permissoes){
                                                    echo "<div class='menus'>"; /*/ abre dropdown admin /*/
                                                    foreach ($permissoes as $permissao){
                                                        if($permissao == 1){
                                                            echo "<div class='sub-menus'> Total </div>";
                                                        }
                                                        if($permissao == 2){
                                                            echo "<div class='sub-menus'> Notícias </div>";
                                                        }
                                                        if($permissao == 3){
                                                            echo "<div class='sub-menus'> Eventos </div>";
                                                        }
                                                        if($permissao == 4){
                                                            echo "<div class='sub-menus'> Agenda </div>";
                                                        }
                                                        if($permissao == 5){
                                                            echo "<div class='sub-menus'> Aluno </div>";
                                                        }
                                                        if($permissao == 6){
                                                            echo "<div class='sub-menus'> Professor </div>";
                                                        }
                                                    }
                                                    echo "</div>"; /*/ fecha dropdown admin /*/
                                                }
                                                else{
                                                    echo "<div class='menus'></div>";
                                                }
                                            }


                                        if($servidor){
                                            echo "<div> Servidor </div>";
                                            echo "<div class='menus'>"; /*/ abre dropdown admin /*/
                                            foreach ($servidor as $servidor1){
                                                if($servidor1 == 1){
                                                    echo "<div class='sub-menus'> Servente </div>";
                                                }
                                                if($servidor1 == 2){
                                                    echo "<div class='sub-menus'> Secretaria </div>";
                                                }
                                                if($servidor1 == 3){
                                                    echo "<div class='sub-menus'> Monitor </div>";
                                                }
                                                if($servidor1 == 4){
                                                    echo "<div class='sub-menus'> Biblioteca </div>";
                                                }
                                            }
                                            echo "</div>"; /*/ fecha dropdown admin /*/
                                        }

                                        if($aluno != 1 && $professor == 0 && $admin != 0 && !$servidor){
                                            echo "<div class='menus'>...</div>";
                                        }

                                        ?>
                                    </div>
                                </div>
							</td>


							<td align="center">
								<a data-toggle="modal" href="<?php echo base_url();?>admin/usuario/editar_usuario/<?php echo $usuario['id'];?>" class="btn btn-blue btn-small" title="Editar">
                                    <i class="icon-pencil"></i>
                                </a>
								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/usuario/desativar/<?php echo $usuario['id'];?>')" class="btn btn-red btn-small" title="Desativar">
                                    <i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>

                        <?php endforeach;
                    	}?>

                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
		
	</div>
</div>

