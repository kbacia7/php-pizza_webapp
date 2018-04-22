# Aplikacja pizzerii
Aplikacja pizzerii będąca rozbudowaną wersją starej strony pizzerii (która również została przebudowana) na zaliczenie semestru. Każda zakładka panelu administracyjnego strony zawiera skrócony opis jego działania

Cała aplikacja była pisana na PHP 7.2.4 (NTS) w [Visual Studio Code](https://code.visualstudio.com/) stąd w repozytorium folder .vscode z prostą konfiguracją do debugowania z użyciem [XDebug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug)

Aplikację można przetestować pod http://80.211.223.245
## Wymagania
* PHP5 bądź najlepiej PHP7
* Zwiększony limit dla uploadu zdjęć, ponieważ aplikacja skaluje zdjęcia do odpowiednich rozdzielczości na podstawie jednego dużego zdjęcia (o wadze np. 7 MB)
* [php-mysql](http://php.net/manual/en/ref.pdo-mysql.php) do obsługi połączenia z bazą danych MySQL
* [php-gd](http://php.net/manual/en/book.image.php) do działania na zdjęciach
* [php-yaml](http://php.net/manual/en/book.yaml.php) do interpretowania plików YAML
* Konto w usłudze [Google ReCaptcha](https://www.google.com/recaptcha/intro/android.html)
* Konto w [OneSignal](https://onesignal.com/)
* Konto w usłudze [Google Maps](https://developers.google.com/maps/documentation/javascript/get-api-key) ale aby całośc działała należy włączyć Geolokalizację w [Konsoli Google API](https://console.developers.google.com/apis/dashboard?) i zezwolić na geolokalizację. Więcej o tym [tutaj](https://developers.google.com/maps/documentation/geolocation/intro)

Dodatkowo, Google ReCaptcha oraz OneSignal przypisane są do domeny, zakładając konto w tych usługach należy pamiętać aby ustawić odpowiednią domenę (np. http://localhost/)

[Tutaj](https://github.com/xy2z/PineDocs/wiki/Install-YAML-extension-for-PHP-7.0-(Windows---Ubuntu)) opisano w prosty sposób jak uruchomić php-yaml na Windowsie, pozostałe rozszerzenia instaluje się bez żadnych problemów
## Konfiguracja i uruchamianie
1. Tworzymy kopię pliku [PizzaConfig/config_template.yml](https://github.com/kbacia7/php-pizza_webapp/blob/master/PizzaConfig/config_template.yaml) i nazywamy ją config.yml
2. Zgodnie ze wskazówkami w pliku edytujemy jego zawartość, ustalamy parametry połączenia z bazą danych, SMTP i wklejamy wymagane klucze OneSignal oraz Google ReCaptcha
3. Tworzymy bazę danych taką jak jej nazwę ustaliliśmy w pliku konfiguracyjnym, importujemy plik [pizza_db.sql](https://github.com/kbacia7/php-pizza_webapp/blob/master/pizza_db.sql)
4. Uruchamiamy serwer Apache, aby wyświetlić panel logowania do panelu administracyjnego na stronie głównej należy wcisnąć klawisz L
