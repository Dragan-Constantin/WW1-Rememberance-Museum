<!-- Header Section -->
<?php
            // Parcourir les assets pour trouver celui avec le titre 'home hero'
            foreach ($assets as $asset) {
                if ($asset['title'] == 'Home Hero') {
                    $homeHeroImagePath = $asset['file_path'];
                }
            }
            ?>
<div class="relative w-full h-96 bg-cover bg-center bg-[url('<?php echo $homeHeroImagePath; ?>')]">
    <div class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center">
        <h2 class="text-white text-3xl md:text-4xl font-semibold text-center">World War 1 Remembrance Centre</h2>
    </div>
</div>
<main class="max-w-7xl mx-auto pt-8 py-8">
    <div class="container mx-auto p-6">
        <div class="font-bold text-4xl mb-6">
            <h1>History</h1>
        </div>
        <!-- Image and Text Section -->
        <?php
            // Parcourir les assets pour trouver celui avec le titre 'home hero'
            foreach ($assets as $asset) {
                if ($asset['title'] == 'Museum Outside') {
                    $museumOutside = $asset['file_path'];
                }
            }
            ?>
        <div class="container mx-auto flex flex-col md:flex-row items-center md:space-y-0 md:space-x-8">
            <img src="<?php echo $museumOutside; ?>" alt="Descriptive Alt Text" class="w-full md:w-1/2 object-cover rounded-lg">
            <div class="w-full md:w-1/2">
                <p class="h-full flex items-center text-lg text-justify">
                World War I, also known as the Great War, was a global war originating in Europe that lasted from 28 July 1914 to 11 November 1918. It involved many of the world's great powers, which were divided into two opposing alliances: the Allies and the Central Powers. The war saw unprecedented levels of carnage and destruction, due to trench warfare and the introduction of new weaponry, such as machine guns and chemical weapons. Millions of soldiers and civilians lost their lives, and the war left a lasting impact on the geopolitical landscape.
                </p>
                <!-- Learn More Button -->
                <div class="container mx-auto text-center py-2">
                    <button onclick="location.href='/about'"
                        class="overflow-hidden relative w-32 p-2 h-12 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer relative z-10 group"
                        >
                        Discover!
                        <span
                            class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"
                        ></span>
                        <span
                            class="absolute w-36 h-32 -top-8 -left-2 bg-purple-400 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"
                        ></span>
                        <span
                            class="absolute w-36 h-32 -top-8 -left-2 bg-purple-600 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"
                        ></span>
                        <span
                            class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 left-6 z-10"
                            >Explore!</span
                        >
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- Activities Section -->
<div class="container mx-auto py-16">
    <div class="container mx-auto p-6">
        <div class="font-bold text-4xl mb-6 text-center">
            <h1>Activities</h1>
        </div>
        <div class="flex flex-wrap justify-center -mx-2">
            <?php foreach ($assets as $asset) { ?>
                <?php if (in_array($asset['title'], ['School Trips Card', 'Events Card', 'Current Exhibition'])) {?>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4">
                        <div class="max-w-sm mx-auto rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-center items-center transition-all duration-500 ease-in-out transform hover:scale-105">
                            <img class="w-full h-48 object-cover" src="<?php echo $asset['file_path']; ?>" alt="<?php echo $asset['title']; ?>">
                            <div class="px-6 py-4 flex flex-col items-center justify-center text-center">
                                <h1 class="font-bold text-xl mb-2"><?php echo $asset['title']; ?></h1>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <button onclick="location.href='/activities'" class="overflow-hidden relative w-32 p-2 h-12 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer relative z-10 group">
                                    Discover!
                                    <span class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                                    <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-400 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                                    <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-600 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                                    <span class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 left-6 z-10">Explore!</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

    <!-- Reviews Section -->
    <div class="w-full py-8">
        <div class="font-bold text-4xl mb-4 text-center">
            <h1>Reviews</h1>
        </div>
        <div class="w-full py-4">
            <div class="flex justify-center">
                <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
                <div class="elfsight-app-0d02952b-af47-49e1-959f-0a73e7cad626 w-full" data-elfsight-app-lazy></div>
            </div>
            <div class="flex flex-col items-center space-y-4 mt-4 w-full">
                <!--<iframe src="your-tripadvisor-embed-url" class="w-full h-64 border rounded-md"></iframe>
                <iframe src="another-tripadvisor-embed-url" class="w-full h-64 border rounded-md"></iframe>-->
            </div>
        </div>
    </div>
</main>
