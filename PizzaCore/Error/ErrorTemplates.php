<?php
class ErrorTemplates {
	public static $templates = array(

		//Menu Category
        ErrorTemplatesId::MenuCategory_NoData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Brak danych",
            "description" => "Brak danych wymaganych do zaktualizowania kategorii"
        ),

        ErrorTemplatesId::MenuCategory_NoTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwy tytuł",
            "description" => "Musisz podać tytuł"
        ),

        ErrorTemplatesId::MenuCategory_NoExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Kategoria nie istnieje",
            "description" => "Wygląda na to że podana kategoria nie istnieje"
        ),
		
		ErrorTemplatesID::MenuCategory_RemoveSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Usunięto kategorię",
            "description" => "Pomyślnie usunięto kategorię menu"
        ),

        ErrorTemplatesID::MenuCategory_UpdateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano tytuł kategorii",
            "description" => "Pomyślnie zaktualizowano tytuł kategorii menu"
        ),

        ErrorTemplatesID::MenuCategory_CreateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Utworzono kategorię",
            "description" => "Pomyślnie utworzono kategorię menu"
        ),
		
		//Menu item
        ErrorTemplatesId::MenuItem_NoData => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Brak danych",
            "description" => "Brak danych wymaganych do zaktualizowania elementu menu"
        ),

        ErrorTemplatesId::MenuItem_NoTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwy tytuł",
            "description" => "Musisz podać tytuł"
        ),

        ErrorTemplatesId::MenuItem_NoExists => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Element menu nie istnieje",
            "description" => "Wygląda na to że podany element menu nie istnieje"
        ),

        ErrorTemplatesID::MenuItem_NoValidTitle => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny tytuł",
            "description" => "Wygląda na to że podany tytuł jest nieprawdiłowy"
        ),

        ErrorTemplatesID::MenuItem_NoValidPrice => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny format ceny",
            "description" => "Wygląda na to że podany format ceny jest nieprawidłowy"
        ),

        ErrorTemplatesID::MenuItem_RemoveSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Usunięto element menu",
            "description" => "Pomyślnie usunięto element menu"
        ),

        ErrorTemplatesID::MenuItem_UpdateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano element menu",
            "description" => "Pomyślnie zaktualizowano element menu"
        ),

        ErrorTemplatesID::MenuItem_CreateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Utworzono element menu",
            "description" => "Pomyślnie utworzono element menu"
        ),

		//Config
        ErrorTemplatesID::Config_UpdateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano konfigurację",
            "description" => "Pomyślnie zaktualizowano konfigurację"
        ),
		
		ErrorTemplatesID::Config_PizzeriaNull => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusta nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może być pusta"
        ),
		
		ErrorTemplatesID::Config_PizzeriaNoValid => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwa nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może zawierać znaków specjalnych"
        ),
		
		ErrorTemplatesID::Config_PizzeriaTooLong => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niewłaściwa nazwa pizzerii",
            "description" => "Nazwa pizzerri nie może za długa (maks. 30 znaków)"
        ),
		
		ErrorTemplatesID::Config_PizzeriaLocationEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Puste współrzędne",
            "description" => "Współrzędne pizzerii nie mogą pozostawać puste"
        ),
		
		ErrorTemplatesID::Config_PizzeriaLocationFormat => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nieprawidłowy format współrzędnych",
            "description" => "Współrzędne mają niepoprawny format, poprawne współrzędne można pobrać z Google Map"
        ),
		
		ErrorTemplatesID::Config_TelephoneEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty numer telefonu",
            "description" => "Numer telefonu kontaktowego nie może pozostawać pusty"
        ),
		
		ErrorTemplatesID::Config_TelephoneFormat => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Nieprawidłowy format numeru telefonu",
            "description" => "Numer telefonu ma niepoprawny format"
        ),
		
		ErrorTemplatesID::Config_IconInvalid => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawne rozszerzenie ikonki",
            "description" => "Ikonka ma niepoprawne rozszerzenie"
        ),
		
		ErrorTemplatesID::Config_IconSizeTooMuch => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Za duża ikonka",
            "description" => "Ikonka jest za duża, domyślnie PHP akceptuje do 2MB"
        ),
		
		ErrorTemplatesID::Config_CurrencyEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Waluta jest pusta",
            "description" => "Symbol waluty nie może być pusty"
        ),
		
		ErrorTemplatesID::Config_CurrencyTooLong => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Symbol waluty jest za długi",
            "description" => "Symbol waluty ma za dużo znaków"
        ),
		
		ErrorTemplatesID::Config_GalleryOneEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis pierwszej galerii",
            "description" => "Opis pierwszej galerii nie może byc pusty"
        ),
		
		ErrorTemplatesID::Config_GalleryTwoEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis drugiej galerii",
            "description" => "Opis drugiej galerii nie może byc pusty"
        ),
		
		
		//Gallery
		ErrorTemplatesID::Gallery_ImageDescriptionEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Opis zdjecia w galerii",
            "description" => "Opis zdjęcia w galerii nie może być pusty"
        ),
		
		ErrorTemplatesID::Gallery_ImageSize => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Rozmiar zdjecia galerii",
            "description" => "Rozmiar zdjęcia w galerii nie może być większy niż 2 MB"
        ),
		
		ErrorTemplatesID::Gallery_ImageExtension => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Rozszerzenie zdjecia galerii",
            "description" => "Zdjęcie w galerii prawdopodobnie ma błędne rozszerzenie"
        ),
		
		ErrorTemplatesID::Gallery_ImageUploaded => array(
           "code" => ErrorTypes::SUCCESS,
            "title" => "Dodano zdjęcie do galerii",
            "description" => "Pomyślnie dodano zdjęcie do galerii"
        ),
		
		//Notification
        ErrorTemplatesId::Notification_SendSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Wysłano powiadomienie",
            "description" => "Pomyślnie wysłano powiadomienie"
        ),
		
		ErrorTemplatesId::Notification_TitleInvalidChars => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Niepoprawny tytuł powiadomienia",
            "description" => "Powiadomienie posiada niepoprawne znaki specjalne w tytule"
        ),
		
		ErrorTemplatesId::Notification_TitleEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty tytuł powiadomienia",
            "description" => "Tytuł powiadomienia nie może być pusty"
        ),
		
		ErrorTemplatesId::Notification_TitleTooLong => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Za długi tytuł powiadomienia",
            "description" => "Tytuł powiadomienia jest za długi (maks. 40 znaków)"
        ),
		
		ErrorTemplatesId::Notification_DescriptionEmpty => array(
            "code" => ErrorTypes::ERROR,
            "title" => "Pusty tekst powiadomienia",
            "description" => "Tekst powiadomienia nie może pozostać pusty"
        )
        
    );
}
?>