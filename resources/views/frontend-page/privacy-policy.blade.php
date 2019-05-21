@extends('frontend-page.main')
@section('content') 
    <section id="boxset">
        <div class="container">
            <div class="row row-layout" style="height: 100%;">
                <div class="col-md-10 privacy-policy-p">



                        <h1 class="text-center">@lang('privacy-policy.title')</h1>
                        <br><br>
                        @lang('privacy-policy.first-section')


                        @lang('privacy-policy.second-section')


                        @lang('privacy-policy.third-section')



                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    
@endsection