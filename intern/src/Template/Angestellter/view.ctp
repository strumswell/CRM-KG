<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Angestellter'), ['action' => 'edit', $angestellter->angestellter_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Angestellter'), ['action' => 'delete', $angestellter->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->angestellter_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ereignis'), ['controller' => 'Ereignis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ereigni'), ['controller' => 'Ereignis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="angestellter view large-9 medium-8 columns content">
    <h3><?= h($angestellter->angestellter_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nachname') ?></th>
            <td><?= h($angestellter->nachname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vorname') ?></th>
            <td><?= h($angestellter->vorname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($angestellter->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($angestellter->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($angestellter->telefon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($angestellter->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($angestellter->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Angestellter Id') ?></th>
            <td><?= $this->Number->format($angestellter->angestellter_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Arbeitspaket') ?></h4>
        <?php if (!empty($angestellter->arbeitspaket)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Arbeitspaket Id') ?></th>
                <th scope="col"><?= __('Fortschritt') ?></th>
                <th scope="col"><?= __('Kosten') ?></th>
                <th scope="col"><?= __('Beschreibung') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Projekt Id') ?></th>
                <th scope="col"><?= __('Zustaendiger') ?></th>
                <th scope="col"><?= __('Hinzugefuegt Am') ?></th>
                <th scope="col"><?= __('Abgeschlossen Am') ?></th>
                <th scope="col"><?= __('Frist') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($angestellter->arbeitspaket as $arbeitspaket): ?>
            <tr>
                <td><?= h($arbeitspaket->arbeitspaket_id) ?></td>
                <td><?= h($arbeitspaket->fortschritt) ?></td>
                <td><?= h($arbeitspaket->kosten) ?></td>
                <td><?= h($arbeitspaket->beschreibung) ?></td>
                <td><?= h($arbeitspaket->name) ?></td>
                <td><?= h($arbeitspaket->projekt_id) ?></td>
                <td><?= h($arbeitspaket->zustaendiger) ?></td>
                <td><?= h($arbeitspaket->hinzugefuegt_am) ?></td>
                <td><?= h($arbeitspaket->abgeschlossen_am) ?></td>
                <td><?= h($arbeitspaket->frist) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Arbeitspaket', 'action' => 'view', $arbeitspaket->arbeitspaket_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Arbeitspaket', 'action' => 'edit', $arbeitspaket->arbeitspaket_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Arbeitspaket', 'action' => 'delete', $arbeitspaket->arbeitspaket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->arbeitspaket_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ereignis') ?></h4>
        <?php if (!empty($angestellter->ereignis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Ereignis Id') ?></th>
                <th scope="col"><?= __('Datum') ?></th>
                <th scope="col"><?= __('Art') ?></th>
                <th scope="col"><?= __('Bezeichnung') ?></th>
                <th scope="col"><?= __('Projekt Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($angestellter->ereignis as $ereignis): ?>
            <tr>
                <td><?= h($ereignis->ereignis_id) ?></td>
                <td><?= h($ereignis->datum) ?></td>
                <td><?= h($ereignis->art) ?></td>
                <td><?= h($ereignis->bezeichnung) ?></td>
                <td><?= h($ereignis->projekt_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ereignis', 'action' => 'view', $ereignis->ereignis_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ereignis', 'action' => 'edit', $ereignis->ereignis_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ereignis', 'action' => 'delete', $ereignis->ereignis_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ereignis->ereignis_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projekt') ?></h4>
        <?php if (!empty($angestellter->projekt)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Projekt Id') ?></th>
                <th scope="col"><?= __('Projektname') ?></th>
                <th scope="col"><?= __('Beschreibung') ?></th>
                <th scope="col"><?= __('Kunde Id') ?></th>
                <th scope="col"><?= __('Abgeschlossen') ?></th>
                <th scope="col"><?= __('Hinzugefuegt Am') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($angestellter->projekt as $projekt): ?>
            <tr>
                <td><?= h($projekt->projekt_id) ?></td>
                <td><?= h($projekt->projektname) ?></td>
                <td><?= h($projekt->beschreibung) ?></td>
                <td><?= h($projekt->kunde_id) ?></td>
                <td><?= h($projekt->abgeschlossen) ?></td>
                <td><?= h($projekt->hinzugefuegt_am) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projekt', 'action' => 'view', $projekt->projekt_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projekt', 'action' => 'edit', $projekt->projekt_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projekt', 'action' => 'delete', $projekt->projekt_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->projekt_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
