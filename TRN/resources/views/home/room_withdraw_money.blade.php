@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Withdraw Money</title>
<script type="text/javascript" src="{{url('/')}}/assets/nepali-date-picker.min.js"></script>
<link rel="stylesheet" href="{{url('/')}}/assets/nepali-date-picker.min.css">


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Withdraw Money</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/home/room_management')}}">Room Management</a>
                </li>
                <li class="breadcrumb-item active">Withdraw Money</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="card">

        <div class="text-center">
            <h2 id="heading" class="card-title p-0 m-0 text-light p-3 bg-success">Room | Withdraw Money</h2>
        </div>
        <br>


        <form action="{{url('/home/room_management/withdraw_money')}}" method="post">
            @if(Session::has('success'))
            <script>
            toastr.success("{{Session::get('success')}}")
            </script>
            @endif
            @if(Session::has('fail'))
            <script>
            toastr.fail("{{Session::get('fail')}}")
            </script>
            @endif
            @csrf
            <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
            <input type="hidden" value="Withdraw" name="status" type="text">
            <div class="w3-cell-row">

                <div class="w3-container w3-cell w3-mobile">


                    <label class="form-label" for="firstname">Date:</label>
                    <input type="text" class="form-control" name="date" id="nepali-datepicker" placeholder="Enter date">
                    <span>
                        @error('date')
                        <script>
                        toastr.warning('{{$message}}')
                        </script>
                        @enderror
                    </span>
                    <br>

                    <label class="form-label" for="firstname">Amount:</label>
                    <input type="text" class="form-control" name="income" id="amount" placeholder="Enter your amount">
                    <span>
                        @error('income')
                        <script>
                        toastr.warning('{{$message}}')
                        </script>
                        @enderror
                    </span>
                    <br>

                </div>

                <div class="w3-container w3-cell w3-mobile">

                    <label class="form-label" for="firstname">Current Month:</label>
                    <input type="text" class="form-control" name="date3" id="amount" value="January 2023" readonly>
                    <span>
                        @error('date3')
                        <script>
                        toastr.warning('{{$message}}')
                        </script>
                        @enderror
                    </span>
                    <br>

                    <label class="form-label" for="firstname">Remark:</label>
                    <textarea type="text" class="form-control" name="remark" id="remark"
                        placeholder="Remarks"></textarea>
                    <span>
                        @error('remark')
                        <script>
                        toastr.warning('{{$message}}')
                        </script>
                        @enderror
                    </span>
                    <br>
                </div>
            </div>

            <input type="submit" name="room_saving" value="Withdraw Money" class="btn btn-success mb-3 mx-5">


        </form>





    </div>
    <!------- Form End ------->


    <!-- Winthdraw Reports -->
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Money Withdraw</h5>
                <div class="container table-responsive">
                    <table class="table table-hover table-striped" id="table_id720">
                        <thead class="w3-center bg-success text-white">
                            <tr>
                                <th style="width:10%">ID</th>
                                <th style="width:10%">Date</th>
                                <th style="width:10%">Deposit</th>
                                <th style="width:10%">Remarks</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($withdrawtable as $data1)

                            <tr>
                                <td>{{$data1['Expenses_ID']}}</td>
                                <td>{{$data1['Date']}}</td>
                                <td>Rs. {{$data1['Withdraw']}}</td>
                                <td>{{$data1['Remark']}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div><!-- End Reports -->

</main>


<script type="text/javascript">
$(document).ready(function() {
    var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD");


    $('#nepali-datepicker').nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,

    });
});
</script>


<script>
$(document).ready(function() {
    $('#table_id720').DataTable({
            order: [
                [1, 'desc']
            ],
        }

    );
});
</script>


</body>


@include("layouts/adminfooter")

</html>