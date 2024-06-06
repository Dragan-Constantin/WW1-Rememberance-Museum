<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-2">About Us</h1>
    <p class="text-lg text-center mb-8">Discover our story and what drives us forward.</p>

    <div class="container mx-auto py-12 px-12 sm:px-24 md:px-28 lg:px-36">
        <?php
            $aboutAssets = [];
            foreach ($assets as $asset) {
                if ($asset['category'] == 'About') {
                    $aboutAssets[] = $asset;
                }
            }
        ?>
        <?php foreach ($aboutAssets as $asset) {?>
                <div class="flex flex-col md:flex-row items-center mb-12">
                    <img src="<?php echo $asset['file_path']; ?>" alt="About Us Image" class="w-full md:w-1/2 mb-4 md:mb-0 rounded-lg">
                    <div class="md:ml-6 text-justify md:flex-1">
                        <p class="leading-relaxed"><?php echo $asset['description']; ?></p>
                    </div>
                </div>
        <?php } ?>
    </div>
</main>