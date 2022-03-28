<h1 class="page-header">Lista de Personas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Persona&a=Crud">Nuevo registro</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r) : 
        $pers = $this->model->registro($r);
        ?>
        <tr>
            <td><?php echo $pers -> nombre; ?></td>
            <td><?php echo $pers -> apellido; ?></td>
            <td><?php echo $pers -> correo; ?></td>
            <td><?php echo $pers -> telefono; ?></td>
            <td><?php echo $pers -> fechan; ?></td>
            <td>
                <a href="?c=Persona&a=Crud&ID=<?php echo $r->ID; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Persona&a=Eliminar&ID=<?php echo $r->ID; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 