<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $login->UserID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $login->UserID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Login'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="login form large-9 medium-8 columns content">
    <?= $this->Form->create($login) ?>
    <fieldset>
        <legend><?= __('Edit Login') ?></legend>
        <?php
            echo $this->Form->control('PNr');
            echo $this->Form->control('KDNr');
            echo $this->Form->control('Username');
            echo $this->Form->control('Password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
