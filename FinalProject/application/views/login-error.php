<h3 class="text-center" style="color: white;">ГРЕШКА</h3>
<br/>
<strong><h4 class="text-center text-danger"> Невалидно потребителско име и/или парола! </h4></strong>
<br/>
	<div class="fancyBorder2px">
        <h4 class="text-center">ВХОД</h4>
        <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>login/checkdatabase" method="POST">
            <div class="center-block">
				<div class="form-group">	
					<input type="text" class="form-control input-sm" placeholder="Потребителско име" name="username" id="username" data-error="Моля въведете Вашето потребителско име" required>
					<small class="help-block with-errors"></small>
				</div>
				<div class="form-group">
					<input type="password" class="form-control input-sm" placeholder="Парола" name="password" id="password" data-error="Моля въведете Вашата парола" required>
					<small class="help-block with-errors"></small>
				</div>
                <input type="submit" class="center-block btn btn-primary" name="submit" id="submit" value="Влез" />
            </div>
        </form>
        <h6 class="text-center"><a href="<?php echo base_url().'agentregform';?>">Нова регистрация &gt;&gt;</a></h6>
    </div>
