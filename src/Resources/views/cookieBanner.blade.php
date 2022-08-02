@if((session('cookiesallow') ?? false) != 'true' )

    <div id="cookie-disclaimer" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Willkommen</h4>
            <button type="button" class="close cookie-not-accept" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>
                    Wir verwenden Cookies um unser Angebot stätig zu verbessern. Dies ermöglicht es uns, unsere Preise gering zu halten.
                    Dazu verwenden wir 2 Arten von Cookies, einmal die Funktionscookies die benötigt werden, damit die Homepage funktioniert
                    und dann verwenden wir noch Cookies um unsere Werbestrategie mit hilfe von Google Analytics zu überprüfen. Weitere Cookies werden nicht
                    verwendet. Wenn Sie dies nicht wünschen, dann klicken Sie bitte auf "nein". Anderenfalls klicken Sie bitte unten rechts auf
                    "<b>Okay</b>" um die Seite mit vollen Funktionsumfang zu nutzen.
                    <div id="cookies"></div>
                </p>
            </div>
            <div class="modal-footer">
                <div class="row w-100" >
                    <div class="col-4 text-left pt-3">
                        <a href="#" class="cookie-not-accept">nein</a>
                    </div>
                    <div class="col-4 text-center pt-3">
                        <a href="#" class="cookie-not-accept">mehr informationen</a>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-primary cookie-accept">Okay</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endif


