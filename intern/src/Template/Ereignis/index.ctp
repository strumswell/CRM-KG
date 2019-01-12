<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni[]|\Cake\Collection\CollectionInterface $ereignis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ereigni'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ereignis index large-9 medium-8 columns content">
    <h3><?= __('Ereignis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ereignis_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('art') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bezeichnung') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projekt_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ereignis as $ereigni): ?>
            <tr>
                <td><?= $this->Number->format($ereigni->ereignis_id) ?></td>
                <td><?= h($ereigni->datum) ?></td>
                <td><?= h($ereigni->art) ?></td>
                <td><?= h($ereigni->bezeichnung) ?></td>
                <td><?= $ereigni->has('projekt') ? $this->Html->link($ereigni->projekt->projekt_id, ['controller' => 'Projekt', 'action' => 'view', $ereigni->projekt->projekt_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ereigni->ereignis_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ereigni->ereignis_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ereigni->ereignis_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ereigni->ereignis_id)]) ?>
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
