<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loan Types'), ['controller' => 'LoanTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Interest Rates'), ['controller' => 'InterestRates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts index large-9 medium-8 columns content">
    <h3><?= __('About') ?></h3>
    <p>Arthur Lebel</p>
    <p>420-5b7 MO Applications internet <br />
       Automne 2018, Collège Montmorency</p>
    <p>Bouton "Home" pour aller à la page d'accueil. Bouton login pour se connecter à un compte. Boutons pour les langues et le À propos.</p>
    <p>Ajouter un contrat en tant qu'admin. Afficher la liste des utilisateurs. Créer un nouvel utilisateur. Afficher la liste des types de prêts.
    Afficher la lsite des taux d'intérêt. Afficher la liste des paiements et ajouter un paiement.</p>
    <p>On peut modifier les contrats en tant qu'admin et les supprimer. L'admin peut gérer les utilisateurs. Il peut aussi gérer les types de prêts et les paiements. Par contre, il y a 
    des erreurs d'authorisations pour certaines actions. La traduction avec les 3 langues est fonctionnel, mais pas avec les données de la base de données.</p>
    <p>Il y a plusieurs fonctionnements du site qui ne sont pas bien fonctionnels. Par exemple, les courriels n'envoient pas le bon UUID pour confirmer l'utilisateur.
        De plus, la liste des actions ne change pas en fonction du compte qui est connecté. N'importe qui peut créer un compte "admin", ce qui ne devrait pas être le cas. Aussi, le
        téléversement d'images n'est pas fait. En principe, le Collecteur (super-utilisateur) devrait pouvoir ajouter une image aux contrats qui lui appartiennent. Pour finir,
        le lien avec SQLite n'est pas fait non plus.<p>
    <p><a href="http://www.databaseanswers.org/data_models/loan_management/index.htm" />Lien vers la base de données originale</a></p>
         
</div>
