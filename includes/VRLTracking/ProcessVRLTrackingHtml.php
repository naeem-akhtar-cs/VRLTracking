<?php

class ProcessVRLTrackingHtml
{
    public function populateHtml($data, $showTransit)
    {
        $data = json_decode($data);

        $transitData = $data->TsDetails;

        if ($data->Status == 'Fail') {
            return "<div>No record found.</div>";
        }

        $transitDetails = "";
        if ($showTransit == 1) {
            $transitRows = "";
            for ($i = 0; $i < count($transitData); $i++) {

                $from = $transitData[$i]->loadedfrom;
                $to = $transitData[$i]->loadedto;
                $date = $transitData[$i]->loaddate;

                $transitRows .= "<tr><td>{$from}</td><td>{$to}</td><td>{$date}</td></tr>";
            }

            $transitDetails .= "<div>
                <h4>Transit Details</h4>
                <table>
                <tr>
                <td>From</td>
                <td>To</td>
                <td>Date</td>
                <tr>
                {$transitRows}
                </table>
                </div>
                <hr>";
        }

        $status = $data->LrStatus;
        $bookingDate = $data->BookingDetails[0]->bkdate;
        $from = $data->BookingDetails[0]->bookingfrom;
        $to = $data->BookingDetails[0]->destinationcity;
        $packages = $data->BookingDetails[0]->noa;
        $type = $data->BookingDetails[0]->lrno[0] == '9' ? 'Door Delivery' : 'Office / Godown Delivery';

        $cosigAt = $data->DeliveryDetails[0]->dlyat;
        $reachedDate = $data->DeliveryDetails[0]->intsdate;
        $deliveryStatus = $data->DeliveryDetails[0]->dlystatus;
        $date = $data->DeliveryDetails[0]->crdate;

        $trackingView = "

        <div>

        <h3>Status: {$status}</h3>
        <hr>
        <div>
        <h4>Booking Details</h4>
        <table>
        <tr>
        <td>Booking Date</td>
        <td>From</td>
        <td>To</td>
        <td>Packages</td>
        <td>Delivery Type</td>
        </tr>
        <tr>
        <td>{$bookingDate}</td>
        <td>{$from}</td>
        <td>{$to}</td>
        <td>{$packages}</td>
        <td>{$type}</td>
        </tr>
        </table>
        </div>
        <hr>
        <div>
        <h4>Delivery Details</h4>
        <table>
        <tr>
        <td>Consignment At</td>
        <td>Reached Date</td>
        <td>Delivery Status</td>
        <td>Date</td>
        </tr>
        <tr>
        <td>{$cosigAt}</td>
        <td>{$reachedDate}</td>
        <td>{$deliveryStatus}</td>
        <td>{$date}</td>
        </tr>
        </table>
        </div>
        <hr>

        {$transitDetails}

        </div>

        ";
        return $trackingView;
    }
}
