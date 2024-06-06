<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-2">Gallery</h1>
    <p class="text-lg text-center mb-8">New memories to remember the past</p>
    <div class="container mx-auto p-4">

        <!-- Cards Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-semibold mb-4">Our Collection</h2>
            <div id="gallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Images will be inserted here by JavaScript -->
            </div>
        </div>
    </div>
</main>

<script>
    const imageList = [
        "20240523_111144.jpg",
        "20240523_111157.jpg",
        "20240523_111317.jpg",
        "20240523_111742.jpg",
        "20240523_111748.jpg",
        "20240523_111842.jpg",
        "20240523_112425.jpg",
        "20240523_112559.jpg",
        "20240523_112821.jpg",
        "20240523_112827.jpg",
        "20240523_112834.jpg",
        "20240523_112841.jpg",
        "20240523_124615.jpg",
        "20240523_125115.jpg",
        "20240523_125151.jpg",
        "20240523_130255.jpg",
        "20240523_130307.jpg",
        "20240523_130602.jpg",
        "20240523_130619.jpg",
        "20240523_131228.jpg",
        "20240523_131323.jpg",
        "20240523_131926.jpg",
        "20240523_132029.jpg",
        "20240523_132541.jpg",
        "20240523_133119.jpg",
        "20240523_133214.jpg",
        "20240523_133343.jpg",
        "20240523_133406.jpg",
        "20240523_133428.jpg",
        "20240523_133450.jpg",
        "20240523_133608.jpg",
        "20240523_133616.jpg",
        "20240523_133724.jpg",
        "20240523_133749.jpg",
        "20240523_133920.jpg",
        "20240523_133923.jpg",
        "20240523_134058.jpg",
        "20240523_134106.jpg",
        "20240523_134117.jpg",
        "20240523_134137.jpg",
        "20240523_134210.jpg",
        "20240523_134214.jpg",
        "20240523_134554.jpg"
    ];

    const galleryContainer = document.getElementById('gallery');

    imageList.forEach((image, index) => {
        const card = document.createElement('div');
        card.className = "bg-white p-4 shadow rounded-lg text-center";
        
        const img = document.createElement('img');
        img.src = `assets/images/Contantin-WW1/${image}`;
        img.alt = `Picture ${index + 1}`;
        img.className = "w-full mb-4 rounded-lg";
        
        const title = document.createElement('h3');
        title.className = "text-xl font-medium";
        title.textContent = `Picture ${index + 1}`;
        
        card.appendChild(img);
        card.appendChild(title);
        galleryContainer.appendChild(card);
    });
</script>