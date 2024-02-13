<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 100px;">
                @if (session()->has('DeletedDoctor'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        {{session()->get('DeletedDoctor')}}
                    </div>
                @endif
            </div>

            <div class="container" align="center" style="padding-top: 100px;">
                @if (session()->has('EditedDoctor'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        {{session()->get('EditedDoctor')}}
                    </div>
                @endif
            </div>



  <div align="Center">
    <table style="padding-top: 100px;">
    <tr style="background-color: black;" align="center">

      <th style="padding: 10px; font-size: 20px; color: white;">Doctor Name</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Phone</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Specialty</th>
      <th style="padding: 10px; font-size: 20px; color: white;">room</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Added at</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Doctor Image</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Edit</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Delete</th>
    </tr>
    @foreach($doctors as $doctor)
      <tr style="background-color: black;" align="center">
        <td style="padding: 10px; color: white;">{{$doctor->name}}</td>
        <td style="padding: 10px; color: white;">{{$doctor->phone}}</td>
        <td style="padding: 10px; color: white;">{{$doctor->specialty}}</td>
        <td style="padding: 10px; color: white;">{{$doctor->room}}</td>
        <td style="padding: 10px; color: white;">{{$doctor->created_at}}</td>
        <td style="padding: 10px; color: white;"><img src="{{ asset('storage/'.$doctor->image) }}" alt="Doctor Image" width="100" height="100"></td>
        <td style="padding: 10px; color: white;">
            <form action="{{route('admin.editDoctor')}}" method="GET">
                @csrf
                <input type="hidden" name="edit" value="{{$doctor->id}}">
                <button class="btn btn-outline-primary">Edit</button>
            </form>
        </td>
      <td style="padding: 10px; color: white;">
        <form action="{{route('admin.deletedDoctor',$doctor->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure To Delete')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  </div>












        </div>
</div>


    @include('admin.script')
  </body>
</html>
