
    @if($promos->codes->count() != 0)
        @foreach($promos->codes->random(1) as $code)
            <div id="code-timer" style="text-align:center"><!--CODETIMER-->
                <div  style="display:none">
                    <input type="text" id="mns" name="mns" value="{{$promos->code_time_minutes}}" size="3" maxlength="3" />
                    <input type="text" id="scs" name="scs" value="{{$promos->code_time_seconds}}" size="2" maxlength="2" /><br/>
                    <input type="button" id="btnct" value="START" onclick="countdownTimer()"/>
                </div>
                {{__('Claim code in')}}: <br> <span id="showmns">00</span><b>:</b><span id="showscs">00</span>
            </div>
            <div id="code-container" class="promo-code-container"><!--PROMOCODE-->
                {{__('Promo code')}}
                <h2 id="code">{{$code->name}}</h2>
                <form action="https://k8.io/member/redemption-code" method="get" target="_blank">
                    <button onclick="copyToClipboard('code')" class="a-btn">{{__('Copy and Claim')}}</button>
                </form>
            </div>
        @endforeach
    @endif