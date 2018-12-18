<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kunde $kunde
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
                __('Delete'),
                ['action' => 'delete', $kunde->KDNr],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kunde->KDNr)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kunde'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kunde form large-9 medium-8 columns content">
    <?= $this->Form->create($kunde) ?>
    <fieldset>
        <legend><?= __('Edit Kunde') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Ort');
            echo $this->Form->control('PLZ');
            echo $this->Form->control('Straße');
            echo $this->Form->control('Hausnummer');
            echo $this->Form->control('EMail');
            echo $this->Form->control('Tel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
