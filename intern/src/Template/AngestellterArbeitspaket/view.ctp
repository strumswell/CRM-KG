<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterArbeitspaket $angestellterArbeitspaket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Angestellter Arbeitspaket'), ['action' => 'edit', $angestellterArbeitspaket->angestellter_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Angestellter Arbeitspaket'), ['action' => 'delete', $angestellterArbeitspaket->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterArbeitspaket->angestellter_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter Arbeitspaket'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter Arbeitspaket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="angestellterArbeitspaket view large-9 medium-8 columns content">
    <h3><?= h($angestellterArbeitspaket->angestellter_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Angestellter') ?></th>
            <td><?= $angestellterArbeitspaket->has('angestellter') ? $this->Html->link($angestellterArbeitspaket->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $angestellterArbeitspaket->angestellter->angestellter_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arbeitspaket') ?></th>
            <td><?= $angestellterArbeitspaket->has('arbeitspaket') ? $this->Html->link($angestellterArbeitspaket->arbeitspaket->name, ['controller' => 'Arbeitspaket', 'action' => 'view', $angestellterArbeitspaket->arbeitspaket->arbeitspaket_id]) : '' ?></td>
        </tr>
    </table>
</div>
