<div class="row center-block">
	<div class="col-md-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>	
					<td><small><strong>ID</strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/company_name/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Потребител </a></strong></small></td>
					<td><small><strong><a href="<?php echo base_url();?>manageoffers/display/user_type/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Роля </a></strong></small></td>
					<td><small><strong>Действия</strong></small></td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($rows as $row){ ?>
						<td><small><?php echo $row->user_id; ?></small></td>
						<td><small><?php echo $row->company_name; ?></small></td>
						<td><small><?php echo $row->user_type; ?></small></td>
						<td>
							<a href="<?php echo base_url(); ?>manageagents/manage_agent_form/<?php echo $row->user_id; ?>" target="_blank"><button class="btn btn-primary"><small>Редактирай</small></button></a>
							<a href="<?php echo base_url(); ?>touragencies/view/<?php echo $row->user_id; ?>" target="_blank"><button class="btn btn-primary"><small>Преглед</small></button></a>
							<?php if($role == 'admin'){?>
							<form role="form" action="<?php echo base_url(); ?>manageagents/delete_user_in_db/<?php echo $row->user_id; ?>" method="post" style="display: inline;">
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
</div>						