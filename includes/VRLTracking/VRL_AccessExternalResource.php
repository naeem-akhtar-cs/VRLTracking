<?php

class VRL_AccessExternalResource
{
    public function getVRLTracking($cosignmentNo)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://www.vrlgroup.in/track_consignment.aspx?lrtrack=1&lrno={$cosignmentNo}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array(
                    'Accept: */*',
                    'Accept-Language: en-US,en;q=0.9,ur;q=0.8',
                    'Connection: keep-alive',
                    'Content-Length: 0',
                    'Origin: http://www.vrlgroup.in',
                    'Referer: http://www.vrlgroup.in/track_consignment.aspx',
                    'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                    'X-Requested-With: XMLHttpRequest',
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            return $response;
        } catch (\Throwable$th) {
            throw new Exception($th);
        }
    }
}
