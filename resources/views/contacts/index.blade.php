<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Contact Form</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="min-h-screen bg-black overflow-hidden relative">

    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-700 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-pulse"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-500 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-pulse"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 flex items-center justify-center min-h-screen p-6">

        <div class="w-full max-w-lg backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl p-10">

            <!-- Logo -->
            <div class="text-center mb-8">

                <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-r from-cyan-500 to-purple-600 flex items-center justify-center text-4xl shadow-lg">
                    ✉
                </div>

                <h1 class="text-5xl font-extrabold text-white mt-5">
                    Contact Us
                </h1>

                <p class="text-gray-300 mt-3">
                    We'd love to hear your thoughts
                </p>

            </div>

            <!-- Success -->
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-400 text-green-300 p-4 rounded-2xl mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Errors -->
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-400 text-red-300 p-4 rounded-2xl mb-5">
                    <ul class="list-disc ml-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="text-gray-300 text-sm mb-2 block">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        placeholder="John Doe"
                        class="w-full bg-black/40 border border-gray-600 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-400 transition"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="text-gray-300 text-sm mb-2 block">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="john@example.com"
                        class="w-full bg-black/40 border border-gray-600 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                    >
                </div>

                <!-- Message -->
                <div>
                    <label class="text-gray-300 text-sm mb-2 block">
                        Your Message
                    </label>

                    <textarea
                        name="message"
                        rows="5"
                        placeholder="Write something amazing..."
                        class="w-full bg-black/40 border border-gray-600 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 transition"
                    ></textarea>
                </div>

                <!-- CAPTCHA -->
                <div class="flex justify-center">
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
                    class="w-full py-4 rounded-2xl text-white text-lg font-bold bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500 hover:scale-105 transition duration-300 shadow-2xl"
                >
                    🚀 Send Message
                </button>

            </form>

            {!! NoCaptcha::renderJs() !!}
        </div>

    </div>

</body>
</html>

