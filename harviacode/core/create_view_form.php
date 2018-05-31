<?php 
$string="<div class=\"row\">
    <div class=\"col-xl-12\">
        <div class=\"breadcrumb-holder\">
                <h1 class=\"main-title float-left\">Form ".ucfirst($c_url)."</h1>
                
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
                <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-sm btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a class=\"btn btn-sm btn-warning\" href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t</form>
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>";
$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>