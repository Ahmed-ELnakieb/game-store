@if(isset($dark_contact_channels))
<section class="contact-channels-section py-5">
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="500">
            <h2 class="channels-title">
                {{ @$dark_contact_channels['single']['title'] ?? 'Get In Touch With Us' }}
            </h2>
            <p class="channels-description mt-3">
                {{ @$dark_contact_channels['single']['description'] ?? 'Connect with us through any of our official channels. We\'re here to help you 24/7!' }}
            </p>
        </div>

        <!-- Full Width Image -->
        <div class="contact-image-box mb-5" data-aos="zoom-in" data-aos-duration="600">
            <img src="{{ asset('assets/upload/contact/contact-blog.jpeg') }}" alt="Contact Us" class="img-fluid w-100">
        </div>

        <!-- Communication Buttons Row -->
        <div class="communication-buttons" data-aos="fade-up" data-aos-duration="700">
            <div class="row g-3 g-lg-4">
                <!-- Telegram Private -->
                <div class="col-lg-3 col-md-6">
                    <a href="https://t.me/radeownND" target="_blank" class="channel-btn telegram-btn">
                        <i class="fab fa-telegram"></i>
                        <div class="btn-content">
                            <span class="btn-label">Telegram Direct</span>
                            <span class="btn-sublabel">Personal Support</span>
                        </div>
                    </a>
                </div>
                
                <!-- Telegram Group -->
                <div class="col-lg-3 col-md-6">
                    <a href="https://t.me/HOKQQCHETO2" target="_blank" class="channel-btn telegram-btn">
                        <i class="fab fa-telegram"></i>
                        <div class="btn-content">
                            <span class="btn-label">Telegram Group</span>
                            <span class="btn-sublabel">Community Chat</span>
                        </div>
                    </a>
                </div>
                
                <!-- YouTube Channel 1 -->
                <div class="col-lg-3 col-md-6">
                    <a href="https://youtube.com/@honorofkings-de6wi?si=ib2D-3wqZui5fmql" target="_blank" class="channel-btn youtube-btn">
                        <i class="fab fa-youtube"></i>
                        <div class="btn-content">
                            <span class="btn-label">YouTube Channel</span>
                            <span class="btn-sublabel">Tutorials & Guides</span>
                        </div>
                    </a>
                </div>
                
                <!-- YouTube Channel 2 -->
                <div class="col-lg-3 col-md-6">
                    <a href="https://youtu.be/06kU28upGgQ?si=XNlnJj4ruRzoi4iv" target="_blank" class="channel-btn youtube-btn">
                        <i class="fab fa-youtube"></i>
                        <div class="btn-content">
                            <span class="btn-label">YouTube Videos</span>
                            <span class="btn-sublabel">Latest Updates</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.contact-channels-section {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    position: relative;
    overflow: hidden;
}

.contact-channels-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(111,79,242,0.08) 0%, transparent 70%);
    pointer-events: none;
    animation: pulse 15s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.8; }
}

.channels-title {
    font-size: 2.8rem;
    font-weight: 700;
    color: #fff;
    line-height: 1.2;
    position: relative;
    display: inline-block;
}

.channels-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #6f4ff2 0%, #4834df 100%);
    border-radius: 2px;
}

.channels-description {
    font-size: 1.15rem;
    color: #b8b8b8;
    line-height: 1.6;
    max-width: 700px;
    margin: 0 auto;
}

.contact-image-box {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
    max-height: 500px;
}

.contact-image-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.3) 100%);
    z-index: 1;
    pointer-events: none;
}

.contact-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.contact-image-box:hover img {
    transform: scale(1.05);
}

.communication-buttons {
    position: relative;
    z-index: 2;
}

.channel-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 30px 20px;
    background: rgba(255, 255, 255, 0.03);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    color: #fff;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
    height: 100%;
    min-height: 160px;
}

.channel-btn:hover {
    transform: translateY(-8px);
    border-color: currentColor;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    background: rgba(255, 255, 255, 0.08);
}

.channel-btn i {
    font-size: 3.5rem;
    transition: transform 0.3s ease;
}

.channel-btn:hover i {
    transform: scale(1.1);
}

.telegram-btn {
    border-color: rgba(0, 136, 204, 0.3);
}

.telegram-btn:hover {
    background: rgba(0, 136, 204, 0.15);
    border-color: #0088cc;
    color: #0088cc;
    box-shadow: 0 15px 40px rgba(0, 136, 204, 0.3);
}

.youtube-btn {
    border-color: rgba(255, 0, 0, 0.3);
}

.youtube-btn:hover {
    background: rgba(255, 0, 0, 0.15);
    border-color: #ff0000;
    color: #ff0000;
    box-shadow: 0 15px 40px rgba(255, 0, 0, 0.3);
}

.btn-content {
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: center;
}

.btn-label {
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.3;
}

.btn-sublabel {
    font-size: 0.9rem;
    opacity: 0.7;
    font-weight: 400;
}

@media (max-width: 991px) {
    .channels-title {
        font-size: 2.2rem;
    }
    
    .contact-image-box {
        max-height: 350px;
    }
    
    .channel-btn {
        min-height: 140px;
        padding: 25px 15px;
    }
    
    .channel-btn i {
        font-size: 3rem;
    }
}

@media (max-width: 767px) {
    .channels-title {
        font-size: 1.8rem;
    }
    
    .channels-description {
        font-size: 1rem;
    }
    
    .contact-image-box {
        max-height: 250px;
    }
    
    .channel-btn {
        min-height: 120px;
        padding: 20px 15px;
    }
    
    .channel-btn i {
        font-size: 2.5rem;
    }
    
    .btn-label {
        font-size: 1rem;
    }
    
    .btn-sublabel {
        font-size: 0.85rem;
    }
}
</style>
@endif
