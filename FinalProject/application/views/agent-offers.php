<h3 class="text-center" style="color: white;">ОФЕРТИ</h3>
<a href="<?php echo base_url(); ?>manageoffers/addofferform"><button class="btn btn-primary pull-right"> Добави оферта</button></a>
<br/>
<br/>
	<?php if($total_rows == 0){?>
	<div class="text-center">Все още нямате публикувани оферти.</div>
	<?php } else { ?>
	
	<p><strong>Общ брой оферти: <?php echo $total_rows; ?> </strong></p>
<br/>
<table class="table table-bordered table-hover" width="100%">
	<thead>
		<tr>	
			<td><small><strong>ID</strong></small></td>
			<td><small><strong>Име на оферта</strong></small></td>
			<td><small><strong>Публикувана на</strong></small></td>
			<td><small><strong>Валидна до</strong></small></td>
			<td><small><strong>Статус</strong></small></td>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($rows as $row){?>
			<tr>
				<td><small><?php echo $row->id; ?></small></td>
				<td>
					<small><?php echo $row->title; ?></small><br/>
					<a href="<?php echo base_url(); ?>offer/view/<?php echo $row->id; ?>" target="_blank"><button class="btn btn-primary"><small>Преглед</small></button></a>
					<a href="<?php echo base_url(); ?>manageoffers/manage_offer_form/<?php echo $row->id; ?>" target="_blank"><button class="btn btn-primary"><small>Редактирай</small></button></a>
					<form role="form" action="<?php echo base_url(); ?>manageoffers/delete_from_agent/<?php echo $row->id; ?>" method="post" style="display: inline;">
						<input type="text" name="deleted" id="deleted" value="1" hidden />
						<button type="submit" class="btn btn-primary"><small>Изтрий</small></button>
					</form>
				</td>
				<td><small><?php echo $row->publishing_date; ?></small></td>
				<td><small><?php echo $row->expiry_date; ?></small></td>
				<td><strong><?php if($row->is_active=='1'){echo "<small class='text-success'>Активна</small>";}elseif($row->is_active=='0'){echo "<small class='text-info'>Изчаква одобрение</small>";}elseif($row->is_active=='2'){echo "<small class='text-danger'>Неодобрена</small>";}elseif($row->expiry_date<=date('Y-m-d')){echo "<small class='text-danger'>Изтекла валидност</small>";} ?></strong></td>
			</tr>	
		<?php }	?>
	</tbody>
</table>
<div class="text-center"><ul class="pagination"><?php foreach ($pages as $page) { echo "<li>".$page."</li>";} ?> </ul></div>
<?php } ?>									