<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter[]|\Cake\Collection\CollectionInterface $angestellter
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
        <li><?= $this->Html->link(__('Angestellten anlegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellter index large-9 medium-8 columns content">
    <h3><?= __('Angestellter') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Vorname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PNr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Telefon') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($angestellter as $angestellter): ?>
            <tr>
                <td><?= h($angestellter->Name) ?></td>
                <td><?= h($angestellter->Vorname) ?></td>
                <td><?= $this->Number->format($angestellter->PNr) ?></td>
                <td><?= h($angestellter->Position) ?></td>
                <td><?= h($angestellter->EMail) ?></td>
                <td><?= h($angestellter->Telefon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $angestellter->PNr]) ?>
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $angestellter->PNr]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $angestellter->PNr], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->PNr)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
