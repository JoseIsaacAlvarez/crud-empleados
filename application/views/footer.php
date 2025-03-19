<?php 

// $data_commpany= $this->Appconfig->get_data_commpany($this->config->item('resellers_id'));

// $foot_msg = "Todos los derechos reservados de ". $data_commpany->short_name .", Estas usando la versión <span class='label label-info'>". APPLICATION_VERSION  
// 		."</span> ". $data_commpany->short_name .",  visita <a target='_blank' href='".  $data_commpany->url_website ."'>".  $data_commpany->url_website ."</a>";

$footer_msg = "Estas usando la versión <span class='label label-info'>1</span> de Employee Manager";

?>
<!-- BEGIN FOOTER --> 
<div class="page-footer">
    <div class="container">
        <div class="page-footer-inner"><?php echo $footer_msg; ?></div>
        <div class="scroll-to-top"><i class="fa fa-arrow-circle-up"></i></div>	
    </div>				
</div>
<!-- END FOOTER -->
</body>
</html>