<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projekt $projekt
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
                ['action' => 'delete', $projekt->ProjektID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projekt->ProjektID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projekt'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projekt form large-9 medium-8 columns content">
    <?= $this->Form->create($projekt) ?>
    <fieldset>
        <legend><?= __('Edit Projekt') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Beschreibung');
            echo $this->Form->control('KDNr');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
