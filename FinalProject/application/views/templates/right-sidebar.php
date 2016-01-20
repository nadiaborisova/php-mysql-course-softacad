</div>
<!--RIGHT SIDEBAR-->
<div class="container-fluid col-md-2">
	<div class="hidden-xs">
        <a href="<?php echo base_url().'category/view/1'; ?>"><button type="button" class="btn" id="fancyBtn"><strong>ТОП ОФЕРТИ</strong></button></a>
    </div>
    <div>
       <a href="<?php echo base_url().'touragencies';?>"> <button type="button" class="btn" id="fancyBtn">Туристически <br/>агенции</button></a>
    </div>
    <div>
        <a href="<?php echo base_url().'news';?>"><button type="button" class="btn" id="fancyBtn">Новини</button></a>
    </div>
    <!--<div>
        <a href="#"><button type="button" class="btn" id="fancyBtn">Полезна <br/> информация</button></a>
    </div>
    <div>
        <button type="button" class="btn btn-primary" style="border: 2px solid #080B39; border-radius:25px 10px; margin-bottom: 5%; width: 100%;">Форум</button>
    </div>
    <div>
        <button type="button" class="btn btn-primary" style="border: 2px solid #080B39; border-radius:25px 10px; margin-bottom: 5%; width: 100%;">Анкета</button>
    </div>
    <div>
        <button type="button" class="btn btn-primary" style="border: 2px solid #080B39; border-radius:25px 10px; margin-bottom: 5%; width: 100%;">Валутен калкулатор</button>
    </div>
    <div>
        <button type="button" class="btn btn-primary" style="border: 2px solid #080B39; border-radius:25px 10px; margin-bottom: 5%; width: 100%;">Абонамент</button>
    </div>-->
    <div class="fancyBorder2px hidden-xs">
        <h5 class="text-center">ДЕСТИНАЦИИ</h5>
        <ul class="destinations">
            <?php foreach($destinations as $destination) {echo '<li><a href="'.base_url().'destination/view/'.$destination->cntr_id.'"> '.$destination->country_name.'</a></li>';}?>
        </ul>
    </div>
	<?php if(!$this->session->userdata('logged_in')){?>
	<div class="fancyBorder2px">
        <h4 class="text-center">ВХОД <br/><span class="text-center">за агенти</span></h4>
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
	<?php } ?>
</div>
</div>