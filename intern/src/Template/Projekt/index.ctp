<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt[]|\Cake\Collection\CollectionInterface $projekt
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
        <li><?= $this->Html->link(__('New Projekt'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projekt index large-9 medium-8 columns content">
    <h3><?= __('Projekt') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ProjektID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Beschreibung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('KDNr') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projekt as $projekt): ?>
            <tr>
                <td><?= $this->Number->format($projekt->ProjektID) ?></td>
                <td><?= h($projekt->Name) ?></td>
                <td><?= h($projekt->Beschreibung) ?></td>
                <td><?= $this->Number->format($projekt->KDNr) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projekt->ProjektID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projekt->ProjektID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projekt->ProjektID], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->ProjektID)]) ?>
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
