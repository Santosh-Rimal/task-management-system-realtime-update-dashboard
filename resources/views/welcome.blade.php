<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather in {{ $weather['location']['name'] }}, {{ $weather['location']['country'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .weather-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .aqi-good {
            background-color: #d1fae5;
            color: #065f46;
        }
        .aqi-moderate {
            background-color: #fef3c7;
            color: #92400e;
        }
        .aqi-unhealthy {
            background-color: #fecaca;
            color: #991b1b;
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center p-4">
    <div class="weather-card p-8 w-full max-w-md">
        <!-- Location and Time -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $weather['location']['name'] }}, {{ $weather['location']['country'] }}</h1>
            <div class="flex justify-center gap-2 text-sm text-gray-500 mt-1">
                <span>Lat: {{ $weather['location']['lat'] }}° N</span>
                <span>Lon: {{ $weather['location']['lon'] }}° E</span>
            </div>
            <p class="text-gray-500 text-sm mt-2">{{ \Carbon\Carbon::parse($weather['location']['localtime'])->format('F j, Y \a\t H:i') }} (Local Time)</p>
        </div>

        <!-- Current Weather -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <img src="https:{{ $weather['current']['condition']['icon'] }}" alt="{{ $weather['current']['condition']['text'] }}" class="w-20 h-20">
                <div class="ml-4">
                    <p class="text-lg font-semibold text-gray-700">{{ $weather['current']['condition']['text'] }}</p>
                    <p class="text-sm text-gray-500">Feels like {{ $weather['current']['feelslike_c'] }}°C</p>
                </div>
            </div>
            <div class="text-5xl font-bold text-blue-600">{{ $weather['current']['temp_c'] }}°C</div>
        </div>

        <!-- Weather Details Grid -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">Humidity</p>
                <p class="font-semibold">{{ $weather['current']['humidity'] }}%</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">Wind</p>
                <p class="font-semibold">{{ $weather['current']['wind_kph'] }} km/h {{ $weather['current']['wind_dir'] }}</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">Pressure</p>
                <p class="font-semibold">{{ $weather['current']['pressure_mb'] }} mb</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">Precipitation</p>
                <p class="font-semibold">{{ $weather['current']['precip_mm'] }} mm</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">Visibility</p>
                <p class="font-semibold">{{ $weather['current']['vis_km'] }} km</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <p class="text-xs text-gray-500">UV Index</p>
                <p class="font-semibold">{{ $weather['current']['uv'] }}</p>
            </div>
        </div>

        <!-- Air Quality -->
        @php
            $aqi = $weather['current']['air_quality']['us-epa-index'];
            $aqiClass = match(true) {
                $aqi === 1 => 'aqi-good',
                $aqi === 2 => 'aqi-moderate',
                $aqi >= 3 => 'aqi-unhealthy',
            };
            $aqiText = match($aqi) {
                1 => 'Good',
                2 => 'Moderate',
                3 => 'Unhealthy for Sensitive Groups',
                4 => 'Unhealthy',
                5 => 'Very Unhealthy',
                6 => 'Hazardous',
                default => 'Unknown'
            };
        @endphp

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-gray-700 mb-3 flex items-center">
                <span class="inline-block w-3 h-3 rounded-full mr-2 {{ $aqiClass }}"></span>
                Air Quality: {{ $aqiText }} (US EPA Index {{ $aqi }})
            </h3>
            <div class="grid grid-cols-3 gap-2 text-xs">
                @foreach(['pm2_5' => 'PM2.5', 'pm10' => 'PM10', 'co' => 'CO', 'o3' => 'O₃', 'no2' => 'NO₂', 'so2' => 'SO₂'] as $key => $label)
                    <div class="{{ $aqiClass }} p-2 rounded text-center">
                        <p class="font-medium">{{ $label }}</p>
                        <p class="font-bold">{{ $weather['current']['air_quality'][$key] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-6 text-xs text-gray-500 text-center">
            <p>Dew point: {{ $weather['current']['dewpoint_c'] }}°C • Gust: {{ $weather['current']['gust_kph'] }} km/h</p>
            <p class="mt-1">Short radiation: {{ $weather['current']['short_rad'] }} • Diff radiation: {{ $weather['current']['diff_rad'] }}</p>
        </div>
    </div>
</body>
</html>
