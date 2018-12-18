<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde[]|\Cake\Collection\CollectionInterface $kunde
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
        <li><?= $this->Html->link(__('New Kunde'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kunde index large-9 medium-8 columns content">
    <h3><?= __('Kunde') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('KDNr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PLZ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Straße') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Hausnummer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kunde as $kunde): ?>
            <tr>
                <td><?= $this->Number->format($kunde->KDNr) ?></td>
                <td><?= h($kunde->Name) ?></td>
                <td><?= h($kunde->Ort) ?></td>
                <td><?= h($kunde->PLZ) ?></td>
                <td><?= h($kunde->Straße) ?></td>
                <td><?= $this->Number->format($kunde->Hausnummer) ?></td>
                <td><?= h($kunde->EMail) ?></td>
                <td><?= h($kunde->Tel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kunde->KDNr]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kunde->KDNr]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kunde->KDNr], ['confirm' => __('Are you sure you want to delete # {0}?', $kunde->KDNr)]) ?>
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
