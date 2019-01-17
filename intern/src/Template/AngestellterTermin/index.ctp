<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterTermin[]|\Cake\Collection\CollectionInterface $angestellterTermin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Angestellter Termin'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Termin'), ['controller' => 'Termin', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Termin'), ['controller' => 'Termin', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterTermin index large-9 medium-8 columns content">
    <h3><?= __('Angestellter Termin') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('angestellter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('termin_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($angestellterTermin as $angestellterTermin): ?>
            <tr>
                <td><?= $angestellterTermin->has('angestellter') ? $this->Html->link($angestellterTermin->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $angestellterTermin->angestellter->angestellter_id]) : '' ?></td>
                <td><?= $angestellterTermin->has('termin') ? $this->Html->link($angestellterTermin->termin->termin_id, ['controller' => 'Termin', 'action' => 'view', $angestellterTermin->termin->termin_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $angestellterTermin->angestellter_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $angestellterTermin->angestellter_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $angestellterTermin->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterTermin->angestellter_id)]) ?>
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
