document.addEventListener("DOMContentLoaded", function() {
    var alert = document.querySelector(".alert-success");
    if (alert) {
        setTimeout(function() {
            alert.style.transition = "opacity 1s";
            alert.style.opacity = "0";
            setTimeout(function() {
                alert.remove();
            }, 1000);
        }, 6000);
    }

    var countdown = 5;

    function updateCountdown() {
        document.getElementById("countdown-text").textContent = " (" + countdown + " detik)";
        if (countdown > 0) {
            countdown--;
            setTimeout(updateCountdown, 1000);
        }
    }
    updateCountdown();

    setTimeout(function() {
        window.location.href = "{{ url('payment') }}";
    }, 5000);
});