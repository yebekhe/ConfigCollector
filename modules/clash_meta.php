<?php

function meta_xray($input){
    $meta_array = [];
    $meta_array['name'] = $input['hash'];
    $meta_array['type'] = $input['protocol'];
    $meta_array['server'] = $input['hostname'];
    $meta_array['port'] = $input['port'];
    if ($meta_array['type'] === "vless"){
        $meta_array['uuid'] = $input['username'];
    } else {
        $meta_array['password'] = $input['username'];
    }
    
    $meta_array['network'] = $input['params']['type'];
    if (isset($input['params']['pbk']) or $input['params']['type'] === "ws"){
        $meta_array['tls'] = "true";
        $meta_array['udp'] = "true";
    } elseif ($meta_array['type'] === "trojan"){
        $meta_array['udp'] = "true";
    }
    
    if (isset($input['params']['flow'])){
        $meta_array['flow'] = $input['params']['flow'];
    } elseif ($input['params']['type'] === "tcp" and $meta_array['type'] === "vless"){
        $meta_array['flow'] = "xtls-rprx-vision";
    } elseif ($input['params']['type'] === "grpc" and $meta_array['type'] === "vless"){
        $meta_array['flow'] = "";
        $meta_array['grpc-opts']['grpc-service-name'] = $input['params']['serviceName'];
    } elseif ($input['params']['type'] === "ws"){
        $meta_array['ws-opts']['path'] = $input['params']['path'];
        $meta_array['ws-opts']['headers']['Host'] = $input['params']['host'];
    }
    
    if (isset($input['params']['sni'])){
        $meta_array['servername'] = $input['params']['sni'];
    } elseif (isset($input['params']['host'])){
        $meta_array['servername'] = $input['params']['host'];
    } else{
        $meta_array['servername'] = $input['params']['hostname'];
    }
    
    if (isset($input['params']['alpn']) and $meta_array['type'] === "trojan"){
        $meta_array['alpn'] = explode(",", $input['params']['alpn']);
    }
    
    if (isset($input['params']['pbk'])){
        $meta_array['reality-opts']['public-key'] = $input['params']['pbk'];
        $meta_array['reality-opts']['short-id'] = @$input['params']['sid'];
    }
    
    if (isset($input['params']['fp'])){
        $meta_array['client-fingerprint'] = $input['params']['fp'];
    } else {
        $meta_array['client-fingerprint'] = "ios";
    }
    $meta_proxy = "";
    foreach ($meta_array as $key => $data){
        if ($key === "name"){
            $meta_proxy .= "- " . $key . ' : "' . $data . '"' . "\n  ";
        }else{
            if ($key === "grpc-opts"){
                $meta_proxy .= $key . " : \n    grpc-service-name : " . $data["grpc-service-name"] . "\n  ";
            } elseif ($key === "ws-opts") {
                $meta_proxy .= $key . " : \n    path : " . $data["path"] . "\n    headers : " . $data["headers"] . "\n  ";
            } elseif ($key === "reality-opts"){
                $meta_proxy .= $key . " : \n    public-key : " . $data["public-key"] . "\n    short-id : " . $data["short-id"] . "\n  ";
            } elseif ($key === "alpn") {
                $count_alpn = count($data) - 1 ;
                if ($count_alpn === 0){
                    $meta_proxy .= $key . " : \n    - " . $data["0"] . "\n  ";
                } elseif ($count_alpn === 1){
                    $meta_proxy .= $key . " : \n    - " . $data["0"] . "\n    - : " . $data["1"] . "\n  ";
                }elseif ($count_alpn === 2) {
                    $meta_proxy .= $key . " : \n    - " . $data["0"] . "\n    - : " . $data["1"] . "\n    - : " . $data["2"] . "\n  ";
                }
                
            } else {
                $meta_proxy .= $key . " : " . $data . "\n  ";
            }
            
        }
        
    }
    return $meta_proxy;
}

?>
