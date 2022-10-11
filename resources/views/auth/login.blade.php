<x-guest-layout>
    <x-auth-card>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                        <div class="nk-block-des">
                            <p>Access the CryptoLite panel using your email and passcode.</p>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Email or Username</label>
                        </div>
                        <div class="form-control-wrap">
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" placeholder="Enter your email address or username" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Passcode</label>
                            {{-- @if (Route::has('password.request'))
                                <a class="link link-primary link-sm" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <x-text-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                required autocomplete="current-password"
                                placeholder="Enter your passcode" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-primary-button>
                            {{ __('Sign In') }}
                        </x-primary-button>
                        {{-- <button class="btn btn-lg btn-primary btn-block">Sign in</button> --}}
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="{{ route('register') }}">Create an account</a>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
