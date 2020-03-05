<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>Teachers portal Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <link rel="stylesheet" href="{{asset('tp_dashboard/fonts/solaimanLipi/fonts.css')}}" />
  <link rel="stylesheet" href="{{asset('tp_dashboard/css/style.css')}}" />
</head>

<body>


  @include('tp_view.pages.header')

  @foreach ($divisions as $section)

  <?php  $s = $section->name; ?>
  @include('tp_view.pages.'.$s)

  @endforeach

  {{-- @include('tp_view.pages.banner')
  @include('tp_view.pages.top_uploader')
  @include('tp_view.pages.map')
  @include('tp_view.pages.typewise_member')
  @include('tp_view.pages.graph') --}}

  @include('tp_view.pages.footer')


  <!-- Modal -->
  <div class="modal fade" id="sortable_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
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
  </div>


  <!-- ////////////////////////////////////////////////////////////////////////////////// -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <!-- Daterange -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- Daterange -->

  <!-- highchart js -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <!-- highchart js -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

  <!-- /////////////////// SOTABLE MODAL ////////////////////// -->
  <script>
    $(document).ready(function(){
      $('#sortable_btn').on('click', function(){
        $('#sortable_modal').modal('show');
      })
    })
  </script>

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
            // var file_name = [];
  
            $('.updated').each(function(){
                positions.push([
                    $(this).attr('data-index'), $(this).attr('data-position')
                ]);
  
                // file_name.push([
                //     $(this).attr('data-position'), $(this).attr('file_name')
                // ]);
                
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
  <!-- /////////////////// SOTABLE MODAL ////////////////////// -->


  <!-- /////////////////// ACTIVE TABS ////////////////////// -->
  <script>
    $("#registerd-list").tabs();
          $("#blog-uploaded").tabs();
          $("#content-uploaded").tabs();
    
          $(".registerd-tabs li").click(function(e) {
            e.preventDefault();
    
            $(".registerd-tabs li").removeClass("active");
            $(this).addClass("active");
          });
    
          $(".blog-tabs li").click(function(e) {
            e.preventDefault();
    
            $(".blog-tabs li").removeClass("active");
            $(this).addClass("active");
          });
    
          $(".content-tabs li").click(function(e) {
            e.preventDefault();
    
            $(".content-tabs li").removeClass("active");
            $(this).addClass("active");
          });
  </script>
  <!-- /////////////////// ACTIVE TABS ////////////////////// -->

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".swiper-container-slider", {
            slidesPerView: 3,
            spaceBetween: 5,
            autoplay: {
              delay: 2500,
              disableOnInteraction: false
            },
            // init: false,
            pagination: {
              el: ".swiper-pagination-slider",
              clickable: true
            },
            breakpoints: {
              640: {
                slidesPerView: 2,
                spaceBetween: 20
              },
              768: {
                slidesPerView: 2,
                spaceBetween: 40
              },
              1024: {
                slidesPerView: 3,
                spaceBetween: 50
              }
            }
          });
  </script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".swiper-container", {
            speed: 600,
            parallax: true,
            autoplay: {
              delay: 2500,
              disableOnInteraction: false
            },
            pagination: {
              el: ".swiper-pagination",
              clickable: true
            }
            // navigation: {
            //   nextEl: ".swiper-button-next",
            //   prevEl: ".swiper-button-prev"
            // }
          });
  </script>

  <!-- highchart -->
  <script>
    Highcharts.chart("highChart_container", {
            chart: {
              type: "spline"
            },
    
            title: {
              text: ""
            },
    
            xAxis: {
              categories: ["2015", "2016", "2017", "2018", "2019"]
            },
    
            yAxis: {
              allowDecimals: false,
              min: 0,
              title: {
                text: ""
              }
            },
    
            tooltip: {
              formatter: function() {
                return (
                  "<b>" +
                  this.x +
                  "</b><br/>" +
                  this.series.name +
                  ": " +
                  this.y +
                  "<br/>" +
                  "Total: " +
                  this.point.stackTotal
                );
              }
            },
    
            plotOptions: {
              column: {
                stacking: "normal"
              }
            },
    
            series: [
              {
                name: "Teachers",
                data: [50456, 256489, 150564, 345123, 434561]
              }
            ],
            exporting: {
              enabled: false
            }
          });
  </script>



</body>

</html>