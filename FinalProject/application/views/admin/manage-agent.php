<?php
foreach ($user_info as $ui){ ?>
<h3 class="text-center" style="color:white;"><?php echo $ui->company_name; ?></h3>
<br/>
<?php if(isset($update_ok)){ echo '<strong><p class="text-success text-center">'.$update_ok.'</p></strong>'; } ?>
<form data-toggle="validator" role="form" id="regForm" action="<?php echo base_url().'manageagents/manage/'.$ui->user_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username" class="col-md-3 control-label">Потребителско <br/> име *</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="username"name="username" maxlength="50" data-minlength="3" value="<?php echo $ui->username; ?>" />
			<small class="help-block text-right" style="padding-right: 20px;">Минимум 3 символа.</small>
		</div>
		
	</div>
	<div class="form-group">
		<label for="companyName" class="col-md-3 control-label">Име на фирма *</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="companyName" name="companyName" maxlength="100" value="<?php echo $ui->company_name; ?>"  />
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="city" class="col-md-3 control-label">Град</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="city" name="city" maxlength="50" value="<?php echo $ui->city; ?>">
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-3 control-label"> Адрес</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="address" name="address" maxlength="200" value="<?php echo $ui->address; ?>">
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="phone" class="col-md-3 control-label"> Телефон *</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="phone" name="phone" data-minlength="7" maxlength="20" value="<?php echo $ui->phone; ?>" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон" required/>
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="phone2" class="col-md-3 control-label"> Телефон 2</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="phone2" name="phone2" data-minlength="7" maxlength="20" value="<?php echo $ui->phone2; ?>" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон"/>
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-3 control-label"> Email *</label>
		<div class="col-md-6">
			<input type="email" class="form-control" id="email" name="email" value="<?php echo $ui->email; ?>"  data-error="Моля въведете валиден емейл." required>
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="website" class="col-md-3 control-label"> Website</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="website" name="website" value="<?php echo $ui->website; ?>" />
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="contactPerson" class="col-md-3 control-label"> Лице за контакт</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="contactPerson" name="contactPerson" value="<?php echo $ui->contact_person; ?>" />
			<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-3 control-label"> Описание на дейността *</label>
		<div class="col-md-6">
			<textarea rows="8" name="description" class="form-control" id="description" name="description" maxlength="3000" data-error="задължително поле" required><?php echo $ui->description; ?></textarea>
			<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 3000 символа.</small>
		</div>
	</div>
	<div class="form-group">
		<label for="logo" class="col-md-3 control-label"> Лого</label>
		<div class="col-md-6">
		<?php if(isset($ui->logo)){ ?>
				<input type="text" id="current_logo" name="current_logo" value="<?php echo $ui->logo; ?>" hidden />
				<img src="<?php echo base_url(); ?>assets/images/logos/<?php echo $ui->logo;?>" alt="Logo" class="img-rounded"/>
			<?php } else { ?>
				<input type="file" class="form-control" id="logo" name="logo" />
			<?php } ?>
		</div>
	</div>
	<br/>
	<div class="form-group">
		<div class="col-md-5"></div>
		<div class="col-md-7">
			<input type="submit" class="btn btn-primary" name="submit" value="Актуализирай"/>
		</div>
	</div>
</form>
<?php } ?>