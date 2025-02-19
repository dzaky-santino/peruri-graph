<footer class="footer">
    <div class="footer-container">
        <img class="footer-logo" src="{{ asset('images/logo-peruri.png') }}" alt="Logo Peruri">
        <p class="footer-text">Copyright © <a href="https://www.peruri.co.id/business-pillar/digital-security/graph-analytics" target="_blank">Perum Peruri</a>. All rights reserved | <a href="#">Privacy Policy</a></p>
    </div>
</footer>

<style>
    /* Root colors */
    :root {
        --blue-primary: #88c1fd; /* Background color for footer */
        --gray-5: #e0e0e0; /* Text color */
        --dark-blue: #1e3d73; /* Text color for the footer */
    }

    /* Footer Styles */
    footer {
        background-color: var(--blue-primary);
        /* padding: 10px 0 0 0; */
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
        color: var(--dark-blue);
        font-size: 14px;
        font-weight: 500;
    }

    .footer-text a {
        color: var(--dark-blue);
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