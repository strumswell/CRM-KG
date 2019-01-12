<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde $kunde
 */
?>
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
            <td><?= h($kunde->passwort) ?></td>
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
