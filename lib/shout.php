<?php
try {
    global $pdo;
    if ($_POST['shoutbox']) {
        $name = $_POST['name'];
        $message = $_POST['message'];
        /*** set all errors to execptions ***/

        $stmt = $pdo->prepare("INSERT INTO shoutbox (date_time, name, message) VALUES (NOW(), :name, :message");
        /*** prepare the statement ***/

        /*** bind the params ***/
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        /*** run the sql statement ***/
        if ($stmt->execute()) {
            populate_shoutbox();
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_POST['refresh']) {
    populate_shoutbox();
}
function populate_shoutbox()
{
    global $pdo;
    $sql = $pdo->prepare("select * from shoutbox order by date_time desc limit 10");
    echo '<ul>';
    foreach ($pdo->query($sql) as $row) {
        echo '<li>';
        echo '<span class="date">' . date("d.m.Y H:i", strtotime($row['date_time'])) . '</span>';
        echo '<span class="name">' . $row['name'] . '</span>';
        echo '<span class="message">' . $row['message'] . '</span>';
        echo '</li>';
    }
    echo '</ul>';
}

?>