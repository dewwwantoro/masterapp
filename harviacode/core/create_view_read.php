<?php 
$string="<div class=\"row\">
    <div class=\"col-xl-12\">
        <div class=\"breadcrumb-holder\">
                <h1 class=\"main-title float-left\">".ucfirst($c_url)." Detail</h1>
                
                <div class=\"pull-right\">
                    <?php echo anchor(site_url('".$c_url."'),'<i class=\"fa fa-angle-double-left\"></i> Back', 'class=\"btn btn-success btn-sm\"'); ?>
                </div>
                <div class=\"clearfix\"></div>
        </div>
    </div>
</div>";
$string.="<div class=\"row\">
    <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">                       
        <div class=\"card mb-3\">
            <div class=\"card-body\">
<table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t</table>
                </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>";

/*
$string = "<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
        </body>
</html>";

*/

$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>