<div class="cuerpo">
	<button class="bestBtn" onclick="openModal('popRegistro')">Agregar nuevo</button>
	<button class="bestBtn" onclick="changePers('personasActivas')">Personas Activas</button>
	<button class="bestBtn" onclick="changePers('personasInctivas')">Personas Inctivas</button>
	<div class="table100 ver6 m-b-110">
		<table data-vertable="ver6" class="listaPersonas" style="display:block" id="personasActivas">
			<thead>
				<tr class="row100 head">
					<th class="column100 column1" data-column="column1">Id</th>
					<th class="column100 column2" data-column="column2">Nombres</th>
					<th class="column100 column3" data-column="column3">Apellidos</th>
					<th class="column100 column4" data-column="column4">Documento</th>
					<th class="column100 column5" data-column="column5">Email</th>
					<th class="column100 column6" data-column="column6">Rol</th>
					<th class="column100 column7" data-column="column7">Estado</th>
					<th class="column100 column7" data-column="column7">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($pers_datos as $pers_dato) { 
				if($pers_dato['pers_estado'] == 1):
				?>
				<tr class="row100">
					<td class="column100 column1" data-column="column1"><?php echo $pers_dato["pers_id"] ?></td>
					<td class="column100 column2" data-column="column2"><?php echo $pers_dato["pers_nombres"] ?></td>
					<td class="column100 column3" data-column="column3"><?php echo $pers_dato["pers_apellidos"] ?></td>
					<td class="column100 column4" data-column="column4"><?php echo $pers_dato["pers_documento"] ?></td>
					<td class="column100 column5" data-column="column5"><?php echo $pers_dato["pers_email"] ?></td>
					<td class="column100 column6" data-column="column6"><?php echo $pers_dato["rol_desc"] ?></td>
					<td class="column100 column7" data-column="column7"><?php if($pers_dato["pers_estado"] == 1){echo "Activo";}else{echo "Inactivo";} ?></td>
					<td class="column100 column7" data-column="column7">
						<span onclick="openModal('editar',`<?php echo $pers_dato['pers_id'] ?>`)" style="cursor:pointer;color:#009acf;background:rgba(255,255,255,.6);display:block;font-weight:900;padding:5px;">Editar</span>
						<span onclick="changeRegister(`<?php echo $pers_dato['pers_id'] ?>`,'borrar')" style="cursor:pointer;color:red;background:rgba(255,255,255,.6);display:block;font-weight:900;padding:5px;">Borrar</span></td>
				</tr>
			<?php 
				endif;
			} ?>
			</tbody>
		</table>
		<table data-vertable="ver6" class="listaPersonas" style="display:none" id="personasInctivas">
			<thead>
				<tr class="row100 head">
					<th class="column100 column1" data-column="column1">Id</th>
					<th class="column100 column2" data-column="column2">Nombres</th>
					<th class="column100 column3" data-column="column3">Apellidos</th>
					<th class="column100 column4" data-column="column4">Documento</th>
					<th class="column100 column5" data-column="column5">Email</th>
					<th class="column100 column6" data-column="column6">Rol</th>
					<th class="column100 column7" data-column="column7">Estado</th>
					<th class="column100 column7" data-column="column7">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($pers_datos as $pers_dato) { 
				if($pers_dato['pers_estado'] == 0):
				?>
				<tr class="row100">
					<td class="column100 column1" data-column="column1"><?php echo $pers_dato["pers_id"] ?></td>
					<td class="column100 column2" data-column="column2"><?php echo $pers_dato["pers_nombres"] ?></td>
					<td class="column100 column3" data-column="column3"><?php echo $pers_dato["pers_apellidos"] ?></td>
					<td class="column100 column4" data-column="column4"><?php echo $pers_dato["pers_documento"] ?></td>
					<td class="column100 column5" data-column="column5"><?php echo $pers_dato["pers_email"] ?></td>
					<td class="column100 column6" data-column="column6"><?php echo $pers_dato["rol_desc"] ?></td>
					<td class="column100 column7" data-column="column7"><?php if($pers_dato["pers_estado"] == 1){echo "Activo";}else{echo "Inactivo";} ?></td>
					<td class="column100 column7" data-column="column7">
						<span onclick="openModal('editar','<?php echo $pers_dato["pers_id"] ?>')" style="cursor:pointer;color:#009acf;background:rgba(255,255,255,.6);display:block;font-weight:900;padding:5px;">Editar</span>
						<span onclick="changeRegister('<?php echo $pers_dato["pers_id"] ?>','activar')" style="cursor:pointer;color:green;background:rgba(255,255,255,.6);display:block;font-weight:900;padding:5px;">Activar</span></td>
				</tr>
			<?php 
				endif;
			} ?>
			</tbody>
		</table>
	</div>
	<div class="popUp" id="popRegistro">
		<div class="popLayer" onclick="closeModal('popRegistro')"></div>
		<form class="formGeneral" action="<?php echo URL_PBL; ?>/controlador/persona_controller.php" method="post">
			<h3>Registra un usuario</h3><br>
			<input type="hidden" name="action" value="registro">
			<label>Ingresar nombres<br>
				<input type="text" name="nombres"></label>
			<label>Ingresar apellidos<br>
				<input type="text" name="apellidos"></label>
			<label>Ingresar documento<br>
				<input type="tel" name="documento"></label>
			<label>Ingresar email<br>
				<input type="email" name="email"></label>
			<label>Ingresar Rol</label>
				<select name="rol" id="roles">
					<option value="0">Administrador</option>
					<option value="1">Empleado</option>
					<option value="2">usuario</option>
				</select>
			<label>Ingresar contraseña<br>
				<input type="password" name="password"></label>
			<br>
			<input type="submit" value="Registrar">
		</form>
	</div>

	<div class="popUp" id="editar">
		<div class="popLayer" onclick="closeModal('editar')"></div>
		<form class="formGeneral" action="<?php echo URL_PBL; ?>/controlador/persona_controller.php" method="post">
			<h3>Registra un usuario</h3><br>
			<input type="hidden" name="action" value="editar">
			<input type="hidden" name="pers_id" id="pers_id">
			<label>Ingresar nombres<br>
				<input type="text" name="nombres" id="nombres"></label>
			<label>Ingresar apellidos<br>
				<input type="text" name="apellidos" id="apellidos"></label>
			<label>Ingresar documento<br>
				<input type="tel" name="documento" id="documento"></label>
			<label>Ingresar email<br>
				<input type="email" name="email" id="email"></label>
			<br>
			<input type="submit" value="Actualizar">
		</form>
	</div>
</div>
<script>
	function openModal(nombreModal,id){
		document.getElementById(nombreModal).style.display = "block";
		if(id !== null){
			console.log(id);
			jQuery.ajax({
				data: {action:"consulta", pers_id: id},
				url: "<?php echo URL_PBL; ?>/controlador/persona_controller.php",
				type: "post",
				beforeSend: function(){
					console.log("Preparando...");
				},
				success: function(data){
					document.getElementById('pers_id').value = JSON.parse(data)[0].pers_id;
					document.getElementById('nombres').value = JSON.parse(data)[0].pers_nombres;
					document.getElementById('apellidos').value = JSON.parse(data)[0].pers_apellidos;
					document.getElementById('documento').value = JSON.parse(data)[0].pers_documento;
					document.getElementById('email').value = JSON.parse(data)[0].pers_email;
				}
			});
		}
	}
	function closeModal(nombreModal){
		document.getElementById(nombreModal).style.display ="none";
	}
	function changeRegister(id, accion){
		jQuery.ajax({
				data: {action:accion, pers_id: id},
				url: "<?php echo URL_PBL; ?>/controlador/persona_controller.php",
				type: "post",
				beforeSend: function(){
					console.log("Preparando...");
				},
				success: function(data){
					alert("Se ha ejecutado la acción "+ accion+ " a la persona con el id "+data);
					location.reload();
				}
			});
	}
	function changePers(personas){
		jQuery('.listaPersonas').hide();
		jQuery('#'+personas).show();
	}
</script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>