<h3 class="text-center" style="color: white;">НОВИНИ</h3>
<div class="text-justify">
    <?php foreach($news as $n) {  
		if($n->is_active == 1 && $n->expiry_date>=date('Y-m-d')) { 
	?>
        <br/>
        <div>
            <img class="img-responsive img-rounded pull-left" style="margin-right: 2%;" src="<?php echo base_url().'assets/images/'.$n->user_id.'/'.$n->image; ?>.jpg" width="200px" height="150px" />
                <a href="<?php echo base_url(); ?>news/view/<?php echo $n->news_id; ?>">
					<h4 class="text-center"><?php echo $n->title;?></h4>
				</a>            
				<h6 class="pull-right"><?php echo $n->publishing_date;?></h6>
				<br/>
        </div>
        <br/>
        <p><?php echo substr($n->news_description, 0, 500);?> 
			<a href="<?php echo base_url(); ?>news/view/<?php echo $n->news_id; ?>">...още</a>
		</p>
		<hr/>
    <?php    
        } }
    ?>
	
</div>