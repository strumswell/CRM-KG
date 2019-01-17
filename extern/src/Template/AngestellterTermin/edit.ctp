<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterTermin $angestellterTermin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $angestellterTermin->angestellter_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterTermin->angestellter_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Angestellter Termin'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Termin'), ['controller' => 'Termin', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Termin'), ['controller' => 'Termin', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterTermin form large-9 medium-8 columns content">
    <?= $this->Form->create($angestellterTermin) ?>
    <fieldset>
        <legend><?= __('Edit Angestellter Termin') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
