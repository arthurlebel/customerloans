<?php
/**
 * @var \App\Model\Entity\Contract $contract
 */
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;
   use Cake\Utility\Text;

   class EmailsController extends AppController{
      public function index(){
          $uuid = Text::uuid();
         $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $uuid;
         $email = new Email('default');
         $email->to('lolxdmdre@yopmail.com')->subject("Vérification de l'utilisateur")->send($confirmation_link);
      }
   }
?>

