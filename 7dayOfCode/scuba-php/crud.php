<?php


function crud_create($user){
    if(!empty($user) && $_GET['page']=='register') {
        $data = json_decode(file_get_contents(DATA_LOCATION));
        $data[] = $user;
        file_put_contents(DATA_LOCATION, json_encode($data));
    }
}
