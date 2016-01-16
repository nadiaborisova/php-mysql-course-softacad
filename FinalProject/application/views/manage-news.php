<div class="col-md-12">
	<h3 class="text-center" style="color: white;">РЕДАКЦИЯ НА НОВИНА</h3>
	<br/>
	<span class="text-danger">* задължително поле</span>
	<br/>
	<br/>
	<?php foreach($news_info as $ni){ ?>
	<form data-toggle="validator" role="form" id="addNewsForm" action="<?php echo base_url().'managenews/manage/'.$ni->news_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">Заглавие <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="title" name="title" maxlength="100" placeholder="Заглавие" data-error="задължително поле" required value="<?php echo $ni->title; ?>" />
			</div>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
		</div>
		<div class="form-group">
			<label for="subtitle" class="col-md-2 control-label">Подзаглавие <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="subtitle" name="subtitle" maxlength="100" placeholder="Подзаглавие" data-error="задължително поле" required value="<?php echo $ni->subtitle; ?>" />
			</div>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
		</div>
		<div class="form-group">
			<label for="news_description" class="col-md-2 control-label"> Новина <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<textarea rows="15" class="form-control" id="news_description" name="news_description" maxlength="5000" placeholder="Новина"  data-error="задължително поле" required><?php echo $ni->news_description; ?></textarea>
			</div>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 5000 символа.</small>
		</div>
		<div class="form-group">
			<label for="image" class="col-md-2 control-label">Снимка</label>
		
			<div class="col-md-3">
				<input type="text" id="current_image" name="current_image" value="<?php echo $ni->image; ?>" hidden />
				<img src="<?php echo base_url();?>assets/images/<?php echo $ni->user_id.'/'.$ni->image;?>.jpg" class="img-responsive img-rounded" width="150px" />
			</div>
			<div class="col-md-6">
				<input type="file" class="form-control" id="image" name="image" />
			</div>
			
			
		</div>
		<div class="form-group">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<label for="expiry_date" class="control-label"> Валидност на новината до дата: <span class="text-danger">*</span></label><br/>
				<input type="text" class="form-control date-input" id="expiry_date" name="expiry_date" placeholder="MM/DD/YYYY" data-error="задължителни полета" required value="<?php echo $ni->expiry_date; ?>" />
			</div>	
			<div class="col-md-4">
				<label for="is_active" class="control-label">Активност <span class="text-danger">*</span></label><br/>
				<select name="is_active" id="is_active" class="form-control" data-error="задължителни полета" required>
					<option><?php if($ni->is_active == 1){echo 'Да'; }else {echo 'Не';} ?></option>
					<option value="1">Да</option>
					<option value="0">Не</option>
				</select>
			</div>	
			<div class="col-md-2"></div>
		</div>
		<br/>
		<div class="form-group">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<input type="submit" class="btn btn-primary" name="submit" value="Редактирай"/>
			</div>
		</div>
	</form>
<?php } ?>
</div>
