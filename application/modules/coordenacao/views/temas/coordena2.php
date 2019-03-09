<?php

    require_once($this->config->item("base_dir").'public/temas/coordena/header.php');

   require_once($this->config->item("base_dir").'public/temas/coordena/content.php');

    
    $this->load->view($content);               
    //require_once($this->config->item("base_dir").'public/temas/coordena/footer.php');

                   
            ?>