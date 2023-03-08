@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Room Statements</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Room Statements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/home/room_management')}}">Room Management</a></li>
                <li class="breadcrumb-item active">Room Statements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <form action="/home/room_management/room_statements" method="GET">
            <div class="row">


                <div class="col-md-6">
                    <label for="search">Select Month:</label>
                    <select class="w3-select w3-border w3-round" name="month">
                        <option disabled selected>Choose your option</option>
                        @foreach($expensesmonth as $data)
                        <option>{{$data->Date3}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="search">Select Deposit or Withdraw:</label>
                    <select class="w3-select w3-border w3-round" name="status">
                        <option disabled selected>Choose your option</option>
                        <option>Deposit</option>
                        <option>Withdraw</option>

                    </select>
                </div>


            </div>
            <br>
            <button class="btn btn-success">Search</button>
            <input type="button" class="btn btn-success text-light" onclick="generate()" value="Export To PDF" />

        </form>


    </div>
    <hr>
    <div class=" container table-responsive">
        <table class="table table-bordered table-hover table-striped" id="hancie">
            <thead class="bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $data)

                @if($data->count() == 0)
                <tr>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                </tr>
                @else
                <tr>

                    <td>{{$data->Expenses_ID}}</td>
                    <td>{{$data->Date}}</td>
                    <td>
                        @if($data->Status=='Deposit')
                        Rs. <?php echo number_format($data['Deposit']); ?>
                        @else
                        Rs. <?php echo number_format($data['Withdraw']);?>
                        @endif

                    </td>
                    <td>{{$data->Remark}}</td>

                </tr>
                @endif

                @endforeach
            <tbody>
        </table>
    </div>



</main>

<script>
function generate() {
    var doc = new jsPDF('p', 'pt', 'letter');
    var htmlstring = '';
    var tempVarToCheckPageHeight = 0;
    var pageHeight = 0;
    pageHeight = doc.internal.pageSize.height;
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {
            // true = "handled elsewhere, bypass text extraction"  
            return true
        }
    };
    margins = {
        top: 150,
        bottom: 60,
        left: 40,
        right: 20,
        width: 600
    };
    var y = 20;
    doc.setLineWidth(2);
    doc.text(250, y = y + 30, "Room Statements");
    doc.autoTable({
        html: '#hancie',
        startY: 70,
        theme: 'grid',
        columnStyles: {
            0: {
                cellWidth: 100,
            },
            1: {
                cellWidth: 150,
            },
            2: {
                cellWidth: 140,
            },
            3: {
                cellWidth: 150,
            }


        },
        styles: {
            minCellHeight: 20
        }
    })
    doc.save('room_statements.pdf');
}
</script>



</body>

@include("layouts.adminfooter")

</html>