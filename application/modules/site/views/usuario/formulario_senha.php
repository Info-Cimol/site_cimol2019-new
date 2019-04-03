<?php
    $url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], 'novo_usuario'));
    $hash = str_replace("novo_usuario/", "", $url);
?>
<section>
    <div style="margin-top: 50px"><h1>Novo usuário</h1></div>
    <div>
        <h6>Seu email foi validado com sucesso</h6>
        <h6>Crie uma senha para seu usuário!</h6>
    </div>
    <form class="form-log" action="<?= base_url()?>criar_usuario/<?= $hash?>" method="POST">

        <br/>


        <!--  campo email  -->
        <div class="form-grupo">
            <div class="col-sm-10" id="pqp">
                <input type="password" class="form-control input-lg" name="senha" placeholder="Nova senha" />
            </div>
        </div>

        <br/>

        <!--  botão enviar  -->
        <div class="form-grupo">
            <div class="col-sm-offset-2 col-sm-10" id="pqp">
                <input type="submit" id="enviar" class="btn btn-primary btn-lg btn-block" name="autenticar" value="Confirmar" />
            </div>
        </div>
    </form>
</section>
