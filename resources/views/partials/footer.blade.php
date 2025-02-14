<!-- start of footer-section -->

<style>
    .whatsapp-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #25D366; /* Warna hijau khas WhatsApp */
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        padding: 14px 25px;
        border-radius: 12px; /* Membuat sudut rounded */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Efek shadow */
        transition: background 0.3s ease-in-out, transform 0.2s ease;
        width: 250px; /* Atur lebar agar konsisten */
        text-align: center;
    }

    .whatsapp-button:hover {
        background-color: #1ebc57; /* Warna hijau yang lebih gelap saat hover */
        transform: scale(1.05); /* Efek zoom saat hover */
    }

    .whatsapp-icon {
        width: 25px; /* Sesuaikan ukuran ikon */
        height: auto;
        margin-right: 10px;
    }
</style>
<footer class="footer-section">
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <img src="{{ asset('images/logo.png')}}" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>SBU Digital Office</h3>
                        </div>
                        <div class="contact-ft">
                            <ul>
                                <li><i class="icon-Group-7044"></i>Jl. Palatehan No. 4, Blok K-V, Kebayoran Baru, Jakarta</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget contact-widget">
                        <div class="widget-title">
                            <h3>Email</h3>
                        </div>
                        <div class="contact-ft">
                            <ul>
                                <li><i class="icon-Group-7043"></i><a href="mailto:cs.digital@peruri.co.id" style="color: #034ea1">cs.digital@peruri.co.id</a></li>
                                <li><i class="icon-Group-7043"></i><a href="mailto:digitalchannel@peruri.co.id" style="color: #034ea1">digitalchannel@peruri.co.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="widget subscribe">
                        <a href="https:wa.link/ts5kog" target="_blank" class="whatsapp-button">Whatsapp Chat</a>
                    </div>
                </div>                
            </div>
        </div> <!-- end container -->
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6 col-12">
                    <div class="copy-right">
                        <p class="copyright">Copyright &copy; <a href=https://www.peruri.co.id/business-pillar/digital-security/graph-analytics" target="_blank">Perum Peruri</a> All rights reserved | Privacy Policy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end of site-footer-section -->