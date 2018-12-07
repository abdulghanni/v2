<div class="panel panel-default sidebar-menu wow fadeInRight animated" >
    <div class="panel-heading">
        <h3 class="panel-title">Cari Perjanjian Kerjasama</h3>
    </div>
    <div class="panel-body search-widget">
        <form method="POST" action="<?=base_url('informasi/perjanjian_search')?>" class=" form-inline"> 
            <fieldset>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" placeholder="Judul Perjanjian" name="description">
                    </div>
                </div>
            </fieldset>

            <fieldset >
                <div class="row">
                    <div class="col-xs-12">  
                        <input class="button btn largesearch-btn" value="Search" type="submit">
                    </div>  
                </div>
            </fieldset>                                     
        </form>
    </div>
</div>

