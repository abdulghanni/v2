<div class="panel sidebar-menu wow  fadeInRight animated">
    <div class="panel-heading">
        <h3 class="panel-title">Kategori Hukum</h3>
    </div>
    <div class="panel-body">
        <ul class="tag-cloud">
            <?php
            foreach($categories as $row => $category):?>
            <li><a href="<?php echo site_url('himpunan/category_search/').'/'.$category->category_id?>"><i class="fa fa-tags"></i> <span style="color: black"><?php echo $category->name ?></span></a> 
            </li>

            <?php
              endforeach; 
            ?>
        </ul>
    </div>
</div>