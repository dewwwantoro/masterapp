<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Menu Detail</h1>
                
                <div class="pull-right">
                    <?php echo anchor(site_url('menu'),'<i class="fa fa-angle-double-left"></i> Back', 'class="btn btn-success btn-sm"'); ?>
                </div>
                <div class="clearfix"></div>
        </div>
    </div>
</div><div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                       
        <div class="card mb-3">
            <div class="card-body">
<table class="table">
	    <tr><td>Nama Menu</td><td><?php echo $nama_menu; ?></td></tr>
	    <tr><td>Link Menu</td><td><?php echo $link_menu; ?></td></tr>
	    <tr><td>Parent</td><td><?php echo $parent; ?></td></tr>
	    <tr><td>Sort</td><td><?php echo $sort; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	</table>
                </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>