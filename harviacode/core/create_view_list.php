<?php 


$string="<div class=\"row\">
    <div class=\"col-xl-12\">
        <div class=\"breadcrumb-holder\">
                <h1 class=\"main-title float-left\">".ucfirst($c_url)."</h1>
                
                <div class=\"pull-right\">
                    <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?php echo \$q; ?>\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i> Reset</a>
                                    <?php
                                }
                            ?>
                            <div class=\"btn-group\">
                                <button class=\"btn btn-primary\" type=\"submit\"><i class=\"fa fa-search\"></i> Search</button>
                                <?php echo anchor(site_url('".$c_url."/create'),'<i class=\"fa fa-plus\"></i> Create', 'class=\"btn btn-success btn-sm\"'); ?>
                            </div>
                        </span>
                    </div>
                </form>
                    
                </div>
                <div class=\"clearfix\"></div>
        </div>
    </div>
</div>";

$string.="<div class=\"row\">
    <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12\">                       
        <div class=\"card mb-3\">
            <div class=\"card-body\">
                <table class=\"table table-responsive-xl table-bordered\">
                    <thead>
                        <tr>
                            <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>
            </thead>
            <tbody>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$rk)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td  align=\"center\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo \$rk->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" ><div class=\"btn-group\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.sha1(\$rk->".$pk.")),'<i class=\"fa fa-binoculars\"></i>').'|'; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.sha1(\$rk->".$pk.")),'<i class=\"fa fa-edit\"></i>').'|';"
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.sha1(\$rk->".$pk.")),'<i class=\"fa fa-trash\"></i>','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</div></td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>";
$string.="</tbody></table>
      <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-sm btn-primary\">Total Record : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\"></i>', 'class=\"btn btn-sm btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i>', 'class=\"btn btn-sm btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), '<i class=\"fa fa-file-pdf-o\"></i>', 'class=\"btn btn-sm btn-warning\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>          
            </div>                                                      
        </div><!-- end card-->                  
    </div>
</div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>