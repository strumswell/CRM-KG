<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Angestellter'), ['action' => 'edit', $angestellter->PNr]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Angestellter'), ['action' => 'delete', $angestellter->PNr], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->PNr)]) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="angestellter view large-9 medium-8 columns content">
    <h3><?= h($angestellter->PNr) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($angestellter->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vorname') ?></th>
            <td><?= h($angestellter->Vorname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($angestellter->Position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EMail') ?></th>
            <td><?= h($angestellter->EMail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($angestellter->Telefon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($angestellter->Username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($angestellter->Password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PNr') ?></th>
            <td><?= $this->Number->format($angestellter->PNr) ?></td>
        </tr>
    </table>
</div>
