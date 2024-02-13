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
                @if (session()->has('DeletedAppointment'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        {{session()->get('DeletedAppointment')}}
                    </div>
                @endif
            </div>

            <div class="container" align="center" style="padding-top: 100px;">
                @if (session()->has('ApprovedAppointment'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                        {{session()->get('ApprovedAppointment')}}
                    </div>
                @endif
            </div>


  <div align="Center" style="padding-top: 100px; padding-right: 50px;">
    <table style="padding-top: 100px;">
    <tr style="background-color: black;" align="center">
      <th style="padding: 10px; font-size: 20px; color: white;">Customer Name</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Email</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Phone</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Doctor Name</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Date</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Message</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Status</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Approve Appointment</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Cancle Appointment</th>
      <th style="padding: 10px; font-size: 20px; color: white;">Send Email</th>

    </tr>
    @foreach($appointments as $apponitment)
      <tr style="background-color: black;" align="center">
        <td style="padding: 10px; color: white;">{{$apponitment->name}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->email}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->phone}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->doctor}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->date}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->message}}</td>
        <td style="padding: 10px; color: white;">{{$apponitment->status}}</td>
        <td style="padding: 10px; color: white;">
          <form action="{{route('approvedAppointment',$apponitment->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button class="btn btn-outline-success">Approved</button>
          </form>
        </td>
      <td style="padding: 10px; color: white;">
        <form action="{{route('cancleAAppointment',$apponitment->id)}}" method="POST">
          @csrf
          @method('PUT')
          <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure To Cancle')">Cancle</button>
        </form>
      </td>
      <td style="padding: 10px; color: white;">
        <button class="btn btn-outline-danger"><a href="{{url('/sendEmailToUser',$apponitment->id)}}">Send Email</a></button>
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
