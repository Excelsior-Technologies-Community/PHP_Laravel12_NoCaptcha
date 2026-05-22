<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash Contacts</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#050816] min-h-screen text-white overflow-x-hidden">

    <!-- Background Glow -->
    <div class="fixed inset-0 -z-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 opacity-20 blur-3xl rounded-full"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-pink-500 opacity-20 blur-3xl rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto p-6 md:p-10">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-5 mb-10">

            <div>
                <h1 class="text-5xl font-extrabold bg-gradient-to-r from-red-400 to-pink-500 bg-clip-text text-transparent">
                    🗑 Trash Contacts
                </h1>

                <p class="text-gray-400 mt-3">
                    Restore or permanently delete removed contacts
                </p>
            </div>

            <!-- Back Button -->
            <a href="/contact/dashboard"
               class="bg-gradient-to-r from-cyan-500 to-indigo-600 px-6 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition duration-300">
                ← Back Dashboard
            </a>

        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500 text-green-400 px-5 py-4 rounded-2xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <!-- Table Head -->
                    <thead class="bg-white/10 text-gray-300">

                        <tr>
                            <th class="p-5 text-left">ID</th>
                            <th class="p-5 text-left">Name</th>
                            <th class="p-5 text-left">Email</th>
                            <th class="p-5 text-center">Actions</th>
                        </tr>

                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        @forelse($contacts as $contact)

                        <tr class="border-t border-white/10 hover:bg-white/10 transition duration-300">

                            <!-- ID -->
                            <td class="p-5 font-bold text-pink-400">
                                #{{ $contact->id }}
                            </td>

                            <!-- Name -->
                            <td class="p-5">
                                {{ $contact->name }}
                            </td>

                            <!-- Email -->
                            <td class="p-5 text-cyan-400">
                                {{ $contact->email }}
                            </td>

                            <!-- Actions -->
                            <td class="p-5">

                                <div class="flex flex-col md:flex-row justify-center gap-3">

                                    <!-- Restore -->
                                    <a href="/contact/restore/{{ $contact->id }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl text-center font-semibold shadow-lg transition duration-300">
                                        Restore
                                    </a>

                                    <!-- Permanent Delete -->
                                    <a href="/contact/force-delete/{{ $contact->id }}"
                                       onclick="return confirm('Delete forever?')"
                                       class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-center font-semibold shadow-lg transition duration-300">
                                        Delete Forever
                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <!-- Empty State -->
                        <tr>
                            <td colspan="4" class="p-10 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="text-7xl mb-4">
                                        📭
                                    </div>

                                    <h2 class="text-2xl font-bold text-gray-300">
                                        Trash is Empty
                                    </h2>

                                    <p class="text-gray-500 mt-2">
                                        No deleted contacts found.
                                    </p>

                                </div>

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
