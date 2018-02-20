<?php 

$json_file = file_get_contents('todo.json');
$data = json_decode($json_file, true); 


/*AJOUT DES TACHES DANS TODO.JSON*/
	
if(isset($_POST["tache"])) {
		$tache = htmlspecialchars($_POST["tache"]);
		$data["todo"][] = $tache;
		$encodage_tableau = json_encode($data, JSON_FORCE_OBJECT);
		file_put_contents('todo.json' , $encodage_tableau);
		}


/* ARCHIVE*/

	if (isset($_POST['case'])){
		$archives = $_POST['case'];
		foreach ($archives as $key => $value) {
			$data["archives"][] = $value;
		}
        
		$data["todo"] = array_diff( $data["todo"] , $archives);			
		$encodage_tableau = json_encode($data, JSON_FORCE_OBJECT);
		file_put_contents('todo.json' , $encodage_tableau); 
	}
/*BTN RESET*/
if(isset($_POST['reset'])) {
file_put_contents('todo.json', "");
}

?>
<!DOCTYPE html>
<html>
  <head>
  	<title>To-do list</title>
  	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
  </head>
<body>
    <h1>To-do list</h1>
    <section>
        
		<form method="POST">
			<input type="text" name="tache" placeholder="Nouvelle tache" maxlength="50" required>
			<input type="submit" value="Ajouter" id="btnAjout">
		</form>
       
    </section>
    

    <?php include 'contenu.php'; ?>
    <section id="btnReset">
       <form method="POST">
            <input type="submit" name="reset" value="Réinitialiser" class="submit" >
        </form>
    </section>

<script src="d&d.js"></script>
</body>
</html>