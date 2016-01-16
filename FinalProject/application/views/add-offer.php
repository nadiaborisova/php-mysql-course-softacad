<h3 class="text-center" style="color: white;">ДОБАВЯНЕ НА ОФЕРТА</h3>
<br/>
<span class="text-danger">* задължително поле</span>
<br/>
<br/>
<form data-toggle="validator" role="form" id="addOfferForm" action="<?php echo base_url(); ?>manageoffers/addoffer" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label for="selectCategory" class="control-label text-left"> Категория/-ии <span class="text-danger">*</span></label><br/>
		<?php
			for($i=1; $i<=2; $i++){
				echo '<div class="col-md-6"><select name="category'.$i.'" id="category'.$i.'" class="form-control"';
				
				if($i==1){echo 'data-error="Моля изберете 1 или 2 подходящи категории за Вашата оферта!" required'; }
				if($i==2){echo 'style="display: none;"'; }
				echo '><option></option>';
				$cnt=1; 
				foreach($categories as $category){
				
					if($category->cat_id > 1){
						echo '<option disabled>'.$category->category_name.'</option>';
					
					
					if(isset($subcategories[$cnt])){				
						foreach($subcategories[$cnt] as $subcategory){
							echo '<option value="'.$subcategory->cat_id.'">'.$subcategory->category_name.'</option>';
						}
					}
					
					
					}
					$cnt++;
					
				}
				echo '</select></div>';
			}
			echo '<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>';
			
			?>
			<span id="addCatBtn" class="btn btn-default pull-right" onclick="addCategory()" style="display: inline;">Допълнителна категория</span>
	</div>
	<hr/>
	<div class="form-group">
		<div class="col-md-6">
			<label for="country" class="control-label">Държава <span class="text-danger">*</span></label><br/>
			<select name="selectCountry" id="country" class="form-control" data-error="задължителни полета" required>
				<option></option>
				<?php foreach($destinations as $destination) {echo '<option value="'.$destination->cntr_id.'">'.$destination->country_name.'</option>';}?>
			</select>
		</div>	
		<div class="col-md-6">
			<label for="expiry_date" class="control-label"> Валидност на офертата до дата: <span class="text-danger">*</span></label><br/>
			<input type="text" class="form-control date-input" id="expiry_date" name="expiry_date" placeholder="MM/DD/YYYY" data-error="задължителни полета" required/>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<label for="transport" class="control-label">Транспорт <span class="text-danger">*</span></label><br/>
			<select name="selectTransport" id="transport" class="form-control" data-error="задължителни полета" required>
				<option></option>
				<option>Автобус</option>
				<option>Самолет</option>
				<option>Кораб</option>
				<option>Собствен транспорт</option>
			</select>
		</div>
		<div class="col-md-3">
			<label for="duration" class="control-label">Продължителност <span class="text-danger">*</span></label><br/>
			<input type="number" class="form-control" id="duration" name="duration" maxlength="50" placeholder="Брой дни" data-error="задължителни полета" required/>
		</div>
		<div class="col-md-3">
			<label for="min_price" class="control-label"> Цена от <span class="text-danger">*</span></label><br/>
			<input type="number" class="form-control" id="min_price" name="min_price" maxlength="50" placeholder="Цена от" data-error="задължителни полета" required>
		</div>
		<div class="col-md-3">
			<label for="currency" class="control-label">Валута <span class="text-danger">*</span> </label><br/>
			<select name="currency" id="currency" class="form-control" data-error="задължителни полета" required>
				<option></option>
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
			<input type="text" class="form-control" id="title" name="title" maxlength="70" placeholder="Заглавие на офертата" required />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Задължително поле. Максимум 70 символа.</small>
	</div>
	<div class="form-group">
		<label for="offer_programm" class="col-md-2 control-label"> Описание <span class="text-danger">*</span></label>
		<div class="col-md-10">
			<textarea rows="15" class="form-control" id="offer_programm" name="offer_programm" maxlength="6000" placeholder="Описание"  required></textarea>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Задължително поле. Максимум 6000 символа.</small>
	</div>
	<div class="form-group">
		<label for="image1" class="col-md-2 control-label">Снимки</label>
		<div class="col-md-10">
			<input type="file" class="form-control" id="image1" name="image1" required/>
			<span id="addImgBtn" class="btn btn-default pull-right" onclick="addImages()" style="display: inline;">Добави още снимки</span>
			<input type="file" class="form-control" id="image2" name="image2" style="display: none;"/>
			<input type="file" class="form-control" id="image3" name="image3" style="display: none;" />
			<input type="file" class="form-control" id="image4" name="image4" style="display: none;" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Позволени разширения: JPG, JPEG, PNG, GIF</small>
	</div>
	
				
	<br/>
	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<input type="submit" class="btn btn-primary" name="submit" value="Добави"/>
			<input type="reset" class="btn btn-primary" name="reset" value="Изчисти"/>
		</div>
	</div>
</form>

<script>
	function addImages(){
		document.getElementById('image2').style.display="block";
		document.getElementById('image3').style.display="block";
		document.getElementById('image4').style.display="block";
		document.getElementById('addImgBtn').style.display="none";
	}
	
	function addCategory(){
		document.getElementById('category2').style.display="block";
		document.getElementById('addCatBtn').style.display="none";
	}
</script>

