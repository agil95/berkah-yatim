@extends('layouts.global')
@section('title') Overview Data @endsection

 @section('content')
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
      <div class="row">
      <form role="form">
      {{-- <div class="col-lg-4 col-xs-6">
      <div class="form-group">
        <label>Pilih Data</label>
        <select class="form-control" name="jenis" id ="jenis" required>
          <option value="date" {{ request()->has('jenis') && request()->jenis == 'date' ? 'selected' : '' }}>Daily</option>
          <option value="week" {{ request()->has('jenis') && request()->jenis == 'week' ? 'selected' : '' }}>Weekly</option>
          <option value="month" {{ request()->has('jenis') && request()->jenis == 'month' ? 'selected' : '' }}>Monthly</option>
          <option value="year" {{ request()->has('jenis') && request()->jenis == 'year' ? 'selected' : '' }}>Yearly</option>
        </select>
      </div> 
    </div>--}}
    <div class="col-xs-8 col-md-9 col-lg-10">
      <div class="form-group">
        <label>Pilih Data</label>
        <input type="text" class="form-control datepicker" id="value_date" name="value_date" required>
      </div>
    </div>
    <div class="col-xs-4 col-md-3 col-lg-2" style="padding-top: 24px;">
      <div style="display: flex;">
        <button style="flex: 1 1 0%;" class="btn btn-success" name="filter" value="filter">Filter</button>
        @if (request()->has('jenis') || request()->has('value_date'))
          <a style="flex: 1 1 0%; margin-left: 0.5rem" href="{{ route('admin.dashboard') }}" class="btn btn-default">Reset</a>
        @endif
      </div>
    </div>
    </form>
    </div>
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>{{$totaldonatur}} orang</h2>

              <p>Jumlah Donatur</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{route('manageuser.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>{{$banyakdonasi}} donasi</h2>

              <p>Banyak Donasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="{{route('manage-donasi-user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>{{$totalproker}} campaigns</h2>

              <p>Campaign Live</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="{{route('manage-campaign.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2>{{$totalprokeroff}} campaigns</h2>

              <p>Campaign Off</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="{{route('manage-campaign.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Rp {{$total}}</h2>

              <p>Total Donasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-user" class="small-box-footer" >More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2>Rp. {{$belumdonasi}}</h2>

              <p>Donasi Belum Terkirim</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-user" class="small-box-footer" onclick="penghasilan('{{$belumdonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2>Rp. {{$expireddonasi}}</h2>

              <p>Donasi Kadaluarsa</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-user" class="small-box-footer" onclick="penghasilan('{{$expireddonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h2>Rp. {{$paid}}</h2>

              <p>Donasi Terkirim</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-user" class="small-box-footer" onclick="penghasilan('{{$belumdonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Rp. {{$totaldonasi}}</h2>

              <p>Saldo Terverifikasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-user" class="small-box-footer" onclick="penghasilan('{{$totaldonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Rp. {{$totalpenyaluran}}</h2>

              <p>Saldo Tersalurkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/penyaluran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h2>Rp. {{ $sisasaldo}}</h2>

              <p>Sisa Saldo</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="admin/manage-donasi-donatur?status=sampai" class="small-box-footer" onclick="penghasilan('{{$totaldonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h2 id="gtag-view-count">Loading...</h2>
              <p>Total Web Visitor</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <p class="g-signin2" data-onsuccess="queryReports"></p>
            <a target="_blank" href="https://analytics.google.com/analytics/web/?authuser=0#/report-home/a178026555w246334490p228862417" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>

      {{-- Google Tag Manager --}}
      {{-- <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Google Tag Manager</h3>
          <div class="box-tools pull-right">
            <p class="g-signin2" data-onsuccess="queryReports"></p>
          </div>
        </div>
        <div class="box-body">
          <textarea class="form-control" rows="20" id="query-output"></textarea>
        </div>
      </div> --}}
      {{-- EOF: Google Tag Manager --}}

    </section>
 @endsection

@section('script')
<script>
  // Replace with your view ID.
  var VIEW_ID = "{{ env('GOOGLE_TAG_VIEW_ID', '228862417') }}";
  // Query the API and print the results to the page.
  function queryReports() {
    gapi.client.request({
      path: '/v4/reports:batchGet',
      root: 'https://analyticsreporting.googleapis.com/',
      method: 'POST',
      body: {
        reportRequests: [
          {
            viewId: VIEW_ID,
            dateRanges: [
              {
                startDate: '7daysAgo',
                endDate: 'today'
              }
            ],
            metrics: [
              {
                expression: 'ga:sessions'
              }
            ]
          }
        ]
      }
    }).then(displayResults, console.error.bind(console));
  }

  function displayResults(response) {
    var formattedJson = response.result;
    // var formattedJson = JSON.parse('{"reports":[{"columnHeader":{"metricHeader":{"metricHeaderEntries":[{"name":"ga:sessions","type":"INTEGER"}]}},"data":{"totals":[{"values":["0"]}]}}]}', null, 2)
    var viewCount = formattedJson.reports[0].data.totals[0].values[0];
    document.getElementById('gtag-view-count').innerText = viewCount + ' Views';
  }
</script>

<!-- Load the JavaScript API client and Sign-in library. -->
<script src="https://apis.google.com/js/client:platform.js"></script>
<script type="text/javascript">

  function penghasilan(total) {
    // alert("Penghasilan Rp." + total);
  }

  $(document).ready(function() {

    // displayResults()

    $('#value_date').daterangepicker({
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'This Week': [moment().startOf('isoWeek'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'This Year': [moment().startOf('year'), moment().endOf('year')]
      },
      locale: {
        format: 'DD-MM-YYYY'
      }
    });

    $('#jenis').change(function () {
      var value = this.value;
    })

    

    /* $("#jenis").change(function () {
      var value = this.value;
      if(value!="year")
        $("#value_date").prop("type",value);
      else{
        $("#value_date").prop("min",'1900');
        $("#value_date").prop("max",'2099');
        $("#value_date").prop("type",'number');
        $("#value_date").prop("value",'2020');
      }
    }); */
  });
</script>
@endsection


