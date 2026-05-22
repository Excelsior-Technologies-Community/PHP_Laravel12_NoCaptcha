<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen text-white overflow-x-hidden">

    <!-- Background -->
    <div class="fixed inset-0 -z-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-700 opacity-20 blur-3xl rounded-full"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-500 opacity-20 blur-3xl rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto p-6">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-center mb-10 gap-5">

            <div>
                <h1 class="text-5xl font-extrabold bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    📩 Contact Dashboard
                </h1>

                <p class="text-gray-400 mt-3">
                    Manage all contact submissions beautifully
                </p>
            </div>

            <a href="/contact/trash"
               class="bg-gradient-to-r from-red-500 to-pink-500 px-6 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition">
                🗑 Trash
            </a>

        </div>

        <!-- Success -->
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-5 py-4 rounded-2xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search -->
        <form method="GET" class="mb-8">

            <div class="flex flex-col md:flex-row gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search contacts..."
                    class="flex-1 bg-white/10 backdrop-blur-xl border border-gray-700 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                >

                <button
                    class="bg-gradient-to-r from-cyan-500 to-purple-500 px-8 py-4 rounded-2xl font-bold hover:scale-105 transition shadow-xl">
                    🔍 Search
                </button>

            </div>

        </form>

        <!-- Table -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-white/10 text-gray-300">
                        <tr>
                            <th class="p-5 text-left">ID</th>
                            <th class="p-5 text-left">Name</th>
                            <th class="p-5 text-left">Email</th>
                            <th class="p-5 text-left">Message</th>
                            <th class="p-5 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($contacts as $contact)

                        <tr class="border-t border-white/10 hover:bg-white/10 transition duration-300">

                            <td class="p-5 font-bold text-cyan-400">
                                #{{ $contact->id }}
                            </td>

                            <td class="p-5">
                                {{ $contact->name }}
                            </td>

                            <td class="p-5 text-purple-400">
                                {{ $contact->email }}
                            </td>

                            <td class="p-5 text-gray-300">
                                {{ $contact->message }}
                            </td>

                            <td class="p-5 text-center">

                                <a href="/contact/delete/{{ $contact->id }}"
                                   onclick="return confirm('Move to trash?')"
                                   class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl transition shadow-lg">
                                    Delete
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="p-10 text-center text-gray-500">
                                No contacts found.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">

            {{ $contacts->links() }}

        </div>

    </div>

</body>
</html>