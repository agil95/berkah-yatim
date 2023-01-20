@extends('layouts.public')
@section ('title', 'Riwayat Donasi')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/riwayat-donasi.css')}}" />

@section('navbar')
    @include('layouts.navbar',
        ['page_title' => 'Riwayat Donasi',
         'primary' => false]
)
@endsection

@section('content')
    <section>
        <div id="content" class="bg-white">
        </div>
        <div class="row donation-item-loading">
            <div class='col-xs-3'>
                <div class="donation-item__img by-shimmer"></div>
            </div>
            <div class='col-xs-6'>
                <div class="by-shimmer mb-s" style="width: 100%; height: 14px; border-radius: 4px;"></div>
                <div class="by-shimmer" style="width: 60%; height: 12px; border-radius: 4px;"></div>
            </div>
            <div class='col-xs-3'>
                <div class="by-shimmer" style="width: 100%; height: 25px; border-radius: 15px;"></div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/riwayat-donasi.css')}}" />

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script>
        const container = $("#content");
        let list = {};
        let old_list = {};
        let page = 1;
        function formatUang(e){
            return e.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
        function addList(data){
            list = {};
            if(data.length !== 0){
                data.forEach(function (f){
                    let date = moment(f.created_at, 'YYYY-MM-DD HH:mm:ss').format('MMMM YYYY')
                    if(Object.keys(list).includes(date)){
                        list[date] = {
                            total : list[date].total + f.jumlah,
                            data: list[date].data.concat([f])
                        }
                    } else {
                        list[date] = {
                            total : f.jumlah,
                            data: [f]
                        }
                    }
                })
                Object.keys(list).forEach( function (e){
                        let child = "";
                        list[e].data.forEach(function (f, i){

                            let image = "";
                            if (f.prokers != null) {
                                image =  f.prokers['dokumentasi'];
                            }

                            let status = f.status;
                            switch (f.status) {
                                case 'paid':
                                    status = "berhasil";
                                    break;
                                case 'settlement':
                                    status = "berhasil";
                                    break;
                                case 'success':
                                    status = "berhasil";
                                    break;
                                case 'verified':
                                    status = "diverifikasi";
                                    break;
                                case 'cancel':
                                    status = "dibatalkan";
                                    break;
                                case 'pending':
                                    status = "tertunda";
                                    break;
                                case 'expire':
                                    status = "kadaluarsa";
                                    break;
                                default:
                                    status = f.status;
                            }
                            let divImage="";

                            if(image=="")
                                divImage = "<div class='col-xs-3'><img alt='kitabisa.com' class='img img-responsive' src='{{asset('dist/img/zakat/img-zakat-emptystate.png') }}' ></div>" ;
                            else
                                divImage = "<div class='col-xs-3'><img alt='kitabisa.com' class='img img-responsive' src='{{asset('storage/') }}/"+image+"' ></div>";

                            let item = "<div class='row list-donasi'>" + divImage +
                                "<div class='col-xs-6'>" +
                                "<p class='title-donasi-item' data-id="+f.id+">"+(f.prokers !== null ? f.prokers.nama_kegiatan : f.url)+"</p>" +
                                "<p>Rp."+formatUang(f.jumlah)+" - "+moment(f.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY')+"</p>" +
                                "</div>" +
                                "<div class='col-xs-3'><div class='btn-status "+f.status+"'>"+status+"</div><div>" +
                                "</div>" +
                                "</div>" +
                                "</div>"
                            child = child + item
                        });
                        let header = $('.header-list[data-date="'+e+'"]');
                        if( header.length !== 0){
                            let total = list[e].total + (old_list[e] ? old_list[e].total : 0)
                            let total_donasi = list[e].data.length + (old_list[e] ? old_list[e].data.length : 0)
                            header
                                .empty()
                                .append(
                                    "<div class='col-xs-3'>"+e+"</div>" +
                                    "<div class='col-xs-6'>Rp."+formatUang(total)+"</div>" +
                                    "<div class='col-xs-3'><span class='pull-right'>"+total_donasi+" donasi</span></div>"
                                )
                            $('.child[data-date="'+e+'"]').append(child)
                            old_list[e]['total'] = total
                            old_list[e]['data'] = list[e].data.concat(old_list[e] ? old_list[e].data : [])
                        } else {container.append(
                            "<div class='row header-list' data-date='"+e+"'>" +
                            "<div class='col-xs-3'>"+e+"</div>" +
                            "<div class='col-xs-6'>Rp."+formatUang(list[e].total)+"</div>" +
                            "<div class='col-xs-3'><span class='pull-right'>"+list[e].data.length+" donasi</span></div>" +
                            "</div>" +
                            "<div class='child' data-date='"+e+"'>"+child+"</div>"
                        )
                            old_list[e] = {
                                total:list[e].total,
                                data:list[e].data
                            }
                        }
                    }
                )
                container.append( "<div id='loading'>Loading</div>")
            }
        }
        const IO_OPTIONS = {
            threshold: 0.1,
        };
        const app = {
            donationLoading: document.querySelector('.donation-item-loading'),
            isLoading: false,
            isIntersecting: false,
        }
        const observer = new IntersectionObserver(entries => {
            const [{ isIntersecting }] = entries;

            if (isIntersecting) {
                app.isIntersecting = true;
                app.fetchingInterval = setInterval(() => {
                    if (app.isIntersecting && !app.isLoading) {
                        fetchNewDonation();
                    }
                }, 1000);
                fetchNewDonation();
            } else {
                app.isIntersecting = false;
                clearInterval(app.fetchingInterval);
            }
        }, IO_OPTIONS);

        async function fetchNewDonation(){

            app.isLoading = true;

            try {
                const response = await fetch('/donatur/riwayat?page='+page);
                const json = await response.json();

                if (json && json.donasis && JSON.parse(json.donasis).length === 0) {
                    app.donationLoading.remove();
                    clearInterval(app.fetchingInterval);
                } else {
                    addList(JSON.parse(json.donasis));
                    page++;
                }
            } catch (e) {
                console.error(`[API Error]: ${e.message}`);
                app.donationLoading.remove();
            } finally {
                app.isLoading = false;
            }
        }

        window.addEventListener('load', () => {
            if ('IntersectionObserver' in window) observer.observe(app.donationLoading);
        });
    </script>
@endsection

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'riwayat'])
@endsection
