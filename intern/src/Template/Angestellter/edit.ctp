<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $angestellter->PNr],
                ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->PNr)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Angestellter'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="angestellter form large-9 medium-8 columns content">
    <?= $this->Form->create($angestellter) ?>
    <fieldset>
        <legend><?= __('Edit Angestellter') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Vorname');
            echo $this->Form->control('Position');
            echo $this->Form->control('EMail');
            echo $this->Form->control('Telefon');
            echo $this->Form->control('Username');
            echo $this->Form->control('Password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
