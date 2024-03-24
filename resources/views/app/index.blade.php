@extends('layouts.templates.app_template')

@section('content-home')
    <!-- Campanhas -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Campanhas recentes</h2>
                        </div>
                        <div class="title-link">
                            <a href="property-grid.html">Todas as campanhas
                                <span class="bi bi-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="property-carousel" class="swiper">
                <div class="swiper-wrapper">
                    @foreach($rifas as $rifa)
                        <div class="carousel-item-b swiper-slide">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="{{'storage/'.$rifa->imagem}}" style="height: 350px;" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="property-single.html">{{strtoupper($rifa->titulo)}}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a mt-2">{{ $rifa->status === 0 ? "Disponível" : "Finalizada" }} | R$ {{$rifa->valor}}</span>
                                            </div>
                                            <a href="#" class="btn btn-b-n my-3">PARTICIPAR</a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around text-center">
                                                <li>
                                                    <h4 class="card-info-title">Total Núm</h4>
                                                    <span>{{$rifa->limite_numeros}}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Núm Restantes</h4>
                                                    <span>21</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Sorteio</h4>
                                                    <span>{{\Carbon\Carbon::parse($rifa->data_previsao_sorteio)->format('d/m/Y')}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="propery-carousel-pagination carousel-pagination"></div>

        </div>
    </section>
@endsection
