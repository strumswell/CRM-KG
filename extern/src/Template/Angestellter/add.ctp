<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Arbeitspaket'), ['controller' => 'Arbeitspaket', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Termin'), ['controller' => 'Termin', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Termin'), ['controller' => 'Termin', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellter form large-9 medium-8 columns content">
    <?= $this->Form->create($angestellter) ?>
    <fieldset>
        <legend><?= __('Add Angestellter') ?></legend>
        <?php
            echo $this->Form->control('nachname');
            echo $this->Form->control('vorname');
            echo $this->Form->control('position');
            echo $this->Form->control('email');
            echo $this->Form->control('telefon');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('arbeitspaket._ids', ['options' => $arbeitspaket]);
            echo $this->Form->control('projekt._ids', ['options' => $projekt]);
            echo $this->Form->control('termin._ids', ['options' => $termin]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
