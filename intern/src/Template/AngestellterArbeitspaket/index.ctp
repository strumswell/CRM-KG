<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterArbeitspaket[]|\Cake\Collection\CollectionInterface $angestellterArbeitspaket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Angestellter Arbeitspaket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterArbeitspaket index large-9 medium-8 columns content">
    <h3><?= __('Angestellter Arbeitspaket') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('angestellter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arbeitspaket_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($angestellterArbeitspaket as $angestellterArbeitspaket): ?>
            <tr>
                <td><?= $angestellterArbeitspaket->has('angestellter') ? $this->Html->link($angestellterArbeitspaket->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $angestellterArbeitspaket->angestellter->angestellter_id]) : '' ?></td>
                <td><?= $angestellterArbeitspaket->has('arbeitspaket') ? $this->Html->link($angestellterArbeitspaket->arbeitspaket->name, ['controller' => 'Arbeitspaket', 'action' => 'view', $angestellterArbeitspaket->arbeitspaket->arbeitspaket_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $angestellterArbeitspaket->angestellter_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $angestellterArbeitspaket->angestellter_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $angestellterArbeitspaket->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterArbeitspaket->angestellter_id)]) ?>
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
