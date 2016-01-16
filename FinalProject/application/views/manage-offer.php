<h3 class="text-center" style="color: white;">РЕДАКЦИЯ НА ОФЕРТА</h3>
<br/>
<span class="text-danger">* задължително поле</span>
<br/>
<br/>
<form data-toggle="validator" role="form" id="addOfferForm" action="<?php echo base_url().'manageoffers/manage/'.$offer_info[0]->id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label for="selectCategory" class="control-label text-left"> Категория/-ии <span class="text-danger">*</span></label><br/>
		<?php
			for($i=1; $i<=2; $i++){
				echo '<div class="col-md-6"><select name="category'.$i.'" id="category'.$i.'" class="form-control"';
				
				if($i==1){echo 'data-error="Моля изберете 1 или 2 подходящи категории за Вашата оферта!" required'; }
				echo '><option>';
				if(isset($offer_info[$i-1]->category_name)){echo $offer_info[$i-1]->category_name;} else {echo 'Избери категория';}
				echo '</option>';
				$cnt=1; 
				foreach($categories as $category){
				
					if($category->cat_id > 1){
						echo '<option disabled>'.$category->category_name.'</option>';
					
					
					if(isset($subcategories[$cnt])){				
						foreach($subcategories[$cnt] as $subcategory){
							echo '<option value="'.$subcategory->id.'">'.$subcategory->category_name.'</option>';
						}
					}
					
					
					}
					$cnt++;
					
				}
				echo '</select></div>';
			}
			echo '<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>';
			
			?>
	</div>
	<hr/>
	<div class="form-group">
		<div class="col-md-6">
			<label for="country" class="control-label">Държава <span class="text-danger">*</span></label><br/>
			<select name="selectCountry" id="selectCountry" class="form-control" data-error="задължителни полета" required>
				<option value="<?php echo $offer_info[0]->cntr_id; ?>"><?php echo $offer_info[0]->country_name; ?></option>
				<?php foreach($destinations as $destination) {echo '<option value="'.$destination->cntr_id.'">'.$destination->country_name.'</option>';}?>
			</select>
		</div>	
		<div class="col-md-6">
			<label for="expiry_date" class="control-label"> Валидност на офертата до дата: <span class="text-danger">*</span></label><br/>
			<input type="text" class="form-control date-input" id="expiry_date" name="expiry_date" placeholder="MM/DD/YYYY" data-error="задължителни полета" required value="<?php echo $offer_info[0]->expiry_date; ?>" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="transport" class="control-label">Транспорт <span class="text-danger">*</span></label><br/>
			<select name="selectTransport" id="transport" class="form-control" data-error="задължителни полета" required>
				<option><?php echo $offer_info[0]->transport; ?></option>
				<option>Автобус</option>
				<option>Самолет</option>
				<option>Кораб</option>
				<option>Собствен транспорт</option>
			</select>
		</div>
		<div class="col-md-3">
			<label for="duration" class="control-label">Продължителност <span class="text-danger">*</span></label><br/>
			<input type="number" class="form-control" id="duration" name="duration" maxlength="50" placeholder="Брой дни" data-error="задължителни полета" required value="<?php echo $offer_info[0]->duration; ?>" />
		</div>
		<div class="col-md-3">
			<label for="min_price" class="control-label"> Цена от <span class="text-danger">*</span></label><br/>
			<input type="number" class="form-control" id="min_price" name="min_price" maxlength="50" placeholder="Цена от" data-error="задължителни полета" required value="<?php echo $offer_info[0]->min_price; ?>" />
		</div>
		<div class="col-md-3">
			<label for="currency" class="control-label">Валута <span class="text-danger">*</span> </label><br/>
			<select name="currency" id="currency" class="form-control" data-error="задължителни полета" required>
				<option><?php echo $offer_info[0]->currency; ?></option>
				<option>лв.</option>
				<option>EUR</option>
				<option>USD</option>
			</select>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<hr/>
	<div class="form-group">
		<label for="title" class="col-md-2 control-label">Заглавие <span class="text-danger">*</span></label>
		<div class="col-md-10">
			<input type="text" class="form-control" id="title" name="title" maxlength="70" placeholder="Заглавие на офертата" data-error="задължително поле" required value="<?php echo $offer_info[0]->title; ?>" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 70 символа.</small>
	</div>
	<div class="form-group">
		<label for="offer_programm" class="col-md-2 control-label"> Описание <span class="text-danger">*</span></label>
		<div class="col-md-10">
			<textarea rows="15" class="form-control" id="offer_programm" name="offer_programm" maxlength="5000" placeholder="Описание"  data-error="задължително поле" required><?php echo html_entity_decode($offer_info[0]->offer_programm); ?></textarea>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 5000 символа.</small>
	</div>
	<div class="form-group">
		<label for="image1" class="col-md-2 control-label">Снимки</label>
		<div class="col-md-10"> 

		<?php 
		if(isset($offer_info[0]->image1)){?>
			<img src="<?php echo base_url();?>assets/images/<?php echo $offer_info[0]->user_id.'/'.$offer_info[0]->image1;?>" class="img-responsive img-rounded" style="width: 150px;" /><br/>
			<?php } 
		if($offer_info[0]->image2!=''){?>
			<img src="<?php echo base_url();?>assets/images/<?php echo $offer_info[0]->user_id.'/'.$offer_info[0]->image2;?>" class="img-responsive img-rounded" style="width: 150px;" /><br/>
			<?php }
		if($offer_info[0]->image3!=''){?>
			<img src="<?php echo base_url();?>assets/images/<?php echo $offer_info[0]->user_id.'/'.$offer_info[0]->image3;?>" class="img-responsive img-rounded" style="width: 150px;" /><br/>
			<?php }
		if($offer_info[0]->image4!=''){?>
			<img src="<?php echo base_url();?>assets/images/<?php echo $offer_info[0]->user_id.'/'.$offer_info[0]->image4;?>" class="img-responsive img-rounded" style="width: 150px;" /><br/>
			<?php }?>
		</div>
	</div>				
	<br/>
	<div class="form-group">
		<div class="col-md-12">
			<input type="submit" class="btn btn-primary center-block" name="submit" value="Редактирай"/>
		</div>
	</div>
</form>
<br/>
<br/>
