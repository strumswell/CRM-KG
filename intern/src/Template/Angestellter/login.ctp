<body class="bg-default" xmlns="http://www.w3.org/1999/html">
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="">
                    <img src="<?php echo $this->request->getAttribute("webroot") . 'img/brand/white.png'; ?>" />
                </a>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white"><?=__('Willkommen!') ?></h1>
                            <p class="text-lead text-light"><?=__('Loggen Sie sich hier ein, um Zugriff auf Ihre Projekte zu erhalten.')?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5 mt-4">
                            <?= $this->Form->create() ?>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <?= $this->Form->control('username',array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Username',
                                            'templates' => ['inputContainer' => '{{content}}'],
                                            'label' => false)) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <?= $this->Form->control('password',array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Passwort',
                                        'type' => 'password',
                                        'templates' => ['inputContainer' => '{{content}}'],
                                        'label' => false)) ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <?= $this->Form->button('Login',array(
                                    'class' => 'btn btn-primary my-4',
                                    'type' => 'password')) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.kg-webservice.de" class="font-weight-bold ml-1" target="_blank">K&G Webservice</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
