<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $appno = $_POST['appno'];
    $dob = $_POST['dob'];
    
    // Split DOB into day, month, year
    $dobe = explode("/", $dob);
    $day = $dobe[0];
    $month = $dobe[1];
    $year = $dobe[2];
    
    // API URL and payload
    $url = "https://scorecard.mhexam.com/api/api/admitcard/fetchadmitcard";
    $payload = $py = '=%7B%22LoginId%22%3A%22' . $appno . '%22%2C%22Password%22%3A%22' . $day . '%2F' . $month . '%2F' . $year . '%22%2C%22CourseCode%22%3A%2217%22%7D';

    
    // Request headers
    $headers = array(
        'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:127.0) Gecko/20100101 Firefox/127.0',
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Accept-Language: en-US,en;q=0.5',
        'Accept-Encoding: gzip, deflate, br, zstd',
        'Content-Type: application/x-www-form-urlencoded',
        'X-Requested-With: XMLHttpRequest',
        'Origin: https://scorecard.mhexam.com',
        'Connection: keep-alive',
        'Referer: https://scorecard.mhexam.com/v2/MAH-PCM-CET-2024/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'Priority: u=1',
        'Cookie: L0L'
    );
    
    // Initialize cURL session
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute cURL session
    $response = curl_exec($ch);
    // Check for errors
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    
    // Close cURL session
    curl_close($ch);
    
    // Parse the response
    $json_response = json_decode($response, true);
    
    // Extract required data
    $string=$response;
    $i = strpos($string, 'Score1');
    $score1=($string[$i+11] . $string[$i+12] . $string[$i+13]);
    $i = strpos($string, 'Score2');
    $score2=($string[$i+11] . $string[$i+12] . $string[$i+13]);
    $i = strpos($string, 'Score3');
    $score3=($string[$i+11] . $string[$i+12] . $string[$i+13]);
    $i = strpos($string, 'TotalScore');
    $total=($string[$i+15] . $string[$i+16] . $string[$i+17]);
     
    // Display scores
    echo "<h1>Scores:</h1>";
    echo "<h2>Physics: " . $score1 . "<br> </h2>";
    echo "<h2>Chemistry: " . $score2 . "<br></h2>";
    echo "<h2>Maths: " . $score3 . "<br></h2>";
    echo "<h2>Total Score: " . $total . "<br></h2>";
    
    // Display full response for debugging
    echo "<h2>Full Response:</h2>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
}

?>
