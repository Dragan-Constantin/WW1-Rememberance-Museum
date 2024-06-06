<?php
$events = [];
$displays = [];
$temporaryExhibitions = [];

foreach ($assets as $asset) {
    $title = strtolower($asset['title']);
    // Vérifier si le mot 'events' est présent dans le titre
    if (strpos($title, 'events') !== false) {
        $events[] = $asset;
    }
    // Vérifier si le mot 'displays' est présent dans le titre
    if (strpos($title, 'displays') !== false) {
        $displays[] = $asset;
    }
    // Vérifier si le mot 'temporary exhibitions' est présent dans le titre
    if (strpos($title, 'temporary exhibitions') !== false) {
        $temporaryExhibitions[] = $asset;
    }
}
?>

<main class="max-w-7xl mx-auto p-4 md:p-8">
    <h1 class="text-2xl md:text-4xl font-bold text-center mb-2">Activities</h1>
    <p class="text-md md:text-lg text-center mb-4 md:mb-8">Discover our activities and events</p>
    <div class="flex items-center justify-center object-contain overflow-hidden">
        <iframe src="https://calendar.google.com/calendar/embed?src=c_c954538939ca3d3d79d8a8f4b81ffa859bc11071fcf55f65f853167e44a1ebb9%40group.calendar.google.com&ctz=Europe%2FLondon" width="100%" height="600" frameborder="0" scrolling="no" class="border-1 rounded-lg"></iframe>
    </div>

    <!-- Button for Activity Reservation -->
    <div class="flex justify-center mt-8">
        <a href="activity-reservation" class="bg-black text-white py-3 px-8 rounded-lg">Activity Reservation</a>
    </div>

    <div class="container mx-auto p-6">

        <!-- Events Section -->
        <div class="font-bold text-2xl md:text-4xl mb-6 text-center cursor-pointer" onclick="toggleSection('events-section')">
            <h1>Events <img id="events-arrow" src="./assets/images/arrow.svg" class="inline-block arrow-icon transform transition-transform duration-300"></h1>
        </div>
        <div id="events-section" class="flex flex-wrap justify-center -mx-4">
            <?php foreach ($events as $event): ?>
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 flex justify-center">
                    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-center items-center transition-all duration-500 ease-in-out transform hover:scale-105">
                        <img class="w-full h-48 object-cover" src="<?php echo $event['file_path'] ?>" alt="Event Image">
                        <div class="px-6 py-4 flex flex-col items-center justify-center text-center">
                            <h1 class="font-bold text-xl mb-2"><?php echo $event['title'] ?></h1>
                            <p class="text-gray-700 text-justify">
                                <?php echo $event['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Displays Section -->
        <div class="font-bold text-2xl md:text-4xl mt-12 mb-6 text-center cursor-pointer" onclick="toggleSection('displays-section')">
            <h1>The Displays <img id="displays-arrow" src="./assets/images/arrow.svg" class="inline-block arrow-icon transform transition-transform duration-300"></h1>
        </div>
        <div id="displays-section" class="flex flex-wrap justify-center -mx-4">
            <?php foreach ($displays as $display): ?>
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 flex justify-center">
                    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-center items-center transition-all duration-500 ease-in-out transform hover:scale-105">
                        <img class="w-full h-48 object-cover" src="<?php echo $display['file_path'] ?>" alt="Display Image">
                        <div class="px-6 py-4 flex flex-col items-center justify-center text-center">
                            <h1 class="font-bold text-xl mb-2"><?php echo $display['title'] ?></h1>
                            <p class="text-gray-700 text-justify">
                                <?php echo $display['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Temporary Exhibitions Section -->
        <div class="font-bold text-2xl md:text-4xl mt-12 mb-6 text-center cursor-pointer" onclick="toggleSection('exhibitions-section')">
            <h1>Temporary Exhibitions <img id="exhibitions-arrow" src="./assets/images/arrow.svg" class="inline-block arrow-icon transform transition-transform duration-300"></h1>
        </div>
        <div id="exhibitions-section" class="flex flex-wrap justify-center -mx-4">
            <?php foreach ($temporaryExhibitions as $exhibition): ?>
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 flex justify-center">
                    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-center items-center transition-all duration-500 ease-in-out transform hover:scale-105">
                        <img class="w-full h-48 object-cover" src="<?php echo $exhibition['file_path'] ?>" alt="Exhibition Image">
                        <div class="px-6 py-4 flex flex-col items-center justify-center text-center">
                            <h1 class="font-bold text-xl mb-2"><?php echo $exhibition['title'] ?></h1>
                            <p class="text-gray-700 text-justify">
                                <?php echo $exhibition['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>

<style>
.arrow-icon {
    width: 1rem; /* ajustez la taille selon vos besoins */
    height: auto; /* assurez-vous que la hauteur s'adapte automatiquement pour maintenir les proportions */
}
</style>

<script>
function toggleSection(sectionId) {
    const section = document.getElementById(sectionId);
    const arrow = document.getElementById(sectionId.replace('-section', '') + '-arrow');
    
    if (section.style.display === "none" || section.style.display === "") {
        section.style.display = "flex";
        arrow.style.transform = "rotate(180deg)";
    } else {
        section.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
    }
}

// Initially hide all sections
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('events-section').style.display = 'none';
    document.getElementById('displays-section').style.display = 'none';
    document.getElementById('exhibitions-section').style.display = 'none';
});
</script>
