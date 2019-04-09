
<?php
if(isset($noticia)){
	foreach ($noticia as $dados) {
		$id=$dados->id;
		$titulo=$dados->titulo;
		$conteudo=$dados->conteudo;
		$resumo=$dados->resumo;
		$data=$dados->data_postagem;
		$nome_imagem = $dados->arquivo_imagem;
		$url_imagem = $dados->url_imagem;
		if(isset($dados->arquivo_imagem))
			$caminho_imagem= base_url().$dados->url_imagem.$dados->arquivo_imagem;
		else
			$caminho_imagem = "";

		if(isset($tags_noticia)){
			for ($i=0; $i < count($tags_noticia); $i++) {
						$tags[]=$tags_noticia[$i]['marcador'];
			}
		}else{
			$tags = 0;
		}



	}

 ?>
    <?php echo form_open_multipart('admin/noticia/salvar_noticia' , array('class' => 'form-horizontal','target'=>'_top'));?>

			<div hidden>
				<input type="text" name="noticia[id]" class="input-large" value="<?php echo $id; ?>" required/>
			</div>

        <div class="form-group" style="margin-bottom: 2%;">
            <label for="titulo" class="" style="width:8%;float:left;">Título:</label>
            <input id="titulo" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[titulo]" pattern='[^\"]+' class="form-control" value="<?php echo $titulo; ?>" required/>
        </div>

        <div class="form-group" style="margin-bottom: 2%;">
            <label for="resumo" class="" style="width:8%;float:left;">Resumo:</label>
            <input id="resumo" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[resumo]" pattern='[^\"]+' class="form-control" value="<?php echo $resumo; ?>" required/>
        </div>

        <div class="form-group" style="margin-bottom: 2%;">
            <label for="tags" class="" style="width:8%;float:left;">Tags:</label>
            <input id="tags" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[tags]" class="form-control"
						value="<?php
						if($tags!=0){
							for ($i=0; $i < count($tags); $i++) {
									echo $tags[$i].";";
						  }
						}
						?>"/>
        </div>
				<div class="form-group" style="margin-bottom: 2%;">
						<label for="data" class="" style="width:8%;float:left;">Data:</label>
						<input id="data" type="text" style="margin-left:2%;height:30px; width:90%;" name="noticia[data]"  class="form-control" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" placeholder="yyyy-mm-dd" value="<?php echo $data; ?>" required/>
				</div>
				<div class="form-group" style="margin-bottom: 2%;">
					<label for="mce_textarea" class="" style="width:8%;float:left;">Conteudo:</label>
					<textarea type="text" style="margin-left:2%;" name="noticia[conteudo]" id="mce_textarea" required>
						<?php echo $conteudo; ?>
					</textarea>
				</div>
        <div class="form-group" hidden>
            <input name="noticia[nome_imagem]" value="<?php echo $nome_imagem; ?>" required>
        </div>
        <div class="form-group" hidden>
            <input name="noticia[url_imagem]" value="<?php echo $url_imagem; ?>" required>
        </div>
		<div class="form-group">
			<label class="control-label" style="width:8%;float:left;">
				Imagem:
			</label>
				<input type="file" name="imagem" style="margin-left:2%;height:30px; width:90%;">
			<br>
			<img class='img-thumbnail' src='<?php echo $caminho_imagem; ?>' alt='Erro no caminho: <?php echo $caminho_imagem; ?>'>
			<br>
		</div>

    <div class="form-actions">
        <button type="submit" onclick="tinymce.triggerSave();" class="btn btn-blue">Salvar Alterações</button>
    </div>
	</form>

<?php
}else{
?>
<div class="box-content">
    <?php echo form_open_multipart('admin/noticia/salvar_noticia' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
		<div hidden>
			<input type="text" name="noticia[id]" class="input-large" required/>
		</div>

			<div class="form-group" style="margin-bottom: 2%;">
					<label for="titulo" class="" style="width:8%;float:left;">Título:</label>
					<input id="titulo" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[titulo]" pattern='[^\"]+' class="form-control" required/>
			</div>

			<div class="form-group" style="margin-bottom: 2%;">
					<label for="resumo" class="" style="width:8%;float:left;">Resumo:</label>
					<input id="resumo" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[resumo]" pattern='[^\"]+' class="form-control" required/>
			</div>

			<div class="form-group" style="margin-bottom: 2%;">
					<label for="tags" class="" style="width:8%;float:left;">Tags:</label>
					<input id="tags" type="text" style="margin-left:2%;height:30px;width:90%;" name="noticia[tags]" class="form-control" required/>
			</div>
			<div class="form-group" style="margin-bottom: 2%;">
					<label for="data" class="" style="width:8%;float:left;">Data:</label>
					<input id="data" type="text" style="margin-left:2%;height:30px; width:90%;" name="noticia[data]"  class="form-control" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" placeholder="yyyy-mm-dd" required/>
			</div>
			<div class="form-group" style="margin-bottom: 2%;">
				<label class="" style="width:8%;float:left;">Imagem:</label>
					<input type="file" name="imagem" style="margin-left:2%;height:30px; width:90%;">
			</div>
			<div class="form-group" style="margin-bottom: 2%;">
				<label for="mce_textarea" class="" style="width:8%;float:left;margin-right:2%;">Conteudo:</label>
				<textarea type="text" style="" name="noticia[conteudo]" id="mce_textarea" required></textarea>
			</div>
			<div class="form-group" hidden>
					<input name="noticia[nome_imagem]" required>
			</div>
			<div class="form-group" hidden>
					<input name="noticia[url_imagem]" required>
			</div>


	<div class="form-actions">
			<button type="submit" onclick="tinymce.triggerSave();" class="btn btn-blue">Nova Noticia</button>
	</div>
</form>
<?php } ?>

 <script src='<?php echo base_url() ?>public/plugins/tiny_mce/tiny_mce.js'></script>
 <script>


 tinyMCE.init({
	 // General options
 	 language : "pt",
	 mode : "textareas",
	 theme : "advanced",
	 plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	 // Theme options
	 theme_advanced_buttons1: "code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,fullscreen",
	 theme_advanced_toolbar_location : "top",
	 theme_advanced_toolbar_align : "left",
	 theme_advanced_statusbar_location : "bottom",
	 theme_advanced_resizing : true,
	 // Drop lists for link/image/media/template dialogs
	 //external_image_list_url : "<?php //echo base_url(); ?>public/plugins/tiny_mce/lists/image_list.js"
 });
 </script>
