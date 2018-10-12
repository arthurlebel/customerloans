<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan Types'), ['controller' => 'LoanTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan Type'), ['controller' => 'LoanTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Interest Rates'), ['controller' => 'InterestRates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Interest Rate'), ['controller' => 'InterestRates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create($contract) ?>
    <fieldset>
        <legend><?= __('Add Contract') ?></legend>
        <?php
            $loguser = $this->request->getSession()->read('Auth.User');
            if ($loguser['user_type'] == "2" || "1") {
                echo $this->Form->control('user_id', ['options' => $users]);
            }
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('loan_type_id', ['options' => $loanTypes]);
            echo $this->Form->control('interest_rate_id', ['options' => $interestRates]);
            echo $this->Form->control('amount');
            echo $this->Form->control('amount_due');
            echo $this->Form->control('payment_id', ['options' => $payments]);
            echo $this->Form->control('payment_frequency');
            echo $this->Form->control('payment_due_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
