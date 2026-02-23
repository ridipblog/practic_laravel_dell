<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <div class="max-w-5xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold mb-6 text-gray-700">
            Match Groups
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-center">User 1</th>
                        <th class="py-3 px-4 text-center">User 2</th>
                        <th class="py-3 px-4 text-center">User 3</th>
                        <th class="py-3 px-4 text-center">Select</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach ($result as $index => $row)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="py-3 px-4 font-semibold">
                                {{ $index + 1 }}
                            </td>

                            <td class="py-3 px-4 text-center">
                                <button
                                    class="user-btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-lg shadow transition"
                                    data-user="{{ $row->user1 }}">
                                    {{ $row->user1 }}
                                </button>
                            </td>

                            <td class="py-3 px-4 text-center">
                                <button
                                    class="user-btn bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded-lg shadow transition"
                                    data-user="{{ $row->user2 }}">
                                    {{ $row->user2 }}
                                </button>
                            </td>

                            <td class="py-3 px-4 text-center">
                                <button
                                    class="user-btn bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded-lg shadow transition"
                                    data-user="{{ $row->user3 }}">
                                    {{ $row->user3 }}
                                </button>
                            </td>

                            <td class="py-3 px-4 text-center">
                                <button
                                    class="check-btn bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition"
                                    data-group="{{ $row->user1 }}-{{ $row->user2 }}-{{ $row->user3 }}">
                                    Check
                                </button>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
