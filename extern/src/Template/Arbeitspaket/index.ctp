<?php
    $this->assign('title', __('Arbeitspaket'));
    $name= $this->request->getSession()->read('Auth.User')['name'];
    $username = $this->request->getSession()->read('Auth.User')['username'];
    $kunde_id = $this->request->getSession()->read('Auth.User')['kunde_id'];
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
                        )).__('Arbeitspakete'), '/arbeitspaket', array('class' => 'nav-link active', 'escape' => false)) ?>
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html"><?php echo __('Arbeitspakete')?></a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./img/profilbilder/<?=$username?>">
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
    <div class="container-fluid mt--7">
        <!-- Abgeschlossene Tasks -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h2 class="mb-0"><?php echo __('Alle offenen Arbeitspakete')?></h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col"><?php echo __('Projektname')?></th>
                                <th scope="col"><?php echo __('Arbeitspaket')?></th>
                                <th scope="col"><?php echo __('Beschreibung')?></th>
                                <th scope="col"><?php echo __('Kosten')?></th>
                                <th scope="col"><?php echo __('Zuständig')?></th>
                                <th scope="col"><?php echo __('Status')?></th>
                                <th scope="col"><?php echo __('Frist')?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($openTasks as $item): ?>
                                <?php foreach ($item->_matchingData as $item2): ?>
                                    <tr>
                                        <td><b><?=$item->projektname?></b></td>
                                        <td><?=$item2->name?></td>
                                        <td><?=$item2->beschreibung?></td>
                                        <td><?=str_replace('.', ',', $item2->kosten)?> €</td>
                                        <td>
                                            <div class="avatar-group">
                                                <?php
                                            foreach ($zustaendige as $zustaendig) {
                                                if ($item2->zustaendiger == $zustaendig['angestellter_id']) {
                                                    print('<a href="angestellter/view/'.$item2->zustaendiger.'" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="'.$zustaendig['vorname'] .' ' . $zustaendig['nachname'].'">');
                                                    print('<img alt="Image placeholder" src="./img/profilbilder/'.$zustaendig['username'].'.jpg" class="rounded-circle">');
                                                    print('</a>');
                                                }
                                            }

                                            ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if ($item2->fortschritt == 0) {
                                                echo "<span class=\"badge badge-dot mr-4\"><i class=\"bg-danger\"></i>" . __('offen') . "</span>";
                                            } else if ($item2->fortschritt < 100) {
                                                echo "<span class=\"badge badge-dot mr-4\"><i class=\"bg-yellow\"></i>" . __('in Bearbeitung') . "</span>";
                                            } else {
                                                echo "<span class=\"badge badge-dot mr-4\"><i class=\"bg-success\"></i>" . __('beendet') . "</span>";
                                            }
                                            ?>
                                        </td>
                                        <td><?=$item2->frist?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?= $this->Paginator->prev('< ' . __('Zurück .... ')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__(' .... Weiter') . ' >') ?>
                            </ul>
                            <p class="text-center"><?= $this->Paginator->counter(['format' => __('Seite {{page}} von {{pages}} - Anzeigen von {{current}} Einträgen von insgesamt {{count}}')]) ?></p>
                        </nav>
                    </div>
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
