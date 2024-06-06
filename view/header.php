<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/c4d9581a6c.js" crossorigin="anonymous"></script>
    <title><?php echo ucfirst(strtolower(str_replace("/", "", $address)))?> Page</title>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,de'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body class="font-sans bg-gray-100">
    <?php if ($address == '/home') {
        include 'header_home.php';
    } else { ?>
        <header class="bg-lime-900 shadow-md p-6 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href=""><img src="./assets/images/remembrance-logo.png" alt="Logo" class="h-8"></a>
            </div>
            <nav class="hidden md:flex space-x-4 text-white">
                <a href="home" class="hover:text-gray-900">HOME</a>
                <a href="visit-us" class="hover:text-gray-900">VISIT US</a>
                <a href="about" class="hover:text-gray-900">ABOUT</a>
                <a href="activities" class="hover:text-gray-900">ACTIVITIES</a>
                <a href="gallery" class="hover:text-gray-900">GALLERY</a>
                <a href="gift-shop" class="hover:text-gray-900">GIFT SHOP</a>
                <a href="help-us" class="hover:text-gray-900">HELP US</a>
                <a href="contact" class="hover:text-gray-900">CONTACT</a>
            </nav>
            <div id="google_translate_element" style="display:none;"></div>
            <div class="hidden md:flex items-center space-x-2">
                <button id="translate-fr" class="transition-all duration-500 ease-in-out transform hover:scale-150"><img src="./assets/images/fr.png" alt="FR" class="h-6"></button>
                <button id="translate-en" class="transition-all duration-500 ease-in-out transform hover:scale-150"><img src="./assets/images/uk.png" alt="EN" class="h-6"></button>
                <button id="translate-de" class="transition-all duration-500 ease-in-out transform hover:scale-150"><img src="./assets/images/de.png" alt="DE" class="h-6"></button>
            </div>
            <button id="menu-button" class="md:hidden flex items-center space-x-2 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </header>
    <?php } ?>
    
    <div class="lg:hidden fixed inset-0 bg-gray-800 bg-opacity-50 hidden z-10" id="mobile-menu-overlay"></div>

    <div class="lg:hidden fixed inset-y-0 right-0 w-64 h-full bg-lime-900 shadow-lg hidden z-20" id="mobile-menu">
        <!-- Contenu du menu mobile ici -->
        <div class="p-4 border-b">
            <div class="flex items-center justify-between">
                <button class="text-white focus:outline-none" id="close-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-4 border-b">
                <div class="flex items-center justify-between">
                    <button id="translate-fr-mobile" class="flex items-center space-x-2 transition-all duration-500 ease-in-out transform hover:scale-150">
                        <img src="./assets/images/fr.png" alt="FR" class="h-4 w-4">
                        <span class="text-white">FR</span>
                    </button>
                    <button id="translate-en-mobile" class="flex items-center space-x-2 transition-all duration-500 ease-in-out transform hover:scale-150">
                        <img src="./assets/images/uk.png" alt="EN" class="h-4 w-4">
                        <span class="text-white">EN</span>
                    </button>
                    <button id="translate-de-mobile" class="flex items-center space-x-2 transition-all duration-500 ease-in-out transform hover:scale-150">
                        <img src="./assets/images/de.png" alt="DE" class="h-4 w-4">
                        <span class="text-white">DE</span>
                    </button>
                </div>
            </div>
            <nav class="p-4 space-y-2 flex flex-col text-white">
                <a href="home" class="hover:text-gray-900">HOME</a>
                <a href="visit-us" class="hover:text-gray-900">VISIT US</a>
                <a href="about" class="hover:text-gray-900">ABOUT</a>
                <a href="activities" class="hover:text-gray-900">ACTIVITIES</a>
                <a href="gallery" class="hover:text-gray-900">GALLERY</a>
                <a href="gift-shop" class="hover:text-gray-900">GIFT SHOP</a>
                <a href="help-us" class="hover:text-gray-900">HELP US</a>
                <a href="contact" class="hover:text-gray-900">CONTACT</a>
            </nav>
    </div>

