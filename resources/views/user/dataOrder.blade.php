@include('layout/side-menu')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <h3>DATA ORDER</h3>
            <table class="table"  style="margin-top:50px">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>seat booked</th>
                        <th>Time booking</th>
                        <th>place name</th>
                        <th>status</th>
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
