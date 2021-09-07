<!-- Modal HTML Ajouter un fichier-->
<div id="myModal_pdp" class="modal fade">
	
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
				<div class="modal-body">
					<form action="index.php?action=ajouter_pdp&user_name=<?= $user_name ?>&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
						<span class="titre">Ajouter ici votre image</span><br/><br/><br/>
						<span class="fichier">Image :</span>
							<input type="file"  name="image" required/><br /><br />

						<div class="form-group" id="t">
							<input type="submit" class="btn btn-primary btn-block btn-lg" name="envoyer_fichier" value="Ajouter"/>
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