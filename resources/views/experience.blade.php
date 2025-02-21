@extends('layouts.app')

@section('title', 'Graph Database vs RDBMS - Peruri Graph Analytics')

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
        margin-top: -100px;
    }

    .underline {
        width: 200px;
        height: 3px;
        background-color: #034ea1;
        margin: 10px auto 30px auto;
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

    .code-box {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        margin: 1rem 0;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        width: 100%;
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
        width: 100%;
    }

    .code-content {
        font-family: 'Consolas', 'Monaco', monospace;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #1f2937;
        max-height: 300px;
        overflow: auto;
        width: 100%;
    }

    .code-line {
        margin: 0;
        padding: 0.125rem 0;
        white-space: pre;
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
        z-index: 10;
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

    .grid {
        display: grid;
        width: 100%;
        margin: 20px 0;
    }

    .grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 4rem;
        align-items: flex-start;
    }

    .numbered-section {
        display: flex;
        flex-direction: column;
        margin-bottom: 2rem;
        min-height: 200px; /* Sesuaikan tinggi minimum */
    }

    .gap-8 {
        gap: 4rem;
    }

    .tab-content-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 5px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .tab-content {
        display: none;
        padding: 10px;
        width: 100%;
    }

    .tab-content span {
        color: #034ea1;
        font-weight: bold;
    }

    .tab-content img {
        margin: 10px 0;
    }

    .tab-content.active {
        display: block;
    }

    /* Heading Styling */
    h2.text-blue-600 {
        color: #034ea1;
        margin-bottom: 1rem;
    }

    h3.text-blue-600 {
        color: #034ea1;
        margin: 1.5rem 0 1rem;
    }

    /* Summary Section - Minimal Style to match image */
    .summary-section {
        margin: 30px 0;
        max-width: 100%;
    }

    .summary-title {
        font-size: 22px;
        color: #034ea1;
        font-weight: bold;
        margin-bottom: 15px;
        border-bottom: none; /* Tanpa border bottom */
    }

    /* Main list items (dengan bullets biru) */
    .main-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 20px;
    }

    .main-item {
        position: relative;
        padding-left: 22px;
        margin-bottom: 15px;
    }

    .main-item::before {
        content: "•";
        position: absolute;
        left: 0;
        top: 0;
        color: #034ea1;
        font-size: 22px;
        line-height: 1;
    }

    .main-item strong {
        color: #034ea1;
        font-weight: bold;
        font-size: 16px;
        display: block;
        margin-bottom: 5px;
    }

    /* Sub list items (dengan bullets hitam) */
    .sub-list {
        list-style-type: none;
        padding-left: 15px;
        margin-top: 8px;
    }

    .sub-list li {
        position: relative;
        padding-left: 15px;
        margin-bottom: 8px;
        line-height: 1.4;
        color: #333;
        font-size: 14px;
    }

    .sub-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: #888;
        font-size: 14px;
        top: 0;
    }

    /* Code formatting di dalam list */
    .sub-list li strong,
    .sub-list li b {
        font-weight: bold;
        font-style: normal;
    }

    /* Paragraf kesimpulan */
    .summary-footer {
        margin-top: 20px;
        line-height: 1.5;
        color: #333;
        font-size: 14px;
        max-width: 100%;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .summary-section {
            padding: 0 10px;
        }
        
        .main-item {
            padding-left: 18px;
        }
        
        .sub-list {
            padding-left: 10px;
        }
    }
</style>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>Experience</h2>
                    <ol>
                        <li><a href="{{ url('/')}}"><i class="icon-36"></i> Home</a></li>
                        <li>Experience</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-single-page-area full-width ptb-120">
    <div class="container-blog">
        <div class="row justify-content-center">
            <div class="col col-lg-10 col-md-12 col-12">
                <div class="blog-single-wrap">
                    <section class="section-container">
                        <h2 class="section-title" style="text-transform:none;">Graph Database vs RDBMS</h2>
                        <div class="underline"></div>
               
                        <p>Graph Databases and RDBMS (Relational Database Management System) have different approaches to data storage and manipulation. 
                            Graph Database, with its graphical representation, provides advantages in more natural data modeling, schema flexibility, 
                            efficient queries, and graph search analysis.
                        </p>
                    </section>

                    <!-- Menu Navigasi -->
                    <div class="tab-menu">
                        <button class="tab-button active" onclick="openTab(event, 'easier')">Easier and Natural Data Modelling</button>
                        <button class="tab-button" onclick="openTab(event, 'schema')">Schema Flexibility</button>
                        <button class="tab-button" onclick="openTab(event, 'graph')">Graph Search Analysis</button>
                        <button class="tab-button" onclick="openTab(event, 'efficient')">Efficient Query</button>
                    </div>

                    <div class="tab-content-container">
                        <!-- Tab Contents Easier -->
                        <div id="easier" class="tab-content active">
                            <div class="grid grid-cols-2 gap-8">
                                <!-- Graph Database Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">Graph Database</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">1. Create User Nodes</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property">
                                                    <div class="code-line">CREATE (:User {id: 1, name: 'Alice'})</div>
                                                    <div class="code-line">CREATE (:User {id: 2, name: 'Bob'})</div>
                                                    <div class="code-line">CREATE (:User {id: 3, name: 'Charlie'})</div>
                                                    <div class="code-line">CREATE (:User {id: 4, name: 'David'})</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property">
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
                                        
                                        <p>This is the query to create user nodes in the graph database. Each <span>CREATE</span> statement creates one node with a <span>User</span> label and <span>id</span> and name properties.</p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mt-6 mb-3">2. Add friend relationships</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property1">
                                                    <div class="code-line">MATCH (alice:User {name: 'Alice'}), (bob:User {name: 'Bob'})</div>
                                                    <div class="code-line">CREATE (alice)-[:FRIENDS]->(bob)</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">MATCH (bob:User {name: 'Bob'}), (charlie:User {name: 'Charlie'})</div>
                                                    <div class="code-line">CREATE (bob)-[:FRIENDS]->(charlie)</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">MATCH (bob:User {name: 'Bob'}), (david:User {name: 'David'})</div>
                                                    <div class="code-line">CREATE (bob)-[:FRIENDS]->(david)</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">MATCH (charlie:User {name: 'Charlie'}), (david:User {name: 'David'})</div>
                                                    <div class="code-line">CREATE (charlie)-[:FRIENDS]->(david)</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property1">
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
                                    
                                        <p>This is the query to create a friend relationship between user nodes. Each <span>MATCH</span> is used to find nodes with certain conditions, 
                                            and then <span>CREATE</span> is used to create an edge with the label <span>FRIENDS</span> connecting the two user nodes.
                                        </p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">3. Show Data</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property2">
                                                    <div class="code-line">MATCH (n) RETURN n</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property2">
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
                                        
                                        <p>This is a query to display all nodes and edges in the database. <span>MATCH (n)</span> matches all nodes and edges, and <span>RETURN n</span> returns all matching results.</p>

                                        <img src="{{ asset('images/image22.png')}}">

                                        <p>Overall, this Cypher code creates four user nodes and adds friend relationships between them, then displays all the nodes and edges in the database.</p>
                                    </div>
                                </div>

                                <!-- RDBMS Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">RDBMS</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">1. Create a User Table and Insert Data</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property">
                                                    <div class="code-line">CREATE TABLE Users (</div>
                                                    <div class="code-line"> id INT PRIMARY KEY,</div>
                                                    <div class="code-line"> name VARCHAR(255)</div>
                                                    <div class="code-line">);</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">INSERT INTO Users (id, name) VALUES (1, 'Alice'), (2, 'Bob'), (3, 'Charlie'), (4, 'David');</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property">
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

                                        <p>This is the query to create a <span>Users</span> table with two columns: <span>id</span> as the PRIMARY KEY and <span>name</span> as a character column with a maximum length limit of 255 characters. 
                                            There is also a query to insert data into the <span>Users</span> table. Four rows of data are inserted with corresponding <span>id</span> and <span>name</span> values.
                                        </p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">2. Create a Friend Relationship Table</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property1">
                                                    <div class="code-line">CREATE TABLE Friends (</div>
                                                    <div class="code-line"> user_id1 INT,</div>
                                                    <div class="code-line"> user_name1 VARCHAR(255),</div>
                                                    <div class="code-line"> user_id2 INT,</div>
                                                    <div class="code-line"> user_name2 VARCHAR(255),</div>
                                                    <div class="code-line"> FOREIGN KEY (user_id1) REFERENCES Users(id),</div>
                                                    <div class="code-line"> FOREIGN KEY (user_id2) REFERENCES Users(id),</div>
                                                    <div class="code-line"> PRIMARY KEY (user_id1, user_id2)</div>
                                                    <div class="code-line">);</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">INSERT INTO Friends (user_id1, user_name1, user_id2, user_name2) VALUES</div>
                                                    <div class="code-line">  (1, 'Alice', 2, 'Bob'),</div>
                                                    <div class="code-line">  (2, 'Bob', 3, 'Charlie'),</div>
                                                    <div class="code-line">  (2, 'Bob', 4, 'David'),</div>
                                                    <div class="code-line">  (3, 'Charlie', 4, 'David');</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property1">
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

                                        <p>This is a query to create a <span>Friends</span> table with four columns: two pairs of <span>user_id</span> and <span>user_name</span> to represent the two users who are friends, 
                                            and two FOREIGN KEYS that refer to the <span>id</span> column in the <span>Users</span> table. In addition, there is a composite PRIMARY KEY of the two columns <span>user_id1</span> and <span>user_id2</span>. 
                                            Then, there is a query to insert data into the <span>Friends</span> table. Four rows of data are inserted with pairs of users who are friends.
                                        </p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">3. Return Data</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property2">
                                                    <div class="code-line">SELECT * FROM Friends;</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property2">
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

                                        <img src="{{ asset('images/image23.png')}}">

                                        <p>Overall, this SQL code creates four users in a table and adds friend relationships between them in another table, 
                                            then displays all the Friends relationships (table) in the database.
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="summary-section">
                                <h2 class="summary-title">Summary</h2>
                                <ul class="main-list">
                                    <li class="main-item">
                                        <strong>Intuitive Query Structure</strong>
                                        <ul class="sub-list">
                                            <li>In Cypher queries, the creation and management of friend relationships is done with clear and easy-to-understand syntax. For example, **CREATE (alice)-[:FRIENDS]->(bob)** clearly states that Alice and Bob have a friend relationship.</li>
                                            <li>In comparison, in SQL, the representation of friend relationships requires separate tables and JOIN operations, which may be less intuitive for simple relationship cases.</li>
                                        </ul>
                                    </li>
                                    
                                    <li class="main-item">
                                        <strong>Direct Relationship Modeling</strong>
                                        <ul class="sub-list">
                                            <li>In Graph Database, entities and their relationships are represented as nodes and edges, creating a more direct model that matches the way humans think about relationships.</li>
                                            <li>In RDBMS, relationship representation requires modeling through separate tables, which can make the data structure feel more complex.</li>
                                        </ul>
                                    </li>
                                    
                                    <li class="main-item">
                                        <strong>Easier Relationship Creation and Management</strong>
                                        <ul class="sub-list">
                                            <li>In the Cypher example, friend relationship creation is done with a single CREATE statement for each relationship. This creates a more compact and manageable structure.</li>
                                            <li>In SQL, each friend relationship requires a new row in a separate table, which may require more queries and data manipulation.</li>
                                        </ul>
                                    </li>
                                </ul>
                                
                                <p class="summary-footer">
                                    By using a specially designed query language such as Cypher, Graph Databases provide a way that is closer to the way humans think about relationships between entities. This is especially useful when working with data that has complex and dynamic relationship structures.
                                </p>

                            </div>
                        </div>

                        <div id="schema" class="tab-content">
                            <div class="grid grid-cols-2 gap-8">
                                <!-- Graph Database Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">Graph Database</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Add a New Property</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property3">
                                                    <div class="code-line">// Add a new property (e.g. 'email') to the user node</div>
                                                    <div class="code-line">MATCH (user:User {name: 'Alice'})</div>
                                                    <div class="code-line">SET user.email = 'alice@example.com'</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property3">
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
                                        
                                        <p>In the Graph Database, adding a new property such as 'email' to a user node is easily done using the <span>SET</span> statement. 
                                            This requires no global schema changes and can be done directly on the node in question without affecting other nodes or the overall database structure.
                                        </p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mt-6 mb-3">Add a New Relationship</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property4">
                                                    <div class="code-line">// Add a new realtionship 'LIKES' between users</div>
                                                    <div class="code-line">MATCH (alice:User {name: 'Alice'}), (bob:User {name: 'Bob'})</div>
                                                    <div class="code-line">CREATE (alice)-[:LIKES]->(bob)</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property4">
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
                                    
                                        <p>In Graph Database, adding new relationships such as 'LIKES' between two user nodes is done with a clear and direct <span>CREATE</span> statement. This increases flexibility and reduces complexity in handling new relationships.</p>
                                    </div>
                                </div>

                                <!-- RDBMS Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">RDBMS</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Add a New Property</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property3">
                                                    <div class="code-line">-- Add a new column (e.g. 'email') to the user table</div>
                                                    <div class="code-line">ALTER TABLE Users</div>
                                                    <div class="code-line">ADD COLUMN email VARCHAR(255);</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">-- Add a new value for the 'email' column to an existing row</div>
                                                    <div class="code-line">UPDATE Users</div>
                                                    <div class="code-line">SET email = 'alice@example.com'</div>
                                                    <div class="code-line">WHERE name = 'Alice';</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property3">
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

                                        <p>This is the query to create a <span>Users</span> table with two columns: <span>id</span> as the PRIMARY KEY and <span>name</span> as a character column with a maximum length limit of 255 characters.</p>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Add a New Relationship</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property4">
                                                    <div class="code-line">-- Create new table 'Likes' to represent a new relationship</div>
                                                    <div class="code-line">CREATE TABLE Likes (</div>
                                                    <div class="code-line"> user_id1 INT,</div>
                                                    <div class="code-line"> user_id2 INT,</div>
                                                    <div class="code-line"> FOREIGN KEY (user_id1) REFERENCES Users(id),</div>
                                                    <div class="code-line"> FOREIGN KEY (user_id2) REFERENCES Users(id),</div>
                                                    <div class="code-line"> PRIMARY KEY (user_id1, user_id2)</div>
                                                    <div class="code-line">);</div>
                                                    <div class="code-line"><br></div>
                                                    <div class="code-line">-- Add a new relationship 'LIKES' between users</div>
                                                    <div class="code-line">INSERT INTO Likes (user_id1, user_id2)</div>
                                                    <div class="code-line">VALUES (</div>
                                                    <div class="code-line"> (SELECT id FROM Users WHERE name = 'Alice'),</div>
                                                    <div class="code-line"> (SELECT id FROM Users WHERE name = 'Bob')</div>
                                                    <div class="code-line">);</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property4">
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

                                        <p>In an RDBMS, adding a new relationship involves creating a new table (e.g. 'Likes') to represent the relationship, which requires more steps and can increase the complexity of the schema. Furthermore, the <span>INSERT INTO</span> statement is used to add a new row representing the relationship between two users.</p>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="summary-section">
                                <h2 class="summary-title">Summary</h2>
                                
                                <p class="summary-footer">Schema flexibility is one of the main advantages of Graph Databases, 
                                    and the example queries are given to show how Graph Databases can easily handle schema 
                                    changes without requiring the complex steps required by a Relational Database Management System (RDBMS). 
                                    Graph Database demonstrates excellence in schema flexibility, 
                                    where the addition of new properties or relationships can be done without global 
                                    schema changes and with a more direct and intuitive syntax. 
                                    This provides flexibility and ease in managing and customizing data structures based on application needs 
                                    without sacrificing performance or complexity.
                                </p>

                            </div>
                        </div>

                        <div id="graph" class="tab-content">
                            <div class="grid grid-cols-2 gap-8">
                                <!-- Graph Database Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">Graph Database</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Find the Shortest Path</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property5">
                                                    <div class="code-line">MATCH path = shortestPath((alice:User {name: 'Alice'})-[:FRIENDS*]-(david:User {name: 'David'}))</div>
                                                    <div class="code-line">RETURN path</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property5">
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

                                        <img src="{{ asset('images/image24.png')}}">

                                        <ul class="main-list">
                                            <li class="main-item">Cypher provides a special syntax shortestPath to find the shortest path between two nodes easily and clearly.</li>
                                            <li class="main-item">Shortest path search in Graph Database is implemented efficiently, utilizing graphical structures and algorithms optimized for the purpose.</li>
                                        </ul>
                                        
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mt-6 mb-3">Find Interconnected Nodes</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property6">
                                                    <div class="code-line">MATCH (charlie:User {name: 'Charlie'})-[:FRIENDS]->(commonFriend)<-[:FRIENDS]-(bob:User {name: 'Bob'})</div>
                                                    <div class="code-line">RETURN commonFriend</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property6">
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

                                        <img src="{{ asset('images/image25.png')}}">
                                        
                                        <ul class="main-list">
                                            <li class="main-item">Cypher allows the construction of queries that directly search for nodes that are connected through the 'FRIENDS' relationship.</li>
                                            <li class="main-item">The graphical structure allows for a simpler and more efficient implementation of queries to find connected nodes.</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- RDBMS Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">RDBMS</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Find the Shortest Path</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property5">
                                                    <div class="code-line">SELECT *</div>
                                                    <div class="code-line">FROM Users AS u1, Friends AS f1, Users AS u2, Friends AS f2, Users AS u3</div>
                                                    <div class="code-line">WHERE u1.name = 'Alice'</div>
                                                    <div class="code-line"> AND u1.id = f1.user_id1</div>
                                                    <div class="code-line"> AND f1.user_id2 = u2.id</div>
                                                    <div class="code-line"> AND u2.id = f2.user_id1</div>
                                                    <div class="code-line"> AND f2.user_id2 = u3.id</div>
                                                    <div class="code-line"> AND u3.name = 'David';</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property5">
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

                                        <img src="{{ asset('images/image26.png')}}">

                                        <ul class="main-list">
                                            <li class="main-item">This SQL query uses a combination of multiple WHERE conditions to find the shortest path, which can make the query structure more complex and difficult to interpret, thus requiring longer execution time especially at large scale.</li>
                                        </ul>
                                    </div>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Find Interconnected Nodes</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property6">
                                                    <div class="code-line">SELECT u3.name AS commonFriend</div>
                                                    <div class="code-line">FROM Users AS u1</div>
                                                    <div class="code-line">JOIN Friends AS f1 ON u1.id = f1.user_id1</div>
                                                    <div class="code-line">JOIN Users AS u2 ON f1.user_id2 = u2.id</div>
                                                    <div class="code-line">JOIN Friends AS f2 ON u2.id = f2.user_id1</div>
                                                    <div class="code-line">JOIN Users AS u3 ON f2.user_id2 = u3.id</div>
                                                    <div class="code-line">WHERE u1.name = 'Bob'</div>
                                                    <div class="code-line">AND u2.name = 'Charlie'</div>
                                                    <div class="code-line">AND u3.name <> 'Bob'</div>
                                                    <div class="code-line">AND u3.name <> 'Charlie';</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property6">
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

                                        <img src="{{ asset('images/image27.png')}}">

                                        <ul class="main-list">
                                            <li class="main-item">These SQL queries use a combination of JOIN and complex WHERE conditions, which can result in queries that are more difficult to understand and manage.</li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="summary-section">
                                <h2 class="summary-title">Summary</h2>
                                
                                <p class="summary-footer">Graph Database shows advantages in terms of efficiency and clarity of syntax in the context of graph search analysis. 
                                    Cypher allows for more direct and intuitive query construction, while RDBMS may require more steps and complexity in query structure to achieve similar results. 
                                    In graph analysis scenarios, Graph Databases often provide more optimal solutions.
                                </p>

                            </div>
                        </div>

                        <div id="efficient" class="tab-content">
                            <div class="grid grid-cols-2 gap-8">
                                <!-- Graph Database Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">Graph Database</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Finds All Connected Nodes</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">Cypher</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="cypher-property7">
                                                    <div class="code-line">MATCH (friend)-[:FRIENDS]->(david:User {name: 'David'})</div>
                                                    <div class="code-line">RETURN friend</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="cypher-property7">
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

                                        <img src="{{ asset('images/image28.png')}}">

                                        <ul class="main-list">
                                            <li class="main-item">
                                                <strong>Intuitive Graphical Structure</strong>
                                                <ul class="sub-list">
                                                    <li>This query creates a graphical pattern that directly illustrates the 'FRIENDS' relationship between the nodes 'friend' and 'David'.</li>
                                                    <li>A more direct and intuitive syntax describes the structure of the relationship, making it easy to understand.</li>
                                                </ul>
                                            </li>

                                            <li class="main-item">
                                                <strong>Add friend relationships</strong>
                                                <ul class="sub-list">
                                                    <li>Graph Database is designed for efficiency in graph traversing, and this query directly retrieves all nodes connected to 'David' through the 'FRIENDS' relationship.</li>
                                                    <li>This operation can be executed efficiently in the graph data structure.</li>
                                                </ul>
                                            </li>

                                            <li class="main-item">
                                                <strong>Ease of Query Compilation</strong>
                                                <ul class="sub-list">
                                                    <li>Composing queries using Cypher provides flexibility and ease in composing queries that reflect the relationship structure.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- RDBMS Side -->
                                <div>
                                    <h2 class="text-blue-600 text-xl font-bold mb-4">RDBMS</h2>

                                    <div class="numbered-section">
                                        <h3 class="text-blue-600 mb-3">Finds All Connected Nodes</h3>
                                        
                                        <div class="code-box">
                                            <div class="code-header">
                                                <span class="code-title">SQL</span>
                                            </div>
                                            <div class="code-container">
                                                <div class="code-content" id="sql-property7">
                                                    <div class="code-line">SELECT u1.name AS friend</div>
                                                    <div class="code-line">FROM Users u2</div>
                                                    <div class="code-line">JOIN Friends ON u2.id = Friends.user_id2</div>
                                                    <div class="code-line">JOIN Users u1 ON Friends.user_id1 = u1.id</div>
                                                    <div class="code-line">WHERE u2.name = 'David';</div>
                                                </div>
                                                <button class="copy-button" data-copy-target="sql-property7">
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

                                        <img src="{{ asset('images/image29.png')}}">

                                        <ul class="main-list">
                                            <li class="main-item">
                                                <strong>Complex JOIN Operations</strong>
                                                <ul class="sub-list">
                                                    <li>This query involves multiple JOIN operations to join the Users and Friends tables, which can affect performance especially at scale.</li>
                                                </ul>
                                            </li>

                                            <li class="main-item">
                                                <strong>More Complex Syntax</strong>
                                                <ul class="sub-list">
                                                    <li>SQL syntax requires JOIN operations that require further understanding of relational structures.</li>
                                                    <li>The query structure is more complex and requires more steps to achieve the same result.</li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="summary-section">
                                <h2 class="summary-title">Summary</h2>
                                
                                <p class="summary-footer">Graph Database, as demonstrated by Cypher queries, stands out in efficiency and syntactic clarity 
                                    when performing graph traversing operations. A data structure closer to the way humans think about relationships 
                                    makes it more efficient for this kind of task. Graph Database is specifically designed to perform graph traversing on the fly. 
                                    In this data structure, searching for entities and their relationships becomes more efficient than JOIN operations in RDBMS. 
                                    The easy-to-understand syntax and operational efficiency make Graph Database a good choice for applications 
                                    that require queries involving complex relationship structures.
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script>
    // Fungsi openTab yang sudah ada dengan penambahan equalizeHeights
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

        // Jalankan fungsi untuk menyejajarkan tinggi konten
        setTimeout(() => {
            equalizeHeights(tabId);
            
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

    // Fungsi baru untuk menyejajarkan tinggi konten
    function equalizeHeights(activeTabId) {
        const activeTab = document.getElementById(activeTabId);
        if (!activeTab) return;
        
        // Sejajarkan semua numbered-section dalam tab aktif
        const leftSections = activeTab.querySelectorAll('.grid > div:first-child .numbered-section');
        const rightSections = activeTab.querySelectorAll('.grid > div:last-child .numbered-section');
        
        // Jika tidak ada elemen numbered-section, coba sejajarkan h3 elements
        if (leftSections.length === 0 || rightSections.length === 0) {
            const leftHeadings = activeTab.querySelectorAll('.grid > div:first-child h3');
            const rightHeadings = activeTab.querySelectorAll('.grid > div:last-child h3');
            
            alignElements(leftHeadings, rightHeadings);
            
            // Juga sejajarkan paragraf dan code-box
            const leftParagraphs = activeTab.querySelectorAll('.grid > div:first-child p');
            const rightParagraphs = activeTab.querySelectorAll('.grid > div:last-child p');
            alignElements(leftParagraphs, rightParagraphs);
            
            const leftCodeBoxes = activeTab.querySelectorAll('.grid > div:first-child .code-box');
            const rightCodeBoxes = activeTab.querySelectorAll('.grid > div:last-child .code-box');
            alignElements(leftCodeBoxes, rightCodeBoxes);
        } else {
            // Jika ada numbered-section, sejajarkan seperti sebelumnya
            alignElements(leftSections, rightSections);
        }
    }

    // Fungsi pembantu untuk menyejajarkan elemen
    function alignElements(leftElements, rightElements) {
        // Reset tinggi semua elemen dulu
        leftElements.forEach(el => el.style.minHeight = 'auto');
        rightElements.forEach(el => el.style.minHeight = 'auto');
        
        // Kemudian setel tinggi yang sama untuk elemen yang bersesuaian
        for (let i = 0; i < Math.min(leftElements.length, rightElements.length); i++) {
            const maxHeight = Math.max(leftElements[i].scrollHeight, rightElements[i].scrollHeight);
            leftElements[i].style.minHeight = maxHeight + 'px';
            rightElements[i].style.minHeight = maxHeight + 'px';
        }
    }

    // Persiapkan struktur untuk numbered-section jika belum ada
    function prepareNumberedSections() {
        // Untuk setiap tab
        document.querySelectorAll('.tab-content').forEach(tab => {
            // Periksa apakah ada grid dengan dua kolom
            const grid = tab.querySelector('.grid-cols-2');
            if (!grid) return;
            
            const leftColumn = grid.querySelector('div:first-child');
            const rightColumn = grid.querySelector('div:last-child');
            
            if (!leftColumn || !rightColumn) return;
            
            // Periksa h3 elements pada kedua sisi
            const leftHeadings = leftColumn.querySelectorAll('h3');
            const rightHeadings = rightColumn.querySelectorAll('h3');
            
            // Jika tidak ada elemen numbered-section, buat secara otomatis
            if (leftColumn.querySelector('.numbered-section') === null) {
                wrapInNumberedSections(leftColumn, leftHeadings);
                wrapInNumberedSections(rightColumn, rightHeadings);
            }
        });
    }

    // Fungsi untuk membungkus konten dalam numbered-section
    function wrapInNumberedSections(column, headings) {
        headings.forEach(heading => {
            // Ambil semua elemen setelah heading sampai heading berikutnya
            let content = [];
            let currentNode = heading.nextElementSibling;
            
            while (currentNode && currentNode.tagName !== 'H3') {
                const nextNode = currentNode.nextElementSibling;
                content.push(currentNode);
                currentNode = nextNode;
            }
            
            // Buat numbered-section dan pindahkan konten ke dalamnya
            const numberedSection = document.createElement('div');
            numberedSection.className = 'numbered-section';
            
            // Pindahkan heading
            heading.parentNode.insertBefore(numberedSection, heading);
            numberedSection.appendChild(heading);
            
            // Pindahkan konten
            content.forEach(node => {
                numberedSection.appendChild(node);
            });
        });
    }

    // CSS untuk numbered-section
    function addNumberedSectionStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .numbered-section {
                display: flex;
                flex-direction: column;
                margin-bottom: 2rem;
                width: 100%;
                transition: min-height 0.3s;
            }
            
            /* Pastikan grid sejajar dari atas */
            .grid-cols-2 {
                align-items: start;
            }
        `;
        document.head.appendChild(style);
    }

    // Jalankan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan CSS untuk numbered-section
        addNumberedSectionStyles();
        
        // Persiapkan struktur numbered-section jika belum ada
        prepareNumberedSections();
        
        // Aktifkan tab default dan sejajarkan kontennya
        const defaultTab = document.querySelector('.tab-button.active');
        if (defaultTab) {
            const tabId = defaultTab.getAttribute('onclick').match(/'([^']+)'/)[1];
            const targetContent = document.getElementById(tabId);
            if (targetContent) {
                targetContent.classList.add('active');
                setTimeout(() => equalizeHeights(tabId), 100);
            }
        }
        
        // Tambahkan event listener untuk window resize
        window.addEventListener('resize', function() {
            const activeTab = document.querySelector('.tab-content.active');
            if (activeTab) {
                equalizeHeights(activeTab.id);
            }
        });
    });

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