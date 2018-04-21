<?php
abstract class ErrorID
{
	//Menu category 
    const MenuCategory_EmptyData = 0;
    const MenuCategory_EmptyTitle = 1;
    const MenuCategory_DoesntExists = 2;
    const MenuCategory_RemoveComplete = 3;
    const MenuCategory_UpdateComplete = 4;
    const MenuCategory_CreateComplete = 5;
	
	//Menu item
    const MenuItem_EmptyData = 100;
    const MenuItem_EmptyTitle = 101;
    const MenuItem_DoesntExists = 102;
    const MenuItem_InvalidTitle = 103;
    const MenuItem_InvalidPrice = 104;
    const MenuItem_RemoveComplete = 105;
    const MenuItem_UpdateComplete = 106;
    const MenuItem_CreateComplete = 107;
	
	//Config
    const Config_UpdateComplete = 200;
    const Config_EmptyPizzeriaName = 201;
	const Config_InvalidPizzeriaName = 202;
    const Config_LongPizzeriaName = 203;
    const Config_EmptyPizzeriaLocation = 204;
    const Config_InvalidPizzeriaLocation = 205;
    const Config_EmptyTelephone = 206;
    const Config_InvalidTelephone = 27;
    const Config_InvalidIconEx = 208;
    const Config_InvalidIconSize = 209;
	const Config_EmptyCurrency = 210;
    const Config_LongCurrency = 211;
    const Config_EmptyGalleryOne = 212;
    const Config_EmptyGalleryTwo = 213;
	
	//Gallery
    const Gallery_EmptyImageDescription = 300;
    const Gallery_InvalidImageSize = 301;
    const Gallery_InvalidImageEx = 302;
    const Gallery_ImageUploadedComplete = 303;
	
	//Notification
	const Notification_SendComplete = 400;
    const Notification_EmptyTitle = 401;
    const Notification_EmptyMessage = 402;
    const Notification_EmptyData = 403;

    //User
    const User_DoesntExists = 500;
    const User_EmptyData = 501;
    const User_EmptyAdmin = 502;
    const User_EmptyFirstName = 503;
    const User_EmptyLastName = 504;
    const User_InvalidFirstName = 505;
    const User_InvalidLastName = 506;
    const User_EmptyPassword = 507;
    const User_EmptyLogin = 508;
    const User_InvalidLogin = 509;
    const User_CreateComplete = 510;

    //Contact Messages
    const ContactMessage_DoesntExists = 600;
    const ContactMessage_EmptyMessage = 601;
    const ContactMessage_EmptyAuthor = 602;
    const ContactMessage_EmptyRoom = 603;
    const ContactMessage_CreateComplete = 604;

    //Contact Room
    const ContactRoom_DoesntExists = 700;
    const ContactRoom_EmptyTitle = 701;
    const ContactRoom_EmptyOwner = 702;
    const ContactRoom_InvalidTitle = 703;
    const ContactRoom_CreateComplete = 704;
}
?>