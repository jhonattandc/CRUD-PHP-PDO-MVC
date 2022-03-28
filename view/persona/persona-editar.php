<h1 class="page-header">
    <?php echo $per->idpersona != null ? $per->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Personas</a></li>
  <li class="active"><?php echo $per->idpersona != null ? $per->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-persona" action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID" value="<?php echo $per->idpersona; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $per->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $per->apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:4" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="email" name="Correo" value="<?php echo $per->correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="Telefono" value="<?php echo $per->telefono; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input readonly type="date" name="FechaN" value="<?php echo $per->fechan; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-persona").submit(function(){
            return $(this).validate();
        });
    })
</script>