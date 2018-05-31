<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Form Menu</h1>
                
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
                <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link Menu <?php echo form_error('link_menu') ?></label>
            <input type="text" class="form-control" name="link_menu" id="link_menu" placeholder="Link Menu" value="<?php echo $link_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Parent <?php echo form_error('parent') ?></label>
            <!-- <input type="text" value="<?php echo $parent; ?>" /> -->
            <select  class="form-control" name="parent" id="parent" placeholder="Parent">
                <option value="0">Is Parent</option>
                <?php foreach($pm as $pm){ ?>
                <option <?php if($pm->id_inc==$parent){echo "selected";}?> value="<?= $pm->id_inc ?>"><?= $pm->nama_menu?></option>
                <?php  } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Sort <?php echo form_error('sort') ?></label>
            <input type="text" class="form-control" name="sort" id="sort" placeholder="Sort" value="<?php echo $sort; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
	    <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm btn-primary"><?php echo $button ?></button> 
	    <a class="btn btn-sm btn-warning" href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>