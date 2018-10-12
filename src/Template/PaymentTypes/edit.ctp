<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentType $paymentType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Payment Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paymentTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($paymentType) ?>
    <fieldset>
        <legend><?= __('Edit Payment Type') ?></legend>
        <?php
            echo $this->Form->control('payment_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
