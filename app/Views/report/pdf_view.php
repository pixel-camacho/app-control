<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de inventario ADG</title>
</head>
<style>
    table{
        width: 100%;
        margin: 0 auto;
    }
    caption{
        margin-top: 12px;
    }
    th{
        background: #65bc7b;
        color: white;
        font-weight: 600;
        padding: 12px;
        font-size: 17px;
        border-radius: 3px;
    }
    td{
        padding: 5px;
        background: #ededed;
        color: #3d3d3d;
        font-size: 14px;
    }
    .total{
        text-align: center;
    }
</style>
<body>

<table >
    <caption style="font-size: 22px;font-weight:bold;">Catalogo de <?= $catalogo ?></caption>
    <thead>
        <tr>
            <th>#</th>
            <?php if(isset($equipos[0]->pieza)):?>
            <th>Pieza</th>
            <?php endif; ?>

            <?php if(isset($equipos[0]->descripcion)):?>
            <th>Descripcion</th>
            <?php endif; ?>

            <?php if(isset($equipos[0]->pieza) || isset($equipos[0]->descripcion)):?>
            <th colspan="2" >multifuncional</th>
            <?php endif; ?>

            <?php if(isset($equipos[0]->serie)):?>
            <th>Marca</th>
            <th>Modelo</th>
            <?php endif; ?>

            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php $total_elementos = 0;
              foreach($equipos as $index =>  $equipo): ?>
        <tr>
            <td><?= $index ?></td>

            <?php if(isset($equipo->pieza)): ?>
            <td><?= $equipo->pieza ?></td>
            <?php endif; ?>

            <?php if(isset($equipo->descripcion)): ?>
            <td><?= $equipo->descripcion ?></td>
            <?php endif; ?>

            <?php  if(isset($equipo->pieza) || isset($equipo->descripcion)): ?>
                <td colspan="2"><?php  echo  $equipo->marca.' '.$equipo->modelo ?></td>
            <?php endif; ?>

            <?php  if(isset($equipo->serie)): ?>
            <td><?= $equipo->marca ?></td>
            <td><?= $equipo->modelo ?></td>
            <?php endif; ?>

            <td><?= $equipo->cantidad ?></td>
            <?php $total_elementos += (int)$equipo->cantidad; ?>
        </tr>
        <?php endforeach; ?>
    
        <td class="total" colspan="2">TOTAL:</td>
        <td class="total"><?= $total_elementos ?></td>

    </tbody>
</table>
    
</body>
</html>