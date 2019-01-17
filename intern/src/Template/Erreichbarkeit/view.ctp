<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Erreichbarkeit $erreichbarkeit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Erreichbarkeit'), ['action' => 'edit', $erreichbarkeit->erreichbarkeit_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Erreichbarkeit'), ['action' => 'delete', $erreichbarkeit->erreichbarkeit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $erreichbarkeit->erreichbarkeit_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Erreichbarkeit'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Erreichbarkeit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="erreichbarkeit view large-9 medium-8 columns content">
    <h3><?= h($erreichbarkeit->erreichbarkeit_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mo') ?></th>
            <td><?= h($erreichbarkeit->mo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Di') ?></th>
            <td><?= h($erreichbarkeit->di) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mi') ?></th>
            <td><?= h($erreichbarkeit->mi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Don') ?></th>
            <td><?= h($erreichbarkeit->don) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fr') ?></th>
            <td><?= h($erreichbarkeit->fr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sa') ?></th>
            <td><?= h($erreichbarkeit->sa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('So') ?></th>
            <td><?= h($erreichbarkeit->so) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Angestellter') ?></th>
            <td><?= $erreichbarkeit->has('angestellter') ? $this->Html->link($erreichbarkeit->angestellter->angestellter_id, ['controller' => 'Angestellter', 'action' => 'view', $erreichbarkeit->angestellter->angestellter_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Erreichbarkeit Id') ?></th>
            <td><?= $this->Number->format($erreichbarkeit->erreichbarkeit_id) ?></td>
        </tr>
    </table>
</div>
