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
                        <h6 class="text-overflow m-0">Willkommen!</h6>
                    </div>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                                'class' => 'ni ni-user-run'
                            )
                        ).'Logout', '/kunde/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
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
            <h6 class="navbar-heading text-muted">Kundenbereich</h6>
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
                        )).'Projekte', '/projekt', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-bullet-list-67 text-primary'
                        )).'Arbeitspakete', '/arbeitspaket', array('class' => 'nav-link', 'escape' => false)) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', array(
                            'class' => 'ni ni-calendar-grid-58 text-primary'
                        )).'Termine', '/termin', array('class' => 'nav-link active', 'escape' => false)) ?>
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Ihr Profil</a>
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
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="../examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="../examples/profile.html" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="../examples/profile.html" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="../examples/profile.html" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
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
                    <p class="text-white mt-0 mb-5">Das ist Ihre Profilseite. Hier können Sie wenn nötig Daten über sich verändern.</p>
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
                                <i class="ni location_pin mr-2"></i>Registriert seit dem <?=$kunde->registriert_am?> Uhr
                            </div>
                            <div class="h3 mt-4">
                                <i class="ni mr-2"></i><?=$kunde->plz.' '.$kunde->ort?>
                            </div>
                            <div class="h5">
                                <i class="ni mr-2"></i><?=$kunde->straße.' '.$kunde->hausnummer?>
                            </div>
                            <hr class="my-4" />
                            <h4>Folgendermaßen erreichbar:</h4>
                            <p><b>Mail:</b> <?=$kunde->email?><br><b>Telefon:</b> <?=$kunde->telefon?></p>
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
                                <h3 class="mb-0">Meine Daten</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Übernehmen</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Allgemeine Informationen</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <?php echo $this->Form->control('username', ['type'=>'text', 'id'=>'input-username', 'placeholder'=>'Username', 'value'=>$kunde->username, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Name</label>
                                            <?php echo $this->Form->control('name', ['type'=>'text', 'id'=>'input-name', 'placeholder'=>'Name', 'value'=>$kunde->name, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">E-Mail</label>
                                            <?php echo $this->Form->control('email', ['type'=>'email', 'id'=>'input-email', 'placeholder'=>'E-Mail', 'value'=>$kunde->email, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Telefon</label>
                                            <?php echo $this->Form->control('telefon', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'Telefon', 'value'=>$kunde->telefon, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Straße</label>
                                            <?php echo $this->Form->control('straße', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'Straße', 'value'=>$kunde->straße, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Hausnummer</label>
                                            <?php echo $this->Form->control('hausnummer', ['type'=>'number', 'id'=>'input-text', 'placeholder'=>'Hausnummer', 'value'=>$kunde->hausnummer, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">PLZ</label>
                                            <?php echo $this->Form->control('plz', ['type'=>'text', 'id'=>'input-text', 'placeholder'=>'PLZ', 'value'=>$kunde->plz, 'class'=>'form-control form-control-alternative', 'div'=>false, 'label'=>false]); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Ort</label>
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
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.0.0"></script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kunde'), ['action' => 'edit', $kunde->kunde_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kunde'), ['action' => 'delete', $kunde->kunde_id], ['confirm' => __('Are you sure you want to delete # {0}?', $kunde->kunde_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kunde'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kunde'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kunde view large-9 medium-8 columns content">
    <h3><?= h($kunde->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($kunde->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ort') ?></th>
            <td><?= h($kunde->ort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Straße') ?></th>
            <td><?= h($kunde->straße) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($kunde->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($kunde->telefon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($kunde->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passwort') ?></th>
            <td><?= h($kunde->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kunde Id') ?></th>
            <td><?= $this->Number->format($kunde->kunde_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plz') ?></th>
            <td><?= $this->Number->format($kunde->plz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hausnummer') ?></th>
            <td><?= $this->Number->format($kunde->hausnummer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registriert Am') ?></th>
            <td><?= h($kunde->registriert_am) ?></td>
        </tr>
    </table>
</div>
