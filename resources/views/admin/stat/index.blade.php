@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.stat.actions.index'))

@section('body')

  <stat-listing :data="{{$chart}}" inline-template>
    <div class="row">
        <canvas id="myChart" ></canvas>
        <div>@{{operation(data)}}</div>
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

