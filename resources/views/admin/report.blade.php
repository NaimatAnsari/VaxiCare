@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Vaccination Report</h2>
    <div class="text-right mb-3">
        <button id="downloadPDF" class="btn btn-success"><i class="fa fa-download"></i> Download PDF</button>
    </div>
    <div class="table-responsive">
        <table id="vaccinationTable" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Parent Name</th>
                    <th>Child Name</th>
                    <th>Hospital</th>
                    <th>Appointment Date</th>
                    <th>Vaccine Type</th>
                    <th>Comments</th>
                    <th>Vaccination Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $key => $booking)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $booking->parent_name }}</td>
                    <td>{{ $booking->child_name }}</td>
                    <td>{{ $booking->h_name }}</td>
                    <td>{{ $booking->vaccination_date }}</td>
                    <td>{{ $booking->vaccine_name }}</td>
                    <td>{{ $booking->comment }}</td>
                    <td>{{ $booking->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>

<script>
    document.getElementById('downloadPDF').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Add title and date
        doc.text('Vaccination Report', 10, 10);
        doc.text('Date: ' + new Date().toLocaleDateString(), 10, 20);

        // Extract data from the table for the PDF
        let tableContent = [];
        document.querySelectorAll('#vaccinationTable tbody tr').forEach(row => {
            let rowData = [];
            row.querySelectorAll('td').forEach(cell => {
                rowData.push(cell.innerText);  // Add text of each cell to the rowData
            });
            tableContent.push(rowData);  // Add the rowData to tableContent
        });

        // Generate the table in the PDF
        doc.autoTable({
            head: [['#', 'Parent Name', 'Child Name', 'Hospital', 'Appointment Date', 'Vaccine Type', 'Comments', 'Vaccination Status']],
            body: tableContent,
            startY: 30,  // Start drawing after the title and date
        });

        // Download the PDF
        doc.save('vaccination_report_user.pdf');
    });
</script>



@endsection
