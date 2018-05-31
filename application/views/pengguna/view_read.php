<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Pengguna Detail</h1>
                
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
<table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Ms Role Id</td><td><?php echo $ms_role_id; ?></td></tr>
	</table>
                </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>