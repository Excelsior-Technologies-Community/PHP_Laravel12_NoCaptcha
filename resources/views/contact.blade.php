<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Contact Form</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google CAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="min-h-screen bg-gray-950 flex items-center justify-center px-4 py-10">

    <!-- Main Card -->
    <div class="w-full max-w-xl bg-gray-900 border border-gray-800 rounded-3xl shadow-2xl overflow-hidden">

        <!-- Top Gradient -->
        <div class="h-2 bg-gradient-to-r from-cyan-500 via-indigo-500 to-purple-600"></div>

        <div class="p-8 md:p-10">

            <!-- Header -->
            <div class="text-center mb-8">

                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-cyan-500 to-indigo-600 flex items-center justify-center text-4xl mx-auto shadow-lg">
                    ✉
                </div>

                <h1 class="text-4xl font-extrabold text-white mt-5">
                    Contact Us
                </h1>

                <p class="text-gray-400 mt-2">
                    Send your message anytime
                </p>

            </div>

            <!-- Success -->
            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500 text-green-400 px-4 py-3 rounded-xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Errors -->
            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500 text-red-400 px-4 py-3 rounded-xl mb-5">
                    <ul class="list-disc ml-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">

                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-gray-300 mb-2 font-medium">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"
                        class="w-full bg-gray-800 border border-gray-700 text-white rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    >

                    @error('name')
                        <p class="text-red-400 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-300 mb-2 font-medium">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="w-full bg-gray-800 border border-gray-700 text-white rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >

                    @error('email')
                        <p class="text-red-400 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-gray-300 mb-2 font-medium">
                        Message
                    </label>

                    <textarea
                        name="message"
                        rows="5"
                        placeholder="Write your message..."
                        class="w-full bg-gray-800 border border-gray-700 text-white rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <p class="text-red-400 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- CAPTCHA -->
                <div class="flex justify-center overflow-x-auto">
                    {!! NoCaptcha::display() !!}
                </div>

                @error('g-recaptcha-response')
                    <p class="text-red-400 text-sm text-center">
                        {{ $message }}
                    </p>
                @enderror

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-cyan-500 via-indigo-500 to-purple-600 hover:opacity-90 transition duration-300 text-white font-bold py-4 rounded-2xl shadow-xl text-lg"
                >
                    🚀 Send Message
                </button>

            </form>

        </div>

    </div>

    <!-- CAPTCHA JS -->
    {!! NoCaptcha::renderJs() !!}

</body>
</html>