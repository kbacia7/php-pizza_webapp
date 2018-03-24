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
        )
        
    );
}
?>