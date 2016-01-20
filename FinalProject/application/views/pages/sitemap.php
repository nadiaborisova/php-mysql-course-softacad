<h3 class="text-center" style="color: white;">Карта на сайта</h3>
<ul>
    <li><a href="<?php echo base_url();?>">НАЧАЛО</a></li>
                <?php
                    $cnt=1; 
                    foreach($categories as $category){
                        echo '<li role="presentation"><a href="'.base_url().'offers/view/'.$category->cat_id.'">'.$category->category_name.'</a></li><ul>';
                        if(isset($subcategories[$cnt])){
                            foreach($subcategories[$cnt] as $subcategory){
                                echo '<li role="presentation"><a href="'.base_url().'offers/view/'.$subcategory->cat_id.'">'.$subcategory->category_name.'</a></li>';
                            }
                        }
                        echo '</ul></li>' ;
                        $cnt++;
                    }
                ?>
    <li><a href="<?php echo base_url().'touragencies';?>">ТУРИСТИЧЕСКИ АГЕНЦИИ</a></li>
    <li><a href="<?php echo base_url().'news';?>">НОВИНИ</a></li>
    <li>ДЕСТИНАЦИИ
        <ul>
            <?php foreach($destinations as $destination) {echo '<li><a href="'.base_url().'destination/view/'.$destination->cntr_id.'">'.$destination->country_name.'</a></li>';}?>
        </ul>
    </li>
    <li><a href="<?php echo base_url().'pages/view/about-us';?>">ЗА НАС</a></li>
    <li><a href="<?php echo base_url().'pages/view/general-conditions';?>">ОБЩИ УСЛОВИЯ</a></li>
    <li><a href="<?php echo base_url().'pages/view/sitemap';?>">КАРТА НА САЙТА</a></li>
</ul>