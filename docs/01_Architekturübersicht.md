# Architekturübersicht: ITHilbert Cookie Disclaimer

## Aufbau
Das Paket nutzt Middleware und Datenbank-Tabellen zur Verwaltung von Cookies.

## Wichtige Klassen
- `ITHilbert\CookieDisclaimer\CookieDisclaimerServiceProvider`
- `ITHilbert\CookieDisclaimer\Http\Middleware\CheckCookieConsent` (Beispiel)

## Datenmodell
- `cookie_infos`: Speichert Informationen zu Cookies.
- `cookie_scripte`: Speichert die zu blockierenden Skripte.
