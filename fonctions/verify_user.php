<?php

 function verify_user($pdo, $username, $password){

    $resultatTraite = [
        "result" => false,
        "data" => [],
        "infos" => "?"
    ];
    
    $hash_password = sha1($password);
    $sql = $pdo->prepare("SELECT user_id, nom, prenom, username, matricule, user_password, user_role FROM utilisateurs WHERE username = :username AND user_password = :password_user");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':password_user', $hash_password);
    try {
        $sql->execute();
    } catch (\Throwable $th) {
        $resultatTraite['infos'] = $th->getMessage();
        return $resultatTraite;
    }


  if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

    $resultatTraite['result'] = true;

    $resultatTraite['infos'] = "Connecté avec succès";
    $resultatTraite['is_auth'] = true;
    $userInfo = ["user_id" => $row['user_id'], "nom" => $row['nom'], "matricule" => $row['matricule'], "user_password" => $row['user_password'], "user_role" => $row['user_role']];
    $encode_userInfo = $userInfo;


    $resultatTraite['data'] = [
      "user" => $userInfo,
      //"duree" => $d,
      "token" => encodeToken($encode_userInfo),
    ];
  }else {
    # code...
    $resultatTraite['infos'] = "Informations incorrectes, veuillez réessayer";
    return $resultatTraite;
  }
  return $resultatTraite;
 }




?>