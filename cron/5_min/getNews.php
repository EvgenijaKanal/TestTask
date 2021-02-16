<?php
use App\Action\GetNewsAction;

/** @var GetNewsAction $getNewAction */
$getNewAction = app()->make(GetNewsAction::class);
$getNewAction->fire();
