<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentType $paymentType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment Type'), ['action' => 'edit', $paymentType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Type'), ['action' => 'delete', $paymentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paymentTypes view large-9 medium-8 columns content">
    <h3><?= h($paymentType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment Type') ?></th>
            <td><?= h($paymentType->payment_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paymentType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($paymentType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($paymentType->modified) ?></td>
        </tr>
    </table>
</div>
