<div class="contracts view large-9 medium-8 columns content">
    <h3><?= h('Contract') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contract->has('user') ? $this->Html->link($contract->user->email, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loan Type') ?></th>
            <td><?= h($contract->loan_type->loan_type) ?></td>
    <!--$contract->has('loan_type') ? $this->Html->link($contract->loan_type->loan_type, ['controller' => 'LoanTypes', 'action' => 'view', $contract->loan_type->id]) : '' ?></td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Interest Rate') ?></th>
            <td><?= h($contract->interest_rate->interest_rate) . "%" ?></td>
    <!--$contract->has('interest_rate') ? $this->Html->link($contract->interest_rate->id, ['controller' => 'InterestRates', 'action' => 'view', $contract->interest_rate->id]) : '' ?></td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= h($contract->payment->amount) ?></td>
        <!--$contract->has('payment') ? $this->Html->link($contract->payment->id, ['controller' => 'Payments', 'action' => 'view', $contract->payment->id]) : '' ?></td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Frequency') ?></th>
            <td><?= h($contract->payment_frequency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($contract->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Due') ?></th>
            <td><?= $this->Number->format($contract->amount_due) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($contract->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($contract->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Due Date') ?></th>
            <td><?= h($contract->payment_due_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contract->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contract->modified) ?></td>
        </tr>
    </table>
</div>
