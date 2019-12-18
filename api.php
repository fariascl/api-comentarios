<?php
/*
API de comentarios aleatorios para Radio Bio Bio y Cooperativa
*/
header("Content-Type:application/json");

if (isset($_GET['id']) && $_GET['id'] !=""){
  include('db.php');
  $comment_id = $_GET['id'];
  $query = "SELECT * FROM `comentarios` WHERE id = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param('i', $comment_id);
  $stmt->execute();
  $resultado = $stmt->get_result();
  $row = $resultado->fetch_row();
  $i = True;
  if (!is_null($row)){
    while ($i == True){
      //echo count($row);
      //echo strlen($stmt->get_result());
      $id = utf8_encode($row[0]);
      $comentario = utf8_encode($row[1]);
      $r_code = utf8_encode($row[2]);
      $i = False;
    }
    $stmt->close();
    response($id, $comentario, $r_code);
  }
  else{
    response(NULL, NULL, 200);
  }
}
else {
  response(NULL, NULL, 400);
}

function response($comment_id, $comentario, $r_code){
  $response['id'] = $comment_id;
  $response['comentario'] = $comentario;
  $response['response_code'] = $r_code;

  $json_response = json_encode($response);
  echo $json_response;
}
?>
