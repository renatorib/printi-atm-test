<?php
use \ATM\Components\Cash;

/**
 * "/api" endpoint
 * $this is instance of Klein\Klein
 */

$this->get('/calculate/[*:value]', function($request, $response){
    $response->header('Content-Type', 'application/json');
    $notes = Cash::getMinNotes((int)$request->value);
    exit(json_encode($notes, true));
});
