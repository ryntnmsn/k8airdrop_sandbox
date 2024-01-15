@include('home.partials.header')


<div class="main container-margin-top">
    <div class="container-promo-left">

    </div>
    <div class="container-promo-center">
        <div class="promo-container-main">
            <div class="content-center">

                <h1>{{__('Congratulations')}}! </h1>
                <h5 class="text-custom-secondary pt-2" style="line-height:30px">
                {{__('You have successfully joined the promo')}}!<br><br><br>
                {{__('Click the link below to learn more about other related airdrop giveaways that might interest you')}}.<br>
                </h5>
                <div class="mt-5 btn-top-border">
                    <a href="/" type="submit" class="a-btn">{{__('Return to promos')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-promo-right">

    </div>
</div>



@include('home.partials.footer')
