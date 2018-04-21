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
    const MenuItem_EmptyData = 6;
    const MenuItem_EmptyTitle = 7;
    const MenuItem_DoesntExists = 8;
    const MenuItem_InvalidTitle = 9;
    const MenuItem_InvalidPrice = 10;
    const MenuItem_RemoveComplete = 11;
    const MenuItem_UpdateComplete = 12;
    const MenuItem_CreateComplete = 13;
	
	//Config
    const Config_UpdateComplete = 14;
    const Config_EmptyPizzeriaName = 15;
	const Config_InvalidPizzeriaName = 16;
    const Config_LongPizzeriaName = 17;
    const Config_EmptyPizzeriaLocation = 18;
    const Config_InvalidPizzeriaLocation = 19;
    const Config_EmptyTelephone = 20;
    const Config_InvalidTelephone = 21;
    const Config_InvalidIconEx = 22;
    const Config_InvalidIconSize = 23;
	const Config_EmptyCurrency = 24;
    const Config_LongCurrency = 25;
    const Config_EmptyGalleryOne = 26;
    const Config_EmptyGalleryTwo = 27;
	
	//Gallery
    const Gallery_EmptyImageDescription = 28;
    const Gallery_InvalidImageSize = 29;
    const Gallery_InvalidImageEx = 30;
    const Gallery_ImageUploadedComplete = 31;
	
	//Notification
	const Notification_SendComplete = 32;
    const Notification_EmptyTitle = 35;
    const Notification_EmptyMessage = 37;
    const Notification_EmptyData = 99;

    //User
    const User_DoesntExists = 38;
    const User_EmptyData = 39;
    const User_EmptyAdmin = 40;
    const User_EmptyFirstName = 41;
    const User_EmptyLastName = 42;
    const User_InvalidFirstName = 43;
    const User_InvalidLastName = 44;
    const User_EmptyPassword = 45;
    const User_EmptyLogin = 46;
    const User_InvalidLogin = 47;
    const User_CreateComplete = 48;

    //Contact Messages
    const ContactMessage_DoesntExists = 49;
    const ContactMessage_EmptyMessage = 50;
    const ContactMessage_EmptyAuthor = 51;
    const ContactMessage_EmptyRoom = 52;
    const ContactMessage_CreateComplete = 53;

    //Contact Room
    const ContactRoom_DoesntExists = 54;
    const ContactRoom_EmptyTitle = 55;
    const ContactRoom_EmptyOwner = 56;
    const ContactRoom_InvalidTitle = 57;
    const ContactRoom_CreateComplete = 58;
}
?>