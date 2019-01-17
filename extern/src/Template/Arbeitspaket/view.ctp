<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arbeitspaket $arbeitspaket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Arbeitspaket'), ['action' => 'edit', $arbeitspaket->arbeitspaket_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arbeitspaket'), ['action' => 'delete', $arbeitspaket->arbeitspaket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->arbeitspaket_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arbeitspaket view large-9 medium-8 columns content">
    <h3><?= h($arbeitspaket->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Beschreibung') ?></th>
            <td><?= h($arbeitspaket->beschreibung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($arbeitspaket->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projekt') ?></th>
            <td><?= $arbeitspaket->has('projekt') ? $this->Html->link($arbeitspaket->projekt->projekt_id, ['controller' => 'Projekt', 'action' => 'view', $arbeitspaket->projekt->projekt_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arbeitspaket Id') ?></th>
            <td><?= $this->Number->format($arbeitspaket->arbeitspaket_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fortschritt') ?></th>
            <td><?= $this->Number->format($arbeitspaket->fortschritt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kosten') ?></th>
            <td><?= $this->Number->format($arbeitspaket->kosten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zustaendiger') ?></th>
            <td><?= $this->Number->format($arbeitspaket->zustaendiger) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hinzugefuegt Am') ?></th>
            <td><?= h($arbeitspaket->hinzugefuegt_am) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abgeschlossen Am') ?></th>
            <td><?= h($arbeitspaket->abgeschlossen_am) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frist') ?></th>
            <td><?= h($arbeitspaket->frist) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Angestellter') ?></h4>
        <?php if (!empty($arbeitspaket->angestellter)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Nachname') ?></th>
                <th scope="col"><?= __('Vorname') ?></th>
                <th scope="col"><?= __('Angestellter Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefon') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($arbeitspaket->angestellter as $angestellter): ?>
            <tr>
                <td><?= h($angestellter->nachname) ?></td>
                <td><?= h($angestellter->vorname) ?></td>
                <td><?= h($angestellter->angestellter_id) ?></td>
                <td><?= h($angestellter->position) ?></td>
                <td><?= h($angestellter->email) ?></td>
                <td><?= h($angestellter->telefon) ?></td>
                <td><?= h($angestellter->username) ?></td>
                <td><?= h($angestellter->password) ?></td>
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
