<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Sortable </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    @stack('css')

    <style>
        tr:hover {
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="main-content container">

        <div class="row justify-content-center mt-5">
            <div class="col-6 col-sm-12">
                <table class="table table-striped table-bordered">
                    <tbody id="tr_sortable">
                        @php $i = 1; @endphp

                        @foreach ($divisions as $division)
                        <tr data-index="{{$division->id}}" data-position="{{$division->position}}">
                            {{-- <th width="50px" class="text-center"> {{$i++}} </th> --}}
                            <th> {{$division->name}} </th>
                            {{-- <th width="50px" class="text-center"> {{$division->position}} </th> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>




    <script>
        $(document).ready(function(){
            $('#tr_sortable').sortable({
                update: function(event, ui){
                    $(this).children().each(function(index){
                        // console.log(index);
                        if ($(this).attr('data-position') != (index + 1)) {
                            $(this).attr('data-position', (index + 1)).addClass('updated');
                        }
                    });

                    saveNewPositions();
                }
            });

            function saveNewPositions(){

                var positions = [];

                $('.updated').each(function(){
                    positions.push([
                        $(this).attr('data-index'), 
                        $(this).attr('data-position')
                    ]);
                    
                    $(this).removeClass('updated');
                })

                $.ajax({
                    url: "{{ url('ajax/sortable') }}",
                    type: 'POST',
                    dataType: 'text',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        update: 1,
                        positions: positions 
                    },
                    success: function(response){
                        console.log(response);
                    }
                })
            }
        });
    </script>













    @stack('javascripts')

</body>

</html>