<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Form Pengguna</h1>
                
                <div class="pull-right">
                    <?php echo anchor(site_url('pengguna'),'<i class="fa fa-angle-double-left"></i> Back', 'class="btn btn-success btn-sm"'); ?>
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
                        <label for="int">Role <?php echo form_error('ms_role_id') ?></label>
                        <select  class="form-control" name="ms_role_id" id="ms_role_id">
                            <option value="">Please select</option>
                            <?php foreach($role as $role){?>
                            <option <?php if($role->id_inc==$ms_role_id){echo "selected";}?> value="<?= $role->id_inc?>"><?= $role->nama_role?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Username <?php echo form_error('username') ?></label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                    </div>
                    <?php if($button=='Create'){?>
            	    <div class="form-group">
                        <label for="varchar">Password <?php echo form_error('password') ?></label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                    </div>
                    <?php } ?>
            	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
            	    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 
            	    <a class="btn btn-sm btn-warning" href="<?php echo site_url('pengguna') ?>" class="btn btn-default">Cancel</a>
            	</form>
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>