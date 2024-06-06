<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-2">Gift Shop</h1>
    <p class="text-lg text-center mb-8">Come buy for a souvenir to show your friends where you’ve been</p>

    <!-- Information Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Information</h2>
        <div class="rounded-lg bg-white shadow-lg flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0">
            <!-- Business Hours Table -->
            <div class="p-4 rounded-lg flex-1">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-2 py-2">Day of the week</th>
                        <th class="px-2 py-2">Business Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Regrouper les jours consécutifs avec les mêmes heures d'ouverture
                    $groupedDays = [];
                    foreach ($businessHours as $hours) {
                        if ($hours['closed']) {
                            continue; // Passer aux prochains jours si celui-ci est fermé
                        }

                        $key = $hours['open_time'] . '-' . $hours['close_time'];
                        if (!isset($groupedDays[$key])) {
                            $groupedDays[$key] = [];
                        }
                        $groupedDays[$key][] = $hours['day'];
                    }

                    // Afficher les jours regroupés
                    foreach ($groupedDays as $key => $days) {
                        $times = explode('-', $key);
                        $openTime = date("g:i A", strtotime($times[0]));
                        $closeTime = date("g:i A", strtotime($times[1]));
                        echo '<tr><td class="border px-2 py-2">' . implode(', ', $days) . '</td><td class="border px-2 py-2">' . $openTime . ' - ' . $closeTime . '</td></tr>';
                    }

                    // Afficher les jours fermés
                    $closedDays = array_column(array_filter($businessHours, function($hours) {
                        return $hours['closed'];
                    }), 'day');
                    if (!empty($closedDays)) {
                        echo '<tr><td class="border px-2 py-2">' . implode(', ', $closedDays) . '</td><td class="border px-2 py-2">Closed</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            </div>
            <!-- Information Text -->
            <div class="p-4 rounded-lg flex-1 flex items-center">
                <p class="text-lg text-justify">Here you can find all the necessary information about our opening hours and services. Feel free to visit us during our business hours to get the best souvenirs for your friends and family.</p>
            </div>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Our Collection</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
                    $giftShopAssets = [];
                    foreach ($assets as $asset) {
                        if ($asset['category'] == 'Gift Shop') {
                            $giftShopAssets[] = $asset;
                        }
                    }
                ?>
                <?php foreach ($giftShopAssets as $asset) {?>
                        <div class="bg-white p-4 shadow rounded-lg text-center transition-all duration-500 ease-in-out transform hover:scale-105">
                            <img src="<?php echo $asset['file_path']; ?>" alt="Item 1" class="w-full mb-4 rounded-lg">
                            <h3 class="text-xl font-medium"><?php echo $asset['title']; ?></h3>
                        </div>
                <?php } ?>
        </div>
    </div>
</main>