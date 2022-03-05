{!! Form::open(['method'=>'post', 'id'=>'join-form', 'class'=>'subscribe-container']) !!}
            {!! Form::email('email', null, ['id'=>'email','class'=>'subscribe-input', 'placeholder'=> 'Your email']) !!}
            <div id="btn-submit" class="submit">{{'shop/global.subscribe'}}</div>
{!! Form::close() !!}