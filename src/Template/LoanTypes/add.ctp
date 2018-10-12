<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoanType $loanType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Loan Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loanTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($loanType) ?>
    <fieldset>
        <legend><?= __('Add Loan Type') ?></legend>
        <?php
            echo $this->Form->control('loan_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
