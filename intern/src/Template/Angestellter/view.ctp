<?php
$this->assign('title', 'Angestellter');
$username = $this->request->getSession()->read('Auth.User')['vorname'] . ' ' . $this->request->getSession()->read('Auth.User')['nachname'];
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
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="/~bolte/cakephp/intern/webroot/img/theme/team-1-800x800.jpg">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
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
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Angestellter</a>
            <!-- Form -->
            <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
            </form>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/~bolte/cakephp/intern/webroot/img/theme/team-4-800x800.jpg">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?=$username?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
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
                            ).'Logout', '/angestellter/logout', array('class' => 'dropdown-item', 'escape' => false)) ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Auftragsvolumen</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $orderVolume[0];?> €</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap">im laufenden Monat</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Projekte</h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$openProjectsCounts?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap">aktuell laufend</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Neukunden</h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$newCustomers?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap">seit Jahresbeginn</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tasks</h5>
                                        <span class="h2 font-weight-bold mb-0"><?=$openTasks?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap">aktuell offen</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <?php echo $this->Form->create($angestellter,['class'=>'form-horizontal']);?>
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo __('Informationen')?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <?= $this->Html->link(__('Bearbeiten'), ['controller' => 'Angestellter', 'action' => 'edit', $angestellter->angestellter_id], ['class' => 'btn btn-sm btn-primary']) ?>
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
                                    <label for="textinput">Passwort</label>
                                    <?php echo $this->Form->control('password', ['type'=>'password', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Nachname-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">Nachname</label>
                                    <?php echo $this->Form->control('nachname', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                            <!-- Vorname-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">Vorname</label>
                                    <?php echo $this->Form->control('vorname', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Position-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">Position</label>
                                    <?php echo $this->Form->control('position', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                            <!-- E-Mail-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">E-Mail</label>
                                    <?php echo $this->Form->control('email', ['type'=>'email', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
                                </div>
                            </div>
                            <!-- Telefon-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="textinput">Telefon</label>
                                    <?php echo $this->Form->control('telefon', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control form-control-alternative ', 'div'=>false, 'label'=>false, 'disabled']); ?>
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


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Angestellter'), ['action' => 'edit', $angestellter->angestellter_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Angestellter'), ['action' => 'delete', $angestellter->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->angestellter_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="angestellter view large-9 medium-8 columns content">
    <h3><?= h($angestellter->angestellter_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nachname') ?></th>
            <td><?= h($angestellter->nachname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vorname') ?></th>
            <td><?= h($angestellter->vorname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($angestellter->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($angestellter->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($angestellter->telefon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($angestellter->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($angestellter->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Angestellter Id') ?></th>
            <td><?= $this->Number->format($angestellter->angestellter_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Arbeitspaket') ?></h4>
        <?php if (!empty($angestellter->arbeitspaket)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Arbeitspaket Id') ?></th>
                <th scope="col"><?= __('Fortschritt') ?></th>
                <th scope="col"><?= __('Kosten') ?></th>
                <th scope="col"><?= __('Beschreibung') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Projekt Id') ?></th>
                <th scope="col"><?= __('Zustaendiger') ?></th>
                <th scope="col"><?= __('Hinzugefuegt Am') ?></th>
                <th scope="col"><?= __('Abgeschlossen Am') ?></th>
                <th scope="col"><?= __('Frist') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($angestellter->arbeitspaket as $arbeitspaket): ?>
            <tr>
                <td><?= h($arbeitspaket->arbeitspaket_id) ?></td>
                <td><?= h($arbeitspaket->fortschritt) ?></td>
                <td><?= h($arbeitspaket->kosten) ?></td>
                <td><?= h($arbeitspaket->beschreibung) ?></td>
                <td><?= h($arbeitspaket->name) ?></td>
                <td><?= h($arbeitspaket->projekt_id) ?></td>
                <td><?= h($arbeitspaket->zustaendiger) ?></td>
                <td><?= h($arbeitspaket->hinzugefuegt_am) ?></td>
                <td><?= h($arbeitspaket->abgeschlossen_am) ?></td>
                <td><?= h($arbeitspaket->frist) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Arbeitspaket', 'action' => 'view', $arbeitspaket->arbeitspaket_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Arbeitspaket', 'action' => 'edit', $arbeitspaket->arbeitspaket_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Arbeitspaket', 'action' => 'delete', $arbeitspaket->arbeitspaket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->arbeitspaket_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projekt') ?></h4>
        <?php if (!empty($angestellter->projekt)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Projekt Id') ?></th>
                <th scope="col"><?= __('Projektname') ?></th>
                <th scope="col"><?= __('Beschreibung') ?></th>
                <th scope="col"><?= __('Kunde Id') ?></th>
                <th scope="col"><?= __('Abgeschlossen') ?></th>
                <th scope="col"><?= __('Hinzugefuegt Am') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($angestellter->projekt as $projekt): ?>
            <tr>
                <td><?= h($projekt->projekt_id) ?></td>
                <td><?= h($projekt->projektname) ?></td>
                <td><?= h($projekt->beschreibung) ?></td>
                <td><?= h($projekt->kunde_id) ?></td>
                <td><?= h($projekt->abgeschlossen) ?></td>
                <td><?= h($projekt->hinzugefuegt_am) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projekt', 'action' => 'view', $projekt->projekt_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projekt', 'action' => 'edit', $projekt->projekt_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projekt', 'action' => 'delete', $projekt->projekt_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->projekt_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
