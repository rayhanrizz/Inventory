@extends('layouts.public')

@section('content')
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-building fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Fakultas</h4>
                    </div>
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-laptop fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Jurusan</h4>
                    </div>
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-lock fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Ruangan</h4>
                    </div>
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-gift fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Barang</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- Barang Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Barang</h2>
                </div>
                <div class="row">
                    @foreach($data as $brg)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <img width="100%" src="{{ url('/image/'.$brg->gambar) }}">
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $brg->nama_barang }}</div>
                                <div class="portfolio-caption-subheading text-muted">{{ $brg->ruangan->nama_ruangan }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection()