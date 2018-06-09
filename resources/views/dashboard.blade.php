@extends('template')
@section('content')
<div class="container">
  <div>{!! $chart->container() !!}

 <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! $chart->script() !!}

</div>
@endsection
