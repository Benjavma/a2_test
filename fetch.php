<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM members';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['id']; ?></td>
	    		<td><?php echo $row['firstname']; ?></td>
	    		<td><?php echo $row['lastname']; ?></td>
	    		<td><?php echo $row['dates']; ?></td>
	    		<td>
	    			<button class="btn btn-success btn-sm edit" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button>
	    			<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>