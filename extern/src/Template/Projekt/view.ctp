<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt $projekt
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
        <li><?= $this->Html->link(__('Edit Projekt'), ['action' => 'edit', $projekt->ProjektID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projekt'), ['action' => 'delete', $projekt->ProjektID], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->ProjektID)]) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projekt view large-9 medium-8 columns content">
    <h3><?= h($projekt->ProjektID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($projekt->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Beschreibung') ?></th>
            <td><?= h($projekt->Beschreibung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektID') ?></th>
            <td><?= $this->Number->format($projekt->ProjektID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KDNr') ?></th>
            <td><?= $this->Number->format($projekt->KDNr) ?></td>
        </tr>
    </table>
</div>
