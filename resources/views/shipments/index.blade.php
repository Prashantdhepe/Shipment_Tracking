<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shipments</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white w-full max-w-6xl rounded-lg shadow-md p-6">

            <!-- Header -->
            <h1 class="text-2xl font-bold mb-6 text-center">
                Shipment Tracking
            </h1>

            <!-- Search -->
            <form method="GET" class="flex justify-center mb-6 gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Tracking Number"
                    class="border border-gray-300 rounded px-4 py-2 w-72 focus:outline-none focus:ring focus:border-blue-400">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Search
                </button>
            </form>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 border">Tracking #</th>
                            <th class="px-4 py-3 border">Receiver</th>
                            <th class="px-4 py-3 border">City</th>
                            <th class="px-4 py-3 border">Status</th>
                            <th class="px-4 py-3 border">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipments as $shipment)
                            <tr class="hover:bg-gray-50 text-center">
                                <td class="px-4 py-3 border text-blue-600 font-medium">
                                    <a href="{{ route('shipments.show', $shipment) }}">
                                        {{ $shipment->tracking_number }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 border">
                                    {{ $shipment->receiver_name }}
                                </td>
                                <td class="px-4 py-3 border">
                                    {{ $shipment->destination_city }}
                                </td>
                                <td class="px-4 py-3 border">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm
                                    @if ($shipment->status === 'Delivered') bg-green-100 text-green-700
                                    @elseif($shipment->status === 'In Transit') bg-yellow-100 text-yellow-700
                                    @else bg-gray-200 text-gray-700 @endif">
                                        {{ $shipment->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border">
                                    {{ $shipment->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">
                                    No shipments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $shipments->links() }}
            </div>

        </div>
    </div>

</body>

</html>
