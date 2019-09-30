<div id="myModal_groupe" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar"><i class="material-icons">&#xE7FD;</i></div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="index.php?action=create_groupe&user_name=<?= $user_name ?>&id=<?= $id ?>" method="POST">
						<span class="titre">Créer un groupe</span><br/><br/><br/>
						<span class="fichier">Nom du groupe :</span>
							<input type="text"  name="name_new_groupe" required/><br /><br />

						<div class="form-group">
							<span class="test"><input type="submit" class="btn btn-primary btn-block btn-lg" name="créer_groupe" value="Créer le groupe"/></span>
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