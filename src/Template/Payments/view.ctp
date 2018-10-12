<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payments view large-9 medium-8 columns content">
    <h3><?= h($payment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($payment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Type Code') ?></th>
            <td><?= $this->Number->format($payment->payment_type_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($payment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($payment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($payment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($payment->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contracts') ?></h4>
        <?php if (!empty($payment->contracts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Start') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col"><?= __('Loan Type Id') ?></th>
                <th scope="col"><?= __('Interest Rate Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Amount Due') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Payment Frequency') ?></th>
                <th scope="col"><?= __('Payment Due Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($payment->contracts as $contracts): ?>
            <tr>
                <td><?= h($contracts->id) ?></td>
                <td><?= h($contracts->user_id) ?></td>
                <td><?= h($contracts->start) ?></td>
                <td><?= h($contracts->end) ?></td>
                <td><?= h($contracts->loan_type_id) ?></td>
                <td><?= h($contracts->interest_rate_id) ?></td>
                <td><?= h($contracts->amount) ?></td>
                <td><?= h($contracts->amount_due) ?></td>
                <td><?= h($contracts->payment_id) ?></td>
                <td><?= h($contracts->payment_frequency) ?></td>
                <td><?= h($contracts->payment_due_date) ?></td>
                <td><?= h($contracts->created) ?></td>
                <td><?= h($contracts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
