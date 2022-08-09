# Cookie Disclaimer

Mein Cookie Banner.
Lädt die JavaScript Dateien erst wenn der Benutzer zustimmt.

## Benötigte Packages
Laravel-Kit
```
composer require ithilbert/laravel-kit:dev-master
```

## Installation
```
composer require ithilbert/cookie-disclaimer
```

Config File kopieren
```
php artisan vendor:publish --provider="ITHilbert\CookieDisclaimer\CookieDisclaimerServiceProvider" 
```

Zu den anderen Vue Components folgendes hinzufügen:
```
//Cookie Disclaimer
Vue.component('cookie-disclaimer', require('./../../vendor/ithilbert/cookie-disclaimer/src/Resources/Vue/cookies-disclaimer.vue').default);
Vue.component('cookies-allow-reset', require('./../../vendor/ithilbert/cookie-disclaimer/src/Resources/Vue/cookies-allow-reset.vue').default);
Vue.component('cookies-infos', require('./../../vendor/ithilbert/cookie-disclaimer/src/Resources/Vue/cookies-infos.vue').default);
```

Include Cookie-Banner
Hinweis: Es muss noch im "vue-app" div sein.
```
@include('cookiedisclaimer::cookieDisclaimer')
```

Include JS Code wenn Cookie bereits gesetzt ist
```
@if(isset($_COOKIE["cookies-allow"]))
...code...
@endif

```


Add api Routes
```
Route::middleware(['api'])->group(function () {
    Route::post('load-scripte-after-cookies-allow', [CookieController::class, 'loadScripteAfterCookiesAllow'])->name('load.scripte.after.cookies.allow');
    Route::post('load-cookie-infos', [CookieController::class, 'loadCookieInfos'])->name('load.cookie.infos');
    Route::post('cookies-allow-stat', [CookieController::class, 'cookiesAllowStat'])->name('cookies.allow.stat');
});
```


### config/app.php
Den Punkt Providers um folgenden Eintrag ergänzen:
```
\ITHilbert\CookieDisclaimer\CookieDisclaimerServiceProvider::class,
```



### ToDo


### Author
IT-Hilbert GmbH

Access, Excel, VBA und Web Programmierungen

Homepage: [IT-Hilbert.com](https://www.IT-Hilbert.com) 
