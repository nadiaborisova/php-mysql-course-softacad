<div class="col-md-12">
	<div class="text-center">
		<h4>ДЕСТИНАЦИИ</h4>
		<p><strong>Общ брой държави: <?php echo $total_rows; ?> </strong></p>
	</div>
	<a href="<?php echo base_url(); ?>managedestinations/add_dest_form"><button class="btn btn-primary pull-right"> Добави държава</button></a>
	<br/>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>	
				<td><small><strong><a href="<?php echo base_url();?>managedestinations/display/id/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> ID</a></strong></small></td>
				<td><small><strong><a href="<?php echo base_url();?>managedestinations/display/country_name/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Дестинация</a></strong></small></td>
				<td><small><strong>Действия</strong></small></td>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($rows as $row){ ?>
				<tr>
					<td><small><?php echo $row->cntr_id; ?></small></td>
					<td><small><?php echo $row->country_name; ?></small></td>
					<td>
						<a href="<?php echo base_url(); ?>managedestinations/manage_dest_form/<?php echo $row->cntr_id; ?>" target="_blank"><button class="btn btn-primary"><small>Редактирай</small></button></a>
						<a href="<?php echo base_url(); ?>destination/view/<?php echo $row->cntr_id; ?>" target="_blank"><button class="btn btn-primary"><small>Преглед</small></button></a>
						<?php if($role == 'admin'){?>
						<form role="form" action="<?php echo base_url(); ?>managedestinations/delete_destination_in_db/<?php echo $row->cntr_id; ?>" method="post" style="display: inline;">
							<input type="text" name="deleted" id="deleted" value="1" hidden />
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
					