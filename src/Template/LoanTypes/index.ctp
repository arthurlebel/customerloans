<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoanType[]|\Cake\Collection\CollectionInterface $loanTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Loan Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loanTypes index large-9 medium-8 columns content">
    <h3><?= __('Loan Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loan_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loanTypes as $loanType): ?>
            <tr>
                <td><?= $this->Number->format($loanType->id) ?></td>
                <td><?= h($loanType->loan_type) ?></td>
                <td><?= h($loanType->created) ?></td>
                <td><?= h($loanType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loanType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loanType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loanType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
