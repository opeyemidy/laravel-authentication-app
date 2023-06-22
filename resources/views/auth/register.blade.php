<x-auth title="Sign up" header-title="Create and account" >
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="dark:text-primary-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
        @csrf
            <x-input label="Your full name" name="full_name" id="full_name" placeholder="John Doe" required />
            <x-input label="Your email" type="email" name="email" id="email" placeholder="name@company.com" required />
            <x-input label="Password" type="password" name="password" id="password" placeholder="••••••••" required />
            <x-input label="Confirm password" type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" required />
        <div class="flex items-start">
            <div class="flex items-center h-5">
            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
            </div>
        </div>
        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
        </p>
    </form>
</x-auth>
