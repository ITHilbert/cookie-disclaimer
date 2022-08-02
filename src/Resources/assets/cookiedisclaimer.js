$(document).ready(function() {
    saveCookies();
    deleteAllCookies();

    //###############################################
    //# Cookie Disclaimer
    //###############################################


    $('#cookie-disclaimer').modal('show');

    $('.cookie-not-accept').click(function() {
        sendCookieAllow(false);
        $('#cookie-disclaimer').modal('hide');
    });

    $('.cookie-accept').click(function() {
        sendCookieAllow(true);
        $('#cookie-disclaimer').modal('hide');
        cookiesRewrite();
    });

    //###############################################
    //# Cookie Behandlung
    //###############################################

    /**
     * Cookies werden im HTML Code gespeichert
     * @returns ""
     */
    function saveCookies() {
        var cookies = (document.cookie) ? document.cookie.split(';') : [];
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            var pos = cookie.indexOf('=');
            var key = "";
            var value = "";

            if (pos > 0) {
                key = cookie.substring(0, pos);
                value = cookie.substring(pos + 1);
            } else {
                key = cookie;
            }

            if (key != "XSRF-TOKEN") {
                saveCookieInHtml(key, value);
            }
            //console.log(key);
            //console.log(value);
            //console.log(key + ':' + value);

        }
        return "";
    }

    /**
     * Stellt die Cookies wieder her
     */
    function cookiesRewrite() {
        $('.cookie').each(function(index, value) {
            console.log(index + ') ' + $(this).attr('data-key') + ':' + $(this).attr('data-value'));
            setCookie($(this).attr('data-key'), $(this).attr('data-value'), 30);
        });
    }

    /**
     * Löscht alle Cookies
     */
    function deleteAllCookies() {
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

    /**
     * Setzt das ablaufdatum in die Vergangenheit, damit löscht der Browser das Cookie
     *
     * @param {*} cookie Name des Cookies
     */
    function cookieDelete(cookie) {
        document.cookie = cookie + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }

    /**
     * Speichert das Cookie im HTML Code
     *
     * @param {*} cookie Cookie Name
     * @param {*} value Cookie Value
     */
    function saveCookieInHtml(cookie, value) {
        $('#cookies').append('<div class="cookie" data-key="' + cookie + '" data-value="' + value + '"></div>');
    }

    /**
     *
     * @param {*} cname Name des Cookies
     * @param {*} cvalue Wert des Cookies
     * @param {*} exdays Tage der Gültigkeit
     */
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    //###############################################
    //# Events
    //###############################################

    /**
     * Bevor die Seite  verlassen wird, werden die Cookies wieder hergestellt.
     */
    $(window).bind('beforeunload', function() {
        console.log('Change Page');
        cookiesRewrite();
        return false;
    });

    //###############################################
    //# Ajax
    //###############################################

    /**
     * CSRF-Token setzen, sonst funktioniert Ajax nicht
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Speichern was der User im Cookie-Disclaimer gedrückt hat
     *
     * @param {bool} allow  => true or false
     */
    function sendCookieAllow(allow) {
        data = {};
        data['allow'] = allow;

        //alert(data['allow'] );

        $.ajax({
            type: "POST",
            url: "{{ route('cookies.allow') }}",
            cache: false,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == "Okay") {
                    //$('#info-' + response.AUID).attr('info', response.msg);
                } else {
                    showError(response.msg);
                }
            }
        });
    };
});