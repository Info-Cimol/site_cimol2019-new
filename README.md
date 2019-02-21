<h1>Guia para iniciantes em GIT</h1>

<h3> Instalação do Git: </h3>   
<p>1. https://gitforwindows.org (windows)</p>

<h3> Baixando os arquivos do GitHub: </h3>
<p>2. Após já ter instalado o git em seu computador, clique com o botão direito no local desejado para instalação dos arquivos e selecione a opção 'Git Bash Here';
<p>3. Esta instrução abrirá um terminal, nele escreva o seguinte comando:
git clone https://github.com/Info-Cimol/site_cimol2019-new.git
<p>- O download dos arquivos será iniciado e você já poderá trabalhar nele.</p>

->OBS: As alterações feitas nos arquivos não modificarão o repositório original, pode ficar tranquilo!

<h3> Criando seu próprio "ramo": </h3>
<p> Você pode criar sua própria cópia do repositório para ser atualizada sem alterar os arquivos originais
<p> Para isso, abra novamente o terminal seguindo a instrução de número 2 e execute o comando abaixo:
<p> git checkout -b x
<p> sendo 'x' o título que você quiser usar, de preferência seu nome
<p> Seu 'ramo' ou 'branch' estará disponível apenas para você;</p>
  
<h3> Atualizando seu branch: </h3>
<p> Para manter seu branch sempre atualizado você pode enviar seus arquivos locais modificados para ele;
<p> Abra novamente o terminal na pasta de origem dos arquivos (instrução 2) e execute estas instruções:
<p> git add *
<p> -para adicionar todos os arquivos na lista de envio
<p> git commit -m "comentários das alterações" 
<p> -para comentar as alterações feitas, seja breve no comentário
<p> git push origin x
<p> - sendo novamente 'x' o nome dado ao seu branch
<p> Ao executados os comandos, seu branch estará atualizado</p>
  
  
<h3> Para mais informações sobre como utilizar o git consulte o link </h3>
<p>https://rogerdudler.github.io/git-guide/index.pt_BR.html
<p> com o guia completo de como utilizar a ferramenta
  
<h1>Espero ter te ajudado!  :)</h1>
