<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni $ereigni
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ereigni'), ['action' => 'edit', $ereigni->ereignis_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ereigni'), ['action' => 'delete', $ereigni->ereignis_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ereigni->ereignis_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ereignis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ereigni'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ereignis view large-9 medium-8 columns content">
    <h3><?= h($ereigni->ereignis_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Art') ?></th>
            <td><?= h($ereigni->art) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bezeichnung') ?></th>
            <td><?= h($ereigni->bezeichnung) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projekt') ?></th>
            <td><?= $ereigni->has('projekt') ? $this->Html->link($ereigni->projekt->projekt_id, ['controller' => 'Projekt', 'action' => 'view', $ereigni->projekt->projekt_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ereignis Id') ?></th>
            <td><?= $this->Number->format($ereigni->ereignis_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datum') ?></th>
            <td><?= h($ereigni->datum) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Angestellter') ?></h4>
        <?php if (!empty($ereigni->angestellter)): ?>
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
            <?php foreach ($ereigni->angestellter as $angestellter): ?>
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
