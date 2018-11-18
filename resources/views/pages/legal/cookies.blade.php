@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>Cookies</h1>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <p class="flow-text">Oosh puts small files (known as ‘cookies’) onto your computer to collect information about how you browse the site.</p>
            <p class="flow-text">Cookies are used to measure how you use the website so it can be updated and improved based on your needs and remember the notifications you’ve seen so that we don’t show them to you again.</p>
            <p class="flow-text">You'll normally see a message on the site before we store a cookie on your computer.</p>

            <h3>Authentication</h3>
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Purpose</th>
                    <th>Expires</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>session_data</td>
                    <td>This contains authentication to use the site</td>
                    <td>When you close your browser, or 30 days if you asked to be remembered</td>
                </tr>
                </tbody>
            </table>

            <h3>Session</h3>
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Expires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>user_data</td>
                        <td>This stores basic information about you such as your name and email address</td>
                        <td>1 month</td>
                    </tr>
                    <tr>
                        <td>location_data</td>
                        <td>This stores information about your location search history to improve your next visit</td>
                        <td>1 year</td>
                    </tr>
                </tbody>
            </table>

            <h3>Placing an Order</h3>
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Expires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>basket</td>
                        <td>This stores the items that you have added to your basket while placing an individual order</td>
                        <td>1 month</td>
                    </tr>
                </tbody>
            </table>

            <h3>Intro Message</h3>
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Expires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>seen_cookie_message</td>
                        <td>This tells us you've seen the cookie message</td>
                        <td>1 year</td>
                    </tr>
                </tbody>
            </table>

            <h3>Google Analytics</h3>
            <table class="responsive-table striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Purpose</th>
                        <th>Expires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>_ga</td>
                        <td>This helps us count how many people visit Oosh by tracking if you’ve visited before</td>
                        <td>2 years</td>
                    </tr>
                    <tr>
                        <td>__utma</td>
                        <td>Like _ga, this lets us know if you’ve visited before, so we can count how many of our visitors are new to Oosh or to a certain page</td>
                        <td>2 years</td>
                    </tr>
                    <tr>
                        <td>__utmb</td>
                        <td>This works with _utmc to calculate the average length of time you spend on Oosh</td>	
                        <td>1 hour</td>
                    </tr>
                    <tr>
                        <td>__utmc</td>
                        <td>This works with _utmb to calculate when you close your browser</td>
                        <td>When you close your browser</td>
                    </tr>
                    <tr>
                        <td>__utmz</td>
                        <td>This tells us how you reached Oosh (e.g. from another website or a search engine)</td>
                        <td>6 months</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection