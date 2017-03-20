
<div class="container portfolio_title">
    <!-- Title -->
    <div class="section-title">
        <h2>{{ $title }}</h2>
    </div>
    <!--/ Title -->
</div>

<div class="portfolio">
    
    <div id='filters' class="sixteen columns">
        <ul style="padding:0">
            <li><a href="{{ route('page') }}">
                <h5>Pages</h5>
            </li>
            <li><a href="{{ route('portfolio') }}">
                <h5>Portfolio</h5>
            </li>
            <li><a href="{{ route('service') }}">
                <h5>Service</h5>
            </li>
            <li><a href="{{ route('human') }}">
                <h5>Humans</h5>
            </li>
        </ul>
    </div>
    
</div>