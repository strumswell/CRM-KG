<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Termin[]|\Cake\Collection\CollectionInterface $termin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Termin'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="termin index large-9 medium-8 columns content">
    <h3><?= __('Termin') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('termin_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('art') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bezeichnung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projekt_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($termin as $termin): ?>
            <tr>
                <td><?= $this->Number->format($termin->termin_id) ?></td>
                <td><?= h($termin->datum) ?></td>
                <td><?= h($termin->art) ?></td>
                <td><?= h($termin->bezeichnung) ?></td>
                <td><?= $termin->has('projekt') ? $this->Html->link($termin->projekt->projekt_id, ['controller' => 'Projekt', 'action' => 'view', $termin->projekt->projekt_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $termin->termin_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $termin->termin_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $termin->termin_id], ['confirm' => __('Are you sure you want to delete # {0}?', $termin->termin_id)]) ?>
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
