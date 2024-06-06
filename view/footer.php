<footer class="bg-black text-white bottom-0">
    <div class="container mx-auto py-6 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between">
            <div class="md:w-1/2">
                <h2 class="text-xl font-bold">WW1 Remembrance Centre</h2>
                <p class="text-sm text-gray-400 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="font-normal text-gray-400 mt-2"> 
                    <span class="border-b border-green-500">02394 007775</span> or 
                    <span class="border-b border-green-500">ww1remcen@hotmail.co.uk</span>
                </p>
                <div class="flex mt-2">
                    <a href="https://www.facebook.com/WW1RemembranceCentre" target="_blank" class="mr-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" class="w-6 h-6">
                    </a>
                    <a href="https://www.tripadvisor.com/WW1RemembranceCentre" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Tripadvisor_Logo_circle-green_horizontal-lockup_registered_RGB.svg" alt="Tripadvisor" class="w-6 h-6">
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 mt-4 md:mt-0 flex flex-wrap">
                <!-- First column -->
                <div class="w-full sm:w-1/2 md:w-1/3 mt-4 md:mt-0">
                    <h4 class="font-bold text-gray-300">Pages</h4>
                    <ul class="list-none mt-2">
                        <li class="font-normal text-gray-300"><a href="home">Home</a></li>
                        <li class="font-normal text-gray-300"><a href="visit-us">Visit Us</a></li>
                        <li class="font-normal text-gray-300"><a href="about">About</a></li>
                    </ul>
                </div>
                <!-- Second column -->
                <div class="w-full sm:w-1/2 md:w-1/3 mt-4 md:mt-0">
                    <ul class="list-none">
                        <li class="font-normal text-gray-300"><a href="activities">Activities</a></li>
                        <li class="font-normal text-gray-300"><a href="gift-shop">Gift Shop</a></li>
                        <li class="font-normal text-gray-300"><a href="gallery">Gallery</a></li>
                    </ul>
                </div>
                <!-- Third column -->
                <div class="w-full sm:w-1/2 md:w-1/3 mt-4 md:mt-0">
                    <ul class="list-none">
                        <li class="font-normal text-gray-300"><a href="help-us">Help Us</a></li>
                        <li class="font-normal text-gray-300"><a href="contact">Contact</a></li>
                        <li class="font-normal text-gray-300"><a href="terms">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-4 border-gray-300">

        <p class="text-xs mt-2 text-center">
            WE ARE A REGISTERED CHARITY NUMBER 1195390
            <br>
            Copyright © 2021 WW1 Remembrance Centre, All Rights Reserved.
        </p>

        <div class="flex items-center mt-4 justify-center">
            <span class="mr-2">Secure Payment</span>
            <svg xmlns="" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </div>
    </div>
</footer>

<script>
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenuButton = document.getElementById('close-menu-button');
    const overlay = document.getElementById('mobile-menu-overlay');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        overlay.classList.toggle('hidden');
    });

    closeMenuButton.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        overlay.classList.add('hidden');
    });

    overlay.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        overlay.classList.add('hidden');
    });
</script>



<script>
    function triggerTranslate(lang) {
        var select = document.querySelector('select.goog-te-combo');
        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event('change'));
        }
    }

    document.getElementById('translate-fr').addEventListener('click', function() {
        triggerTranslate('fr');
    });

    document.getElementById('translate-en').addEventListener('click', function() {
        triggerTranslate('en');
    });

    document.getElementById('translate-de').addEventListener('click', function() {
        triggerTranslate('de');
    });

    document.getElementById('translate-fr-mobile').addEventListener('click', function() {
        triggerTranslate('fr');
    });

    // mobile
    document.getElementById('translate-en-mobile').addEventListener('click', function() {
        triggerTranslate('en');
    });

    document.getElementById('translate-de-mobile').addEventListener('click', function() {
        triggerTranslate('de');
    });
</script>

</body>
</html>
<?php ob_end_flush();?>