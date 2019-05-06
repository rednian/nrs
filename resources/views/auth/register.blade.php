@extends('layouts.app')

@section('content')
<section class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user-plus"></i>
                    <span class="caption-subject bold uppercase"> New USER</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
                </div>
            </div>
            <section class="portlet-body" style="padding: 0 7px 0 7px;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                          
                            <div class="card-header">{{ __('Register') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('user.store') }}" id="frm-register">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name <span class="required text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input autocomplete="off"  id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Username <span class="required text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input autocomplete="off"  id="username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="username" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                 

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input autocomplete="off" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#frm-register').formValidation({
            message: 'This value is not valid',
            // live: 'disabled',
            icon: {
                   // valid: 'fa fa-ok',
                   // invalid: 'fa fa-remove',
                   // validating: 'fa fa-spinner fa-spin'
            },
            fields: {
                    name:{
                         message: 'The name is not valid',
                      validators: {
                        notEmpty: {
                          message: 'The name is required and cannot be empty'
                        },
                      }
                    },

                  username: {
                    message: 'The username is not valid',
                    validators: {
                      notEmpty: {
                        message: 'The username is required and cannot be empty'
                      },
                      remote: {
                        url: '{{ route('user.checkusername') }}',
                        type: 'post',
                         // data: {password: $(this).val()},
                        message: 'username already taken.',
                        delay: 1000
                      }
                    }
                  },
                  password: {
                    validators: {
                      notEmpty: {
                        message: 'The password is required and can\'t be empty'
                      },
                      stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password must be more than 6 and less than 30 characters long'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The password can only consist of alphabetical, number, dot and underscore'
                      },
                      // different: {
                      //   field: 'username',
                      //   message: 'The password can\'t be the same as username'
                      // },
                      callback: {
                        callback: function (value, validator) {
                          // Check the password strength
                          if (value.length < 6) {
                            return {
                              valid: false,
                              message: 'The password must be more than 6 characters'
                            }
                          }

                          // if (value === value.toLowerCase()) {
                          //   return {
                          //     valid: false,
                          //     message: 'The password must contain at least one upper case character'
                          //   }
                          // }
                          // if (value === value.toUpperCase()) {
                          //   return {
                          //     valid: false,
                          //     message: 'The password must contain at least one lower case character'
                          //   }
                          // }
                          // if (value.search(/[0-9]/) < 0) {
                          //   return {
                          //     valid: false,
                          //     message: 'The password must contain at least one number'
                          //   }
                          // }

                          return true;
                        }
                      }
                    }
                  },
                  password_confirmation: {
                    validators: {
                      notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                      },
                      identical: {
                        field: 'new_password',
                        message: 'The password and its confirm are not the same'
                      }
                    }
                  },

            }
        }).on('success.form.fv', function (e) {
            e.preventDefault();

            var $form = $(e.target);

            var _this = this;

            $.ajax({    
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json'
            }).done(function(response){
                if(response.success){
                 
                    $form
                      .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                      .formValidation('resetForm', true);

                    
                    new PNotify({
                        type: 'success',
                        text: response.message,
                        after_close: function(notice, timer_hide) {
                            location.replace('{{route('user.index')}}');
                        }



                    });

               
                }
            });



            });

    });
</script>
@endsection
