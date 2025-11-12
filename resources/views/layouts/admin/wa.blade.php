<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float">
    <i class="fa-brands fa-whatsapp"></i>
</a>

<style>
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 25px;
        right: 25px;
        background-color: #25D366;
        color: #fff;
        border-radius: 50%;
        text-align: center;
        font-size: 28px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .whatsapp-float:hover {
        background-color: #1ebe5d;
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(37, 211, 102, 0.7);
    }

    @media (max-width: 768px) {
        .whatsapp-float {
            width: 50px;
            height: 50px;
            font-size: 22px;
            bottom: 20px;
            right: 20px;
        }
    }
</style>
