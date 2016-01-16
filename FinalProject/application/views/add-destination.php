<div class="col-md-12">
	<h3 class="text-center" style="color: white;">ДОБАВЯНЕ НА ДЪРЖАВА</h3>
	<br/>
	<span class="text-danger">* задължително поле</span>
	<br/>
	<br/>
	<form data-toggle="validator" role="form" id="addNewsForm" action="<?php echo base_url(); ?>managedestinations/add_destination" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="country_name" class="col-md-3 control-label">Държава <span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="country_name" name="country_name" maxlength="100" placeholder="Държава" data-error="задължително поле" required />
				<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-3 control-label"> Описание <span class="text-danger">*</span></label>
			<div class="col-md-6">
				<textarea rows="15" class="form-control" id="description" name="description" maxlength="5000" placeholder="Описание"  data-error="задължително поле" required></textarea>
				<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 5000 символа.</small>
			</div>
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
</div>
