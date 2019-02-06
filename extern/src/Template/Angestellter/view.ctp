<?php
    $name = $this->request->getSession()->read('Auth.User')['name'];
    $username = $this->request->getSession()->read('Auth.User')['username'];
    $kunde_id = $this->request->getSession()->read('Auth.User')['kunde_id'];
    $this->assign('title', $angestellter->vorname . ' ' . $angestellter->nachname);
?>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="">
            <img src="<?php echo $this->request->getAttribute("webroot") . 'img/brand/blue.png'; ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo $this->request->getAttribute("webroot") . 'img/profilbilder/'.$username.'.jpg'; ?>">
                  </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo __('Willkommen!')?>!</h6>
                    </div>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                                'class' => 'ni ni-single-02'
                            )
                        ).__('Mein Profil'), '/kunde/edit/'.$kunde_id, array('class' => 'dropdown-item', 'escape' => false)) ?>
                    <div class="dropdown-divider"></div>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                                'class' => 'ni ni-user-run'
                            )
                        ).__('Logout'), '/kunde/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="">
                            <img src="<?php echo $this->request->getAttribute("webroot") . 'img/brand/blue.png'; ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <!-- Heading -->
            <h6 class="navbar-heading text-muted"><?php echo __('Kundenbereich')?></h6>
            <ul class="navbar-nav">
                <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-tv-2 text-primary'
                        )).__('Dashboard'), '/', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-app text-primary'
                        )).__('Projekte'), '/projekt', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-bullet-list-67 text-primary'
                        )).__('Arbeitspakete'), '/arbeitspaket', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-calendar-grid-58 text-primary'
                        )).__('Termine'), '/termin', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar - USERNAME & PICTURE-->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html"><?php echo __('Ihr Ansprechpartner')?></a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo $this->request->getAttribute("webroot") . 'img/profilbilder/'.$username.'.jpg'; ?>">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm font-weight-bold"><?=$name?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-single-02'
                                )
                            ).__('Mein Profil'), '/kunde/edit/'.$kunde_id, array('class' => 'dropdown-item', 'escape' => false)) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-user-run'
                                )
                            ).__('Logout'), '/kunde/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header - CARDS -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo __('Projekte')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$openProjectsCount?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?php echo __('aktuell laufend')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo __('Arbeitspakete')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$finishedTasksCount?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-check-double"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?php echo __('abgeschlossen')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo __('Arbeitspakete')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$openTasksCount?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?php echo __('offen')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo __('Kosten')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$cost?> €</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?php echo __('aus laufenden Projekten')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-xl-6 col-sm-12 col-md-12">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="/~bolte/cakephp/extern/img/profilbilder/<?=$angestellter->username?>.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"></div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3><?php echo $angestellter->vorname . ' ' . $angestellter->nachname?></h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i><?=$angestellter->position?>
                            </div>
                            <hr class="my-4" />
                            <h4>So können Sie mich erreichen: </h4>
                            <p>
                                Tel: <?=$angestellter->telefon?><br>
                                E-Mail: <?=$angestellter->email?>
                            </p>
                            <hr class="my-4" />
                            <h4>Wann können Sie mich erreichen?</h4>
                            <p>
                                <?php
                                    echo 'Montag: '.$erreichbarkeit[0]['mo'].'<br>';
                                    echo 'Dienstag: '.$erreichbarkeit[0]['di'].'<br>';
                                    echo 'Mittwoch: '.$erreichbarkeit[0]['mi'].'<br>';
                                    echo 'Donnerstag: '.$erreichbarkeit[0]['don'].'<br>';
                                    echo 'Freitag: '.$erreichbarkeit[0]['fr'].'<br>';
                                    echo 'Samstag: '.$erreichbarkeit[0]['sa'].'<br>';
                                    echo 'Sonntag: '.$erreichbarkeit[0]['so'].'<br>'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="https://www.kg-webservice.de" class="font-weight-bold ml-1" target="_blank">K&G Webservice</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <?php echo $this->Html->link("English", array("controller" => "App", "action" => "changeLanguage",'en'), array("class"=> "nav-link")); ?>
                        </li>
                        <li class="nav-item">
                            <?php echo $this->Html->link("Deutsch", array("controller" => "App", "action" => "changeLanguage",'de'), array("class"=> "nav-link")); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
