<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Termin $termin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Termin'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="termin form large-9 medium-8 columns content">
    <?= $this->Form->create($termin) ?>
    <fieldset>
        <legend><?= __('Add Termin') ?></legend>
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
