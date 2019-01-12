<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt $projekt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projekt->projekt_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->projekt_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kunde'), ['controller' => 'Kunde', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kunde'), ['controller' => 'Kunde', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projekt form large-9 medium-8 columns content">
    <?= $this->Form->create($projekt) ?>
    <fieldset>
        <legend><?= __('Edit Projekt') ?></legend>
        <?php
            echo $this->Form->control('projektname');
            echo $this->Form->control('beschreibung');
            echo $this->Form->control('kunde_id', ['options' => $kunde]);
            echo $this->Form->control('abgeschlossen');
            echo $this->Form->control('hinzugefuegt_am');
            echo $this->Form->control('angestellter._ids', ['options' => $angestellter]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
