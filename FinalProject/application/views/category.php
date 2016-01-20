<h3 class="text-center" style="color: white;"> <?php foreach($category as $cat){echo $cat->category_name; } ?></h3>
<div class="row-fluid col-centered" style="margin-top: 1%;">
<?php 
if(empty($offers)){?>
   <h4 class="text-center">Очаквайте скоро...</h4>
<?php } else {
   
foreach($offers as $offer){ ?>
	<div class="col-md-4 col-xs-6 col-sm-4 offerBox">
		<a href="<?php echo base_url(); ?>offer/view/<?php echo $offer->offer_id; ?>">
			<img src="<?php echo base_url(); ?>assets/images/<?php echo $offer->user_id.'/'.$offer->image1;?>" alt="<?php echo $offer->title;?>" class="img-rounded center-block" />
			<h5 class="text-center"><?php echo $offer->title;?></h5>
		</a>
	</div>							
<?php
} } ?>

</div>
<div class="clearfix"></div>
<div class="text-center"><ul class="pagination"><?php foreach ($pages as $page) { echo "<li>".$page."</li>";} ?> </ul></div>