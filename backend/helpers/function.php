<?php

function returnErrorMessage($errorMessage) {
    echo json_encode([
        'status' => 'error',
        'message' => $errorMessage,
    ]);
    exit();
}

function returnSuccessMessage($errorMessage) {
    echo json_encode([
        'status' => 'success',
        'message' => $errorMessage,
    ]);
    exit();
}
