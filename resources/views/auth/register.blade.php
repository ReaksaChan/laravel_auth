@extends('layout')

@section('contents')
{{-- <div class="mt-5">
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <h2>Register for an Account</h2>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-col-sm-12">
                <label for="name">Name:</label>
                <input
                  type="text"
                  name="name"
                  value="{{ old('name') }}"
                  required
                >
            </div>
            <div class="col-lg-6 col-md-6 col-col-sm-12">
                <label for="email">Email:</label>
                <input
                  type="email"
                  name="email"
                  value="{{ old('email') }}"
                  required
                >
            </div>
            <div class="col-lg-6 col-md-6 col-col-sm-12">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="col-lg-6 col-md-6 col-col-sm-12">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>

        </div>

        <button type="submit" class="btn mt-4">Register</button>

        <!-- validation errors -->
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
      </form>
</div> --}}
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>
                      <div class="alert-succes d-none" id="alertMessage"></div>

                  <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
                        <label class="form-label" for="name">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" />
                        <label class="form-label" for="email">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        {{-- <input type="password" id="password" class="form-control" />
                        <label class="form-label" for="password">Password</label> --}}
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="password" id="password_confirmation" name="password_confirmation" />

                        {{-- <label for="password_confirmation">Confirm Password:</label> --}}
                        {{-- <input type="password" name="password_confirmation" required> --}}
                        <label class="form-label" for="password_confirmation">Repeat your password</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button id="btnRegister" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                    </div>
                </form>
                  <!-- validation errors -->
                    @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-100">
                        @foreach ($errors->all() as $error )
                            <li class="my-2 text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
  {{-- <script>
    $(document).ready(() => {
        $('#btnRegister').click((e) => {
            e.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let password_comfir = $('#password_comfirmation').val();

            $.ajax({
                url: "{{ route('show.homepage') }}",
                    type: "POST",
                    data: {name, email, password, password_comfir},
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if ( response.status == 'error' ) {
                            const messResponse = response.msg;
                            $('#alertMessage').empty();
                            const $errorList = $('<ul class="text-danger"></ul>');
                            $.each(messResponse, function(field, message) {
                                $.each(message, function(index, mess){
                                    $errorList.append( $(`<li>${mess}</li>`) );
                                });
                            });

                            $('#alertMessage').removeClass("alert-success d-none").addClass(
                                "alert-danger").append($errorList);
                            }else {
                            $('#alertMessage').removeClass("alert-danger d-none").addClass(
                                "alert-success").text(response.msg);
                            $('.form-control').val('');
                        }else {
                            $('#alertMessage').removeClass("alert-danger d-none").addClass(
                                "alert-success").text(response.msg);
                            $('.form-control').val('');
                        }
                    }
            });

        })
    });
  </script> --}}
@endsection
