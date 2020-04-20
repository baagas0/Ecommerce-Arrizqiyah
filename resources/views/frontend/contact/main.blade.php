@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row d-flex align-items-stretch">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="box-icon bg-info-alt text-info d-flex align-items-center justify-content-center">
                        <i class="las la-phone-volume"></i>
                    </div>
                    <div class="content mt-3">
                        <h4 class="title font-weight-bold">Whatsapp</h4>
                        <p class="text-muted">
                            Start working with Landrick that can provide everything
                        </p>
                        <a href="{{ 'https://wa.me/'.$contact->phone }}" target="_blank" class="text-primary">{{ $contact->phone }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <div class="box-icon bg-success-alt text-success d-flex align-items-center justify-content-center">
                        <i class="lab la-telegram"></i>
                    </div>
                    <div class="content mt-3">
                        <h4 class="title font-weight-bold">Telegram</h4>
                        <p class="text-muted">
                            Start working with Landrick that can provide everything
                        </p>
                        <a href="{{ $contact->telegram }}" class="text-primary">{{ $contact->telegram }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        
        <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <div class="box-icon bg-warning-alt text-warning d-flex align-items-center justify-content-center">
                        <i class="las la-envelope-open"></i>
                    </div>
                    <div class="content mt-3">
                        <h4 class="title font-weight-bold">Email</h4>
                        <p class="text-muted">
                            Start working with Landrick that can provide everything
                        </p>
                        <a href="{{ 'mailto:'.$contact->email }}" class="text-primary">{{ $contact->email }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="card text-center">
                <div class="card-body">
                    <div class="box-icon bg-danger-alt text-danger d-flex align-items-center justify-content-center">
                        <i class="las la-map-signs"></i>
                    </div>
                    <div class="content mt-3">
                        <h4 class="title font-weight-bold">Maps</h4>
                        <p class="text-muted">
                            Start working with Landrick that can provide everything
                        </p>
                        <a href="{{ $contact->location }}" class="text-primary">{{ $contact->location }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>

<div class="container">
    <div class="row my-6">
        {{-- <div class="col-lg-8">
            <div class="card">
                <div class="card-body py-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title mb-0">Use this form for contact</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <form id="contact-form" class="mt-4" method="post" action="#" role="form">
                        <div class="messages"></div>

                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">Please specify your need *</label>
                                        <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                            <option value=""></option>
                                            <option value="Request quotation">Request quotation</option>
                                            <option value="Request order status">Request order status</option>
                                            <option value="Request copy of an invoice">Request copy of an invoice</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-send" value="Send message" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted mt-3">
                                        <strong>*</strong> These fields are required
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-12">
            <div id="faq-accordion" class="mb-5">

            	@foreach($special as $special)
                <div class="card mb-2 mb-md-3">
                    <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 mr-2">{{ $special->title }}</h6>
                            <i class="las la-arrow-right icon"></i>
                        </div>
                    </a>
                    <div class="collapse" id="accordion-1" data-parent="#faq-accordion">
                        <div class="px-3 px-md-4 pb-3 pb-md-4">
                            {{ $special->answer }}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection