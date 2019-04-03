<section>
    <div style="margin-top: 50px"><h1>Solicitar novo usuário</h1></div>
    <div>
        <h6>Informe seu email para receber sua chave de acesso!</h6>
        <h6>Com sua chave de acesso você poderá criar seu usuário de maneira mais segura</h6>
    </div>
    <form class="form-log" action="<?= base_url()?>mandar_email" method="POST">

        <br/>

        <!--  campo email  -->
        <div class="form-grupo">
            <div class="col-sm-10" id="pqp">
                <input type="email" class="form-control input-lg" name="email" placeholder="Email" />
            </div>
        </div>

        <br/>

        <!--  botão enviar  -->
        <div class="form-grupo">
            <div class="col-sm-offset-2 col-sm-10" id="pqp">
                <input type="submit" id="enviar" class="btn btn-primary btn-lg btn-block" name="autenticar" value="Enviar chave de acesso" />
            </div>
        </div>
    </form>
</section>
