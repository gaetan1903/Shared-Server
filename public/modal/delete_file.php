<div id="myModal_supprimer" class="modal fade">
	
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="supprimer_file.php" method="POST">
					<span class="titre">Supprimer un fichier</span><br/><br/><br/>
					<span class="fichier">Nom du fichier :</span>
						<input type="text"  name="fichier_a_suppr" required/><br /><br />
					
					<div class="form-group">
					<span class="fichier">Nom du propriétaire :</span>
					<input type="text"  name="name_prop" required/><br /><br />
					<span class="fichier">Groupe du fichier :</span>
					<input type="text"  name="groupe_file" required/><br /><br />
					</div>
					<div class="form-group" id="t">
						<input type="submit" class="btn btn-primary btn-block btn-lg" name="supprimer" value="Supprimer le fichier"/>
					</div>
					<?php
					if(isset($erreur))
					{
						echo '<font color="red">'.$erreur."</font>";
					}
					?>
				</form>				

			</div>
		</div>
	</div>
</div>