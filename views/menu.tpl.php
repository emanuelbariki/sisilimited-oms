<div class="topnav shadow-lg">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
															<!--Loop Starts Here-->
                                <?	foreach ($realmenus as $mlabel=>$m) {
                                    if ($m['subs'][0]['slabel']) { ?>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#<?=$mlabel?>" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="<?=$m['icon']?>"></i> <?=$mlabel?>  <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                            <? foreach ($m['subs'] as $s) { ?>
                                                <a href="?module=<?=$s['smod']?>&action=<?=$s['sact']?>" class="dropdown-item"><?=$s['slabel']?></a>
                                            <? } ?>
                                        </div>
                                    </li><?} else {?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="?module=<?=$m['module']?>&action=<?=$m['action']?>" id="topnav-layout" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="<?=$m['icon']?>"></i> <?=$mlabel?> &nbsp; <!-- &#9679; -->
                                        </a>
                                    </li>
                                        <?}?>
                                <?}?>

                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe-sidebar mr-1"></i> Layouts <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                        <a href="layouts-vertical.html" class="dropdown-item">Vertical</a>
                                        <a href="layouts-detached.html" class="dropdown-item">Detached</a>
                                        <a href="layouts-two-column.html" class="dropdown-item">Two Column Menu</a>
                                        <a href="layouts-two-tone-icons.html" class="dropdown-item">Two Tones Icons</a>
                                        <a href="layouts-preloader.html" class="dropdown-item">Preloader</a>
                                    </div>
                                </li> -->
                            </ul> <!-- end navbar-->
                        </div> <!-- end .collapsed-->
                    </nav>
                </div> <!-- end container-fluid -->
            </div> <!-- end topnav-->
