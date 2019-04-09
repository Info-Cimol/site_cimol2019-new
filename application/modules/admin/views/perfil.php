<?php //print_r($usuario)?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    #imagem{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        float: left;
        background-image: url("<?= base_url().$usuario['foto'] ?>");
        background-position-x: center;
        cursor: pointer;
        z-index: 1;
    }
    #imagemEdit{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        float: left;
        background-color:#36363694;
        position: absolute;
        display: none;
        cursor: pointer;
        z-index: 2;
    }
    #perfil{
        background-color: white;
        margin: 50px;
        margin-top: 0px;
        min-height: 500px;
        padding: 40px;
        padding-top: 30px;
        box-shadow: 0px 10px 20px 0px #afafaf;
    }
    .btn{
        float: right;
    }
    .headerPerfil{
        float: left;
        height: 115px;
        width: 100%;
        border-bottom: 1px solid #696969;
    }
    #corpo{
        float: left;
        width: 90%;
        height: 115px;
    }
    #nome{
        float: left;
        margin-left: 25px;
        margin-top: 20px;
    }
    .home{
        background-color: #f7f7f7;
    }
    #mainPerfil{
        float: left;
        margin-top: 20px;
        width: 100%;
    }
    .infoH3{
        font-size: 1.55rem;
        color:#565656;
        margin: 0px;
    }
    .infoH5{
        font-size: 1.15rem;
        color:#717171;
    }
    .info{
        float: left;
        cursor: pointer;
        padding-left: 20px;
        height: 100px;
        width: 200px;
        margin-right: 10px;
        padding-top: 25px;
        background-color: rgb(255, 255, 255);
        border-right: 4px solid rgb(255, 255, 255);
        margin-bottom: 12px;
    }
    #menu{
        width: 100%;
        height: 40px;
    }
    #perfilItem{
        display: none;
    }
    .menuItem{
        font-size: 25px;
        color: #565656;
        float: left;
        padding: 10px;
        cursor: pointer;
        width: 35%;
    }
    .menuItemSelected{
        font-size: 25px;
        float: left;
        padding: 10px;
        cursor: pointer;
        background-color: #f0f0f0;
        font-weight: bolder;
    }
    #content{
        /* height: 300px; */
        width: 100%;
        margin-top: 0px;
        padding: 10px;
        background-color: #f0f0f0;
        height: 100%;
        padding-bottom: 3%;
    }
    #email:hover{
        color:#1b4fa3!important;
        cursor: pointer;
    }
</style>


<div id="perfil">
    <div id="corpo">
        <div class="headerPerfil">
            <div id="imagem"> </div>
            <div id="imagemEdit">
                <div style="margin: 35px; margin-top: 39px;">
                    <i class="icons icon-search" style="font-size:35px; color:white;"></i>
                </div>
            </div>
            <div id="nome">
                <h3 style="font-size: 1.75rem; color:#565656; margin: 0px"><?= $usuario['nome']?></h3>
                <h5 style="font-size: 1.25rem; color:#717171" id="email"><?= $usuario['email']?></h5>
            </div>
        </div>
        <div id="mainPerfil">
            <div id="menu">
                <div class="menuItem menuItemSelected dadosDiv">Dados Pessoais</div>
                <div class="menuItem perfilDiv">Perfil</div>
            </div>
            <div id="content">
                <div id="dadosItem" style="margin: 20px;height: 262px;">
                    <div class="info">
                        <h3 class="infoH3">RG</h3>
                        <h5 class="infoH5"><?= $usuario['rg']?></h5>
                    </div>
                    <div class="info">
                        <h3 class="infoH3">CPF</h3>
                        <h5 class="infoH5"><?= $usuario['cpf']?></h5>
                    </div>
                    <?php
                    foreach($usuario['telefones'] as $telefone){
                        echo "<div class='info'>
                        <h3 class='infoH3'>Telefone</h3>
                        <h5 class='infoH5'>". $telefone['ddd']." ".$telefone['numero']."</h5>
                     </div>";
                    }
                    ?>
                </div>
                <div id="perfilItem" style="margin: 20px;height: 125px;">
                    <?php
                        if($usuario['aluno'] == 1){
                            echo '<div class="info">
                                       <h3 class="infoH3">Aluno</h3>
                                  </div> ';
                        }

                        if($usuario['professor'] == 1){
                            echo '<div class="info">
                                      <h3 class="infoH3">Professor</h3>
                                      <h5 class="infoH5">'.$usuario['carga_horaria'].' horas</h5>
                                  </div> ';
                        }

                        if($usuario['coordenador'] == 1){
                            echo '<div class="info">
                                      <h3 class="infoH3">Coordenador</h3>
                                      <h5 class="infoH5">'.$usuario['curso'].'</h5>
                                  </div> ';
                        }

                    ?>
                </div>
            </div>


        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".info").hover(
            function(){
                $(this).css("background-color", "#1b4fa3");
                $(this).css("border-right", "4px solid #fef600");
                let c = $(this).children();
                c[0].style.color="white";
                c[1].style.color="#eaeaea";
            },
            function(){
                $(this).css("background-color", "white");
                $(this).css("border-right", "4px solid #fff");
                let c = $(this).children();
                c[0].style.color="#565656";
                c[1].style.color="#717171";
            })

        $("#imagem").hover(
            function(){
                document.getElementById("imagemEdit").style.display = "block";
            },
            function(){
                document.getElementById("imagemEdit").style.display = "none";
            })

        $("#imagemEdit").hover(
            function(){
                document.getElementById("imagemEdit").style.display = "block";
            },
            function(){
                document.getElementById("imagemEdit").style.display = "none";
            })

        $(".menuItem").click(function(){
            if(!$(this).hasClass('menuItemSelected')){
                removeSelection();
                $(this).addClass('menuItemSelected');
                if($(this).hasClass('dadosDiv')){
                    $("#dadosItem").css("display", "block");
                }
                else if($(this).hasClass('perfilDiv')){
                    $("#perfilItem").css("display", "block");
                }
            }
        });

        function removeSelection() {
            if($(".dadosDiv").hasClass('menuItemSelected')){
                $(".dadosDiv").removeClass('menuItemSelected');
                $("#dadosItem").css("display", "none");
            }
            if($(".perfilDiv").hasClass('menuItemSelected')){
                $(".perfilDiv").removeClass('menuItemSelected');
                $("#perfilItem").css("display", "none");
            }
        }

    });
</script>