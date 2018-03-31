<?php
class ErrorTemplates {
	public static $templates = array(

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

        ErrorTemplatesID::Config_UpdateSuccess => array(
            "code" => ErrorTypes::SUCCESS,
            "title" => "Zaktualizowano konfigurację",
            "description" => "Pomyślnie zaktualizowano konfigurację"
        )


        
    );
}
?>