<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde $kunde
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Kunde'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kunde form large-9 medium-8 columns content">
    <?= $this->Form->create($kunde) ?>
    <fieldset>
        <legend><?= __('Add Kunde') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Ort');
            echo $this->Form->control('PLZ');
            echo $this->Form->control('Straße');
            echo $this->Form->control('Hausnummer');
            echo $this->Form->control('EMail');
            echo $this->Form->control('Tel');
            echo $this->Form->control('Username');
            echo $this->Form->control('Password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
