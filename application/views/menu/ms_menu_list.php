<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Menu</h1>
                
                <div class="pull-right">
                    <form action="<?php echo site_url('menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('menu'); ?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                                    <?php
                                }
                            ?>
                            <div class="btn-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
                                <?php echo anchor(site_url('menu/create'),'<i class="fa fa-plus"></i> Create', 'class="btn btn-success btn-sm"'); ?>
                            </div>
                        </span>
                    </div>
                </form>
                    
                </div>
                <div class="clearfix"></div>
        </div>
    </div>
</div><div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                       
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-responsive-xl table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
		<th>Nama Menu</th>
		<th>Link Menu</th>
		<th>Parent</th>
		<th>Sort</th>
		<th>Icon</th>
		<th>Action</th>
            </tr>
            </thead>
            <tbody><?php
            foreach ($menu_data as $rk)
            {
                ?>
                <tr>
			<td  align="center"><?php echo ++$start ?></td>
			<td><?php echo $rk->nama_menu ?></td>
			<td><?php echo $rk->link_menu ?></td>
			<td><?php echo $rk->parent ?></td>
			<td><?php echo $rk->sort ?></td>
			<td><?php echo $rk->icon ?></td>
			<td style="text-align:center" ><div class="btn-group">
				<?php 
				echo anchor(site_url('menu/read/'.$rk->id_inc),'<i class="fa fa-binoculars"></i>').'|'; 
				echo anchor(site_url('menu/update/'.$rk->id_inc),'<i class="fa fa-edit"></i>').'|';
				echo anchor(site_url('menu/delete/'.$rk->id_inc),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</div></td>
		</tr>
                <?php
            }
            ?></tbody></table>
      <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-sm btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>          
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>