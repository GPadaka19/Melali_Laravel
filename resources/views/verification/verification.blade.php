<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        let timerInterval;
        Swal.fire({
            title: "Verification Successful!",
            html: "You will be redirected to login page in <b>5</b> seconds.",
            timer: 5000, // 5 seconds
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    const timeLeft = Swal.getTimerLeft();
                    timer.textContent = Math.ceil(timeLeft / 1000); // Convert milliseconds to seconds
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                 window.location.href = "{{ route('login') }}";
            }
        });
    </script>
</body>
</html>