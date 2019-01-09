<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $login->UserID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $login->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $login->UserID)]) ?> </li>
        <li><?= $this->Html->link(__('List Login'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="login view large-9 medium-8 columns content">
    <h3><?= h($login->UserID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($login->Username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($login->Password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserID') ?></th>
            <td><?= $this->Number->format($login->UserID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PNr') ?></th>
            <td><?= $this->Number->format($login->PNr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KDNr') ?></th>
            <td><?= $this->Number->format($login->KDNr) ?></td>
        </tr>
    </table>
</div>
