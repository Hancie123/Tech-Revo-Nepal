@include('layouts\header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.js"></script>




<div class="container m-5">
<table class="table table-hover table-bordered" id="table_id">


<thead>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Email</th>
<th>Mobile No</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($admin as $data)
<tr>
<td>{{$data->name}}</td>
<td>{{$data->dob}}</td>
<td>{{$data->email}}</td>
<td>{{$data->mobileno}}</td>
<td>{{$data->address}}</td>

<td>
    <a href="{{url('admin/delete')}}/{{$data->admin_id}}">
    <button class="btn btn-danger">Delete</button>
</a>
</td>
</tr>
@endforeach
</tbody>


</table>

</div>

<script>
$(document).ready(function () {
    $('#table_id').DataTable({
        buttons: [
        'copy', 'excel', 'pdf'
    ]
    });
});
</script>



@include('layouts\footer')