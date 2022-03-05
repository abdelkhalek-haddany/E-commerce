<div class="bottom-header d-none d-md-block">
<div class="container">
    <div class="row">
        
        <div class="col-sm-6">
            <div class="call-service">
                <span class="icon"><i class="fas fa-headset"></i></span>
                <div class="content">
                    <a href="tel:{{__('shop/layouts/headers/bottom.phone_number')}}">
                    <span class="title">{{__('shop/layouts/headers/bottom.call')}}</span>
                    <span class="phone">{{__('shop/layouts/headers/bottom.phone_number')}}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="bottom-search-box">
            @include('shop/components/_search-form')
            </div>
        </div>

    </div>
</div>
</div>