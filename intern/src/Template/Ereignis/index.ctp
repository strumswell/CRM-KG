<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni[]|\Cake\Collection\CollectionInterface $ereignis
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
        <li><?= $this->Html->link(__('Ereignis anlegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ereignis index large-9 medium-8 columns content">
    <h3><?= __('Ereignis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('EventID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Datum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Art') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Bezeichnung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ProjektID') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ereignis as $ereigni): ?>
            <tr>
                <td><?= $this->Number->format($ereigni->EventID) ?></td>
                <td><?= h($ereigni->Datum) ?></td>
                <td><?= h($ereigni->Art) ?></td>
                <td><?= h($ereigni->Bezeichnung) ?></td>
                <td><?= $this->Number->format($ereigni->ProjektID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $ereigni->EventID]) ?>
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $ereigni->EventID]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $ereigni->EventID], ['confirm' => __('Are you sure you want to delete # {0}?', $ereigni->EventID)]) ?>
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
