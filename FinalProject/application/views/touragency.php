<h3 class="text-center" style="color: white;">ТУРИСТИЧЕСКИ АГЕНЦИИ</h3>
<div class="text-justify">
    <?php foreach($agency as $ag) { ?>
        <br/>
        <table class="agency-profiles well" width="100%">
			<tr><th> <h4 class="text-center"><?php echo $ag->company_name;?></h4></th><tr>
			<tr>
				<td>
					<?php if(isset($ag->logo)){?><img src="<?php echo base_url().'assets/images/logos/'.$ag->logo;?>" class="img img-responsive pull-left" style="margin-right: 2%;" width="200px"/><?php } else { ?><img src="<?php echo base_url();?>assets/images/logo-default-img.jpg" class="img img-responsive pull-left" style="margin-right: 2%;" width="200px"/><?php } ?>

					<div class="pull-left">
						<h5><span class="glyphicon glyphicon-map-marker"></span> гр. <?php echo $ag->city;?>, <?php echo $ag->address;?></h5>
						<h5><span class="glyphicon glyphicon-earphone"></span> <?php echo $ag->phone;?></h5>
						<h5><span class="glyphicon glyphicon-envelope"></span> <?php echo $ag->email;?></h5>
						<h5><span class="glyphicon glyphicon-globe"></span> <?php echo $ag->website;?></h5>
					</div>
				</td>
			</tr>
            <tr><td><p><?php echo html_entity_decode($ag->description); ?></p></td></tr>
			</table>
			<br/>
			
			<?php 
			if(isset($agency_offers)) { ?>
			<h4 class="text-center">Всички оферти на <?php echo $ag->company_name;?></h4>
				<?php 
				foreach($agency_offers as $ao){ 
					if($ao->is_active == 1 && $ao->is_deleted_from_user == 0 && $ao->expiry_date>=date('Y-m-d')) { ?>
						<div class="col-md-4 col-xs-6 col-sm-4 offerBox">
							<a href="<?php echo base_url(); ?>offer/view/<?php echo $ao->id; ?>">
								<div>
									<?php if($ao->image1==''){ ?>
										<img class=" img img-rounded center-block" alt="" src="<?php echo base_url();?>assets/images/offer-default-img.jpg" />
									<?php } else { ?>
									<img src="<?php echo base_url(); ?>assets/images/<?php echo $ao->user_id.'/'.$ao->image1;?>" alt="<?php echo $ao->title;?>" class="img img-rounded center-block"/>
									<?php } ?>
								</div>
								<h5 class="text-center"><?php echo $ao->title;?></h5>
							</a>
						</div>	

				<?php } } }?>
        <br/>
       
    <?php  }  ?>
	
	<br/>
	<br/>
</div>