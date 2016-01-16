<h3 class="text-center" style="color: white;">РАЗШИРЕНО ТЪРСЕНЕ</h3>
<br/>
<form role="form" id="fullSearch" action="<?php echo base_url(); ?>manageoffers/full_search" method="GET" class="form-horizontal well">
	<div class="form-group">
		<div class="col-md-12">
			<input type="text" class="form-control" id="keyword" name="keyword" maxlength="255" placeholder="Ключови думи" autocomplete="on" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4">
			<label for="category" class="control-label text-left"> Категория</label><br/>
			<select name="category" id="category" class="form-control">
				<option> </option>';
				
				<?php $cnt=1; 
				foreach($categories as $category){
					if($category->cat_id > 1){
						echo '<option disabled>'.$category->category_name.'</option>';
					
						if(isset($subcategories[$cnt])){				
							foreach($subcategories[$cnt] as $subcategory){
								echo '<option value="'.$subcategory->category_name.'">'.$subcategory->category_name.'</option>';
							}
						}
					}
					$cnt++;
				} ?>
			</select>
		</div>
		<div class="col-md-4">
			<label for="country" class="control-label text-left"> Държава</label><br/>
			<select name="country" id="country" class="form-control">
				<option> </option>
				<?php foreach($destinations as $destination) {echo '<option value="'.$destination->country_name.'">'.$destination->country_name.'</option>';}?>
			</select>
		</div>	
		<div class="col-md-4">
			<label for="transport" class="control-label text-left"> Транспорт</label><br/>
			<select name="transport" id="transport" class="form-control">
				<option> </option>
				<option>Автобус</option>
				<option>Самолет</option>
				<option>Кораб</option>
				<option>Собствен транспорт</option>
			</select>
		</div>
	</div>
			
	<br/>
	<div class="form-group">
		<div class="col-md-4"></div>
		<div class="col-md-8">
			<input type="submit" class="btn btn-primary" name="submit" value="Търси"/>
			<input type="reset" class="btn btn-primary" name="reset" value="Изчисти"/>
		</div>
	</div>
</form>
<hr/>
<hr/>
<hr/>
<div class="container-fluid well">
	<h4 class="text-center"><strong>ТОП ОФЕРТИ</strong></h4>
	<div class="col-md-12 col-centered" style="margin-top: 1%;">
		<div class="item">
			<div class="row-fluid row-centered">
			
				<?php 
				for($i=0; $i<6; $i++) { ?>
				<div class="col-md-4 col-xs-6 offerBox">
					<a href="<?php echo base_url().'offer/view/'.$top_offers[$i]->offer_id; ?>">
						<div>
							<img src="<?php echo base_url(); ?>assets/images/<?php echo $top_offers[$i]->user_id.'/'.$top_offers[$i]->image1;?>" alt="<?php echo $top_offers[$i]->title; ?>" class="img-responsive img-rounded center-block" />
						</div>
						<h5 class="text-center"><?php echo $top_offers[$i]->title; ?></h5>
					</a>
				</div>		
				<?php } ?>							
			</div>
			<!--/row-->
		</div>
		<!--/item-->
	</div>
	<div class="clearfix"></div>
	<span class="pull-right"><a href="<?php echo base_url().'category/view/1'; ?>">виж всички ТОП оферти &gt;&gt;&gt;</a></span>
</div>

