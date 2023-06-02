<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte à rebours</title>

    <style>
        *{
            box-sizing: border-box;
        }

        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url("login2.jpg") no-repeat center center;
            -webkit-background-size: cover;
            background-size: cover;
            font-family: 'Yusei Magic', sans-serif;
            color: #f4f7f7;
            height: 100vh;
        }
        /* Ombre de superposition */
        body::before{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .55);
        }

        body *{
            z-index: 1;
        }
        .year{
            font-size: 10rem;
            z-index: -1;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        h1{
            font-size: 60px;
            margin: -60px 0 40px;
        }

        .countdown{
            display: flex;
            visibility: hidden;
            opacity: 0;
            transform: scale(2);
            transition: opacity .3s ease, visibility .3s ease;
        }

        .time{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 15px;
        }
        .time h2{
            margin: 0 0 5px;
        }

        @media(max-width: 600px){
            .year{
                font-size: 5rem;
                top: 100px;
            }

            h1{
                font-size: 30px;
            }

            .time{
                margin: 5px;
            }
            .time h2 {
                margin: 0px;
                font-size: 12px;
            }
            .time small{
                font-size: 10px;
            }
        }

        .loading{
            position: absolute;
            width: 100;
            height: auto;
            opacity: 75;
            transition: .3s ease;
        }
    </style>
</head>

<body>
    <div class="year" id="year"></div>
    <h1>c'est dans</h1>
    <div class="countdown" id="countdown">
        <div class="time">
            <h2 id="days">00</h2>
            <small>Jours</small>
        </div>
        <div class="time">
            <h2 id="hours">00</h2>
            <small>heures</small>
        </div>
        <div class="time">
            <h2 id="minutes">00</h2>
            <small>minutes</small>
        </div>
        <div class="time">
            <h2 id="seconds">00</h2>
            <small>secondes</small>
        </div>
    </div>

    <img src="spinner.gif" alt="Loading..." id="loading" class="loading">

    <script>
        const days = document.getElementById('days');
        const hours = document.getElementById('hours');
        const minutes = document.getElementById('minutes');
        const seconds = document.getElementById('seconds');
        const year = document.getElementById('year');
        const countdown = document.getElementById('countdown');
        const loading = document.getElementById('loading');

        const currentYear = new Date().getFullYear();
        const newYearTime = new Date(`January 01 ${currentYear + 1} 00:00:00`);
        year.innerText = currentYear + 1;

        // Mise à jour du compte à rebours
        function updateCountdown() {
            const currentTime = new Date();
            const diff = newYearTime - currentTime;

            const d = Math.floor(diff / 1000 / (60 * 60 * 24));
            const h = Math.floor(diff / 1000 / (60 * 60)) % 24;
            const m = Math.floor(diff / 1000 / (60)) % 60;
            const s = Math.floor(diff / 1000) % 60;

            // Ajout des élément dans le DOM

            days.innerHTML = d;
            hours.innerHTML = h < 10 ? '0' + h : h;
            minutes.innerHTML = m < 10 ? '0' + m : m;
            seconds.innerHTML = s < 10 ? '0' + s : s;
        }

        setTimeout(() => {
            loading.style.visibility = 'hidden';
            loading.style.opacity = '0';
            countdown.style.visibility = 'visible';
            countdown.style.opacity = '1';
        }, 1000);
        setInterval(updateCountdown, 1000)
        updateCountdown();

    </script>
</body>

</html>