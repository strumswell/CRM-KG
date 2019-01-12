<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni $ereigni
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ereignis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ereignis form large-9 medium-8 columns content">
    <?= $this->Form->create($ereigni) ?>
    <fieldset>
        <legend><?= __('Add Ereigni') ?></legend>
        <?php
            echo $this->Form->control('datum');
            echo $this->Form->control('art');
            echo $this->Form->control('bezeichnung');
            echo $this->Form->control('projekt_id', ['options' => $projekt]);
            echo $this->Form->control('angestellter._ids', ['options' => $angestellter]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
