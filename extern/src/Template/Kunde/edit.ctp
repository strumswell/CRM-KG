<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde $kunde
 */
?>
<body>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="">
            <img src="<?php echo $this->request->getAttribute("webroot") .'/img/brand/blue.png';?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="./img/profilbilder/<?=$username?>">
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
                        ).__('Mein Profil'), '/kunde/edit/'.$kunde->kunde_id, array('class' => 'dropdown-item', 'escape' => false)) ?>
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
                        <a href="./index.html">
                            <img src="./img/brand/blue.png">
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
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href=""><?php echo __('Ihr Profil')?></a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo $this->request->getAttribute("webroot") .'/img/profilbilder/'.$kunde->username.'.jpg';?>">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?=$kunde->name?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0"><?php echo __('Willkommen!')?></h6>
                        </div>
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-single-02'
                                )
                            ).__('Mein Profil'), '/kunde/edit/'.$kunde->kunde_id, array('class' => 'dropdown-item', 'escape' => false)) ?>
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
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 500px;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white"><?=$kunde->name?></h1>
                    <p class="text-white mt-0 mb-5"><?php echo __('Das ist Ihre Profilseite. Hier können Sie wenn nötig Daten über sich verändern.')?></p>
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
                                    <img src="<?php echo $this->request->getAttribute("webroot") .'/img/profilbilder/'.$kunde->username.'.jpg';?>" class="rounded-circle">
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
                            <h1>
                                <?=$kunde->name?>
                            </h1>
                            <div class="h5 font font-weight-300">
                                <i class="ni location_pin mr-2"></i><?php echo __('Registriert seit dem')?> <?=$kunde->registriert_am?>
                            </div>
                            <div class="h3 mt-4">
                                <i class="ni mr-2"></i><?=$kunde->plz.' '.$kunde->ort?>
                            </div>
                            <div class="h5">
                                <i class="ni mr-2"></i><?=$kunde->straße.' '.$kunde->hausnummer?>
                            </div>
                            <hr class="my-4" />
                            <h4><?php echo __('Folgendermaßen erreichbar:')?></h4>
                            <p><b><?php echo __('E-Mail:')?></b> <?=$kunde->email?><br><b><?php echo __('Telefon:')?></b> <?=$kunde->telefon?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <?php echo $this->Form->create($kunde);?>
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo __('Meine Daten')?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="singlebutton" name="singlebutton" class="btn btn-sm btn-primary"><?php echo __('Speichern')?></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"><?php echo __('Allgemeine Informationen')?></h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username"><?php echo __('Username')?></label>
                                        <?php echo $this->Form->control('username', ['type'=>'text', 'id'=>'input-username', 'placeholder'=>'Username', 'value'=>$kunde->username, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name"><?php echo __('Name')?></label>
                                        <?php echo $this->Form->control('name', ['type'=>'text', 'id'=>'input-name', 'placeholder'=>'Name', 'value'=>$kunde->name, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><?php echo __('E-Mail')?></label>
                                        <?php echo $this->Form->control('email', ['type'=>'email', 'id'=>'input-email', 'placeholder'=>'E-Mail', 'value'=>$kunde->email, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><?php echo __('Telefon')?></label>
                                        <?php echo $this->Form->control('telefon', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'Telefon', 'value'=>$kunde->telefon, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4"><?php echo __('Postalische Informationen')?></h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address"><?php echo __('Straße')?></label>
                                        <?php echo $this->Form->control('straße', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'Straße', 'value'=>$kunde->straße, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address"><?php echo __('Hausnummer')?></label>
                                        <?php echo $this->Form->control('hausnummer', ['type'=>'number', 'id'=>'input-text', 'placeholder'=>'Hausnummer', 'value'=>$kunde->hausnummer, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country"><?php echo __('PLZ')?></label>
                                        <?php echo $this->Form->control('plz', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'PLZ', 'value'=>$kunde->plz, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city"><?php echo __('Ort')?></label>
                                        <?php echo $this->Form->control('ort', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'Ort', 'value'=>$kunde->ort, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
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
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
