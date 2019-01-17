<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arbeitspaket $arbeitspaket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Arbeitspaket'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arbeitspaket form large-9 medium-8 columns content">
    <?= $this->Form->create($arbeitspaket) ?>
    <fieldset>
        <legend><?= __('Add Arbeitspaket') ?></legend>
        <?php
            echo $this->Form->control('fortschritt');
            echo $this->Form->control('kosten');
            echo $this->Form->control('beschreibung');
            echo $this->Form->control('name');
            echo $this->Form->control('projekt_id', ['options' => $projekt]);
            echo $this->Form->control('zustaendiger');
            echo $this->Form->control('hinzugefuegt_am');
            echo $this->Form->control('abgeschlossen_am', ['empty' => true]);
            echo $this->Form->control('frist', ['empty' => true]);
            echo $this->Form->control('angestellter._ids', ['options' => $angestellter]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
