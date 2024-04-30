<?php 
$ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

// Create a cURL request to fetch location data from ipinfo.io
$ch = curl_init("https://ipinfo.io/{$ip}/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

if ($response !== false) {
    $data = json_decode($response, true);

    if (isset($data['city'])) {
        $currentCity = $data['city'];

        // Make sure to URL-encode the city name
        $currentCity = urlencode($currentCity);

        // Use the city name to fetch weather data from Weatherstack
        $weatherApiUrl = "http://api.weatherstack.com/current?access_key=b6de5808b7304363a8091135230906&query={$currentCity}";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $weatherApiUrl,
            CURLOPT_RETURNTRANSFER => true,
        ));

        $weatherResponse = curl_exec($curl);
        curl_close($curl);

        if ($weatherResponse !== false) {
            $weatherData = json_decode($weatherResponse, true);
            // Now, you can work with the $weatherData to display weather information.
            print_r($weatherData);
        } else {
            echo "Unable to fetch weather information.";
        }
    } else {
        echo "City information not available.";
    }
} else {
    echo "Unable to fetch city information.";
}

?>