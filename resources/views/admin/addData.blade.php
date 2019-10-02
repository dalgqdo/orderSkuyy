@include('layout/sideMenuAdmin')
{{-- <script>
        function move() {
          var elem = document.getElementById("myBar");   
          var width = 0.1;
          var id = setInterval(frame, 0.5);
          function frame() {
            if (width >= 100) {
              clearInterval(id);
            } else {
              width++; 
              elem.style.width = width + '%'; 
            }
          }
        }
</script>
<style>
#myBar {
  width: 0,1%;
  height: 10px;
  background-color: green;
}
</style> --}}
<div id="fh5co-main">
        <div class="fh5co-narrow-content">
<div class="progress progress-xs" style="margin-bottom:-0.5%">
        <div id="myBar" class="progress-bar progress-bar-success">
        </div>
</div>
<div class="panel">
        <div class="panel-heading" style="z-index:1;">
                <h3 class="panel-title">ADD data place</h3>
            </div>
        <div class="panel-body">
        <form action="{{URL('/Admin/Item/AddProccess')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-control" type="text" name="name" placeholder="place name">
              <br>
                {{-- <input class="form-control" name="quantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="number" placeholder="Description"> --}}
              {{-- <br> --}}
                <input class="form-control" name="price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="number" placeholder="number of seat">
              <br>
                <textarea class="form-control" type="text" name="description" placeholder="Description"></textarea>
              <br>
              {{-- <select class="form-control" name="color">
                  @foreach ($dataColor as $color)  
                     <option value="{{$color->id_color}}">{{$color->color_name}}</option>
                  @endforeach     
              </select>
              <br>
              <select class="form-control" name="merk">
                @foreach ($dataMerk as $merk)  
                  <option value="{{$merk->id_merk}}">{{$merk->merk_name}}</option>
                @endforeach
              </select> --}}
              <br>
                <div class="input-group">
										<input class="custom-file-input" name="image" type="file"> 
									</div>
              <br>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp&nbspSave&nbsp</button>
          </form>
        </div>
</div>
        </div>
</div>
<div id="fh5co-main">
  <div class="fh5co-narrow-content">
      <h3>DATA PLACE</h3>
          <table class="table"  style="margin-top:50px">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>name</th>
                      <th>seat booked</th>
                      <th>place name</th>
                      <th>Status</th>
                      <th class="col-md-2">action</th>
                  </tr>
              </thead>
               {{-- <tbody>
                  @foreach ($dataColor as $color)     
                      <tr>
                          <td>{{$color->id_color}}</td>
                          <td>{{$color->color_name}}</td>
                          <td>{{$color->hex_color}}</td>
                          <td><a href="{{URL('/Admin/ColorDelete', $color->id_color)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                      </tr>
                  @endforeach
              </tbody> --}}
          </table>
      </div>
  </div>
@include('layout/footerAdmin')
