@extends('user.layouts.app')
@section('body')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ trans('messages.contactus') }}</h3>
                    <span class="breadcrumb"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a> >
                        {{ trans('messages.contactus') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text">
                        <div class="section-heading">
                            <h6>{{ trans('messages.contactus') }}</h6>
                            <h2>{{ trans('messages.sayhello') }}</h2>
                        </div>
                        <p>{{ trans('messages.contactusquetion') }}</p>

                        <ul>
                            <li><span>{{ trans('messages.address') }}</span> {{ trans('messages.palestine') }}</li>
                            <li><span>{{ trans('messages.phone') }}</span> <a href="tel:+972566304321">+972-566-304-321</a>
                            </li>
                            <li><span>{{ trans('messages.whatsapp') }}</span><a
                                    href="https://api.whatsapp.com/send?phone=972566304321&text=I%27m%20interested%20in%20purchasing!!"
                                    target="_blank">{{ trans('messages.whatsapp') }}</a></li>
                            <li><span>{{ trans('messages.telegram') }}</span><a href="https://t.me/GameBrio"
                                    target="_blank">{{ trans('messages.telegram') }}</a></li>
                            <li><span>{{ trans('messages.email') }}</span> <a
                                    href="mailto:karamnaser2299@gmail.com">karamnaser2299@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867272.0425340589!2d35.55156593265382!3d31.88535971389422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cf2d28866bdd9%3A0xee17a001d166f686!2z2YHZhNiz2LfZitmG!5e0!3m2!1sar!2sjo!4v1704088458784!5m2!1sar!2sjo"
                                        width="100%" height="325px" frameborder="0" style="border:0; border-radius: 23px;"
                                        allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form id="contact-form" action="{{ route('contactsend') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="name" name="firstname" id="name"
                                                    placeholder="{{ trans('messages.firstname') }}" autocomplete="on"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="surname" name="lastname" id="surname"
                                                    placeholder="{{ trans('messages.lastname') }}" autocomplete="on"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                    placeholder="{{ trans('messages.inputemail') }}" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="subject" name="subject" id="subject"
                                                    placeholder="{{ trans('messages.subject') }}" autocomplete="on">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" id="message" placeholder="{{ trans('messages.yourmessage') }}"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit"
                                                    class="orange-button">{{ trans('messages.sendyourmessge') }}</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
