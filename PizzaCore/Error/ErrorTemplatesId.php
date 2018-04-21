<?php
abstract class ErrorTemplatesId
{
	//Menu category
    const MenuCategory_NoData = 0;
    const MenuCategory_NoTitle = 1;
    const MenuCategory_NoExists = 2;
    const MenuCategory_RemoveSuccess = 3;
    const MenuCategory_UpdateSuccess = 4;
    const MenuCategory_CreateSuccess = 5;
	
	//Menu item
    const MenuItem_NoData = 6;
    const MenuItem_NoTitle = 7;
    const MenuItem_NoExists = 8;
    const MenuItem_NoValidTitle = 9;
    const MenuItem_NoValidPrice = 10;
    const MenuItem_RemoveSuccess = 11;
    const MenuItem_UpdateSuccess = 12;
    const MenuItem_CreateSuccess = 13;
	
	//Config
    const Config_UpdateSuccess = 14;
    const Config_PizzeriaNull = 15;
	const Config_PizzeriaNoValid = 16;
    const Config_PizzeriaTooLong = 17;
    const Config_PizzeriaLocationEmpty = 18;
    const Config_PizzeriaLocationFormat = 19;
    const Config_TelephoneEmpty = 20;
    const Config_TelephoneFormat = 21;
    const Config_IconInvalid = 22;
    const Config_IconSizeTooMuch = 23;
	const Config_CurrencyEmpty = 24;
    const Config_CurrencyTooLong = 25;
    const Config_GalleryOneEmpty = 26;
    const Config_GalleryTwoEmpty = 27;
	
	//Gallery
    const Gallery_ImageDescriptionEmpty = 28;
    const Gallery_ImageSize = 29;
    const Gallery_ImageExtension = 30;
    const Gallery_ImageUploaded = 31;
	
	//Notification
	const Notification_SendSuccess = 32;
    const Notification_TitleInvalidChars = 34;
    const Notification_TitleEmpty = 35;
    const Notification_TitleTooLong = 36;
    const Notification_DescriptionEmpty = 37;
    
    //User
    const User_NoExists = 38;
    const User_NoData = 39;
    const User_NullAdmin = 40;
    const User_NullFirstName = 41;
    const User_NullLastName = 42;
    const User_NoValidFirstName = 43;
    const User_NoValidLastName = 44;
    const User_NullPassword = 45;
    const User_NullLogin = 46;
    const User_LoginInvalidChars = 47;
    const User_CreateSuccess = 48;

    //Contact Messages
    const ContactMessage_NoExists = 49;
    const ContactMessage_NullMessage = 50;
    const ContactMessage_NullAuthor = 51;
    const ContactMessage_NullRoom = 52;
    const ContactMessage_CreateSuccess = 53;

    //Contact Room
    const ContactRoom_NoExists = 54;
    const ContactRoom_NullTitle = 55;
    const ContactRoom_NullOwner = 56;
    const ContactRoom_NoValidTitle = 57;
    const ContactRoom_CreateSuccess = 58;
}
?>