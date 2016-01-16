<h3 class="text-center" style="color: white;">ТУРИСТИЧЕСКИ АГЕНЦИИ</h3>
<div class="text-justify">
    <?php foreach($agencies as $agency) { ?>
        <br/>
        <table class="agency-profiles well">
			<tr><th> <h4 class="text-center"><a href="<?php echo base_url(); ?>touragencies/view/<?php echo $agency->user_id; ?>"><?php echo $agency->company_name;?></a></h4></th><tr>
			<tr>
				<td>
				<?php if(isset($agency->logo)){?><img src="<?php echo base_url().'assets/images/logos/'.$agency->logo;?>" class="img img-responsive pull-left" style="margin-right: 5%;"/><?php } else { ?><img src="<?php echo base_url();?>assets/images/logo-default-img.jpg" class="img img-responsive pull-left" style="margin-right: 5%;" width="200px"/><?php } ?>

					<div class="pull-left">
						<h5><span class="glyphicon glyphicon-map-marker"></span> гр. <?php echo $agency->city;?>, <?php echo $agency->address;?></h5>
						<h5><span class="glyphicon glyphicon-earphone"></span> <?php echo $agency->phone;?></h5>
						<h5><span class="glyphicon glyphicon-envelope"></span> <?php echo $agency->email;?></h5>
						<h5><span class="glyphicon glyphicon-globe"></span> <?php echo $agency->website;?></h5>
					</div>
				</td>
			</tr>
            <tr><td ><p><?php echo html_entity_decode($agency->description); ?></p></td></tr>
        </table>
       
    <?php    
        }
    ?>
</div>







