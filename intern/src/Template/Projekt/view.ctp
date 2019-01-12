<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt $projekt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Projekt'), ['action' => 'edit', $projekt->projekt_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projekt'), ['action' => 'delete', $projekt->projekt_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->projekt_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kunde'), ['controller' => 'Kunde', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kunde'), ['controller' => 'Kunde', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projekt view large-9 medium-8 columns content">
    <h3><?= h($projekt->projekt_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Projektname') ?></th>
            <td><?= h($projekt->projektname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Beschreibung') ?></th>
            <td><?= h($projekt->beschreibung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kunde') ?></th>
            <td><?= $projekt->has('kunde') ? $this->Html->link($projekt->kunde->name, ['controller' => 'Kunde', 'action' => 'view', $projekt->kunde->kunde_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projekt Id') ?></th>
            <td><?= $this->Number->format($projekt->projekt_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hinzugefuegt Am') ?></th>
            <td><?= h($projekt->hinzugefuegt_am) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abgeschlossen') ?></th>
            <td><?= $projekt->abgeschlossen ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Angestellter') ?></h4>
        <?php if (!empty($projekt->angestellter)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Nachname') ?></th>
                <th scope="col"><?= __('Vorname') ?></th>
                <th scope="col"><?= __('Angestellter Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefon') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Passwort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projekt->angestellter as $angestellter): ?>
            <tr>
                <td><?= h($angestellter->nachname) ?></td>
                <td><?= h($angestellter->vorname) ?></td>
                <td><?= h($angestellter->angestellter_id) ?></td>
                <td><?= h($angestellter->position) ?></td>
                <td><?= h($angestellter->email) ?></td>
                <td><?= h($angestellter->telefon) ?></td>
                <td><?= h($angestellter->username) ?></td>
                <td><?= h($angestellter->passwort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Angestellter', 'action' => 'view', $angestellter->angestellter_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Angestellter', 'action' => 'edit', $angestellter->angestellter_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Angestellter', 'action' => 'delete', $angestellter->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->angestellter_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
