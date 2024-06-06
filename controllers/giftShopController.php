<?php
include_once("models/giftShop.php");
include_once("models/asset.php");

/**
 * Controller for the Gift Shop page.
 */
class GiftShopController {
    private $model;
    private $assetModel;

    /**
     * GiftShopController constructor.
     *
     * Initializes the gift shop model and asset model.
     */
    public function __construct() {
        $this->model = new GiftShopModel();
        $this->assetModel = new AssetModel();
    }

    /**
     * Displays the Gift Shop page.
     *
     * Retrieves business hours and assets, and includes the gift shop page view.
     */
    public function getGiftShopPage() {
        $businessHours = $this->model->getBusinessHours();
        $assets = $this->assetModel->getAssets();
        include_once('view/gift-shop.php');
    }
}