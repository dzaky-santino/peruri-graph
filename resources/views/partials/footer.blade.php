<footer class="footer">
    <div class="footer-container">
        <img class="footer-logo" src="{{ asset('images/logo-peruri-white.webp') }}" alt="Logo Peruri">
        <p class="footer-text">Copyright © <a href="https://www.peruri.co.id/business-pillar/digital-security/graph-analytics" target="_blank">Perum Peruri</a>. All rights reserved | <a href="#">Privacy Policy</a></p>
    </div>
</footer>

<style>
    footer {
        background-color: #3639DF;
        width: 100%;
        text-align: center;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px 0 0 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .footer-logo {
        width: 100px;
        height: auto;
    }

    .footer-text {
        color: white;
        font-size: 14px;
        font-weight: 500;
    }

    .footer-text a {
        color: white;
        text-decoration: none;
    }

    .footer-text a:hover {
        text-decoration: underline;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .footer-logo {
            width: 100px; /* Adjust logo size for smaller screens */
        }

        .footer-text {
            font-size: 12px; /* Adjust font size for smaller screens */
        }
    }

</style>