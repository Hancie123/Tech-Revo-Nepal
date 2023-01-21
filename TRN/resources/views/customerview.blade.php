@include('layouts\header')

<table class="table table-hover table-bordered m-5">

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

@include('layouts\footer')