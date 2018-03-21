@extends('layouts.app')

@section('content')
<div class="home-body">
    <div class="wrapper">
        <img class="bg-img" src="{{asset('img/FirefighterBackground.png')}}"/>
    </div>
    <img id="logo" src="{{asset('img/BlueRescuefav_white.png')}}"/>
    <div class="content" id="ourcompany">
        <h1>Our Company</h1>
        <br><br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p>We are an Emergency Information Technology company digitizing residential and commercial blueprints. We provide essential blueprints for firefighters and other first responders through our mobile and web apps.</p>
            </div>
        </div>
    </div>
    <!--<div class="content">
        <h1>The Problem</h1>
        <br><br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p>In 2015, US fire departments responded at an estimated 1.3M fires. These fires resulted in 3,280 civilian deaths and 15,700 civilian injuries. 68 firefighters were fatally injured and 68,085 firefighters experienced non-fatal injuries while on duty.  On a daily basis, firefighters are called to highly dangerous situations.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p>When they arrive they must determine, on the fly, the best entrances and exits. Once inside, they navigate through dangerous territory to put out the fire and save victims trapped inside. They have no prior knowledge of the house and there’s a blanket of blinding smoke; they can’t see where they’re going. They circle through a house with one hand on a wall losing precious time when seconds matter most.  As the clock ticks, trapped occupants may suffer from smoke inhalation, firefighters become increasingly vulnerable to overexertion, stress, falls and structure collapse.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p>Despite best efforts and personal sacrifice, fire fatality numbers have not changed in 20 years. Firefighters need more time to save lives, including their own, and less time wasted navigating through unknown territory during a fire. BlueRescue has the solution.  We deliver blueprints to firefighters through our proprietary app so they know the layout of a burning building before they arrived on the scene.</p>
            </div>
        </div>
    </div>-->
    <div class="content">
        <!--<h1>Our Solution</h1>-->
        <h2>The BlueRescue App</h2>
        <br><br>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <p>The BlueRescue app is a Computer-Aided Dispatch (CAD) system which delivers blueprints to firefighters en-route.  At every new call firefighters are sent the location, nature of emergency, and the blueprints to the burning home they are about to blindly enter.</p>
            </div>
            <div class="col-md-3">
                <img src="{{asset('img/webappscreenshot.jpg')}}"/>
            </div>
        </div>
        <br><br><br>
        <h2>The BlueRescue Database</h2>
        <br><br>
        <div class="row">
            <div class="col col-md-3 col-md-offset-2">
                <img src="{{asset('img/digitalblueprint.jpg')}}"/>
            </div>
            <div class="col col-md-4">
                <p>Our database contains digitized blueprints from zoning departments. We hand-scan in paper documents from local zoning departments and associate the documents with their addresses. When dispatch gets a new call, our database can use the address to get the blueprints and send it to our app.</p>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>The Team</h1>
        <br><br>
        <div class="row">
            <div class="col-md-2 col-md-offset-1 col-sm-offset-1 col-sm-2 col-xs-4">
                <img class="team-img" src="{{asset('img/rightarm.png')}}"/>
                <p class="name">Sebastian Jimenez</p>
                <p class="position">VP of Business Development</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <img class="team-img" src="{{asset('img/rightleg.png')}}"/>
                <p class="name">John Robinson</p>
                <p class="position">Chief Technology Officer</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <img class="team-img" src="{{asset('img/exodia.png')}}"/>
                <p class="name">Jonathan Mohnkern</p>
                <p class="position">Chief Executive Officer</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
                <img class="team-img" src="{{asset('img/leftleg.png')}}"/>
                <p class="name">Graham Harrison</p>
                <p class="position">Chief Financial Officer</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <img class="team-img" src="{{asset('img/leftarm.jpg')}}"/>
                <p class="name">Ryan Andrews</p>
                <p class="position">Chief Operating Officer</p>
            </div>
        </div>

</div>
@endsection