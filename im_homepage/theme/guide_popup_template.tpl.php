<?php 
  $department_color = isset($department_color) ? $department_color : '';
  $department_name = isset($department_name) ? $department_name : '';  
  $icon = isset($icon) ? $icon : '';
  $icon_color ='white';  
?>
<div class="agenda-day-wrapper">
  <!-- Header Navigation Block -->
  <div class="agenda-day-navigator-block">
  	<span class="previous-agenda-day">
  	  <?php 
  	    if(isset($guidePrev['nid'])) {
  	    	$link = 'guide-detail/nojs/' . $guidePrev['nid'];
  	    	print ctools_modal_text_button(t('Previous Info'), $link, '', 'ctools-modal-ctools-sample-style');
  	    }
  	  ?> 
  	</span>
  	<span class="agenda-day-text-title"><?php print $guide_day; ?></span>
  	<span class="next-agenda-day">
  	  <?php 
  	    if(isset($guideNext['nid'])) {
  	    	$link = 'guide-detail/nojs/' . $guideNext['nid'];
  	    	print ctools_modal_text_button(t('Next Info'), $link, '', 'ctools-modal-ctools-sample-style');
  	    }
  	  ?> 
  	</span>
  </div>
  <!-- Content Block -->
  <div class="agenda-day-content-wrapper">    
    <!-- Main Content Left Block -->
  	<div class="agenda-day-content-left">
  		<div class="agenda-day-content-top-sec">
  	  <div class="agenda-day-image-block">
  	    <?php //Edited ?>
  	    <div class="agenda-dept-name" style="color:<?php print $department_color;?>"><?php print $department_name;?></div>
        <div class="agenda-teaser-icon" style="color:<?php print $icon_color;?>"><?php print $icon;?></div>
        <span class="agenda-teaser-corner" style="border-top:20px solid <?php print $department_color;?>;border-right:20px solid <?php print $department_color;?>"></span>
        <p class="agenda-teaser-title" style="color:<?php print $department_color;?>"><?php print  mb_substr($title, 0, 15, 'UTF-8');?></p>
        <?php //Edited ?>
  	  </div>
  	  <div class="agenda-day-title"><?php print $title;?></div>
  	  </div>  	  
  	  <div class="agenda-processed-details"><?php if (!empty($processed_details)) :  print $processed_details; endif?></div>
  	   <div class="agenda-error-details"> </div> 	  	  	  
  	  <div class="agenda-description"><?php print ($description);?></div>
  	  <div class="agenda-day-bottom">
  	  <span class="agenda-day-publication-end-date"><?php print $publication_end_date;?></span>
  	  <?php print '<span class = "print" onclick = "return xt_click(this, \'C\',\'1\',\'print::'.$type.'::'.str_replace(" ","_", rawurlencode(rawurldecode($title))).'\',\'A\')">'?><?php print t('Print');?></span>
  	  	<!-- <span class="close-pop close"><?php //print t('Close');?></span> -->
  	  </div>
  	 
  	</div>
  	<!-- Main Content Right Block -->
    <div class="agenda-day-content-right">
    <?php if($type != 'news' && $type != 'benchmark'):?>
      <div class="function-concern <?php if (!empty($store_selected) && $store_selected == 'store_selected') { print $store_selected;} ?>">
        <div class="title"><?php print t('Fonctions concernées');?></div>
        <div class="data"><?php print $function;?>
        </div>
      </div>
      <?php endif; ?>
      <?php  if (!empty($store_selected) && $store_selected == 'store_selected') :?>
      <div class="agenda-content-processed <?php if (!empty($not_clickable) && $not_clickable == 'not_clickable') { print $not_clickable;} ?> <?php if (!empty($processed_class)) { print $processed_class;} ?> " <?php if($processed_status == t("Non Processed") && $_SESSION['ldap_user_role'] != 'salarie_siege') { ?>onclick="return xt_click(this,'C','2','<?php print $type . '_traitee';?>::<?php print str_replace(" ","_", (strtolower($user_processed_store))). '::' .str_replace(" ","_", rawurlencode(rawurldecode($title)));?>','A')"<?php }?>> 
      <div class="agenda-status" id="processed-status"><?php if(!empty($processed_status)) { print $processed_status; }?></div>
      <div class="agenda-image" id="processed-image"><?php if (!empty($processed_image)) { print theme('image',$processed_image); }?></div>    
      </div> 
      <?php endif;?>   
      <div class="relay-store">
        <div class="title"><?php print t('Interlocuteur');?></div>
        
        <?php
          foreach ($relais_en_magasins as $relais_en_magasin) {
          	if(isset($relais_en_magasin['mobile']) && isset($relais_en_magasin['telephoneNumber'])){
          		$mobileORphoneno = $relais_en_magasin['mobile'].' / '.$relais_en_magasin['telephoneNumber'];
          	}
          	if(isset($relais_en_magasin['mobile']) && empty($relais_en_magasin['telephoneNumber'])){
          		$mobileORphoneno = $relais_en_magasin['mobile'];
          	}
            if(empty($relais_en_magasin['mobile']) && isset($relais_en_magasin['telephoneNumber'])){
          		$mobileORphoneno = $relais_en_magasin['telephoneNumber'];
          	}
          	print '<div class="data">';
          	print '<div class="name">'. $relais_en_magasin['name'] .'</div>';
          	print '<div class="mail">'. $relais_en_magasin['mail'] .'</div>';
          	print '<div class="phone">'. $mobileORphoneno .'</div>';
          	print '</div>';
          } 
        ?>
      </div>
      <div class="author">
        <div class="title"><?php print t('Auteur');?></div>
        <div class="data">
          <div class="name"><?php print isset($author['name']) ? $author['name'] : '';?></div>
          <div class="roles"><?php print isset($author['roles']) ? $author['roles'] : '';?></div>
          <div class="email"></div>
        </div>
      </div>
      <?php if(sizeof($document_links)) { ?>
      <div class="documents">
        <div class="title"><?php print t('Documents');?></div>
        <div class="data">
        <?php
            foreach ($document_links as $document_link) {
          		print '<div class="file-link"><a href="/check_file_access/'. $document_link['file_id'].'" target="_blank" onclick="return xt_click(this, \'C\',\'1\',\'download::'.$type.'::'.str_replace(" ","_", rawurlencode(rawurldecode($document_link['name']))).'\',\'A\')">' . $document_link['name'] . '</a></div>';
          } 
        ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
