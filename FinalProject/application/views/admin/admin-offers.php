<div class="row center-block">
	<div class="col-md-12">
		<div class="text-center">
			<h4>ОФЕРТИ</h4>
			<p><strong>Общ брой оферти: <?php echo $total_rows; ?> </strong></p>
			<p><strong>Общ брой туристически агенции: <?php echo $num_agencies; ?> </strong></p>
		</div>
		<br/>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>	
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/id/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> ID</a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/title/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Име на оферта</a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/company_name/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Тур агенция</a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>/manageoffers/display/publishing_date/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Публикувана на</a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/expiry_date/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Валидна до</a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/is_active/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Статус</a></strong></small></td>
					<?php if($role == 'admin'){?><td><small><strong><a href="<?php echo base_url();?>manageoffers/display/is_deleted_from_user/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Изтрита от агент</a></strong></small></td><?php } ?>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/is_topoffer/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Топ оферта</a></strong></small></td>
					<td><small><strong>Действия</strong></small></td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($rows as $row){ 
					if($row->is_deleted_from_user == 1){ echo '<tr class="bg-danger">'; } else {echo '<tr>';}?>
						<td><small><?php echo $row->id; ?></small></td>
						<td><small><?php echo $row->title; ?></small></td>
						<td><small><?php echo $row->company_name; ?></small></td>
						<td><small><?php echo $row->publishing_date; ?></small></td>
						<td><small><?php echo $row->expiry_date; ?></small></td>
						<td><strong><?php if($row->is_deleted_from_user == 1){echo "<small class='text-danger'>Изтрита от агент</small>";}elseif($row->is_active=='0'){echo "<small class='text-info'>Изчаква одобрение</small>";}elseif($row->is_active=='2'){echo "<small class='text-danger'>Неодобрена</small>";}elseif($row->expiry_date<=date('Y-m-d')){echo "<small class='text-danger'>Изтекла валидност</small>";} elseif ($row->is_active=='1'){echo "<small class='text-success'>Активна</small>";} ?></strong></td>
						<?php if($role == 'admin'){?><td><small><?php echo $row->is_deleted_from_user == 0 ? 'НЕ' : '<strong>ДА</strong>'; ?></small></td><?php } ?>
						<td><small><?php echo $row->is_topoffer == 0 ? 'НЕ' : '<strong>ДА</strong>'; ?></small></td>
						<td>
							<form role="form" action="<?php echo base_url(); ?>manageoffers/activate_offer/<?php echo $row->id; ?>" method="post" style="display: inline;">
								<input type="text" name="activated" id="activated" value="1" hidden />
								<button type="submit" class="btn btn-primary"><small>Активирай</small></button>
							</form>
							<form role="form" action="<?php echo base_url(); ?>manageoffers/reject_offer/<?php echo $row->id; ?>" method="post" style="display: inline;">
								<input type="text" name="rejected" id="rejected" value="2" hidden />
								<button type="submit" class="btn btn-primary"><small>Отхвърли</small></button>
							</form>
							<form role="form" action="<?php echo base_url(); ?>manageoffers/add_topoffer/<?php echo $row->id; ?>" method="post" style="display: inline;">
								<input type="text" name="topoffer" id="topoffer" value="2" hidden />
								<button type="submit" class="btn btn-primary"><small>Направи ТОП оферта</small></button>
							</form>
							<a href="<?php echo base_url(); ?>offer/view/<?php echo $row->id; ?>" target="_blank"><button class="btn btn-primary"><small>Преглед</small></button></a>
							<a href="<?php echo base_url(); ?>manageoffers/manage_offer_form/<?php echo $row->id; ?>" target="_blank"><button class="btn btn-primary"><small>Редактирай</small></button></a>
							<?php if($role == 'admin'){?>
							<form role="form" action="<?php echo base_url(); ?>manageoffers/delete_offer_in_db/<?php echo $row->id; ?>" method="post" style="display: inline;">
								<input type="text" name="deleted" id="deleted" value="" hidden />
								<button type="submit" class="btn btn-primary"><small>Изтрий</small></button>
							</form>
							<?php } ?>
						</td>
					</tr>	
				<?php }	?>
			</tbody>
		</table>
		<div class="text-center"><ul class="pagination"><?php foreach ($pages as $page) { echo "<li>".$page."</li>";} ?> </ul></div>
	</div>						
</div>						