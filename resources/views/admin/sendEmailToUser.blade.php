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
                @if (session()->has('EmailSended'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">x</button>
                    {{session()->get('EmailSended')}}
                </div>
            @endif
            </div>
            <div class="container" style="padding-top: 100px; padding-right: 200px;">
                <form action="{{route('emailNotification',$appointment->id)}}" method="post" >
                    @csrf
                    <div style="padding: 15px;">
                        <label for="greeting" class="form-group">Greeting</label>
                        @error('greeting')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="greeting" id="" placeholder="Write The Greeting" class="form-control" style="color: white">
                    </div>

                    <div style="padding: 15px;">
                        <label for="body" class="form-group">Body</label>
                        @error('body')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <textarea name="body" id="message" class="form-control" rows="6" placeholder="Enter The Body"></textarea>
                    </div>

                    <div style="padding: 15px;">
                        <label for="actionText" class="form-group">Action Text</label>
                        @error('actionText')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="actionText" id="" placeholder="Write The Action Text" class="form-control" style="color: white">
                    </div>

                    <div style="padding: 15px;">
                        <label for="actionURL" class="form-group">Action URL</label>
                        @error('actionURL')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="actionURL" id="" class="form-control" style="color: white">
                    </div>

                    <div style="padding: 15px;">
                        <label for="endPart" class="form-group">End Part</label>
                        @error('endPart')
                            <div class="text-danger">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                        <input type="text" name="endPart" id="" class="form-control" style="color: white">
                    </div>

                    <div style="padding: 15px;">
                        <input type="submit" id="" class="btn btn-outline-primary" style="color: white">

                    </div>

                </form>
            </div>




</div>
</div>

    @include('admin.script')
  </body>
</html>
