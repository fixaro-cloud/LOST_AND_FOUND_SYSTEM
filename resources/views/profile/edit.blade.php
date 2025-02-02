
    <x-app-layout>
      
    <div class=" py-7 px-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-4 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-300 shadow-md sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-300 shadow-md sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-300 shadow-md sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    </x-app-layout>

