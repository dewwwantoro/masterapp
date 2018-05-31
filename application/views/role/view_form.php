<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Form Role</h1>
                
                <div class="pull-right">
                    <?php echo anchor(site_url('role'),'<i class="fa fa-angle-double-left"></i> Back', 'class="btn btn-success btn-sm"'); ?>
                </div>
                <div class="clearfix"></div>
        </div>
    </div>
</div><div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                       
        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Role <?php echo form_error('nama_role') ?></label>
            <input type="text" class="form-control" name="nama_role" id="nama_role" placeholder="Nama Role" value="<?php echo $nama_role; ?>" />
        </div>
	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm btn-primary"><?php echo $button ?></button> 
	    <a class="btn btn-sm btn-warning" href="<?php echo site_url('role') ?>" class="btn btn-default">Cancel</a>
	</form>
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>