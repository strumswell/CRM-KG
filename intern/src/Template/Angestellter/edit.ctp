<?php
$this->assign('title', 'Mitarbeiter');
$username = $this->request->getSession()->read('Auth.User')['vorname'] . ' ' . $this->request->getSession()->read('Auth.User')['nachname'];
$user = $this->request->getSession()->read('Auth.User')['username'];
$id = $this->request->getSession()->read('Auth.User')['angestellter_id'];
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
            <img src="/~bolte/cakephp/intern/webroot/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="/~bolte/cakephp/extern/webroot/img/profilbilder/<?=$user?>.jpg">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0"><?php echo __('Willkommen')?></h6>
                    </div>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                                'class' => 'ni ni-single-02'
                            )
                        ).__('Mein Profil'), '/angestellter/edit/'.$id, array('class' => 'dropdown-item', 'escape' => false)) ?>
                    <div class="dropdown-divider"></div>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                                'class' => 'ni ni-user-run'
                            )
                        ).'Logout', '/angestellter/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="/~bolte/cakephp/intern/webroot/img/brand/blue.png">
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
            <ul class="navbar-nav">
                <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-tv-2 text-primary'
                        )).'Dashboard', '/', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-app text-primary'
                        )).__('Projektverwaltung'), '/projekt', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-bullet-list-67 text-primary'
                        )).__('Arbeitspaketverwaltung'), '/arbeitspaket', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-calendar-grid-58 text-primary'
                        )).__('Terminverwaltung'), '/termin', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-single-02 text-primary'
                        )).__('Mitarbeiterverwaltung'), '/angestellter', array('class' => 'nav-link active', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-briefcase-24 text-primary'
                        )).__('Kundenverwaltung'), '/kunde', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-chat-round text-primary'
                        )).__('Plaudereck'), '/chat', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html"><?php echo __('Angestellter')?> - <?=$angestellter->username?></a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/~bolte/cakephp/extern/webroot/img/profilbilder/<?=$user?>.jpg">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span id="username" class="mb-0 text-sm font-weight-bold"><?=$username?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0"><?php echo __('Wilkommen!') ?></h6>
                        </div>
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-single-02'
                                )
                            ).__('Mein Profil'), '/angestellter/edit/'.$id, array('class' => 'dropdown-item', 'escape' => false)) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-user-run'
                                )
                            ).'Logout', '/angestellter/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 500px;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white"><?=$angestellter->vorname.' '.$angestellter->nachname?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="<?php echo '/~bolte/cakephp/extern/webroot/img/profilbilder/'.$angestellter->username.'.jpg';?>" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3><?php echo $angestellter->vorname . ' ' . $angestellter->nachname?></h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i><?=$angestellter->position?>
                            </div>
                            <hr class="my-4" />
                            <h4><?php echo __('Kontakt')?>: </h4>
                            <p>
                                Tel: <?=$angestellter->telefon?><br>
                                E-Mail: <?=$angestellter->email?>
                            </p>
                            <hr class="my-4" />
                            <h4><?php echo __('Arbeitszeiten')?>: </h4>
                            <p>
                                <?php
                                echo __('Montag').': '.$erreichbarkeit[0]['mo'].'<br>';
                                echo __('Dienstag').': '.$erreichbarkeit[0]['di'].'<br>';
                                echo __('Mittwoch').': '.$erreichbarkeit[0]['mi'].'<br>';
                                echo __('Donnerstag').': '.$erreichbarkeit[0]['don'].'<br>';
                                echo __('Freitag').': '.$erreichbarkeit[0]['fr'].'<br>';
                                echo __('Samstag').': '.$erreichbarkeit[0]['sa'].'<br>';
                                echo __('Sonntag').': '.$erreichbarkeit[0]['so'].'<br>'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <?php echo $this->Form->create($angestellter,['class'=>'form-horizontal']);?>
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo __('Angestellten bearbeiten')?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="singlebutton" name="singlebutton" class="btn btn-sm btn-primary"><?php echo __('Speichern')?></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Username-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">Username</label>
                                    <?php echo $this->Form->control('username', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                            <!-- Passwort-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('Passwort')?></label>
                                    <?php echo $this->Form->control('password', ['type'=>'password', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Nachname-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('Nachname')?></label>
                                    <?php echo $this->Form->control('nachname', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                            <!-- Vorname-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('Vorname')?></label>
                                    <?php echo $this->Form->control('vorname', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Position-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('Position')?></label>
                                    <?php echo $this->Form->control('position', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                            <!-- E-Mail-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('E-Mail')?></label>
                                    <?php echo $this->Form->control('email', ['type'=>'email', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                            <!-- Telefon-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput"><?php echo __('Telefon')?></label>
                                    <?php echo $this->Form->control('telefon', ['pattern' => '([0-9 +/]*)', 'type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
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