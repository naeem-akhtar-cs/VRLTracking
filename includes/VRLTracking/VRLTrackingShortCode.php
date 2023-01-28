<?php

function VRLTrackingShortCode()
{
    ob_start();
    include __DIR__ . './../../public/partials/VRLTrackingShortCode.html';
    return ob_get_clean();
}
