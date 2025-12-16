<h2>Shipment Details</h2>

<p><strong>Tracking:</strong> {{ $shipment->tracking_number }}</p>
<p><strong>Sender:</strong> {{ $shipment->sender_name }}</p>
<p><strong>Receiver:</strong> {{ $shipment->receiver_name }}</p>
<p><strong>Status:</strong> {{ $shipment->status }}</p>

<h3>Status Timeline</h3>
<ul>
    @foreach ($shipment->statusLogs as $log)
        <li>
            {{ $log->status }} – {{ $log->location }}
            ({{ $log->created_at->format('d M Y H:i') }})
        </li>
    @endforeach
</ul>

<button onclick="window.history.back();">Back</button>
