<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
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
        <li><?= $this->Html->link(__('Angestellter bearbeiten'), ['action' => 'edit', $angestellter->PNr]) ?> </li>
        <li><?= $this->Form->postLink(__('Angestellten löschen'), ['action' => 'delete', $angestellter->PNr], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->PNr)]) ?> </li>
        <li><?= $this->Html->link(__('Angestellten anlegen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Angestelltenliste'), ['action' => 'index']) ?> </li>
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
            <th scope="row"><?= __('PNr') ?></th>
            <td><?= $this->Number->format($angestellter->PNr) ?></td>
        </tr>
    </table>
</div>
