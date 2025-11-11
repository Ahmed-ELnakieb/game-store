@if(isset($dark_testimonial))
    @php
        $featuredHacks = \App\Models\Card::with(['services.pricings'])
            ->where('status', 1)
            ->where('trending', 1)
            ->orderBy('avg_rating', 'desc')
            ->take(6)
            ->get();
    @endphp
    <section class="testimonial-section">
        <div class="container">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 order-2 order-lg-1" data-aos="fade-up" data-aos-duration="500">
                        <div class="left-side mb-20 mb-lg-0">
                            <div class="text-center text-lg-start">
                                <p class="section-sub-title mb-2">Top-rated hacks trusted by gamers worldwide</p>
                                <h2 class="section-title mb-0">{{ @$dark_testimonial['single']['title'] ?? 'Featured Game Hacks' }}</h2>
                                <a href="{{ @$dark_testimonial['single']['button_link'] ?? '/cards' }}" class="kew-btn mt-30">
                                    <span class="kew-text">{{ @$dark_testimonial['single']['button'] ?? 'View All Hacks' }}</span>
                                    <div class="kew-arrow">
                                        <div class="kt-one"><i class="fa-regular fa-arrow-right-long"></i></div>
                                        <div class="kt-two"><i class="fa-regular fa-arrow-right-long"></i></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-1 order-lg-2" data-aos="fade-up" data-aos-duration="700">
                        <div class="right-side">
                            <div class="owl-carousel owl-theme testimonial-carousel">
                                @foreach($featuredHacks as $hack)
                                    <div class="item">
                                        <div class="testimonial-box">
                                            <div class="img-box">
                                                <img src="{{ $hack->preview_image }}" alt="{{ $hack->name }}" />
                                            </div>
                                            <div class="text-box">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge bg-primary">{{ $hack->category->name ?? 'Game Hack' }}</span>
                                                    <div class="quote-icon"><i class="fa-solid fa-gamepad"></i></div>
                                                </div>
                                                <ul class="reviews mt-2">
                                                    {!! displayStarRatingSection($hack->avg_rating ?? 5) !!}
                                                    <span class="ms-2">({{ $hack->total_review }} reviews)</span>
                                                </ul>
                                                <h5 class="mt-20 mb-10">{{ $hack->name }}</h5>
                                                <p class="mb-20">{{ Str::limit(strip_tags($hack->description), 100) }}</p>
                                                <div class="profile-box">
                                                    <div class="profile-title">
                                                        <h5 class="mb-0">Starting from {{ userCurrencyPosition($hack->serviceWithLowestPrice()->price ?? 0) }}</h5>
                                                        <a href="{{ $hack->card_detail_route }}" class="btn btn-sm btn-primary mt-2">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
