<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Nadezhda Borisova">

	<?php
	if(isset($title)){
		echo '<title>'.$title.' | Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
	}
	elseif(isset($category)){
		foreach($category as $c){
			echo '<title>'.$c->category_name.' | Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
		}
	}elseif(isset($offer)){
		foreach($offer as $o){
			echo '<title>'.$o->title.' | Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
		}
	}elseif(isset($news)){
		echo '<title>Новини | Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
	} elseif(isset($dest)){
		foreach($dest as $d){
			echo '<title>'.$d->country_name.' - полезна информация и актуални оферти | Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
		}
	} else {
		echo '<title>Travel-Catalog.net - туристически каталог за екскурзии и почивки</title>';
	}
	
	?>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.5.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/validator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-3.3.5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="background">
    <div class="container-fluid">
			<?php if($this->session->userdata('logged_in')&&isset($username)){ ?>
		<div class="dropdown text-right navbar-fixed-top">
		  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<strong>Здравей, <?php echo $username; ?> </strong>
			<span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
				<li><a href="<?php echo base_url(); ?>manageoffers/display">Моите оферти </a></li>
				<li><a href="<?php echo base_url(); ?>manageprofile"> Моят профил </a></li>
				<li><a href="<?php echo base_url(); ?>login/logout">Изход </a></li>
		  </ul>
		</div>
		<br/>
		<?php } ?>
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/header.png" class="img-responsive center-block" id="header"/></a>
    </div>
    <div class="content">
	<!-- Area hidden for extra small devices -->
        <!-- TOP OFERTI -->
		<div class="container-fluid well col-md-12 col-centered hidden-xs" style="margin-top: 1%">
			<div id="myCarousel" class="carousel slide">
				<!-- Carousel items -->
				<div class="carousel-inner">
					<div class="item active">
						<div class="row-fluid center-block">
						<?php foreach($topoffers1 as $to1){?>
							<div class="col-md-3 img-wrapper-custom">
								<a href="<?php echo base_url(); ?>offer/view/<?php echo $to1->offer_id; ?>">
									<img src="<?php echo base_url(); ?>assets/images/<?php echo $to1->user_id.'/'.$to1->image1;?>" alt="<?php echo $to1->title;?>" class="img-rounded center-block" width="255px" height="191px" />
									<div class="txt-overlay-img text-center"><?php echo $to1->title;?></div>
								</a>
							</div>	
						<?php } ?>
						</div>
						<!--/row-->
					</div>
					<!--/item-->
					<div class="item">
						<div class="row-fluid center-block">
						<?php foreach($topoffers2 as $to2){?>
							<div class="col-md-3 img-wrapper-custom">
								<a href="<?php echo base_url(); ?>offer/view/<?php echo $to2->offer_id; ?>">
									<img src="<?php echo base_url(); ?>assets/images/<?php echo $to2->user_id.'/'.$to2->image1;?>" alt="<?php echo $to2->title; ?>" class="img-rounded center-block" width="255px" height="191px" />
									<div class="txt-overlay-img text-center"><?php echo $to2->title; ?></div>
								</a>
							</div>	
						<?php } ?>
						</div>
						<!--/row-->
					</div>
					<!--/item-->
				</div>
			</div>
			<!--/carousel-inner--> 
			<!-- Carousel nav -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
			<br/>
			 <!--/myCarousel-->
		</div>	
		<!-- End of Area hidden for extra small devices -->