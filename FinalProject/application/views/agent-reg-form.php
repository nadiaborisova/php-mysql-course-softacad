<h3 class="text-center" style="color: white;">ФОРМА ЗА РЕГИСТРАЦИЯ</h3>
<br/>
<small class="danger">* задължително поле </small>
<br/>
<br/>
<form data-toggle="validator" role="form" id="regForm" action="<?php echo base_url(); ?>agentregform/registration" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="username" class="col-md-3 control-label">Потребителско <br/> име <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="username" name="username" maxlength="50" data-minlength="3" placeholder="Потребителско име"  required>
		</div>
		<small class="help-block text-right" style="padding-right: 20px;">Минимум 3 символа.</small>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-3 control-label">Парола <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="password" name="password" maxlength="50" data-minlength="5" placeholder="Парола" required>
		</div>
		<small class="help-block text-right" style="padding-right: 20px;">Минимум 5 символа.</small>
	</div>
	<div class="form-group">
		<label for="password2" class="col-md-3 control-label">Повтори паролата <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="password" class="form-control" id="password2" name="password2" maxlength="50" placeholder="Повтори паролата"  data-match="#password" data-match-error="Паролите не съвпадат!">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<hr/>
	<div class="form-group">
		<label for="companyName" class="col-md-3 control-label">Име на фирма <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="companyName" name="companyName" maxlength="100" placeholder="Име на фирма"  data-error="задължително поле" required>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="city" class="col-md-3 control-label">Град</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="city" name="city" maxlength="50" placeholder="Град">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="address" class="col-md-3 control-label"> Адрес</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="address" name="address" maxlength="200" placeholder="Адрес">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="phone" class="col-md-3 control-label"> Телефон <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="phone" name="phone" data-minlength="7" maxlength="20" placeholder="Телефон" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон" required/>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="phone2" class="col-md-3 control-label"> Телефон 2</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="phone2" name="phone2" data-minlength="7" maxlength="20" placeholder="Телефон 2" pattern="^[\s 0-9]+$" data-error="Моля въведете валиден телефон"/>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-3 control-label"> Email <span class="danger">*</span></label>
		<div class="col-md-9">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email"  data-error="Моля въведете валиден емейл." required>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="website" class="col-md-3 control-label"> Website</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="website" name="website" placeholder="Website">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="contactPerson" class="col-md-3 control-label"> Лице за контакт</label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="contactPerson" name="contactPerson" placeholder="Лице за контакт">
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;"></small>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-3 control-label"> Описание на дейността <span class="danger">*</span></label>
		<div class="col-md-9">
			<textarea rows="8" class="form-control" id="description" name="description" maxlength="3000" placeholder="Описание на дейността"  data-error="задължително поле" required></textarea>
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Максимум 3000 символа.</small>
	</div>
	<div class="form-group">
		<label for="logo" class="col-md-3 control-label"> Лого</label>
		<div class="col-md-9">
			<input type="file" class="form-control" id="logo" name="logo" />
		</div>
		<small class="help-block with-errors text-right" style="padding-right: 20px;">Позволени разширения: JPG, JPEG, PNG, GIF</small>
	</div>

	<br/>
	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<input type="submit" class="btn btn-primary" value="Регистрирай"/>
			<input type="reset" class="btn btn-primary" value="Изчисти"/>
		</div>
	</div>
</form>