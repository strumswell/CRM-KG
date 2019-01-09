<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ereigni $ereigni
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation')?></li>
        <li><?= $this->Html->link(__('Dashboard'), '/') ?></li>
        <li><?= $this->Html->link(__('Projekte'), '/projekt') ?></li>
        <li><?= $this->Html->link(__('Arbeitspakete'), '/arbeitspaket') ?></li>
        <li><?= $this->Html->link(__('Ereignisse'), '/ereignis') ?></li>
        <li><?= $this->Html->link(__('Kunden'), '/kunde') ?></li>
        <li><?= $this->Html->link(__('Angestellte'), '/angestellter') ?></li>
        <li class="heading"><?= __('Aktionen') ?></li>
        <li><?= $this->Html->link(__('List Ereignis'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ereignis form large-9 medium-8 columns content">
    <?= $this->Form->create($ereigni) ?>
    <fieldset>
        <legend><?= __('Add Ereigni') ?></legend>
        <?php
            echo $this->Form->control('Datum');
            echo $this->Form->control('Art');
            echo $this->Form->control('Bezeichnung');
            echo $this->Form->control('ProjektID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
