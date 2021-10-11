<?php
// URL ВЕБ-ХУКА + /crm.lead.add.json
$url = "https://doctor61.bitrix24.ru/rest/11651/etlmckv6748c6gx0/crm.lead.add.json";

// POST processing
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $leadData = $_POST;

    // Terminate excecution if f_cup field is not empty
    if ($leadData['f_cap'] != ""){
         exit();
    }
    
    $more = '';
    if (isset($leadData['f_who'])){
        $more .= 'Хочет вылечить ' . $leadData['f_who'];
    }
    if (isset($leadData['f_disease'])){
        $more .= ' от ' . $leadData['f_disease'];
    }
    if (isset($leadData['f_where'])){
        $more .= '. в городе: ' . $leadData['f_where'];
    } 

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Accept: application/json",
       "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $fields = array('FIELDS' => array(
        "TITLE" => "Pro-Medicine.com форма обратной связи",
        "CITY" => $leadData['f_where'],
        "NAME" => $leadData['f_name'],
        "UF_CRM_1627301177" => "OM2",
        "SOURCE_DESCRIPTION" => $more,   
        "PHONE" => array(array("VALUE" => $leadData['f_phone'], "VALUE_TYPE" =>  "work"))
        ));
 
    $data = json_encode($fields);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    var_dump($resp);
} 
else { $resp = ''; }
return $resp;
