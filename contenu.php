<h2>A faire</h2>
 <section id="aFaire">
 	<form method="post">
    <ul id="columns">
		<?php 
			if (isset($data["todo"])) {
				foreach ($data["todo"] as $key => $value) {
					?>
					
					<li class="column" draggable="true"><img src="img/menu.svg" alt="" id="ddBtn"><input type="checkbox" name="case[]" value="<?=$value?>"><label for="case"><?=$value?></label></li>
					<?php
				}
                
			}
        
		?>
		</ul>
		<input type="submit" value="Enregistrer" id="btnArchive">
	</form>
</section>

<h2>Archive</h2>
<section id="archive">
	<?php 
			if (isset($data["archives"])) {
				foreach ($data["archives"] as $key => $value) {
					?>
					<p><?=$value?></p>
					<?php
				}
			}
	 ?> 
</section>
