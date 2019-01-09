<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde $kunde
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kunde'), ['action' => 'edit', $kunde->KDNr]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kunde'), ['action' => 'delete', $kunde->KDNr], ['confirm' => __('Are you sure you want to delete # {0}?', $kunde->KDNr)]) ?> </li>
        <li><?= $this->Html->link(__('List Kunde'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kunde'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kunde view large-9 medium-8 columns content">
    <h3><?= h($kunde->KDNr) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($kunde->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ort') ?></th>
            <td><?= h($kunde->Ort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Straße') ?></th>
            <td><?= h($kunde->Straße) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EMail') ?></th>
            <td><?= h($kunde->EMail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($kunde->Tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($kunde->Username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($kunde->Password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KDNr') ?></th>
            <td><?= $this->Number->format($kunde->KDNr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PLZ') ?></th>
            <td><?= $this->Number->format($kunde->PLZ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hausnummer') ?></th>
            <td><?= $this->Number->format($kunde->Hausnummer) ?></td>
        </tr>
    </table>
</div>
