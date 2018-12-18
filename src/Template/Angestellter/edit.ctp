<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Angestellter $angestellter
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
        <li><?= $this->Form->postLink(
                __('Angestellten löschen'),
                ['action' => 'delete', $angestellter->PNr],
                ['confirm' => __('Are you sure you want to delete # {0}?', $angestellter->PNr)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Angestelltenliste'), ['action' => 'index']) ?></li>
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
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
