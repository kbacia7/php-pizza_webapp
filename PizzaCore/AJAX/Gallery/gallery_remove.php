<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/PizzaCore/RequirePath.php';
RequirePath::include_();

$ID = isset($_POST['ID']) ? ($_POST['ID']) : null;
$response = array(
    'complete' => false,
    'allowed' => false,
);

if ($ID != null) {
    try {
        if (LoginGuard::isAdmin()) {
            $dArray = array("4k+", "FullHD2K", "laptops", "NormalPC", "smartphone", "tablets");
            $imgPath = $_SERVER['DOCUMENT_ROOT'] . 'images';
            $galleryToRemove = GalleryManager::load(array("ID" => $ID))[0];
            foreach ($dArray as $dName) {
                unlink(sprintf("%s/%s/gallery%d/%s", $imgPath, $dName, $galleryToRemove->getGalleryID(), $galleryToRemove->getPath()));
            }

            $response['complete'] = GalleryManager::remove(array("ID" => $ID));
            $response['allowed'] = true;
        }
    } catch (Exception $e) {
        $response['complete'] = false;
    }
}
echo json_encode($response);
