<x-guest-layout>
    <x-auth-card>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Register</h4>
                        <div class="nk-block-des">
                            <p>Create New Dashlite Account</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <div class="form-control-wrap">
                            <x-text-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" placeholder="Enter your name" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email or Username</label>
                        <div class="form-control-wrap">
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email address or username" :value="old('email')" required />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <x-text-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                placeholder="Enter your passcode"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Confirm Passcode</label>
                        <div class="form-control-wrap">
                            <x-text-input id="password_confirmation" class="form-control form-control-lg"
                                type="password"
                                placeholder="Confirm your passcode"
                                name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked disabled id="checkbox">
                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{ route('login') }}"><strong>Sign in instead</strong></a>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
