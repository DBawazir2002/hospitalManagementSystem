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
            <div class="container" style="padding-top: 100px;">
                <form action="{{route('admin.updateDoctor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div style="padding: 15px;">
                        <label for="name" class="form-group">Doctor Name</label>
                        @error('name')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="name" id="" placeholder="Write The Name" class="form-control" style="color: white" value="{{$doctor->name}}">
                    </div>

                    <div style="padding: 15px;">
                        <label for="phone" class="form-group">Doctor Phone</label>
                        @error('phone')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="number" name="phone" id="" placeholder="Write The Number" class="form-control" style="color: white" value="{{$doctor->phone}}">
                    </div>

                    <div style="padding: 15px;">
                        <label for="specialty" class="form-group">Doctor Specialty</label>
                        @error('specialty')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <select name="specialty" id="" class="form-control" >
                            @foreach ($doctorSpecialties as $specialty )
                                <option value="{{$specialty}}">{{$specialty}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="padding: 15px;">
                        <label for="room" class="form-group">Doctor Room Number</label>
                        @error('room')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="room" id="" placeholder="Write The Room Number" class="form-control" style="color: white" value="{{$doctor->room}}">
                    </div>

                    <div style="padding: 15px;">
                        <label for="image" class="form-group">Doctor Image</label>
                        @error('image')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="file" name="image" id="" class="form-control" style="color: white">
                    </div>

                    <div style="padding: 15px;">
                        <input type="submit" id="" class="btn btn-success" style="color: white">

                    </div>

                </form>
            </div>




</div>















    @include('admin.script')
</body>
</html>