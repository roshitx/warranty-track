@extends('layouts.main')
@section('content')
    <main>
        <!-- slider-area start -->
        <section id="home" class="slider-area slider-height position-relative" data-background="img/slider/slide1.png">
            <div class="shpae-wrapper d-none d-md-block">
                <img class="shape shape-01 rotateme" src="img/shape/slide-shape-01.png" alt="">
                <img class="shape shape-one shape-02 heartbeat" src="img/shape/slide-shape-02.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-text slider-content-space">
                            <h2 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">Sistem Garansi</h2>
                            <p>Kenali status garansi dengan mudah, SIGAR - Aplikasi untuk melacak masa berlaku garansi
                                dengan cepat dan akurat.</p>
                            <div class="slider-btn">
                                <a class="btn" href="#features">Mulai</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5  d-none d-xl-block">
                        <div class="slider-img position-relative">
                            <img src="{{ asset('img/shield_ilustrations.svg') }}" width="500"
                                class="position-absolute bottom-5 m-0" alt="shield-ilustrations">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="features" class="features-area pt-140 pb-265">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                        <div class="section-title text-center mb-70">
                            <h2>Mulai lacak garansi produk anda</h2>
                            <p>Masukan kode produk anda di search-bar di bawah ini</p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 d-flex align-items-center position-relative">
                        <input type="search" id="query" class="form-control" placeholder="Masukan kode product"
                            aria-label="Search" />
                        <div class="search-icon"><i class="bi bi-search"></i></div>
                    </div>

                    <div class="col-8 mt-3">
                        <div class="card">
                            <div class="card-body" id="table">
                                <div class="table-responsive">
                                    <table id="product-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Masa Garansi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="text-center m-0">Tidak ada hasil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area -->
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#query').on('input', function() {
                let query = $('#query').val();

                if (query === '') {
                    hideTable();
                } else {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('product.search') }}",
                        data: {
                            query: query
                        },
                        dataType: "json",
                        success: function(response) {
                            displayProducts(response.data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });

            function displayProducts(products) {
                let $productTable = $('#product-table');
                let $notFoundMessage = $productTable.next('.text-center');

                $productTable.find('tbody').empty();

                if (products.length > 0) {
                    $.each(products, function(index, product) {
                        let badgeColor = (product.status === 'Active' ? 'success' : 'danger')
                        let description = (product.description !== null && product.description !== '') ?
                            product.description : '-';
                        let row = `<tr>
                                    <td>${product.nama_barang}</td>
                                    <td>${product.kd_barang}</td>
                                    <td>${description}</td>
                                    <td>${product.masa_garansi}</td>
                                    <td><span class="badge text-bg-${badgeColor}">${product.status}</span></td>
                               </tr>`;
                        $productTable.find('tbody').append(row);
                    });

                    $notFoundMessage.hide();
                    $productTable.show();
                } else {
                    $productTable.hide();
                    $notFoundMessage.show();
                }
            }

            function hideTable() {
                let $productTable = $('#product-table');
                let $notFoundMessage = $productTable.next('.text-center');

                $productTable.hide();
                $notFoundMessage.hide();
            }
        });
    </script>
@endsection
