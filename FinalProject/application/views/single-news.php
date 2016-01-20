<h3 class="text-center" style="color: white;">НОВИНИ</h3>

<div class="span12">
	
	<?php foreach($single_news as $sn) { ?>
	<div class="pull-left" style="width: 30%; margin-right: 3%;">		
		<img src="<?php echo base_url().'assets/images/'.$sn->user_id.'/'.$sn->image; ?>.jpg" class="img img-responsive img-rounded" width="200px" height="150px" />
		</div>
		<h4 class="text-center"><?php echo $sn->title;?></h4>
		<h5 class="text-center"><?php echo $sn->subtitle;?></h5>
		<h6 class="pull-right"><?php echo $sn->publishing_date;?></h6>
		<br/>
		<br/>
		<div class="text-justify"><?php echo $sn->news_description;?></div>
	</div>	
<?php } ?>

	<br/>
	<br/>
	<div class="pull-right"><a href="<?php echo base_url();?>news">&lt;&lt; назад към всички новини </a></div>



