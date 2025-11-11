<section class="special-offer-section py-5">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="500">
                <div class="offer-image-box">
                    <img src="{{ asset('assets/upload/best-hack/main.jpg') }}" alt="Best Hack Features" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="500">
                <div class="offer-content">
                    <h2 class="offer-title mb-3">
                        SPECIAL OFFER 35% OFF
                    </h2>
                    <p class="offer-description mb-4">
                        The best deal in our hacks! Get premium gaming tools for Honor of Kings, Mobile Legends, Wild Rift, and PUBG at an unbeatable price.
                    </p>
                    <div class="offer-divider mb-4"></div>
                    <p class="offer-details mb-4">
                        Our special offer includes access to all premium features, regular updates, and 24/7 customer support. Limited time only!
                    </p>
                    <a href="/cards" class="cmn-btn">
                        SHOP SALE
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.special-offer-section {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    position: relative;
    overflow: hidden;
}

.special-offer-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255,165,0,0.1) 0%, transparent 70%);
    pointer-events: none;
}

.offer-image-box {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(255,165,0,0.2);
}

.offer-image-box img {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.offer-image-box:hover img {
    transform: scale(1.05);
}

.offer-content {
    padding: 20px;
}

.offer-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
    line-height: 1.2;
}

.offer-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #ffa500 0%, #ff6b00 100%);
    margin-top: 15px;
}

.offer-description {
    font-size: 1.1rem;
    color: #b8b8b8;
    line-height: 1.6;
}

.offer-divider {
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, #00ff88 0%, #00cc6a 100%);
}

.offer-details {
    font-size: 1rem;
    color: #d0d0d0;
    line-height: 1.6;
}

@media (max-width: 991px) {
    .offer-title {
        font-size: 2rem;
    }
    
    .offer-content {
        text-align: center;
    }
    
    .offer-title::after,
    .offer-divider {
        margin-left: auto;
        margin-right: auto;
    }
}
</style>
