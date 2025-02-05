<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Report</title>
</head>
<body>
    <h1>Vaccination Report</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Child Name</th>
                <th>Hospital</th>
                <th>Vaccine</th>
                <th>Vaccination Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->child->name }}</td>  <!-- Assuming 'child' is a relationship -->
                    <td>{{ $booking->hospital->fullname }}</td>  <!-- Assuming 'hospital' is a relationship -->
                    <td>{{ $booking->vaccine->vaccine_name }}</td>  <!-- Assuming 'vaccine' is a relationship -->
                    <td>{{ $booking->vaccination_date }}</td>
                    <td>{{ $booking->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
