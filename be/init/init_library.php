<?php
//in total 331 libraries.  will be import for initializaion
// to token needed for this api

require_once(__DIR__ . "/../tools/curl.php");
require_once(__DIR__ . "/../tools/constants.php");
require_once(__DIR__ . "/../bneart/artistocialModel.php");
require_once(__DIR__ . "/../model/artistocialLibrary.php");

global $qld_api_url_library;

$result = json_decode(cGet($qld_api_url_library));

$artistocial = new Artistocial();

if ($result->success == true) {
    $records = $result->result->records;
    foreach ($records as $k => $v) {
        $model = new ArtistocialLibrary();
        $model->resourceId = $v->_id;
        $library = $artistocial->getLibrary($model->resourceId);
        if (!is_null($library)) {
            echo $model->resourceId . " exist , skip...<br/>";
            continue;
        } else {
            echo $model->resourceId . " not exist , inserting...<br/>";
        }

        $model->name = $v->{"Branch Name"};
        $model->type = $v->{"Branch Type"};
        $model->serviceName = $v->{'Name of Library Service'};
        $model->serviceType = $v->{'Library Service Type'};
        $model->wifi = $v->{'WiFi Availability'};
        $model->address1 = $v->{'Address Line 1'};
        $model->address2 = $v->{'Address Line 2'};
        $model->locality = $v->{'Address Locality'};
        $model->postcode = $v->{'Address Postcode'};
        $model->phone = $v->{'Phone'};
        $model->mobile = $v->{'Mobile'};
        $model->email = $v->{'Email'};
        $model->managerTitle = $v->{'Branch Manager Title'};
        $model->managerName = $v->{'Branch Manager Name'};
        $model->managerPhone = $v->{'Branch Manager Phone'};
        $model->managerEmail = $v->{'Branch Manager Email'};
        $model->dateCreated = $v->{'Date Created'};
        $model->dateUpdated = $v->{'Date Last Updated'};
        $model->latitude = $v->{'Latitude (Decimal)'};
        $model->longitude = $v->{'Longitude (Decimal)'};
        $model->directoryUrl = $v->{'Directory URL'};
        $model->monday = $v->{'Monday'};
        $model->tuesday = $v->{'Tuesday'};
        $model->wednesday = $v->{'Wednesday'};
        $model->thursday = $v->{'Thursday'};
        $model->friday = $v->{'Friday'};
        $model->saturday = $v->{'Saturday'};
        $model->sunday = $v->{'Sunday'};
        $artistocial->saveLibrary($model);

        echo "saved one Library";
    }
}
