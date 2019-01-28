<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Erreichbarkeit[]|\Cake\Collection\CollectionInterface $erreichbarkeit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Erreichbarkeit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="erreichbarkeit index large-9 medium-8 columns content">
    <h3><?= __('Erreichbarkeit') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('erreichbarkeit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('di') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('don') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('so') ?></th>
                <th scope="col"><?= $this->Paginator->sort('angestellter_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($erreichbarkeit as $erreichbarkeit): ?>
            <tr>
                <td><?= $erreichbarkeit->has('erreichbarkeit') ? $this->Html->link($erreichbarkeit->erreichbarkeit->erreichbarkeit_id, ['controller' => 'Erreichbarkeit', 'action' => 'view', $erreichbarkeit->erreichbarkeit->erreichbarkeit_id]) : '' ?></td>
                <td><?= h($erreichbarkeit->mo) ?></td>
                <td><?= h($erreichbarkeit->di) ?></td>
                <td><?= h($erreichbarkeit->mi) ?></td>
                <td><?= h($erreichbarkeit->don) ?></td>
                <td><?= h($erreichbarkeit->fr) ?></td>
                <td><?= h($erreichbarkeit->sa) ?></td>
                <td><?= h($erreichbarkeit->so) ?></td>
                <td><?= $erreichbarkeit->has('angestellter') ? $this->Html->link($erreichbarkeit->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $erreichbarkeit->angestellter->angestellter_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $erreichbarkeit->erreichbarkeit_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $erreichbarkeit->erreichbarkeit_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $erreichbarkeit->erreichbarkeit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $erreichbarkeit->erreichbarkeit_id)]) ?>
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
