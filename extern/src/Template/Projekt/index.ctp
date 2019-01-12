<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt[]|\Cake\Collection\CollectionInterface $projekt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kunde'), ['controller' => 'Kunde', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kunde'), ['controller' => 'Kunde', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projekt index large-9 medium-8 columns content">
    <h3><?= __('Projekt') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('projekt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('beschreibung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kunde_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abgeschlossen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hinzugefuegt_am') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projekt as $projekt): ?>
            <tr>
                <td><?= $this->Number->format($projekt->projekt_id) ?></td>
                <td><?= h($projekt->projektname) ?></td>
                <td><?= h($projekt->beschreibung) ?></td>
                <td><?= $projekt->has('kunde') ? $this->Html->link($projekt->kunde->name, ['controller' => 'Kunde', 'action' => 'view', $projekt->kunde->kunde_id]) : '' ?></td>
                <td><?= h($projekt->abgeschlossen) ?></td>
                <td><?= h($projekt->hinzugefuegt_am) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projekt->projekt_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projekt->projekt_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projekt->projekt_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->projekt_id)]) ?>
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
