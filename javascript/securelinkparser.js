document.addEventListener("DOMContentLoaded", function () {
    SecureLinkParser.startTimer();
});

document.getElementById('redirectCancel').addEventListener("click", function() {
    if (this.classList.contains('canceled')) {
        SecureLinkParser.go();
    }

    SecureLinkParser.cancel();
    this.innerHTML = 'Yes, take me there';
    this.classList.add('canceled');
});

var SecureLinkParser = {
    count: 5,
    timer: false,
    startTimer: function () {
        var _this = this;
        this.timer = setInterval(function () {
            _this.tick();
        }, 1000)
    },
    tick: function () {
        if (this.count === 0) {
            clearInterval(this.timer);
            return this.go();
        }
        this.count -= 1;

        document.getElementById('secureLinkRedirectCountdown').innerHTML = this.count;
    },
    go: function () {
        var destination = document.getElementById('secureLinkWrapper').getAttribute('data-destination');

        if (!destination || !destination.length > 0) {
            console.warn('No data-destination attribute found on #secureLinkWrapper');
            return;
        }

        window.location = destination;
    },
    cancel: function () {
        if (!this.timer) {
            return;
        }

        var destination = document.getElementById('secureLinkWrapper').getAttribute('data-destination');
        document.querySelector('#secureLinkWrapper .inner').innerHTML = 'Would you like to be redirected to: <strong>' + destination + '</strong>?';
        clearInterval(this.timer);
    }
};