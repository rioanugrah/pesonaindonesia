(function() {
    'use strict';

    const intStatus = document.getElementById('internetStatus');
    const backText = 'Your internet connection is back';
    const lostText = 'Oops! No internet connection.';
    const successColor = '#00b894';
    const failureColor = '#ea4c62';

    if (window.navigator.onLine) {
        // intStatus.textContent = backText;
        intStatus.innerHTML = '<div class="alert alert-success bg-success text-white border-0"><strong>' + backText + '</strong></div>'
            // intStatus.style.backgroundColor = successColor;
        intStatus.style.display = 'none';
    } else {
        intStatus.textContent = lostText;
        intStatus.innerHTML = '<div class="alert alert-danger bg-danger text-white border-0"><strong>' + lostText + '</strong></div>'
            // intStatus.style.backgroundColor = failureColor;
        intStatus.style.display = 'block';
    }

    window.addEventListener('online', function() {
        intStatus.textContent = backText;
        intStatus.innerHTML = '<div class="alert alert-success bg-success text-white border-0"><strong>' + backText + '</strong></div>'
            // intStatus.style.backgroundColor = successColor;
        intStatus.style.display = 'block';
        var hideTime = setTimeout(function() {
            intStatus.style.display = 'none';
            // location.reload();
        }, 5000);
        // iziToast.success({
        //     title: backText
        // });
    });

    window.addEventListener('offline', function() {
        intStatus.textContent = lostText;
        intStatus.innerHTML = '<div class="alert alert-danger bg-danger text-white border-0"><strong>' + lostText + '</strong></div>'
            // intStatus.style.backgroundColor = failureColor;
        intStatus.style.display = 'block';
        // if (!window.navigator.onLine) {
        //     var notif = false;
        // } else {
        //     var notif = true;
        // }
        // iziToast.error({
        //     timeout: notif,
        //     close: false,
        //     title: lostText
        // });
    });

})();