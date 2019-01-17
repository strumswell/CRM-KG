<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterTermin $angestellterTermin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Angestellter Termin'), ['action' => 'edit', $angestellterTermin->angestellter_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Angestellter Termin'), ['action' => 'delete', $angestellterTermin->angestellter_id], ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterTermin->angestellter_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter Termin'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter Termin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Termin'), ['controller' => 'Termin', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Termin'), ['controller' => 'Termin', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="angestellterTermin view large-9 medium-8 columns content">
    <h3><?= h($angestellterTermin->angestellter_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Angestellter') ?></th>
            <td><?= $angestellterTermin->has('angestellter') ? $this->Html->link($angestellterTermin->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $angestellterTermin->angestellter->angestellter_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Termin') ?></th>
            <td><?= $angestellterTermin->has('termin') ? $this->Html->link($angestellterTermin->termin->termin_id, ['controller' => 'Termin', 'action' => 'view', $angestellterTermin->termin->termin_id]) : '' ?></td>
        </tr>
    </table>
</div>
