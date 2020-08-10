<?php

function cadCorretor($corretor) {
    $database = open_database();
    $rows = null;

    try {
        $sql = "INSERT INTO cad_corretor(nome, cpf, creci) VALUES ('".$corretor['txt-nome-corretor']."','".$corretor['txt-cpf-corretor']."','".$corretor['txt-creci-corretor']."')";

        $database->query($sql);

      } catch (Exception $e) {
        return -1;
    }

    close_database($database);
	return $rows;

}

function updateCorretor($corretor) {
    $database = open_database();
    $rows = null;

    try {
        $sql = "UPDATE cad_corretor SET 
            nome = '".$corretor['txt-nome-corretor']."',  
            cpf = '".$corretor['txt-cpf-corretor']."',  
            creci = '".$corretor['txt-creci-corretor']."'
        WHERE id = '".$corretor['id-corretor']."' ";

        $database->query($sql);

      } catch (Exception $e) {
        return -1;
    }

    close_database($database);
	return $rows;

}

function deleteCorretor($id) {
    $database = open_database();
    $rows = null;

    try {
        $sql = "DELETE FROM cad_corretor
        WHERE id =".$id;

        $database->query($sql);

      } catch (Exception $e) {
        return -1;
    }

    close_database($database);
	return $rows;

}

function findCorretor( $id = null ) {
  
	$database = open_database();
	$rows = null;

	try {
	  if ($id) {
	    $sql = "SELECT * FROM cad_corretor WHERE id = " . $id;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $rows = $result->fetch_assoc();
	    }
	    
	  } else {	    
	    $sql = "SELECT * FROM cad_corretor";
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $rows = $result->fetch_all(MYSQLI_ASSOC);
	    } else {
            $rows = -1;
        }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
  }
	
	close_database($database);
	return $rows;
}

?>