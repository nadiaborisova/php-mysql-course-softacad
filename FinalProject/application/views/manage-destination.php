<div class="col-md-12">
	<h3 class="text-center" style="color: white;">РЕДАКТИРАНЕ НА ДЪРЖАВА</h3>
	<br/>
	<span class="text-danger">* задължително поле</span>
	<br/>
	<br/>
	<?php foreach($destination_info as $di){ ?>
	<form data-toggle="validator" role="form" id="addDestinationForm" action="<?php echo base_url().'managedestinations/manage/'.$di->cntr_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="country_name" class="col-md-2 control-label">Държава <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="country_name" name="country_name" maxlength="100" placeholder="Държава" data-error="задължително поле" required value="<?php echo $di->country_name; ?>" />
			</div>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 100 символа.</small>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-2 control-label"> Описание <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<textarea rows="15" class="form-control" id="description" name="description" maxlength="5000" placeholder="Новина"  data-error="задължително поле" required><?php if(isset($di->description)){echo $di->description;}else{echo '';} ?></textarea>
			</div>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 5000 символа.</small>
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
