<div class="row">
    <div class="col-12 mb-2 text-center">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), '', '', array('class' => 'mdi mdi-facebook-box btn-lg mb-1 md-30 ')) !!}

        {!! HTML::icon_link(route('social.redirect',['provider' => 'twitter']), '', '', array('class' => 'mdi mdi-twitter-box btn-lg mb-1 md-30')) !!}

        {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), '', '', array('class' => 'mdi mdi-google-plus-box btn-lg mb-1 md-30')) !!}

        {!! HTML::icon_link(route('social.redirect',['provider' => 'instagram']), '', '', array('class' => 'mdi mdi-instagram btn-lg mb-1 md-30')) !!}


    </div>
</div>
