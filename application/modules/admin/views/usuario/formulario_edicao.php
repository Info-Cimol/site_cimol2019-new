<style>
    .inputFloat{
        float: left;
    }
    .divTitulo{
        margin-left: 15px;
        font-size: 16px;
        margin-bottom: 10px;
    }
    .divToggle{
        display: none;
        margin-left: 20px;
        margin-bottom: 20px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div>
    <!--  Configurando variáveis PHP  -->
    <?php
        $aluno = $usuario['aluno'];

        $professor = $usuario['professor'];

        $servidor = $usuario['servidor'];
        if(count($servidor)){
            $servidor_array = implode('|', $servidor);
        }
        else{
            $servidor_array = "0";
        }

        $admin = $usuario['admin'];

        $permissoes = $usuario['permissoes'];
        if(count($permissoes)){
            $permissoes_array = implode('|', $permissoes);
        }
        else{
            $permissoes_array = "0";
        }

    ?>

    <!--  Configurando variáveis JavaScript  -->
    <script>
        var aluno = <?php echo $aluno?>,
            professor = <?php echo $professor?>,
            admin = <?php echo $admin?>,
            servidor_array = "<?php echo $servidor_array?>",
            permissoes_array = "<?php echo $permissoes_array?>";

        var servidor, permissoes;

        if(servidor_array == "0"){ servidor = 0; }
        else{ servidor = servidor_array.split('|'); }

        if(permissoes_array == "0"){ permissoes = 0; }
        else{ permissoes = permissoes_array.split('|'); }

        console.log(aluno, professor, servidor, permissoes, admin);

    </script>

    <h1>Edição do usuario <?php echo $usuario['id'];?></h1>

    <br/>

    <form class="form-log" action="<?php echo base_url();?>admin/usuario/autenticar_edicao/<?php echo $usuario['pessoa_id'];?>"  method="POST">

        <!--  Dados Pessoais (nome, cpf, rg, emails, status)  -->
        <div class="form-grupo">
            <h2>Dados Pessoais:</h2>
            <div class="col-sm-10" id="pqp">
                <div>Nome:</div>
                <input type="text" class="form-control input-lg" name="nome" value="<?php echo $usuario['nome']?>" />

                <div>CPF:</div>
                <input type="text" class="form-control input-lg" name="cpf" value="<?php echo $usuario['cpf']?>" />

                <div>RG:</div>
                <input type="text" class="form-control input-lg" name="rg" value="<?php echo $usuario['rg']?>" />

                <div>Email:</div>
                <input type="text" class="form-control input-lg" name="email" value="<?php echo $usuario['email']?>" />

                <div>Status:</div>
                <input type="radio" class="form-control input-lg inputFloat" name="status" value="ativo" <?php if($usuario['status']=='ativo'){  echo 'checked';  }  ?>  >
                    <div>Ativo</div>
                </input>

                <input type="radio" class="form-control input-lg inputFloat" name="status" value="inativo" <?php if($usuario['status']=='inativo'){  echo 'checked';  }  ?>  >
                    <div>Inativo</div>
                </input>
            </div>
            <br/>
        </div>

        <!--  Perfil e Permissões (aluno, professor, servidor, admin)  -->
        <div class="form-grupo">
            <h2>Perfil:</h2>

            <div class="col-sm-10" id="pqp">
                <!--  Aluno  -->
                <input type="checkbox" class="form-control input-lg inputFloat" id="aluno" name="aluno" />
                <div class="divTitulo">Aluno</div>
                <hr/>

                <!--  Professor  -->
                <input type="checkbox" class="form-control input-lg inputFloat" id="professor" name="professor" />
                <div class="divTitulo">Professor</div>
                <hr/>

                <!--  Servidor  -->
                <input type="checkbox" class="form-control input-lg inputFloat" name="servidor" id="servidor"/>
                <div class="divTitulo">Servidor</div>
                <div id="clicouServidor" class="divToggle">

                    <input type="checkbox" class="form-control input-lg inputFloat" id="serv_servente" name="serv[servente]"  value="1"/>
                    <div class="divTitulo">Servente</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="serv_secretaria" name="serv[secretaria]"  value="2"/>
                    <div class="divTitulo">Secretaria</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="serv_monitor" name="serv[monitor]"  value="3"/>
                    <div class="divTitulo">Monitor</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="serv_biblioteca" name="serv[biblioteca]" value="4"/>
                    <div class="divTitulo">Biblioteca</div>
                </div>
                <hr/>

                <!--  Admin  -->
                <input type="checkbox" class="form-control input-lg inputFloat" name="administrador" id="admin" value="1"/>
                <div class="divTitulo">Administrador</div>
                <div id="clicouAdmin" class="divToggle">

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_total" name="admin[total]" value="1"/>
                    <div class="divTitulo">Total</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_noticia" name="admin[noticia]" value="2" />
                    <div class="divTitulo">Noticia</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_evento" name="admin[evento]" value="3" />
                    <div class="divTitulo">Evento</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_agenda" name="admin[agenda]" value="4" />
                    <div class="divTitulo">Agenda</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_aluno" name="admin[aluno]"  value="5"/>
                    <div class="divTitulo">Aluno</div>

                    <input type="checkbox" class="form-control input-lg inputFloat" id="admin_professor" name="admin[professor]" value="6" />
                    <div class="divTitulo">Professor</div>
                </div>
                <hr/>

            </div>
        </div>


        <br/>
        <br/>


        <!--  Botão 'enviar'  -->
        <div class="form-grupo">
            <div class="col-sm-offset-2 col-sm-10" id="pqp">
                <input type="submit" id="enviar" class="btn btn-primary btn-lg btn-block" name="autenticar" value="Enviar" />
            </div>
        </div>


    </form>

    <!--  Funcionalidades JavaScript  -->
    <script>
        /*/  ------------ Clicks ------------  /*/



        /*/  Click em 'servidor'  /*/
        $('#servidor').click(function () {
            $('#clicouServidor').toggle();
            if(document.getElementById('servidor').checked == false){
                document.getElementById('serv_servente').checked = false;
                document.getElementById('serv_secretaria').checked = false;
                document.getElementById('serv_monitor').checked = false;
                document.getElementById('serv_biblioteca').checked = false;
            }
        });




        /*/  Click em 'admin'  /*/
        $('#admin').click(function () {
            $('#clicouAdmin').toggle();
            if(document.getElementById('admin').checked == false){
                document.getElementById('admin_total').checked = false;
                document.getElementById('admin_noticia').checked = false;
                document.getElementById('admin_evento').checked = false;
                document.getElementById('admin_agenda').checked = false;
                document.getElementById('admin_aluno').checked = false;
                document.getElementById('admin_professor').checked = false;
            }
        });




        /*/  Click em 'admin/total'  /*/
        $('#admin_total').click(function () {
            disableCheckbox(); // Função para desabilitar checkbox //
        });





        /*/  ------------ Configurando checkboxs ------------  /*/



        /*/  checkbox 'aluno'  /*/
        if(aluno == 1){ document.getElementById('aluno').checked = true; }




        /*/  checkbox 'professor'  /*/
        if(professor == 1 || professor == 2){ document.getElementById('professor').checked = true; }




        /*/  checkbox 'servidor'  /*/
        if(Array.isArray(servidor)){
            document.getElementById('servidor').checked = true;
            $('#clicouServidor').toggle();
            for(var i=0; i<servidor.length; i++){

                if(servidor[i] == "1"){ document.getElementById('serv_servente').checked = true; }

                if(servidor[i] == "2"){ document.getElementById('serv_secretaria').checked = true; }

                if(servidor[i] == "3"){ document.getElementById('serv_monitor').checked = true; }

                if(servidor[i] == "4"){ document.getElementById('serv_biblioteca').checked = true; }
            }
        }




        /*/  checkbox 'admin' e permissoes  /*/
        if(admin == 0){
            document.getElementById('admin').checked = true;
            $('#clicouAdmin').toggle();
            if(Array.isArray(permissoes)){
                for(var i=0; i<permissoes.length; i++){

                    if(permissoes[i] == "1"){ document.getElementById('admin_total').checked = true; disableCheckbox(); }

                    if(permissoes[i] == "2"){ document.getElementById('admin_noticia').checked = true; }

                    if(permissoes[i] == "3"){ document.getElementById('admin_evento').checked = true; }

                    if(permissoes[i] == "4"){ document.getElementById('admin_agenda').checked = true; }

                    if(permissoes[i] == "5"){ document.getElementById('admin_aluno').checked = true; }

                    if(permissoes[i] == "6"){ document.getElementById('admin_professor').checked = true; }
                }
            }
        }






        /*/  -------- Funções --------  /*/
        function disableCheckbox(){
            if(document.getElementById('admin_total').checked == true){
                document.getElementById('admin_noticia').checked = false;
                document.getElementById('admin_noticia').disabled = true;

                document.getElementById('admin_evento').checked = false;
                document.getElementById('admin_evento').disabled = true;

                document.getElementById('admin_agenda').checked = false;
                document.getElementById('admin_agenda').disabled = true;

                document.getElementById('admin_aluno').checked = false;
                document.getElementById('admin_aluno').disabled = true;

                document.getElementById('admin_professor').checked = false;
                document.getElementById('admin_professor').disabled = true;
            }
            if(document.getElementById('admin_total').checked == false){
                document.getElementById('admin_noticia').disabled = false;

                document.getElementById('admin_evento').disabled = false;

                document.getElementById('admin_agenda').disabled = false;

                document.getElementById('admin_aluno').disabled = false;

                document.getElementById('admin_professor').disabled = false;
            }
        }


    </script>
</div>