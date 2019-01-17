<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Erreichbarkeit $erreichbarkeit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $erreichbarkeit->erreichbarkeit_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $erreichbarkeit->erreichbarkeit_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Erreichbarkeit'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['controller' => 'Angestellter', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Angestellter'), ['controller' => 'Angestellter', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="erreichbarkeit form large-9 medium-8 columns content">
    <?= $this->Form->create($erreichbarkeit) ?>
    <fieldset>
        <legend><?= __('Edit Erreichbarkeit') ?></legend>
        <?php
            echo $this->Form->control('mo');
            echo $this->Form->control('di');
            echo $this->Form->control('mi');
            echo $this->Form->control('don');
            echo $this->Form->control('fr');
            echo $this->Form->control('sa');
            echo $this->Form->control('so');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
