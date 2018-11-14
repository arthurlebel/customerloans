<h1>Login</h1>
<?php $this->extend('../Layout/TwitterBootstrap/signin');?>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
