<?php
$urlToPaymentTypeAutocompleteJson = $this->Url->build([
    "controller" => "PaymentTypesController",
    "action" => "findPaymentTypes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToPaymentTypeAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('PaymentTypes/autocomplete', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('PaymentTypes') ?>
<fieldset>
    <legend><?= __('Search Payment Types') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>