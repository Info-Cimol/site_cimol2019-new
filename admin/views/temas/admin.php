<?php

    require_once($this->config->item("base_dir").'public/temas/admin/header.php');

    require_once($this->config->item("base_dir").'public/temas/admin/nav.php');

    
    $this->load->view($content);               
    require_once($this->config->item("base_dir").'public/temas/admin/footer.php');

                   
            ?>