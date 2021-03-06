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
            echo $this->Form->control('name');
            echo $this->Form->control('ort');
            echo $this->Form->control('plz');
            echo $this->Form->control('straße');
            echo $this->Form->control('hausnummer');
            echo $this->Form->control('email');
            echo $this->Form->control('telefon');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('registriert_am');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
