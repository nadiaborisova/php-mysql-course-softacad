<?php foreach($offer as $of) { ?>
<h3 class="text-center" style="color: white;"><?php echo $of->title;?></h3>
<?php if($of->is_active == 0){
		echo '<br/><div class="text-info text-center">Офертата изчаква одобрение от Администратор!</div><br/>';
	}
	elseif($of->is_active == 2){
		echo '<br/><div class="text-danger text-center">Офертата е неодобрена!</div><br/>';
	} 
?>

<ol class="breadcrumb">
  <li><small><a href="<?php echo base_url(); ?>">Начало</a></small></li>
  <li><small><a href="<?php echo base_url().'category/view/'.$of->cat_id; ?>"><?php echo $of->category_name; ?></a></small></li>
  <li class="active"><small><?php echo $of->title; ?></small></li>
</ol>
<div class="pull-right" style="width: 30%; margin-left: 3%;">		

	<div class="row">
		<div class='list-group gallery'>
			<div class='col-md-12'>
			<?php if($of->image1==''){ ?>

				<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url();?>assets/images/offer-default-img.jpg">
					<img class="img img-rounded img-responsive" alt="<?php echo $of->title;?>" src="<?php echo base_url();?>assets/images/offer-default-img.jpg" />
				</a>
			<?php } else { ?>

				<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image1;?>">
					<img class="img img-rounded img-responsive" alt="<?php echo $of->title;?>" src="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image1;?>" />
				<?php if($of->image2!=''){ ?>
					<div class='text-center'><small class='text-muted'>Виж всички снимки</small></div>
				<?php } ?>	
				</a>
				
					
			<?php } ?>
				</div> 
			
			<?php if($of->image2!=''){ ?>
			<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' hidden>
				<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image2;?>">
					<img class="img-responsive" alt="" src="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image2;?>" />
				</a>
			</div> 
			<?php } ?>
			<?php if($of->image3!=''){ ?>
			<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' hidden>
				<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image3;?>">
					<img class="img-responsive" alt="" src="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image3;?>" />
				</a>
			</div> 
			<?php } ?>
			<?php if($of->image4!=''){ ?>
			<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' hidden>
				<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image4;?>">
					<img class="img-responsive" alt="" src="<?php echo base_url();?>assets/images/<?php echo $of->user_id.'/'.$of->image4;?>" />
				</a>
			</div> 
			<?php } ?>
		</div> 
	</div> 
	<div class="visible-xs text-center"><strong>Резервации и контакти: </strong><h5><a href="<?php echo base_url(); ?>touragencies/view/<?php echo $of->user_id; ?>"><?php echo $of->company_name;?></a></h5></div>
	<div class="infoBox hidden-xs">	
		<h5 class="text-center"><strong>Държава: </strong> <?php echo $of->country_name;?></h5>
		<h5 class="text-center"><strong>Транспорт: </strong><?php echo $of->transport;?></h5>
		<?php if(isset($of->duration)){?><h5 class="text-center"><strong>Брой дни: </strong> <?php echo $of->duration;?></h5><?php } ?>
		<?php if(isset($of->min_price)){?><h4 class="text-center">Цена от: <?php echo $of->min_price.' '.$of->currency; ?></h4><?php } ?>
		<hr/>
		<hr/>
		<h5 class="text-center"><strong>Резервации и контакти:</strong> </h5>
		<?php if(isset($of->logo)){?><img src="<?php echo base_url().'assets/images/logos/'.$of->logo;?>" class="img img-responsive center-block" style="width: 140px;"/><?php } else { ?><img src="<?php echo base_url();?>assets/images/logo-default-img.jpg" class="img img-responsive center-block" style="width: 140px;"/><?php } ?>
		<h5 class="text-center"><?php echo $of->company_name;?></h5>
		<h5 class="text-center"><strong>Адрес: </strong><br/><?php echo $of->city;?>, <br/> <?php echo $of->address;?></h5>
		<h5 class="text-center"><strong>Телефон/-и: </strong><br/><?php echo $of->phone;?></h5>
		<h5 class="text-center"><strong>Email: </strong><br/><?php echo $of->email;?></h5>
		<h5 class="text-center"><strong>Website: </strong><br/><?php echo $of->website;?></h5>
	</div>
</div>
<div class="text-justify"><strong>Описание / Програма: </strong><br/><?php echo html_entity_decode($of->offer_programm);?></div><br/>
<?php } ?>



