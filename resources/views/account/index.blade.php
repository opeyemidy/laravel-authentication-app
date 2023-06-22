<x-dashboard>
    <div class="xl:col-auto col-span-full">
    <div class="rounded-lg dark:bg-gray-800 p-6">
        <div class="2xl:flex xl:block sm:flex">
        <img class="w-28 h-28 sm:m-0 xl:mb-4 mb-1" src="https://flowbite.com/application-ui/demo/images/users/jese-leos-2x.png" alt="Jese picture">
        <div class="2xl:ml-4 sm:ml-4 xl:ml-0">
            <h3 class="dark:text-white font-bold text-2xl">{{ $user->full_name }}</h3>
            <div class="text-gray-400 font-normal text-base mb-4">User</div>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2 px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center">
            <svg class="w-4 h-4 -m-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path><path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path></svg>
            Change picture</button>
        </div>
        </div>
    </div>
    </div>
    <div class="xl:col-span-2 col-span-full">
    <div class="rounded-lg dark:bg-gray-800 p-8 mb-4">
            <h3 class="dark:text-white text-xl font-bold mb-4">General information</h3>
            <div id="profileErrorContainer"></div>
            <form id="updateAccountForm">
                @csrf
                <div class="grid gap-6 sm:grid-cols-6">
                    <x-input label="Full Name" id="full-name" name="full_name" value="{{ $user->full_name }}" placeholder="Bonnie Green" class="col-span-3" rquired />
                    <x-input label="Email" id="email" type="email" name="email" placeholder="user@gmail.com" value="{{ $user->email }}" readonly class="col-span-3" />
                    <x-input label="Phone Number" type="tel" id="city" name="phone_number" value="{{ $user->phone_number }}" placeholder="+234-813-808-9657" class="col-span-3" />
                    <x-input label="Country" id="country" name="country" value="{{ $user->country }}" placeholder="Nigeria" class="col-span-3" />
                    <x-input label="State" id="state" name="state" value="{{ $user->state }}" placeholder="FCT" class="col-span-3" />
                    <x-input label="City" id="city" name="city" value="{{ $user->city }}" placeholder="Abuja" class="col-span-3" />
                    <x-input label="Address" id="address" name="address" value="{{ $user->address }}" placeholder="Flat No 1, Ajuba street" class="col-span-3" />
                    <x-input label="Postal Code" id="postal-code" name="postal_code" value="{{ $user->postal_code }}" placeholder="Abuja" class="col-span-3" />
                    <div class="col-span-2 sm:col-span-full">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                    </div>
                </div>
            </form>
    </div>
    <div class="rounded-lg dark:bg-gray-800 p-8">
            <h3 class="dark:text-white text-xl font-bold mb-4">Password information
            </h3>
            <div id="passwordErrorContainer"></div>
            <form id="updatePasswordForm">
                @csrf
                <div class="grid sm:grid-cols-6 gap-6">
                    <x-input label="Current Password" type="password" class="col-span-3" id="current-password" name="current_password" placeholder="••••••••" required />
                    <x-input label="New Password" type="password" id="password" class="col-span-3" name="new_password" placeholder="••••••••" pattern="^(?=.*[a-z])(?=.*[!@#?]).{10,100}$" required />
                    <x-input label="Confirm Password" type="password" id="confirm-password" class="col-span-3" name="new_password_confirmation" placeholder="••••••••" pattern="^(?=.*[a-z])(?=.*[!@#?]).{10,100}$" required />
                    <div class="col-span-3 sm:col-span-full">
                        <div class="dark:text-white text-sm font-medium">Password requirements:</div>
                        <div class="text-gray-400 font-normal text-sm PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">Ensure that these requirements are met:</div>
                        <ul class="text-gray-400 text-sm pl-4">
                            <li class="font-normal text-xs">At least 10 characters (and up to 100 characters)</li>
                            <li class="font-normal text-xs">At least one lowercase character</li>
                            <li class="font-normal text-xs">Inclusion of at least one special character, e.g., ! @ # ?</li>
                            <li class="font-normal text-xs">Some text here zoltan</li>
                        </ul>
                    </div>
                    <div class="col-span-2 sm:col-span-full">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save all</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot:script>
        <script>
            $('#updateAccountForm').submit(function(event) {
                event.preventDefault();
                const formData = $(this).serialize();
                const profileUpdateError = document.getElementById('profileErrorContainer');

            $.ajax({
            url: '{{ route('account.updateContact') }}',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(profileUpdateError.innerHTML) profileUpdateError.innerHTML = ''
                location.reload()
            },
            error: function(xhr, status, error) {
                const errors = xhr.responseJSON.errors
                // return console.log(errors)
                let errorList = '<ul>';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorList += `<li class="dark:text-primary-500">${errors[key][0]}</li>`;
                    }
                }
                errorList += '</ul>';
                profileUpdateError.innerHTML = errorList;
            }
            });
        });
        $('#updatePasswordForm').submit(function(event) {
            event.preventDefault();
            passowordError = document.getElementById('passwordErrorContainer');
            const formData = $(this).serialize();

            $.ajax({
            url: '{{ route('account.updatePassword') }}',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(passowordError.innerHTML) passowordError.innerHTML = ''
                $('#updatePasswordForm')[0].reset();
            },
            error: function(xhr, status, error) {
                const errors = xhr.responseJSON.errors
                // return console.log(errors)
                let errorList = '<ul>';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorList += `<li class="dark:text-primary-500">${errors[key][0]}</li>`;
                    }
                }
                errorList += '</ul>';
                passowordError.innerHTML = errorList;
            }
            });
        });
    </script>
    </x-slot:script>
</x-dashboard>
