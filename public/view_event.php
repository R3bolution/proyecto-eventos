<?php
include '../views/header.php';

$entradas = $resultado['total_tickets'] - $resultado['tickets_sold'];
$nombre=$resultado['name'];

?>
<div class='evento-detalle'>
    <div class="info">
        <h2><?php echo $nombre; ?></h2>
        <p><?php echo $resultado['description']; ?></p>
        <p><b>Fecha:</b> <?php echo $resultado['event_date']; ?></p>
        <p><b>Precio:</b> <?php echo $resultado['ticket_price']; ?>€</p>
        <p><b>Entradas Disponibles:</b> <?php echo $entradas; ?></p>
    </div>
    
    <div class="reserver">
        <h3>Reservar</h3>
        <form action="controler_event.php?evento=<?php echo $resultado['id']?>" method="post">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" <?php if (isset($name)) echo 'value="'.$name.'"'?>>
            <span class="error"><?php if (isset($errores['name'])) echo $errores['name']?></span>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" <?php if (isset($email)) echo 'value="'.$email.'"'?>>
            <span class="error"><?php if (isset($errores['email'])) echo $errores['email']?></span>

            <label for="tickets">Entradas:</label>
            <input type="text" name="tickets" id="tickets" <?php if (isset($tickets)) echo 'value="'.$tickets.'"'?>>
            <span class="error"><?php if (isset($errores['tickets'])) echo $errores['tickets']?></span>

            <input type="submit" value="Reservar" name="reservar">
        </form>
    </div>
</div>
<?php
include '../views/footer.php';
?>


