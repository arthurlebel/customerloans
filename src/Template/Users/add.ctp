<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <!--<li><?//= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            $options=array(0 => 'Customer', 1 => 'Collector', 2 => 'Admin');
        
            echo $this->Form->control('user_type', array('type'=>'select', 'options'=> $options, 'label'=>false, 'empty'=>'Category'));
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            
            /*$loguser = $this->request->getSession()->read('Auth.User');
            if ($loguser['type'] == "2") {
                echo $this->Form->control('type', array('type'=>'select', 'options'=> $options, 'label'=>false, 'empty'=>'Category'));
            }
             */
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
