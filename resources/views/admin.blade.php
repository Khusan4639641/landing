@extends("layuot.admin.welcome")
@section('content')
    <style>
        div.listLink>ul>li>a{
            text-decoration: none;
        }
        div.listLink>ul>li{
            list-style-type: none;
            display: inline-block;
            padding: 5px;
        }
        div.listLink{
            text-align: center;
        }
        a.disabled-a{
            color: #ccc;
        }
    </style>
    @if(isset($row))
    <h3>Select show rows data</h3>

    <form style="width: 500px;display: flex;padding: 5px" onsubmit="return false;">
        <input type="number" id="dataNumber" value="{{ $row }}" min="2" class="form-control">
        <a class="btn btn-outline-info" style="margin-left: 10px" onclick="changeData()"> Change </a>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>url</th>
                <th>Count</th>
                <th>date</th>
            </tr>
        </thead>
        @foreach($posts->data as $post)
        <tr>
            <td>{{ $post->post_url }}</td>
            <td>{{ $post->total }}</td>
            <td>{{ $post->date }}</td>
            <td></td>
        </tr>
        @endforeach
        <tfoot>
            <tr>
                <th>url</th>
                <th>Count</th>
                <th>date</th>
            </tr>
        </tfoot>
    </table>
    <div class="listLink">
        <ul>
            @for($i=1;$i<$posts->last_page;$i++)
                @if($id==$i)
                    <li><a class="disabled-a"> {{ $i }} </a></li>
                @else
                    <li><a href="/admin/activity/{{ $i }}/{{ $row }}"> {{ $i }} </a></li>
                @endif
            @endfor
        </ul>
    </div>
    <script>
        function changeData(){
            let number = document.getElementById("dataNumber").value
            if(number!=0){
                let redirect = ""
                let urls = location.href.split("/")
                for (let i = 0; i <= 4; i++) {
                    redirect += urls[i] + "/"
                }
                window.location.href = redirect+"1/" + number
            }
        }
    </script>
    @endif
@endsection

