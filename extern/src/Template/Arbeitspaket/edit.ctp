<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arbeitspaket $arbeitspaket
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
                __('Arbeitspaket löschen'),
                ['action' => 'delete', $arbeitspaket->TaskID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $arbeitspaket->TaskID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Arbeitspaketliste'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="arbeitspaket form large-9 medium-8 columns content">
    <?= $this->Form->create($arbeitspaket) ?>
    <fieldset>
        <legend><?= __('Arbeitspaket bearbeiten') ?></legend>
        <?php
            echo $this->Form->control('Fortschritt');
            echo $this->Form->control('Kosten');
            echo $this->Form->control('Beschreibung');
            echo $this->Form->control('Name');
            echo $this->Form->control('ProjektID');
            echo $this->Form->control('Zustaendiger');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Senden')) ?>
    <?= $this->Form->end() ?>
</div>
