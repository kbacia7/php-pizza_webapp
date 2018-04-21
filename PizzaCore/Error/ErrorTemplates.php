<?php
class ErrorTemplates {
	public static $templates = array(

		//Menu Category
        ErrorID::MenuCategory_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Brak danych",
            "description" => "Brak danych wymaganych do zaktualizowania kategorii"
        ),

        ErrorID::MenuCategory_EmptyTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwy tytuł",
            "description" => "Musisz podać tytuł"
        ),

        ErrorID::MenuCategory_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Kategoria nie istnieje",
            "description" => "Wygląda na to że podana kategoria nie istnieje"
        ),
		
		ErrorID::MenuCategory_RemoveComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Usunięto kategorię",
            "description" => "Pomyślnie usunięto kategorię menu"
        ),

        ErrorID::MenuCategory_UpdateComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano tytuł kategorii",
            "description" => "Pomyślnie zaktualizowano tytuł kategorii menu"
        ),

        ErrorID::MenuCategory_CreateComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Utworzono kategorię",
            "description" => "Pomyślnie utworzono kategorię menu"
        ),
		
		//Menu item
        ErrorID::MenuItem_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Brak danych",
            "description" => "Brak danych wymaganych do zaktualizowania elementu menu"
        ),

        ErrorID::MenuItem_EmptyTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwy tytuł",
            "description" => "Musisz podać tytuł"
        ),

        ErrorID::MenuItem_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Element menu nie istnieje",
            "description" => "Wygląda na to że podany element menu nie istnieje"
        ),

        ErrorID::MenuItem_InvalidTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny tytuł",
            "description" => "Wygląda na to że podany tytuł jest nieprawdiłowy"
        ),

        ErrorID::MenuItem_InvalidPrice => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny format ceny",
            "description" => "Wygląda na to że podany format ceny jest nieprawidłowy"
        ),

        ErrorID::MenuItem_RemoveComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Usunięto element menu",
            "description" => "Pomyślnie usunięto element menu"
        ),

        ErrorID::MenuItem_UpdateComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano element menu",
            "description" => "Pomyślnie zaktualizowano element menu"
        ),

        ErrorID::MenuItem_CreateComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Utworzono element menu",
            "description" => "Pomyślnie utworzono element menu"
        ),

		//Config
        ErrorID::Config_UpdateComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano konfigurację",
            "description" => "Pomyślnie zaktualizowano konfigurację"
        ),
		
		ErrorID::Config_EmptyPizzeriaName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusta nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może być pusta"
        ),
		
		ErrorID::Config_InvalidPizzeriaName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwa nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może zawierać znaków specjalnych"
        ),
		
		ErrorID::Config_LongPizzeriaName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwa nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może za długa (maks. 30 znaków)"
        ),
		
		ErrorID::Config_EmptyPizzeriaLocation => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Puste współrzędne",
            "description" => "Współrzędne pizzerii nie mogą pozostawać puste"
        ),
		
		ErrorID::Config_InvalidPizzeriaLocation => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nieprawidłowy format współrzędnych",
            "description" => "Współrzędne mają niepoprawny format, poprawne współrzędne można pobrać z Google Map"
        ),
		
		ErrorID::Config_EmptyTelephone => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty numer telefonu",
            "description" => "Numer telefonu kontaktowego nie może pozostawać pusty"
        ),
		
		ErrorID::Config_InvalidTelephone => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nieprawidłowy format numeru telefonu",
            "description" => "Numer telefonu ma niepoprawny format"
        ),
		
		ErrorID::Config_InvalidIconEx => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawne rozszerzenie ikonki",
            "description" => "Ikonka ma niepoprawne rozszerzenie"
        ),
		
		ErrorID::Config_InvalidIconSize => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Za duża ikonka",
            "description" => "Ikonka jest za duża, domyślnie PHP akceptuje do 2MB"
        ),
		
		ErrorID::Config_EmptyCurrency => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Waluta jest pusta",
            "description" => "Symbol waluty nie może być pusty"
        ),
		
		ErrorID::Config_LongCurrency => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Symbol waluty jest za długi",
            "description" => "Symbol waluty ma za dużo znaków"
        ),
		
		ErrorID::Config_EmptyGalleryOne => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis pierwszej galerii",
            "description" => "Opis pierwszej galerii nie może byc pusty"
        ),
		
		ErrorID::Config_EmptyGalleryTwo => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis drugiej galerii",
            "description" => "Opis drugiej galerii nie może byc pusty"
        ),
		
		
		//Gallery
		ErrorID::Gallery_EmptyImageDescription => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis zdjecia w galerii",
            "description" => "Opis zdjęcia w galerii nie może być pusty"
        ),
		
		ErrorID::Gallery_InvalidImageSize => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Rozmiar zdjecia galerii",
            "description" => "Rozmiar zdjęcia w galerii nie może być większy niż 2 MB"
        ),
		
		ErrorID::Gallery_InvalidImageEx => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Rozszerzenie zdjecia galerii",
            "description" => "Zdjęcie w galerii prawdopodobnie ma błędne rozszerzenie"
        ),
		
		ErrorID::Gallery_ImageUploadedComplete => array(
           "code" => ErrorTypes::SUCCESS,
            "title" => "Wgrano zdjęcie na serwer",
            "description" => "Pomyślnie wgrano zdjęcie na serwer"
        ),

        ErrorID::Gallery_EmtyPath => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nazwa pliku galerii",
            "description" => "Nazwa pliku w galerii nie może być pusta"
        ),

        ErrorID::Gallery_InvalidGalleryID => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nieprawidłowe ID galerii",
            "description" => "ID Galerii jest nieprawidłowe"
        ),

        ErrorID::Gallery_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Puste dane",
            "description" => "Wpisane dane dla galerii są puste"
        ),
        
        ErrorID::Gallery_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Puste dane",
            "description" => "Wpisane dane dla galerii są puste"
        ),

        ErrorID::Gallery_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Element galerii nie istnieje",
            "description" => "Ten element galerii już nie istnieje"
        ),

        ErrorID::Gallery_AddComplete => array(
            "code" => ErrorTypes::SUCCESS,
             "title" => "Dodano zdjęcie do galerii",
             "description" => "Pomyślnie dodano zdjęcie do galerii"
         ),

		//Notification
        ErrorID::Notification_SendComplete => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Wysłano powiadomienie",
            "description" => "Pomyślnie wysłano powiadomienie"
        ),
		
		ErrorID::Notification_EmptyTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty tytuł powiadomienia",
            "description" => "Tytuł powiadomienia nie może być pusty"
        ),
		
		ErrorID::Notification_EmptyMessage => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty tekst powiadomienia",
            "description" => "Tekst powiadomienia nie może pozostać pusty"
        ),

        ErrorID::Notification_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nie podano danych",
            "description" => "Nie podano danych do wysłania powiadomienia"
        ),

        //User
        ErrorID::User_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nie podano danych",
            "description" => "Nie podano danych dla nowego użytkownika"
        ),
		
		ErrorID::User_EmptyData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nie znaleziono użytkownika",
            "description" => "Nie znaleziono odpowiedniego użytkownika"
        ),
		
		ErrorID::User_EmptyFirstName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pustę imię",
            "description" => "Imię użytkwonika jest puste"
        ),

        ErrorID::User_EmptyAdmin => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty administrator",
            "description" => "Nieokreślono uprawnień użytkownika"
        ),
		
		ErrorID::User_EmptyLastName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pustę nazwisko",
            "description" => "Nazwisko użytkownika jest puste"
        ),
		
		ErrorID::User_InvalidFirstName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawne imię",
            "description" => "Imię zawiera nieprawidłowe znaki które nie występują w normalnych imieniu"
        ),

        ErrorID::User_InvalidLastName => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawne nazwisko",
            "description" => "Nazwisko zawiera nieprawidłowe znaki które nie występują w normalnych imieniu"
        ),

        ErrorID::User_EmptyPassword => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pustę hasło",
            "description" => "Hasło użytkownika jest za krótkie (minimum 5 znaków)"
        ),

        ErrorID::User_EmptyLogin => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty login",
            "description" => "Login użytkownika jest za krótki (minimum 5 znaków)"
        ),

        ErrorID::User_InvalidLogin => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny login",
            "description" => "Login może zawierać tylko znaki A-Z i cyfry 0-9"
        ),
        
        ErrorID::User_CreateComplete => array(
            "code" => ErrorTypes::SUCCESS,
             "title" => "Zaktualizowano użytkownika",
             "description" => "Pomyślnie zaktualizowano użytkownika"
        ),

        //Contact Room
        ErrorID::ContactRoom_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nie podano danych",
            "description" => "Nie podano danych dla nowej rozmowy"
        ),

        ErrorID::ContactRoom_EmptyTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty tytuł",
            "description" => "Tytuł rozmowy jest pusty"
        ),

        ErrorID::ContactRoom_EmptyOwner => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty założyciel",
            "description" => "Założyciel rozmowy jest niepoprawny"
        ),

        ErrorID::ContactRoom_InvalidTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny tytuł",
            "description" => "Tytuł rozmowy może zawierać tylko znaki A-Z wraz z polskimi znakami"
        ),
        
        ErrorID::ContactRoom_CreateComplete => array(
            "code" => ErrorTypes::SUCCESS,
             "title" => "Utworzono pokój",
             "description" => "Pomyślnie utworzono rozmowę"
        ),

        //Contact Message
        ErrorID::ContactMessage_DoesntExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nie podano danych",
            "description" => "Nie podano danych dla nowej wiadomości"
        ),

        ErrorID::ContactMessage_EmptyMessage => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusta wiadomość",
            "description" => "Wiadomość jest pusta"
        ),

        ErrorID::ContactMessage_EmptyAuthor => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty autor wiadomości",
            "description" => "Autor wiadomości jest niepoprawny"
        ),

        ErrorID::ContactMessage_EmptyRoom => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawna rozmowa",
            "description" => "Rozmowa do której chcesz dodać wiadomość jest niepoprawna"
        ),
        
        ErrorID::ContactMessage_CreateComplete => array(
            "code" => ErrorTypes::SUCCESS,
             "title" => "Utworzono wiadomość",
             "description" => "Dodano wiadomość do rozmowy"
        ),
    );
}
?>