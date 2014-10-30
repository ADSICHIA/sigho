<?php
    include_once("controlador/cMenu.php");
?>
<ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php
                            foreach ($menus as $menu) {
                        ?>
                                <li>
                                    <a href="<?php echo $menu["href"];?>"><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $menu["menu"];?><span class="fa arrow"></span></a>
                                    <!--<a class="active" href="<?php echo $menu["href"];?>"><i class="fa fa-dashboard fa-fw"></i><?php echo $menu["menu"];?><span class="fa arrow"></span></a>-->
                                    
                                    <?php 
                                        $submenus=$objMenu->getSubMenus($menu["idmenu"]);
                                        if (!is_null($submenus)){
                                    ?>
                                        
                                        <ul class="nav nav-second-level">
                                    <?php
                                            foreach ($submenus as $submenu) {
                                    ?>
                                                <li>
                                                    <a href="<?php echo $submenu["href"];?>"><?php echo $submenu["menu"];?></a>
                                                </li>
                                    <?php 
                                            }
                                    ?>
                                        <!-- /.nav-second-level -->
                                        </ul>
                                    <?php
                                        }
                                    ?>
                                    

                                </li>
                        <?php
                            }
                        ?>
                        
                        <?php /*
                        <li>
                            <a href="#" class="active"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="index.php">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>*/ ?>
                    </ul>