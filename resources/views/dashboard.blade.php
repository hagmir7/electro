@extends('layout.dash')



@section('content')
<style>
    .product {
        color: #4154f1;
        background: #f6f6fe;
        padding: 13px 16px 4px 15px;
    }

    .user {
        color: #ff771d;
        background: #ffecdf;
        padding: 13px 16px 4px 15px;
    }

    .order {
        color: #2eca6a;
        background: #e0f8e9;
        padding: 13px 16px 4px 15px;
    }

    .message {
        color: #0dcaf0;
        background: #0dcaf02e;
        padding: 13px 16px 4px 15px;
    }
</style>

<div class="row gap-2 justify-content-center">

    <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6 mt-2">
            <div class="card info-card sales-card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>

                    <div class="d-flex align-items-center">
                        <div class="product card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-archive h2"></i>
                        </div>
                        <div class="ps-3">
                            <h6 class="h4">{{ $products->count() }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->



        <div class="col-xxl-4 col-md-6 mt-2">
            <div class="card info-card sales-card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon order rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart h2"></i>
                        </div>
                        <div class="ps-3">
                            <h6 class="h4">{{ $orders->count() }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <div class="col-xxl-4 col-md-6 mt-2">
            <div class="card info-card sales-card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Messages</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon message rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-chat h2"></i>
                        </div>
                        <div class="ps-3">
                            <h6 class="h4">{{ $contacts->count() }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <div class="col-xxl-4 col-md-6 mt-2">
            <div class="card info-card sales-card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon user rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person h2"></i>
                        </div>
                        <div class="ps-3">
                            <h6 class="h4">{{ $users }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->



        <div class="col-12 mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rapport <small> / Sept derniers jours</small></h5>

                    <!-- Line Chart -->
                    <div id="reportsChart">
                        <div class="d-flex justify-content-center py-5" id="chart-spinner">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", async () => {
                           const product = await fetch("{{ route('product.chart') }}")
                                .then(res => res.json())
                                .then(respons => {
                                document.querySelector('#chart-spinner').remove()
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Produits',
                                    data: respons.products.map(item=> item[1]),
                                }, {
                                    name: 'Commandes',
                                    data: respons.orders.map(item=> item[1])
                                }, {
                                    name: 'Utilisateurs',
                                    data:  respons.users.map(item=> item[1])
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    type: 'datetime',
                                    categories: respons.products.map(item=> item[0])
                                },
                                tooltip: {
                                    x: {
                                        format: 'dd/MM/yy'
                                    },
                                }
                            }).render();
                            })


                        });
                    </script>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div><!-- End Reports -->

        <div class="col-12 mt-3">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title"> Commandes <small>| Nouvelles ({{ $new_orders->count() }})</small></h5>

                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-container">
                            <table class="table table-borderless datatable datatable-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Produits</th>
                                        <th>Prix total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($new_orders as $order)
                                    <tr>
                                        <td><a href="{{ route('order.show', $order->id ) }}">#{{ $order->id }}</a></td>
                                        <td>
                                            <a href="{{ route('user.update', $order->user->id ) }}">{{
                                                $order->user->first_name}} {{ $order->user->first_name}}</a>
                                        </td>
                                        <td>{{ $order->details->count() }}</td>
                                        <td>{{ $order->getTotal() }} MAD</td>
                                        <td>

                                            <a href="{{ route('order.valid', $order->id ) }}"
                                                class="btn btn-sm btn-info text-white"><i
                                                    class="bi bi-check-circle"></i></a>
                                            <a href="{{ route('order.show', $order->id ) }}"
                                                class="btn btn-sm btn-success"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('order.delete', $order->id ) }}"
                                                onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')"
                                                class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($new_orders->count() == 0)
                        <div class="d-flex justify-content-center">
                            <div class="h5 py-5">Aucun Produit</div>
                        </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div><!-- End Revenue Card -->
</div>

</div>

@endsection