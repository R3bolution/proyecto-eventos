<?php
include '../views/header.php';
?>

<h2>Eventos disponibles</h2>

<?php
    if (empty($resultado)) {
        echo '<h4>No hay eventos disponibles</h4>';
    }
    foreach ($resultado as $value) {
        $date=substr($value['event_date'],0,10);
        echo '<div class="evento">';
        echo "<a href='controler_event.php?evento=".$value['id']."'>";
        echo '<h3>'.$value['name'].'</h3>';
        echo '<p>'.$value['description'].'</p>';
        echo '<p>'.$date.'</p>';
        echo '<p>'.$value['ticket_price'].'€</p>';
        echo "</a>";
        echo '</div>';
    }
?>



<?php
include '../views/footer.php';
?>


