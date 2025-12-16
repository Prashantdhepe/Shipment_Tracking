<form method="GET">
    <input type="text" name="search" placeholder="Search Tracking Number">
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <th>Tracking Number</th>
        <th>Receiver</th>
        <th>Destination</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    @foreach ($shipments as $shipment)
        <tr>
            <td>
                <a href="{{ url('/shipments/' . $shipment->id) }}">
                    {{ $shipment->tracking_number }}
                </a>
            </td>
            <td>{{ $shipment->receiver_name }} </td>
            <td>{{ $shipment->receiver_address }} </td>
            <td>{{ $shipment->status }} </td>
            <td>{{ $shipment->created_at->format('d M Y') }}</td>
        </tr>
    @endforeach
</table>

{{ $shipments->links() }}
