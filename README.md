# Cookie Disclaimer

Mein Cookie Banner.


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


### Composer
```
"autoload": {
     "psr-4": {
         "App\\": "app/",
         "ITHilbert\\": "packages/",
         "ITHilbert\\CookieDisclaimer\\": "packages/cookie-disclaimer/src/"
     }
},
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
