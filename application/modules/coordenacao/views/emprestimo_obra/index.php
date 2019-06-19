<link rel="stylesheet" type="text/css" href="http://admincast.com/adminca/preview/admin_1/html/assets/css/main.min.css">

<style type="text/css">
    
    .static-widget{

        margin-left: 20px;
    }

    #card_livros{
        display: flex;

        justify-content: center;
        flex-wrap: wrap;
        width: 850px;
        margin-left: 350px;
        float: left;
        margin-top: -130px;
    }

</style>

<div style="justify-content: center; display: flex;width: 850px; margin-bottom: 30px;">
    
    <div class="static-widget bg-success text-white" style="width: 100px; height: 100px"><i class="ti-user"></i>
        <h2 class="m-0 text-white" id="total_emprestimo"></h2><h4 class="text-white">EMPRESTADOS</h4>
    </div>

    <div class="static-widget bg-danger text-white" style="width: 100px; height: 100px"><i class="ti-user"></i>
        <h2 class="m-0 text-white" id="total_vencidos"></h2><h4 class="text-white">VENCIDOS</h4>
    </div>

</div>




<div style="justify-content: center; display: flex;width: 850px; margin-bottom: 30px;">
    <button class="btn btn-warning btn-icon" id="btn_modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span><i class="menu-icon icon-pencil"></i>Emprestar</span></button>

</div>




<!--

<div class="static-widget bg-danger text-white" style="width: 160px; height: 160px;"><h4 class="m-0" style="margin: 0; padding: 0; line-height: 17px; color: white;">Julio da Silva Santos de Almeida</h4><p style="margin-top: 40px; font-size: 14px; line-height: 17px;">Livro 6748373</p><p style="margin-top: 40px; font-size: 14px;">Devolução 20/04/2019</p></div>

-->

<div class="d-flex flex-wrap mb-5" id="card_livros">
    
</div>



<!--  Modal que edita o chamado -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h3 class="modal-title" id="exampleModalLabel">Emprestimo de Livros</h3>
      </div>
      <div class="modal-body" id="modal_body">
        
        <form name="form_emprestimo" id="form_emprestimo" method="post">
            
            <table style="width: 100%">
                <tr style="margin-bottom: 20px;">
                    <td style="width: 30%; text-align: center;">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="input-group">
                                <span class="input-icon input-icon-left">Aluno</span>
                                <td style="width: 70%; text-align: left;" >
                                    <input class="form-control" type="text" id="aluno" name="aluno" style="width: 250px">
                                    <!--<ul id="alunos" class="oi"></ul>-->
                                    <li id="alunos"></li>
                                </td>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr style="margin-bottom: 20px;">
                    <td style="width: 30%; text-align: center;">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="input-group">
                                <span class="input-icon input-icon-left">Registro</span>
                                <td style="width: 70%; text-align: left;">
                                    <input class="form-control" type="text" id="registro" name="registro" style="width: 250px">
                                </td>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr style="margin-bottom: 20px;">
                    <td style="width: 30%; text-align: center;">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="input-group">
                                <span class="input-icon input-icon-left">Obra</span>
                                <td style="width: 70%; text-align: left;">
                                    <input class="form-control" type="text" id="obra" name="obra" style="width: 250px">
                                </td>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <input type="text" name="aluno_id" id="aluno_id">
                <div id="id_equipamento"></div>
                <div id="codigo"></div>             
            </table>       
            
      </div>
              <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-primary">Emprestar</button>
              </div>
        </form>      
    </div>
  </div>
</div>



    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){   

        $('#exampleModal').hide();

        // Busca todos livros emprestados quando carrega a pagina
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/busca_emprestimo",
            method:"POST",
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#total_emprestimo').html(data['locados'].length);
                $('#total_vencidos').html(data['vencidos'].length);
                
                for (var i = 0; i < data['vencidos'].length; i++) {
                    var d = new Date(data['vencidos'][i].data_devolucao);
                    data_devolucao = (d.toLocaleDateString());

                    $('#card_livros').prepend('<div class="static-widget bg-danger text-white" style="width: 160px; height: 160px; margin-bottom:15px"><h4 class="m-0" style="margin: 0; padding: 0; line-height: 17px; color: white;">'+data['vencidos'][i].nome+'</h4><p style="margin-top: 20px; font-size: 14px; line-height: 17px;">'+data['vencidos'][i].obra+'</p><p style="margin-top: 20px; font-size: 14px;">'+data_devolucao+'</p><button class="btn btn-ligth btn-sm" style="margin-right: 10px" onclick="entregar('+data['vencidos'][i].id+')">Entregar</button><button class="btn btn-ligth btn-sm" onclick="renovar('+data['vencidos'][i].id+')">Renovar</button></div>');          
                }

                for (var i = 0; i < data['locados'].length; i++) {
                    var d = new Date(data['locados'][i].data_devolucao);
                    data_devolucao = (d.toLocaleDateString());
                    
                    $('#card_livros').prepend('<div class="static-widget bg-success-600  text-white" style="width: 160px; height: 160px; margin-bottom:15px"><h4 class="m-0" style="margin: 0; padding: 0; line-height: 17px; color: white;">'+data['locados'][i].nome+'</h4><p style="margin-top: 20px; font-size: 14px; line-height: 17px;">'+data['locados'][i].obra+'</p><p style="margin-top: 20px; font-size: 14px;">'+data_devolucao+'</p><button class="btn btn-ligth btn-sm" style="margin-right: 10px" onclick="entregar('+data['locados'][i].id+')">Entregar</button><button class="btn btn-ligth btn-sm" onclick="renovar('+data['locados'][i].id+')">Renovar</button></div>');          
                }
                
            }
        })



    


    })

    function entregar($id){
        var id = $id;
        swal("", {
          title: "Voçe realmente quer devolver este livro?",
            text: "",
            icon: "warning",
          buttons: {
            cancel: "Voltar",
            catch: {
              text: "Devolver",
              value: "catch",
            },
            //defeat: true,
          },
        })
        .then((value) => {
          switch (value) {
            case "catch":
                $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/devolucao_emprestimo_obra",
                    method:"POST",
                    dataType: 'json',
                    data:{id:id},
                    success:function(data){
                        //swal("Livro devolvido com sucesso", "", "success");
                        location.reload();
                    }
                })
                
                break;
         
            default:
            return false;
          }
        });


/*
        var id = $id;
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/devolucao_emprestimo_obra",
            method:"POST",
            dataType: 'json',
            data:{id:id},
            success:function(data){
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
            }
        })
*/

        
        
    }

    function renovar($id){
        var id = $id;
        swal("", {
          title: "Você realmente deseja renovar este livro?",
            text: "",
            icon: "warning",
          buttons: {
            cancel: "Voltar",
            catch: {
              text: "Renovar",
              value: "catch",
            },
            //defeat: true,
          },
        })
        .then((value) => {
          switch (value) {
            case "catch":
                $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/renovar_emprestimo_obra",
                    method:"POST",
                    dataType: 'json',
                    data:{id:id},
                    success:function(data){
                        //alert(data);
                        console.log(data);
                        swal("Renovado até o dia "+formatar_data(data)+" ", "", "success");
                    },
                    error:function(){
                        alert('ERRO');
                    }
                })
                
                break;
         
            default:
            return false;
          }
        });

    }

    $('#form_emprestimo').submit(function(e){
        e.preventDefault();
        //alert('s');
        var aluno_id = $('#aluno_id').val();
        var registro = $('#registro').val();
        var obra = $('#obra').val();

        if ($('#aluno') == '') {
            alert('Infome o aluno');
            return false;
        }else if (registro == '') {
            alert('Digite o numero do registro');
            return false;
        }else if (obra == '') {
            alert('Infome a obra');
            return false;
        }

        //alert(aluno);
        //alert(registro);
        //alert(obra);
        //$('#alert').empty();
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/emprestimo_obra",
            method:"POST",
            dataType: 'json',
            data:{aluno_id:aluno_id, registro:registro, obra:obra},
            success:function(data){
                //alert(data);
                //console.log(data);
                location.reload();
            }
        })

    })

    function inserir_id(id, nome){

        $('#aluno_id').val(id);
        $('#alunos').empty();
        $('#registro').focus();
        $('#aluno').val(nome);
    }


    $('#btn_modal').click(function(){
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/busca_aluno",
            method:"POST",
            dataType: 'json',
            success:function(data){
                console.log(data);
                //for (var i = 0; i < data.length; i++) {
                    
                  //  $('#aluno').prepend('');          
                //}
            }
        })
    })


    $('#aluno').keyup(function(){

        
        var aluno = $('#aluno').val();
        //alert(aluno);
        if (aluno.length < 3) {
            $('#alunos').empty();
            return;    
        }
        
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/emprestimo_obra/busca_aluno",
            method:"POST",
            dataType: 'json',
            data: {aluno:aluno},
            success:function(data){
                //console.log(data);

                $('#alunos').empty();
                for (var i = 0; i < data.length; i++) {
                    
                    $('#alunos').prepend('<li onclick="return(inserir_id('+data[i].id+'))">'+data[i].nome+'</li>');          
                }

            }
        })  
    })

    function formatar_data($data){
        var d = new Date($data);
        data_fim = (d.toLocaleDateString());
        return data_fim;
    }


</script>
