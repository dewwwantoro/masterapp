<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Setting Role : <?= $nama_role ?></h1>
                
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
                <form method="post" action="<?php echo base_url().'role/prosessettingrole'?>">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Submit</button>
                    <input type="hidden" name="kode_group"  value="<?php echo $id_inc;?>">
                    <table class='table   table-bordered table-hover' cellspacing='0' width='100%'>
                      <thead>
                        <tr>
                          <th width="4%">No</th>
                          
                          <th colspan="2">Menu</th>
                          <th>Parent</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;
                          foreach($role as $row){?>
                        <tr>
                          <td align="center"><?php echo $no;?></td>
                          <td width="3%" align="center"><input <?php if($row['STATUS']==1){ echo "checked";}?> type="checkbox" name="role[]" value="<?php echo $row['kode_role']; ?>"></td>
                          <td><?php echo ucwords($row['nama_menu']);?></td>
                          <td><?php echo ucwords($row['parent']);?></td>
                        </tr>
                        <?php $no++;}?>
                      </tbody>
                    </table>
                </form>
            </div>
        </div><!-- end card-->                  
    </div>
</div>