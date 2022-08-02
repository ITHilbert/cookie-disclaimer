# Cookie Disclaimer

Mein Cookie Banner.


## Installation
```
cd packages
git clone https://github.com/ITHilbert/CookieDisclaimer.git
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
