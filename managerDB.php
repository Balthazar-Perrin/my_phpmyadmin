<?php

function fetchFromDB($pdo, $query, $params) {
    $stmt = $pdo->prepare($query);
    if ($params != null) {
        $stmt->execute($params);
    } else $stmt->execute();
    $data = $stmt->fetch();
    return ($data);
}

function fetchAllFromDB($pdo, $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return ($data);
}




?>