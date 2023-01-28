<?php

class ProcessVRLTrackingHtml
{
    public function populateHtml($data)
    {
        $data = json_decode($data);
        error_log($data->Status);
        return $data;
    }
}
