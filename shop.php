<!DOCTYPE html>
<html lang="en">

<?php

use Classes\ActivityView;
use Classes\CategoryView;
use Classes\EpisodeView;
use Classes\PhotoView;
use Classes\UserPostView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\SeriesView;
use Classes\UserView;
use Classes\Utilities;

include "vendor/autoload.php";

$utilityObj = new Utilities();
$userObj = new UserView();
$episodeObj = new EpisodeView();
$seriesObj = new SeriesView();
$categoriesObj = new CategoryView();
$postObj = new UserPostView();
$relationObj = new RelationshipView();
$progressObj = new ProgressTrackView();
$activityObj = new ActivityView();
$photoObj = new PhotoView();

?>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Shop | NerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="../cdn.jsdelivr.net/npm/fontisto%40v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
</head>

<body>

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="app-overlay"></div>

    <?php include "includes/frontEnd/main-navbar.php"; ?>

    <div class="view-wrapper">

        <div class="products-navigation">
            <div class="container">
                <div class="navigation-inner">
                    <div class="shop-info">
                        <img src="assets/img/icons/logos/store.svg" alt="">
                        <h3>Iconic's Store</h3>
                    </div>
                    <div class="shop-actions">
                        <a data-panel="categories-panel" class="shop-action">
                            <span>Categories</span>
                            <i data-feather="chevron-down"></i>
                        </a>
                        <a data-panel="filters-panel" class="shop-action">
                            <span>Filters</span>
                            <i data-feather="chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div id="categories-panel" class="navigation-panel is-categories">
            <div class="navigation-panel-inner">
                <div class="container">
                    <div class="panel-title">
                        <h3>Categories</h3>
                    </div>
                    <div class="shop-categories">
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection" checked>
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/all.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/all-dark.svg" alt="">
                                <h4>All</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/men.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/men-dark.svg" alt="">
                                <h4>Men</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/skirt.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/skirt-dark.svg" alt="">
                                <h4>Women</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/hat.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/hat-dark.svg" alt="">
                                <h4>Hats</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/backpack.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/backpack-dark.svg" alt="">
                                <h4>Bags</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/shoes.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/shoes-dark.svg" alt="">
                                <h4>Shoes</h4>
                            </div>
                        </div>
                        <!--Category-->
                        <div class="category-item">
                            <input type="radio" name="category_selection">
                            <div class="item-inner">
                                <img class="light-image" src="assets/img/icons/shop/clock.svg" alt="">
                                <img class="dark-image" src="assets/img/icons/shop/clock-dark.svg" alt="">
                                <h4>Accessories</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="filters-panel" class="navigation-panel is-filters">
            <div class="navigation-panel-inner">
                <div class="container">
                    <div class="search-filter">
                        <div class="control has-icon">
                            <input type="text" class="input is-fade" placeholder="Filter products...">
                            <div class="form-icon">
                                <i data-feather="filter"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <!--Filter-->
                        <div class="control is-combo">
                            <div class="combo-box">
                                <div class="box-inner">
                                    <div class="combo-item">
                                        <i class="mdi mdi-currency-usd"></i>
                                        <span class="selected-item">Price</span>
                                    </div>
                                </div>
                                <div class="box-chevron">
                                    <i data-feather="chevron-down"></i>
                                </div>
                                <div class="box-dropdown">
                                    <div class="dropdown-inner has-slimscroll">
                                        <ul>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </span>
                                                <span class="item-name">Free</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </span>
                                                <span class="item-name">$0 - $25</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </span>
                                                <span class="item-name">$26 - $100</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </span>
                                                <span class="item-name">$100 +</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Filter-->
                        <div class="control is-combo">
                            <div class="combo-box">
                                <div class="box-inner">
                                    <div class="combo-item">
                                        <i class="mdi mdi-sort"></i>
                                        <span class="selected-item">Sort</span>
                                    </div>
                                </div>
                                <div class="box-chevron">
                                    <i data-feather="chevron-down"></i>
                                </div>
                                <div class="box-dropdown">
                                    <div class="dropdown-inner has-slimscroll">
                                        <ul>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-sort-ascending"></i>
                                                </span>
                                                <span class="item-name">Ascending</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-sort-descending"></i>
                                                </span>
                                                <span class="item-name">Descending</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Filter-->
                        <div class="control is-combo">
                            <div class="combo-box">
                                <div class="box-inner">
                                    <div class="combo-item">
                                        <i class="mdi mdi-filter-outline"></i>
                                        <span class="selected-item">Other</span>
                                    </div>
                                </div>
                                <div class="box-chevron">
                                    <i data-feather="chevron-down"></i>
                                </div>
                                <div class="box-dropdown">
                                    <div class="dropdown-inner has-slimscroll">
                                        <ul>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-comment-search-outline"></i>
                                                </span>
                                                <span class="item-name">Popular</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-creation"></i>
                                                </span>
                                                <span class="item-name">Best Sellers</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="item-icon">
                                                    <i class="mdi mdi-comment-eye-outline"></i>
                                                </span>
                                                <span class="item-name">On Sale</span>
                                                <span class="checkmark">
                                                    <i data-feather="check"></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shop-page" class="shop-wrapper">

            <div class="shop-header">
                <div class="container">
                    <div class="header-inner">
                        <div class="store-block">
                            <div class="img-container">
                                <img src="assets/img/icons/logos/store.svg" alt="">
                                <div class="follow-badge is-hidden">
                                    <i data-feather="check"></i>
                                </div>
                            </div>
                            <div class="store-meta">
                                <h3>Iconic</h3>
                                <span>Quick fashion for everyone</span>
                            </div>
                        </div>

                        <div class="activity-block">
                            <h3>Overview</h3>

                            <div class="inner-wrap">
                                <div class="stat-block">
                                    <div class="stat-number">252</div>
                                    <span>Products</span>
                                </div>
                                <div class="stat-block is-bordered">
                                    <div class="stat-number">4.7K</div>
                                    <span>Likes</span>
                                </div>
                                <div class="stat-block">
                                    <div class="stat-number">2.1K</div>
                                    <span>Followers</span>
                                </div>
                            </div>
                        </div>

                        <div class="about-block">
                            <h3>About Us</h3>
                            <div class="ellipse-text">We are an independent fashion store and we sale finely designed
                                and handcrafted outfits for the best price. Browse our collection and discover our products.</div>
                        </div>
                    </div>

                    <div class="store-tabs">
                        <a data-tab="products-tab" class="tab-control is-active">Products</a>
                        <a data-tab="brands-tab" class="tab-control">Brands</a>
                        <a data-tab="followers-tab" class="tab-control">Followers</a>
                        <div class="store-naver"></div>
                    </div>
                </div>
            </div>

            <div class="store-sections">
                <div class="container">

                    <!--Products-->
                    <div id="products-tab" class="store-tab-pane is-active">
                        <div class="columns is-multiline">
                            <!-- /partials/commerce/products/products-list.html -->
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Spring Red Dress" data-price="44.00" data-colors="true" data-variants="true" data-path="assets/img/products/1">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/1.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Spring Red Dress</h3>
                                        <p>A beautiful dress for you best evenings and important dates</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>147</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$44.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Cool Shirt" data-price="29.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/2.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Cool Shirt</h3>
                                        <p>A shirt that will make you look nice and feel relax</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>42</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$29.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Military Short" data-price="39.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/3.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Military Short</h3>
                                        <p>An awesome shorts for chillout and trips, blends in with anything</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>56</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$39.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Cool Backpack" data-price="125.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/4.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Cool Backpack</h3>
                                        <p>Feeling adventurous? You got to try this awesome backpack</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>212</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$125.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The Bob" data-price="15.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/5.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The Bob</h3>
                                        <p>Everyone needs a nice bob to protect himself from the sun</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>18</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$15.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The Girly Top" data-price="34.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/6.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The Girly Top</h3>
                                        <p>Wanna look nice and fresh? Why not try this beautiful top</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>92</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$34.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The T-Shirt" data-price="18.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/7.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The T-Shirt</h3>
                                        <p>A nice t-shirt that goes everywhere with anything, try it</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>269</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$18.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The Gala Dress" data-price="89.00" data-colors="true" data-variants="true" data-path="assets/img/products/8">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/8.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The Gala Dress</h3>
                                        <p>A beautiful dress for your business evenings and meetings</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>66</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$89.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The Totte Bag" data-price="112.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/9.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The Totte Bag</h3>
                                        <p>Classy, elegant and simple, this bag has anything you need</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>423</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$112.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Jeans Skirt" data-price="55.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/10.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Jeans Skirt</h3>
                                        <p>A beautiful skirt made with jeans for urban outfits</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>48</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$55.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Straw Hat" data-price="14.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/11.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Straw Hat</h3>
                                        <p>The classic straw hat, beautifully crafted, for your beach trips</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>157</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$14.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="The Polo" data-price="45.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/12.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>The Polo</h3>
                                        <p>A classic but elegant polo for chill outfits</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>74</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$45.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Urbanic Shoes" data-price="99.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/13.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Urbanic Shoes</h3>
                                        <p>Nice shoes that you can wear with almost anything</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>145</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$99.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Chill Shoes" data-price="90.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/14.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Chill Shoes</h3>
                                        <p>Nice shoes that you can wear with almost anything</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>21</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$90.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Skaters" data-price="85.00" data-colors="false" data-variants="true">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/15.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Skaters</h3>
                                        <p>Nice shoes that you can wear with almost anything</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>43</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$85.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Rabbit Toddler" data-price="50.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/16.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Rabbit Toddler</h3>
                                        <p>A really cute and carefully crafted outfit for your little ones</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>269</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$50.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Fox Toddler" data-price="50.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/17.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Fox Toddler</h3>
                                        <p>A really cute and carefully crafted outfit for your little ones</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>291</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$50.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Rainbow Top" data-price="36.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/18.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Rainbow Top</h3>
                                        <p>A really cute and carefully crafted outfit for your little ones</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>118</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$36.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Purple Overalls" data-price="65.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/19.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Purple Overalls</h3>
                                        <p>A nice and cute overall that can be worn with almost anything</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>78</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$65.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Cute Jeans" data-price="42.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/20.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Cute Jeans</h3>
                                        <p>A beautiful and nicely handcrafted product for your kids</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>88</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$42.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Glassy Mod. A" data-price="32.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/21.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Glassy Mod. A</h3>
                                        <p>The Glassy brands returns with it's usual outstanding quality</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>43</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$32.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Glassy Mod. B" data-price="28.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/22.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Glassy Mod. B</h3>
                                        <p>The Glassy brands returns with it's usual outstanding quality</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>12</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$28.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Glassy Mod. C" data-price="36.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/23.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Glassy Mod. C</h3>
                                        <p>The Glassy brands returns with it's usual outstanding quality</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>41</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$36.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Glassy Mod. D" data-price="24.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/24.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Glassy Mod. D</h3>
                                        <p>The Glassy brands returns with it's usual outstanding quality</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>19</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$24.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="product-card" data-name="Glassy Mod. E" data-price="43.00" data-colors="false" data-variants="false">
                                    <a class="quickview-trigger">
                                        <i data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="product-image">
                                        <img src="assets/img/products/25.svg" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h3>Glassy Mod. E</h3>
                                        <p>The Glassy brands returns with it's usual outstanding quality</p>
                                    </div>
                                    <div class="product-actions">
                                        <div class="left">
                                            <i data-feather="heart"></i>
                                            <span>96</span>
                                        </div>
                                        <div class="right">
                                            <a class="button is-solid accent-button raised">
                                                <i data-feather="shopping-cart"></i>
                                                <span>$43.00</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Followers-->
                    <div id="followers-tab" class="store-tab-pane">
                        <div class="columns is-multiline followers-wrap">
                            <!-- /partials/commerce/products/products-followers.html -->
                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    </div>
                                    <h3>Jenna Davis</h3>
                                    <p>From Melbourne</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                    </div>
                                    <h3>Dan Walker</h3>
                                    <p>From New York</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2" alt="">
                                    </div>
                                    <h3>Stella Bergmann</h3>
                                    <p>From Berlin</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3" alt="">
                                    </div>
                                    <h3>Daniel Wellington</h3>
                                    <p>From London</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                                    </div>
                                    <h3>Nelly Schwartz</h3>
                                    <p>From Melbourne</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                    </div>
                                    <h3>Milly Augustine</h3>
                                    <p>From Rome</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                    </div>
                                    <h3>David Kim</h3>
                                    <p>From Chicago</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="">
                                    </div>
                                    <h3>Elise Walker</h3>
                                    <p>From London</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/rolf.jpg" data-user-popover="13" alt="">
                                    </div>
                                    <h3>Rolf Krupp</h3>
                                    <p>From Berlin</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/ken.jpg" data-user-popover="14" alt="">
                                    </div>
                                    <h3>Ken Rogers</h3>
                                    <p>From Chicago</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/lana.jpeg" data-user-popover="10" alt="">
                                    </div>
                                    <h3>Lana Henrikssen</h3>
                                    <p>From Helsinki</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/leana.jpg" data-user-popover="15" alt="">
                                    </div>
                                    <h3>Leana Marks</h3>
                                    <p>From Nashville</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/mike.jpg" data-user-popover="17" alt="">
                                    </div>
                                    <h3>Mike Donovan</h3>
                                    <p>From San Francisco</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/azzouz.jpg" data-user-popover="20" alt="">
                                    </div>
                                    <h3>Azzouz El Paytoun</h3>
                                    <p>From Montreal</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    </div>
                                    <h3>Edward Mayers</h3>
                                    <p>From Dublin</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/gaelle.jpeg" data-user-popover="11" alt="">
                                    </div>
                                    <h3>Gaelle Morris</h3>
                                    <p>From Lyon</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/bobby.jpg" data-user-popover="8" alt="">
                                    </div>
                                    <h3>Bobby Brown</h3>
                                    <p>From Paris</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/cathy.png" data-user-popover="21" alt="">
                                    </div>
                                    <h3>Cathy Smith</h3>
                                    <p>From Seattle</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/bob.png" data-user-popover="22" alt="">
                                    </div>
                                    <h3>Bob Barker</h3>
                                    <p>From Tijuana</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/hisashi.jpg" data-user-popover="24" alt="">
                                    </div>
                                    <h3>Hisashi Yokida</h3>
                                    <p>From Tokyo</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/aline.jpg" data-user-popover="16" alt="">
                                    </div>
                                    <h3>Aline Cambell</h3>
                                    <p>From Seattle</p>
                                </div>
                            </div>

                            <!--Follower-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="follower-block">
                                    <div class="avatar-container">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/brian.jpg" data-user-popover="19" alt="">
                                    </div>
                                    <h3>Brian Stevenson</h3>
                                    <p>From Seattle</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Brands-->
                    <div id="brands-tab" class="store-tab-pane">
                        <div class="columns is-multiline">
                            <!-- /partials/commerce/products/products-brands.html -->
                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/1.svg" alt="">
                                    <div class="meta">
                                        <h3>Adventure</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/2.svg" alt="">
                                    <div class="meta">
                                        <h3>Ludicrous</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/3.svg" alt="">
                                    <div class="meta">
                                        <h3>Fashion Store</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/4.svg" alt="">
                                    <div class="meta">
                                        <h3>Anna Morris</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/5.svg" alt="">
                                    <div class="meta">
                                        <h3>Explorer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Brand-->
                            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                                <div class="brand-card">
                                    <img src="assets/img/icons/shop/brands/6.svg" alt="">
                                    <div class="meta">
                                        <h3>Cherry Pick</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="brand-stats">
                                        <div class="brand-stat">
                                            <span>10</span>
                                            <span>Products</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>800</span>
                                            <span>Sales</span>
                                        </div>
                                        <div class="brand-stat">
                                            <span>4K</span>
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div id="product-quickview" class="modal product-quickview is-large has-light-bg">
            <div class="modal-background quickview-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="quickview-loader is-active">
                        <div class="loader is-loading"></div>
                    </div>
                    <div class="left">
                        <div class="product-image is-active">
                            <img src="assets/img/products/1.svg" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="header">
                            <div class="product-info">
                                <h3 id="quickview-name">Product Name</h3 id="quickview-price">
                                <p>Product tagline text</p>
                            </div>
                            <div id="quickview-price" class="price">
                                27.00
                            </div>
                        </div>
                        <div class="properties">
                            <!--Colors-->
                            <div id="color-properties" class="property-group is-hidden">
                                <h4>Colors</h4>
                                <div class="property-box is-colors">
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="red">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-red"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="blue">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-blue"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="green">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-green"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_colors" id="yellow">
                                        <div class="item-inner">
                                            <div class="color-dot">
                                                <div class="dot-inner is-yellow"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Colors-->
                            <div id="size-properties" class="property-group">
                                <h4>Sizes</h4>
                                <div class="property-box is-sizes">
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="S">
                                        <div class="item-inner">
                                            <span class="size-label">S</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="M" checked>
                                        <div class="item-inner">
                                            <span class="size-label">M</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="L">
                                        <div class="item-inner">
                                            <span class="size-label">L</span>
                                        </div>
                                    </div>
                                    <!--item-->
                                    <div class="property-item">
                                        <input type="radio" name="quickview_sizes" id="XL">
                                        <div class="item-inner">
                                            <span class="size-label">XL</span>
                                        </div>
                                    </div>
                                </div>
                            </div id="color-properties">
                        </div>

                        <!--Description-->
                        <div class="quickview-description content has-slimscroll">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Scrupulum, inquam, abeunti; Ubi ut eam
                                caperet aut quando? Erat enim
                                Polemonis. Utram tandem linguam nescio? Duo Reges: constructio interrete. </p>

                            <p>Alio modo Non est igitur voluptas bonum. Estne, quaeso, inquam, sitienti in bibendo
                                voluptas? Erat enim Polemonis. Minime vero,
                                inquit ille, consentit. Hic ambiguo ludimur. Numquam facies. Ea possunt paria non esse. </p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Scrupulum, inquam, abeunti; Ubi ut eam
                                caperet aut quando? Erat enim
                                Polemonis. Utram tandem linguam nescio? Duo Reges: constructio interrete.</p>
                        </div>

                        <div class="quickview-controls">
                            <div class="spinner">
                                <button class="remove">
                                    <i data-feather="minus"></i>
                                </button>
                                <span class="value">1</span>
                                <button class="add">
                                    <i data-feather="plus"></i>
                                </button>
                                <input class="spinner-input" type="hidden" value="1">
                            </div>
                            <a class="button is-solid accent-button raised">
                                <span>Add To Cart</span>
                                <var id="quickview-button-price">27.00</var>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="chat-wrapper">
        <div class="chat-inner">

            <!-- Chat top navigation -->
            <div class="chat-nav">
                <div class="nav-start">
                    <div class="recipient-block">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        </div>
                        <div class="username">
                            <span>Dan Walker</span>
                            <span><i data-feather="star"></i> <span>| Online</span></span>
                        </div>
                    </div>
                </div>
                <div class="nav-end">

                    <!-- Settings icon dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon">
                                <i data-feather="settings"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="message-square"></i>
                                        <div class="media-content">
                                            <h3>Details</h3>
                                            <small>View this conversation's details.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="settings"></i>
                                        <div class="media-content">
                                            <h3>Preferences</h3>
                                            <small>Define your preferences.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell"></i>
                                        <div class="media-content">
                                            <h3>Notifications</h3>
                                            <small>Set notifications settings.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell-off"></i>
                                        <div class="media-content">
                                            <h3>Silence</h3>
                                            <small>Disable notifications.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="box"></i>
                                        <div class="media-content">
                                            <h3>Archive</h3>
                                            <small>Archive this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="trash-2"></i>
                                        <div class="media-content">
                                            <h3>Delete</h3>
                                            <small>Delete this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-search">
                        <div class="control has-icon">
                            <input type="text" class="input" placeholder="Search messages">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="at-sign"></i>
                    </a>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="star"></i>
                    </a>

                    <!-- More dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon no-margin">
                                <i data-feather="more-vertical"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="file-text"></i>
                                        <div class="media-content">
                                            <h3>Files</h3>
                                            <small>View all your files.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="users"></i>
                                        <div class="media-content">
                                            <h3>Users</h3>
                                            <small>View all users you're talking to.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="gift"></i>
                                        <div class="media-content">
                                            <h3>Daily bonus</h3>
                                            <small>Get your daily bonus.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="download-cloud"></i>
                                        <div class="media-content">
                                            <h3>Downloads</h3>
                                            <small>See all your downloads.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="life-buoy"></i>
                                        <div class="media-content">
                                            <h3>Support</h3>
                                            <small>Reach our support team.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon close-chat">
                        <i data-feather="x"></i>
                    </a>
                </div>
            </div>
            <!-- Chat sidebar -->
            <div id="chat-sidebar" class="users-sidebar">
                <!-- Header -->
                <div class="header-item">
                    <img class="light-image" src="assets/img/logo/friendkit-bold.svg" alt="">
                    <img class="dark-image" src="assets/img/logo/friendkit-white.svg" alt="">
                </div>
                <!-- User list -->
                <div class="conversations-list has-slimscroll-xs">
                    <!-- User -->
                    <div class="user-item is-active" data-chat-user="dan" data-full-name="Dan Walker" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="stella" data-full-name="Stella Bergmann" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="daniel" data-full-name="Daniel Wellington" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="david" data-full-name="David Kim" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="edward" data-full-name="Edward Mayers" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="elise" data-full-name="Elise Walker" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="nelly" data-full-name="Nelly Schwartz" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="milly" data-full-name="Milly Augustine" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                </div>
                <!-- Add Conversation -->
                <div class="footer-item">
                    <div class="add-button modal-trigger" data-modal="add-conversation-modal"><i data-feather="user"></i></div>
                </div>
            </div>

            <!-- Chat body -->
            <div id="chat-body" class="chat-body is-opened">
                <!-- Conversation with Dan -->
                <div id="dan-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">Hi Jenna! I made a new design, and i wanted to show it to you.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:12am</span>
                            <div class="message-text">Oh really??! I want to see that.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:13am</span>
                            <div class="message-text">FYI it was done in less than a day.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:17am</span>
                            <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:18am</span>
                            <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Stella -->
                <div id="stella-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:34am</span>
                            <div class="message-text">Hey Stella! Aren't we supposed to go the theatre after work?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:37am</span>
                            <div class="message-text">Just remembered it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                        <div class="message-block">
                            <span>11:22am</span>
                            <div class="message-text">Yeah you always do that, forget about everything.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Daniel -->
                <div id="daniel-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Yesterday</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>3:24pm</span>
                            <div class="message-text">Daniel, Amanda told me about your issue, how can I help?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:42pm</span>
                            <div class="message-text">Hey Jenna, thanks for answering so quickly. Iam stuck, i need a car.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:43pm</span>
                            <div class="message-text">Can i borrow your car for a quick ride to San Fransisco? Iam running behind and
                                there' no train in sight.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with David -->
                <div id="david-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:34pm</span>
                            <div class="message-text">Damn you! Why would you even implement this in the game?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:32pm</span>
                            <div class="message-text">I just HATE aliens.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:09pm</span>
                            <div class="message-text">C'mon, you just gotta learn the tricks. You can't expect aliens to behave like
                                humans. I mean that's how the mechanics are.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:11pm</span>
                            <div class="message-text">I checked the replay and for example, you always get supply blocked. That's not
                                the right thing to do.</div>
                        </div>
                    </div>
                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>13:12pm</span>
                            <div class="message-text">I know but i struggle when i have to decide what to make from larvas.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:17pm</span>
                            <div class="message-text">Join me in game, i'll show you.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="edward-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Monday</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:55pm</span>
                            <div class="message-text">Hey Jenna, what's up?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:56pm</span>
                            <div class="message-text">Iam coming to LA tomorrow. Interested in having lunch?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:21pm</span>
                            <div class="message-text">Hey mate, it's been a while. Sure I would love to.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">Ok. Let's say i pick you up at 12:30 at work, works?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:43pm</span>
                            <div class="message-text">Yup, that works great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:44pm</span>
                            <div class="message-text">And yeah, don't forget to bring some of my favourite cheese cake.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">No worries</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="elise-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 28</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">Elise, i forgot my folder at your place yesterday.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">I need it badly, it's work stuff.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                        <div class="message-block">
                            <span>12:19pm</span>
                            <div class="message-text">Yeah i noticed. I'll drop it in half an hour at your office.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Nelly -->
                <div id="nelly-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 17</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">So you watched the movie?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">Was it scary?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                        <div class="message-block">
                            <span>9:03pm</span>
                            <div class="message-text">It was so frightening, i felt my heart was about to blow inside my chest.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Milly -->
                <div id="milly-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Hello Jenna, did you read my proposal?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Didn't hear from you since i sent it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:02pm</span>
                            <div class="message-text">Hello Milly, Iam really sorry, Iam so busy recently, but i had the time to read
                                it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:04pm</span>
                            <div class="message-text">And what did you think about it?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:05pm</span>
                            <div class="message-text">Actually it's quite good, there might be some small changes but overall it's
                                great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:07pm</span>
                            <div class="message-text">I think that i can give it to my boss at this stage.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:09pm</span>
                            <div class="message-text">Crossing fingers then</div>
                        </div>
                    </div>
                </div>
                <!-- Compose message area -->
                <div class="chat-action">
                    <div class="chat-action-inner">
                        <div class="control">
                            <textarea class="textarea comment-textarea" rows="1"></textarea>
                            <div class="dropdown compose-dropdown is-spaced is-accent is-up dropdown-trigger">
                                <div>
                                    <div class="add-button">
                                        <div class="button-inner">
                                            <i data-feather="plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="code"></i>
                                                <div class="media-content">
                                                    <h3>Code snippet</h3>
                                                    <small>Add and paste a code snippet.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="file-text"></i>
                                                <div class="media-content">
                                                    <h3>Note</h3>
                                                    <small>Add and paste a note.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="server"></i>
                                                <div class="media-content">
                                                    <h3>Remote file</h3>
                                                    <small>Add a file from a remote drive.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="monitor"></i>
                                                <div class="media-content">
                                                    <h3>Local file</h3>
                                                    <small>Add a file from your computer.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="chat-panel" class="chat-panel is-opened">
                <div class="panel-inner">
                    <div class="panel-header">
                        <h3>Details</h3>
                        <div class="panel-close">
                            <i data-feather="x"></i>
                        </div>
                    </div>

                    <!-- Dan details -->
                    <div id="dan-details" class="panel-body is-user-details">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Dan Walker</h3>
                                <h4>IOS Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">WebSmash Inc.</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-school"></i>
                                    <div class="about-text">
                                        <span>Studied at</span>
                                        <span><a class="is-inverted" href="#">Riverdale University</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Stella details -->
                    <div id="stella-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Stella Bergmann</h3>
                                <h4>Shop Owner</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-purple">
                                    <div>
                                        <i class="mdi mdi-bomb"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-check-decagram"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Trending Fashions</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Oklahoma City</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Daniel details -->
                    <div id="daniel-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Daniel Wellington</h3>
                                <h4>Senior Executive</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-google-cardboard"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-pizza"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-linux"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-puzzle"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Peelman & Sons</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Los Angeles</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- David details -->
                    <div id="david-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>David Kim</h3>
                                <h4>Senior Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Frost Entertainment</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Chicago</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Edward details -->
                    <div id="edward-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Edward Mayers</h3>
                                <h4>Financial analyst</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Brettmann Bank</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Santa Fe</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Elise details -->
                    <div id="elise-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Elise Walker</h3>
                                <h4>Social influencer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Social Media</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">London</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Nelly details -->
                    <div id="nelly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Nelly Schwartz</h3>
                                <h4>HR Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Carrefour</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Melbourne</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Milly details -->
                    <div id="milly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Milly Augustine</h3>
                                <h4>Sales Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Salesforce</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Seattle</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-conversation-modal" class="modal add-conversation-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>New Conversation</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                            <i data-feather="x"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body">

                    <img src="assets/img/icons/chat/bubbles.svg" alt="">

                    <div class="field is-autocomplete">
                        <div class="control has-icon">
                            <input type="text" class="input simple-users-autocpl" placeholder="Search a user">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="help-text">
                        Select a user to start a new conversation. You'll be able to add other users later.
                    </div>

                    <div class="action has-text-centered">
                        <button type="button" class="button is-solid accent-button raised">Start conversation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/frontEnd/explore-menu.php"; ?>

    <div id="end-tour-modal" class="modal end-tour-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3></h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                            <i data-feather="x"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body has-text-centered">

                    <div class="image-wrap">
                        <img src="assets/img/logo/friendkit.svg" alt="">
                    </div>

                    <h3>That's all folks!</h3>
                    <p>Thanks for taking the friendkit tour. There are still tons of other features for you to discover!</p>

                    <div class="action">
                        <a href="index.php#demos-section" class="button is-solid accent-button raised is-fullwidth">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Concatenated js plugins and jQuery -->
    <script src="assets/js/app.js"></script>

    <script src="assets/data/tipuedrop_content.js"></script>

    <!-- Core js -->
    <script src="assets/js/global.js"></script>

    <!-- Navigation options js -->
    <script src="assets/js/navbar-v1.js"></script>
    <script src="assets/js/navbar-v2.js"></script>
    <script src="assets/js/navbar-mobile.js"></script>
    <script src="assets/js/navbar-options.js"></script>
    <script src="assets/js/sidebar-v1.js"></script>

    <!-- Core instance js -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/chat.js"></script>
    <script src="assets/js/touch.js"></script>
    <script src="assets/js/tour.js"></script>

    <!-- Components js -->
    <script src="assets/js/explorer.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/modal-uploader.js"></script>
    <script src="assets/js/popovers-users.js"></script>
    <script src="assets/js/popovers-pages.js"></script>
    <script src="assets/js/lightbox.js"></script>

    <!-- Landing page js -->

    <!-- Signup page js -->

    <!-- Feed pages js -->

    <!-- profile js -->

    <!-- stories js -->

    <!-- friends js -->

    <!-- questions js -->

    <!-- video js -->

    <!-- events js -->

    <!-- news js -->

    <!-- shop js -->
    <script src="assets/js/shop.js"></script>

    <!-- inbox js -->

    <!-- settings js -->

    <!-- map page js -->

    <!-- elements page js -->
</body>


<!-- Mirrored from friendkit.cssninja.io/shop.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:57:52 GMT -->

</html>