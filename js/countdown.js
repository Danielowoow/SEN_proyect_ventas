document.addEventListener('DOMContentLoaded', function () {
    const endTime = new Date(Date.now() + 8 * 60 * 60 * 1000); // Establece la hora de finalización aquí (en este ejemplo, 8 horas desde ahora)

    function updateCountdown() {
        const hoursLabel = document.querySelector('.c-time .hours');
        const minutesLabel = document.querySelector('.c-time .minutes');
        const secondsLabel = document.querySelector('.c-time .seconds');

        const currentTime = new Date().getTime();
        const remainingTime = endTime - currentTime;

        if (remainingTime > 0) {
            const hours = Math.floor(remainingTime / (1000 * 60 * 60));
            const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            hoursLabel.textContent = hours.toString().padStart(2, '0');
            minutesLabel.textContent = minutes.toString().padStart(2, '0');
            secondsLabel.textContent = seconds.toString().padStart(2, '0');
        } else {
            hoursLabel.textContent = '00';
            minutesLabel.textContent = '00';
            secondsLabel.textContent = '00';
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
});