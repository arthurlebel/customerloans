<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InterestRate $interestRate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $interestRate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $interestRate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Interest Rates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="interestRates form large-9 medium-8 columns content">
    <?= $this->Form->create($interestRate) ?>
    <fieldset>
        <legend><?= __('Edit Interest Rate') ?></legend>
        <?php
            echo $this->Form->control('interest_rate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
