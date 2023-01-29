<?php

require_once __DIR__ . '/VRL_AccessExternalResource.php';
require_once __DIR__ . '/ProcessVRLTrackingHtml.php';

function getVRLTracking($request)
{
    try {
        $trackingData = $request['trackingData'];
        $trackingData = json_decode(base64_decode($trackingData));
        $cosignmentNo = $trackingData->cosignmentNo;
        $showTransit = $trackingData->showTransit;

        $accessExternalResource = new VRL_AccessExternalResource();
        $response = $accessExternalResource->getVRLTracking($cosignmentNo);
        $processVRLTrackingHtml = new ProcessVRLTrackingHtml();
        $trackingView = $processVRLTrackingHtml->populateHtml($response, $showTransit);
        return base64_encode($trackingView);
    } catch (\Throwable$th) {
        return base64_encode("Error. Please check your cosignment no.");
    }
}
