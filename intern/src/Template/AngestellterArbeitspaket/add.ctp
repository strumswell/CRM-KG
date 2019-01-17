<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterArbeitspaket $angestellterArbeitspaket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Angestellter Arbeitspaket'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterArbeitspaket form large-9 medium-8 columns content">
    <?= $this->Form->create($angestellterArbeitspaket) ?>
    <fieldset>
        <legend><?= __('Add Angestellter Arbeitspaket') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
