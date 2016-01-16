<div class="container-fluid row">		
<!--LEFT SIDEBAR-->
<div class="container-fluid col-md-3">
	<div class="visible-xs">
        <a href="<?php echo base_url().'category/view/1'; ?>"><button type="button" class="btn" id="fancyBtn"><strong>ТОП ОФЕРТИ</strong></button></a>
    </div>
    <div class="fancyBorder2px">
        <form role="search" class="search" action="<?php echo base_url(); ?>manageoffers/search" method="GET">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="Търси оферта..." name="search" id="search" />
                <div class="input-group-btn">
                    <button class="btn btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>			
        </form>
        <p class="text-center"><a href="<?php echo base_url(); ?>manageoffers/full_search_form">Разширено търсене &gt;&gt;&gt;</a></p>
    </div>
    <nav class="navbar navbar-default" role = "navigation" style="border: 2px solid #080B39; border-radius: 15px;">
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<span class="visible-xs navbar-brand pull-right">Категории</span>
        </div>
	    <div class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav main-nav">
                <li role="presentation" class="hidden-sm"><a href="<?php echo base_url();?>"><strong>НАЧАЛО</strong></a></li>
                <?php
                    $cnt=2; 
                    foreach($categories as $category){
						if($category->cat_id>1){
                        echo '<li role="presentation"><a href="'.base_url().'category/view/'.$category->cat_id.'"><strong>'.$category->category_name.'</strong></a>';
                        if(isset($subcategories[$cnt])){
							echo '<ul class="subnav">';
                            foreach($subcategories[$cnt] as $subcategory){
                                echo '<li role="presentation"><a href="'.base_url().'category/view/'.$subcategory->cat_id.'"><span class="glyphicon glyphicon-map-marker"></span> '.$subcategory->category_name.'</a></li>';
                            }
							 echo '</ul><br/>' ;
                        }
                        echo '</li>' ;
                        $cnt++;
                    } }
                ?>
            </ul>
            <br/>
        </div>
    </nav>	
</div>
<!--CONTENT-->
<div class="container-fluid col-md-7">	