<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arbeitspaket $arbeitspaket
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
        <li><?= $this->Html->link(__('Edit Arbeitspaket'), ['action' => 'edit', $arbeitspaket->TaskID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arbeitspaket'), ['action' => 'delete', $arbeitspaket->TaskID], ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->TaskID)]) ?> </li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arbeitspaket view large-9 medium-8 columns content">
    <h3><?= h($arbeitspaket->TaskID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Beschreibung') ?></th>
            <td><?= h($arbeitspaket->Beschreibung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($arbeitspaket->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TaskID') ?></th>
            <td><?= $this->Number->format($arbeitspaket->TaskID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fortschritt') ?></th>
            <td><?= $this->Number->format($arbeitspaket->Fortschritt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kosten') ?></th>
            <td><?= $this->Number->format($arbeitspaket->Kosten) ?>€</td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektID') ?></th>
            <td><?= $this->Number->format($arbeitspaket->ProjektID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zustaendiger') ?></th>
            <td><?= $this->Number->format($arbeitspaket->Zustaendiger) ?></td>
        </tr>
    </table>
</div>
