<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterProjekt[]|\Cake\Collection\CollectionInterface $angestellterProjekt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Angestellter Projekt'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterProjekt index large-9 medium-8 columns content">
    <h3><?= __('Angestellter Projekt') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('angestellter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projekt_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($angestellterProjekt as $angestellterProjekt): ?>
            <tr>
                <td><?= $angestellterProjekt->has('angestellter') ? $this->Html->link($angestellterProjekt->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $angestellterProjekt->angestellter->angestellter_id]) : '' ?></td>
                <td><?= $angestellterProjekt->has('projekt') ? $this->Html->link($angestellterProjekt->projekt->projekt_id, ['controller' => 'Projekt', 'action' => 'view', $angestellterProjekt->projekt->projekt_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $angestellterProjekt->angestellter_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $angestellterProjekt->angestellter_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $angestellterProjekt->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterProjekt->angestellter_id)]) ?>
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
