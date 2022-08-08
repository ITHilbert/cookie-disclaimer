<template>
<div id="cookie-disclaimer" class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Willkommen</h4>
        </div>
        <div class="modal-body">
            <h2>Wir verwenden Cookies</h2>
            <p>
                Diese Website benutzt Cookies, die für den technischen Betrieb der Website erforderlich sind und stets gesetzt werden. Andere Cookies, um Inhalte und Anzeigen zu personalisieren und die Zugriffe auf unsere Website zu analysieren, werden nur mit Ihrer Zustimmung gesetzt. Außerdem geben wir Informationen zu Ihrer Verwendung unserer Website an unsere Partner für Werbung und Analysen weiter.
            </p>
            <div id="cookies"></div>
        </div>
        <div class="modal-footer">
            <div class="row w-100" >
                <div class="col-4 text-left pt-3">
                    <a href="#" class="cookies-not-accept text-muted">ablehnen</a>
                </div>
                <div class="col-4 text-center pt-3">
                    <a href="#" class="cookies-more-info text-muted">mehr Informationen</a>
                </div>
                <div class="col-4 text-right">
                    <button type="button" class="btn btn-primary cookies-accept">Zustimmen und weiter</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</template>


<script>
    export default {
        mounted() {
            //###############################################
            //# Cookie Disclaimer
            //###############################################

            $('.cookies-not-accept').on('click', function() {
                $('#cookie-disclaimer').modal('hide');
                cookiestat(false);
            });

            $('.cookies-more-info').on('click', function() {
                $('#cookie-disclaimer').modal('hide');
                $('#cookies-infos').modal('show');
            });

            $('.cookies-accept').on('click',function() {
                getScripte();
                setCookiesAllowCookie();
                $('#cookie-disclaimer').modal('hide');
                cookiestat(true);
            });

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

            function setCookiesAllowCookie() {
                setCookie("cookies-allow", new Date(), 30);
            }

            function isCookiesAllow() {
                //console.log('c: ' + document.cookie.indexOf('cookies-allow='));
                //console.log('y: ' + document.cookie.indexOf('cookies-allow=') != -1);
                //console.log('x: ' + document.cookie.match(/^(.*;)?\s*cookies-allow\s*=\s*[^;]+(.*)?$/));
                if (document.cookie.indexOf('cookies-allow=') != -1) {
                    return true;
                }
                return false;
            }

            function deleteCookiesAllowCookie() {
                cookies.cookieDelete("cookies-allow");
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

            $(document).ready(function() {
                if(!isCookiesAllow()){
                    //deleteAllCookies();
                    $('#cookie-disclaimer').modal('show');
                }
            });

            //###############################################
            //# Ajax
            //###############################################

            /**
             * CSRF-Token setzen, sonst funktioniert Ajax nicht
             */
            /* $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); */

            /**
             * Speichern was der User im Cookie-Disclaimer gedrückt hat
             *
             * @param {bool} allow  => true or false
             */
            function getScripte() {
                //alert($('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    type: "POST",
                    url: window.location.origin + "/api/load-scripte-after-cookies-allow",
                    cache: false,
                    data: "",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "Okay") {
                            //$('#info-' + response.AUID).attr('info', response.msg);
                            writeScripte(response.script);
                        } else {
                            alert(response.msg);
                        }
                    }
                });
            };

            function cookiestat(allow) {
                //alert($('meta[name="csrf-token"]').attr('content'));
                var data= {};
                data['cookie_allow'] = allow;

                $.ajax({
                    type: "POST",
                    url: window.location.origin + "/api/cookies-allow-stat",
                    cache: false,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "Okay") {
                            //$('#info-' + response.AUID).attr('info', response.msg);
                        } else {
                            alert(response.msg);
                        }
                    }
                });
            };

            //###############################################
            //# Funktionen
            //###############################################
            function writeScripte(script){
                $('body').append(script);
            }
        }
    }
</script>

