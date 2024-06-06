<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-4xl font-bold text-center mb-2">Help Wanted!</h1>
    <p class="text-lg text-center mb-8">The WW1 Remembrance Centre is a non-profit organisation; we are always looking for unpaid volunteers of any age and skill level and for artefacts.</p>

    <section class="grid md:grid-cols-2 gap-8 justify-items-center items-center bg-white shadow-md rounded-md">
        <form action="" method="post" class="p-6 flex flex-col justify-center items-center">
            <div class="w-full flex flex-col sm:space-x-4 sm:flex-row items-center">
                <input type="text" name="firstname" placeholder="First Name" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
                <input type="text" name="lastname" placeholder="Last Name" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
            </div>
            <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
            <select type="age" name="age" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
                <option value="" disabled selected>Age</option>
                <option value="cat1">Prefer not to say</option>
                <option value="cat1">12-17</option>
                <option value="cat2">18-25</option>
                <option value="cat3">26-59</option>
                <option value="cat4">60+</option>
            </select>
            <input type="address" name="address" placeholder="House Number + Street name" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
            <div class="w-full flex flex-col sm:space-x-4 sm:flex-row items-center">
                <input type="text" name="postcode" placeholder="Postcode" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
                <input type="text" name="country" placeholder="Country" class="w-full mb-4 p-2 border border-gray-300 rounded" required>
            </div>
            <textarea placeholder="Your Message" name="message" class="w-full mb-4 p-2 border border-gray-300 rounded h-32" required></textarea>
            <button class="overflow-hidden relative w-32 p-2 h-12 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer relative z-10 group">
                Submit!
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-400 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                <span class="absolute w-36 h-32 -top-8 -left-2 bg-purple-600 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                <span class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 left-6 z-10">Submit!</span>
            </button>
        </form>
        <div class="flex justify-center items-center p-6">
        <?php
                    $helpUsAssets = [];
                    foreach ($assets as $asset) {
                        if ($asset['category'] == 'Help Us') {
                            $helpUsAssets[] = $asset;
                        }
                    }
                ?>
                <?php foreach ($helpUsAssets as $asset) {?>
                        <img src="<?php echo $asset['file_path']; ?>" alt="Contact Image" class="object-cover rounded-lg max-w-full h-auto">
                <?php } ?>
        </div>
    </section>


    <section class="bg-white shadow-md rounded-lg px-8 mt-6 pt-6 pb-8 mb-4 flex flex-col text-center">
        <div class="mb-4">
            <h1 class="font-bold text-2xl mb-2">Donations</h1>
            <p class="text-gray-700 text-base">Would you like to support us? Click on the link below to make a donation.</p>
        </div>
        <div class="flex justify-center mb-6">
            <form method="post" action="checkout" class="flex justify-center items-center">
                <div class="flex">
                    <input type="number" name="amount" min="1" class="block w-24 sm:w-32 md:w-40 rounded-md py-1.5 px-2 mr-2 ring-1 ring-inset ring-gray-400 focus:text-gray-800" placeholder="£5" required/>
                    <button class="ml-2 brightness-150 dark:brightness-100 group hover:shadow-lg hover:shadow-yellow-700/60 transition ease-in-out hover:scale-105 p-1 rounded-xl bg-gradient-to-br from-yellow-800 via-yellow-600 to-yellow-800 hover:from-yellow-700 hover:via-yellow-800 hover:to-yellow-600">
                        <div class="px-6 py-2 bg-black/80 rounded-lg font-bold h-full">
                            <div class="group-hover:scale-100 flex group-hover:text-yellow-500 text-yellow-600 gap-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    class="w-6 h-6 stroke-yellow-600 group-hover:stroke-yellow-500 group-hover:stroke-{1.99}"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3
                                    .09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"
                                    ></path>
                                </svg>
                                Donate
                            </div>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="bg-white shadow-md rounded-lg px-8 mt-6 pt-6 pb-8 mb-4 flex flex-col text-center">
        <div class="mb-4">
            <h1 class="font-bold text-2xl mb-2">Artefacts Wanted!</h1>
            <div class="w-full flex flex-col items-center justify-center">
                <p class="text-gray-700 text-base text-justify pt-2">
                    Would you like to have your family’s history told in our museum? Do you have artefacts relating to the First World War?
                </p>
                <p class="text-gray-700 text-base text-justify">
                    We are happy to accept objects, documents and pictures. For documents and pictures, copies are also accepted.
                </p>
                <p class="text-gray-700 text-base text-justify">
                    However: Please note that all items and artifacts are transferred PERMANENTLY to us. They are NOT loaned to us.
                </p>
            </div>
        </div>
    </section>
</main>

