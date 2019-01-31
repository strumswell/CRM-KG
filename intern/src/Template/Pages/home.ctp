<?php
    $this->assign('title', 'Dashboard');
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
            <img src="./img/brand/blue.png" class="navbar-brand-img" alt="...">
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
            <ul class="navbar-nav">
                <li>
                    <?= $this->Html->link(
                            $this->Html->tag('i', '', array(
                                    'class' => 'ni ni-tv-2 text-primary'
                            )).'Dashboard', '/', array('class' => 'nav-link active', 'escape' => false)) ?>
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
                        )).__('Mitarbeiterverwaltung'), '/angestellter', array('class' => 'nav-link', 'escape' => false)) ?>
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?=__('Auftragsvolumen')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $orderVolume[0]; ?> €</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?=__('im laufenden Monat')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?=__('Projekte')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?= $openProjectsCounts ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?=__('aktuell laufend')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?=__('Neukunden')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?= $newCustomers ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?=__('seit Jahresbeginn')?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?=__('Arbeitspakete')?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?= $openTasks ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap"><?=__('aktuell offen')?></span>
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
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1"><?php echo __('Übersicht') ?></h6>
                                <h2 class="text-white mb-0"><?php echo __('Auftragsvolumen') ?></h2>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo __('Übersicht') ?></h6>
                                <h2 class="mb-0"><?php echo __('Abgeschlossene Tasks') ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Aufgabenübersicht -->
            <div class="col-lg-6 mb-4 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                                    <i class="fas fa-tasks"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="mt-2"><?php echo __('Meine Aufgabenübersicht') ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-left"><h5><?php echo __('Anstehend') ?></h5></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b><?php print($openTasksDeadlineDates[0]); ?></b> – <b><?php print($openTasksDeadline[0]['kundenname'])?></b>: <?php print($openTasksDeadline[0]['name'])?> (<?= $openTasksDeadline[0]['projektname']?>)</td>
                                <?php array_splice($openTasksDeadlineDates, 0, 1); //Remove first element ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-left"><h5><?php echo __('Danach') ?></h5></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $firstEvent = true;
                            foreach ($openTasksDeadline as $item){
                                if ($firstEvent) {
                                    $firstEvent = false;
                                    //Leave first date out because it was used in 'Anstehend' -> older dates needed!
                                } else {
                                    echo '<tr><td><b>';
                                    print($openTasksDeadlineDates[0].'</b> – <b>');
                                    //Remove first elment
                                    array_splice($openTasksDeadlineDates, 0, 1);

                                    print($item['kundenname']);
                                    echo '</b> :'.$item['name'].' ('.$openTasksDeadline[0]['projektname'].')';
                                    echo '</td></tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Terminübersicht -->
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="mt-2"><?php echo __('Meine Terminübersicht') ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-left"><h5><?php echo __('Anstehend') ?></h5></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b><?php print($openMeetingsDates[0]);?></b> – <b><?php print($openMeetings[0]['name'])?></b>: <?php print($openMeetings[0]['bezeichnung'])?> (<?php print($openMeetings[0]['art'])?>)</td>
                                <?php
                                array_splice($openMeetingsDates, 0, 1); //Remove first element
                                ?>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-left"><h5><?php echo __('Danach') ?></h5></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $firstEvent = true;
                            foreach ($openMeetings as $item){
                                if ($firstEvent) {
                                    $firstEvent = false;
                                    //Leave first date out because it was used in 'Anstehend' -> older dates needed!
                                } else {
                                    echo '<tr><td><b>';
                                    print($openMeetingsDates[0].'</b> – <b>');
                                    //Remove first element
                                    array_splice($openMeetingsDates, 0, 1); //Remove first element
                                    echo($item['name']);
                                    echo '</b>: '.$item['bezeichnung'];
                                    echo ' ('.$item['art'].') ';
                                    echo '</td></tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!---
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            Diese Datei hochladen: <input name="userfile" type="file" />
            <input type="submit" value="Send File" />
        </form>
        -->
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./js/chat.js"></script>

