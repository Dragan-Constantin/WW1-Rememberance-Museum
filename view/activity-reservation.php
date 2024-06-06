<main class="max-w-7xl mx-auto p-4 md:p-8 flex flex-col md:flex-row gap-8">
    <!-- Formulaire d'inscription -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full md:w-1/2">
        <h1 class="text-3xl font-bold mb-8 text-black">Registration</h1>
        
        <form class="max-w-md mx-auto" onsubmit="return validateForm()">
            <div class="mb-6">
                <label for="first-name" class="block text-gray-700 mb-2">First name</label>
                <input type="text" id="first-name" name="first-name" class="border border-gray-300 p-2 rounded-lg w-full" placeholder="Enter your first name" required>
            </div>
            <div class="mb-6">
                <label for="last-name" class="block text-gray-700 mb-2">Last name</label>
                <input type="text" id="last-name" name="last-name" class="border border-gray-300 p-2 rounded-lg w-full" placeholder="Enter your last name" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block text-gray-700 mb-2">Email address</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 rounded-lg w-full" placeholder="Enter your email address" required>
            </div>
            <div class="mb-6">
                <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="border border-gray-300 p-2 rounded-lg w-full" placeholder="Enter your phone number" required pattern="[0-9]{10}">
                <small class="text-gray-500">Please enter a 10-digit phone number.</small>
            </div>
            <div class="mb-6">
                <label for="activity" class="block text-gray-700 mb-2">Activity</label>
                <select id="activity" name="activity" class="border border-gray-300 p-2 rounded-lg w-full" required>
                    <option value="" disabled selected>Select an activity</option>
                    <option>Activity 1</option>
                    <option>Activity 2</option>
                    <option>Activity 3</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="date" class="block text-gray-700 mb-2">Date</label>
                <input type="text" id="date" name="date" class="border border-gray-300 p-2 rounded-lg w-full" placeholder="Select a date" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-black text-white py-2 px-6 rounded-lg w-full">Submit</button>
            </div>
        </form>
    </div>

    <!-- Calendrier des événements -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full md:w-1/2">
        <h1 class="text-3xl font-bold mb-8 text-black">Events Calendar</h1>
        <div class="flex items-center justify-center object-contain overflow-hidden">
            <iframe src="https://calendar.google.com/calendar/embed?src=c_c954538939ca3d3d79d8a8f4b81ffa859bc11071fcf55f65f853167e44a1ebb9%40group.calendar.google.com&ctz=Europe%2FLondon" width="100%" height="600" frameborder="0" scrolling="no" class="border-1 rounded-lg"></iframe>
        </div>
    </div>
</main>




<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    </script>
<script>
        function validateForm() {
        // Validation for phone number
        var phoneInput = document.getElementById('phone');
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phoneInput.value)) {
            alert("Please enter a valid 10-digit phone number.");
            return false;
        }

        // You can add more validation here for other fields if needed

        return true;
    }
</script>