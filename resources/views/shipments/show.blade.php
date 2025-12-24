<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shipment Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white w-full max-w-4xl rounded-lg shadow-md p-6">

            <!-- Header -->
            <h2 class="text-2xl font-bold mb-6 text-center">
                Shipment Details
            </h2>

            <!-- Basic Info -->
            <div class="mb-6 text-center">
                <p><strong>Tracking Number:</strong> {{ $shipment->tracking_number }}</p>
                <p class="mt-1">
                    <strong>Status:</strong>
                    <span
                        class="px-3 py-1 rounded-full text-sm
                    @if ($shipment->status === 'Delivered') bg-green-100 text-green-700
                    @elseif($shipment->status === 'In Transit') bg-yellow-100 text-yellow-700
                    @else bg-gray-200 text-gray-700 @endif">
                        {{ $shipment->status }}
                    </span>
                </p>
            </div>

            <!-- Sender & Receiver -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="border rounded p-4">
                    <h3 class="font-semibold mb-2">Sender</h3>
                    <p>{{ $shipment->sender_name }}</p>
                    <p class="text-sm text-gray-600">
                        {{ $shipment->sender_address }}
                    </p>
                </div>

                <div class="border rounded p-4">
                    <h3 class="font-semibold mb-2">Receiver</h3>
                    <p>{{ $shipment->receiver_name }}</p>
                    <p class="text-sm text-gray-600">
                        {{ $shipment->receiver_address }}
                    </p>
                </div>
            </div>

            <!-- Timeline -->
            <h3 class="font-semibold mb-4">Status Timeline</h3>

            <div class="border-l-2 border-gray-300 pl-6">
                @forelse($shipment->statusLogs as $log)
                    <div class="mb-6 relative">
                        <span class="absolute -left-3 top-1 w-3 h-3 bg-blue-600 rounded-full"></span>
                        <p class="font-medium">{{ $log->status }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $log->location }} • {{ $log->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">No status updates available.</p>
                @endforelse
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('shipments.index') }}"
                    class="inline-block bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
                    Back to Shipments
                </a>
            </div>

        </div>
    </div>

</body>

</html>
