<div class="container-fluid well">
	<h3 class="text-center" style="color: white;">ПРАЗНИЧНИ ОФЕРТИ</h3>
	<div class="col-md-12 col-centered" style="margin-top: 1%;">
		<div class="item">
			<div class="row-fluid row-centered">
			
				<?php 
				for($i=0; $i<3; $i++) { ?>
				<div class="col-md-4 col-xs-6 col-sm-4 offerBox">
					<a href="<?php echo base_url().'offer/view/'.$holiday_offers[$i]->offer_id; ?>">
						<div>
							<img src="<?php echo base_url(); ?>assets/images/<?php echo $holiday_offers[$i]->user_id.'/'.$holiday_offers[$i]->image1;?>" alt="<?php echo $holiday_offers[$i]->title; ?>" class="img-rounded center-block" />
						</div>
						<h5 class="text-center"><?php echo $holiday_offers[$i]->title; ?></h5>
					</a>
				</div>		
				<?php } ?>							
			</div>
			<!--/row-->
		</div>
		<!--/item-->
	</div>
	<div class="clearfix"></div>
	<span class="pull-right"><a href="<?php echo base_url().'category/view/2'; ?>">виж всички Празнични оферти &gt;&gt;&gt;</a></span>
</div>
<div class="container-fluid well">
	<h3 class="text-center" style="color: white;">ЕКСКУРЗИИ</h3>
	<div class="col-md-12 col-centered" style="margin-top: 1%;">
		<div class="item">
			<div class="row-fluid row-centered">
			
				<?php 
				for($i=0; $i<3; $i++) { ?>
				<div class="col-md-4 col-xs-6 offerBox">
					<a href="<?php echo base_url().'offer/view/'.$excursions[$i]->offer_id; ?>">
						<div>
							<img src="<?php echo base_url(); ?>assets/images/<?php echo $excursions[$i]->user_id.'/'.$excursions[$i]->image1;?>" alt="<?php echo $excursions[$i]->title; ?>" class="img-rounded center-block" />
						</div>
						<h5 class="text-center"><?php echo $excursions[$i]->title; ?></h5>
					</a>
				</div>		
				<?php } ?>							
			</div>
			<!--/row-->
		</div>
		<!--/item-->
	</div>
	<div class="clearfix"></div>
	<span class="pull-right"><a href="<?php echo base_url().'category/view/3'; ?>">виж всички оферти за Екскурзии &gt;&gt;&gt;</a></span>
</div>
