<div class="text-justify">
    <?php foreach($dest as $d) { ?>
        <h3 class="text-center" style="color: white;"><?php echo $d->country_name;?> - полезна информация</h3>
		<br/>
		<div>
			<?php if(isset($d->country_image)) { ?><img class="img-responsive img-rounded pull-left" style="margin-right: 2%;" src="<?php echo base_url().'assets/images/'.$d->created_by.'/'.$d->country_image; ?>.jpg" width="200px" height="150px" /> <?php } ?>
			<?php echo $d->description;?>
		</div>
</div>
<br/><br/><br/>
<h3 class="text-center" style="color: white;"><?php echo $d->country_name;?> - актуални оферти</h3>
   <?php    
        }
    ?>
<div class="row-fluid row-centered">
		   <?php 
		   if(empty($dest_offers)){
			   echo '<h4 class="text-center">Очаквайте скоро...</h4>';
		   } else {
			   
			   foreach($dest_offers as $do){ 
			   if($do->is_active == 1 && $do->is_deleted_from_user == 0 && $do->expiry_date>=date('Y-m-d')) { ?>
	<div class="col-md-4 col-xs-6 col-sm-4 offerBox">
		<a href="<?php echo base_url(); ?>offer/view/<?php echo $do->id; ?>">
			<div>
				<img src="<?php echo base_url(); ?>assets/images/<?php echo $do->user_id.'/'.$do->image1;?>" alt="<?php echo $do->title;?>" class="img-rounded center-block" />
			</div>
			<h5 class="text-center"><?php echo $do->title;?></h5>
		</a>
	</div>							
			<?php
		   } } } ?>
</div>
