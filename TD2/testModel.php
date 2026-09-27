<?php
    require_once "Model.php";

    $model = new Model();

    echo $model->getPdo()->getAttribute(PDO::ATTR_CONNECTION_STATUS);
?>