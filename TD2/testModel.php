<?php
    require_once "Model.php";

    $model = new Model();

    echo $model->getPdo()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    $requete = 'SELECT * FROM voiture';

    $sql = $model->getPdo()->query($requete);

    $rows = $sql->fetch();

    print_r($rows);
?>