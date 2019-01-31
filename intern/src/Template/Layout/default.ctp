<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CRM K&G Webservice';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('argon.css') ?>
    <?= $this->Html->css('../vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('../vendor/nucleo/css/nucleo.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') ?>

    <?= $this->Html->script('../vendor/jquery/dist/jquery.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('../vendor/bootstrap/dist/js/bootstrap.bundle.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('../vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('../vendor/chart.js/dist/Chart.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('../vendor/chart.js/dist/Chart.extension.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('argon.js', ['block' => 'scriptBottom']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <?= $this->fetch('content') ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-6">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    </div>
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
