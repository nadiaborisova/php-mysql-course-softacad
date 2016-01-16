<div class="col-md-12">
	<div class="text-center">
		<h4>НОВИНИ</h4>
		<p><strong>Общ брой новини: <?php echo $total_rows; ?> </strong></p>
	</div>
	<a href="<?php echo base_url(); ?>managenews/addnewsform"><button class="btn btn-primary pull-right"> Добави новина</button></a>
	<br/>
	<br/>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>	
				<td><small><strong><a href="<?php echo base_url();?>managenews/display/id/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> ID</a></strong></small></td>
				<td><small><strong><a href="<?php echo base_url();?>managenews/display/title/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Заглавие на новина</a></strong></small></td>
				<td><small><strong><a href="<?php echo base_url();?>managenews/display/publishing_date/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Публикувана на</a></strong></small></td>
				<td><small><strong><a href="<?php echo base_url();?>managenews/display/expiry_date/<?php echo (($sort_order == 'desc')?'asc':'desc');?>"> Валидна до</a></strong></small></td>
				<td><small><strong><a href="<?php echo base_url();?>managenews/display/is_active/<?php echo (($sort_order == 'desc')?'asc':'desc');?>">Активност</a></strong></small></td>
				<td><small><strong>Действия</strong></small></td>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($rows as $row){ 
					echo $row->expiry_date <= date('Y-m-d') ? '<tr class="bg-danger">' : '<tr>'; ?>
					<td><small><?php echo $row->news_id; ?></small></td>
					<td><small><?php echo $row->title; ?></small></td>
					<td><small><?php echo $row->publishing_date; ?></small></td>
					<td><small><?php echo $row->expiry_date; ?></small></td>
					<td><small><?php echo $row->is_active ? 'ДА' : 'НЕ'; ?></small></td>
					<td>
						<a href="<?php echo base_url(); ?>managenews/manage_news_form/<?php echo $row->news_id; ?>" target="_blank"><button class="btn btn-primary"><small>Редактирай</small></button></a>
						<a href="<?php echo base_url(); ?>news/view/<?php echo $row->news_id; ?>" target="_blank"><button class="btn btn-primary"><small>Преглед</small></button></a>
						<?php if($role == 'admin'){?>
						<form role="form" action="<?php echo base_url(); ?>managenews/delete_news_in_db/<?php echo $row->news_id; ?>" method="post" style="display: inline;">
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
