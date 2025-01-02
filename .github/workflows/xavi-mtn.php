<?php
// Business of the day
require_once('Tools-mtn-v2.php');

while(true) { 
    system('cls');  // Clear the screen
    $scoreTarget = TargetScore();
    
    
    $cookiez = ['XSRF-TOKEN=eyJpdiI6IkFOYTkzckJJakVSdWhKUnptdnJyRlE9PSIsInZhbHVlIjoienUxRnFKTEhZWVRQR1dXL3pTbmNweWZUYW5HRk1LcldVdklDRGhQV1VzQkR4bk1zODdPYk5kOERaelltb0YxZEJOdFliM1dhajEwZDc2TERtVnVxWmpFN3RpcDJ4MzZaZXlMdFpoQ21EeG9tVjNFakcwTGFFMnR5Zk01ZmE0YXciLCJtYWMiOiI2MjMzMjE1ZThhNDI1YjA5MmE2MjJmOWE3NWQ4OWFjZTBlYjJjYmQ1YzRhM2Y5NzA5ZWMzNmE4M2Y5MDhiNTA5IiwidGFnIjoiIn0%3D;yello_rush_session=eyJpdiI6IkFRZUMwNFlSYjBMNzVjRmVXTjNLU2c9PSIsInZhbHVlIjoibnpwKzFLRUFMNUhieklkeFRNNjY5MDFqbUF5eW9nL3paem1seEoreFdDQ2p5MDdnSEVMYVQ3a01Wa0xOUncyZ2R6ajM4dUtUZWRpWnRNRzhLTjJwKytTT1krcjUrYUh1T253Z1ZBVlk2cHFFWU1jRDFxek4zakVrc1UrejdrK3MiLCJtYWMiOiJhNTI2NDAzNTM4YzBjNGYxMWE3YmE5MjRmNjFiNmVlNjUyMzE4YTQ2MzM1NGIyNDdjNzYzZmYwOTNlMjY3ZDA1IiwidGFnIjoiIn0%3D'];
    
    $cookie = 'XSRF-TOKEN=eyJpdiI6IkFOYTkzckJJakVSdWhKUnptdnJyRlE9PSIsInZhbHVlIjoienUxRnFKTEhZWVRQR1dXL3pTbmNweWZUYW5HRk1LcldVdklDRGhQV1VzQkR4bk1zODdPYk5kOERaelltb0YxZEJOdFliM1dhajEwZDc2TERtVnVxWmpFN3RpcDJ4MzZaZXlMdFpoQ21EeG9tVjNFakcwTGFFMnR5Zk01ZmE0YXciLCJtYWMiOiI2MjMzMjE1ZThhNDI1YjA5MmE2MjJmOWE3NWQ4OWFjZTBlYjJjYmQ1YzRhM2Y5NzA5ZWMzNmE4M2Y5MDhiNTA5IiwidGFnIjoiIn0%3D;yello_rush_session=eyJpdiI6IkFRZUMwNFlSYjBMNzVjRmVXTjNLU2c9PSIsInZhbHVlIjoibnpwKzFLRUFMNUhieklkeFRNNjY5MDFqbUF5eW9nL3paem1seEoreFdDQ2p5MDdnSEVMYVQ3a01Wa0xOUncyZ2R6ajM4dUtUZWRpWnRNRzhLTjJwKytTT1krcjUrYUh1T253Z1ZBVlk2cHFFWU1jRDFxek4zakVrc1UrejdrK3MiLCJtYWMiOiJhNTI2NDAzNTM4YzBjNGYxMWE3YmE5MjRmNjFiNmVlNjUyMzE4YTQ2MzM1NGIyNDdjNzYzZmYwOTNlMjY3ZDA1IiwidGFnIjoiIn0%3D';
    
    $pos = GetPosition($cookie);
    echo "\nYour position is: $pos";
    $number3 = GetTargetScore($pos);
    
    echo "\nOur target score is: $number3";
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://yellorush.co.za/play-now');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array(
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Accept-Language: en-US,en;q=0.9',
        'Cache-Control: no-cache',
        'Connection: keep-alive',
        'Cookie: '.$cookie,
        'Pragma: no-cache',
        'Referer: https://yellorush.co.za/',
        'Sec-CH-UA: \"Safari\";v=\"15\", \"AppleWebKit\";v=\"605\"',
        'Sec-CH-UA-Mobile: ?1',
        'Sec-CH-UA-Platform: \"iOS\"',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: same-origin',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; SM-G955U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36'
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $curl = curl_exec($ch);
    $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    
    $query_str = parse_url($redirectedUrl, PHP_URL_QUERY);
    parse_str($query_str, $query_params);
    $unique_id = isset($query_params['unique_id']) ? $query_params['unique_id'] : '';
    $game_id = isset($query_params['game_id']) ? $query_params['game_id'] : '';
    $sigv1 = isset($query_params['sigv1']) ? $query_params['sigv1'] : '';
    
    echo "<br>Unique_id: $unique_id<hr>";
    echo "<br>Game_id: $game_id<hr>";
    
    ###################
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://yellorush.co.za/new-game-check-user-status/'.$unique_id.'/'.$sigv1.'');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array(
        'Referer:'.$redirectedUrl,
        'Sec-CH-UA: \"Safari\";v=\"15\", \"AppleWebKit\";v=\"605\"',
        'Sec-CH-UA-Mobile: ?1',
        'Sec-CH-UA-Platform: \"iOS\"',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: same-origin',
        'Upgrade-Insecure-Requests: 1',
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $curl = curl_exec($ch);

    // Separate headers and body
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($curl, 0, $header_size);
    $body = substr($curl, $header_size);
    curl_close($ch);
    
    $x_power = X_Power($header);
    echo "\n<br> X-Powered-Version: $x_power\n";
    
    if ($pos == 0) {
        $score = rand(200, 400);
    } else {
        $score = $number3 + 500;
        
        if ($number3 >= 1500) {
            $score = $number3 + rand(1000,2000);
        }
    }
    
    $increment = 1;
    
    date_default_timezone_set('Africa/Johannesburg');
    $current_time = new DateTime();
    
    if (in_array($current_time->format('i'), ['57', '58', '59'])) {
        if ($pos >= 6 || $pos == 0) {
            $score += rand(60, 300);
        }
    }
    
    while($score > 100000) {
        $score = rand(100, 2000);
    }

    $score = round($score, -1);
    
    ///////////////////////////
    $uA = RandomUa();
    //echo "\n<br>UA used => $uA\n";
    $memory = validate_request($x_power, $score);
    $OnePieceIsReal = generateRandomDivisionData($score, $redirectedUrl, $x_power, $memory, $increment, $uA);

    // Optional sleep to prevent excessive load (adjust if necessary)
    // sleep(1); 
}
?>
