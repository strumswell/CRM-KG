<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arbeitspaket[]|\Cake\Collection\CollectionInterface $arbeitspaket
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
        <li><?= $this->Html->link(__('Arbeitspaket anlegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arbeitspaket index large-9 medium-8 columns content">
    <h3><?= __('Arbeitspaket') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TaskID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fortschritt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Kosten') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Beschreibung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ProjektID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Zustaendiger') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arbeitspaket as $arbeitspaket): ?>
            <tr>
                <td><?= $this->Number->format($arbeitspaket->TaskID) ?></td>
                <td><?= $this->Number->format($arbeitspaket->Fortschritt) ?></td>
                <td><?= $this->Number->format($arbeitspaket->Kosten) ?>€</td>
                <td><?= h($arbeitspaket->Beschreibung) ?></td>
                <td><?= h($arbeitspaket->Name) ?></td>
                <td><?= $this->Number->format($arbeitspaket->ProjektID) ?></td>
                <td><?= $this->Number->format($arbeitspaket->Zustaendiger) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $arbeitspaket->TaskID]) ?>
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $arbeitspaket->TaskID]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $arbeitspaket->TaskID], ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->TaskID)]) ?>
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
