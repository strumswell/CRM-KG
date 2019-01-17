<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AngestellterProjekt $angestellterProjekt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $angestellterProjekt->angestellter_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $angestellterProjekt->angestellter_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Angestellter Projekt'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['controller' => 'Projekt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projekt'), ['controller' => 'Projekt', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="angestellterProjekt form large-9 medium-8 columns content">
    <?= $this->Form->create($angestellterProjekt) ?>
    <fieldset>
        <legend><?= __('Edit Angestellter Projekt') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
