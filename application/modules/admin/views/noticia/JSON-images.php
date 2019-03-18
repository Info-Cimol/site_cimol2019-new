<script src="<?php echo base_url() ?>public/plugins/jquery.min.js"></script>
<script>
	$("#para").text("sfasd");
	$.ajax({
		url: '<?php echo base_url(); ?>admin/noticia/listar_imagens',
		success: function(e){
			console.log(e);
			$("#para").text(e);
		}
	});
</script>
<p id="para"></p>
