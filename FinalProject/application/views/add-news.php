<div class="col-md-12">
	<h3 class="text-center" style="color: white;">ДОБАВЯНЕ НА НОВИНА</h3>
	<br/>
	<span class="text-danger">* задължително поле</span>
	<br/>
	<br/>
	<form data-toggle="validator" role="form" id="addNewsForm" action="<?php echo base_url(); ?>managenews/addnews" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="title" class="col-md-3 control-label">Заглавие <span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="title" name="title" maxlength="100" placeholder="Заглавие" data-error="задължително поле" required />
				<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
			</div>
		</div>
		<div class="form-group">
			<label for="subtitle" class="col-md-3 control-label">Подзаглавие <span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="subtitle" name="subtitle" maxlength="100" placeholder="Подзаглавие" data-error="задължително поле" required />
				<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
			</div>
		</div>
		<div class="form-group">
			<label for="news_description" class="col-md-3 control-label"> Новина <span class="text-danger">*</span></label>
			<div class="col-md-6">
				<textarea rows="15" class="form-control" id="news_description" name="news_description" maxlength="5000" placeholder="Новина"  data-error="задължително поле" required></textarea>
				<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 5000 символа.</small>
			</div>
		</div>
		<div class="form-group">
			<label for="image" class="col-md-3 control-label">Снимка</label>
			<div class="col-md-6">
				<input type="file" class="form-control" id="image" name="image" required/>				
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-3"></div>
			<div class="col-md-3">
				<label for="expiry_date" class="control-label"> Валидност на новината до дата: <span class="text-danger">*</span></label><br/>
				<input type="text" class="form-control date-input" id="expiry_date" name="expiry_date" placeholder="MM/DD/YYYY" data-error="задължителни полета" required/>
			</div>	
			<div class="col-md-3">
				<label for="is_active" class="control-label">Активност <span class="text-danger">*</span></label><br/>
				<select name="is_active" id="is_active" class="form-control" data-error="задължителни полета" required>
					<option></option>
					<option value="1">Да</option>
					<option value="0">Не</option>
				</select>
			</div>	
			<div class="col-md-2"></div>
		</div>
		<br/>
		<div class="form-group">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<input type="submit" class="btn btn-primary" name="submit" value="Добави"/>
				<input type="reset" class="btn btn-primary" name="reset" value="Изтрий"/>
			</div>
		</div>
	</form>
<br/>
</div>
