<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde[]|\Cake\Collection\CollectionInterface $kunde
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Kunde'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kunde index large-9 medium-8 columns content">
    <h3><?= __('Kunde') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('kunde_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plz') ?></th>
                <th scope="col"><?= $this->Paginator->sort('straße') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hausnummer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passwort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registriert_am') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kunde as $kunde): ?>
            <tr>
                <td><?= $this->Number->format($kunde->kunde_id) ?></td>
                <td><?= h($kunde->name) ?></td>
                <td><?= h($kunde->ort) ?></td>
                <td><?= $this->Number->format($kunde->plz) ?></td>
                <td><?= h($kunde->straße) ?></td>
                <td><?= $this->Number->format($kunde->hausnummer) ?></td>
                <td><?= h($kunde->email) ?></td>
                <td><?= h($kunde->telefon) ?></td>
                <td><?= h($kunde->username) ?></td>
                <td><?= h($kunde->passwort) ?></td>
                <td><?= h($kunde->registriert_am) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kunde->kunde_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kunde->kunde_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kunde->kunde_id], ['confirm' => __('Are you sure you want to delete # {0}?', $kunde->kunde_id)]) ?>
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
