
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
	}

 ?>
<div class="box-content">
    <?php echo form_open_multipart('admin/noticia/salvar_noticia' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
    <div class="padded">
        <div class="control-group" hidden>
            <label class="control-label"></label>
            <div class="controls">
            	<input type="text" name="noticia[id]" maxlength="90" class="input-large" value="<?php echo $id; ?>" required/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
				Título:
			</label>
            <div class="controls">
            	<input type="text" name="noticia[titulo]" maxlength="90" class="input-large" value="<?php echo $titulo; ?>" required/>
            </div>
        </div>
				<div class="control-group">
						<label class="control-label">
							Resumo:
						</label>
				<div class="controls">
							<input type="text" name="noticia[resumo]" value="<?php echo $resumo; ?>" maxlength="90" class="input-large" required/>
						</div>
				</div>
				<div class="control-group">
						<label class="control-label">
				Data:
			</label>
						<div class="controls">
							<input type="text" name="noticia[data]" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" placeholder="yyyy-mm-dd" value="<?php echo $data; ?>" class="input-large" required/>
						</div>
				</div>
        <div class="control-group">
            <label class="control-label">
				Conteúdo:
			</label>
            <div class="controls">
               	<textarea name="noticia[conteudo]" id="mce_textarea" required>
					<?php echo $conteudo; ?>
				</textarea>
            </div>
        </div>
        <div class="control-group" hidden>
            <label class="control-label"></label>
            <div class="controls">
               	<input name="noticia[nome_imagem]" value="<?php echo $nome_imagem; ?>" required>
            </div>
        </div>
        <div class="control-group" hidden>
            <label class="control-label"></label>
            <div class="controls">
               	<input name="noticia[url_imagem]" value="<?php echo $url_imagem; ?>" required>
            </div>
        </div>
		<div class="control-group">
			<label class="control-label">
				Imagem:
			</label>
			<br>
			<img class='img-thumbnail' src='<?php echo $caminho_imagem; ?>' alt='<?php echo $caminho_imagem; ?>'>
			<br>
			<div class="controls">
				<input type="file" name="imagem">
			</div>
		</div>
    </div>
    <div class="form-actions">
        <button type="submit" onclick="tinymce.triggerSave();" class="btn btn-blue">Salvar Alterações</button>
    </div>
	</form>
</div>
<?php
}else{
?>
<div class="box-content">
    <?php echo form_open_multipart('admin/noticia/salvar_noticia' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
    <div class="padded">
        <div class="control-group">
            <label class="control-label">
							Título:
						</label>
        <div class="controls">
            	<input type="text" name="noticia[titulo]" maxlength="50" class="input-large" required/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
							Resumo:
						</label>
        <div class="controls">
            	<input type="text" name="noticia[resumo]" maxlength="110" class="input-large" required/>
            </div>
        </div>
				<div class="control-group">
						<label class="control-label">
				Data:
			</label>
						<div class="controls">
							<input type="text" name="noticia[data]" pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}" placeholder="yyyy-mm-dd" class="input-large" required/>
						</div>
				</div>
        <div class="control-group">
            <label class="control-label">
				Conteúdo:
			</label>
            <div class="controls">
               	<textarea name="noticia[conteudo]" id="mce_textarea" rows="5" required>
				</textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
				Imagem:
			</label>
            <div class="controls">
       			<input type="file" name="imagem">
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" onclick="tinymce.triggerSave();" class="btn btn-blue">
			Nova Notícia
		</button>
    </div>
	</form>
</div>
<?php } ?>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
 <script>
 tinymce.init({
	 // General options
 // language : "pt",
	 selector : "textarea",
	 // theme : "advanced",
	 plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	 // // Theme options
	 // theme_advanced_buttons1: "code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,fullscreen",
	 // theme_advanced_toolbar_location : "top",
	 // theme_advanced_toolbar_align : "left",
	 // theme_advanced_statusbar_location : "bottom",
	 // theme_advanced_resizing : true,
	 // Drop lists for link/image/media/template dialogs
	 //external_image_list_url : "<?php //echo base_url(); ?>public/plugins/tiny_mce/lists/image_list.js"
 });
 </script>
