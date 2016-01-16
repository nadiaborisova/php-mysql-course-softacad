<?php
foreach ($profile_info as $pi){ ?>
<h3 class="text-center" style="color:white;"><?php echo $pi->company_name; ?></h3>
<br/>
<?php if(isset($update_ok)){ echo '<strong><p class="text-success text-center">'.$update_ok.'</p></strong>'; } ?>
<small>задължително поле * </small>
<br/>
<br/>
<form data-toggle="validator" role="form" id="regForm" action="<?php echo base_url().'manageprofile/manage/'.$pi->user_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username" class="col-md-3 control-label">Потребителско <br/> име *</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="username"name="username" maxlength="50" data-minlength="3" value="<?php echo $pi->username; ?>"  disabled="disabled" />
		</div>
		<small class="help-block text-right" style="padding-right: 20px;"> </small>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-3 control-label">Стара парола *</label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="password" name="password" maxlength="50" data-minlength="5" placeholder="Стара парола" data-error="задължително поле" required />
		</div>
		<?php if(isset($pass_error)){echo '<strong><small class="text-danger pull-right" style="padding-right: 20px;">'.$pass_error.'</small></strong>'; } else { ?><small class="help-block text-right" style="padding-right: 20px;"></small><?php } ?>
	</div>
	<div class="form-group">
		<label for="password2" class="col-md-3 control-label">Повтори паролата *</label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="password2" name="password2" maxlength="50" placeholder="Повтори паролата"  data-match="#password" data-match-error="Паролите не съвпадат!">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<hr/>
	<div class="form-group">
		<label for="newpass" class="col-md-3 control-label">Нова парола</label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="newpass" name="newpass" maxlength="50" placeholder="Нова парола"  >
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Попълни само в случай, че желаеш да смениш настоящата си парола</small>
	</div>
	<hr/>
	<div class="form-group">
		<label for="companyName" class="col-md-3 control-label">Име на фирма *</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="companyName" name="companyName" maxlength="100" value="<?php echo $pi->company_name; ?>"  disabled="disabled" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="city" class="col-md-3 control-label">Град</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="city" name="city" maxlength="50" value="<?php echo $pi->city; ?>">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-3 control-label"> Адрес</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="address" name="address" maxlength="200" value="<?php echo $pi->address; ?>">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="phone" class="col-md-3 control-label"> Телефон *</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="phone" name="phone" data-minlength="7" maxlength="20" value="<?php echo $pi->phone; ?>" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон" required/>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="phone2" class="col-md-3 control-label"> Телефон 2</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="phone2" name="phone2" data-minlength="7" maxlength="20" value="<?php echo $pi->phone2; ?>" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон"/>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-3 control-label"> Email *</label>
		<div class="col-md-9">
			<input type="email" class="form-control" id="email" name="email" value="<?php echo $pi->email; ?>"  data-error="Моля въведете валиден емейл." required>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="website" class="col-md-3 control-label"> Website</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="website" name="website" value="<?php echo $pi->website; ?>" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="contactPerson" class="col-md-3 control-label"> Лице за контакт</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="contactPerson" name="contactPerson" value="<?php echo $pi->contact_person; ?>" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-3 control-label"> Описание на дейността *</label>
		<div class="col-md-9">
			<textarea rows="8" name="description" class="form-control" id="description" name="description" maxlength="3000" data-error="задължително поле" required><?php echo html_entity_decode($pi->description); ?></textarea>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 3000 символа.</small>
	</div>
	<div class="form-group">
		<label for="logo" class="col-md-3 control-label"> Лого</label>
		<?php if(isset($pi->logo)) { ?>
		<div class="col-md-6">
			<input type="text" id="current_logo" name="current_logo" value="<?php echo $pi->logo; ?>" hidden /> 
			<img src="<?php echo base_url();?>assets/images/logos/<?php echo $pi->logo; ?>" class="img-responsive img-rounded" width="150px" /> 
		</div>
		<?php } else { ?>
		<div class="col-md-9">
			<input type="file" class="form-control" id="logo" name="logo" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
		<?php } ?>
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