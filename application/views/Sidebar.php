<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>
                    <li class="submenu">
                        <a href="<?= base_url('welcome') ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>
                    <?php 
                              $kode_group=$this->session->userdata('role');
                              $qmenu0  =$this->db->query("SELECT a.*
                                                          FROM ms_menu a
                                                          JOIN ms_privilege b ON a.id_inc=b.ms_menu_id
                                                          WHERE ms_role_id='$kode_group' 
                                                          AND STATUS='1'  
                                                          AND parent='0' 
                                                          ORDER BY sort ASC")->result_array();
                              foreach ($qmenu0 as $row0) {
                                $parent  =$row0['id_inc'];
                                $qmenu1  =$this->db->query("SELECT a.*
                                                          FROM ms_menu a
                                                          JOIN ms_privilege b ON a.id_inc=b.ms_menu_id
                                                          WHERE ms_role_id='$kode_group' 
                                                          AND STATUS='1'  
                                                          AND parent='$parent' 
                                                          ORDER BY sort ASC");
                                $cekmenu =$qmenu1->num_rows();
                                $dmenu1  =$qmenu1->result_array();
                                  if($cekmenu>0){
                                    echo "<li class='submenu'>
                                      <a href='#' > <i class='".$row0['icon']."'></i>  <span>".ucwords($row0['nama_menu'])."</span> <span class='menu-arrow'></span></a>";
                                        echo "<ul class='list-unstyled'>";
                                          foreach($dmenu1 as $row1){
                                              echo "<li>".anchor($row1['link_menu'],"<span>".ucwords($row1['nama_menu']."</span>"),'class="nav-link "')."</li>";
                                          }
                                      echo "</ul>
                                      </li>";
                                      }else{
                                       echo "<li class='submenu'>".anchor($row0['link_menu'],"<i class='".$row0['icon']."'></i> <span>".ucwords($row0['nama_menu'].'</span>'),'class="nav-link "')."</li>";
                                    }
                                  }
                                ?>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>