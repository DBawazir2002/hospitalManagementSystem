<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      
      <form class="main-form" action="{{route('appointment')}}" method="post">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="name">
            @error('name')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" class="form-control" placeholder="Email address.." name="email">
            @error('email')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" name="date">
            @error('date')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select">
              <option value="null">Select Doctor Name</option>
              @foreach($doctors as $doctor)
                  <option value="{{$doctor->name}}">{{$doctor->name}} it's specialty {{$doctor->specialty}}</option>
              @endforeach
              @error('doctor')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number.." name="phone">
            @error('phone')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
            @error('message')
              <div class="text-danger">
                  <span>{{$message}}</span>
              </div>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
</div>