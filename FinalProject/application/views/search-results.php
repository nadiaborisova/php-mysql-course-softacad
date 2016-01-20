<h3 class="text-center" style="color: white;">РЕЗУЛТАТИ ОТ ТЪРСЕНЕ</h3>
<div class="row-fluid col-centered" style="margin-top: 1%;">
	<a href="<?php echo base_url(); ?>manageoffers/full_search_form"><button class="btn btn-primary pull-right">Ново търсене</button></a>
	<br/>
	<br/>
<?php
if(empty($search_res)){  ?>
	<h4 class="text-center">Няма намерени резултати за: <br/>
		<small>Ключова дума: <strong><?php echo $keyword;?> </strong></small><br/>
		<?php if(isset($cat)){ ?><small>Категория: <strong><?php echo $cat;?> </strong></small><br/><?php } ?>
		<?php if(isset($country)){ ?><small>Държава: <strong><?php echo $country;?></strong> </small><br/><?php } ?>
		<?php if(isset($transport)){ ?><small>Транспорт: <strong><?php echo $transport;?> </strong></small><?php } ?>
	</h4>
	<br/>
<?php } else { ?>
	<h4 class="text-center">
		<small>Ключова дума: <strong><?php echo $keyword;?> </strong></small><br/>
		<?php if(isset($cat)){ ?><small>Категория: <strong><?php echo $cat;?> </strong></small><br/><?php } ?>
		<?php if(isset($country)){ ?><small>Държава: <strong><?php echo $country;?></strong> </small><br/><?php } ?>
		<?php if(isset($transport)){ ?><small>Транспорт: <strong><?php echo $transport;?> </strong></small><?php } ?>
	</h4>
	<br/>
<?php foreach($search_res as $sr){  ?>
	
	<div class="col-md-4 offerBox">
		<a href="<?php echo base_url(); ?>offer/view/<?php echo $sr->id; ?>">
			<div>
				<img src="<?php echo base_url(); ?>assets/images/<?php echo $sr->user_id.'/'.$sr->image1;?>" alt="Image" class="img-responsive img-rounded center-block" />
			</div>
			<h5 class="text-center"><?php echo $sr->title;?></h5>
		</a>
	</div>							
<?php } } ?>

</div>