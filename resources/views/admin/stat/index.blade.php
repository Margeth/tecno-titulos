@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.stat.actions.index'))

@section('body')

  <stat-listing :data="{{$chart}}" inline-template>
    <div class="row">
        <canvas id="myChart" ></canvas>
      <!--  <div>@{{operation(data)}}</div> -->
      <script type="module" src="{{URL::asset('/js/stat.js')}}"></script>
      <script type="application/javascript">
      
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </stat-listing>


@endsection
    <?php
    session_start();
    if (isset($_SESSION['quantity'])) {
        $_SESSION['quantity'] = $_SESSION['quantity'] + 1;
    } else {
        $_SESSION['quantity'] = 1;
    }
    $x = $_SESSION['quantity'];
    ?>

