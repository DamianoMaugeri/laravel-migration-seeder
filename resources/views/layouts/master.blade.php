<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Train</title>
    @vite(['resources/sass/app.scss', "resources/js/app.js"])
    <script>
        function getNextMinuteTimestamp() {
            // Ottieni l'orario attuale
            const now = new Date();
            // Calcola i millisecondi fino al prossimo minuto
            const nextMinute = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes() + 1, 0, 0);
            return nextMinute - now; // Differenza in millisecondi
        }

        // Funzione per ricaricare la pagina al prossimo minuto
        function refreshAtNextMinute() {
            const delay = getNextMinuteTimestamp(); // Ottieni il tempo che manca al prossimo minuto
            setTimeout(function() {
                location.reload(); // Ricarica la pagina
            }, delay); // Imposta il timeout per il tempo che manca al prossimo minuto
        }

        // Chiamata alla funzione per fare il refresh
        refreshAtNextMinute();
    </script>
</head>
<body class="text-warning bg-dark">
    @yield('content')
    
</body>
</html>