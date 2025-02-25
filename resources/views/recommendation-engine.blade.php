@extends('layouts.app')

@section('title', 'Recommendation Engine - Peruri Graph Analytics')

@section('content')

<style>
    /* Bagian utama */
    .section-container {
        padding: 50px 20px;
    }

    .section-title {
        font-size: 28px;
        font-weight: bold;
        color: #034ea1;
        text-align: center;
    }

    .underline {
        width: 50px;
        height: 3px;
        background-color: #034ea1;
        margin: 10px auto 30px auto;
    }

    /* Container kartu */
    .card-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Kartu */
    .card {
        background-color: #034ea1;
        color: white;
        width: 250px;
        height: 200px;
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Memastikan gambar di tengah horizontal */
        text-align: center;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .card img {
        width: 50px;
        margin-bottom: 10px;
    }

    .card p {
        flex-grow: 1; /* Memungkinkan teks memenuhi ruang yang tersedia */
        display: flex;
        align-items: center; /* Memusatkan teks secara vertikal */
        justify-content: center; /* Memusatkan teks secara horizontal */
        font-size: 14px;
        color: whitesmoke;
    }

    /* Efek hover */
    .card:hover {
        transform: translateY(-5px);
    }

    /* Container utama */
    .use-case-container {
        padding: 0 0 0 20px;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #034ea1;
        border-radius: 20px;
    }

    .use-case-container .description  {
        font-size: 16px;
        word-spacing: 5px;
        line-height: 33px;
    }

    .use-case-container .content-wrapper .title {
        font-size: 30px;
        font-weight: 900;
        color: white;
    }

    /* Wrapper untuk konten */
    .content-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    /* Bagian teks */
    .text-section {
        max-width: 50%;
    }

    /* Deskripsi */
    .description {
        font-size: 15px;
        line-height: 1.5;
        color: white;
        text-align: justify;
    }

    /* Bagian gambar */
    .image-section {
        max-width: 400px;
        display: flex;
        justify-content: center;
    }

    .image {
        width: 100%;
        height: auto;
        border-radius: 20px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
    }

    /* Menu Navigasi */
    .tab-menu {
        position: sticky;
        top: 0;  /* Posisi tetap di atas saat di-scroll */
        display: flex;
        justify-content: center;
        background-color: #88c1fd;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        z-index: 100; /* Menjaga tab-menu tetap di atas */
    }

    .tab-button {
        background: none;
        border: none;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .tab-button.active {
        background: #034ea1;
        border-radius: 5px;
    }

    /* Konten Tab */
    .tab-content-container {
        max-width: 100%;
        margin: 30px auto;
        padding: 20px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    /* Setiap tab memiliki konten berbeda */
    .tab-content {
        display: none;
        text-align: left;
        padding: 20px;
    }

    .tab-content p {
        text-align: justify;
        font-size: 15px;
    }

    .tab-content span {
        color: #034ea1;
        font-weight: bold;
    }

    /* Aktifkan hanya tab yang dipilih */
    .tab-content.active {
        display: block;
    }

    /* Gambar dalam konten */
    .content-image {
        width: 80%;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 10px;
    }

    /* List utama */
    .property-list {
        list-style-type: none;
        padding-left: 0;
    }

    /* List utama dengan bullet point biru */
    .property-list > li {
        font-size: 20px;
        font-weight: bold;
        color: #034ea1;
    }

    /* Paragraf di dalam list utama */
    .property-list p {
        font-size: 15px;
        font-weight: normal;
        color: #333;
        margin-left: 20px;
    }

    /* Nested list menjorok ke dalam */
    .nested-list {
        list-style-type: none;
        padding-left: 30px;
    }

    /* Bullet point biru untuk nested list */
    .nested-list li {
        position: relative;
        padding-left: 20px;
        margin-bottom: 8px;
    }

    /* Tambahkan titik biru di setiap nested list */
    .nested-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: #034ea1;
        font-size: 16px;
        font-weight: bold;
    }

    /* Nama properti dengan warna biru */
    .property-name {
        font-weight: bold;
        color: #88c1fd;
    }

    /* Mengubah warna teks "Customer" dalam list utama */
    .property-list > li > .property-name {
        color: #88c1fd;
    }

    /* Judul utama */
    .query-title {
        font-size: 20px;
        font-weight: bold;
        color: #034ea1;
    }

    .code-box {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        margin: 1rem 0;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .code-header {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e5e7eb;
        background: #f9fafb;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .code-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
    }

    .code-container {
        position: relative;
        padding: 1rem;
        padding-right: 80px;
    }

    .code-content {
        font-family: 'Consolas', 'Monaco', monospace;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #1f2937;
        max-height: 200px; /* Tinggi maksimal sebelum scroll */
        overflow-y: auto;
        padding-right: 3rem; /* Ruang untuk tombol copy */
    }

    .code-line {
        margin: 0;
        padding: 0.125rem 0;
        white-space: nowrap;
        min-width: max-content;
    }

    .copy-button {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        padding: 0.5rem;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 0.75rem;
        font-weight: 500;
        color: #374151;
        transition: all 0.2s ease;
    }

    .copy-button:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }

    .copy-icon, .success-icon {
        width: 14px;
        height: 14px;
        margin-right: 0.375rem;
        fill: currentColor;
    }

    .copy-success {
        display: none;
        color: #2563eb;
    }

    .copy-button.copied .copy-default {
        display: none;
    }

    .copy-button.copied .copy-success {
        display: flex;
        align-items: center;
    }

    /* Styling scrollbar */
    .code-content::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .code-content::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .code-content::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 4px;
    }

    .code-content::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    .content-video {
        width: 100%;   /* Membuat video responsif */
        max-width: 1000px; /* Menetapkan ukuran maksimum untuk video */
        height: auto;  /* Membuat tinggi otomatis berdasarkan lebar */
        border-radius: 10px; /* Sudut melengkung */
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5); /* Memberikan bayangan pada video */
    }

    /* ======== MEDIA QUERIES UNTUK RESPONSIVITAS ======== */

    /* Tablet (768px - 1023px) */
    @media screen and (max-width: 1023px) {
        .section-title {
            font-size: 24px;
        }
        
        .card {
            width: 220px;
            height: 180px;
        }
        
        .use-case-container {
            padding: 0 0 0 15px;
        }
        
        .use-case-container .content-wrapper .title {
            font-size: 26px;
        }
        
        .text-section {
            max-width: 100%;
        }
        
        .image-section {
            max-width: 350px;
            margin: 0 auto;
        }
        
        .tab-button {
            padding: 10px 15px;
            font-size: 14px;
        }
        
        .content-wrapper {
            flex-direction: column;
        }
    }

    /* Mobile Landscape (576px - 767px) */
    @media screen and (max-width: 767px) {
        .section-container {
            padding: 30px 15px;
        }
        
        .section-title {
            font-size: 22px;
        }
        
        .card {
            width: 100%;
            max-width: 300px;
            height: auto;
            min-height: 160px;
        }
        
        .use-case-container {
            padding: 10px;
        }
        
        .use-case-container .description {
            font-size: 14px;
            word-spacing: 3px;
            line-height: 28px;
        }
        
        .use-case-container .content-wrapper .title {
            font-size: 22px;
            text-align: center;
        }
        
        .tab-menu {
            flex-wrap: wrap;
            padding: 10px;
        }
        
        .tab-button {
            padding: 8px 12px;
            font-size: 12px;
            margin: 2px;
        }
        
        .property-list > li {
            font-size: 18px;
        }
        
        .code-container {
            padding-right: 20px;
        }
        
        .copy-button {
            top: 0.25rem;
            right: 0.25rem;
            padding: 0.25rem;
        }
    }

    /* Mobile Portrait (< 576px) */
    @media screen and (max-width: 575px) {
        .section-container {
            padding: 20px 10px;
        }
        
        .section-title {
            font-size: 20px;
        }
        
        .underline {
            width: 40px;
            margin: 8px auto 20px auto;
        }
        
        .card-container {
            gap: 15px;
        }
        
        .card {
            padding: 15px;
        }
        
        .card p {
            font-size: 13px;
        }
        
        .use-case-container .description {
            font-size: 13px;
            word-spacing: 2px;
            line-height: 24px;
        }
        
        .use-case-container .content-wrapper .title {
            font-size: 20px;
        }
        
        .description {
            font-size: 13px;
        }
        
        .tab-content {
            padding: 15px 10px;
        }
        
        .tab-content p {
            font-size: 13px;
        }
        
        .property-list > li {
            font-size: 16px;
        }
        
        .property-list p {
            font-size: 13px;
            margin-left: 15px;
        }
        
        .nested-list {
            padding-left: 20px;
        }
        
        .nested-list li {
            padding-left: 15px;
            margin-bottom: 6px;
        }
        
        .code-content {
            font-size: 0.75rem;
        }
        
        .content-image {
            width: 100%;
        }
    }

    /* Untuk layar kecil sekali */
    @media screen and (max-width: 375px) {
        .card {
            width: 100%;
        }
        
        .tab-button {
            padding: 6px 8px;
            font-size: 11px;
        }
        
        .code-container {
            padding: 0.5rem;
        }
        
        .code-content {
            padding-right: 0;
            max-height: 150px;
        }
    }
</style>

<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>Use Case</h2>
                    <ol>
                        <li><a href="{{ url('/')}}"><i class="icon-36"></i> Home</a></li>
                        <li>Recommendation Engine</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start blog-single-page-area -->
<section class="blog-single-page-area full-width ptb-120">
    <div class="container-blog">
        <div class="row justify-content-center">
            <div class="col col-lg-10 col-md-12 col-12">
                <div class="blog-single-wrap">
                    <div class="blog-single-text">
                        <div class="blog-img">
                            <section class="use-case-container">
                                <div class="content-wrapper">
                                    <div class="text-section">
                                        <h2 class="title">Uses Cases: Recommendation Engine</h2>
                                        <p class="description">
                                            Fraud is a financial drain, a risk for businesses and consumers alike. With fraud attempts skyrocketing, how can you identify fraud in time to stop it? 
                                            Graph-based approaches to detecting fraud analyze complex linkages between people, transactions, and institutions. 
                                            Peruri Graph Analytics effectively reveals patterns of fraud and surfaces anomalies.
                                        </p>
                                    </div>
                                    <div class="image-section">
                                        <img src="{{ asset('images/image8.png')}}" class="image">
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <section class="section-container">
                        <h2 class="section-title">What will You Do</h2>
                        <div class="underline"></div>
                
                        <div class="card-container">
                            <div class="card">
                                <img src="{{ asset('images/search.png')}}">
                                <p>Discover how a top fintech company reduces manual investigation and finds more fraud</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/brain.png')}}">
                                <p>Learn three flexible techniques for detecting shifting fraud patterns</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/graph.png')}}">
                                <p>Find out which graph algorithms to run – and why</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/chart.png')}}">
                                <p>See a sample graph data model</p>
                            </div>
                        </div>
                    </section>

                    <!-- Menu Navigasi -->
                    <div class="tab-menu">
                        <button class="tab-button active" onclick="openTab(event, 'introduction')">Introduction</button>
                        <button class="tab-button" onclick="openTab(event, 'data-preparation')">Data Preparation</button>
                        <button class="tab-button" onclick="openTab(event, 'recommendation')">Recommendation and Result</button>
                    </div>

                    <!-- Konten Tab -->
                    <div class="tab-content-container">

                        <!-- Introduction -->
                        <div id="introduction" class="tab-content active">
                            <h2>Dataset</h2>
                            <p>
                                The Northwind dataset is a sample dataset that presents comprehensive information about product sales business operations, 
                                with the main entities involving Customer, Order, Product, and Product Category. Specifically designed to provide application 
                                and query examples in a relational and graph database environment, Northwind not only provides a comprehensive overview of the 
                                relationships between its entities, but also offers potential for a variety of uses, including the development of recommendation engines. 
                                By mining <span>Customer, Order, Product, and Product Category</span> data, this dataset can assist in creating an intelligent recommendation system, 
                                enabling the use of purchase patterns and preferences to provide relevant product recommendations.
                            </p>
                            <center><img src="{{ asset('images/db-schema.png')}}" class="content-image"></center>
                            <p>
                                In the context of a graph database, the Northwind dataset can be represented as a graph where entities are nodes and relationships between entities are edges. 
                                Each node in the graph represents a different type of entity, and the relationships between edges represent the associations between those entities.
                            </p>
                            <h2>Nodes</h2>
                            <p>
                                There are four main entities that form the basic framework of business operations and product transactions. The four entities, 
                                namely Customer, Product, Order, and Category, create a rich structure of information about customers, products, orders, and product categories.
                            </p>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Customer</span></li>
                                    <p>
                                        <span>Customer</span> is an entity that represents individuals or companies that make purchases or transactions in the system.
                                        Each Customer node has properties such as customerID, companyName, contactName, and other contact information.
                                    </p>
                                    <ul class="nested-list">
                                        <li><span class="property-name">customerID:</span> A unique identification for each customer in the dataset. It is a string used to distinguish one customer from another.</li>
                                        <li><span class="property-name">companyName:</span> The name of the company or business entity of the customer. This property provides information about the legal entity that made the transaction or purchase.</li>
                                        <li><span class="property-name">contactName:</span> The name of the contact associated with the customer. This is the name of the person who is responsible for or has a relationship with the business transaction.</li>
                                        <li><span class="property-name">contactTitle:</span> The title or position held by the customer contact. It provides additional context about the contact's role or responsibilities within the company.</li>
                                        <li><span class="property-name">address:</span> The physical address or office of the customer.</li>
                                        <li><span class="property-name">city:</span> The name of the city where the customer is located.</li>
                                        <li><span class="property-name">country:</span> The country where the customer is located.</li>
                                        <li><span class="property-name">region:</span> A specific region or part of the country where the customer is located.</li>
                                        <li><span class="property-name">postalCode:</span> The zip code or postal code associated with the customer's address.</li>
                                        <li><span class="property-name">phone:</span> The phone number that can be used to contact the customer.</li>
                                        <li><span class="property-name">fax:</span> The fax number associated with the customer.</li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Product</span></li>
                                    <p>
                                        <span>Order </span> is an entity that represents an order or transaction made by a Customer. 
                                        Each Order node has properties such as orderID, orderDate, customerID, and other order information.
                                    </p>
                                    <ul class="nested-list">
                                        <li><span class="property-name">orderID:</span> Unique identification for each order.</li>
                                        <li><span class="property-name">customerID:</span> The unique identification of the customer who placed the order. It is a foreign key that can be used to link the Order node with the Customer node.</li>
                                        <li><span class="property-name">freight:</span> The shipping cost or freight cost of the order.</li>
                                        <li><span class="property-name">orderDate:</span> The date when the order was placed.</li>
                                        <li><span class="property-name">requiredDate:</span> The date on which the order is expected to arrive or be fulfilled.</li>
                                        <li><span class="property-name">shipAddress:</span> The shipping address of the order.</li>
                                        <li><span class="property-name">shipCity:</span> The destination city of the order.</li>
                                        <li><span class="property-name">shipCountry:</span> The country to which the order is destined.</li>
                                        <li><span class="property-name">shipName:</span> The name of the order recipient.</li>
                                        <li><span class="property-name">shipPostalCode:</span> The postal code of the order destination.</li>
                                        <li><span class="property-name">shipRegion:</span> The region or specific part of the country the order is destined for.</li>
                                        <li><span class="property-name">shipVia:</span> The shipping method or third party responsible for shipping the order.</li>
                                        <li><span class="property-name">shippedDate:</span> The date when the order was actually shipped.</li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Category</span></li>
                                    <p>
                                        <span>Category </span> is an entity that represents a particular category or type of product. 
                                        Each Category node has properties such as categoryID, categoryName, and other category information.
                                    </p>
                                    <ul class="nested-list">
                                        <li><span class="property-name">categoryID:</span> Unique identification for each product category in the dataset.</li>
                                        <li><span class="property-name">categoryName:</span> The name of the category that provides information about the types of products included in the category.</li>
                                        <li><span class="property-name">description:</span> A short description that provides additional information about the type of product or characteristic of the category.</li>
                                        <li><span class="property-name">picture:</span> Contains image data representing the category that has been encrypted in base64 format.</li>
                                    </ul>
                                </li>
                            </ul>  
                            <hr>
                            <h2>Relationships</h2>
                            <p>
                                In a graph database, relationships are very important. Relationships make it possible to traverse the graph so as to find relationships between entities. 
                                In a graph database, relationships between nodes can be represented by edges or relationships of a certain type. 
                                In the context of the Northwind dataset, there are three types of relations: <span>PURCHASED, ORDERS, and PART_OF.</span>
                            </p>
                            <div class="query-container">
                                <h3 class="query-title">• <span>PURCHASED</span></h3>

                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code1" class="code-content">
                                            <div class="code-line">(customer)-[:PURCHASED]->(order)</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code1">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                        
                                <p>
                                    An example of using the <span>PURCHASED</span> relation:
                                </p>
                                <p>
                                    The <span>PURCHASED</span> relation can be used to describe the relationship between a Customer node and an Order node.
                                    For example, if a customer purchases a particular product, you can use the PURCHASED relation to connect the
                                    Customer node with the Order node, indicating that the customer has made a purchase or order.
                                </p>
                            </div>

                            <div class="query-container">
                                <h3 class="query-title">• <span>ORDERS</span></h3>
                            
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code2" class="code-content">
                                            <div class="code-line">(order)-[:ORDERS]->(product)</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code2">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                        
                                <p>
                                    An example of using the <span>ORDERS</span> relation:
                                </p>
                                <p>
                                    The <span>ORDERS</span> relation can be used to describe the relationship between the Order node and the Product node. 
                                    It reflects that within an order, there are certain products ordered or purchased by the customer.
                                </p>
                            </div>

                            <div class="query-container">
                                <h3 class="query-title">• <span>PART_OF</span></h3>
                                
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code3" class="code-content">
                                            <div class="code-line">(product)-[:PART_OF]->(category)</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code3">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                        
                                <p>
                                    An example of using the <span>PART_OF</span> relation:
                                </p>
                                <p>
                                    The <span>PART_OF</span> relation can be used to describe the relationship between a Product node and a Category node. 
                                    If a product belongs to a category, the PART_OF relation can be used to show the relationship between the product and the category.
                                </p>
                            </div>
                            <hr>
                            <h2>Nodes and Relationship in Northwind Graph</h2>
                            <center><img src="{{ asset('images/image10.png')}}" class="content-image"></center>
                            <p>
                                The result of this query will contain all paths that satisfy the defined graph pattern, 
                                which consists of nodes and relations connected through the relations :PURCHASED, 
                                :ORDERS, and :PART_OF. Each path in the result will include all the nodes and relations involved in the pattern.
                            </p>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Customer and Order</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;"><span class="property-name">Customer</span> node represents the customer involved in the transaction.</li>
                                        <li style="font-size: 15px;"><span class="property-name">[:PURCHASED]</span> connects customers with the orders they place.</li>
                                        <li style="font-size: 15px;"><span class="property-name">Order</span> node represents an order placed by a particular customer.</li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Order and Product</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;"><span class="property-name">Order</span> represents orders that have been created.</li>
                                        <li style="font-size: 15px;"><span class="property-name">[:ORDERS]</span> connects orders with the products in the order.</li>
                                        <li style="font-size: 15px;"><span class="property-name">Product</span> represents the products that have been ordered in order.</li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">• Order and Product</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;"><span class="property-name">Customer</span> node represents the customer involved in the transaction.</li>
                                        <li style="font-size: 15px;"><span class="property-name">[:PURCHASED]</span> connects customers with the orders they place.</li>
                                        <li style="font-size: 15px;"><span class="property-name">Order</span> node represents an order placed by a particular customer.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Data Preparation -->
                        <div id="data-preparation" class="tab-content">
                            <h2>Create Nodes</h2>
                            <p>
                                In a graph database, nodes are fundamental components that represent entities or objects in the system. 
                                Each node usually has a unique identification and can be associated with various properties that describe its characteristics. 
                                Nodes are used to model and store relevant entity data. To create nodes, we can use Cypher queries. 
                                Here is an example of how to create a node to represent a customer and order in the Northwind database:
                            </p>

                            <h4>Create New Customer Node</h4>
                            <center><img src="{{ asset('images/image11.png')}}" class="content-image"></center>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code4" class="code-content">
                                        <div class="code-line">// Create a new Customer node</div>
                                        <div class="code-line">CREATE (:Customer {</div>
                                        <div class="code-line">   customerID: 'ALFKI',</div>
                                        <div class="code-line">   companyName: 'Alfreds Futterkiste',</div>
                                        <div class="code-line">   contactName: 'Maria Anders',</div>
                                        <div class="code-line">   contactTitle: 'Sales Representative',</div>
                                        <div class="code-line">   address: 'Obere Str. 57',</div>
                                        <div class="code-line">   city: 'Berlin',</div>
                                        <div class="code-line">   country: 'Germany',</div>
                                        <div class="code-line">   postalCode: '12209',</div>
                                        <div class="code-line">   phone: '030-0074321',</div>
                                        <div class="code-line">   fax: '030-0076545'</div>
                                        <div class="code-line">});</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code4">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>
                            
                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">In the example above:</span></li>
                                    <ul class="nested-list">
                                        <li><span class="property-name">Create :</span> Used to create a new node.</li>
                                        <li><span class="property-name">(:Customer) :</span> Gives the newly created node the label "Customer".</li>
                                        <li><span class="property-name">{...} :</span> Provides properties for the node.</li>
                                    </ul>
                                </li>
                            </ul>
                            <p>This query creates a new Customer node in the graph database with properties that include customer-related information such as address, company name, contact, and more.</p>
                            <hr>
                            <h4>Create New Order Node</h4>
                            <center><img src="{{ asset('images/image12.png')}}" class="content-image"></center>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code5" class="code-content">
                                        <div class="code-line">// Create a new Order node</div>
                                        <div class="code-line">CREATE (:Order {</div>
                                        <div class="code-line">   orderID: '11011',</div>
                                        <div class="code-line">   customerID: 'ALFKI',</div>
                                        <div class="code-line">   employeeID: 3,</div>
                                        <div class="code-line">   freight: 1.21,</div>
                                        <div class="code-line">   orderDate: datetime('1998-04-09T00:00:00.000'),</div>
                                        <div class="code-line">   requiredDate: datetime('1998-05-07T00:00:00.000'),</div>
                                        <div class="code-line">   shipAddress: 'Obere Str. 57',</div>
                                        <div class="code-line">   shipCity: 'Berlin',</div>
                                        <div class="code-line">   shipCountry: 'Germany',</div>
                                        <div class="code-line">   shipName: "Alfred's Futterkiste",</div>
                                        <div class="code-line">   shipPostalCode: '12209',</div>
                                        <div class="code-line">   shipRegion: NULL,</div>
                                        <div class="code-line">   shipVia: 1,</div>
                                        <div class="code-line">   shippedDate: datetime('1998-04-13T00:00:00.000')</div>
                                        <div class="code-line">});</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code5">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <ul class="property-list">
                                <li>
                                    <li><span class="property-name">In the example above:</span></li>
                                    <ul class="nested-list">
                                        <li><span class="property-name">Create :</span> Used to create a new node.</li>
                                        <li><span class="property-name">(:Customer) :</span> Gives the newly created node the label "Order".</li>
                                        <li><span class="property-name">{...} :</span> Provides properties for the node.</li>
                                    </ul>
                                </li>
                            </ul>
                            <p>This query creates a new Order node in the graph database with properties that include order-related information such as address, customer, ship time, and more.</p>
                            <hr>
                            <h2>Create Relationships</h2>
                            <p>
                                Relationships in a graph database represent connections or associations between nodes.
                                They are a fundamental component that allows modeling the relationships between different entities in a system. 
                                Relationships are used to capture meaningful interactions, dependencies, or associations between nodes. 
                                Here is an example of how to create a relationship between a customer and order in the Northwind database:
                            </p>
                            <center><img src="{{ asset('images/image13.png')}}" class="content-image"></center>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code6" class="code-content">
                                        <div class="code-line">MATCH (customer:Customer {customerID: 'ALFKI'})</div>
                                        <div class="code-line">MATCH (order:Order {orderID: '11011'})</div>
                                        <div class="code-line">CREATE (customer)-[:PURCHASED]->(order);</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code6">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>The given Cypher query aims to create a <span>[:PURCHASED]</span> relationship between the <span>Customer</span> node and the <span>Order</span> node.</p>

                            <h2 style="color:#034ea1; font-size:20px;" >1. Matching the Existing Customer Nodes</h2>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code7" class="code-content">
                                        <div class="code-line">MATCH (customer:Customer {customerID: 'ALFKI'})</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code7">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>Using <span>MATCH</span> to search for the customer node with <span>customerID</span> 'ALFKI'. The <span>customer</span> variable is used to reference this Customer node.</p>                   

                            <h2 style="color:#034ea1; font-size:20px;" >2. Matching the Existing Order Nodes</h2>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code8" class="code-content">
                                        <div class="code-line">MATCH (order:Order {orderID: '11011'})</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code8">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>Using <span>MATCH</span> to search for the customer node with <span>orderID</span> '11011'. The order variable is used to reference this <span>Order</span> node.</p>
                        
                            <h2 style="color:#034ea1; font-size:20px;" >3. Connects the Customer Node and Order Node</h2>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code9" class="code-content">
                                        <div class="code-line">CREATE (customer)-[:PURCHASED]->(order)</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code9">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>Use <span>CREATE</span> to create a relationship of type <span>[:PURCHASED]</span> between the <span>Customer</span> node and the <span>Order</span> node. This relationship indicates that the customer has made a purchase from a specific order.</p>
                            <p>Executing this query will create a new relationship between the <span>Customer</span> node and the <span>Order</span> node that matches the predefined matching conditions. This relationship will have a <span>[:PURCHASED]</span> label, which provides the context that the customer has made a purchase through a specific order.</p>
                        </div>

                        <!-- Recommendation and Result -->
                        <div id="recommendation" class="tab-content">
                            <p>Creating a recommendation engine using the Northwind dataset in a graph database involves leveraging relationships between 
                                entities to create personalized product recommendations for customers. Graph databases are well suited for this due to their 
                                ability to traverse and query relationships efficiently. The following is how we can approach building using Northwind:
                            </p>
                            <ul class="property-list">
                                <li style="font-size: 16px; color:#034ea1;"><span>• Identify Customer Purchase History</span>
                                    <p class="description">Start by tracing the graph from a specific customer node to the orders they have placed and the products in those orders.</p>
                                </li>
                                <li style="font-size: 16px; color:#034ea1;"><span>• Explore Similar Customers</span>
                                    <p class="description">Identify other customers who have purchased similar products or products from the same category.</p>
                                </li>
                                <li style="font-size: 16px; color:#034ea1;"><span>• Recommend Products Purchased by Similar Customers</span>
                                    <p class="description">Recommend products purchased by similar customers but not yet purchased by the target customer.</p>
                                </li>
                            </ul>
                            <hr>
                            <h2>Queries</h2>
                            <p>In the development of marketing and customer experience strategies, the discovery and implementation of appropriate product 
                                recommendations play a very important role. The two main approaches used to provide relevant product recommendations are 
                                Category-Based Recommendation and Collaborative Filtering Recommendation. In this section, we will explore both approaches 
                                and see how they can be applied in the context of the Northwind dataset. Category-Based Recommendation focuses on product 
                                category preferences, while Collaborative Filtering Recommendation uses customer purchase patterns to provide personalized 
                                recommendations. Let's explore more about how these two approaches can improve the customer shopping experience and provide 
                                valuable insights for business strategy.
                            </p>
                            <hr>
                            <h3>Category-Based Recommendation - By Category</h3>
                            <p>The category-based recommendation approach utilizes information about products that customers have liked or previously 
                                purchased to suggest other products in the same category. The principle is that customers who like products in a category 
                                may also be interested in other products in the same category. Below is an example of applying category-based recommendations 
                                using the Northwind dataset.
                            </p>

                            <h3>Identifying the Most Popular Products</h3>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code10" class="code-content">
                                        <div class="code-line">MATCH (cust:Customer)-[:PURCHASED]->(:Order)-[o:ORDERS]->(p:Product), (p)-[:PART_OF]->(c:Category)</div>
                                        <div class="code-line">RETURN DISTINCT cust.customerID as CustomerID, c.categoryName AS ProductCategory, p.productName AS Product, SUM(o.quantity) AS</div>
                                        <div class="code-line">TotalProductsPurchased</div>
                                        <div class="code-line">ORDER BY TotalProductsPurchased DESC</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code10">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>This query involves searching for patterns of product purchases by customers and generating summary statistics, such as product category, products purchased, and total number of purchases.</p>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>1. Matching Graph Patterns</span>
                                    <p class="description" style="margin-top: 5px;">Using <span>MATCH</span> to match graph patterns. The <span>cust</span> node represents a customer, the <span>[:PURCHASED]</span> relation relates customers to orders, the <span>[o:ORDERS]</span> relation relates orders to products by storing the <span>quantity</span>, and the <span>[:PART_OF]</span> relation relates products to categories.</p>
                                </li>

                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code11" class="code-content">
                                            <div class="code-line">MATCH (cust:Customer)-[:PURCHASED]->(:Order)-[o:ORDERS]->(p:Product), (p)-[:PART_OF]->(c:Category)</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code11">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <li style="font-size: 18px; color:#034ea1;"><span>2. Return the Expected Data</span></li>
                                
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code12" class="code-content">
                                            <div class="code-line">RETURN DISTINCT cust.customerID as CustomerID, c.categoryName AS ProductCategory, p.productName AS Product, SUM(o.quantity) AS TotalProductsPurchased</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code12">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <p>Use <span>RETURN</span> to specify the columns to be returned:</p>
                                
                                <ul class="nested-list">
                                    <li style="font-size: 15px;"><span class="property-name">cust.contactName :</span> Customer ID.</li>
                                    <li style="font-size: 15px;"><span class="property-name">c.categoryName :</span> Name of the product category.</li>
                                    <li style="font-size: 15px;"><span class="property-name">p.productName :</span> Product name.</li>
                                    <li style="font-size: 15px;"><span class="property-name">SUM(o.quantity) :</span> The total number of products purchased, calculated using the SUM aggregation function from the quantity in the [o:ORDERS] relation.</li>
                                </ul>
                                
                                <li style="font-size: 18px; color:#034ea1;"><span>3. Using DISTINCT</span>
                                    <p class="description" style="margin-top: 5px;">Using <span>DISTINCT</span> to ensure that each row of the returned result is unique.</p>
                                </li>
                                
                                <li style="font-size: 18px; color:#034ea1;"><span>4. Sorting the Results</span></li>
                                
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code13" class="code-content">
                                            <div class="code-line">ORDER BY TotalProductsPurchased DESC</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code13">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <p class="description">Using <span>ORDER BY</span> to sort the results by the total number of products purchased in descending order <span>(DESC)</span>.</p>
                                
                                <center><img src="{{ asset('images/image14.png')}}" class="content-image"></center>
                                
                                <p>From the query results, we can get useful insights or understanding related to product purchasing patterns by customers. "Guaraná Fantástica" and "Konbu" were the two best-selling products with a total of 248 purchases each. In third place was "Camembert Pierrot" with 243 total purchases.</p>
                            </ul>
                            
                            <hr>
                            
                            <h2>New Product Recommendation</h2>

                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code14" class="code-content">
                                        <div class="code-line">MATCH (c:Customer)-[:PURCHASED]->(o:Order)-[:ORDERS]->(p:Product)<-[o2:ORDERS]-(:Order)-[:ORDERS]->(p2:Product)-[:PART_OF]->(cat:Category)<-[:PART_OF]-(p)</div>
                                        <div class="code-line">WHERE c.customerID = 'QUICK' AND NOT((c)-[:PURCHASED]->(:Order)-[:ORDERS]->(p2)) AND p.productName = 'Camembert Pierrot'</div>
                                        <div class="code-line">RETURN p.productName AS has_purchased, cat.categoryName AS category, p2.productName AS recommendation, SUM(o2.quantity) AS</div>
                                        <div class="code-line">TotalProductsPurchased</div>
                                        <div class="code-line">ORDER BY TotalProductsPurchased DESC</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code14">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>1. Matching Graph Patterns</span></li>
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code15" class="code-content">
                                            <div class="code-line">MATCH (c:Customer)-[:PURCHASED]->(o:Order)-[:ORDERS]->(p:Product)<-[:ORDERS]-(o2:Order)-[:ORDERS]->(p2:Product)-[:PART_OF]->(cat:Category)<-[:PART_OF]-(p)</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code15">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </ul>
                            
                            <p>Using <span>MATCH</span> to match graph patterns. Here:</p>
                            
                            <ul class="nested-list">
                                <li style="font-size: 15px;"><span class="property-name">c:Customer :</span> Customer node with label Customer.</li>
                                <li style="font-size: 15px;"><span class="property-name">o:Order :</span> Order node with label Order.</li>
                                <li style="font-size: 15px;"><span class="property-name">p:Product :</span> Product node with label Product.</li>
                                <li style="font-size: 15px;"><span class="property-name">p2:Product :</span> The second product node.</li>
                                <li style="font-size: 15px;"><span class="property-name">cat:Category :</span> Category node with the label Category.</li>
                                <li style="font-size: 15px;">This pattern includes :<span class="property-name">PURCHASED</span> , o2:ORDERS, and :PART_OF relations between nodes that create product, order, and category purchase paths.</li>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>2. Filter Customers and Products Purchased</span></li>
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code16" class="code-content">
                                            <div class="code-line">WHERE c.customerID = 'QUICK' AND NOT((c)-[:PURCHASED]->(:Order)-[:ORDERS]->(p2)) AND p.productName = 'Camembert Pierrot'</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code16">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </ul>
                            
                            <p>Using <span>WHERE</span> to apply a filter for customers with ID 'QUICK' who have not purchased the same product (<span>Camembert Pierrot</span>) and retrieve the product with that name.</p> 
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>3. Return the Expected Data</span></li>
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code17" class="code-content">
                                            <div class="code-line">RETURN p.productName AS has_purchased, cat.categoryName AS category, p2.productName AS recommendation, SUM(o2.quantity) AS TotalProductsPurchased</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code17">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </ul>
                            
                            <p>Use <span>RETURN</span> to return specific columns:</p>
                            
                            <ul class="nested-list">
                                <li style="font-size: 15px;"><span class="property-name">p.productName :</span> The name of the product that the customer has purchased.</li>
                                <li style="font-size: 15px;"><span class="property-name">c.categoryName :</span> The name of the product category.</li>
                                <li style="font-size: 15px;"><span class="property-name">p2.productName :</span> The name of the recommended product.</li>
                                <li style="font-size: 15px;"><span class="property-name">SUM(o.quantity) :</span> The total number of products purchased, calculated using the aggregation function <span>SUM</span> of the quantities (<span>quantity</span>) in the relation <span>[o2:ORDERS]</span>.</li>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>4. Sorting the Results</span></li>
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code18" class="code-content">
                                            <div class="code-line">ORDER BY TotalProductsPurchased DESC</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code18">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </ul>
                            
                            <p>Using <span>ORDER</span> BY to sort the results by the number of total products purchased of the recommended product order in descending order (<span>DESC</span>).</p> 
                            
                            <hr>
                            
                            <h2>Result</h2>
                            
                            <center><img src="{{ asset('images/image15.png')}}" class="content-image"></center>
                            
                            <p>In the query result, there are other product recommendations from the "Dairy Products" category that may be of interest to 'QUICK' 
                                customers based on the purchase pattern of other customers who also purchased 'Camembert Pierrot'. "Queso Manchego La Pastora" 
                                is the top recommendation with a total of 148 purchases by other customers. "Mascarpone Fabioli" was also recommended, 
                                although with a lower total purchase (8).
                            </p>
                            
                            <ul class="property-list">
                                <li>
                                    <li style="margin-bottom: 5px;"><span class="property-name">• First Query: Identifying Key Purchases</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;">A customer with ID "QUICK" frequently purchases products recorded in the Northwind database. In an effort to understand this customer's preferences and purchasing patterns, the first query was conducted to find out what products he buys the most.</li>
                                        <li style="font-size: 15px;">The results of the first query show that the product "Camembert Pierrot" from the "Dairy Products" category is one of the most frequently purchased products by customer "QUICK" with a total purchase of 243 units.</li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <ul class="property-list">
                                <li>
                                    <li style="margin-bottom: 5px;"><span class="property-name">• Second Query: Improve Product Recommendations</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;">By knowing the featured products of "QUICK" customers, the next step is to improve their shopping experience by recommending new products that have never been purchased by those customers before.</li>
                                        <li style="font-size: 15px;">A second query was conducted to find products in the same category as "Camembert Pierrot" that have never been purchased by "QUICK" customers.</li>
                                        <li style="font-size: 15px;">The result of the second query shows that "QUICK" customers can be directed to the product "Queso Manchego La Pastora" from the category "Dairy Products" as a recommendation. This product was chosen because it has the same category as the product that has been purchased by the customer, hoping to offer a new variety and fulfill their needs.</li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <ul class="property-list">
                                <li>
                                    <li style="margin-bottom: 5px;"><span class="property-name">• New Product Recommendation</span></li>
                                    <ul class="nested-list">
                                        <li style="font-size: 15px;">"QUICK" customers received a recommendation to try a new product, "Queso Manchego La Pastora," a product from the same category as their favorite, "Camembert Pierrot."</li>
                                        <li style="font-size: 15px;">Customers may consider trying this new product, increasing the variety of products they purchase and feeling more included in their shopping experience.</li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <p>By using this kind of query, companies can improve customer experience by providing relevant product recommendations based on other customers' purchasing behavior. This can help in marketing strategies, increasing sales, and even improving customer satisfaction.</p>
                            
                            <center>
                                <video class="content-video" controls>
                                    <source src="{{ asset('videos/result_category_based.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </center>                            
                            
                            <hr>
                            
                            <h2>Collaborative Filtering Recommendation - By Product Purchase</h2>
                            
                            <p>Collaborative filtering is a technique in recommender systems where recommendations are provided based on behavioral patterns and preferences of users similar to the target user. The principle is that recommending products based on similarities in purchases by other customers, without a specific focus on a particular category. Below is an example of applying collaborative filtering recommendations using the Northwind dataset.</p>
                            
                            <h2 style="color:#034ea1; font-size:20px;" >Find Behavioral Patterns</h2>
                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code19" class="code-content">
                                        <div class="code-line">MATCH (targetCustomer:Customer {customerID: 'CONSH'})-[:PURCHASED]->(:Order)-[:ORDERS]->(p1:Product) WITH targetCustomer, p1</div>
                                        <div class="code-line">MATCH (otherCustomer:Customer)-[:PURCHASED]->(order:Order)-[:ORDERS]-(p2:Product)</div>
                                        <div class="code-line">WHERE otherCustomer <> targetCustomer AND NOT (targetCustomer)-[:PURCHASED]->(p2)</div>
                                        <div class="code-line">WITH targetCustomer, p2, COUNT(order) AS purchaseFrequency</div>
                                        <div class="code-line">RETURN p2.productName AS RecommendedProduct, purchaseFrequency AS PurchaseFrequency</div>
                                        <div class="code-line">ORDER BY purchaseFrequency DESC LIMIT 6;</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code19">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>
                            
                            <p>The purpose of this query is to provide product recommendations to customers with ID 'CONSH' based on product purchasing patterns by other customers who have similar purchasing preferences.</p>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>1. Search for Target Customer Purchases</span></li>
                                <div class="code-box">
                                    <div class="code-header">
                                        <span class="code-title">Cypher</span>
                                    </div>
                                    <div class="code-container">
                                        <div id="cypher-code20" class="code-content">
                                            <div class="code-line">MATCH (targetCustomer:Customer {customerID: 'CONSH'})-[:PURCHASED]->(:Order)-[:ORDERS]->(p1:Product) WITH targetCustomer, p1</div>
                                        </div>
                                        <button class="copy-button" data-copy-target="cypher-code20">
                                            <span class="copy-default">
                                                <svg class="copy-icon" viewBox="0 0 24 24">
                                                    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                                </svg>
                                            </span>
                                            <span class="copy-success">
                                                <svg class="success-icon" viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                                </svg>
                                                Copied!
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </ul>
                            
                            <p>Retrieves the products that have been purchased by the target customer ('CONSH').</p>
                            
                            <p>Using <span>MATCH</span> to match the graph pattern. Here:</p>
                            
                            <ul class="nested-list">
                                <li style="font-size: 15px;"><span class="property-name">targetCustomer :</span> The target customer node with customerID 'CONSH'.</li>
                                <li style="font-size: 15px;"><span class="property-name">p1 :</span> The product node purchased by the target customer.</li>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>2. Calculating the Frequency of Purchases by Other Customers</span></li>
                            </ul>
                            
                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code21" class="code-content">
                                        <div class="code-line">MATCH (otherCustomer:Customer)-[:PURCHASED]->(order:Order)-[:ORDERS]-(p2:Product)</div>
                                        <div class="code-line">WHERE otherCustomer <> targetCustomer AND NOT (targetCustomer)-[:PURCHASED]->(p2)</div>
                                        <div class="code-line">WITH targetCustomer, p2, COUNT(order) AS purchaseFrequency</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code21">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>Search for products purchased by other customers and ensure that we only consider customers who are different 
                                from the target customer and products that have never been purchased by the target customer. 
                                Then calculate the frequency of purchase of each product by other customers.
                            </p>
                            
                            <p>Uses <span>MATCH</span> to match graph patterns.</p>
                            
                            <ul class="nested-list">
                                <li style="font-size: 15px;"><span>otherCustomer :</span> Another customer node that is not the same as the target customer.</li>
                                <li style="font-size: 15px;"><span>p2 :</span> A product node that is different from the product purchased by the target customer.</li>
                                <li style="font-size: 15px;">Using <span>WHERE</span> to filter <span>otherCustomer</span> instead of <span>targetCustomer</span>. Also ensures that <span>targetCustomer</span> has not purchased product <span>p2</span>.</li>
                                <li style="font-size: 15px;">Uses <span>WITH</span> to store the previous matching result and count the number of orders placed by <span>otherCustomer</span>.</li>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>3. Return Product Recommendations</span></li>
                            </ul>
                            <div class="code-box">
                                <div class="code-header">
                                    <span class="code-title">Cypher</span>
                                </div>
                                <div class="code-container">
                                    <div id="cypher-code22" class="code-content">
                                        <div class="code-line">RETURN p2.productName AS RecommendedProduct, purchaseFrequency AS PurchaseFrequency</div>
                                        <div class="code-line">ORDER BY purchaseFrequency DESC</div>
                                        <div class="code-line">LIMIT 6;</div>
                                    </div>
                                    <button class="copy-button" data-copy-target="cypher-code22">
                                        <span class="copy-default">
                                            <svg class="copy-icon" viewBox="0 0 24 24">
                                                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                                            </svg>
                                        </span>
                                        <span class="copy-success">
                                            <svg class="success-icon" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Copied!
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <p>Use <span>RETURN</span> to return a product name (RecommendedProduct) containing 
                                product recommendations and their purchase frequency (PurchaseFrequency) 
                                for product p2, sorted in descending order based on the product's purchase 
                                frequency and limit the number of recommendations displayed.
                            </p>
                            
                            <hr>
                            
                            <h2>Result</h2>
                            
                            <center><img src="{{ asset('images/image16.png')}}" class="content-image"></center>
                            
                            <center><img src="{{ asset('images/image17.png')}}" class="content-image"></center>
                            
                            <p>From the query results, we can infer some insights related to product recommendations to 'CONSH' customers based on other customers' purchasing patterns:</p>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>• Most Recommended Product</span></li>
                                <p>"Raclette Courdavault" is the most recommended product with a purchase frequency of 378. This shows that this product is highly demanded by other customers who share similar preferences with 'CONSH' customers.</p>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>• Most Recommended Product</span></li>
                                <p>"Guaraná Fantástica", "Camembert Pierrot", and "Gorgonzola Telino" have a high frequency of purchase with a score of 357 each. These products are also top recommendations with high popularity.</p>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>• Diversification of Recommended Products</span></li>
                                <p>Product recommendations include various types, such as beverages ("Guaraná Fantástica"), cheeses ("Raclette Courdavault", "Camembert Pierrot", "Gorgonzola Telino"), pasta ("Gnocchi di nonna Alice"), and cakes ("Tarte au sucre"). This shows the variety of products recommended to 'CONSH' customers.</p>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>• Potential 'CONSH' Customer Favorites</span></li>
                                <p>Based on the recommendations, we can assume that customer 'CONSH' is likely to have a preference for food products such as cheese, drinks, pasta, and cake based on the purchasing patterns of other customers.</p>
                            </ul>
                            
                            <ul class="property-list">
                                <li style="font-size: 18px; color:#034ea1;"><span>• Potential Marketing Strategy</span></li>
                                <p>This information can be used to develop more targeted marketing strategies, such as special promotions, bundle packages, or discount campaigns for the most recommended products.</p>
                            </ul>
                            
                            <p>By understanding the results of this query, companies can improve the shopping experience of 'CONSH' customers by providing product recommendations that are more in line with their preferences.</p>
                            
                            <center>
                                <video class="content-video" controls>
                                    <source src="{{ asset('videos/result_collaborative_filtering.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </center> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end blog-section -->

@endsection

<script>
    function openTab(event, tabId) {
        // Hapus semua "active" dari tab-button
        let tabButtons = document.querySelectorAll(".tab-button");
        tabButtons.forEach(btn => btn.classList.remove("active"));

        // Hapus semua "active" dari tab-content
        let tabContents = document.querySelectorAll(".tab-content");
        tabContents.forEach(content => content.classList.remove("active"));

        // Tambahkan "active" ke tab yang dipilih
        const targetContent = document.getElementById(tabId);
        targetContent.classList.add("active");

        // Tambahkan "active" ke tombol yang diklik
        event.currentTarget.classList.add("active");

        // Tunggu sebentar agar konten tab selesai ditampilkan
        setTimeout(() => {
            // Cari elemen teks pertama (h2 atau p) dalam tab yang aktif
            const firstTextElement = targetContent.querySelector('h2, p');
            
            if (firstTextElement) {
                // Hitung posisi elemen relatif terhadap halaman
                const elementPosition = firstTextElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset;

                // Scroll ke posisi elemen dengan offset
                window.scrollTo({
                    top: offsetPosition - 100, // Kurangi 100px untuk memberikan ruang di atas
                    behavior: 'smooth'
                });
            }
        }, 100); // Tunggu 100ms
    }

    document.addEventListener('DOMContentLoaded', () => {
    const copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach(button => {
        button.addEventListener('click', async () => {
            const targetId = button.getAttribute('data-copy-target');
            const codeContent = document.getElementById(targetId);
            const codeText = Array.from(codeContent.querySelectorAll('.code-line'))
                                 .map(line => line.textContent)
                                 .join('\n');

            try {
                await navigator.clipboard.writeText(codeText);
                showCopySuccess(button);
            } catch (err) {
                // Fallback untuk browser yang tidak mendukung Clipboard API
                const textarea = document.createElement('textarea');
                textarea.value = codeText;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                showCopySuccess(button);
            }
        });
    });

    function showCopySuccess(button) {
        button.classList.add('copied');
        
        setTimeout(() => {
            button.classList.remove('copied');
        }, 2000);
    }

    // Tambahkan scroll otomatis jika konten melebihi 5 baris
    const codeContents = document.querySelectorAll('.code-content');
    codeContents.forEach(content => {
        const lines = content.querySelectorAll('.code-line');
        if (lines.length > 5) {
            content.style.maxHeight = '150px'; // Sekitar 5 baris kode
        } else {
            content.style.maxHeight = 'none';
        }
    });
});
</script>