<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni $ereigni
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation')?></li>
        <li><?= $this->Html->link(__('Dashboard'), '/') ?></li>
        <li><?= $this->Html->link(__('Projekte'), '/projekt') ?></li>
        <li><?= $this->Html->link(__('Arbeitspakete'), '/arbeitspaket') ?></li>
        <li><?= $this->Html->link(__('Ereignisse'), '/ereignis') ?></li>
        <li><?= $this->Html->link(__('Kunden'), '/kunde') ?></li>
        <li><?= $this->Html->link(__('Angestellte'), '/angestellter') ?></li>
        <li class="heading"><?= __('Aktionen') ?></li>
        <li><?= $this->Html->link(__('Edit Ereigni'), ['action' => 'edit', $ereigni->EventID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ereigni'), ['action' => 'delete', $ereigni->EventID], ['confirm' => __('Are you sure you want to delete # {0}?', $ereigni->EventID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ereignis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ereigni'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ereignis view large-9 medium-8 columns content">
    <h3><?= h($ereigni->EventID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Art') ?></th>
            <td><?= h($ereigni->Art) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bezeichnung') ?></th>
            <td><?= h($ereigni->Bezeichnung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EventID') ?></th>
            <td><?= $this->Number->format($ereigni->EventID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektID') ?></th>
            <td><?= $this->Number->format($ereigni->ProjektID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datum') ?></th>
            <td><?= h($ereigni->Datum) ?></td>
        </tr>
    </table>
</div>
