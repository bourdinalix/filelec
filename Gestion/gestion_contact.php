<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;

  $error = "";
  $success = "";

  if(isset($_POST['envoyer-contact'])){

    if(isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['message'])){
      $mail = htmlentities($_POST['email']);
      $name = htmlentities($_POST['prenom']);
      $lastName = htmlentities($_POST['nom']);
      $content = htmlentities($_POST['message']);
      $entreprise = "";
  
      if(empty($_POST['entreprise'])){
          $entreprise = "Particulier";
      }else{
          $entreprise = htmlentities($_POST['entreprise']);
      }
  
      $mj = new \Mailjet\Client('53f5ecef877e01c3e2cf521481f77969','e35a0318572061f4c0a8502fe96c3282',true,['version' => 'v3.1']);
      $body = [
        'Messages' => [
          [
            'From' => [
              'Email' => "j.elbaze2021bts@gmail.com",
              'Name' => $name . " " . $lastName
            ],
            'To' => [
              [
                'Email' => "j.elbaze2021bts@gmail.com",
                'Name' => "Jeremy"
              ]
            ],
            'Subject' => "Formulaire de contact Filelec" ,
            'TextPart' => $mail,
            'HTMLPart' => "<h3> Demande de : $name $lastName  ($entreprise) </h3> <br> $content </br> <br> $mail </br>",
            'CustomID' => "AppGettingStartedTest"
          ]
        ]
      ];
      $response = $mj->post(Resources::$Email, ['body' => $body]);
      $response->success();

      $success = "Votre message a bien été envoyé !";
    }else{
      $error = "Veuillez remplir tous les champs munis d'une astérix";
    }

  }


  require_once("Views/view_contact.php");
?>