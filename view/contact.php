<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-2">Contact Us</h1>
    <p class="text-lg text-center mb-8">We will do our best to respond as soon as we can!</p>
    
    <section class="grid md:grid-cols-2 gap-8 justify-items-center items-center bg-white shadow-md rounded-md">
        <form action="" method="post" class="p-6 flex flex-col justify-center items-center">
            <div class="w-full flex flex-col sm:space-x-4 sm:flex-row items-center">
                <input type="text" name="firstname" placeholder="First Name" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
                <input type="text" name="lastname" placeholder="Last Name" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
            </div>
            <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
            <select name="reason" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
                <option value="" disabled selected>Reason of Contact</option>
                <option value="question">Question</option>
                <option value="feedback">Feedback</option>
                <option value="support">Support</option>
            </select>
            <textarea placeholder="Your Message" name="message" id="message" class="w-full p-2 mb-4 border border-gray-300 rounded h-32" required></textarea>
            <p id="wordCount" class="text-sm text-gray-500 mb-2">0 / 500 words</p>
            <button class="overflow-hidden relative w-32 p-2 h-12 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer relative z-10 group">
                Submit!
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-400 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-600 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                <span class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 left-6 z-10">Submit!</span>
            </button>
        </form>
        <?php
            // Parcourir les assets pour trouver celui avec le titre 'home hero'
            foreach ($assets as $asset) {
                if ($asset['title'] == 'Museum Outside') {
                    $museumOutside = $asset['file_path'];
                }
            }
            ?>
        <div class="flex flex-col justify-between items-center p-6 w-2/3">
            <img src="<?php echo $museumOutside; ?>" alt="Contact Image" class="object-cover rounded mb-4">
            <p class="text-center">You can also try to call us: 02394 007775</p>
        </div>
    </section>
    
    <section class="mt-8">
        <iframe class="w-full h-64 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5039.905062618242!2d-1.0579798036660562!3d50.83204316478595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48745db817fda771%3A0xecdbe5a7a0e72152!2sThe%20WW1%20Remembrance%20Centre!5e0!3m2!1sen!2suk!4v1715775373419!5m2!1sen!2suk" allowfullscreen="" loading="lazy"></iframe>
        <p class="text-center">Bastion 6, Airport Service Road Portsmouth, HAMPSHIRE, PO3 5PJ United Kingdom Sat Nav</p>
        <p class="text-center">GPS: 50° 49' 53.821" N 1° 3' 10.579" W 50.8316169, -1.0529387</p>
    </section>
</main>

<script>
    const messageTextarea = document.getElementById('message');
    const wordCountDisplay = document.getElementById('wordCount');
    const maxWords = 500;

    messageTextarea.addEventListener('input', () => {
        const message = messageTextarea.value.trim();
        const words = message.split(/\s+/);
        const wordCount = words.length;
        
        if (wordCount <= maxWords) {
            wordCountDisplay.textContent = `${wordCount} / ${maxWords} words`;
        } else {
            // Prevent further input
            messageTextarea.value = words.slice(0, maxWords).join(' ');
            wordCountDisplay.textContent = `${maxWords} / ${maxWords} words`;
        }
    });
</script>
